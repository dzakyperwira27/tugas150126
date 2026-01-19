<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Data Barang')</title>

    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>

    @stack('css')
</head>
<body class="sb-nav-fixed">

    @include('partials.navbar')

    <div id="layoutSidenav">
        @include('partials.sidebar')

        <div id="layoutSidenav_content">
            <main class="container-fluid px-4 py-3">
                @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show auto-dismiss">
                    {{ session('success') }}
                </div>
                @endif

                @if (session('error'))
                <div class="alert alert-danger alert-dismissible fade show auto-dismiss">
                    {{ session('error') }}
                </div>
                @endif

                @yield('content')
            </main>

            @include('partials.footer')
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('js/scripts.js') }}"></script>

    @stack('js')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const alerts = document.querySelectorAll('.auto-dismiss');

            alerts.forEach(function(alert) {
                setTimeout(function() {
                    alert.classList.remove('show');
                    alert.classList.add('fade');

                    setTimeout(() => alert.remove(), 500);
                },3000); // 3 detik
            });
        });

    </script>


</body>
</html>

