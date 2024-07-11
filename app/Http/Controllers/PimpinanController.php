<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Exports\PesertaDataExport;
use Maatwebsite\Excel\Facades\Excel;

class PimpinanController extends Controller
{
    public function dashboard()
    {
        return view('pimpinan.dashboard');
    }
    public function dataPeserta()
    {
        $dataPeserta = User::where('role', 'peserta')->get();
        return view('pimpinan.dataPeserta', compact('dataPeserta'));
    }

    public function downloadRekap() {
        $dataPeserta = User::where('role', 'peserta')->get();
        return view('pimpinan.downloadRekap', compact('dataPeserta'));
    }
    public function exportRekap()
    {
        $dataPeserta = User::with('dataPribadi')->where('role', 'peserta')->get();

        return Excel::download(new PesertaDataExport($dataPeserta), 'rekap_data_peserta.xlsx');
    }
}
