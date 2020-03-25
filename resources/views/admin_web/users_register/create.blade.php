@extends('layouts.admin.index')
@section('content')
<div class="content-wrapper" style="min-height: 1200.88px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Add User</h1>
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
<div class="col-sm-10">
	{!!Form::open(['method'=>'POST', 'action'=>'AdminUsersController@store', 'files'=>'true']) !!}
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
	     {!!Form::select('is_active', array(1 => 'Active', 0 => 'Not active'),0, ['class'=>'form-control'])!!}
	</div>
	<div class="form-group">
	     {!!Form::label('photo_id', 'Image:')!!}
	     {!!Form::file('photo_id',null, ['class'=>'form-control'])!!}
	</div>
	<div class="form-group">
	     {!!Form::label('password', 'Password:')!!}
	     {!!Form::password('password', ['class'=>'form-control'])!!}
	</div>

	<div class="form-group">
		{!!Form::submit('Create User', ['class'=>'btn btn-primary'])!!}
	</div>
</div>
</div>
{!!Form::close()!!}
@stop