<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'CRUD Barang')</title>

    {{-- CSS dari public --}}
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

    <!-- NAVBAR -->
    <header class="navbar">
    <div class="container">
        <h1 class="logo">CRUD Barang</h1>

        <nav>
            <a href="{{ route('barang.index') }}">Barang</a> |
            <a href="{{ route('supplier.index') }}">Supplier</a>
        </nav>
    </div>
</header>


    <!-- CONTENT -->
    <main class="container content">
        @yield('content')
    </main>

    <!-- FOOTER -->
    <footer class="footer">
        <p>© {{ date('Y') }} CRUD Laravel — Dzaky Perwira Yasig</p>
    </footer>

</body>
</html>
