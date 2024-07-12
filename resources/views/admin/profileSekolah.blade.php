@extends('layouts.app')

@section('content')
    <div class="row">
        <h3 class="mt-3">Pengisian Data Profile Sekolah</h3>
        <p>Silahkan Lengkapi Data Profile Sekolah Pada Form DIbawah Ini, Pastikan Semua Kolom Terisi</p>
        <hr>
        <div class="table-responsive">
            @if ($data)
                <!-- Form untuk update data sekolah -->
                <form action="{{ route('admin.updateProfileSekolah', $data->id) }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label for="nama_sekolah" class="form-label">Nama Sekolah</label>
                        <input type="text" class="form-control" id="nama_sekolah" name="nama_sekolah"
                            value="{{ $data->nama_sekolah }}" required>
                        <input type="hidden" class="form-control" id="id" name="id"
                            value="{{ $data->id }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="alamat" class="form-label">Alamat</label>
                        <textarea class="form-control" id="alamat" name="alamat" rows="3" required>{{ $data->alamat }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="akreditasi" class="form-label">Akreditasi</label>
                        <input type="text" class="form-control" id="akreditasi" name="akreditasi"
                            value="{{ $data->akreditasi }}">
                    </div>
                    <div class="mb-3">
                        <label for="kode_pos" class="form-label">Kode Pos</label>
                        <input type="text" class="form-control" id="kode_pos" name="kode_pos"
                            value="{{ $data->kode_pos }}" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            @else
                <!-- Form untuk pengisian data pribadi -->
                <form action="{{ route('admin.addProfileSekolah') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="nama_sekolah" class="form-label">Nama Sekolah</label>
                        <input type="text" class="form-control" id="nama_sekolah" name="nama_sekolah" required>
                    </div>
                    <div class="mb-3">
                        <label for="alamat" class="form-label">Alamat</label>
                        <textarea class="form-control" id="alamat" name="alamat" rows="3" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="akreditasi" class="form-label">Akreditasi</label>
                        <input type="text" class="form-control" id="akreditasi" name="akreditasi">
                    </div>
                    <div class="mb-3">
                        <label for="kode_pos" class="form-label">Kode Pos</label>
                        <input type="text" class="form-control" id="kode_pos" name="kode_pos" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            @endif
        </div>
    </div>
@endsection
