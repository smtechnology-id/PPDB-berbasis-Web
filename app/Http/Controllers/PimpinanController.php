<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\ProfileSekolah;
use App\Exports\PesertaDataExport;
use Maatwebsite\Excel\Facades\Excel;

class PimpinanController extends Controller
{
    public function dashboard()
    {
        $profile = ProfileSekolah::first();
        $count = User::where('role', 'peserta')->count();
        return view('pimpinan.dashboard', compact('count', 'profile'));
    }
    public function dataPeserta()
    {
        $dataPeserta = User::where('role', 'peserta')
            ->orderBy('created_at', 'desc')
            ->get();

        return view('pimpinan.dataPeserta', compact('dataPeserta'));
    }

    public function downloadRekap()
    {
        $dataPeserta = User::where('role', 'peserta')
            ->orderBy('created_at', 'desc')
            ->get();

        return view('pimpinan.downloadRekap', compact('dataPeserta'));
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
        $data = User::orderBy('created_at', 'desc')->first();

        return view('pimpinan.detailPendaftaran', compact('data'));
    }
    public function downloadSingle($id)
    {
        $data = User::orderBy('created_at', 'desc')->first();

        return view('pimpinan.downloadSingle', compact('data'));
    }
}
