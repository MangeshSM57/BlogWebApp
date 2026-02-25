@extends('layouts.app')

@section('content')

<div class="card shadow mb-4">
    @if($post->image)
        <img src="{{ asset('storage/'.$post->image) }}" 
             class="card-img-top"
             style="height:350px; object-fit:cover;">
    @endif

    <div class="card-body">
        <h3>{{ $post->title }}</h3>
        <p>{{ $post->content }}</p>
    </div>
</div>

{{-- Comments Section --}}
<div class="card p-3 shadow">
    <h5>Comments</h5>

    @forelse($post->comments as $comment)
        <div class="border p-2 mb-2 rounded">
            {{ $comment->comment }}
        </div>
    @empty
        <p>No comments yet.</p>
    @endforelse

    <hr>

    <form method="POST" action="{{ route('comments.store',$post->id) }}">
        @csrf

        <div class="mb-3">
            <textarea name="comment" 
                      class="form-control" 
                      placeholder="Write your comment"></textarea>
        </div>

        <button class="btn btn-primary btn-sm">Add Comment</button>
    </form>
</div>

@endsection