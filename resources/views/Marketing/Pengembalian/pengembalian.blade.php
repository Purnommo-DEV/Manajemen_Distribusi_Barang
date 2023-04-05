@extends('Layout.master', ['title' => 'Pengembalian'])
@section('nav')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pengembalian/</a></li>
        </ol>
        <h6 class="font-weight-bolder mb-0">Pengembalian</h6>
    </nav>
@endsection
@section('konten')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col profil-section" style="margin-bottom: 0% !important">
                <div class="col pb-10">
                    <div class="card">
                        <div class="card-body">
                            <table class="table table-striped" id="table-data-pesanan">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Nama Distributor</th>
                                        <th>Tanggal Pesanan</th>
                                        <th>Tanggal Pengiriman</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        let daftar_data_pesanan = [];
        const table_data_pesanan = $('#table-data-pesanan').DataTable({
            "destroy": true,
            "pageLength": 10,
            "lengthMenu": [
                [10, 25, 50, 100, -1],
                [10, 25, 50, 100, 'semua']
            ],
            "bLengthChange": true,
            "bFilter": false,
            "bInfo": true,
            "processing": true,
            "ordering": false,
            "bServerSide": true,
            "sScrollX": '100%',
            "sScrollXInner": "100%",
            ajax: {
                url: "{{ route('marketing.DataPesananDiterima') }}",
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
                        daftar_data_pesanan[row.id] = row;
                        return meta.row + 1;
                    }
                },
                {
                    "targets": 1,
                    "class": "text-wrap text-center",
                    "render": function(data, type, row, meta) {
                        daftar_data_pesanan[row.id] = row;
                        return row.relasi_distributor.nama;
                    }
                },
                {
                    "targets": 2,
                    "class": "text-wrap text-center",
                    "render": function(data, type, row, meta) {
                        daftar_data_pesanan[row.id] = row;
                        return moment(row.tanggal_pesan).format('dddd, D MMMM Y HH:mm:ss');
                    }
                },
                {
                    "targets": 3,
                    "class": "text-wrap text-center",
                    "render": function(data, type, row, meta) {
                        daftar_data_pesanan[row.id] = row;
                        let tgl_kirim;
                        if (row.tanggal_kirim == null) {
                            tgl_kirim =
                                '<label style="color:red;">Belum Ditentukan</label>'
                        } else {
                            tgl_kirim = moment(row.tanggal_kirim).format('dddd, D MMMM Y HH:mm:ss');
                        }
                        return tgl_kirim;
                    }
                },
                {
                    "targets": 4,
                    "class": "text-wrap text-center",
                    "render": function(data, type, row, meta) {
                        daftar_data_pesanan[row.id] = row;
                        let status;
                        if (row.status == null) {
                            status = '<label style="color:red;">Belum Diproses</label>'
                        } else {
                            if (row.status == 1) {
                                status = '<label style="color:orange;">Sedang Disiapkan</label>';
                            } else if (row.status == 2) {
                                status = '<label style="color:blue;">Sedang Diproses</label>';
                            } else if (row.status == 3) {
                                status = '<label style="color:brown;">Dalam Pengiriman</label>';
                            } else if (row.status == 4) {
                                status = '<label style="color:green;">Diterima</label>';
                            }
                        }
                        return status;
                    }
                },
                {
                    "targets": 5,
                    "class": "text-nowrap text-center",
                    "render": function(data, type, row, meta) {
                        let tampilan;
                        tampilan = `
                            <div class="ms-auto">
                                <a class="btn btn-link text-info text-gradient px-3 mb-0" href="/marketing/produk-pengembalian/${row.id}"><i class="far fa-eye me-2"></i>Detail</a>
                            </div>
                            `
                        return tampilan;
                    }
                },
            ]
        });
    </script>
@endsection
