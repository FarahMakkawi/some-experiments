@extends('layouts.app')

@section('content')
<div class="container">
    {{-- <div class="row justify-content-center"> --}}
        {{-- <div class="col-md-8"> --}}
            <!DOCTYPE html>
            <html lang="en">
            <head>
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css">
            <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
            <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"></script>
            </head>
            <body>
            <div class="container">
            <div class="row">
            <div class="col-lg-10 col-sm-10 col-12 offset-lg-1 offset-sm-1">
            <nav class="navbar navbar-expand-lg bg-info rounded">
            <a class="navbar-brand text-light" href="#">Dashbord</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent" style="display: unset !important;">
            <ul class="nav nav-pills mr-auto justify-content-end">
            <li class="nav-item active">
            <a class="nav-link text-light" href="#">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
            <a class="nav-link text-light" href="{{route('product.index')}}">Product</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-light" href="{{route('post.index')}}">Post</a>
                </li>
            <li class="nav-item dropdown">
            <a class="nav-link text-light" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fa fa-bell"></i>
            </a>
            <ul class="dropdown-menu">
            <li class="head text-light bg-dark">
            <div class="row">
            <div class="col-lg-12 col-sm-12 col-12">
            <span>Notifications ({{Auth::user()->notifications->count()}})</span>
            <a href="" class="float-right text-light">Mark all as read</a>
            </div>
            </li>
          

            @foreach (Auth::user()->notifications as $notification)
                
            <li class="notification-box">
                <div class="row">
                    <div class="col-lg-3 col-sm-3 col-3 text-center">
                        <img src="{{asset('photo_2023-11-08_13-21-43.jpg')}}" class="w-50 rounded-circle">
                    </div>
                    <div class="col-lg-8 col-sm-8 col-8">
                        <strong class="text-info">{{$notification->data['user_name']}}</strong>
                        <div>
                           <a href="{{route('post.show',$notification->data['post_id'])}}"> {{$notification->data['post_title']}}  </a>
                        </div>
                        <small class="text-warning">
                            {{$notification->created_at}}
                        </small>
                    </div>
                </div>
            </li>
            
            
            @endforeach
            
            <li class="footer bg-dark text-center">
            <a href="" class="text-light">View All</a>
            </li>
            </ul>
            </li>
            </ul>
            </div>
            </nav>
            </div>
            </div>
            </div>
            </body>
            </html>
                
                
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                
            </div>
        </div>
    </div>
</div>
@endsection
