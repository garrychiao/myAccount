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
  <form class="form-horizontal" action="{{ url('/myasset/'.$myasset->id)}}" method="post" role="form">
    {!! csrf_field() !!}
    <input type="hidden" name="_method" value="put" />
    <div class="form-group">
      <label class="col-sm-4 control-label">Transaction Title</label>
      <div class="col-md-6">
        <input type="text" class="form-control" name="name" value="{{ $myasset->name }}">
      </div>
    </div>
    <div class="form-group">
      <label for="category" class="col-sm-4 control-label">Choose Category</label>
      <div class="col-sm-4">
        <select name="category" class="form-control">
          @forelse($category as $list)
            <option>{{{ $list->name }}}</option>
          @empty
  	        <option>Not Categorized !</option>
          @endforelse
        </select>
      </div>
      
    </div>
    <div class="form-group">
      <label class="col-sm-4 control-label">Income</label>
      <div class="col-md-6">
        <input type="text" class="form-control" name="income" value="{{ $myasset->income }}">
      </div>
    </div>
    <div class="form-group">
      <label class="col-sm-4 control-label">Expenditure</label>
      <div class="col-md-6">
        <input type="text" class="form-control" name="expenditure" value="{{ $myasset->expenditure }}">
      </div>
    </div>
    <div class="form-group">
      <label class="col-sm-4 control-label">Remarks</label>
      <div class="col-md-6">
        <input type="text" class="form-control" name="remark" value="{{ $myasset->remark }}">
      </div>
    </div>
    <div class="form-group">
      <div class="col-md-6">
        <h1>{{ $myasset->id }}</h1>
        <input type="submit" class="btn btn-success btn-raised" value="Submit"/>
      </div>
    </div>
    <input type="hidden" name="amount" value="{{ $myasset->amount }}">
  </form>
</div>

@endsection
