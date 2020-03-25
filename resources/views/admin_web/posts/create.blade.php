@extends('layouts.admin.index')
@section('content')
<div class="content-wrapper" style="min-height: 1200.88px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Add Post</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Posts</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
<div class="col-sm-10">
	{!!Form::open(['method'=>'POST', 'action'=>'AdminPostsController@store','files'=>'true']) !!}
   
    <div class="form-group">
        {!!Form::label('title', 'Title:')!!}
    	{!!Form::text('title',null, ['class'=>'form-control'])!!}
    </div>
    <div class="form-group">
        {!!Form::label('photo_id', ' Photo:')!!}
        {!!Form::file('photo_id', null, ['class'=>'form-control'])!!}
    </div>
    <div class="form-group">
        {!!Form::label('Category', 'Category:')!!}
    	{!!Form::select('category_id',[''=>'Choose Options']+$categories, null, ['class'=>'form-control'])!!}
    </div>
    <div class="form-group">
        {!!Form::label('body', 'Description:')!!}
        {!!Form::textarea('body', null, ['rows'=>4, 'cols'=>54,'class'=>'form-control'])!!}        
    </div>
    <div class="form-group">
        {!!Form::submit('Create Post', ['class'=>'btn btn-primary col-sm-12'])!!}
    </div>
	{!!Form::close()!!}
</div>
</div>
@stop