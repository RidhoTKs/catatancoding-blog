@extends('dashboard.templates.layout')

@section('container')
    <div class="col-lg-8">
        @if (session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
    </div>
    <a href="/dashboard/category/create" class="btn btn-primary my-3">Create New Category</a>
    <div class="table-responsive col-lg-8">
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Category</th>
                    <th class="fit" scope="col">Number of Post</th>
                    <th class="text-center" scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $category->name }}</td>
                        <td class="text-center fit">{{ $category->post->count() }}</td>
                        <td class="d-flex justify-content-center"><a class=" badge bg-warning"
                                href="/dashboard/category/{{ $category->id }}/edit"> <span data-feather="edit"></span></a>
                            <form action="/dashboard/category/{{ $category->id }}" method="post" class="d-inline">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="badge bg-danger border-0 ms-3"
                                    onclick="return confirm('Are You Sure')"><span data-feather="trash-2"></span></button>
                            </form>
                        </td>

                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
