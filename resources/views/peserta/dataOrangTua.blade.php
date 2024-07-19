@extends('layouts.app')

@section('content')

@if(Auth::user()->hasPaid() && Auth::user()->paymentConfirmed())
    <div class="row">
        <h3 class="mt-3">Pengisian Data Pribadi</h3>
        <p>Silahkan Lengkapi Data Pribadi Anda Pada Form DIbawah Ini, Pastikan Semua Kolom Terisi</p>
        <hr>
        <div class="table-responsive">
            @if ($dataOrangTua)
                <!-- Form untuk update data pribadi -->
                <form action="{{ route('peserta.updateDataOrangTua', $dataOrangTua->id) }}" method="POST">
                    @csrf
                    <input type="hidden" name="user_id" value="{{ Auth::id() }}">
                    <table class="table table-borderless">
                        <tr>
                            <td>Nama Ayah <span class="text-danger">*</span></td>
                            <td>:</td>
                            <td><input type="text" name="nama_ayah" id="nama_ayah" required class="form-control" value="{{ $dataOrangTua->nama_ayah }}"></td>
                        </tr>
                        <tr>
                            <td>NIK Ayah <span class="text-danger">*</span></td>
                            <td>:</td>
                            <td><input type="number" name="nik_ayah" id="nik_ayah" required class="form-control" value="{{ $dataOrangTua->nik_ayah }}"></td>
                        </tr>
                        <tr>
                            <td>Tempat Lahir Ayah <span class="text-danger">*</span></td>
                            <td>:</td>
                            <td><input type="text" name="tempat_lahir_ayah" id="tempat_lahir_ayah" required class="form-control" value="{{ $dataOrangTua->tempat_lahir_ayah }}"></td>
                        </tr>
                        <tr>
                            <td>Tanggal Lahir Ayah <span class="text-danger">*</span></td>
                            <td>:</td>
                            <td><input type="date" name="tanggal_lahir_ayah" id="tanggal_lahir_ayah" required class="form-control" value="{{ $dataOrangTua->tanggal_lahir_ayah }}"></td>
                        </tr>
                        <tr>
                            <td>Pendidikan Ayah <span class="text-danger">*</span></td>
                            <td>:</td>
                            <td><input type="text" name="pendidikan_ayah" id="pendidikan_ayah" required class="form-control" value="{{ $dataOrangTua->pendidikan_ayah }}"></td>
                        </tr>
                        <tr>
                            <td>Penghasilan Ayah <span class="text-danger">*</span></td>
                            <td>:</td>
                            <td><input type="number" name="penghasilan_ayah" id="penghasilan_ayah" required class="form-control" value="{{ $dataOrangTua->penghasilan_ayah }}"></td>
                        </tr>
                        <tr>
                            <td>Berkebutuhan Khusus Ayah</td>
                            <td>:</td>
                            <td><input type="text" name="berkebutuhan_khusus_ayah" id="berkebutuhan_khusus_ayah" class="form-control" value="{{ $dataOrangTua->berkebutuhan_khusus_ayah }}"></td>
                        </tr>
                        <tr>
                            <td>Nama Ibu <span class="text-danger">*</span></td>
                            <td>:</td>
                            <td><input type="text" name="nama_ibu" id="nama_ibu" required class="form-control" value="{{ $dataOrangTua->nama_ibu }}"></td>
                        </tr>
                        <tr>
                            <td>NIK Ibu <span class="text-danger">*</span></td>
                            <td>:</td>
                            <td><input type="number" name="nik_ibu" id="nik_ibu" required class="form-control" value="{{ $dataOrangTua->nik_ibu }}"></td>
                        </tr>
                        <tr>
                            <td>Tempat Lahir Ibu <span class="text-danger">*</span></td>
                            <td>:</td>
                            <td><input type="text" name="tempat_lahir_ibu" id="tempat_lahir_ibu" required class="form-control" value="{{ $dataOrangTua->tempat_lahir_ibu }}"></td>
                        </tr>
                        <tr>
                            <td>Tanggal Lahir Ibu <span class="text-danger">*</span></td>
                            <td>:</td>
                            <td><input type="date" name="tanggal_lahir_ibu" id="tanggal_lahir_ibu" required class="form-control" value="{{ $dataOrangTua->tanggal_lahir_ibu }}"></td>
                        </tr>
                        <tr>
                            <td>Pendidikan Ibu <span class="text-danger">*</span></td>
                            <td>:</td>
                            <td><input type="text" name="pendidikan_ibu" id="pendidikan_ibu" required class="form-control" value="{{ $dataOrangTua->pendidikan_ibu }}"></td>
                        </tr>
                        <tr>
                            <td>Penghasilan Ibu <span class="text-danger">*</span></td>
                            <td>:</td>
                            <td><input type="number" name="penghasilan_ibu" id="penghasilan_ibu" required class="form-control" value="{{ $dataOrangTua->penghasilan_ibu }}"></td>
                        </tr>
                        <tr>
                            <td>Berkebutuhan Khusus Ibu</td>
                            <td>:</td>
                            <td><input type="text" name="berkebutuhan_khusus_ibu" id="berkebutuhan_khusus_ibu" class="form-control" value="{{ $dataOrangTua->berkebutuhan_khusus_ibu }}"></td>
                        </tr>
                        <tr>
                            <td>Nama Wali</td>
                            <td>:</td>
                            <td><input type="text" name="nama_wali" id="nama_wali" class="form-control" value="{{ $dataOrangTua->nama_wali }}"></td>
                        </tr>
                        <tr>
                            <td>NIK Wali</td>
                            <td>:</td>
                            <td><input type="number" name="nik_wali" id="nik_wali" class="form-control" value="{{ $dataOrangTua->nik_wali }}"></td>
                        </tr>
                        <tr>
                            <td>Tempat Lahir Wali</td>
                            <td>:</td>
                            <td><input type="text" name="tempat_lahir_wali" id="tempat_lahir_wali" class="form-control" value="{{ $dataOrangTua->tempat_lahir_wali }}"></td>
                        </tr>
                        <tr>
                            <td>Tanggal Lahir Wali</td>
                            <td>:</td>
                            <td><input type="date" name="tanggal_lahir_wali" id="tanggal_lahir_wali" class="form-control" value="{{ $dataOrangTua->tanggal_lahir_wali }}"></td>
                        </tr>
                        <tr>
                            <td>Pendidikan Wali</td>
                            <td>:</td>
                            <td><input type="text" name="pendidikan_wali" id="pendidikan_wali" class="form-control" value="{{ $dataOrangTua->pendidikan_wali }}"></td>
                        </tr>
                        <tr>
                            <td>Penghasilan Wali</td>
                            <td>:</td>
                            <td><input type="number" name="penghasilan_wali" id="penghasilan_wali" class="form-control" value="{{ $dataOrangTua->penghasilan_wali }}"></td>
                        </tr>
                        <tr>
                            <td>Berkebutuhan Khusus Wali</td>
                            <td>:</td>
                            <td><input type="text" name="berkebutuhan_khusus_wali" id="berkebutuhan_khusus_wali" class="form-control" value="{{ $dataOrangTua->berkebutuhan_khusus_wali }}"></td>
                        </tr>
                    </table>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            @else
                <!-- Form untuk pengisian data pribadi -->
                <form action="{{ route('peserta.addDataOrangTua') }}" method="POST">
                    @csrf
                    <input type="hidden" name="user_id" value="{{ Auth::id() }}">
                    <table class="table table-borderless">
                        <tr>
                            <td>Nama Ayah <span class="text-danger">*</span></td>
                            <td>:</td>
                            <td><input type="text" name="nama_ayah" id="nama_ayah" required class="form-control">
                            </td>
                        </tr>
                        <tr>
                            <td>NIK Ayah <span class="text-danger">*</span></td>
                            <td>:</td>
                            <td><input type="number" name="nik_ayah" id="nik_ayah" required class="form-control"></td>
                        </tr>
                        <tr>
                            <td>Tempat Lahir Ayah <span class="text-danger">*</span></td>
                            <td>:</td>
                            <td><input type="text" name="tempat_lahir_ayah" id="tempat_lahir_ayah" required
                                    class="form-control"></td>
                        </tr>
                        <tr>
                            <td>Tanggal Lahir Ayah <span class="text-danger">*</span></td>
                            <td>:</td>
                            <td><input type="date" name="tanggal_lahir_ayah" id="tanggal_lahir_ayah" required
                                    class="form-control"></td>
                        </tr>
                        <tr>
                            <td>Pendidikan Ayah <span class="text-danger">*</span></td>
                            <td>:</td>
                            <td><input type="text" name="pendidikan_ayah" id="pendidikan_ayah" required
                                    class="form-control"></td>
                        </tr>
                        <tr>
                            <td>Penghasilan Ayah <span class="text-danger">*</span></td>
                            <td>:</td>
                            <td><input type="number" name="penghasilan_ayah" id="penghasilan_ayah" required
                                    class="form-control"></td>
                        </tr>
                        <tr>
                            <td>Berkebutuhan Khusus Ayah</td>
                            <td>:</td>
                            <td><input type="text" name="berkebutuhan_khusus_ayah" id="berkebutuhan_khusus_ayah"
                                    class="form-control"></td>
                        </tr>
                        <tr>
                            <td>Nama Ibu <span class="text-danger">*</span></td>
                            <td>:</td>
                            <td><input type="text" name="nama_ibu" id="nama_ibu" required class="form-control"></td>
                        </tr>
                        <tr>
                            <td>NIK Ibu <span class="text-danger">*</span></td>
                            <td>:</td>
                            <td><input type="number" name="nik_ibu" id="nik_ibu" required class="form-control"></td>
                        </tr>
                        <tr>
                            <td>Tempat Lahir Ibu <span class="text-danger">*</span></td>
                            <td>:</td>
                            <td><input type="text" name="tempat_lahir_ibu" id="tempat_lahir_ibu" required
                                    class="form-control"></td>
                        </tr>
                        <tr>
                            <td>Tanggal Lahir Ibu <span class="text-danger">*</span></td>
                            <td>:</td>
                            <td><input type="date" name="tanggal_lahir_ibu" id="tanggal_lahir_ibu" required
                                    class="form-control"></td>
                        </tr>
                        <tr>
                            <td>Pendidikan Ibu <span class="text-danger">*</span></td>
                            <td>:</td>
                            <td><input type="text" name="pendidikan_ibu" id="pendidikan_ibu" required
                                    class="form-control"></td>
                        </tr>
                        <tr>
                            <td>Penghasilan Ibu <span class="text-danger">*</span></td>
                            <td>:</td>
                            <td><input type="number" name="penghasilan_ibu" id="penghasilan_ibu" required
                                    class="form-control"></td>
                        </tr>
                        <tr>
                            <td>Berkebutuhan Khusus Ibu</td>
                            <td>:</td>
                            <td><input type="text" name="berkebutuhan_khusus_ibu" id="berkebutuhan_khusus_ibu"
                                    class="form-control"></td>
                        </tr>
                        <tr>
                            <td>Nama Wali</td>
                            <td>:</td>
                            <td><input type="text" name="nama_wali" id="nama_wali" class="form-control"></td>
                        </tr>
                        <tr>
                            <td>NIK Wali</td>
                            <td>:</td>
                            <td><input type="number" name="nik_wali" id="nik_wali" class="form-control"></td>
                        </tr>
                        <tr>
                            <td>Tempat Lahir Wali</td>
                            <td>:</td>
                            <td><input type="text" name="tempat_lahir_wali" id="tempat_lahir_wali"
                                    class="form-control"></td>
                        </tr>
                        <tr>
                            <td>Tanggal Lahir Wali</td>
                            <td>:</td>
                            <td><input type="date" name="tanggal_lahir_wali" id="tanggal_lahir_wali"
                                    class="form-control"></td>
                        </tr>
                        <tr>
                            <td>Pendidikan Wali</td>
                            <td>:</td>
                            <td><input type="text" name="pendidikan_wali" id="pendidikan_wali" class="form-control">
                            </td>
                        </tr>
                        <tr>
                            <td>Penghasilan Wali</td>
                            <td>:</td>
                            <td><input type="number" name="penghasilan_wali" id="penghasilan_wali"
                                    class="form-control"></td>
                        </tr>
                        <tr>
                            <td>Berkebutuhan Khusus Wali</td>
                            <td>:</td>
                            <td><input type="text" name="berkebutuhan_khusus_wali" id="berkebutuhan_khusus_wali"
                                    class="form-control"></td>
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
