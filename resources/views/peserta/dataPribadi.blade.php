@extends('layouts.app')

@section('content')
@if(Auth::user()->hasPaid() && Auth::user()->paymentConfirmed())
    <div class="row">
        <h3 class="mt-3">Pengisian Data Pribadi</h3>
        <p>Silahkan Lengkapi Data Pribadi Anda Pada Form DIbawah Ini, Pastikan Semua Kolom Terisi</p>
        <hr>
        <div class="table-responsive">
            @if ($dataPribadi)
                <!-- Form untuk update data pribadi -->
                <form action="{{ route('peserta.updateDataPribadi') }}" method="POST">
                    @csrf
                    <input type="hidden" name="user_id" value="{{ Auth::id() }}">
                    <table class="table table-borderless">
                        <tr>
                            <td>Nama Lengkap <span class="text-danger">*</span></td>
                            <td>:</td>
                            <td><input type="text" name="nama_lengkap" id="nama_lengkap" value="{{ $dataPribadi->nama_lengkap }}" required class="form-control"></td>
                        </tr>
                        <tr>
                            <td>Jenis Kelamin <span class="text-danger">*</span></td>
                            <td>:</td>
                            <td>
                                <select name="jenis_kelamin" id="jenis_kelamin" required class="form-select">
                                    <option value="Laki-Laki" {{ $dataPribadi->jenis_kelamin == 'Laki-Laki' ? 'selected' : '' }}>Laki-Laki</option>
                                    <option value="Perempuan" {{ $dataPribadi->jenis_kelamin == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Nomor KK <span class="text-danger">*</span></td>
                            <td>:</td>
                            <td><input type="number" name="no_kk" id="no_kk" value="{{ $dataPribadi->no_kk }}" required class="form-control"></td>
                        </tr>
                        <tr>
                            <td>Tempat Lahir <span class="text-danger">*</span></td>
                            <td>:</td>
                            <td><input type="text" name="tempat_lahir" id="tempat_lahir" value="{{ $dataPribadi->tempat_lahir }}" required class="form-control"></td>
                        </tr>
                        <tr>
                            <td>Tanggal Lahir <span class="text-danger">*</span></td>
                            <td>:</td>
                            <td><input type="date" name="tanggal_lahir" id="tanggal_lahir" value="{{ $dataPribadi->tanggal_lahir }}" required class="form-control"></td>
                        </tr>
                        <tr>
                            <td>Agama <span class="text-danger">*</span></td>
                            <td>:</td>
                            <td><input type="text" name="agama" id="agama" value="{{ $dataPribadi->agama }}" required class="form-control"></td>
                        </tr>
                        <tr>
                            <td>Kewarganegaraan <span class="text-danger">*</span></td>
                            <td>:</td>
                            <td><input type="text" name="kewarganegaraan" id="kewarganegaraan" value="{{ $dataPribadi->kewarganegaraan }}" required class="form-control"></td>
                        </tr>
                        <tr>
                            <td>Berkebutuhan Khusus <span class="text-danger">*</span></td>
                            <td>:</td>
                            <td><input type="text" name="berkebutuhan_khusus" id="berkebutuhan_khusus" value="{{ $dataPribadi->berkebutuhan_khusus }}" required class="form-control"></td>
                        </tr>
                        <tr>
                            <td>Alamat <span class="text-danger">*</span></td>
                            <td>:</td>
                            <td><textarea name="alamat" id="alamat" required class="form-control">{{ $dataPribadi->alamat }}</textarea></td>
                        </tr>
                        <tr>
                            <td>RT <span class="text-danger">*</span></td>
                            <td>:</td>
                            <td><input type="text" name="rt" id="rt" value="{{ $dataPribadi->rt }}" required class="form-control"></td>
                        </tr>
                        <tr>
                            <td>RW <span class="text-danger">*</span></td>
                            <td>:</td>
                            <td><input type="text" name="rw" id="rw" value="{{ $dataPribadi->rw }}" required class="form-control"></td>
                        </tr>
                        <tr>
                            <td>Dusun <span class="text-danger">*</span></td>
                            <td>:</td>
                            <td><input type="text" name="dusun" id="dusun" value="{{ $dataPribadi->dusun }}" required class="form-control"></td>
                        </tr>
                        <tr>
                            <td>Kelurahan <span class="text-danger">*</span></td>
                            <td>:</td>
                            <td><input type="text" name="kelurahan" id="kelurahan" value="{{ $dataPribadi->kelurahan }}" required class="form-control"></td>
                        </tr>
                        <tr>
                            <td>Kecamatan <span class="text-danger">*</span></td>
                            <td>:</td>
                            <td><input type="text" name="kecamatan" id="kecamatan" value="{{ $dataPribadi->kecamatan }}" required class="form-control"></td>
                        </tr>
                        <tr>
                            <td>Kode Pos <span class="text-danger">*</span></td>
                            <td>:</td>
                            <td><input type="text" name="kode_pos" id="kode_pos" value="{{ $dataPribadi->kode_pos }}" required class="form-control"></td>
                        </tr>
                        <tr>
                            <td>Tempat Tinggal <span class="text-danger">*</span></td>
                            <td>:</td>
                            <td><input type="text" name="tempat_tinggal" id="tempat_tinggal" value="{{ $dataPribadi->tempat_tinggal }}" required class="form-control"></td>
                        </tr>
                        <tr>
                            <td>Mode Transportasi <span class="text-danger">*</span></td>
                            <td>:</td>
                            <td><input type="text" name="mode_transportasi" id="mode_transportasi" value="{{ $dataPribadi->mode_transportasi }}" required class="form-control"></td>
                        </tr>
                        <tr>
                            <td>Anak Ke <span class="text-danger">*</span></td>
                            <td>:</td>
                            <td><input type="number" name="anak_ke" id="anak_ke" value="{{ $dataPribadi->anak_ke }}" required class="form-control"></td>
                        </tr>
                    </table>
                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                </form>
            @else
                <!-- Form untuk pengisian data pribadi -->
                <form action="{{ route('peserta.addDataPribadi') }}" method="POST">
                    @csrf
                    <table class="table table-borderless">
                        <tr>
                            <td>Nama Lengkap <span class="text-danger">*</span></td>
                            <td>:</td>
                            <td><input type="text" name="nama_lengkap" id="nama_lengkap" required class="form-control"></td>
                        </tr>
                        <tr>
                            <td>Jenis Kelamin <span class="text-danger">*</span></td>
                            <td>:</td>
                            <td>
                                <select name="jenis_kelamin" id="jenis_kelamin" required class="form-select">
                                    <option value="Laki-Laki">Laki-Laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Nomor KK <span class="text-danger">*</span></td>
                            <td>:</td>
                            <td><input type="number" name="no_kk" id="no_kk" required class="form-control"></td>
                        </tr>
                        <tr>
                            <td>Tempat Lahir <span class="text-danger">*</span></td>
                            <td>:</td>
                            <td><input type="text" name="tempat_lahir" id="tempat_lahir" required class="form-control"></td>
                        </tr>
                        <tr>
                            <td>Tanggal Lahir <span class="text-danger">*</span></td>
                            <td>:</td>
                            <td><input type="date" name="tanggal_lahir" id="tanggal_lahir" required class="form-control"></td>
                        </tr>
                        <tr>
                            <td>Agama <span class="text-danger">*</span></td>
                            <td>:</td>
                            <td><input type="text" name="agama" id="agama" required class="form-control"></td>
                        </tr>
                        <tr>
                            <td>Kewarganegaraan <span class="text-danger">*</span></td>
                            <td>:</td>
                            <td><input type="text" name="kewarganegaraan" id="kewarganegaraan" required class="form-control"></td>
                        </tr>
                        <tr>
                            <td>Berkebutuhan Khusus <span class="text-danger">*</span></td>
                            <td>:</td>
                            <td><input type="text" name="berkebutuhan_khusus" id="berkebutuhan_khusus" required class="form-control"></td>
                        </tr>
                        <tr>
                            <td>Alamat <span class="text-danger">*</span></td>
                            <td>:</td>
                            <td><textarea name="alamat" id="alamat" required class="form-control"></textarea></td>
                        </tr>
                        <tr>
                            <td>RT <span class="text-danger">*</span></td>
                            <td>:</td>
                            <td><input type="text" name="rt" id="rt" required class="form-control"></td>
                        </tr>
                        <tr>
                            <td>RW <span class="text-danger">*</span></td>
                            <td>:</td>
                            <td><input type="text" name="rw" id="rw" required class="form-control"></td>
                        </tr>
                        <tr>
                            <td>Dusun <span class="text-danger">*</span></td>
                            <td>:</td>
                            <td><input type="text" name="dusun" id="dusun" required class="form-control"></td>
                        </tr>
                        <tr>
                            <td>Kelurahan <span class="text-danger">*</span></td>
                            <td>:</td>
                            <td><input type="text" name="kelurahan" id="kelurahan" required class="form-control"></td>
                        </tr>
                        <tr>
                            <td>Kecamatan <span class="text-danger">*</span></td>
                            <td>:</td>
                            <td><input type="text" name="kecamatan" id="kecamatan" required class="form-control"></td>
                        </tr>
                        <tr>
                            <td>Kode Pos <span class="text-danger">*</span></td>
                            <td>:</td>
                            <td><input type="text" name="kode_pos" id="kode_pos" required class="form-control"></td>
                        </tr>
                        <tr>
                            <td>Tempat Tinggal <span class="text-danger">*</span></td>
                            <td>:</td>
                            <td><input type="text" name="tempat_tinggal" id="tempat_tinggal" required class="form-control"></td>
                        </tr>
                        <tr>
                            <td>Mode Transportasi <span class="text-danger">*</span></td>
                            <td>:</td>
                            <td><input type="text" name="mode_transportasi" id="mode_transportasi" required class="form-control"></td>
                        </tr>
                        <tr>
                            <td>Anak Ke <span class="text-danger">*</span></td>
                            <td>:</td>
                            <td><input type="number" name="anak_ke" id="anak_ke" required class="form-control"></td>
                        </tr>
                    </table>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            @endif
        </div>
    </div>
@else
    <div class="alert alert-danger">
        Anda belum melakukan pembayaran atau pembayaran Anda belum dikonfirmasi oleh admin.
    </div>
@endif
@endsection