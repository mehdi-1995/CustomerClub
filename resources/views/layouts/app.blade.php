<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>باشگاه مشتریان - @yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://vazir-fonts.github.io/Vazir-Font/dist/font-face.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Vazir', sans-serif;
            background-color: #f8f9fa;
            padding-top: 20px;
        }
    </style>
    @stack('styles')
</head>
<body>
    @include('customer-club.partials.header')

    <div class="container-fluid">
        <div class="row">
            @include('customer-club.partials.sidebar')

            <main class="col-md-9 col-lg-10 py-4">
                @yield('content')
            </main>
        </div>
    </div>

    @include('customer-club.partials.footer')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    @stack('scripts')
</body>
</html>
