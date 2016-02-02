@extends('layouts.app')

@section('content')
<div class="col-md-6">
  @if (count($errors) > 0)
  <div class="alert alert-danger">
      <ul>
          @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
          @endforeach
      </ul>
  </div>
  @endif
  <form class="form-horizontal" action="{{ url('/myasset/store')}}" method="post" role="form">
    {!! csrf_field() !!}
    @if (count($lists) >0)
    <input type="hidden" name="amount" value="{{ $lists->first()->amount }}">
    @endif
    <div class="form-group">
      <label class="col-sm-4 control-label">Transaction Title</label>
      <div class="col-md-6">
        <input type="text" class="form-control" name="name" placeholder="Transaction Title">
      </div>
    </div>
    <div class="form-group">
      <label class="col-sm-4 control-label">Income</label>
      <div class="col-md-6">
        <input type="text" class="form-control" name="income" placeholder="Income">
      </div>
    </div>
    <div class="form-group">
      <label class="col-sm-4 control-label">Expenditure</label>
      <div class="col-md-6">
        <input type="text" class="form-control" name="expenditure" placeholder="Expenditure">
      </div>
    </div>
    <div class="form-group">
      <label class="col-sm-4 control-label">Remarks</label>
      <div class="col-md-6">
        <input type="text" class="form-control" name="remark" placeholder="Remarks">
      </div>
    </div>
    <div class="form-group">
      <div class="col-md-6">
        <input type="submit" class="btn btn-default" value="Submit"/>
      </div>
    </div>
  </form>
</div>

@endsection
