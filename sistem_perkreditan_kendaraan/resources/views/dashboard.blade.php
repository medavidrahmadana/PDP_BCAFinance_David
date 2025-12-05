<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        .card-action {
            transition: 0.2s ease-in-out;
            cursor: pointer;
        }

        .card-action:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
        }
    </style>
</head>

<body class="bg-light">

    <div class="container py-4">

        <!-- Header -->
        <div class="d-flex justify-content-between align-items-center mb-4 pb-3 border-bottom">
            <h1 class="h3 m-0">Dashboard</h1>

            <div class="d-flex align-items-center gap-3">
                <span class="badge bg-secondary text-uppercase">{{ Auth::user()->role }}</span>

                <form action="{{ route('logout') }}" method="POST" class="m-0">
                    @csrf
                    <button type="submit" class="btn btn-outline-danger btn-sm">Logout</button>
                </form>
            </div>
        </div>

        <!-- Greeting -->
        @auth
        <p class="mb-4">Halo, <strong>{{ Auth::user()->name }}</strong>! Selamat datang kembali.</p>
        @endauth

        <!-- Alerts -->
        @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @if (session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        <p class="fw-semibold mb-3">Silakan pilih aksi:</p>

        <div class="row g-3">

            @if(Auth::user()->role === 'staff' || Auth::user()->role === 'admin')
            <div class="col-md-6">
                <a href="{{ route('pengajuan.create') }}" class="text-decoration-none">
                    <div class="card card-action text-white bg-primary">
                        <div class="card-body">
                            <h5 class="card-title mb-1">Buat Pengajuan Kredit Baru</h5>
                            <p class="card-text small mb-0">Formulir pengajuan baru untuk nasabah.</p>
                        </div>
                    </div>
                </a>
            </div>
            @endif

            @if(Auth::user()->role === 'atasan' || Auth::user()->role === 'admin')
            <div class="col-md-6">
                <a href="{{ route('approval.index') }}" class="text-decoration-none">
                    <div class="card card-action text-white bg-success">
                        <div class="card-body">
                            <h5 class="card-title mb-1">Daftar Approval</h5>
                            <p class="card-text small mb-0">Lihat dan proses pengajuan yang masuk.</p>
                        </div>
                    </div>
                </a>
            </div>
            @endif

        </div>

        <!-- SWITCH ROLE (Dev only) -->
        <div class="card mt-4">
            <div class="card-body">
                <h6 class="mb-2">Switch Role (Development Only)</h6>

                <a href="{{ route('switch.role', 'staff') }}" class="btn btn-outline-primary btn-sm">Staff</a>
                <a href="{{ route('switch.role', 'atasan') }}" class="btn btn-outline-success btn-sm">Atasan</a>
                <a href="{{ route('switch.role', 'admin') }}" class="btn btn-outline-danger btn-sm">Admin</a>
            </div>
        </div>

    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>