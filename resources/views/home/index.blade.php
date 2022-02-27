@extends('templates.layout')

@section('container')
    {{-- jumbotron --}}
    <div class="row d-flex shadow p-3 mb-3 bg-body rounded px-0 ">
        <div class="col-md-8 position-relative">
            <div class="position-absolute px-3 py-2 text-white" style="background-color: rgba(217, 83, 79, 0.6)"><a
                    class="text-white text-decoration-none" href="">{{ $post->category->name }}</a></div>
            @if ($post->image)
                <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->category->name }}"
                    class="img-fluid my-3">
            @else
                <img src="https://source.unsplash.com/740x400?{{ $post->category->name }}"
                    alt="{{ $post->category->name }}" class="img-fluid my-3">
            @endif
        </div>

        <div class="col-md-4 jumbotron-desc">
            <p><small>{{ $post->created_at->diffForHumans() }}</small></p>
            <h3>{{ $post->title }}</h3>
            <p>{{ $post->excerpt }}</p>
            <p><small>Category : {{ $post->category->name }}</small></p>

            <a class="read-more" href="/post/{{ $post->slug }}">read more <i data-feather="arrow-right"></i></a>
        </div>
    </div>

    <div class="row">
        {{-- category navigation --}}
        <nav class="navbar navbar-expand-lg navbar-light bg-danger mb-3 p-0">
            <div class="container-fluid">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 navigation">
                        <li class="nav-item navigation-tem">
                            <a class="nav-link link-navigation {{ request('category') === null ? 'active' : 'not-active' }}"
                                href="/">All
                                post</a>
                        </li>
                        @foreach ($categories as $category)
                            <li class="nav-item navigation-tem">
                                <a class="nav-link link-navigation {{ request('category') == $category->slug ? 'active' : '' }}"
                                    aria-current="page"
                                    href="/?category={{ $category->slug }}">{{ $category->name }}</a>
                            </li>
                        @endforeach
                    </ul>
                    <form class="d-flex p-1" action="/">
                        @if (request('category'))
                            <input type="hidden" name="category" value="{{ request('category') }}">
                        @endif
                        <input class="form-control me-2" type="search" placeholder="Search" name="search"
                            value="{{ request('search') ?? '' }}">
                        <button class="btn btn-outline-dark" type="submit">Search</button>
                    </form>
                </div>
            </div>
        </nav>
        {{-- main content --}}
        <div class="col-md-8">
            @if ($posts->count())

                <div class="row">
                    @foreach ($posts as $post)
                        <div class="col-sm-6 mb-3">
                            {{-- card content --}}
                            <div class="card shadow mb-3 bg-body rounded">
                                <div class="backgroundEffect"></div>
                                <div class="position-absolute px-3 py-2 text-white"
                                    style="background-color: rgba(217, 83, 79, 0.6)"><a
                                        class="text-white text-decoration-none"
                                        href="/?category={{ $post->category->slug }}">{{ $post->category->name }}</a>
                                </div>
                                @if ($post->image)
                                    <img src=" {{ asset('storage/' . $post->image) }}" class="card-img-top" alt="...">
                                @else

                                    <img src=" https://source.unsplash.com/700x400?{{ $post->category->name }}"
                                        class="card-img-top" alt="...">
                                @endif
                                <div class="card-body">
                                    <h5 class="card-title"><a
                                            href="/post/{{ $post->slug }}">{{ $post->title }}</a></h5>
                                    <p class="card-text">{{ Str::limit($post->excerpt, 100, '...') }}</p>
                                    <p><small>created : {{ $post->created_at->diffForhumans() }}</small></p>
                                    <a class="read-more" href="/post/{{ $post->slug }}">read more <i
                                            data-feather="arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="d-flex justify-content-center">
                    {{ $posts->links() }}
                </div>
            @else
                <p>no post</p>
            @endif
        </div>

        {{-- about me --}}
        @include('partials.aboutme')
        {{-- <div class="col-md-4 position-relative about-me">
            <h2>About Me</h2>
            <img src="../img/foto benang stokel.jpg" class="rounded-circle" style="width: 200px; height: 200px" alt="">
            <P>Ridho Tri Kurniasandi</P>
            <ul class="d-flex justify-content-center">
                <li><a href=""><i data-feather="facebook"></i></a></li>
                <li><a href=""><i data-feather="instagram"></i></a></li>
                <li><a href=""><i data-feather="github"></i></a></li>
            </ul>
        </div> --}}
    </div>
@endsection
