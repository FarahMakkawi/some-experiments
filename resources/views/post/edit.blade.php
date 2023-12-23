<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

</head>
<body>
    
<div class="container">
    {{-- <div class="row"> --}}
        <div class="col-8 mx-auto">
          <h5 class="text-center" >Update post</h5>
       <form class="row g-3" method="POST" action="{{route('post.update',$post->id)}}" >
        @csrf
        @method('put')
            <div class="col-12">
              <label for="inputNanme4" class="form-label">title </label>
              <input type="text" class="form-control" id="inputNanme4" name="title" value="{{old('title',$post->title)}}"  class="@error('title') is-invalid @enderror">
              @error('title')
                 <div class="text-danger">{{ $message }}</div>
              @enderror
            </div>
            
            
            <br>


            <div class="col-12">
                <label for="inputNanme4" class="form-label">content </label>
                <input type="text" class="form-control" id="inputNanme4" name="content" value="{{old('content',$post->content)}}"  class="@error('content') is-invalid @enderror">
                @error('content')
                   <div class="text-danger">{{ $message }}</div>
                @enderror
              </div>




            <div class="text-center">
              <button type="submit" class="btn btn-info">update</button>
            </div>
          </form>
