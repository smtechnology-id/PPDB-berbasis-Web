@extends('layouts.app')

@section('content')
    <div class="row">
        <h3 class="mt-3">Formulir Pembayaran</h3>
        <p>Untuk melanjutkan ke menu pengisian data yang lain, silakan selesaikan pembayaran terlebih dahulu.</p>
        <hr>
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        <h4 class="mb-0">Informasi Rekening</h4>
                    </div>
                    <div class="card-body">
                        <p><strong>Bank:</strong> Bank ABC</p>
                        <p><strong>Nomor Rekening:</strong> 1234567890</p>
                        <p><strong>Atas Nama:</strong> PT. Pendidikan Indonesia</p>
                        <hr>
                    </div>
                    <div class="card-footer">
                        <button class="btn btn-primary btn-block" onclick="copyToClipboard()">Salin Informasi</button>
                    </div>
                </div>
            </div>
            @if ($payments)
                @if ($payments->status == 'pending')
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header bg-warning text-white">
                                <h4 class="mb-0">Status Pembayaran</h4>
                            </div>
                            <div class="card-body">
                                <p>Pembayaran Anda sedang diperiksa oleh admin. <br> Silakan tunggu sampai status pembayaran
                                    berubah menjadi <span class="text-success">Confirmed</span>.</p>
                            </div>
                            <div class="card-footer">
                                <a target="_blank" href="{{ asset('storage/' . $payments->bukti_pembayaran) }}"
                                    class="btn btn-warning">Bukti Pembayaran</a>
                            </div>
                            <div class="card">
                                <div class="card-header bg-primary text-white">
                                    <h4 class="mb-0">Rincian </h4>
                                </div>
                                <div class="card-body">
                                    <ul>
                                        <li>Seragam Batik</li>
                                        <li>Seragam Olahraga</li>
                                        <li>Sepatu</li>
                                        <li>Buku Pelajaran</li>
                                        <li>Uang Gedung</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                @elseif($payments->status == 'confirmed')
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header bg-success text-white">
                                <h4 class="mb-0">Status Pembayaran</h4>
                            </div>
                            <div class="card-body">
                                <p>Pembayaran Anda telah dikonfirmasi oleh admin. Silahkan Lanjutkan ke menu pengisian data.
                                </p>
                            </div>
                            <div class="card-footer">
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header bg-primary text-white">
                                <h4 class="mb-0">Rincian </h4>
                            </div>
                            <div class="card-body">
                                <ul>
                                    <li>Seragam Batik</li>
                                    <li>Seragam Olahraga</li>
                                    <li>Sepatu</li>
                                    <li>Buku Pelajaran</li>
                                    <li>Uang Gedung</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header bg-danger text-white">
                                <h4 class="mb-0">
                                    Status Pembayaran
                                </h4>
                            </div>
                            <div class="card-body">
                                <p>Status Pembayaran Anda Ditolak, Silahkan Inputkan Pembayaran Anda
                                    <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal"
                                        data-bs-target="#standard-modal">Disini</button>
                                </p>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header bg-primary text-white">
                                <h4 class="mb-0">Rincian </h4>
                            </div>
                            <div class="card-body">
                                <ul>
                                    <li>Seragam Batik</li>
                                    <li>Seragam Olahraga</li>
                                    <li>Sepatu</li>
                                    <li>Buku Pelajaran</li>
                                    <li>Uang Gedung</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                @endif
            @endif
            <div class="col-md-12">
                <div class="table-responsive">
                    <!-- Tampilkan riwayat pembayaran jika ada -->
                    @if (!$payments)
                        <h3 class="mt-2">Formulir</h3>
                        <form action="{{ route('peserta.addPayment') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group mb-2">
                                <input type="hidden" class="form-control" id="user_id" name="user_id"
                                    value="{{ Auth::user()->id }}" readonly>
                            </div>
                            <div class="form-group mb-2">
                                <label for="sekolah_tujuan">Sekolah Tujuan:</label>
                                <div class="d-flex row">
                                    <div class="col-6">
                                        <div class="card m-2">
                                            <div class="card-body">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="sekolah_tujuan"
                                                        id="sd1" value="SD 1" required>
                                                    <label class="form-check-label" for="sd1">
                                                        <img src="https://png.pngtree.com/png-vector/20190725/ourlarge/pngtree-school-icon-png-image_1606554.jpg"
                                                            alt="SD 1" style="width: 100px; height: auto;"> SD 1
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="card m-2">
                                            <div class="card-body">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="sekolah_tujuan"
                                                        id="sd2" value="SD 02" required>
                                                    <label class="form-check-label" for="sd2">
                                                        <img src="https://png.pngtree.com/png-vector/20190725/ourlarge/pngtree-school-icon-png-image_1606554.jpg"
                                                            alt="SD 02" style="width: 100px; height: auto;"> SD 02
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Tambahkan field untuk nama dan email dengan styling berbeda -->
                            <div class="form-group mb-2">
                                <label for="nama">Nama:</label>
                                <input type="text" class="form-control readonly-field" id="nama" name="nama"
                                    value="{{ Auth::user()->name }}" readonly>
                            </div>
                            <div class="form-group mb-2">
                                <label for="email">Email:</label>
                                <input type="email" class="form-control readonly-field" id="email" name="email"
                                    value="{{ Auth::user()->email }}" readonly>
                            </div>
                            <!-- Akhir dari penambahan field -->

                            <div class="form-group mb-2">
                                <label for="jumlah_pembayaran">Jumlah Pembayaran:</label>
                                <input type="text" class="form-control readonly-field" id="jumlah_pembayaran"
                                    name="" value="Rp. 850.000" readonly>
                                <input type="hidden" class="form-control readonly-field" id="jumlah_pembayaran"
                                    name="jumlah_pembayaran" required value="850000" readonly>
                            </div>

                            <div class="form-group mb-2">
                                <label for="metode_pembayaran">Metode Pembayaran:</label>
                                <input type="text" class="form-control readonly-field" id="metode_pembayaran"
                                    name="metode_pembayaran" value="transfer" readonly>
                            </div>
                            <div class="form-group mb-2">
                                <label for="bukti_pembayaran">Bukti Pembayaran:</label>
                                <input type="file" required class="form-control-file" id="bukti_pembayaran"
                                    name="bukti_pembayaran" accept="image/*" required onchange="previewImage(event)">
                                <img id="preview" src="#" alt="Pratinjau Bukti Pembayaran"
                                    style="display:none; margin-top:10px; max-width:100%; height:auto;">
                            </div>
                            <div class="form-group mb-2">
                                <label for="keterangan">Keterangan:</label>
                                <textarea class="form-control" id="keterangan" name="keterangan"></textarea>
                            </div>
                            <input type="hidden" name="status" value="pending">
                            <input type="hidden" name="tanggal" value="{{ \Carbon\Carbon::now() }}">
                            <button type="submit" class="btn btn-primary">Kirim</button>
                        </form>
                    @else
                        <h3>Riwayat Pembayaran</h3>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Tanggal</th>
                                    <th>Jumlah</th>
                                    <th>Metode</th>
                                    <th>Status</th>
                                    <th>Keterangan</th>
                                </tr>
                            </thead>
                            <tbody>

                                <tr>
                                    <td>{{ $payments->tanggal }}</td>
                                    <td>Rp. {{ number_format($payments->jumlah_pembayaran, 0, ',', '.') }}</td>
                                    <td>{{ $payments->metode_pembayaran }}</td>
                                    <td>
                                        @if ($payments->status == 'pending')
                                            <span class="btn btn-warning">Pending</span>
                                        @elseif($payments->status == 'confirmed')
                                            <span class="btn btn-success">Confirmed</span>
                                        @else
                                            <span class="btn btn-secondary">{{ $payments->status }}</span>
                                        @endif
                                    </td>
                                    <td>{{ $payments->keterangan }}</td>
                                </tr>

                            </tbody>
                        </table>
                        <div id="standard-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="standard-modalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="standard-modalLabel">Upload Ulang Bukti Pembayaran</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('peserta.reuploadPayment') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group mb-2">
                            <label for="bukti_pembayaran">Bukti Pembayaran:</label>
                            <input type="file" required class="form-control-file" id="bukti_pembayaran"
                                name="bukti_pembayaran" accept="image/*" required onchange="previewImage(event)">
                            <img id="preview" src="#" alt="Pratinjau Bukti Pembayaran"
                                style="display:none; margin-top:10px; max-width:100%; height:auto;">
                        </div>
                        <input type="hidden" name="status" value="pending">
                        <input type="hidden" name="id" value="{{ $payments->id }}">
                        <input type="hidden" name="tanggal" value="{{ \Carbon\Carbon::now() }}">
                        <button type="submit" class="btn btn-danger">Kirim</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>

                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
                    @endif
                </div>
            </div>
        </div>
    </div>
    
@endsection

@section('scripts')
    <script>
        function previewImage(event) {
            var reader = new FileReader();
            reader.onload = function() {
                var output = document.getElementById('preview');
                output.src = reader.result;
                output.style.display = 'block';
            };
            reader.readAsDataURL(event.target.files[0]);
        }

        function copyToClipboard() {
            var text = "Bank: Bank ABC\nNomor Rekening: 1234567890\nAtas Nama: PT. Pendidikan Indonesia";
            navigator.clipboard.writeText(text).then(function() {
                alert('Informasi rekening berhasil disalin!');
            }, function(err) {
                alert('Gagal menyalin informasi rekening.');
            });
        }
    </script>
    <style>
        .readonly-field {
            background-color: #e9ecef;
            border-color: #ced4da;
        }
    </style>
@endsection

<!-- Modal -->
