@extends('layouts.app')


@section('content')
    <div class="row">
        <h3>Tambah Pengumuman</h3>
        <hr>
        <form action="{{ route('admin.addPengumumanPost') }}" method="post">
            @csrf
            <div class="form-group">
                <label for="judul">Judul</label>
                <input type="text" name="judul" class="form-control">
            </div>
            <div class="form-group">
                <label for="isi">Isi</label>
                <textarea name="isi" class="form-control" id="content_berita"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Tambah</button>
        </form>
    </div>
@endsection

