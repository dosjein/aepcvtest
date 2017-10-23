@extends('layout')

@section('content')
<div class="container">
    <div class="row">
        @include('sidebar')

        <div class="col-md-9">
            <div class="panel panel-default">
                <div class="panel-heading">Ieraksti</div>

                <div class="panel-body">
                    <table class="table table-borderless">
					    <thead>
					        <tr>
					            <th>ID</th><th>Post Id</th><th>Created At</th><th>Actions</th>
					        </tr>
					    </thead>
					    <tbody>
					    @foreach ($posts as $post)
					        <tr>
					            <td>{{ $post->id }}</td>
					            <td>{{ $post->title }}</td>
					            <td>{{ $post->created_at }}</td>
					            <td>{{ $post->updated_at }}</td>
					            <td>
					                <a href="{{ action('PostController@show', $post->id) }}" title="View"><button class="btn btn-info btn-xs"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
					                <a href="{{ action('PostController@edit', $post->id) }}" title="Edit"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

					                <form action="{{ action('PostController@destroy' , $post->id) }}" method="POST">
					                	<input name="_method" type="hidden" value="DELETE">
					                	{{ csrf_field() }}
					                	<button class="btn btn-danger btn-xs" type="submit" onclick='return confirm("Confirm delete?")' >Delete</button>
					                </form>
					            </td>
					        </tr>
					    @endforeach
					    </tbody>
					</table>
					<p><a href="{{ action('PostController@create') }}">Pievienot jaunu ierakstu</a></p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
