<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>App Absen</title>
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
        }

        .nav-link:hover {
            background-color: #e9ecef;
            border-radius: 8px;
        }

        .btn-primary {
            background-color: #4a90e2;
            border: none;
        }

        .btn-primary:hover {
            background-color: #357ab8;
        }

        .btn-white {
            background-color: white;
            color: #000;
            font-weight: 600;
            border-radius: 40px !important;
        }

        .btn-white:hover {
            background-color: #f1f1f1;
        }

        .btn:hover {
            background-color: #a7c8f0 !important;
        }

    </style>
</head>
<body>
<nav class="navbar navbar-light bg-light d-md-none px-3">
    <button class="btn btn-outline-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#sidebarOffcanvas">
        <i class="bi bi-list fs-4"></i>
    </button>
    <span class="navbar-brand ms-2">App Absen</span>
</nav>

<div class="offcanvas offcanvas-start d-md-none" tabindex="-1" id="sidebarOffcanvas">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title">Menu</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas"></button>
    </div>
    <div class="offcanvas-body">
        <div class="text-center mb-3">
            <div class="rounded-circle bg-primary mx-auto" style="width: 60px; height: 60px;"></div>
            <strong class="d-block mt-2">Profil</strong>
        </div>
        <nav class="nav flex-column">
            <a class="btn btn-white text-start mb-2 border" href="#">Dashboard</a>
            <a class="btn btn-white text-start mb-2 border" href="#">Kelas</a>
            <a class="btn btn-white text-start mb-2 border" href="#">Bolos</a>
        </nav>
    </div>
</div>
@yield('content')
</body>
</html>
