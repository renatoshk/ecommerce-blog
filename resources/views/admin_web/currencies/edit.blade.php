@extends('layouts.admin.index')
@section('content')
<div class="content-wrapper" style="min-height: 1200.88px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Edit Currencies</h1>
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
<br>
<br>
<!-- editimi e categories -->
<div class="col-sm-6">
{!!Form::model($currencies, ['method'=>'PATCH', 'action'=>['AdminCurrencyController@update', $currencies->id]]) !!}
  <div class="form-group">
    {!!Form::label('currency_name', 'Currency Name:')!!}
      {!!Form::text('currency_name', null, ['class'=>'form-control'])!!}
  </div>
  <div class="form-group">
    {!!Form::label('currency_code', 'Currency Code:')!!}
      {!!Form::text('currency_code', null, ['class'=>'form-control'])!!}
  </div>
  <div class="form-group">
    {!!Form::label('currency_symbol', 'Currency Symbol:')!!}
    {!!Form::text('currency_symbol',null, ['class'=>'form-control'] )!!}
</div>
  <div class="form-group">
    {!!Form::submit('Update Currency', ['class'=>'btn btn-primary'])!!}
  </div>
</div>
{!!Form::close()!!}
<!-- end editimi e categories -->

  <!-- /.content -->
</div>
</div>

@stop