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
          <h5 class="text-center" >Update Products</h5>
       <form class="row g-3" method="POST" action="{{route('product.update',$product->id)}}" enctype="multipart/form-data">
        @csrf
        @method('put')
            <div class="col-12">
              <label for="inputNanme4" class="form-label">Name </label>
              <input type="text" class="form-control" id="inputNanme4" name="name" value="{{old('name',$product->name)}}"  class="@error('name') is-invalid @enderror">
              @error('name')
                 <div class="text-danger">{{ $message }}</div>
              @enderror
            </div>
            
            
            <br>


            <div class="col-12">
                <label for="inputNanme4" class="form-label">details </label>
                <input type="text" class="form-control" id="inputNanme4" name="details" value="{{old('details',$product->details)}}"  class="@error('details') is-invalid @enderror">
                @error('details')
                   <div class="text-danger">{{ $message }}</div>
                @enderror
              </div>

              <br>
            <div class="col-12">
              <label for="inputPassword4" class="form-label">Price </label>
              <input type="text" class="form-control" id="inputPassword4" name="price"  value="{{old('price',$product->price)}}" class="@error('price') is-invalid @enderror">
              @error('price')
                 <div class="text-danger">{{ $message }}</div>
              @enderror
            </div>
            <br>

            <div class="col-12">
              <label for="inputNanme4" class="form-label"><b>Image </b> </label>
              <input type="file" class="form-control" id="inputNanme4" name="image" value="{{old('image')}}"  class="@error('image') is-invalid @enderror">
              
              @error('image')
                 <div class="text-danger">{{ $message }}</div>
              @enderror
            </div>
            <div class="mb-3">
              <label class="form-label">old image</label>
              <img src="{{Storage::url($product->image) }}" alt=""  width="40" height="40">
          </div>


            <br>



            <div class="text-center">
              <button type="submit" class="btn btn-info">update</button>
            </div>
          </form>
