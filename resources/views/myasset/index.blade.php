@extends('layouts.app')

@section('content')
<div class="col-sm-12">
  <div class="col-sm-10 col-sm-offset-1">
    <form action="{{ url('myasset') }}" method="post">
      {{ csrf_field() }}
      <div class="col-sm-3">
        <input type="text" class="form-control" name="title" placeholder="Title" required>
      </div>
      <div class="col-sm-2">
        <input type="number" min="0" step="1" name="amount" value="0" placeholder="amount" class="form-control">
      </div>
      <div class="col-sm-3">
        <input type="date" name="date" class="form-control" value="{{ date('Y-m-d') }}">
      </div>
      <div class="col-sm-2">
        <select class="form-control" name="category_id">
          @forelse($categories as $category)
          <option value="{{$category->id}}">{{$category->category_name}}</option>
          @empty
          <option>Nothing Yet!</option>
          @endforelse
        </select>
      </div>
      <div class="col-sm-2" style="padding-top:17px;">
        <button type="submit" class="btn btn-success btn-raised form-control btn-block">Submit</button>
      </div>
    </form>
  </div>
  <div class="col-sm-12">
    <hr>
  </div>
  <div class="col-sm-10 col-sm-offset-1">
    <div id='calendar'></div>
  </div>
</div>
@endsection

@section('javascript')
  @include('js/calendar')
@endsection
