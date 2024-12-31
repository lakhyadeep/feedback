<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.3/css/font-awesome.css">
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
        rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet" media="all">


    <title>{{ $title ?? 'Page Title' }}</title>

</head>

<body>

    <div class="main-wrapper">

        <div class="header">
            <a href="{{ route('home') }}" class="link-dark">
                <div class="logo"><img src="{{ asset('images/logo.png') }}" alt="" class="img-fluid">
                    <strong>Dibrugarh Municipal Corporation</strong>
                </div>
            </a>
        </div>

        <div class="section-body">
            <div class="container">

                {{ $slot }}

            </div>
        </div>

        <div class="footer">
            <div class="container text-center">
                &copy; {{ date('Y') }} Dibrugarh Municipal Corporation.
            </div>
        </div>

    </div>
</body>

</html>
