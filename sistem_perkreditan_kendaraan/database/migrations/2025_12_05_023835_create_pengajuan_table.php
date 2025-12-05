<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Enums\Status;

class CreatePengajuanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengajuan', function (Blueprint $table) {
            $table->id();

            // --Data Konsumen--
            $table->string('nama');
            $table->string('nik', 16)->unique(); // NIK biasanya 16 digit dan unik
            $table->date('tanggal_lahir');
            $table->string('status_perkawinan');
            $table->string('data_pasangan')->nullable(); // Boleh kosong jika belum menikah

            // --Data Kendaraan--
            $table->string('dealer');
            $table->string('merk_kendaraan');
            $table->string('model_kendaraan');
            $table->string('tipe_kendaraan');
            $table->string('warna_kendaraan');
            $table->decimal('harga_kendaraan', 15, 2);

            // --Data Pinjaman--
            $table->string('asuransi');
            $table->decimal('down_payment', 15, 2);
            $table->integer('lama_kredit');
            $table->decimal('angsuran', 15, 2);
            $table->string('status')->default(Status::APPROVAL_PENDING->value);

            // Mencatat siapa yang input (Marketing) dan siapa yang approve (Atasan)
            // Kita asumsikan relasi ke tabel 'users' bawaan Laravel
            $table->foreignId('user_id')->constrained('users'); // ID Marketing yg input
            $table->foreignId('approved_by')->nullable()->constrained('users'); // ID Atasan yg approve

            $table->timestamp('approved_at')->nullable(); // Kapan diapprove
            $table->text('catatan_approval')->nullable(); // Alasan jika ditolak

            $table->timestamps(); // Buat kolom created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pengajuan');
    }
}
