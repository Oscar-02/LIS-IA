<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/daisyui@2.47.0/dist/full.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.tailwindcss.com"></script>
    <title>@yield('title')</title>
    <link href='https://fonts.googleapis.com/css?family=Inter' rel='stylesheet'>
    <style>
        body {
            font-family: 'Inter';
            ;
        }
    </style>
</head>

<body class="px-10 md:px-20">
    <header>
        <nav class="flex justify-between p-2 text-md items-center navbar border-b-2">
            <a href="{{ route('index') }}" class="text-xl font-bold underline">Inicio</a>
            <a href="{{ route('brands.index') }}" class="text-xl font-bold underline">Ofertas</a>
            <a href="{{ route('create') }}" class="btn-primary p-3 rounded">Agregar nuevo producto</a>
        </nav>
    </header>
    <main>
        @yield('content')
    </main>
</body>

</html>
