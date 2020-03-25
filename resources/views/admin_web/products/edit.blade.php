@extends('layouts.admin.index')
@section('content')
<div class="content-wrapper" style="min-height: 1200.88px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Edit Product</h1>
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
<div class="col-sm3">
    <img  src="/product_images/{{$product->photo ? $product->photo->product_file : 'No Photo'}}" alt="">
</div>
<div class="col-sm-10">
	{!!Form::model($product, ['method'=>'PATCH', 'action'=>['AdminProductController@update', $product->id],'files'=>true])!!}
   
    <div class="form-group">
        {!!Form::label('name', 'Product Name:')!!}
    	{!!Form::text('name',null, ['class'=>'form-control'])!!}
    </div>
    <div class="form-group">
        {!!Form::label('image_id', 'Product Photo:')!!}
        {!!Form::file('image_id', null, ['class'=>'form-control'])!!}
    </div>
    <div class="form-group">
        {!!Form::label('Category', 'Category:')!!}
    	{!!Form::select('category_id',$categories, null, ['class'=>'form-control'])!!}
    </div>
    <div class="form-group">
        {!!Form::label('description', 'Description:')!!}
        {!!Form::textarea('description', null, ['rows'=>4, 'cols'=>54,'class'=>'form-control'])!!}        
    </div>

    <div class="form-group">
        {!!Form::label('price', 'Price:')!!}
        {!!Form::text('price', null,['class'=>'form-control'])!!}
    </div>
    <div class="form-group">
        {!!Form::label('qty', 'Quantity:')!!}
        {!!Form::text('qty',null, ['class'=>'form-control'])!!}
    </div>
    <div class="form-group">
        {!!Form::submit('Update Product', ['class'=>'btn btn-primary col-sm-12'])!!}
    </div>
	{!!Form::close()!!}
   </div>
</div>
@stop