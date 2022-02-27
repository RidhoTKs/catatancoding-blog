@extends('dashboard.templates.layout')

@section('style')
    <!-- Custom styles for this template -->


@endsection



@section('container')


    <h2>Post</h2>

    <div class="col-lg-8">
        @if (session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
    </div>

    <a href="/dashboard/post/create" class="btn btn-primary my-3">Create New Post</a>
    <div class="table-responsive col-lg-8">
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Title</th>
                    <th scope="col">Category</th>
                    <th scope="col">action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($posts as $post)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td class="col-lg-6">{{ $post->title }}</td>
                        <td>{{ $post->category->name }}</td>
                        <td><a class=" badge bg-primary" href="/dashboard/post/{{ $post->slug }}"><span
                                    data-feather="eye"></span></a>
                            <a class=" badge bg-warning" href="/dashboard/post/{{ $post->slug }}/edit"> <span
                                    data-feather="edit"></span></a>

                            <form action="/dashboard/post/{{ $post->slug }}" method="post" class="d-inline">
                                @method('delete')
                                @csrf
                                <button type="submit" class="badge bg-danger border-0"
                                    onclick="return confirm('Are You Sure')"><span data-feather="trash-2"></span></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
