@extends('Layout.master', ['title' => 'Detail Laporan'])
@section('nav')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="{{ route('admin.Laporan') }}">Laporan</a>
            </li>
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Detail Laporan</a></li>
        </ol>
        <h6 class="font-weight-bolder mb-0">Detail Laporan</h6>
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
                        <form>
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
                url: "/admin/data-produk-pesanan/" + data_pesanan.id,
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
            ]
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
                url: "/admin/data-status-pesanan/" + data_pesanan.id,
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
    </script>
@endsection
