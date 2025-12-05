<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Approval</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        .info-label {
            font-weight: 600;
            color: #555;
        }

        .section-title {
            font-size: 1.2rem;
            margin-bottom: 10px;
            border-bottom: 2px solid #eee;
            padding-bottom: 4px;
            font-weight: 600;
        }
    </style>
</head>

<body class="bg-light">

    <div class="container py-4">

        <!-- Back -->
        <a href="{{ route('approval.index') }}" class="btn btn-outline-secondary btn-sm mb-3">
            &larr; Kembali ke Approval List
        </a>

        <!-- Card -->
        <div class="card shadow-sm">
            <div class="card-body">

                <!-- DATA KONSUMEN -->
                <div class="section-title">Data Konsumen</div>
                <div class="row mb-3">
                    <div class="col-4 info-label">Nama:</div>
                    <div class="col-8">{{ $pengajuan->nama }}</div>

                    <div class="col-4 info-label">NIK:</div>
                    <div class="col-8">{{ $pengajuan->nik }}</div>

                    <div class="col-4 info-label">Tanggal Lahir:</div>
                    <div class="col-8">{{ $pengajuan->tanggal_lahir->format('d F Y') }}</div>

                    <div class="col-4 info-label">Status:</div>
                    <div class="col-8">{{ $pengajuan->status_perkawinan }}</div>

                    <div class="col-4 info-label">Data Pasangan:</div>
                    <div class="col-8">{{ $pengajuan->data_pasangan ?? '-' }}</div>
                </div>

                <!-- DATA KENDARAAN -->
                <div class="section-title mt-4">Data Kendaraan</div>
                <div class="row mb-3">
                    <div class="col-4 info-label">Dealer:</div>
                    <div class="col-8">{{ $pengajuan->dealer }}</div>

                    <div class="col-4 info-label">Merk:</div>
                    <div class="col-8">{{ $pengajuan->merk_kendaraan }}</div>

                    <div class="col-4 info-label">Model:</div>
                    <div class="col-8">{{ $pengajuan->model_kendaraan }}</div>

                    <div class="col-4 info-label">Tipe:</div>
                    <div class="col-8">{{ $pengajuan->tipe_kendaraan }}</div>

                    <div class="col-4 info-label">Warna:</div>
                    <div class="col-8">{{ $pengajuan->warna_kendaraan }}</div>

                    <div class="col-4 info-label">Harga Kendaraan:</div>
                    <div class="col-8">
                        Rp {{ number_format($pengajuan->harga_kendaraan, 0, ',', '.') }}
                    </div>
                </div>

                <!-- DATA PEMBIAYAAN -->
                <div class="section-title mt-4">Detail Pembiayaan</div>
                <div class="row mb-3">
                    <div class="col-4 info-label">Asuransi:</div>
                    <div class="col-8">{{ $pengajuan->asuransi }}</div>

                    <div class="col-4 info-label">Down Payment:</div>
                    <div class="col-8">Rp {{ number_format($pengajuan->down_payment, 0, ',', '.') }}</div>

                    <div class="col-4 info-label">Lama Kredit:</div>
                    <div class="col-8">{{ $pengajuan->lama_kredit }} Bulan</div>

                    <div class="col-4 info-label">Angsuran:</div>
                    <div class="col-8">
                        Rp {{ number_format($pengajuan->angsuran, 0, ',', '.') }} / Bulan
                    </div>
                </div>

                <!-- ACTION -->
                <div class="section-title mt-4">Approval Action</div>

                <div class="d-flex gap-2">
                    <form action="{{ route('approval.approve', $pengajuan->id) }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-success">Approve</button>
                    </form>

                    <!-- Toggle Reject Form -->
                    <button class="btn btn-danger" data-bs-toggle="collapse" data-bs-target="#formReject">
                        Reject
                    </button>
                </div>

                <!-- REJECT FORM -->
                <div class="collapse mt-3" id="formReject">
                    <div class="alert alert-light border border-danger">
                        <h5 class="mb-3">Form Reject</h5>

                        <form action="{{ route('approval.reject', $pengajuan->id) }}" method="POST">
                            @csrf

                            <label class="form-label">Alasan Penolakan (Wajib diisi)</label>
                            <textarea name="catatan_approval" class="form-control" rows="3" required></textarea>

                            @error('catatan_approval')
                            <div class="text-danger small mt-1">{{ $message }}</div>
                            @enderror

                            <button type="submit" class="btn btn-danger mt-3">
                                Kirim Penolakan
                            </button>
                        </form>
                    </div>
                </div>

            </div>
        </div>

    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>