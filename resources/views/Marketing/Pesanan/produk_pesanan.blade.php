@extends('Layout.master', ['title' => 'Pesanan'])
@section('nav')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pesanan/</a></li>
        </ol>
        <h6 class="font-weight-bolder mb-0">Pesanan</h6>
    </nav>
@endsection
@section('konten')
    <div class="container-fluid" id="status_load">
        <div class="page-header min-height-300 border-radius-xl mt-4"
            style="background-image: url('../assets/img/curved-images/curved0.jpg'); background-position-y: 50%;">
            <span class="mask bg-gradient-primary opacity-6"></span>
        </div>
        <div class="card card-body blur shadow-blur mx-4 mt-n6 overflow-hidden">
            <div class="row gx-4">
                <div class="col-auto">
                    <div class="avatar avatar-xl position-relative">
                        <img src="{{ asset('Assets/img/team-3.jpg') }}" alt="profile_image"
                            class="w-100 border-radius-lg shadow-sm">
                    </div>
                </div>
                <div class="col-auto my-auto">
                    <div class="h-100">
                        <h5 class="mb-1">
                            {{ $data_pesanan->relasi_distributor->nama }}
                        </h5>
                        <p class="mb-0 font-weight-bold text-sm">
                            {{ $data_pesanan->relasi_distributor->alamat }}
                        </p>
                        <p class="mb-0 font-weight-bold text-sm">
                            {{ $data_pesanan->relasi_distributor->nomor_hp }}
                        </p>
                    </div>
                </div>
                {{-- <div class="col-lg-4 col-md-6 my-sm-auto ms-sm-auto me-sm-0 mx-auto mt-3">
                    <div class="nav-wrapper position-relative end-0">
                        <ul class="nav nav-pills nav-fill p-1 bg-transparent" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link mb-0 px-0 py-1 active " data-bs-toggle="tab" href="javascript:;"
                                    role="tab" aria-selected="true">
                                    <svg class="text-dark" width="16px" height="16px" viewBox="0 0 42 42" version="1.1"
                                        xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <g transform="translate(-2319.000000, -291.000000)" fill="#FFFFFF"
                                                fill-rule="nonzero">
                                                <g transform="translate(1716.000000, 291.000000)">
                                                    <g transform="translate(603.000000, 0.000000)">
                                                        <path class="color-background"
                                                            d="M22.7597136,19.3090182 L38.8987031,11.2395234 C39.3926816,10.9925342 39.592906,10.3918611 39.3459167,9.89788265 C39.249157,9.70436312 39.0922432,9.5474453 38.8987261,9.45068056 L20.2741875,0.1378125 L20.2741875,0.1378125 C19.905375,-0.04725 19.469625,-0.04725 19.0995,0.1378125 L3.1011696,8.13815822 C2.60720568,8.38517662 2.40701679,8.98586148 2.6540352,9.4798254 C2.75080129,9.67332903 2.90771305,9.83023153 3.10122239,9.9269862 L21.8652864,19.3090182 C22.1468139,19.4497819 22.4781861,19.4497819 22.7597136,19.3090182 Z">
                                                        </path>
                                                        <path class="color-background"
                                                            d="M23.625,22.429159 L23.625,39.8805372 C23.625,40.4328219 24.0727153,40.8805372 24.625,40.8805372 C24.7802551,40.8805372 24.9333778,40.8443874 25.0722402,40.7749511 L41.2741875,32.673375 L41.2741875,32.673375 C41.719125,32.4515625 42,31.9974375 42,31.5 L42,14.241659 C42,13.6893742 41.5522847,13.241659 41,13.241659 C40.8447549,13.241659 40.6916418,13.2778041 40.5527864,13.3472318 L24.1777864,21.5347318 C23.8390024,21.7041238 23.625,22.0503869 23.625,22.429159 Z"
                                                            opacity="0.7"></path>
                                                        <path class="color-background"
                                                            d="M20.4472136,21.5347318 L1.4472136,12.0347318 C0.953235098,11.7877425 0.352562058,11.9879669 0.105572809,12.4819454 C0.0361450918,12.6208008 6.47121774e-16,12.7739139 0,12.929159 L0,30.1875 L0,30.1875 C0,30.6849375 0.280875,31.1390625 0.7258125,31.3621875 L19.5528096,40.7750766 C20.0467945,41.0220531 20.6474623,40.8218132 20.8944388,40.3278283 C20.963859,40.1889789 21,40.0358742 21,39.8806379 L21,22.429159 C21,22.0503869 20.7859976,21.7041238 20.4472136,21.5347318 Z"
                                                            opacity="0.7"></path>
                                                    </g>
                                                </g>
                                            </g>
                                        </g>
                                    </svg>
                                    <span class="ms-1">App</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link mb-0 px-0 py-1 " data-bs-toggle="tab" href="javascript:;" role="tab"
                                    aria-selected="false">
                                    <svg class="text-dark" width="16px" height="16px" viewBox="0 0 40 44" version="1.1"
                                        xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                        <title>document</title>
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <g transform="translate(-1870.000000, -591.000000)" fill="#FFFFFF"
                                                fill-rule="nonzero">
                                                <g transform="translate(1716.000000, 291.000000)">
                                                    <g transform="translate(154.000000, 300.000000)">
                                                        <path class="color-background"
                                                            d="M40,40 L36.3636364,40 L36.3636364,3.63636364 L5.45454545,3.63636364 L5.45454545,0 L38.1818182,0 C39.1854545,0 40,0.814545455 40,1.81818182 L40,40 Z"
                                                            opacity="0.603585379"></path>
                                                        <path class="color-background"
                                                            d="M30.9090909,7.27272727 L1.81818182,7.27272727 C0.814545455,7.27272727 0,8.08727273 0,9.09090909 L0,41.8181818 C0,42.8218182 0.814545455,43.6363636 1.81818182,43.6363636 L30.9090909,43.6363636 C31.9127273,43.6363636 32.7272727,42.8218182 32.7272727,41.8181818 L32.7272727,9.09090909 C32.7272727,8.08727273 31.9127273,7.27272727 30.9090909,7.27272727 Z M18.1818182,34.5454545 L7.27272727,34.5454545 L7.27272727,30.9090909 L18.1818182,30.9090909 L18.1818182,34.5454545 Z M25.4545455,27.2727273 L7.27272727,27.2727273 L7.27272727,23.6363636 L25.4545455,23.6363636 L25.4545455,27.2727273 Z M25.4545455,20 L7.27272727,20 L7.27272727,16.3636364 L25.4545455,16.3636364 L25.4545455,20 Z">
                                                        </path>
                                                    </g>
                                                </g>
                                            </g>
                                        </g>
                                    </svg>
                                    <span class="ms-1">Messages</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link mb-0 px-0 py-1 " data-bs-toggle="tab" href="javascript:;" role="tab"
                                    aria-selected="false">
                                    <svg class="text-dark" width="16px" height="16px" viewBox="0 0 40 40" version="1.1"
                                        xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                        <title>settings</title>
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <g transform="translate(-2020.000000, -442.000000)" fill="#FFFFFF"
                                                fill-rule="nonzero">
                                                <g transform="translate(1716.000000, 291.000000)">
                                                    <g transform="translate(304.000000, 151.000000)">
                                                        <polygon class="color-background" opacity="0.596981957"
                                                            points="18.0883333 15.7316667 11.1783333 8.82166667 13.3333333 6.66666667 6.66666667 0 0 6.66666667 6.66666667 13.3333333 8.82166667 11.1783333 15.315 17.6716667">
                                                        </polygon>
                                                        <path class="color-background"
                                                            d="M31.5666667,23.2333333 C31.0516667,23.2933333 30.53,23.3333333 30,23.3333333 C29.4916667,23.3333333 28.9866667,23.3033333 28.48,23.245 L22.4116667,30.7433333 L29.9416667,38.2733333 C32.2433333,40.575 35.9733333,40.575 38.275,38.2733333 L38.275,38.2733333 C40.5766667,35.9716667 40.5766667,32.2416667 38.275,29.94 L31.5666667,23.2333333 Z"
                                                            opacity="0.596981957"></path>
                                                        <path class="color-background"
                                                            d="M33.785,11.285 L28.715,6.215 L34.0616667,0.868333333 C32.82,0.315 31.4483333,0 30,0 C24.4766667,0 20,4.47666667 20,10 C20,10.99 20.1483333,11.9433333 20.4166667,12.8466667 L2.435,27.3966667 C0.95,28.7083333 0.0633333333,30.595 0.00333333333,32.5733333 C-0.0583333333,34.5533333 0.71,36.4916667 2.11,37.89 C3.47,39.2516667 5.27833333,40 7.20166667,40 C9.26666667,40 11.2366667,39.1133333 12.6033333,37.565 L27.1533333,19.5833333 C28.0566667,19.8516667 29.01,20 30,20 C35.5233333,20 40,15.5233333 40,10 C40,8.55166667 39.685,7.18 39.1316667,5.93666667 L33.785,11.285 Z">
                                                        </path>
                                                    </g>
                                                </g>
                                            </g>
                                        </g>
                                    </svg>
                                    <span class="ms-1">Settings</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div> --}}
            </div>
        </div>
    </div>

    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12 col-xl-12">
                <div class="card h-100">
                    <div class="card-header pb-0 p-3">
                        <h6 class="mb-0">Memilih Produk</h6>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('marketing.TambahDistribusiBarang') }}" method="POST"
                            id="formDistribusiBarang">
                            @csrf
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Kode Pesanan</label>
                                        <input type="text" class="form-control" value="{{ $data_pesanan->kode }}"
                                            readonly>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Tanggal</label>
                                        <input type="text" class="form-control"
                                            value="{{ $data_pesanan->tanggal_pesan }}" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="exampleCheck1">Distributor</label>
                                <input type="hidden" value="{{ $data_pesanan->id }}" name="pesanan_id" hidden>
                                <input type="text" class="form-control"
                                    value="{{ $data_pesanan->relasi_distributor->nama }}" readonly>
                            </div>
                            <div id="pilih-barang">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="exampleCheck1">Barang</label>
                                            <select class="form-control form-control" name="produk_id" id="barang-id">
                                                <option value="" selected disabled>Pilih Barang</option>
                                                @foreach ($produk as $data_produk)
                                                    <option value="{{ $data_produk->id }}">
                                                        {{ $data_produk->nama_produk }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <div class="input-group has-validation">
                                                <label class="text-danger error-text produk_id_error"></label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Harga Barang</label>
                                            <input type="text" class="form-control" name="harga" id="harga-barang"
                                                placeholder="Harga Barang" readonly>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-6">
                                        <label for="exampleInputPassword1">Jumlah Pemesanan</label>
                                        <div class="form-group">
                                            <input class="form-control input-number" name="kuantitas" value=""
                                                type="number" id="kuantitas" min="1" max=""
                                                onwheel="this.blur()">
                                            <div class="input-group has-validation">
                                                <label class="text-danger error-text kuantitas_error"></label>
                                            </div>
                                            <label id="errorMsg"></label>
                                            <input type="hidden" id="subtotal1">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Sub Total</label>
                                            <input type="text" class="form-control" name="subtotal" id="subtotal"
                                                placeholder="Sub Total" readonly>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-8 col-xl-8">
                <div class="card h-100">
                    <div class="card-header pb-0 p-3">
                        <h6 class="mb-0">Produk Pesanan</h6>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped" id="table-data-produk-pesanan">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Nama Produk</th>
                                    <th>Kuantitas</th>
                                    <th>Sub Total</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-4 col-xl-4">
                <div class="card">
                    <div class="card-header pb-0 p-3">
                        <h6 class="mb-0">Status Pesanan</h6>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped" id="table-status-pesanan">
                            <thead>
                                <tr>
                                    <th>Status</th>
                                    <th>Tanggal</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                    <div class="d-flex justify-content-center" id="status-pesanan">
                        @php
                            $produk_pesanan = \App\Models\PesananProduk::where('pesanan_id', $data_pesanan->id)->count();
                        @endphp
                        <form action="{{ route('marketing.StatusPesanan') }}" id="formStatusPesanan" method="POST">
                            <input type="hidden" name="pesanan_id" value="{{ $data_pesanan->id }}" hidden>
                            @csrf
                            @if ($status_pesanan->status == null)
                                <input type="text" value="1" name="status" hidden>
                                <button type="submit" id="status_button"
                                    class="btn btn-outline-primary btn-sm">Konfirmasi Siapkan
                                    pesanan</button>
                            @elseif($status_pesanan->status == 1)
                                <input type="text" value="2" name="status" hidden>
                                <button type="submit" id="status_button"
                                    class="btn btn-outline-primary btn-sm">Konfirmasi Pesanan
                                    di proses</button>
                            @elseif($status_pesanan->status == 2)
                                @php
                                    $data_pesanan = \App\Models\Pesanan::where('id', $data_pesanan->id)->first();
                                    $data_pesanan->update([
                                        'tanggal_kirim' => \Carbon\Carbon::now(),
                                    ]);
                                @endphp
                                <input type="text" value="3" name="status" hidden>
                                <button type="submit" id="status_button"
                                    class="btn btn-outline-primary btn-sm">Konfirmasi Pesanan
                                    dikirim</button>
                            @elseif($status_pesanan->status == 3)
                                <input type="text" value="4" name="status" hidden>
                                <input type="hidden" name="data_pesanan_id" value="{{ $data_pesanan->id }}" hidden>
                                @php
                                    
                                @endphp
                                <button type="submit" class="btn btn-outline-primary btn-sm">Konfirmasi Pesanan
                                    diterima</button>
                            @elseif($status_pesanan->status == 4)
                                <button type="button" class="btn btn-outline-primary btn-sm">Pesanan telah
                                    diterima</button>
                            @endif
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        let data_pesanan = @json($data_pesanan);

        let daftar_data_produk_pesanan = [];
        const table_data_produk_pesanan = $('#table-data-produk-pesanan').DataTable({
            "destroy": true,
            "pageLength": 10,
            "lengthMenu": [
                [10, 25, 50, 100, -1],
                [10, 25, 50, 100, 'semua']
            ],
            "bLengthChange": true,
            "bFilter": false,
            "bInfo": true,
            "ordering": false,
            "processing": true,
            "bServerSide": true,
            "responsive": false,
            "sScrollX": '100%',
            "sScrollXInner": "100%",
            ajax: {
                url: "/marketing/data-produk-pesanan/" + data_pesanan.id,
                type: "POST",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                // data: function(d) {
                //     d.role_pengguna = data_role_pengguna;
                //     d.jurusan_pengguna = data_filter_jurusan;
                //     return d
                // }
            },
            fnDrawCallback: function() {
                self.QtdOcorrenciasAgendadosHoje = this.api().page.info().recordsTotal;
                if (self.QtdOcorrenciasAgendadosHoje == 0) {
                    return $('#status-pesanan').css("visibility", "hidden");
                } else if (self.QtdOcorrenciasAgendadosHoje > 0) {
                    return $('#status-pesanan').css("visibility", "visible");
                }

            },
            columnDefs: [{
                    targets: '_all',
                    visible: true
                },
                {
                    "targets": 0,
                    "class": "text-nowrap text-center",
                    "render": function(data, type, row, meta) {
                        let i = 1;
                        daftar_data_produk_pesanan[row.id] = row;
                        return meta.row + 1;
                    }
                },
                {
                    "targets": 1,
                    "class": "text-wrap text-center",
                    "render": function(data, type, row, meta) {
                        daftar_data_produk_pesanan[row.id] = row;
                        return row.relasi_produk.nama_produk;
                    }
                },
                {
                    "targets": 2,
                    "class": "text-nowrap text-center",
                    "render": function(data, type, row, meta) {
                        daftar_data_produk_pesanan[row.id] = row;
                        return row.kuantitas;
                    }
                },
                {
                    "targets": 3,
                    "class": "text-nowrap text-center",
                    "render": function(data, type, row, meta) {
                        daftar_data_produk_pesanan[row.id] = row;
                        return $.fn.dataTable.render.number('.', ',', 2, 'Rp ').display(row.subtotal);
                    }
                },
                {
                    "targets": 4,
                    "class": "text-nowrap text-center",
                    "render": function(data, type, row, meta) {
                        let tampilan;
                        tampilan = `
                            <div class="ms-auto">
                                <a class="btn btn-link text-danger text-gradient px-3 mb-0 hapus_data_produk_pesanan" id-data-produk-pesanan = "${row.id}" href="#!"><i class="far fa-trash-alt me-2"></i>Hapus</a>
                            </div>
                            `
                        return tampilan;
                    }
                },
            ],
            // rowGroup: {
            //     startRender: null,
            //     endRender: function(rows, group, data, type, meta) {
            //         var container = $('<tr/>');
            //         container.append('<td colspan= "3"> ' + rows + '</td>');
            //         var i;
            //         // for (i = 3; i < table_data_produk_pesanan.columns().header().length; i++) {
            //         var hourSum = rows
            //             .data()
            //             // .pluck(i)
            //             .reduce(function(a, b) {
            //                 return a + b * 1;
            //             }, 0);
            //         container.append('<td class="text-center">' + "Tes" + '</td>');
            //         // }

            //         return $(container)
            //     },
            //     dataSrc: 0
            // }
        });

        $('#barang-id').select2({
            theme: "bootstrap-5",
        });

        let status_pesanan = [];
        const table_status_pesanan = $('#table-status-pesanan').DataTable({
            "destroy": true,
            "pageLength": false,
            "lengthMenu": false,
            "bLengthChange": false,
            "bFilter": false,
            "bPaginate": false,
            "bInfo": false,
            "ordering": false,
            "processing": true,
            "bServerSide": false,
            "sScrollX": '100%',
            "sScrollXInner": "100%",
            ajax: {
                url: "/marketing/data-status-pesanan/" + data_pesanan.id,
                type: "POST",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                // data: function(d) {
                //     d.role_pengguna = data_role_pengguna;
                //     d.jurusan_pengguna = data_filter_jurusan;
                //     return d
                // }
            },
            fnDrawCallback: function() {
                self.QtdOcorrenciasAgendadosHoje = this.api().page.info().recordsTotal;
                if (self.QtdOcorrenciasAgendadosHoje == 0) {
                    $('#pilih-barang').css("visibility", "visible");
                } else if (self.QtdOcorrenciasAgendadosHoje > 0) {
                    $('#pilih-barang').css("display", "none");
                    $('.hapus_data_produk_pesanan').css("display", "none");
                }

            },
            columnDefs: [{
                    targets: '_all',
                    visible: true
                },
                {
                    "targets": 0,
                    "class": "text-wrap text-center",
                    "render": function(data, type, row, meta) {
                        daftar_data_produk_pesanan[row.id] = row;
                        let status;
                        if (row.status == 1) {
                            status = 'Pesanan Disiapkan';
                        } else if (row.status == 2) {
                            status = 'Pesanan Diproses';
                        } else if (row.status == 3) {
                            status = 'Pesanan Dikirim';
                        } else if (row.status == 4) {
                            status = 'Pesanan Diterima';
                        }
                        return status;
                    }
                },
                {
                    "targets": 1,
                    "class": "text-nowrap text-center",
                    "render": function(data, type, row, meta) {
                        daftar_data_produk_pesanan[row.id] = row;
                        return moment(row.created_at).format('dddd, D MMMM Y HH:mm:ss');
                    }
                },
            ]
        });

        var random = 1 + Math.floor(Math.random() * 999999999);
        $("#kode_transaksi").val("K-" + random);

        $("#errorMsg").hide();
        $("#kuantitas").attr('disabled', true)

        $(document).ready(function() {
            $(document).on('change', '#barang-id', function() {
                var id = $(this).val();
                var url = "/marketing/produk-detail/" + id;
                $.ajax({
                    type: 'get',
                    url: url,
                    dataType: 'json',
                    success: function(response) {
                        let harga = response.produk.harga;
                        let stok = response.produk.stok;
                        let format = harga.toLocaleString("id-ID", {
                            style: "currency",
                            currency: "IDR"
                        });
                        $('#harga-barang').val(format);
                        $('#kuantitas').attr('max', stok)

                        $("#kuantitas").keyup(function() {
                            var value = $(this).val();
                            value = value.replace(/^(0*)/, "");
                            $(this).val(value);
                        });

                        $("#kuantitas").attr('disabled', false)

                        $("#kuantitas").keyup(function() {
                            let total = $('#kuantitas').val();

                            if ($('#kuantitas').val() < 0) {
                                $('#errorMsg').text('Kurang dari stok').css("color",
                                    "red").show();
                            } else if ($('#kuantitas').val() > stok) {
                                $('#errorMsg').text('Melebihi stok').css("color",
                                    "red").show();
                            } else {
                                $('#errorMsg').hide();
                            }
                        });
                    }
                });
            });
        });

        var quantitiy = 0;
        var producttotal = document.getElementById('harga-barang')

        $("#kuantitas").keyup(function() {
            let jumlah = this.value;
            let harga = parseInt(producttotal.value.replace(/[^,\d]/g, ''));
            $("#subtotal1").attr("value", jumlah * harga);
            let subtotal = $("#subtotal1").val();
            $("#subtotal").val(format(subtotal)).css('weight', 'bold');
        });

        var format = function(num) {
            var str = num.toString().replace("Rp", ""),
                parts = false,
                output = [],
                i = 1,
                formatted = null;
            if (str.indexOf(".") > 0) {
                parts = str.split(".");
                str = parts[0];
            }
            str = str.split("").reverse();
            for (var j = 0, len = str.length; j < len; j++) {
                if (str[j] != ".") {
                    output.push(str[j]);
                    if (i % 3 == 0 && j < (len - 1)) {
                        output.push(".");
                    }
                    i++;
                }
            }
            formatted = output.reverse().join("");
            return ("Rp. " + formatted + ((parts) ? "." + parts[1].substr(0, 2) : ",00"));
        };

        $('#formStatusPesanan').on('submit', function(e) {
            e.preventDefault();
            $("#status_button").attr('disabled', true);
            $.ajax({
                url: $(this).attr('action'),
                method: $(this).attr('method'),
                data: new FormData(this),
                processData: false,
                dataType: 'json',
                contentType: false,
                beforeSend: function() {
                    $(document).find('label.error-text').text('');
                },
                success: function(data) {
                    if (data.status == 0) {
                        $.each(data.error, function(prefix, val) {
                            $('label.' + prefix + '_error').text(val[0]);
                            // $('span.'+prefix+'_error').text(val[0]);
                        });
                    } else if (data.status == 1) {
                        swal({
                                title: "Berhasil",
                                text: `${data.msg}`,
                                icon: "success",
                                buttons: true,
                                successMode: true,
                            }),
                            // table_daftar_asesi.ajax.reload(null, false)

                            location.reload();
                    }
                }
            });
        });


        $('#formDistribusiBarang').on('submit', function(e) {
            e.preventDefault();
            $.ajax({
                url: $(this).attr('action'),
                method: $(this).attr('method'),
                data: new FormData(this),
                processData: false,
                dataType: 'json',
                contentType: false,
                beforeSend: function() {
                    $(document).find('label.error-text').text('');
                },
                success: function(data) {
                    if (data.status == 0) {
                        $.each(data.error, function(prefix, val) {
                            $('label.' + prefix + '_error').text(val[0]);
                            // $('span.'+prefix+'_error').text(val[0]);
                        });
                    } else if (data.status == 1) {
                        swal({
                                title: "Berhasil",
                                text: `${data.msg}`,
                                icon: "success",
                                buttons: true,
                                successMode: true,
                            }),
                            // table_daftar_asesi.ajax.reload(null, false)

                            // location.reload();
                            $("#produk_id")[0];
                        $("#harga-barang").val('');
                        $("#kuantitas").val('');
                        $("#subtotal").val('');
                        $("#subtotal1").val('');
                        $("#errorMsg").hide();
                        $("#kuantitas").attr('disabled', true);
                        $('#barang-id').val('').trigger('change');
                        table_data_produk_pesanan.ajax.reload();
                    }
                }
            });
        });

        $(document).on('click', '.hapus_data_produk_pesanan', function(event) {
            const id = $(event.currentTarget).attr('id-data-produk-pesanan');

            swal({
                title: "Yakin ?",
                text: "Menghapus Data ?",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            }).then((willDelete) => {

                if (willDelete) {
                    $.ajax({
                        url: "/marketing/hapus-data-produk-pesanan/" + id,
                        dataType: 'json',
                        success: function(response) {
                            if (response.status == 0) {
                                alert("Gagal Hapus")
                            } else if (response.status == 1) {
                                swal({
                                        title: "Berhasil",
                                        text: `${response.msg}`,
                                        icon: "success",
                                        successMode: true,
                                    }),
                                    table_data_produk_pesanan.ajax.reload()
                            }
                        }
                    });
                } else {
                    //alert ('no');
                    return false;
                }
            });
        });
    </script>
@endsection
