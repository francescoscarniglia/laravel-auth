@extends('layouts.admin')

@section('content')

    <div class="container">
        <div class="row">


                <h1 class="mb-4">{{ $post->title }}</h1>
                <div class="col-sm-12">
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
            </div>{{-- row --}}
            <div class="row">
                <div class="col-sm-8 offset-sm-2">
                    <h3 class="mb-4">Post image</h3>

                    @if (!empty($post->path_img))
                        <img class="img-thumbnail" src="{{ asset('storage/' . $post->path_img) }}" alt="$post->title">
                    @else
                        <div class="no-text-img">No image</div>
                    @endif
                </div>
            </div>

        </div>

@endsection
