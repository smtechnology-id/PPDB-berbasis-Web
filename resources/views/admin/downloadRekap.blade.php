@extends('layouts.app')


@section('content')
    <div class="row">
        <h3 class="text-center">Data Peserta Pendaftaran Siswa Baru</h3>
        <p class="text-center">Data Seluruh Peserta Pendaftaran Siswa Baru</p>
        <hr>
        <div class="table-responsive">
            <table class="table table-borderless">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>JK</th>
                        <th>TTL</th>
                        <th>Alamat</th>
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
                            <td>
                                @if (isset($data->dataPribadi->alamat))
                                    {{ $data->dataPribadi->alamat . ', RT ' . $data->dataPribadi->rt . ', RW ' . $data->dataPribadi->rw . ', ' . $data->dataPribadi->kelurahan . ', ' . $data->dataPribadi->kecamatan . ', ' . $data->dataPribadi->kode_pos }}
                                @else
                                    <span class="text-danger">Belum diisi</span>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
