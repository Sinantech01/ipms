<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="{{ asset('images/logo.png')}}" type="image/x-icon">
    <meta name="keywords" content="bootstrap, bootstrap5" />
   
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEJvXlP2rD8XhYzLC+b+sPUZcbFxfjL6ZnFcJpugZOS9WZVgOsy9Vm/Jc9LsD" crossorigin="anonymous">

    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@400;500;600;700&display=swap" rel="stylesheet" />

    <link rel="stylesheet" href="{{ asset('assets/fonts/icomoon/style.css')}}" />
    <link rel="stylesheet" href="{{ asset('assets/fonts/flaticon/font/flaticon.css')}}" />

    <link rel="stylesheet" href="{{ asset('assets/css/tiny-slider.css')}}" />
    <link rel="stylesheet" href="{{ asset('assets/css/aos.css')}}" />
    <link rel="stylesheet" href="{{ asset('assets/css/style.css')}}" />

    <title>IPMS</title>
    <!-- Scripts -->
    <!-- @vite(['resources/css/app.css', 'resources/js/app.js']) -->

</head>
 
<body>
    @include('layouts.nav')

    
    <main>
        @yield('content')
    </main>

    @include('layouts.footer')

    <!-- Preloader -->
    <div id="overlayer"></div>
    <div class="loader">
        <div class="spinner-border" role="status">
            <span class="visually-hidden">Loading...</span>
        </div>
    </div>

    <!-- @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @elseif(session('error'))
    <div class="alert alert-error alert-dismissible fade show" role="alert">
        {{ session('error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif -->

    @if (session('success'))
        <script>
            document.addEventListener("DOMContentLoaded", function () {
                alert("{{ session('success') }}");
            });
        </script>
    @endif

    @if (session('error'))
        <script>
            document.addEventListener("DOMContentLoaded", function () {
                alert("{{ session('error') }}");
            });
        </script>
    @endif

    <script src="{{ asset('assets/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{ asset('assets/js/tiny-slider.js')}}"></script>
    <script src="{{ asset('assets/js/aos.js')}}"></script>
    <script src="{{ asset('assets/js/navbar.js')}}"></script>
    <script src="{{ asset('assets/js/counter.js')}}"></script>
    <script src="{{ asset('assets/js/custom.js')}}"></script>
    
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz4fnFO9gyb.5DXc6f3v5jQ1a0nXj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-cmQbFdV8OtdKj52sQncs7Mb3Ba+qu3xF2Ql3pkjTc65S4e8f5Ay4YTw0SOHH59Zu" crossorigin="anonymous"></script>
</body>
</html>
