@extends('layouts.app')


@section('content')
    <div class="row">
        <h3>Data Pembayaran Pendaftaran Siswa Baru</h3>
        <p>Data Seluruh Pembayaran Pendaftaran Siswa Baru</p>
        <hr>
        <div class="card">
            <div class="card-header">
                <h4>Rekap Pembayaran</h4>
            </div>
            <div class="card-body">
                <!-- Rekap Total Pembayaran dan Jumlah Siswa -->
                <div class="row">
                    <div class="col-md-6">
                        <h5>Total Pembayaran Masuk: Rp {{ number_format($totalPembayaran, 0, ',', '.') }}</h5>
                    </div>
                    <div class="col-md-6">
                        <h5>Jumlah Siswa: {{ $jumlahSiswa }}</h5>
                    </div>
                </div>
                <hr>
            </div>
        </div>
        <div class="table-responsive">
            <form action="" method="GET" class="my-2">
                <div class="form-group">
                    <label for="start_date">Tanggal Mulai:</label>
                    <input type="date" id="start_date" name="start_date" class="form-control" value="{{ request('start_date') }}">
                </div>
                <div class="form-group">
                    <label for="end_date">Tanggal Akhir:</label>
                    <input type="date" id="end_date" name="end_date" class="form-control" value="{{ request('end_date') }}">
                </div>
                <button type="submit" class="btn btn-primary">Filter</button>
            </form>
            <a href="{{ route('pimpinan.rekapPayment') }}" target="_blank" class="btn btn-secondary my-2">Unduh PDF</a>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Siswa</th>
                        <th>Sekolah Tujuan</th>
                        <th>Jumlah Bayar</th>
                        <th>Status Pembayaran</th>
                        <th>Tanggal</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $item)
                        @if ((!request('start_date') || $item->tanggal >= request('start_date')) && 
                             (!request('end_date') || $item->tanggal <= request('end_date')))
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->user->name }}</td>
                                <td>{{ $item->sekolah_tujuan }}</td>
                                <td>Rp.{{ number_format($item->jumlah_pembayaran, 0, ',', '.') }} </td>
                                <td>
                                    @if ($item->status == 'pending')
                                        <span class="btn btn-outline-warning">Pending</span>
                                    @elseif($item->status == 'confirmed')
                                        <span class="btn btn-outline-success">Confirmed</span>
                                    @else
                                        <span class="btn btn-outline-danger">{{ $item->status }}</span>
                                    @endif
                                </td>
                                <td>{{ \Carbon\Carbon::parse($item->tanggal)->format('H:i:s d-m-Y') }}</td>
                            </tr>
                        @endif
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection