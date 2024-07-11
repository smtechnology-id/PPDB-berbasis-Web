<!DOCTYPE html>
<html>
<head>
    <style>
        .text-center {
            text-align: center;
        }
    </style>
</head>
<body>
    <table>
        <tr>
            <td colspan="5">
                <h3 class="text-center">Data Peserta Pendaftaran Siswa Baru</h3>
            </td>
        </tr>
        <tr>
            <td colspan="5">
                <p class="text-center">Data Seluruh Peserta Pendaftaran Siswa Baru</p>
                <hr>
            </td>
        </tr>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Jenis Kelamin</th>
            <th>Tempat Tanggal Lahir</th>
            <th>Alamat</th>
        </tr>
        <tbody>
            @php $no = 1; @endphp
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
</body>
</html>
