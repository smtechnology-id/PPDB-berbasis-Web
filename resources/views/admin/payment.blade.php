@extends('layouts.app')


@section('content')
    <div class="row">
        <h3>Data Pembayaran Pendaftaran Siswa Baru</h3>
        <p>Data Seluruh Pembayaran Pendaftaran Siswa Baru</p>
        <hr>

        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Siswa</th>
                        <th>Sekolah Tujuan</th>
                        <th>Status </th>
                        <th>Download Bukti Pembayaran</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->user->name }}</td>
                            <td>{{ $item->sekolah_tujuan }}</td>
                            <td>
                                @if ($item->status == 'pending')
                                    <span class="btn btn-outline-warning">Pending</span>
                                @elseif($item->status == 'confirmed')
                                    <span class="btn btn-outline-success">Confirmed</span>
                                @else
                                    <span class="btn btn-outline-danger">{{ $item->status }}</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{ asset('storage/' . $item->bukti_pembayaran) }}"
                                    class="btn btn-primary">Download</a>
                            </td>
                            <td>
                                <a href="{{ route('admin.tolakPembayaran', ['id' => $item->id]) }}"
                                    class="btn btn-danger">Tolak</a>
                                <a href="{{ route('admin.konfirmasiPembayaran', ['id' => $item->id]) }}"
                                    class="btn btn-outline-success">Konfirmasi</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
