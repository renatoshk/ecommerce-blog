@extends('layouts.admin.index')
@section('content')
<div class="content-wrapper" style="min-height: 1200.88px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Products</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Products</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <br>
    @if ( Session::has('flash_message') )
      <div class="alert {{ Session::get('flash_type', 'alert-danger') }}">
          <h3>{{ Session::get('flash_message') }}</h3>
      </div>
   @endif
    <br>
   <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
              <a href="{{route('products.create')}}" class="btn btn-success" style="float: right;">Add Product</a>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    
    <!-- Main content -->
    <section class="content">
     <div class="row">
    <div class="col-12">
    <div class="card">
    <div class="card-header">
    <h3 class="card-title">All Products</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <table id="categories" class="table table-bordered table-striped">
    <thead>
          <tr>
            <th scope="col">Id</th>
            <th scope="col">Category</th>
            <th scope="col">User</th>
            <th scope="col">Photo</th>
            <th scope="col">Name</th>
            <th scope="col">Price</th>
            <th scope="col">Quantity</th>
            <th scope="col">Status</th>
            <th scope="col">Created_at</th>
            <th scope="col">Updated_at</th>
            <th scope="col">Edit</th>
            <th scope="col">Delete</th>
          </tr>
    
  </thead>
  <tbody>
  @if($products) 	
    @foreach($products as $product)	
    <tr>
      <td>{{$product->id}}</td>
      <td>{{$product->category ? $product->category->name : 'Uncategorized'}}</td>
      <td>{{$product->user ? $product->user->username : 'No user'}}</td>
      <td><img height="50px" src="../product_images/{{$product->photo ? $product->photo->product_file : 'No Photo'}}" alt="">
      </td>
      <td><a style="color: black" href="{{route('products.edit', $product->id)}}">{{$product->name}}</a></td>
      <td>{{$product->price}}</td>
      <td>{{$product->qty}}</td>
      <td>{{$product->status}}</td>
      <td>{{$product->created_at ? $product->created_at->diffForHumans() : 'No data'}}</td>
      <td>{{$product->updated_at ? $product->updated_at->diffForHumans() : 'No data'}}</td>
      <td><a style="color: black" href="{{route('products.edit', $product->id)}}">Edit</a></td>
      <td>
        {!!Form::open(['method'=>'DELETE' , 'action'=>['AdminProductController@destroy', $product->id]])!!}
        <div class="form-group">
          {!!Form::submit('Delete', ['class'=>'btn btn-danger'])!!}
        </div>
        {!!Form::close()!!}
      </td>
    </tr>
    
    @endforeach
   @endif 
  </tbody>
   </table>
</div>
<!-- /.card-body -->

</div>
<!-- /.card -->
</div>
<!-- /.col -->
</div>
<!-- /.row -->
    </section>
</div>
@stop

