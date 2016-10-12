<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!-- Styles -->
    <link href="/css/all.css" rel="stylesheet">
    <link href="/css/app.css" rel="stylesheet">


    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
            'api_token' => Auth::user()->api_token ?? ''
        ]); ?>;
    </script>
</head>
<body>
<div id="app">
    @include('layouts.nav')
    <div class="content">
    @yield('content')
    </div>
</div>
    
        
    

    <!-- Scripts -->
    <script src="/js/all.js"></script>
    <script src="/js/app.js"></script> 
    @yield('scripts');
</body>
</html>
