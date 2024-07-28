<h1>Rekap Payment</h1>
    <button onclick="window.print()" class="btn btn-secondary my-2">Unduh PDF</button>
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