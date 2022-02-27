@extends('templates.layout')

@section('style')
    <link rel="stylesheet" href="{{ asset('/css/showpost.css') }}">
@endsection

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
                <p><small>Category : <a
                            href="/?category={{ $post->category->slug }}">{{ $post->category->name }}</a></small></p>
            </div>
            <main>
                <h1>{{ $post->title }}</h1>
                {!! $post->body !!}
            </main>
        </div>

        <div class="col-md-4 my-3">
            <div class="col">
                <div class="card-category" id=" card-category">
                    <h2>Category</h2>
                    <ul class="list-group">
                        @foreach ($categories as $category)

                            <li class="list-group-item mb-3 " id="list-item-category">
                                <div class="backgroundEffect"></div>
                                <a href="/?category={{ $category->slug }}" class="link-item">
                                    {{ $category->name }}
                            </li>
                            </a>
                        @endforeach
                    </ul>
                </div>
            </div>
            @include('partials.aboutme')
        </div>

    @endsection
