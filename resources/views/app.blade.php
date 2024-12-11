<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css" integrity="sha512-5Hs3dF2AEPkpNAR7UiOHba+lRSJNeM2ECkwxUIxC1Q/FLycGTbNapWXB4tP889k5T5Ju8fs4b1P5z/iB4nMfSQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>{{ env('APP_NAME') }}</title>
    <link rel="stylesheet" href="/build/assets/app.css">
    <link rel="stylesheet" href="/build/assets/style_thad.css">
</head>
<body>
    <div class="min-vh-120 d-flex flex-column" style="overflow-x: hidden; margin: 0; padding: 0; width: 100%; max-width: 2000px;">
        @yield('header')
        @yield('content')
        <div class="mt-auto">
            @yield('footer')
        </div>
    </div>
    <script src="/build/assets/app.js"></script>
</body>
</html>
