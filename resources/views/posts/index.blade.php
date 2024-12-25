@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Posts</h2>
        <form method="GET" action="{{ route('posts.index') }}" class="mb-3 d-flex flex-wrap align-items-center">
            <input type="text" name="search" placeholder="Search by title or content" value="{{ request()->get('search') }}" class="form-control mb-2 mr-2" style="max-width: 200px;">
            <input type="date" name="start_date" value="{{ request()->get('start_date') }}" class="form-control mb-2 mr-2" style="max-width: 150px;">
            <input type="date" name="end_date" value="{{ request()->get('end_date') }}" class="form-control mb-2 mr-2" style="max-width: 150px;">
            <select name="author" class="form-control mb-2 mr-2" style="max-width: 200px;">
                <option value="">Select Author</option>
                @foreach($users as $user)
                    <option value="{{ $user->id }}" {{ request()->get('author') == $user->id ? 'selected' : '' }}>{{ $user->name }}</option>
                @endforeach
            </select>
            <button type="submit" class="btn btn-primary mt-2">Filter</button>
        </form>
        @if($posts->isEmpty())
            <p>No posts found matching the selected filters.</p>
        @endif
        <h3>All Posts</h3>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Content</th>
                    <th>Author</th>
                    <th>Image</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($posts as $post)
                <tr>
                    <td>{{ $post->title }}</td>
                    <td>{{ \Str::limit($post->content, 100) }} <a href="{{ route('posts.show', $post) }}">Read more</a></td>
                    <td>{{ $post->user->name }}</td>
                    <td><img src="{{ asset('storage/' . $post->image_path) }}" width="120px" alt="Post Image">
                    </td>
                    <td>
                        @can('update', $post)
                            <a href="{{ route('posts.edit', $post) }}" class="btn btn-sm btn-warning">Edit</a>
                        @endcan

                        @can('delete', $post)
                            <form action="{{ route('posts.destroy', $post) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                            </form>
                        @endcan
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Pagination Links -->
        <div class="d-flex justify-content-center">
            {{ $posts->links('pagination::bootstrap-4') }}
        </div>
    </div>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
@endsection
