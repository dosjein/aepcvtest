
@extends('layout')

@section('content')
<div class="container">
    <div class="row">
        @include('sidebar')

        <div class="col-md-9">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    <h1>Jauna ieraksta izveidošana</h1>

                     {{ method_field('PUT') }}

                     @if (count($errors) > 0)
                        <h2>Jūsu ievadītajos datos bija nepilnības</h2>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    @endif


                    <form action="{{ action('PostController@store') }}" method="post">
                        {{ csrf_field() }}
                        <p>
                            <label>Ieraksta virsraksts <input type="text" name="title" value="{{ old('title') }}"></label>
                            {!! $errors->first('title', '<p class="help-block">:message</p>') !!}
                        </p>
                        <p>
                            <label>Ieraksta teksts
                                <textarea name="text">{{ old('text') }}</textarea>
                            </label>
                            {!! $errors->first('text', '<p class="help-block">:message</p>') !!}
                        </p>

                        <p><input type="submit" value="Izveidot"></p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

    