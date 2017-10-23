@extends('layout')

@section('content')
<div class="container">
    <div class="row">
        @include('sidebar')

        <div class="col-md-9">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    <h4><a href="{{ action('PostController@index') }}">Ieraksti</a></h4>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
