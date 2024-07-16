@extends('layouts.app')


@section('content')
    <div class="row">
        <h3>Data Peserta Pendaftaran Siswa Baru</h3>
        <p>Data Seluruh Peserta Pendaftaran Siswa Baru</p>
        <hr>
        <div class="table-responsive">
            <a href="{{ route('admin.exportRekap') }}" class="btn btn-primary my-2">Download Rekap</a>
            <table class="table table-borderless">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>JK</th>
                        <th>TTL</th>
                        <th>Alamat</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $no = 1;
                    @endphp
                    @foreach ($dataPeserta as $data)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $data->name }}</td>
                            <td>{!! $data->dataPribadi->jenis_kelamin ?? '<span class="text-danger">Belum diisi</span>' !!}</td>
                            <td>
                                @if (isset($data->dataPribadi->tempat_lahir) && isset($data->dataPribadi->tanggal_lahir))
                                    {{ $data->dataPribadi->tempat_lahir . ', ' . $data->dataPribadi->tanggal_lahir }}
                                @else
                                    <span class="text-danger">Belum diisi</span>
                                @endif
                            </td>
                            <td>{!! $data->dataPribadi->alamat ?? '<span class="text-danger">Belum diisi</span>' !!}</td>
                            <td>
                                <a href="{{ route('admin.downloadSingle', ['id' => $data->id]) }}" class="btn btn-outline-primary">Download</a>
                                <a href="{{ route('admin.detailPendaftaran', ['id' => $data->id]) }}" class="btn btn-outline-success">Detail</a>
                                <a href="{{ route('admin.deletePeserta', ['id' => $data->id]) }}" class="btn btn-outline-danger">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
