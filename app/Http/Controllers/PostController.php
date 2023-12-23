<?php

namespace App\Http\Controllers;

use App\Events\ProductEvent;
use App\Models\Post;
use App\Models\Product;
use App\Models\User;
use App\Notifications\CreatePostNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{

    public function __construct(){
        $this->middleware(['auth']);
    }
  
    public function index()
    {
        $post=Post::all();
        $user=Auth::user();
        return view('post.index',compact('post','user'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('post.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'=>['required','string'],
            'content'=>['required','string','min:5'],
           
        ]);

        $post = post::create([
            'title'=>$request->title,
            'content'=>$request->content,
            
        ]);

        $user=Auth::user();
       $allUser=User::where('id','!=',$user->id)->get();
       Notification::send($allUser,new CreatePostNotification($post,$user));

       return redirect()->route('post.index');
    }

    
    public function show(string $id)
    {
        $post=Post::findorfail($id);
        $idNotifyTable=DB::table('notifications')->where('data->post_id',$id)->pluck('id');
        DB::table('notifications')->where('id',$idNotifyTable)->update([
            // 'read_at'=>now()
        ]);
        
        return $post;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $post=Post::findorfail($id);
        return view('post.edit',compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title'=>['required','string'],
            'content'=>['required','string','min:5'],
           
        ]);

        $post=Post::findorfail($id);

        $post->update([
            'title'=>$request->title,
            'content'=>$request->content,
        ]);
     
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Post::destroy($id);
        return response('deleted success');

    }
}
