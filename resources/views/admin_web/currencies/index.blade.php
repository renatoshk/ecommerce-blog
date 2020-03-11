@extends('layouts.index')
@section('content')

<div class="content-wrapper" style="min-height: 1200.88px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Currencies</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Currencies</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
              <a href="{{route('currencies.create')}}" class="btn btn-success" style="float: right;">Add Currency</a>
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
              <h3 class="card-title">All Currencies</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="categories" class="table table-bordered table-striped">
                <thead>
                 <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Currency Name</th>
                    <th scope="col">Currency Symbol</th>
                    <th scope="col">Is Base Currency</th>
                    <th scope="col">Rates</th>
                    <th scope="col">Created time</th>
                    <th scope="col">Modified time</th>
                    <th scope="col">Edit</th>
                    <th scope="col">Delete</th>
                  </tr>
                </thead>
                <tbody>
                  {{-- foreach --}}
                  @if($currencies)  
                    @foreach($currencies as $currency)  
                <tr>
                  <td>{{$currency->id}}</td>
                  <td>{{$currency->currency_name}}</td>
                  <td>{{$currency->currency_symbol}}</td>
                  <td>{{$currency->is_base_currency}}</td>
                  <td>{{$currency->currency_rate}}</td>
                  <td>{{$currency->created_at ? $currency->created_at->diffForHumans() : 'No data'}}</td>
                  <td>{{$currency->updated_at ? $currency->updated_at->diffForHumans() : 'No data'}}</td>
                  <td><a style="color:black" href="{{route('currencies.edit', $currency->id)}}">Edit</a></td>
                  <td>
                   {!!Form::open(['method'=>'DELETE', 'action'=>['AdminCurrencyController@destroy',$currency->id]])!!}
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
            <!-- /.card-body -->
          </div>
          <!-- /.card -->

          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>

@stop