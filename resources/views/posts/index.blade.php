@extends('layouts.app')
@php use Illuminate\Support\Str; @endphp
@section('content')

<h2 class="mb-4">All Posts</h2>

<div class="row">
@foreach($posts as $post)

    <div class="col-md-4 mb-4">
        <div class="card shadow-sm">
            <p class="ard-title">Posted by:{{ $post->user->name }}</p>
            <p class="ard-title">posted on: {{ $post->created_at ->format('D M Y') }}</p>

            @if($post->image)
                <img src="{{ asset('storage/'.$post->image) }}" 
                     class="card-img-top" 
                     style="height:200px; object-fit:cover;">
            @endif

            <div class="card-body">

                <h5 class="card-title">{{ $post->title }}</h5>

               <p class="ard-title">{{ Str::limit($post->content, 150) }}</p>

                <a href="{{ route('posts.show',$post->id) }}" 
                   class="btn btn-primary btn-sm">
                   Read-More
                </a>

                <a href="{{ route('posts.edit',$post->id) }}" 
                   class="btn btn-warning btn-sm">
                   Edit
                </a>

                <form action="{{ route('posts.destroy',$post->id) }}" 
                      method="POST" 
                      class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm">Delete</button>

                </form>

                @php
                $liked = $post->likes()
                   ->where('user_id', auth()->id())
                   ->exists();
                @endphp

                <form action="{{ route('posts.like',$post->id) }}" 
                    method="POST" 
                    class="d-inline">
                @csrf

                <button type="submit" 
                    class="like-btn btn btn-sm {{ $liked ? 'btn-success' : 'btn-outline-success' }}"
                    {{ $liked ? 'disabled' : '' }}>
                    <i class="fa-thumbs-up {{ $liked ? 'fa-solid' : 'fa-regular' }}"></i>
                    {{ $post->likes()->count() }}
                </button>
                </form>
            </div>

        </div>
    </div>

@endforeach
</div>

@endsection