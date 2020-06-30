@extends('layouts.admin')

@section('content')
<div class="container">
    <h1 class="mb-4">Edit post</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>
                        {{ $error }}
                    </li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.posts.update', $post->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PATCH')

        <div class="form-group">
          <label for="title">Title</label>
          <input class="form-control" type="text" id="title" name="title" value="{{ old('title' , $post->title) }}">
        </div>

        <div class="form-group">
            <label for="body"> Body</label>
            <textarea class="form-control"  rows="10" id="body" name="body"> {{ old('body', $post->body) }}</textarea>
        </div>

        <div class="form-group">
            <label class="d-block" for="path_img">Upload image</label>
            @isset($post->path_img)
        <img src="{{ assets('storage/' . $post->path_img) }}" alt="$post->title">

            @endisset
        </div>

        <input class="btn btn-info" type="submit" value="Edit post">

    </form>
</div>
@endsection
