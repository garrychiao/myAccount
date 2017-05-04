@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <div class="panel panel-info">
                <div class="panel-heading">Setup Panel</div>
                <div class="panel-body">
                  <div class="col-sm-8">
                    <div class="panel panel-warning">
                      <div class="panel-heading">
                        Category Setup
                      </div>
                      <div class="panel-body">
                        <form action="{{ url('category') }}" method="post">
                          {{ csrf_field() }}
                          <div class="col-sm-4">
                            <input type="text" class="form-control" name="category_name" placeholder="Category Title" required>
                          </div>
                          <div class="col-sm-3">
                            <select class="form-control" name="category_type">
                              <option value="0" selected="true">Expenditure</option>
                              <option value="1">Income</option>
                            </select>
                          </div>
                          <div class="col-sm-3">
                            <input type="text" class="form-control" name="color_code" placeholder="Color Code" required>
                          </div>
                          <div class="col-sm-2">
                            <input type="submit" class="btn btn-primary btn-block form-control btn-raised" value="Submit">
                          </div>
                        </form>
                        <!--Insert Category Form ENDS-->
                        <div class="col-sm-12">
                          <hr>
                        </div>
                        <!--Category Table-->
                        <div class="col-sm-12">
                          <table class="table table-striped table-condensed">
                            @if(count($categories)>0)
                              <tr>
                                <th class="col-sm-3">Category Name</th>
                                <th class="col-sm-3">Type</th>
                                <th class="col-sm-3">Color</th>
                                <th class="col-sm-1"></th>
                              </tr>
                              @foreach($categories as $category)
                                <tr>
                                  <form action="{{ url('category/'.$category->id) }}" method="post">
                                    <input type="hidden" name="_method" value="put" />
                                    {{ csrf_field() }}
                                    <td>
                                      <input class="form-control" type="text" name="category_name" value="{{ $category->category_name }}"                                    </td>
                                    <td>
                                      <select class="form-control" name="category_type">
                                        <option value="0" @if( $category->category_type == 0) selected @endif>Expenditure</option>
                                        <option value="1" @if( $category->category_type == 1) selected @endif>Income</option>
                                      </select>
                                    </td>
                                    <td>
                                      <input class="form-control" type="text" name="color_code" value="{{ $category->color_code }}">
                                    </td>
                                    <td>
                                      <button type="submit" class="btn btn-block btn-success">Submit</button>
                                    </form>
                                    <form action="{{ url('category/'.$category->id )}}" method="post" role="form">
                                      {!! csrf_field() !!}
                                      <input type="hidden" name="_method" value="delete" />
                                      <input type="submit" class="btn btn-block btn-danger" value="Delete">
                                    </form>
                                    </td>
                                </tr>
                              @endforeach
                            @endif
                          </table>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
