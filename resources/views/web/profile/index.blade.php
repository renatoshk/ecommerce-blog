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
							<a href="{{route('change_password.edit', Auth::user()->id)}}">
							<i class="glyphicon glyphicon-user"></i>
							Change Password </a>
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
      <h1>My Purchases Products</h1> 
      <br>
      <br>
	    <section class="content">
		  <div class="row">
		    <div class="col-12">
		    <div class="card">
		    <!-- /.card-header -->
		    <div class="card-body">
             <table id="categories" class="table table-bordered table-striped">
				<thead>
			        <tr>
			          <th scope="col">Product</th>
			          <th scope="col">Status</th>
			          <th scope="col">Quantity</th>
			          <th scope="col">Total Price</th>
			         
			        </tr>
				</thead>
				<tbody>
				  @if($orders) 	
				    @foreach($orders as $order)	
				    <tr>
				      <td>{{$order->product ? $order->product->name : 'Uncategorized'}}</td>
				      <td>{{$order->status}}</td>
				      <td>{{$order->qty}}</td>
				      <td>${{$order->total_price}}</td>
				    </tr>
				   @endforeach
				  @endif 
				</tbody>
			</table>
           </div>
		</div>
	  </div>
     </div>
     {{$orders->links()}}
   </section>
  </div>
 </div>
 </div>
</div>

@stop