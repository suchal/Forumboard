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
<div id="wrapper" class="toggled">
<div id="app">
    <!-- Sidebar -->
    <div id="sidebar-wrapper">
        <ul class="sidebar-nav">
            <li>
                <a href="#">Dashboard</a>
            </li>
            <li>
                <a href="/posts">Posts</a>
            </li>
            <li>
                <a href="/posts/create">Create Post</a>
            </li>
            <li>
                <a href="#">Messages</a>
            </li>
            <li>
                <a href="#">About</a>
            </li>
        </ul>
    </div>
    <!-- /#sidebar-wrapper -->

    <!-- Page Content -->
    <div id="page-content-wrapper">
        <div class="container-fluid">
            @include('layouts.nav')
            <div class="content">
            @yield('content')
            </div>
        </div>
    </div>
    <!-- /#page-content-wrapper -->
</div><!--#App-->
</div>
<!-- /#wrapper -->
    
        
    

    <!-- Scripts -->
    <script src="/js/all.js"></script>
    <script src="/js/app.js"></script> 
    <script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
    </script>
    @yield('scripts');
</body>
</html>
