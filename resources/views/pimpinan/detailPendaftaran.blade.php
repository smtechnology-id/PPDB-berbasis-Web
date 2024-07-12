@extends('layouts.app')


@section('content')
    <div class="card">
        <div class="card-header">
            <h4 class="header-title">Data Peserta Pendaftaran Siswa Baru</h4>
            <p class="text-muted mb-0">
               Nama Akun : {{ $data->name }}
            </p>
            <p class="text-muted mb-0">
               Email Akun : {{ $data->email }}
            </p>
        </div>
        <div class="card-body">
            <ul class="nav nav-tabs nav-justified nav-bordered mb-3">
                <li class="nav-item">
                    <a href="#home-b2" data-bs-toggle="tab" aria-expanded="false" class="nav-link">
                        Data Pribadi
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#profile-b2" data-bs-toggle="tab" aria-expanded="true" class="nav-link active">
                        Data Pendukung
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#settings-b2" data-bs-toggle="tab" aria-expanded="false" class="nav-link">
                        Data Orang Tua
                    </a>
                </li>
            </ul>

            <div class="tab-content">
                <div class="tab-pane" id="home-b2">
                    <div class="row">
                        <h3 class="text-center"></h3>
                        <p class="text-center">Data Seluruh Peserta Pendaftaran Siswa Baru</p>
                        <hr>
                        <div class="table-responsive">
                            <form action="{{ route('peserta.updateDataPribadi') }}" method="POST">
                                @csrf
                                <input type="hidden" name="user_id" value="{{ Auth::id() }}">
                                <table class="table table-borderless">
                                    <tr>
                                        <td>Nama Lengkap <span class="text-danger">*</span></td>
                                        <td>:</td>
                                        <td>
                                            <input type="text" name="nama_lengkap" id="nama_lengkap"
                                                value="{{ $data->dataPribadi->nama_lengkap ?? 'data belum diisi' }}"
                                                class="form-control @if (empty($data->dataPribadi->nama_lengkap)) text-danger @endif"
                                                readonly>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Jenis Kelamin <span class="text-danger">*</span></td>
                                        <td>:</td>
                                        <td>
                                            <input type="text" name="jenis_kelamin" id="jenis_kelamin"
                                                value="{{ $data->dataPribadi->jenis_kelamin ?? 'data belum diisi' }}"
                                                class="form-control @if (empty($data->dataPribadi->jenis_kelamin)) text-danger @endif"
                                                readonly>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Nomor KK <span class="text-danger">*</span></td>
                                        <td>:</td>
                                        <td>
                                            <input type="number" name="no_kk" id="no_kk"
                                                value="{{ $data->dataPribadi->no_kk ?? 'data belum diisi' }}"
                                                class="form-control @if (empty($data->dataPribadi->no_kk)) text-danger @endif"
                                                readonly>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Tempat Lahir <span class="text-danger">*</span></td>
                                        <td>:</td>
                                        <td>
                                            <input type="text" name="tempat_lahir" id="tempat_lahir"
                                                value="{{ $data->dataPribadi->tempat_lahir ?? 'data belum diisi' }}"
                                                class="form-control @if (empty($data->dataPribadi->tempat_lahir)) text-danger @endif"
                                                readonly>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Tanggal Lahir <span class="text-danger">*</span></td>
                                        <td>:</td>
                                        <td>
                                            <input type="date" name="tanggal_lahir" id="tanggal_lahir"
                                                value="{{ $data->dataPribadi->tanggal_lahir ?? 'data belum diisi' }}"
                                                class="form-control @if (empty($data->dataPribadi->tanggal_lahir)) text-danger @endif"
                                                readonly>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Agama <span class="text-danger">*</span></td>
                                        <td>:</td>
                                        <td>
                                            <input type="text" name="agama" id="agama"
                                                value="{{ $data->dataPribadi->agama ?? 'data belum diisi' }}"
                                                class="form-control @if (empty($data->dataPribadi->agama)) text-danger @endif"
                                                readonly>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Kewarganegaraan <span class="text-danger">*</span></td>
                                        <td>:</td>
                                        <td>
                                            <input type="text" name="kewarganegaraan" id="kewarganegaraan"
                                                value="{{ $data->dataPribadi->kewarganegaraan ?? 'data belum diisi' }}"
                                                class="form-control @if (empty($data->dataPribadi->kewarganegaraan)) text-danger @endif"
                                                readonly>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Berkebutuhan Khusus</td>
                                        <td>:</td>
                                        <td>
                                            <input type="text" name="berkebutuhan_khusus" id="berkebutuhan_khusus"
                                                value="{{ $data->dataPribadi->berkebutuhan_khusus ?? 'data belum diisi' }}"
                                                class="form-control @if (empty($data->dataPribadi->berkebutuhan_khusus)) text-danger @endif"
                                                readonly>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Alamat <span class="text-danger">*</span></td>
                                        <td>:</td>
                                        <td>
                                            <textarea name="alamat" id="alamat" required
                                                class="form-control @if (empty($data->dataPribadi->alamat)) text-danger @endif" readonly>{{ $data->dataPribadi->alamat ?? 'data belum diisi' }}</textarea>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>RT <span class="text-danger">*</span></td>
                                        <td>:</td>
                                        <td>
                                            <input type="text" name="rt" id="rt"
                                                value="{{ $data->dataPribadi->rt ?? 'data belum diisi' }}"
                                                class="form-control @if (empty($data->dataPribadi->rt)) text-danger @endif"
                                                readonly>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>RW <span class="text-danger">*</span></td>
                                        <td>:</td>
                                        <td>
                                            <input type="text" name="rw" id="rw"
                                                value="{{ $data->dataPribadi->rw ?? 'data belum diisi' }}"
                                                class="form-control @if (empty($data->dataPribadi->rw)) text-danger @endif"
                                                readonly>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Dusun</td>
                                        <td>:</td>
                                        <td>
                                            <input type="text" name="dusun" id="dusun"
                                                value="{{ $data->dataPribadi->dusun ?? 'data belum diisi' }}"
                                                class="form-control @if (empty($data->dataPribadi->dusun)) text-danger @endif"
                                                readonly>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Kelurahan <span class="text-danger">*</span></td>
                                        <td>:</td>
                                        <td>
                                            <input type="text" name="kelurahan" id="kelurahan"
                                                value="{{ $data->dataPribadi->kelurahan ?? 'data belum diisi' }}"
                                                class="form-control @if (empty($data->dataPribadi->kelurahan)) text-danger @endif"
                                                readonly>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Kecamatan <span class="text-danger">*</span></td>
                                        <td>:</td>
                                        <td>
                                            <input type="text" name="kecamatan" id="kecamatan"
                                                value="{{ $data->dataPribadi->kecamatan ?? 'data belum diisi' }}"
                                                class="form-control @if (empty($data->dataPribadi->kecamatan)) text-danger @endif"
                                                readonly>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Kode Pos <span class="text-danger">*</span></td>
                                        <td>:</td>
                                        <td>
                                            <input type="text" name="kode_pos" id="kode_pos"
                                                value="{{ $data->dataPribadi->kode_pos ?? 'data belum diisi' }}"
                                                class="form-control @if (empty($data->dataPribadi->kode_pos)) text-danger @endif"
                                                readonly>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Tempat Tinggal <span class="text-danger">*</span></td>
                                        <td>:</td>
                                        <td>
                                            <input type="text" name="tempat_tinggal" id="tempat_tinggal"
                                                value="{{ $data->dataPribadi->tempat_tinggal ?? 'data belum diisi' }}"
                                                class="form-control @if (empty($data->dataPribadi->tempat_tinggal)) text-danger @endif"
                                                readonly>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Mode Transportasi <span class="text-danger">*</span></td>
                                        <td>:</td>
                                        <td>
                                            <input type="text" name="mode_transportasi" id="mode_transportasi"
                                                value="{{ $data->dataPribadi->mode_transportasi ?? 'data belum diisi' }}"
                                                class="form-control @if (empty($data->dataPribadi->mode_transportasi)) text-danger @endif"
                                                readonly>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Anak Ke <span class="text-danger">*</span></td>
                                        <td>:</td>
                                        <td>
                                            <input type="number" name="anak_ke" id="anak_ke"
                                                value="{{ $data->dataPribadi->anak_ke ?? 'data belum diisi' }}"
                                                class="form-control @if (empty($data->dataPribadi->anak_ke)) text-danger @endif"
                                                readonly>
                                        </td>
                                    </tr>
                                </table>
                            </form>

                        </div>
                    </div>
                </div>
                <div class="tab-pane show active" id="profile-b2">
                    <form action="{{ route('peserta.addDataPendukung') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <table class="table table-borderless">
                            <tr>
                                <td>Tinggi Badan <span class="text-danger">*</span></td>
                                <td>:</td>
                                <td>
                                    <input type="number" name="tinggi_badan" id="tinggi_badan"
                                        value="{{ $data->dataPendukung->tinggi_badan ?? 'data belum diisi' }}"
                                        class="form-control @if (empty($data->dataPendukung->tinggi_badan)) text-danger @endif"
                                        readonly>
                                </td>
                            </tr>
                            <tr>
                                <td>Berat Badan <span class="text-danger">*</span></td>
                                <td>:</td>
                                <td>
                                    <input type="number" name="berat_badan" id="berat_badan"
                                        value="{{ $data->dataPendukung->berat_badan ?? 'data belum diisi' }}"
                                        class="form-control @if (empty($data->dataPendukung->berat_badan)) text-danger @endif"
                                        readonly>
                                </td>
                            </tr>
                            <tr>
                                <td>Lingkar Kepala</td>
                                <td>:</td>
                                <td>
                                    <input type="number" name="lingkar_kepala" id="lingkar_kepala"
                                        value="{{ $data->dataPendukung->lingkar_kepala ?? 'data belum diisi' }}"
                                        class="form-control @if (empty($data->dataPendukung->lingkar_kepala)) text-danger @endif"
                                        readonly>
                                </td>
                            </tr>
                            <tr>
                                <td>Jarak Tempuh</td>
                                <td>:</td>
                                <td>
                                    <input type="text" name="jarak_tempuh" id="jarak_tempuh"
                                        value="{{ $data->dataPendukung->jarak_tempuh ?? 'data belum diisi' }}"
                                        class="form-control @if (empty($data->dataPendukung->jarak_tempuh)) text-danger @endif"
                                        readonly>
                                </td>
                            </tr>
                            <tr>
                                <td>Waktu Tempuh</td>
                                <td>:</td>
                                <td>
                                    <input type="text" name="waktu_tempuh" id="waktu_tempuh"
                                        value="{{ $data->dataPendukung->waktu_tempuh ?? 'data belum diisi' }}"
                                        class="form-control @if (empty($data->dataPendukung->waktu_tempuh)) text-danger @endif"
                                        readonly>
                                </td>
                            </tr>
                            <tr>
                                <td>Jumlah Saudara</td>
                                <td>:</td>
                                <td>
                                    <input type="number" name="jumlah_saudara" id="jumlah_saudara"
                                        value="{{ $data->dataPendukung->jumlah_saudara ?? 'data belum diisi' }}"
                                        class="form-control @if (empty($data->dataPendukung->jumlah_saudara)) text-danger @endif"
                                        readonly>
                                </td>
                            </tr>
                            <tr>
                                <td>Berkas Passfoto</td>
                                <td>:</td>
                                <td>
                                    @if (!empty($data->dataPendukung->berkas_passfoto))
                                        <a href="{{ asset('storage/' . $data->dataPendukung->berkas_passfoto) }}"
                                            class="btn btn-sm btn-outline-primary" target="_blank">Download</a>
                                    @else
                                        <span class="text-danger">Data Belum Diisi</span>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td>Berkas Akte</td>
                                <td>:</td>
                                <td>
                                    @if (!empty($data->dataPendukung->berkas_akte))
                                        <a href="{{ asset('storage/' . $data->dataPendukung->berkas_akte) }}"
                                            class="btn btn-sm btn-outline-primary" target="_blank">Download</a>
                                    @else
                                        <span class="text-danger">Data Belum Diisi</span>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td>Berkas KK</td>
                                <td>:</td>
                                <td>
                                    @if (!empty($data->dataPendukung->berkas_kk))
                                        <a href="{{ asset('storage/' . $data->dataPendukung->berkas_kk) }}"
                                            class="btn btn-sm btn-outline-primary" target="_blank">Download</a>
                                    @else
                                        <span class="text-danger">Data Belum Diisi</span>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td>KTP Ayah</td>
                                <td>:</td>
                                <td>
                                    @if (!empty($data->dataPendukung->ktp_ayah))
                                        <a href="{{ asset('storage/' . $data->dataPendukung->ktp_ayah) }}"
                                            class="btn btn-sm btn-outline-primary" target="_blank">Download</a>
                                    @else
                                        <span class="text-danger">Data Belum Diisi</span>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td>KTP Ibu</td>
                                <td>:</td>
                                <td>
                                    @if (!empty($data->dataPendukung->ktp_ibu))
                                        <a href="{{ asset('storage/' . $data->dataPendukung->ktp_ibu) }}"
                                            class="btn btn-sm btn-outline-primary" target="_blank">Download</a>
                                    @else
                                        <span class="text-danger">Data Belum Diisi</span>
                                    @endif
                                </td>
                            </tr>
                        </table>
                    </form>
                </div>
                <div class="tab-pane" id="settings-b2">
                    <form action="" method="POST">
                        @csrf
                        <input type="hidden" name="user_id" value="{{ Auth::id() }}">
                        <table class="table table-borderless">
                            <tr>
                                <td>Nama Ayah <span class="text-danger">*</span></td>
                                <td>:</td>
                                <td>
                                    <input type="text" name="nama_ayah" id="nama_ayah" required class="form-control" 
                                           value="{{ $data->dataOrangTua->nama_ayah ?? 'data belum diisi' }}" 
                                           @if (empty($data->dataOrangTua->nama_ayah)) readonly @endif>
                                </td>
                            </tr>
                            <tr>
                                <td>NIK Ayah <span class="text-danger">*</span></td>
                                <td>:</td>
                                <td>
                                    <input type="number" name="nik_ayah" id="nik_ayah" required class="form-control" 
                                           value="{{ $data->dataOrangTua->nik_ayah ?? 'data belum diisi' }}" 
                                           @if (empty($data->dataOrangTua->nik_ayah)) readonly @endif>
                                </td>
                            </tr>
                            <tr>
                                <td>Tempat Lahir Ayah <span class="text-danger">*</span></td>
                                <td>:</td>
                                <td>
                                    <input type="text" name="tempat_lahir_ayah" id="tempat_lahir_ayah" required class="form-control" 
                                           value="{{ $data->dataOrangTua->tempat_lahir_ayah ?? 'data belum diisi' }}" 
                                           @if (empty($data->dataOrangTua->tempat_lahir_ayah)) readonly @endif>
                                </td>
                            </tr>
                            <tr>
                                <td>Tanggal Lahir Ayah <span class="text-danger">*</span></td>
                                <td>:</td>
                                <td>
                                    <input type="date" name="tanggal_lahir_ayah" id="tanggal_lahir_ayah" required class="form-control" 
                                           value="{{ $data->dataOrangTua->tanggal_lahir_ayah ?? 'data belum diisi' }}" 
                                           @if (empty($data->dataOrangTua->tanggal_lahir_ayah)) readonly @endif>
                                </td>
                            </tr>
                            <tr>
                                <td>Pendidikan Ayah <span class="text-danger">*</span></td>
                                <td>:</td>
                                <td>
                                    <input type="text" name="pendidikan_ayah" id="pendidikan_ayah" required class="form-control" 
                                           value="{{ $data->dataOrangTua->pendidikan_ayah ?? 'data belum diisi' }}" 
                                           @if (empty($data->dataOrangTua->pendidikan_ayah)) readonly @endif>
                                </td>
                            </tr>
                            <tr>
                                <td>Penghasilan Ayah <span class="text-danger">*</span></td>
                                <td>:</td>
                                <td>
                                    <input type="number" name="penghasilan_ayah" id="penghasilan_ayah" required class="form-control" 
                                           value="{{ $data->dataOrangTua->penghasilan_ayah ?? 'data belum diisi' }}" 
                                           @if (empty($data->dataOrangTua->penghasilan_ayah)) readonly @endif>
                                </td>
                            </tr>
                            <tr>
                                <td>Berkebutuhan Khusus Ayah</td>
                                <td>:</td>
                                <td>
                                    <input type="text" name="berkebutuhan_khusus_ayah" id="berkebutuhan_khusus_ayah" class="form-control" 
                                           value="{{ $data->dataOrangTua->berkebutuhan_khusus_ayah ?? 'data belum diisi' }}" 
                                           @if (empty($data->dataOrangTua->berkebutuhan_khusus_ayah)) readonly @endif>
                                </td>
                            </tr>
                            <tr>
                                <td>Nama Ibu <span class="text-danger">*</span></td>
                                <td>:</td>
                                <td>
                                    <input type="text" name="nama_ibu" id="nama_ibu" required class="form-control" 
                                           value="{{ $data->dataOrangTua->nama_ibu ?? 'data belum diisi' }}" 
                                           @if (empty($data->dataOrangTua->nama_ibu)) readonly @endif>
                                </td>
                            </tr>
                            <tr>
                                <td>NIK Ibu <span class="text-danger">*</span></td>
                                <td>:</td>
                                <td>
                                    <input type="number" name="nik_ibu" id="nik_ibu" required class="form-control" 
                                           value="{{ $data->dataOrangTua->nik_ibu ?? 'data belum diisi' }}" 
                                           @if (empty($data->dataOrangTua->nik_ibu)) readonly @endif>
                                </td>
                            </tr>
                            <tr>
                                <td>Tempat Lahir Ibu <span class="text-danger">*</span></td>
                                <td>:</td>
                                <td>
                                    <input type="text" name="tempat_lahir_ibu" id="tempat_lahir_ibu" required class="form-control" 
                                           value="{{ $data->dataOrangTua->tempat_lahir_ibu ?? 'data belum diisi' }}" 
                                           @if (empty($data->dataOrangTua->tempat_lahir_ibu)) readonly @endif>
                                </td>
                            </tr>
                            <tr>
                                <td>Tanggal Lahir Ibu <span class="text-danger">*</span></td>
                                <td>:</td>
                                <td>
                                    <input type="date" name="tanggal_lahir_ibu" id="tanggal_lahir_ibu" required class="form-control" 
                                           value="{{ $data->dataOrangTua->tanggal_lahir_ibu ?? 'data belum diisi' }}" 
                                           @if (empty($data->dataOrangTua->tanggal_lahir_ibu)) readonly @endif>
                                </td>
                            </tr>
                            <tr>
                                <td>Pendidikan Ibu <span class="text-danger">*</span></td>
                                <td>:</td>
                                <td>
                                    <input type="text" name="pendidikan_ibu" id="pendidikan_ibu" required class="form-control" 
                                           value="{{ $data->dataOrangTua->pendidikan_ibu ?? 'data belum diisi' }}" 
                                           @if (empty($data->dataOrangTua->pendidikan_ibu)) readonly @endif>
                                </td>
                            </tr>
                            <tr>
                                <td>Penghasilan Ibu <span class="text-danger">*</span></td>
                                <td>:</td>
                                <td>
                                    <input type="number" name="penghasilan_ibu" id="penghasilan_ibu" required class="form-control" 
                                           value="{{ $data->dataOrangTua->penghasilan_ibu ?? 'data belum diisi' }}" 
                                           @if (empty($data->dataOrangTua->penghasilan_ibu)) readonly @endif>
                                </td>
                            </tr>
                            <tr>
                                <td>Berkebutuhan Khusus Ibu</td>
                                <td>:</td>
                                <td>
                                    <input type="text" name="berkebutuhan_khusus_ibu" id="berkebutuhan_khusus_ibu" class="form-control" 
                                           value="{{ $data->dataOrangTua->berkebutuhan_khusus_ibu ?? 'data belum diisi' }}" 
                                           @if (empty($data->dataOrangTua->berkebutuhan_khusus_ibu)) readonly @endif>
                                </td>
                            </tr>
                            <tr>
                                <td>Nama Wali</td>
                                <td>:</td>
                                <td>
                                    <input type="text" name="nama_wali" id="nama_wali" class="form-control" 
                                           value="{{ $data->dataOrangTua->nama_wali ?? 'data belum diisi' }}" 
                                           @if (empty($data->dataOrangTua->nama_wali)) readonly @endif>
                                </td>
                            </tr>
                            <tr>
                                <td>NIK Wali</td>
                                <td>:</td>
                                <td>
                                    <input type="number" name="nik_wali" id="nik_wali" class="form-control" 
                                           value="{{ $data->dataOrangTua->nik_wali ?? 'data belum diisi' }}" 
                                           @if (empty($data->dataOrangTua->nik_wali)) readonly @endif>
                                </td>
                            </tr>
                            <tr>
                                <td>Tempat Lahir Wali</td>
                                <td>:</td>
                                <td>
                                    <input type="text" name="tempat_lahir_wali" id="tempat_lahir_wali" class="form-control" 
                                           value="{{ $data->dataOrangTua->tempat_lahir_wali ?? 'data belum diisi' }}" 
                                           @if (empty($data->dataOrangTua->tempat_lahir_wali)) readonly @endif>
                                </td>
                            </tr>
                            <tr>
                                <td>Tanggal Lahir Wali</td>
                                <td>:</td>
                                <td>
                                    <input type="date" name="tanggal_lahir_wali" id="tanggal_lahir_wali" class="form-control" 
                                           value="{{ $data->dataOrangTua->tanggal_lahir_wali ?? 'data belum diisi' }}" 
                                           @if (empty($data->dataOrangTua->tanggal_lahir_wali)) readonly @endif>
                                </td>
                            </tr>
                            <tr>
                                <td>Pendidikan Wali</td>
                                <td>:</td>
                                <td>
                                    <input type="text" name="pendidikan_wali" id="pendidikan_wali" class="form-control" 
                                           value="{{ $data->dataOrangTua->pendidikan_wali ?? 'data belum diisi' }}" 
                                           @if (empty($data->dataOrangTua->pendidikan_wali)) readonly @endif>
                                </td>
                            </tr>
                            <tr>
                                <td>Penghasilan Wali</td>
                                <td>:</td>
                                <td>
                                    <input type="number" name="penghasilan_wali" id="penghasilan_wali" class="form-control" 
                                           value="{{ $data->dataOrangTua->penghasilan_wali ?? 'data belum diisi' }}" 
                                           @if (empty($data->dataOrangTua->penghasilan_wali)) readonly @endif>
                                </td>
                            </tr>
                            <tr>
                                <td>Berkebutuhan Khusus Wali</td>
                                <td>:</td>
                                <td>
                                    <input type="text" name="berkebutuhan_khusus_wali" id="berkebutuhan_khusus_wali" class="form-control" 
                                           value="{{ $data->dataOrangTua->berkebutuhan_khusus_wali ?? 'data belum diisi' }}" 
                                           @if (empty($data->dataOrangTua->berkebutuhan_khusus_wali)) readonly @endif>
                                </td>
                            </tr>
                        </table>
                    </form>
                </div>
            </div>
        </div> <!-- end card-body -->
    </div> <!-- end card-->
@endsection
