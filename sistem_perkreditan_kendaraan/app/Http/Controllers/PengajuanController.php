<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengajuan;
use App\Enums\Status;
use Illuminate\Support\Facades\Auth;

class PengajuanController extends Controller
{
    public function create()
    {
        // Nanti kita akan buat file view ini
        return view('pengajuan.create');
    }


    // Menyimpan data pengajuan baru dari form ke database.
    public function store(Request $request)
    {
        //Validasi data
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'nik' => 'required|string|size:16|unique:pengajuan',
            'tanggal_lahir' => 'required|date',
            'status_perkawinan' => 'required|string',
            'data_pasangan' => 'nullable|string',

            'dealer' => 'required|string',
            'merk_kendaraan' => 'required|string',
            'model_kendaraan' => 'required|string',
            'tipe_kendaraan' => 'required|string',
            'warna_kendaraan' => 'required|string',
            'harga_kendaraan' => 'required|numeric|min:0',

            'asuransi' => 'required|string',
            'down_payment' => 'required|numeric|min:0',
            'lama_kredit' => 'required|integer|min:1',
            'angsuran' => 'required|numeric|min:0',
        ]);

        //Simpan data ke database
        Pengajuan::create([
            ...$validatedData,
            'user_id' => Auth::id(),
            'status' => Status::APPROVAL_PENDING,
        ]);
        return redirect()->route('dashboard')->with('success', 'Pengajuan kredit berhasil disubmit.');
    }
}
