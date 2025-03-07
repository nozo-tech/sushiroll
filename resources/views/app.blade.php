<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
        <link rel="manifest" href="/site.webmanifest">
        <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#5bbad5">
        <meta name="apple-mobile-web-app-title" content="Sushiroll">
        <meta name="application-name" content="Sushiroll">
        <meta name="msapplication-TileColor" content="#da532c">
        <meta name="theme-color" content="#252525FF">

        <title>{{ config('app.name', 'Sushiroll') }}</title>

        @routes

        @vite(['resources/css/app.css', 'resources/js/app.js'])

        @inertiaHead
    </head>

    <body class="bg-white dark:bg-gray-900">
        @inertia
    </body>
</html>
