@extends('layouts.app')

@section('content')
<div class="col-md-12">
  @if (count($lists) > 0)
<div class="col-sm-12">
  <div class="col-sm-4">
  <p>
    <a href="/myasset/create" class="btn btn-success btn-raised">Create a New Transaction</a>
  </p>
  </div>
<div class="col-sm-4">
  <h1>Your Assets ${{$lists->first()->amount}}</h1>
</div>
<div class="col-sm-4">
  <div class="form-group">
    <label for="select111" class="col-sm-2 control-label">Category List</label>
    <div class="col-sm-4">
      <select id="select_category" name="category" class="form-control">
        @forelse($category as $list)
          <option>{{{ $list->name }}}</option>
        @empty
          <option>Not Categorized !</option>
        @endforelse
      </select>
    </div>
    <div class="col-sm-2">
      <button type="button" class="btn btn-default btn-sm btn-raised" name="button" onclick="javascript:location.href='/category'" >Edit</button>
    </div>
  </div>
</div>
</div>
  <div>
    <table class="table table-striped table-hover" id="myasset_table" datatable="">
    <thead>
    <tr>
      <th>Transaction Title</th>
      <th>Category</th>
      <th>Income</th>
      <th>Expenditure</th>
      <th>Total</th>
      <th>Created On</th>
      <th>Remark</th>
      <th>Actions</th>
      <th></th>
    </tr>
    </thead>
    <tbody>
    @foreach ($lists as $list)

      <tr>
        <td>
          <a>{{ $list->name }}</a>
        </td>
        <td>
          {{ $list->category }}
        </td>
        <td>
          {{ $list->income }}
        </td>
        <td>
          {{ $list->expenditure }}
        </td>
        <td>
          {{ $list->amount }}
        </td>
        <td>
          {{ date(" h:m:s , F d, Y", strtotime($list->created_at)) }}
        </td>
        <td>
          {{ $list->remark }}
        </td>
        <td>
          <a class="btn btn-success" href="{{ URL::route('myasset.edit', $list->id) }}">Edit</a>
        </td>
        <td>
          <form class="form-horizontal" action="{{ url('/myasset/'.$list->id)}}" method="post" role="form">
            {!! csrf_field() !!}
            <input type="hidden" name="_method" value="delete" />
            <input type="submit" class="btn btn-danger" value="Delete">
          </form>

        </td>
      </tr>
    @endforeach
    </tbody>
    </table>
  </div>
  @else

  @endif
</div>

@endsection
