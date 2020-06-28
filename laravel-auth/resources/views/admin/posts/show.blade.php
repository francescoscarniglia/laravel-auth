@extends('layouts.admin')

@section('content')
<div class="container">
    <h1 class="mb-4">{{ $post->title }}</h1>

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Body</th>
                <th>Created at</th>
                <th>Last update</th>
                <th colspan="3"></th>
            </tr>
        </thead>
        <tbody>
                <tr>
                    <td>{{ $post->id }}</td>
                    <td>{{ $post->title }}</td>
                    <td>{{ $post->body }}</td>
                    <td>{{ $post->created_at->format('d/m/Y - H:i')  }}</td>
                    <td>{{ $post->updated_at->diffForHumans()   }}</td>

                    <td>
                        <a class="btn btn-info" href="{{ route('admin.posts.edit', $post->id) }}"> Edit </a>
                    </td>

                    <td>
                        <form action="{{ route('admin.posts.destroy', $post->id)}}" method="POST">
                            @csrf
                            @method('DELETE')

                            <input class="btn btn-danger" type="submit" value="Delete">

                            </form>
                    </td>

                </tr>

        </tbody>
    </table>

</div>
@endsection
