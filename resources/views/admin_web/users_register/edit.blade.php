@extends('layouts.admin.index')
@section('content')
<div class="content-wrapper" style="min-height: 1200.88px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Edit User</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Users</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <br>
		@if ( Session::has('flash_message') )
		<div class="alert {{ Session::get('flash_type', 'alert-info') }}">
		  <h3>{{ Session::get('flash_message') }} <a href="{{route('users.index')}}">Click Here to see it!</a></h3>
		</div>
		@endif
    <br>
<!-- Editimi i Users -->
<div class="col-sm-2">
       <img style="height:500px;" src="/images/{{$user->photo ? $user->photo->user_register_file : 'No Photo'}}" alt="" class="img-responsive">
</div>
<div class="col-sm-10">	
		{!!Form::model($user, ['method'=>'PATCH' , 'action'=>['AdminUsersController@update', $user->id], 'files'=>true])!!}
		
		<div class="form-group">
				{!!Form::label('Username', 'Username:')!!}
			    {!!Form::text('username', null, ['class'=>'form-control'])!!}
			</div>
			<div class="form-group">
				{!!Form::label('email', 'Email:')!!}
				{!!Form::email('email',null, ['class'=>'form-control'] )!!}
				
			</div>
			<div class="form-group">
				{!!Form::label('Role', 'Role:')!!}
				{!!Form::select('role_id', [''=>'Choose Options']+$roles, null, ['class'=>'form-control'])!!}
			</div>
			<div class="form-group">
			     {!!Form::label('is_active', 'Status:')!!}
			     {!!Form::select('is_active', array(1 => 'Active', 0 => 'Not active'),null, ['class'=>'form-control'])!!}
			</div>
			<div class="form-group">
			     {!!Form::label('photo_id', 'Image:')!!}
			     {!!Form::file('photo_id',null, ['class'=>'form-control'])!!}
			</div>
			<div class="form-group">
				{!!Form::submit('Update User', ['class'=>'btn btn-primary'])!!}
			</div>
        {!!Form::close()!!}

        {!!Form::open(['method'=>'DELETE' , 'action'=>['AdminUsersController@destroy', $user->id]])!!}
         <div class="form-group">
         	{!!Form::submit('DELETE USER', ['class'=>'btn btn-danger'])!!}
         </div>
        {!!Form::close()!!}
   </div>
</div>
@stop