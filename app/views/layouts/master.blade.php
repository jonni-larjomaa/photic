<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title>Photic</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <meta description="Laravel based image gallery" />

        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
        <!-- Optional theme -->
        <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">
            
        @yield('prepend-css')
        <link rel="stylesheet" href="css/style.css">
        @yield('append-css')

        <!-- Latest compiled and minified JavaScript -->
        <script src="//code.jquery.com/jquery-2.1.4.min.js"></script>
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
        
        @yield('prepend-js')
        <script src="js/gallery.js"></script>
        @yield('append-js')


    </head>
    <body>
        @include('menu')
        @yield('content')
    </body>
</html>


