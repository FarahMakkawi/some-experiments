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
        <div class="row">
   
  <p>  user are login now is : {{ $user->name}} </p> 

        </div></div>
    <div class="container">
        <div class="row">
     
<table class="table table-hover" >
    <thead>
      <tr>
        <th scope="col">id</th>
        <th scope="col">name</th>
        <th scope="col">details</th>
        <th scope="col">price</th>
        <th scope="col">image</th>
        <th scope="col" >opreation</th>



      </tr>
    </thead>
    <tbody>
       
        @forelse ($product as $product)
            
        <tr>
            <td>{{$product['id']}}</td> 
            <td>{{$product->name}}</td>
            <td>{{$product->details}}</td>
            <td>{{$product->price}}</td>
            <td><img src="{{Storage::url($product->image)}}" alt=" " width="20px" height="20px"></td>
            

            <td>
                <a class="btn btn-info" href="{{route('product.edit',$product->id)}}" >update</a>
            <form method="post" action="{{route('product.destroy',$product->id)}}">
            @csrf
            @method('delete')
            <input type="submit" value="delete">
            </form>
        </td>
        
        </tr>
        
        @empty
        <tr>
            <td colspan="100">
                there are no racords
            </td>
        </tr>
        
        @endforelse
       
    </tbody>
    
  </table>
  <div class="my-3" >
  <a href="{{route('product.create')}}" class="btn btn-warning">Add product</a>

        </body>
        </html>