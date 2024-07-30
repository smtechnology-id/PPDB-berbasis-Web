@extends('layouts.app')

@section('content')
@if(Auth::user()->hasPaid() && Auth::user()->paymentConfirmed())
    <div class="row">
        <h3 class="mt-3">Pengisian Data Pendukung</h3>
        <p>Silahkan Lengkapi Data Pendukung Anda Pada Form DIbawah Ini, Pastikan Semua Kolom Terisi</p>
        <hr>
        <div class="table-responsive">
            @if ($dataPendukung)
                <!-- Form untuk update data pribadi -->
                <form action="{{ route('peserta.updateDataPendukung') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="user_id" value="{{ Auth::id() }}">
                    <table class="table table-borderless">
                        <tr>
                            <td>Tinggi Badan <span class="text-danger">*</span></td>
                            <td>:</td>
                            <td><input type="number" name="tinggi_badan" id="tinggi_badan"
                                    value="{{ $dataPendukung->tinggi_badan ?? old('tinggi_badan') }}" required
                                    class="form-control"></td>
                        </tr>
                        <tr>
                            <td>Berat Badan <span class="text-danger">*</span></td>
                            <td>:</td>
                            <td><input type="number" name="berat_badan" id="berat_badan"
                                    value="{{ $dataPendukung->berat_badan ?? old('berat_badan') }}" required
                                    class="form-control"></td>
                        </tr>
                        <tr>
                            <td>Lingkar Kepala</td>
                            <td>:</td>
                            <td><input type="number" name="lingkar_kepala" id="lingkar_kepala"
                                    value="{{ $dataPendukung->lingkar_kepala ?? old('lingkar_kepala') }}"
                                    class="form-control"></td>
                        </tr>
                        <tr>
                            <td>Jarak Tempuh</td>
                            <td>:</td>
                            <td><input type="text" name="jarak_tempuh" id="jarak_tempuh"
                                    value="{{ $dataPendukung->jarak_tempuh ?? old('jarak_tempuh') }}" class="form-control">
                            </td>
                        </tr>
                        <tr>
                            <td>Waktu Tempuh</td>
                            <td>:</td>
                            <td><input type="text" name="waktu_tempuh" id="waktu_tempuh"
                                    value="{{ $dataPendukung->waktu_tempuh ?? old('waktu_tempuh') }}" class="form-control">
                            </td>
                        </tr>
                        <tr>
                            <td>Jumlah Saudara</td>
                            <td>:</td>
                            <td><input type="number" name="jumlah_saudara" id="jumlah_saudara"
                                    value="{{ $dataPendukung->jumlah_saudara ?? old('jumlah_saudara') }}"
                                    class="form-control"></td>
                        </tr>
                        <tr>
                            <td>Berkas Passfoto</td>
                            <td>:</td>
                            <td>
                                @if ($dataPendukung->berkas_passfoto)
                                    <input type="file" name="berkas_passfoto" id="berkas_passfoto"
                                        class="form-control mt-2">
                                    <a href="{{ asset('storage/' . $dataPendukung->berkas_passfoto) }}"
                                        class="btn btn-sm btn-outline-primary" target="_blank">Download</a>
                                @else
                                    <input type="file" name="berkas_passfoto" id="berkas_passfoto" class="form-control">
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td>Berkas Akte</td>
                            <td>:</td>
                            <td>
                                @if ($dataPendukung->berkas_akte)
                                    <input type="file" name="berkas_akte" id="berkas_akte" class="form-control mt-2">
                                    <a href="{{ asset('storage/' . $dataPendukung->berkas_akte) }}"
                                        class="btn btn-sm btn-outline-primary" target="_blank">Download</a>
                                @else
                                    <input type="file" name="berkas_akte" id="berkas_akte" class="form-control">
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td>Berkas KK</td>
                            <td>:</td>
                            <td>
                                @if ($dataPendukung->berkas_kk)
                                    <input type="file" name="berkas_kk" id="berkas_kk" class="form-control mt-2">
                                    <a href="{{ asset('storage/' . $dataPendukung->berkas_kk) }}"
                                        class="btn btn-sm btn-outline-primary" target="_blank">Download</a>
                                @else
                                    <input type="file" name="berkas_kk" id="berkas_kk" class="form-control">
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td>KTP Ayah</td>
                            <td>:</td>
                            <td>
                                @if ($dataPendukung->ktp_ayah)
                                    <input type="file" name="ktp_ayah" id="ktp_ayah" class="form-control mt-2">
                                    <a href="{{ asset('storage/' . $dataPendukung->ktp_ayah) }}"
                                        class="btn btn-sm btn-outline-primary" target="_blank">Download</a>
                                @else
                                    <input type="file" name="ktp_ayah" id="ktp_ayah" class="form-control">
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td>KTP Ibu</td>
                            <td>:</td>
                            <td>
                                @if ($dataPendukung->ktp_ibu)
                                    <input type="file" name="ktp_ibu" id="ktp_ibu" class="form-control mt-2">
                                    <a href="{{ asset('storage/' . $dataPendukung->ktp_ibu) }}"
                                        class="btn btn-sm btn-outline-primary" target="_blank">Download</a>
                                @else
                                    <input type="file" name="ktp_ibu" id="ktp_ibu" class="form-control">
                                @endif
                            </td>
                        </tr>
                    </table>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            @else
                <!-- Form untuk pengisian data pribadi -->
                <form action="{{ route('peserta.addDataPendukung') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <table class="table table-borderless">
                        <tr>
                            <td>Tinggi Badan <span class="text-danger">*</span></td>
                            <td>:</td>
                            <td><input type="number" name="tinggi_badan" id="tinggi_badan" required
                                    class="form-control"></td>
                        </tr>
                        <tr>
                            <td>Berat Badan <span class="text-danger">*</span></td>
                            <td>:</td>
                            <td><input type="number" name="berat_badan" id="berat_badan" required class="form-control">
                            </td>
                        </tr>
                        <tr>
                            <td>Lingkar Kepala</td>
                            <td>:</td>
                            <td><input type="number" name="lingkar_kepala" id="lingkar_kepala" required class="form-control">
                            </td>
                        </tr>
                        <tr>
                            <td>Jarak Tempuh</td>
                            <td>:</td>
                            <td><input type="text" name="jarak_tempuh" id="jarak_tempuh" required class="form-control"></td>
                        </tr>
                        <tr>
                            <td>Waktu Tempuh</td>
                            <td>:</td>
                            <td><input type="text" name="waktu_tempuh" id="waktu_tempuh" required class="form-control"></td>
                        </tr>
                        <tr>
                            <td>Jumlah Saudara</td>
                            <td>:</td>
                            <td><input type="number" name="jumlah_saudara" id="jumlah_saudara" required class="form-control">
                            </td>
                        </tr>
                        <tr>
                            <td>Berkas Passfoto</td>
                            <td>:</td>
                            <td><input type="file" name="berkas_passfoto" id="berkas_passfoto" required class="form-control">
                            </td>
                        </tr>
                        <tr>
                            <td>Berkas Akte</td>
                            <td>:</td>
                            <td><input type="file" name="berkas_akte" id="berkas_akte" required class="form-control"></td>
                        </tr>
                        <tr>
                            <td>Berkas KK</td>
                            <td>:</td>
                            <td><input type="file" name="berkas_kk" id="berkas_kk" required class="form-control"></td>
                        </tr>
                        <tr>
                            <td>KTP Ayah</td>
                            <td>:</td>
                            <td><input type="file" name="ktp_ayah" id="ktp_ayah" required class="form-control"></td>
                        </tr>
                        <tr>
                            <td>KTP Ibu</td>
                            <td>:</td>
                            <td><input type="file" name="ktp_ibu" id="ktp_ibu" required class="form-control"></td>
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
