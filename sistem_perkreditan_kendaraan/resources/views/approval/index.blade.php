<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Approval List</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        .card {
            border-radius: 10px;
        }

        .table thead th {
            background: #f1f3f5;
        }

        .table-hover tbody tr:hover {
            background: #f8f9fa;
        }
    </style>
</head>

<body class="bg-light">

    <div class="container py-4">

        <!-- Back Button -->
        <a href="{{ route('dashboard') }}" class="btn btn-outline-secondary btn-sm mb-3">
            &larr; Kembali ke Dashboard
        </a>

        <!-- Page Title -->
        <h1 class="mb-4">Approval List</h1>

        <!-- Success Message -->
        @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif

        <!-- Card -->
        <div class="card shadow-sm">
            <div class="card-body">
                <h4 class="card-title mb-3">Daftar Pengajuan yang Perlu Approval</h4>

                @if ($daftarPengajuan->isEmpty())
                <div class="text-center py-4 text-muted">
                    Belum ada pengajuan yang perlu di-approve.
                </div>
                @else

                <div class="table-responsive">
                    <table class="table table-bordered table-hover align-middle mb-0">
                        <thead>
                            <tr>
                                <th style="width: 160px;">Tanggal</th>
                                <th>Nama Pemohon</th>
                                <th>NIK</th>
                                <th>Dealer</th>
                                <th>Merek dan Model Kendaraan</th>
                                <th>Harga Kendaraan</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($daftarPengajuan as $pengajuan)
                            <tr>
                                <td>{{ $pengajuan->created_at->format('d F Y') }}</td>
                                <td>{{ $pengajuan->nama }}</td>
                                <td>{{ $pengajuan->nik }}</td>
                                <td>{{ $pengajuan->dealer }}</td>
                                <td>{{ $pengajuan->merk_kendaraan }} {{ $pengajuan->model_kendaraan }}</td>
                                <td>Rp {{ number_format($pengajuan->harga_kendaraan, 0, ',', '.') }}</td>
                                <td>
                                    <a href="{{ route('approval.show', $pengajuan->id) }}"
                                        class="btn btn-primary btn-sm">
                                        Detail
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                @endif

            </div>
        </div>

    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>