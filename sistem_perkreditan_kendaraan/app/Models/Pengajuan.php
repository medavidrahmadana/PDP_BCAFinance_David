<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pengajuan extends Model
{

    use HasFactory;

    protected $table = 'pengajuan';

    protected $fillable = [
        // Data Konsumen
        'nama',
        'nik',
        'tanggal_lahir',
        'status_perkawinan',
        'data_pasangan',

        // Data Kendaraan
        'dealer',
        'merk_kendaraan',
        'model_kendaraan',
        'tipe_kendaraan',
        'warna_kendaraan',
        'harga_kendaraan',

        // Data Pinjaman
        'asuransi',
        'down_payment',
        'lama_kredit',
        'angsuran',

        // Workflow
        'user_id',
        'status',
        'approved_by',
        'approved_at',
        'catatan_approval',
    ];

    protected $casts = [
        'tanggal_lahir' => 'date',
        'approved_at'   => 'datetime',
    ];
}
