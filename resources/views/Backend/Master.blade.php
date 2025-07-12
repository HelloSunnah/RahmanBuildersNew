<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Admin Panel')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            overflow-x: hidden;
        }

        .sidebar {
            width: 250px;
            background-color: #343a40;
            color: #fff;
            min-height: 100vh;
        }

        .sidebar a {
            color: #ccc;
            padding: 10px 20px;
            display: block;
            text-decoration: none;
        }

        .sidebar a.active, .sidebar a:hover {
            background-color: #495057;
            color: #fff;
        }

        @media (max-width: 768px) {
            .sidebar {
                position: fixed;
                top: 0;
                bottom: 0;
                left: -250px;
                transition: all 0.3s;
                z-index: 1050;
            }

            .sidebar.show {
                left: 0;
            }

            .content-wrapper {
                margin-left: 0;
            }
        }

        .content-wrapper {
            margin-left: 250px;
            transition: margin-left 0.3s;
        }

        @media (max-width: 768px) {
            .content-wrapper {
                margin-left: 0;
            }
        }
    </style>
</head>
<body>

    {{-- Sidebar --}}
    @include('Backend.Partial.Sidebar')

    {{-- Main content area --}}
    <div class="content-wrapper">
        {{-- Navbar --}}
        @include('Backend.Partial.Navbar')

        <div class="container-fluid mt-4">
            @yield('content')
        </div>
    </div>

    <!-- Bootstrap JS (for sidebar toggle) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function toggleSidebar() {
            document.querySelector('.sidebar').classList.toggle('show');
        }
    </script>
</body>
</html>
