<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Catatan Coding</title>

    {{-- bootstrap css --}}
    <link rel="stylesheet" href="/css/bootstrap/bootstrap.css">

    {{-- css style --}}
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    @yield('style')

    <script src="https://unpkg.com/feather-icons"></script>
</head>

<body>

    <div class="container">
        @yield('container')
    </div>

    <script>
        feather.replace()
    </script>
    {{-- js bootstrap --}}
    <script src="/js/bootstrap/bootstrap.js"></script>
</body>

</html>
