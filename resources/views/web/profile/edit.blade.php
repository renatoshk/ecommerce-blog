@extends('layouts.webi.index')
@section('content')
<style>
/***
User Profile Sidebar by @keenthemes
A component of Metronic Theme - #1 Selling Bootstrap 3 Admin Theme in Themeforest: http://j.mp/metronictheme
Licensed under MIT
***/

body {
  background: red;
}
</style>
<br>
@if ( Session::has('flash_message') )
  <div class="alert {{ Session::get('flash_type', 'alert-danger') }}">
      <h3>{{ Session::get('flash_message') }}</h3>
  </div>
@endif
<br>
<div class="container">
    <div class="row profile">
		<div class="col-md-3">
			<div class="profile-sidebar">
				<!-- SIDEBAR USERPIC -->
				<div class="profile-userpic">
					<img src="/images/{{Auth::user()->photo ? Auth::user()->photo->user_register_file : 'No photo'}}" class="img-responsive" alt="">
				</div>
				<!-- END SIDEBAR USERPIC -->
				<!-- SIDEBAR USER TITLE -->
				<div class="profile-usertitle">
					<div class="profile-usertitle-name">
						{{Auth::user()->username}}
					</div>
					<div class="profile-usertitle-job">
						{{Auth::user()->role->role}}
					</div>
				</div>
				<!-- END SIDEBAR USER TITLE -->
				<!-- SIDEBAR BUTTONS -->
				<div class="profile-userbuttons">

					{{-- <button type="button" class="btn btn-success btn-sm">Update</button> --}}
					{!!Form::open(['method'=>'DELETE' , 'action'=>['ProfileController@destroy', $user->id]])!!}
					{!!Form::submit('DELETE', ['class'=>'btn btn-danger btn-sm'])!!}
					{!!Form::close()!!}
				</div>
				<!-- END SIDEBAR BUTTONS -->
				<!-- SIDEBAR MENU -->
				<div class="profile-usermenu">
					<ul class="nav">
						<li class="active">
							<a href="{{route('orders.index')}}">
							<i class="glyphicon glyphicon-home"></i>
							My Orders </a>
						</li>
						<li>
							<a href="#" target="_blank">
							<i class="glyphicon glyphicon-ok"></i>
							Tasks </a>
						</li>
						<li>
							<a href="#">
							<i class="glyphicon glyphicon-flag"></i>
							Help </a>
						</li>
					</ul>
				</div>
				<!-- END MENU -->
			</div>
		</div>
		<div class="col-md-9">
            <div class="profile-content">
            	<h1>Edit Profile!</h1>
            	<br>
            	<br>
            	<div class="col-sm-6">
            	{!!Form::model($user, ['method'=>'PATCH', 'action'=>['ProfileController@update', $user->id], 'files'=>true])!!}
            	<div class="form-group">
            		{!!Form::label('username', 'Username:')!!}
            		{!!Form::text('username', null, ['class'=>'form-control'])!!}
            	</div>
            	<div class="form-group">
            		{!!Form::label('email', 'Email:')!!}
            		{!!Form::email('email', null, ['class'=>'form-control'])!!}
            	</div>
            	<div class="form-group">
			       {!!Form::label('photo_id', 'Image:')!!}
			       {!!Form::file('photo_id',null, ['class'=>'form-control'])!!}
			    </div>
			    <br>
			    <div class="form-group">
				   {!!Form::submit('Update', ['class'=>'btn btn-primary'])!!}
			    </div>
            	{!!Form::close()!!}
            	</div>

             </div>
		</div>
	</div>
</div>
<br>
<br>
@stop