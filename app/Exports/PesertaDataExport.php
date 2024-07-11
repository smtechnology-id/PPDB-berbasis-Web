<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;

class PesertaDataExport implements FromView, WithTitle, ShouldAutoSize
{
    protected $dataPeserta;

    public function __construct($dataPeserta)
    {
        $this->dataPeserta = $dataPeserta;
    }

    public function view(): View
    {
        return view('exports.peserta_data', [
            'dataPeserta' => $this->dataPeserta,
        ]);
    }

    public function title(): string
    {
        return 'Data Peserta';
    }
}
