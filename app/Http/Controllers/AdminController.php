<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Exports\PesertaDataExport;
use App\Models\ProfileSekolah;
use Maatwebsite\Excel\Facades\Excel;

class AdminController extends Controller
{
    public function dashboard()
    {
        $profile = ProfileSekolah::first();
        $count = User::where('role', 'peserta')->count();
        return view('admin.dashboard', compact('count', 'profile'));
    }
    public function dataPeserta()
    {
        $dataPeserta = User::where('role', 'peserta')
            ->orderBy('created_at', 'desc')
            ->get();
        return view('admin.dataPeserta', compact('dataPeserta'));
    }
    public function downloadRekap()
    {
        $dataPeserta = User::where('role', 'peserta')
            ->orderBy('created_at', 'desc')
            ->get();

        return view('admin.downloadRekap', compact('dataPeserta'));
    }
    public function exportRekap()
    {
        $dataPeserta = User::with('dataPribadi')
            ->where('role', 'peserta')
            ->orderBy('created_at', 'desc')
            ->get();
        return Excel::download(new PesertaDataExport($dataPeserta), 'rekap_data_peserta.xlsx');
    }

    public function detailPendaftaran($id)
    {
        $data = User::where('id', $id)->first();
        return view('admin.detailPendaftaran', compact('data'));
    }

    public function downloadSingle($id)
    {
        $data = User::where('id', $id)->first();
        return view('admin.downloadSingle', compact('data'));
    }

    public function profileSekolah()
    {
        $data = ProfileSekolah::first();
        return view('admin.profileSekolah', compact('data'));
    }
    public function addProfileSekolah(Request $request)
    {
        $validatedData = $request->validate([
            'nama_sekolah' => 'required|string|max:255',
            'alamat' => 'required|string',
            'akreditasi' => 'nullable|string|max:255',
            'kode_pos' => 'required|string|max:10',
        ]);

        ProfileSekolah::create($validatedData);

        return redirect()->back()->with('success', 'Data sekolah berhasil disimpan.');
    }
    public function updateProfileSekolah(Request $request)
    {
        // Validasi data yang dikirim dari form
        $request->validate([
            'nama_sekolah' => 'required|string|max:255',
            'alamat' => 'required|string',
            'akreditasi' => 'nullable|string|max:255',
            'kode_pos' => 'required|string|max:10',
        ]);

        // Cari data sekolah berdasarkan ID
        $sekolah = ProfileSekolah::find($request->id);

        if (!$sekolah) {
            return back()->with('error', 'Data sekolah tidak ditemukan.');
        }

        // Update data sekolah berdasarkan input form
        $sekolah->nama_sekolah = $request->nama_sekolah;
        $sekolah->alamat = $request->alamat;
        $sekolah->akreditasi = $request->akreditasi;
        $sekolah->kode_pos = $request->kode_pos;

        // Simpan perubahan
        $sekolah->save();

        return redirect()->back()->with('success', 'Data sekolah berhasil diperbarui.');
    }
}
