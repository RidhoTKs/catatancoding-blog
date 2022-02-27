@extends('dashboard.templates.layout')

@section('container')
    <div class="row">
        <div class="col-md-8 my-3 shadow p-3 mb-3 bg-body rounded">
            <div style="max-height: 250px; overflow: hidden;">
                @if ($post->image)
                    <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->category->name }}"
                        class="img-fluid my-3">

                @else

                    <img src="https://source.unsplash.com/1200x400?{{ $post->category->name }}"
                        alt="{{ $post->category->name }}" class="img-fluid my-3">
                @endif
            </div>
            <div class="d-flex">
                <p class="me-3"><small>created at: {{ $post->created_at->diffForHumans() }}</small></p>
                <p><small>Category : {{ $post->category->name }}</small></p>
            </div>
            <main>
                <h1>{{ $post->title }}</h1>
                {!! $post->body !!}
            </main>
        </div>

    @endsection
