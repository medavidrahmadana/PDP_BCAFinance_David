<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Pengajuan Baru</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        .section-title {
            font-size: 1.2rem;
            font-weight: 600;
            margin-top: 25px;
            margin-bottom: 15px;
            padding-bottom: 5px;
            border-bottom: 2px solid #eee;
        }
    </style>
</head>

<body class="bg-light">

    <div class="container py-4">

        <!-- Back -->
        <a href="{{ route('dashboard') }}" class="btn btn-outline-secondary btn-sm mb-3">
            &larr; Kembali ke Dashboard
        </a>

        <div class="card shadow-sm">
            <div class="card-body">

                <h1 class="mb-4">Form Pengajuan Kredit Baru</h1>

                <!-- Error Alert -->
                @if ($errors->any())
                <div class="alert alert-danger">
                    <strong>Oops! Ada kesalahan:</strong>
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                <form action="{{ route('pengajuan.store') }}" method="POST">
                    @csrf

                    <!-- DATA KONSUMEN -->
                    <div class="section-title">Data Konsumen</div>
                    <div class="row g-3">

                        <div class="col-md-6">
                            <label class="form-label">Nama Konsumen</label>
                            <input type="text" name="nama" class="form-control" value="{{ old('nama') }}" required>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">NIK (16 Digit)</label>
                            <input type="text" name="nik" class="form-control" value="{{ old('nik') }}" required>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Tanggal Lahir</label>
                            <input type="date" name="tanggal_lahir" class="form-control" value="{{ old('tanggal_lahir') }}" required>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Status Perkawinan</label>
                            <select name="status_perkawinan" class="form-select" required>
                                <option value="">Pilih Status</option>
                                <option value="Belum Menikah" @selected(old('status_perkawinan')=='Belum Menikah' )>Belum Menikah</option>
                                <option value="Menikah" @selected(old('status_perkawinan')=='Menikah' )>Menikah</option>
                                <option value="Cerai" @selected(old('status_perkawinan')=='Cerai' )>Cerai</option>
                            </select>
                        </div>

                        <div class="col-12">
                            <label class="form-label">Data Pasangan (Nama & NIK, jika ada)</label>
                            <input type="text" name="data_pasangan" class="form-control" value="{{ old('data_pasangan') }}">
                        </div>

                    </div>

                    <!-- DATA KENDARAAN -->
                    <div class="section-title">Data Kendaraan</div>
                    <div class="row g-3">

                        <div class="col-md-6">
                            <label class="form-label">Dealer</label>
                            <input type="text" name="dealer" class="form-control" value="{{ old('dealer') }}" required>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Merk Kendaraan</label>
                            <input type="text" name="merk_kendaraan" class="form-control" value="{{ old('merk_kendaraan') }}" required>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Model Kendaraan</label>
                            <input type="text" name="model_kendaraan" class="form-control" value="{{ old('model_kendaraan') }}" required>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Tipe Kendaraan</label>
                            <input type="text" name="tipe_kendaraan" class="form-control" value="{{ old('tipe_kendaraan') }}" required>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Warna Kendaraan</label>
                            <input type="text" name="warna_kendaraan" class="form-control" value="{{ old('warna_kendaraan') }}" required>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Harga Kendaraan (Contoh Input: 9999)</label>
                            <input type="number" name="harga_kendaraan" class="form-control" value="{{ old('harga_kendaraan') }}" required>
                        </div>

                    </div>

                    <!-- DATA PINJAMAN -->
                    <div class="section-title">Data Pinjaman</div>
                    <div class="row g-3">

                        <div class="col-md-6">
                            <label class="form-label">Asuransi</label>
                            <input type="text" name="asuransi" class="form-control" value="{{ old('asuransi') }}" required>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Down Payment (Contoh Input: 9999)</label>
                            <input type="number" name="down_payment" class="form-control" value="{{ old('down_payment') }}" required>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Lama Kredit (Bulan)</label>
                            <input type="number" name="lama_kredit" class="form-control" value="{{ old('lama_kredit') }}" required>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Angsuran / Bulan (Contoh Input: 9999)</label>
                            <input type="number" name="angsuran" class="form-control" value="{{ old('angsuran') }}" required>
                        </div>

                    </div>

                    <!-- Submit -->
                    <div class="text-end mt-4">
                        <button type="submit" class="btn btn-primary px-4">
                            Submit Pengajuan
                        </button>
                    </div>

                </form>

            </div>
        </div>

    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>