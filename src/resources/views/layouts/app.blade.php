<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'mogitate')</title>
    <link rel="stylesheet" href="{{ asset('css/reset.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    @yield('styles')
</head>

<body>
    <header class="header">
        <div class="container">
            <h1 class="logo">mogitate</h1>
        </div>
    </header>

    <main class="main">
        @yield('content')
    </main>
</body>

</html>