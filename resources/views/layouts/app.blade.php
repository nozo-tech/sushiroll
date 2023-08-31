<!DOCTYPE html>
<html>
    <head>
        <title>@yield('title') - Sushiroll</title>

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body>
        <main>
            @yield('main')
        </main>
    </body>
</html>
