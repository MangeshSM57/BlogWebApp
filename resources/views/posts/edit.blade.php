@extends('layouts.app')

@section('content')

<div class="card p-4 shadow">
    <h3>Edit Post</h3>

    <form method="POST" action="{{ route('posts.update',$post->id) }}">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <input type="text" name="title" 
                   class="form-control" 
                   value="{{ $post->title }}">
        </div>

        <div class="mb-3">
            <textarea name="content" 
                      class="form-control">{{ $post->content }}</textarea>
        </div>

        <button class="btn btn-primary">Update</button>
    </form>
</div>

@endsection