<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard</title>

    {{-- bootstrap dan style template --}}
    <link href="{{ asset('/css/dashboard/dashboard.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/dashboard/category/style.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/bootstrap/bootstrap.css') }}" rel="stylesheet">

    @yield('style')
    {{-- feather icon script --}}
    <script src="https://unpkg.com/feather-icons"></script>


</head>

<body>

    {{-- header --}}
    @include('dashboard.partials.navbar')

    {{-- sidebar --}}
    @include('dashboard.partials.sidebar')

    <div class="container-fluid">
        <div class="row">
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                @yield('container')
            </main>
        </div>
    </div>

    @yield('script')
    {{-- feather icon --}}
    <script>
        feather.replace()
    </script>
    {{-- js bootstrap --}}
    <script src="/js/bootstrap/bootstrap.js"></script>
</body>

</html>
