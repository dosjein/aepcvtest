@extends('layout')

@section('content')
<div class="container">
    <div class="row">
        @include('sidebar')

        <div class="col-md-9">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    <h1>Ieraksta {{ $post->id }} labošana</h1>


                     @if (count($errors) > 0)
                        <h2>Jūsu ievadītajos datos bija nepilnības</h2>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    @endif


                    <form action="{{ action('PostController@update', $post) }}" method="post">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}
                        <p>
                            <label>Ieraksta virsraksts <input type="text" name="title" value="{{ old('title', $post->title) }}"></label>
                        </p>
                        <p>
                            <label>Ieraksta teksts
                                <textarea name="text">{{ old('text', $post->text) }}</textarea>
                            </label>
                        </p>
                        <p><input type="submit" value="Izveidot"></p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
    