<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    <link
      rel="stylesheet"
      href="https://use.fontawesome.com/releases/v5.15.2/css/all.css"
      integrity="sha384-vSIIfh2YWi9wW0r9iZe7RJPrKwp6bG+s9QZMoITbCckVJqGCCRhc+ccxNcdpHuYu"
      crossorigin="anonymous"
    />

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/myStyle.css') }}">
    
    <!-- Skripte -->
    
</head>



<body>
    <nav class="my-navbar">
        <div class="navbar-wrap">
        <div class="logo"><h1>Plivački klub
            Cunami</h1>
        </div>
        <div class="navbar-items">
        <a class="navbar-item" href="/">Početna</a>
        <a class="navbar-item" href="/bazeni">Bazeni</a>
        <a class="navbar-item" href="/termini">Termini</a>
        </div>
</div>
    </nav>


    <div class="container main-container">
        @yield('page-content')
    </div>
    <script src="{{ asset('js/app.js') }}"></script>
</body>

</html>
