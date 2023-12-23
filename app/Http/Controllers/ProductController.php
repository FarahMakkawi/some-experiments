<?php

namespace App\Http\Controllers;

use App\Events\ProductEvent;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{

    public function __construct(){
        $this->middleware(['auth']);
    }
  
    public function index()
    {
        $product=Product::all();
        $user=Auth::user();
        return view('product.index',compact('product','user'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('product.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>['required','string'],
            'details'=>['required','string','min:5'],
            'price'=>['required'],
            'image'=>['image']
        ]);

       $imageName=$request->file('image')->getClientOriginalName();
       $newname1=uniqid().'_' . $imageName;
       $newname=$request->file('image')->store('images','public');

       $user=Auth::user();
       $product = Product::create([
            'name'=>$request->name,
            'details'=>$request->details,
            'price'=>$request->price,
            'image'=>$newname,
        ]);
        // return response('created success');
        event(new ProductEvent($user,$product));

    }

    
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product=Product::findorfail($id);
        return view('product.edit',compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name'=>['required','string'],
            'details'=>['required','string','min:5'],
            'price'=>['required'],
            'image'=>['image']
        ]);

        $product=Product::findorfail($id);

        if(Storage::exists($product->image)){
            Storage::delete($product->image);
        }

     
     

        $product->update([
            'name'=>$request->name,
            'details'=>$request->details,
            'price'=>$request->price,
            'image'=>$request->file('image')->store('images','public'),
        ]);
        // return response('updated success');
        // event(new ProductEvent($product));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Product::destroy($id);
        return response('deleted success');

    }
}
