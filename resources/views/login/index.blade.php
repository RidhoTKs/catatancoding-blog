@extends('templates.layout')

@section('style')
    <link rel="stylesheet" href="{{ asset('/css/login/style.css') }}">
@endsection

@section('container')
    <div class="wrapper">
        <div class="logo">
            <img src="{{ asset('/img/foto benang stokel.jpg') }}" alt="">
        </div>
        <div class="text-center name">Catatan Coding</div>

        <form action="/admin-login" method="POST" class="p-3 mt-4">
            @csrf
            <div class="form-field d-flex align-items-center">
                <span data-feather="user"></span>
                <input type="text" name="email" id="email" placeholder="email">
            </div>

            <div class="form-field d-flex align-items-center">
                <span data-feather="key"></span>
                <input type="password" name="password" id="password" placeholder="password">
            </div>

            <button type="submit" class="btn mt-3">Login</button>
        </form>
    </div>
@endsection
