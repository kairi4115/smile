<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        <!--@vite(['resources/css/app.css', 'resources/js/app.js']) -->
        <script src="{{ asset('/js/app.js') }}"></script>
        <script src="{{ asset('/js/bowel.js') }}"></script>
        <!--<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> -->
        <script src="https://kit.fontawesome.com/2e4b86039b.js" crossorigin="anonymous"></script>

        <!-- style -->
        <link href="{{asset('css/smilechildren.css') }}" rel="stylesheet">

        <!-- Bootstrap 5 CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

         <!-- Bootstrap 5 JS, Popper.js, and jQuery -->
      <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
    </head>
    <body>
    <div id="app">
        
        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
          