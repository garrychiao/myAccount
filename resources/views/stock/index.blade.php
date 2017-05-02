@extends('layouts.app')

@section('content')
<div class="form-group label-floating col-sm-6">
  <form class="form-horizontal" action="{{ url('/stock/store')}}" method="post" role="form">
    {!! csrf_field() !!}
    <input type="text" name="StockName" class="form-control" value="" placeholder="Stock Number">
    <input type="submit" class="btn btn-success btn-raised" value="Submit"/>
  </form>
</div>
<table class="table table-hover">
  <tr>
    <th>Symbol</th>
    <th>Name</th>
    <th>Last Trade Price</th>
    <th>Last Trade Date</th>
    <th>Last Trade Time</th>
    <th>Change and Percentage Change</th>
    <th>Volumn</th>
    <th>low</th>
  </tr>
  @foreach($fetch_result as $code => $stock)
  <tr>
    <td>{{ $stock[0] }}</td>
    <td>{{ $stock[1] }}</td>
    <td>{{ $stock[2] }}</td>
    <td>{{ $stock[3] }}</td>
    <td>{{ $stock[4] }}</td>
    <td>{{ $stock[5] }}</td>
    <td>{{ $stock[6] }}</td>
    <td>{{ $stock[7] }}</td>
  </tr>
  @endforeach

</table>
@endsection
