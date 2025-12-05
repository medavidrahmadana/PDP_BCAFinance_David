<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengajuan;
use App\Enums\Status;
use Illuminate\Support\Facades\Auth;

class ApprovalController extends Controller
{
    public function index()
    {
        // Ambil semua data yang statusnya "menunggu_approval"
        $pengajuan = Pengajuan::where('status', Status::APPROVAL_PENDING)
            ->orderBy('created_at', 'asc')
            ->get();
        return view('approval.index', [
            'daftarPengajuan' => $pengajuan
        ]);
    }

    //Menampilkan detail satu pengajuan.
    public function show($id)
    {
        $pengajuan = Pengajuan::findOrFail($id);

        return view('approval.show', [
            'pengajuan' => $pengajuan
        ]);
    }

    //Memproses Aksi "Approve"
    public function approve(Request $request, $id)
    {
        $pengajuan = Pengajuan::findOrFail($id);

        // Update statusnya
        $pengajuan->update([
            'status' => Status::DISETUJUI,
            'approved_by' => Auth::id(),
            'approved_at' => now(),
            'catatan_approval' => $request->input('catatan_approval', 'Disetujui.'),
        ]);

        return redirect()->route('approval.index')->with('success', 'Pengajuan berhasil disetujui.');
    }

    //Memproses Aksi "Reject"
    public function reject(Request $request, $id)
    {
        // Validasi
        $request->validate(['catatan_approval' => 'required|string|min:10']);

        $pengajuan = Pengajuan::findOrFail($id);

        // Update statusnya
        $pengajuan->update([
            'status' => Status::DITOLAK,
            'approved_by' => Auth::id(),
            'approved_at' => now(),
            'catatan_approval' => $request->input('catatan_approval'),
        ]);

        return redirect()->route('approval.index')->with('success', 'Pengajuan telah ditolak.');
    }
}
