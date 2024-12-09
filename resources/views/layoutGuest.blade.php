<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }
        .navbar {
            background-color: #5a995a;
            padding: 10px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .navbar a {
            color: white;
            text-decoration: none;
            font-weight: bold;
            margin-left: 15px;
        }
        .navbar a:hover {
            text-decoration: underline;
        }
        .navbar .brand {
            font-size: 1.5rem;
            color: #F4B183;
        }
        main {
            flex-grow: 1;
        }
        footer {
            background-color: #f1f1f1;
            padding: 15px;
            text-align: center;
            font-size: 0.9rem;
        }
    </style>
</head>
<body>
    <header>
        <div class="navbar">
            <a href="{{ route('login') }}" class="brand">NOVERTY</a>
            <div>
                <a href="{{ route('about') }}">ABOUT</a>
                <a href="{{ route('login') }}">LOGIN</a>
                <a href="{{ route('register') }}">REGISTER</a>
            </div>
        </div>
    </header>
    
    <main class="container-fluid p-0">
        @yield('content')
    </main>
    
    <footer>
        &copy; 2024 Web Programming. All rights reserved.
    </footer>
    
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>