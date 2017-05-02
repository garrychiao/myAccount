@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <div class="panel panel-info">
                <div class="panel-heading">Setup Panel</div>
                <div class="panel-body">
                  <div class="col-sm-6">
                    <div class="panel panel-warning">
                      <div class="panel-heading">
                        Category Setup
                      </div>
                      <div class="panel-body">
                        <form action="{{ url('category') }}" method="post">
                          {{ csrf_field() }}
                          <div class="col-sm-5">
                            <input type="text" class="form-control" name="category_name" placeholder="Category Title" required>
                          </div>
                          <div class="col-sm-4">
                            <select class="form-control" name="category_type">
                              <option value="0" selected="true">Expenditure</option>
                              <option value="1">Income</option>
                            </select>
                          </div>
                          <div class="col-sm-3">
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
                                <th>Category Name</th>
                                <th>Type</th>
                              </tr>
                              @foreach($categories as $category)
                              <tr>
                                <td>{{ $category->category_name }}</td>
                                <td>
                                  @if( $category->category_type == 0)
                                  Expenditure
                                  @else
                                  Income
                                  @endif
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
