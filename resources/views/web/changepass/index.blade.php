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
					<button type="button" class="btn btn-success btn-sm"><a style="color: white;" href="{{route('profile.edit', Auth::user()->id)}}">Edit</a></button>
				
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
            	
            	<h1>Change Password!</h1>
            	<br>
            	<br>
            	<div class="col-sm-6">
            	{!!Form::model($user, ['method'=>'PATCH', 'action'=>['ChangePasswordUsersController@update', $user->id], 'files'=>true])!!}
            	<div class="form-group row {{$errors->has('oldpassword') ? 'has-error' : ''}}">
            		{!!Form::label('oldpassword', 'Old Password:')!!}
            		{!!Form::password('oldpassword', ['class'=>'form-control'])!!}
            	</div>
            	  <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password: ') }}
                            </label>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                    </div>
                    <div class="form-group row">
	                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password: ') }}
	                            </label>
	                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                    </div>
				    <div class="form-group">
					   {!!Form::submit('Change', ['class'=>'btn btn-primary'])!!}
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