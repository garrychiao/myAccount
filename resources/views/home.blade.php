@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-info">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    <a href="/myasset" class="btn btn-info btn-raised">View My Assets</a>
                    <a href="/stock" class="btn btn-info btn-raised">Stock</a>
                </div>


            </div>
        </div>
    </div>
</div>
@endsection
