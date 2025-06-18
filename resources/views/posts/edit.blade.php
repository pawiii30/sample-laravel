@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>{{ $post->title }}</h2>
        <p>{{ $post->content }}</p>
        <p><strong>Created at:</strong> {{ $post->created_at->format('d M Y, H:i') }}</p>
        <form action="{{ route('posts.update', $post) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ $post->title }}" required>
            </div>
            <div class="mb-3">
                <label for="content" class="form-label">Content</label>
                <textarea class="form-control" id="content" name="content" rows="3" required>{{ $post->content }}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">Update Post</button>
        </form>
    </div>
@endsection