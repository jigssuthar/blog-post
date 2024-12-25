
@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<div class="container">
    <h1>Create Post</h1>

    <!-- Create Post Form -->
    <form action="{{ route('posts.update', $post->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <!-- Title Input -->
        <div class="form-group">
            <label for="title">Title:</label>
            <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror"  value="{{ $post->title }}" required>
            
            <!-- Error Message for Title -->
            @error('title')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Content Input -->
        <div class="form-group">
            <label for="content">Content:</label>
            <textarea name="content" id="content" class="form-control @error('content') is-invalid @enderror" required>{{ $post->title }}</textarea>

            <!-- Error Message for Content -->
            @error('content')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Image Upload -->
        <div class="form-group">
            <label for="image">Image:</label>
            <input type="file" name="image" id="image" class="form-control-file @error('image') is-invalid @enderror">
            
            <!-- Error Message for Image -->
            @error('image')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Submit Button -->
        <button type="submit" class="btn btn-primary">Update Post</button>
    </form>
</div>
@endsection
