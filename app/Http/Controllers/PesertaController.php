<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\DataPribadi;
use App\Models\DataOrangTua;
use Illuminate\Http\Request;
use App\Models\DataPendukung;
use App\Models\ProfileSekolah;
use Illuminate\Support\Facades\Auth;

class PesertaController extends Controller
{
    public function dashboard()
    {
        $profile = ProfileSekolah::first();
        $count = User::where('role', 'peserta')->count();
        return view('peserta.dashboard', compact('count', 'profile'));
    }
    public function dataPribadi()
    {
        $dataPribadi = DataPribadi::where('user_id', Auth::id())->first();
        return view('peserta.dataPribadi', compact('dataPribadi'));
    }

    public function addDataPribadi(Request $request)
    {
        // Validasi data yang diterima dari form
        $validatedData = $request->validate([
            'nama_lengkap' => 'required|string',
            'jenis_kelamin' => 'required|in:Laki-Laki,Perempuan',
            'no_kk' => 'required|string',
            'tempat_lahir' => 'required|string',
            'tanggal_lahir' => 'required|date',
            'agama' => 'required|string',
            'kewarganegaraan' => 'required|string',
            'berkebutuhan_khusus' => 'nullable|string',
            'alamat' => 'required|string',
            'rt' => 'required|string',
            'rw' => 'required|string',
            'dusun' => 'nullable|string',
            'kelurahan' => 'required|string',
            'kecamatan' => 'required|string',
            'kode_pos' => 'required|string',
            'tempat_tinggal' => 'required|string',
            'mode_transportasi' => 'required|string',
            'anak_ke' => 'required|integer',
        ]);

        // Simpan data pribadi ke dalam database
        $dataPribadi = new DataPribadi();
        $dataPribadi->user_id = auth()->id(); // Mengambil ID user yang sedang login
        $dataPribadi->fill($validatedData); // Isi model dengan data yang divalidasi
        $dataPribadi->status = 'pending'; // Atur status default
        $dataPribadi->save();

        // Redirect ke halaman atau rute yang sesuai
        return redirect()->back()->with('success', 'Data Berhasil Disimpan');
    }
    public function updateDataPribadi(Request $request)
    {
        // Validasi data yang diterima dari form
        $validatedData = $request->validate([
            'nama_lengkap' => 'required|string',
            'jenis_kelamin' => 'required|in:Laki-Laki,Perempuan',
            'no_kk' => 'required|string',
            'tempat_lahir' => 'required|string',
            'tanggal_lahir' => 'required|date',
            'agama' => 'required|string',
            'kewarganegaraan' => 'required|string',
            'berkebutuhan_khusus' => 'nullable|string',
            'alamat' => 'required|string',
            'rt' => 'required|string',
            'rw' => 'required|string',
            'dusun' => 'nullable|string',
            'kelurahan' => 'required|string',
            'kecamatan' => 'required|string',
            'kode_pos' => 'required|string',
            'tempat_tinggal' => 'required|string',
            'mode_transportasi' => 'required|string',
            'anak_ke' => 'required|integer',
        ]);

        // Ambil data pribadi yang ingin diperbarui
        $dataPribadi = DataPribadi::where('user_id', $request->user_id)->firstOrFail();

        // Update data pribadi dengan data yang sudah divalidasi
        $dataPribadi->update($validatedData);

        // Redirect ke halaman atau rute yang sesuai
        return redirect()->back()->with('success', 'Data Berhasil Disimpan');
    }

