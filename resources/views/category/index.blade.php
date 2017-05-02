@extends('layouts.app')

@section('content')
<div class="col-sm-8 col-sm-offset-2">
  @if (count($errors) > 0)
  <div class="alert alert-danger">
      <ul>
          @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
          @endforeach
      </ul>
  </div>
  @endif
  @if (count($categories) > 0 )

    <table class="table table-striped table-hover table-condensed">
      <tr>
        <th>
          Category ID
        </th>
        <th>
          Category Name
        </th>
        <th>
          Creater ID
        </th>
        <th>
          Action
        </th>
      </tr>
      @foreach($categories as $category)
        <tr>
          <td>
            {{$category->id}}
          </td>
          <td>
            {{$category->name}}
          </td>
          <td>
            {{$category->creater_id}}
          </td>
          <td>
            <form class="form-horizontal" action="{{ url('/category/'.$category->id)}}" method="post" role="form">
              {!! csrf_field() !!}
              <input type="hidden" name="_method" value="delete" />
              <input type="submit" class="btn btn-danger btn-sm btn-raised" value="Delete">
            </form>
          </td>
        </tr>
      @endforeach
    </table>

  @endif
  <form class="form-horizontal" action="{{ url('/category/store')}}" method="post" role="form">
    {!! csrf_field() !!}
    <div class="form-group">
      <label class="col-sm-4 control-label">Category Name</label>
      <div class="col-sm-6">
        <input type="text" class="form-control" name="name" placeholder="Add...">
      </div>
    </div>
    <div class="form-group">
      <div class="col-sm-6">
        <input type="submit" class="btn btn-success btn-raised" value="Submit"/>
        <input type="submit" class="btn btn-danger btn-raised" value="Cancel" onclick="goBack()"/>
      </div>
    </div>
  </form>
</div>
<script>
function goBack() {
    window.history.back();
}
</script>
@endsection
