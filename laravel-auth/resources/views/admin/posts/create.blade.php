@extends('layouts.admin')

@section('content')
<div class="container">
    <h1 class="mb-4">New post</h1>

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

    <form action="{{ route('admin.posts.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('POST')

        <div class="form-group">
          <label for="title">Title</label>
          <input class="form-control" type="text" id="title" name="title" value="{{ old('title') }}">
        </div>

        <div class="form-group">
            <label for="body">Body</label>
            <textarea class="form-control"  rows="10" id="body" name="body"> {{ old('body') }}</textarea>
        </div>

        <div class="form-group">
            <label for="path_img">Upload image</label>
            <input class="form-control" type="file" id="path_img" name="path_img" accept="image/*">
        </div>

        <input class="btn btn-info" type="submit" value="Create post">

    </form>
</div>
@endsection