    public function dataPendukung()
    {
        $dataPendukung = DataPendukung::where('user_id', Auth::id())->first();
        return view('peserta.dataPendukung', compact('dataPendukung'));
    }
    public function addDataPendukung(Request $request)
    {
        // Validasi input
        $validatedData = $request->validate([
            'tinggi_badan' => 'required|numeric',
            'berat_badan' => 'required|numeric',
            'lingkar_kepala' => 'nullable|numeric',
            'jarak_tempuh' => 'nullable|string',
            'waktu_tempuh' => 'nullable|string',
            'jumlah_saudara' => 'nullable|integer',
            'berkas_passfoto' => 'nullable|file|mimes:jpeg,png,jpg,pdf|max:2048',
            'berkas_akte' => 'nullable|file|mimes:jpeg,png,jpg,pdf|max:2048',
            'berkas_kk' => 'nullable|file|mimes:jpeg,png,jpg,pdf|max:2048',
            'ktp_ayah' => 'nullable|file|mimes:jpeg,png,jpg,pdf|max:2048',
            'ktp_ibu' => 'nullable|file|mimes:jpeg,png,jpg,pdf|max:2048',
        ]);

        // Upload file jika ada
        $fileNames = [];
        if ($request->hasFile('berkas_passfoto')) {
            $fileNames['berkas_passfoto'] = $request->file('berkas_passfoto')->store('berkas', 'public');
        }
        if ($request->hasFile('berkas_akte')) {
            $fileNames['berkas_akte'] = $request->file('berkas_akte')->store('berkas', 'public');
        }
        if ($request->hasFile('berkas_kk')) {
            $fileNames['berkas_kk'] = $request->file('berkas_kk')->store('berkas', 'public');
        }
        if ($request->hasFile('ktp_ayah')) {
            $fileNames['ktp_ayah'] = $request->file('ktp_ayah')->store('berkas', 'public');
        }
        if ($request->hasFile('ktp_ibu')) {
            $fileNames['ktp_ibu'] = $request->file('ktp_ibu')->store('berkas', 'public');
        }

        // Simpan data pendukung ke database
        $dataPendukung = new DataPendukung();
        $dataPendukung->user_id = auth()->id(); // atau sesuai dengan cara Anda mendapatkan user_id
        $dataPendukung->tinggi_badan = $validatedData['tinggi_badan'];
        $dataPendukung->berat_badan = $validatedData['berat_badan'];
        $dataPendukung->lingkar_kepala = $validatedData['lingkar_kepala'];
        $dataPendukung->jarak_tempuh = $validatedData['jarak_tempuh'];
        $dataPendukung->waktu_tempuh = $validatedData['waktu_tempuh'];
        $dataPendukung->jumlah_saudara = $validatedData['jumlah_saudara'];
        $dataPendukung->berkas_passfoto = $fileNames['berkas_passfoto'] ?? null;
        $dataPendukung->berkas_akte = $fileNames['berkas_akte'] ?? null;
        $dataPendukung->berkas_kk = $fileNames['berkas_kk'] ?? null;
        $dataPendukung->ktp_ayah = $fileNames['ktp_ayah'] ?? null;
        $dataPendukung->ktp_ibu = $fileNames['ktp_ibu'] ?? null;
        $dataPendukung->status = 'pending'; // default status
        $dataPendukung->catatan = $request->catatan; // bisa nullable sesuai kebutuhan
        $dataPendukung->save();

        return redirect()->back()->with('success', 'Data pendukung berhasil disimpan.');
    }
    public function updateDataPendukung(Request $request)
    {
        // Validasi input
        $request->validate([
            'tinggi_badan' => 'required|numeric',
            'berat_badan' => 'required|numeric',
            // tambahkan validasi untuk input lainnya
        ]);

        // Ambil user ID dari input hidden
        $userId = $request->user_id;

        // Cari data pendukung berdasarkan user ID
        $dataPendukung = DataPendukung::where('user_id', $userId)->first();

        // Jika data pendukung belum ada, buat data baru
        if (!$dataPendukung) {
            $dataPendukung = new DataPendukung();
            $dataPendukung->user_id = $userId;
        }

        // Update data pendukung
        $dataPendukung->tinggi_badan = $request->tinggi_badan;
        $dataPendukung->berat_badan = $request->berat_badan;
        $dataPendukung->lingkar_kepala = $request->lingkar_kepala;
        $dataPendukung->jarak_tempuh = $request->jarak_tempuh;
        $dataPendukung->waktu_tempuh = $request->waktu_tempuh;
        $dataPendukung->jumlah_saudara = $request->jumlah_saudara;

        // Mengelola file-file yang diunggah
        if ($request->hasFile('berkas_passfoto')) {
            $file = $request->file('berkas_passfoto');
            $fileName = $file->getClientOriginalName();
            $path = $file->storeAs('public', $fileName);
            $dataPendukung->berkas_passfoto = $fileName;
        }

        if ($request->hasFile('berkas_akte')) {
            $file = $request->file('berkas_akte');
            $fileName = $file->getClientOriginalName();
            $path = $file->storeAs('public', $fileName);
            $dataPendukung->berkas_akte = $fileName;
        }

        if ($request->hasFile('berkas_kk')) {
            $file = $request->file('berkas_kk');
            $fileName = $file->getClientOriginalName();
            $path = $file->storeAs('public', $fileName);
            $dataPendukung->berkas_kk = $fileName;
        }

        if ($request->hasFile('ktp_ayah')) {
            $file = $request->file('ktp_ayah');
            $fileName = $file->getClientOriginalName();
            $path = $file->storeAs('public', $fileName);
            $dataPendukung->ktp_ayah = $fileName;
        }

        if ($request->hasFile('ktp_ibu')) {
            $file = $request->file('ktp_ibu');
            $fileName = $file->getClientOriginalName();
            $path = $file->storeAs('public', $fileName);
            $dataPendukung->ktp_ibu = $fileName;
        }

        // Simpan data pendukung
        $dataPendukung->save();

        // Redirect atau sesuaikan dengan kebutuhan Anda
        return redirect()->back()->with('success', 'Data pendukung berhasil disimpan.');
    }

