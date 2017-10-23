@extends('layout')

@section('content')
<div class="container">
    <div class="row">
        @include('sidebar')

        <div class="col-md-9">
            <div class="panel panel-default">
                <div class="panel-heading">Dienasgrāmatas ieraksts {{ $post->id }} (<a href="{{ action('PostController@edit', $post) }}">Labot šo ierakstu</a>)</div>



                    <h2>{{ $post->title }}</h2>
                    <p>{{ $post->text }}</p>


                    <h1>Komentāri</h1>

                    <table class="table table-borderless">
                        <thead>
                            <tr>
                                <th>Email</th>
                                <th>Datums</th>
                                <th>Datums</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($post->comments as $comment)
                            <tr>
                                <td>{{ $comment->email }}</td>
                                <td>{{ $comment->created_at }}</td>
                                <td>{{ $comment->comment }}</td>
                                <td>

                                    <form action="{{ action('CommentController@block' , $comment->email) }}" method="POST">
                                        <input name="_method" type="hidden" value="DELETE">
                                        {{ csrf_field() }}
                                        <button class="btn btn-danger btn-xs" type="submit" class="fa fa-trash-o" onclick='return confirm("Confirm block?")' >block this person</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                    <form action="{{ action('CommentController@store', $post) }}" method="post">
                        <h2>Komentēt</h2>
                        {{ csrf_field() }}

                          <div class="form-group">
                            <label for="email">Tavs epasts:</label>
                            <input value="{{ old('email') }}" type="email" class="form-control" id="email">
                          </div>

                          <div class="form-group">
                            <label for="email">Tavs komentārs:</label>
                            <textarea class="form-control" name="comment">{{ old('comment') }}</textarea>
                          </div>

                        </p>
                        <p><input type="submit" value="Komentēt"></p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
