@extends('layouts.app')


@section('content')
    <div class="row">
        <h3>Data Pengumuman</h3>
        <p>Data Seluruh Pengumuman</p>
        <hr>
        <div class="table-responsive">
            <a href="{{ route('admin.addPengumuman') }}" class="btn btn-primary my-2">Tambah Pengumuman</a>
            <table class="table table-borderless">
                <thead>
                    <tr>
                       <td>No</td>
                       <td>Judul</td>
                       <td>Aksi</td>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $no = 1;
                    @endphp
                    @foreach ($data as $data)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $data->judul }}</td>
                            <td>
                               <a href="{{ route('admin.detailPengumuman', ['id' => $data->id]) }}" class="btn btn-outline-success">Detail</a>
                               <a href="{{ route('admin.deletePengumuman', ['id' => $data->id]) }}" class="btn btn-outline-danger">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
