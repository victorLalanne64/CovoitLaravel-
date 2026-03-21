<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Covoit Application</title>
    <script src="https://cdn.tailwindcss.com"></script> </head>
<body class="bg-gray-100 font-sans">
    @include('partials.header')


    @include('partials.liste_info')

    <main class="container mx-auto p-6">
        @yield('content')
    </main>

    @include('partials.footer')
</body>
</html>