    public function dataOrangTua()
    {
        $dataOrangTua = DataOrangTua::where('user_id', Auth::id())->first();
        return view('peserta.dataOrangTua', compact('dataOrangTua'));
    }
    public function addDataOrangTua(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'user_id' => 'required|exists:users,id',
            'nama_ayah' => 'required|string|max:255',
            'nik_ayah' => 'required|numeric',
            'tempat_lahir_ayah' => 'required|string|max:255',
            'tanggal_lahir_ayah' => 'required|date',
            'pendidikan_ayah' => 'required|string|max:255',
            'penghasilan_ayah' => 'required|numeric',
            'berkebutuhan_khusus_ayah' => 'nullable|string|max:255',
            'nama_ibu' => 'required|string|max:255',
            'nik_ibu' => 'required|numeric',
            'tempat_lahir_ibu' => 'required|string|max:255',
            'tanggal_lahir_ibu' => 'required|date',
            'pendidikan_ibu' => 'required|string|max:255',
            'penghasilan_ibu' => 'required|numeric',
            'berkebutuhan_khusus_ibu' => 'nullable|string|max:255',
            'nama_wali' => 'nullable|string|max:255',
            'nik_wali' => 'nullable|numeric',
            'tempat_lahir_wali' => 'nullable|string|max:255',
            'tanggal_lahir_wali' => 'nullable|date',
            'pendidikan_wali' => 'nullable|string|max:255',
            'penghasilan_wali' => 'nullable|numeric',
            'berkebutuhan_khusus_wali' => 'nullable|string|max:255',
        ]);

        // Create a new entry in the data_orang_tua table
        $dataOrangTua = new DataOrangTua($validatedData);
        $dataOrangTua->save();

        // Redirect to a specific page with a success message
        return redirect()->route('peserta.dataOrangTua')
            ->with('success', 'Data orang tua berhasil disimpan.');
    }
    public function updateDataOrangTua(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'user_id' => 'required|exists:users,id',
            'nama_ayah' => 'required|string|max:255',
            'nik_ayah' => 'required|numeric',
            'tempat_lahir_ayah' => 'required|string|max:255',
            'tanggal_lahir_ayah' => 'required|date',
            'pendidikan_ayah' => 'required|string|max:255',
            'penghasilan_ayah' => 'required|numeric',
            'berkebutuhan_khusus_ayah' => 'nullable|string|max:255',
            'nama_ibu' => 'required|string|max:255',
            'nik_ibu' => 'required|numeric',
            'tempat_lahir_ibu' => 'required|string|max:255',
            'tanggal_lahir_ibu' => 'required|date',
            'pendidikan_ibu' => 'required|string|max:255',
            'penghasilan_ibu' => 'required|numeric',
            'berkebutuhan_khusus_ibu' => 'nullable|string|max:255',
            'nama_wali' => 'nullable|string|max:255',
            'nik_wali' => 'nullable|numeric',
            'tempat_lahir_wali' => 'nullable|string|max:255',
            'tanggal_lahir_wali' => 'nullable|date',
            'pendidikan_wali' => 'nullable|string|max:255',
            'penghasilan_wali' => 'nullable|numeric',
            'berkebutuhan_khusus_wali' => 'nullable|string|max:255',
        ]);

        // Find the existing entry
        $dataOrangTua = DataOrangTua::where('user_id', $validatedData['user_id'])->first();

        // Update the entry with validated data
        $dataOrangTua->update($validatedData);

        // Redirect to a specific page with a success message
        return redirect()->route('peserta.dataOrangTua')
            ->with('success', 'Data orang tua berhasil diperbarui.');
    }
    public function downloadSingle($id)
    {
        $data = User::where('id', $id)->first();
        return view('peserta.downloadSingle', compact('data'));
    }

    
}
