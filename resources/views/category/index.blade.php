@extends('layouts.app')

@section('content')
<div class="col-sm-8 col-sm-offset-2">
  @if (count($category) > 0 )
    <table class="table table-striped table-hover table-condensed">
      <tr>
        <th>
          Category ID
        </th>
        <th>
          Category Name
        </th>
        <th>
          Creater Type
        </th>
        <th>
          Color Code
        </th>
      </tr>
      <tr>
        <form action="{{url('category/'.$category->id)}}" method="post">
          {!! csrf_field() !!}
          <input type="hidden" name="_method" value="put" />
          <td></td>
          <td>
            <input type="text" class="form-control" name="category_name" value="{{$category->category_name}}">
          </td>
          <td></td>
          <td>
            <input type="text" class="form-control" name="color_code" value="{{$category->color_code}}">
          </td>
          <td>
            <button type="submit" name="button" class="btn btn-primary">Submit</button>
          </td>
        </form>
      </tr>
    </table>
  @endif
</div>
@endsection
