@extends('layouts.app')

@section('content')

<div class="col-md-12">

  <p>
    <a href="/myasset/create" class="btn btn-success">Create a New Transaction</a>
  </p>
@if (count($lists) > 0)
<h1>Your Assets ${{$lists->first()->amount}}</h1>


    <table class="table table-striped">
    <thead>
    <tr>
      <th>Transaction Title</th>
      <th>Income</th>
      <th>Expenditure</th>
      <th>Total</th>
      <th>Created On</th>
      <th>Remark</th>
      <th></th>
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
          {{ $list->income }}
        </td>
        <td>
          {{ $list->expenditure }}
        </td>
        <td>
          {{ $list->amount }}
        </td>
        <td>
          {{ date("F d, Y", strtotime($list->created_at)) }}
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
    
  @else

  @endif
</div>

@endsection
