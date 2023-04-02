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
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col profil-section" style="margin-bottom: 0% !important">
                <div class="col pb-10">
                    <div class="card">
                        <div class="card-body">
                            <div class="buttons">
                                <a id="tombol-tambah-pengguna"
                                    class="btn btn-sm btn-primary rounded-pill text-white fw-semibold tambah_isi_elemen"
                                    href="#" data-bs-toggle="modal" data-bs-target="#modalTambahPesanan"><i
                                        class="fa fa-plus fa-xs"></i> Tambah Pesanan
                                </a>
                            </div>
                            <div class="modal fade text-left" id="modalTambahPesanan" role="dialog"
                                data-bs-backdrop="static" data-bs-keyboard="false" aria-labelledby="myModalLabel33"
                                aria-hidden="true">>
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title" id="myModalLabel33">Tambah Pesanan</h4>
                                            <button type="button" class="close batal" data-bs-dismiss="modal"
                                                aria-label="Close">
                                                <i data-feather="x"></i>
                                            </button>
                                        </div>
                                        <form action="{{ route('marketing.TambahDataPesanan') }}" id="formTambahPesanan"
                                            method="POST">
                                            @csrf
                                            <div class="modal-body">
                                                <label>Nama Distributor</label>
                                                <div class="form-group">
                                                    <select class="form-control pilih_distributor" name="distributor_id">
                                                        <option value="" selected disabled>Pilih Distributor</option>
                                                        @foreach ($distributor as $data_distributor)
                                                            <option value="{{ $data_distributor->id }}">
                                                                {{ $data_distributor->nama }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    <div class="input-group has-validation">
                                                        <label class="text-danger error-text distributor_id_error"></label>
                                                    </div>
                                                </div>
                                                <label>Tanggal Pesanan</label>
                                                <div class="form-group">
                                                    <input type="datetime-local" id="tanggal_pesan" name="tanggal_pesan"
                                                        placeholder="Tanggal Pesanan" class="form-control rounded-5">
                                                    <div class="input-group has-validation">
                                                        <label class="text-danger error-text tanggal_pesan_error"></label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-light-secondary batal rounded-pill"
                                                    data-bs-dismiss="modal">
                                                    Batal
                                                </button>
                                                <button type="submit" class="btn btn-primary ml-1 rounded-pill">
                                                    Simpan
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
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

    <div class="modal fade text-left" id="modalEditPesanan" data-bs-backdrop="static" data-bs-keyboard="false"
        aria-labelledby="myModalLabel33" aria-hidden="true">>
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel33">Ubah Data Pesanan</h4>
                    <button type="button" class="close batal" data-bs-dismiss="modal" aria-label="Close">
                        <i data-feather="x"></i>
                    </button>
                </div>
                <form id="formEditPesanan" action="{{ route('marketing.UbahDataPesanan') }}" method="POST">
                    <input type="hidden" name="id" hidden>
                    @csrf
                    <div class="modal-body">
                        <label>Nama Distributor</label>
                        <div class="form-group">
                            <select class="form-control pilih_distributor" name="distributor_id" id="distributor">
                            </select>
                            <div class="input-group has-validation">
                                <label class="text-danger error-text nama_produk_error"></label>
                            </div>
                        </div>
                        <label>Tanggal Pesanan</label>
                        <div class="form-group">
                            <input type="date" id="tanggal_pesan" name="tanggal_pesan" placeholder="Tanggal Pesanan"
                                class="form-control rounded-5">
                            <div class="input-group has-validation">
                                <label class="text-danger error-text tanggal_pesan_error"></label>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light-secondary batal rounded-pill"
                            data-bs-dismiss="modal">
                            Batal
                        </button>
                        <button type="submit" class="btn btn-primary ml-1 rounded-pill">
                            Simpan
                        </button>
                    </div>
                </form>
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
                url: "{{ route('marketing.DataPesanan') }}",
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
                                status = '<label style="color:green;">Dalam Pengiriman</label>';
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
                                <a class="btn btn-link text-dark px-3 mb-0 ubah_data_pesanan" href="#!" id-data-pesanan = "${row.id}"><i class="fas fa-pencil-alt text-dark me-2" aria-hidden="true"></i>Ubah</a>
                                <a class="btn btn-link text-danger text-gradient px-3 mb-0 hapus_data_pesanan" id-data-pesanan = "${row.id}" href="#!"><i class="far fa-trash-alt me-2"></i>Hapus</a>
                                <a class="btn btn-link text-info text-gradient px-3 mb-0" href="/marketing/produk-pesanan/${row.id}"><i class="far fa-eye-alt me-2"></i>Detail</a>
                            </div>
                            `
                        return tampilan;
                    }
                },
            ]
        });

        $('#formTambahPesanan').on('submit', function(e) {
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
                            table_data_pesanan.ajax.reload(null, false)

                        $("#formTambahPesanan")[0].reset();
                        $("#modalTambahPesanan").modal('hide')
                    }
                }
            });
        });



        // $(document).ready(function() {
        //     $('.pilih_distributor').select2({
        //         placeholder: "Pilih Distributor",
        //         theme: "bootstrap-5",
        //     });
        // });

        $('.modal').on('shown.bs.modal', function(e) {
            $(this).find('.pilih_distributor').select2({
                placeholder: "Pilih Distributor",
                theme: "bootstrap-5",
                dropdownParent: $(this).find('.modal-content')
            });
        })

        {{--  $('.pilih_distributor').select2({
            placeholder: 'Select movie',
            ajax: {
                url: "{{ route('marketing.CariDistributor') }}",
                dataType: 'json',
                delay: 250,
                processResults: function(data) {
                    return {
                        results: $.map(data, function(item) {
                            return {
                                text: item.nama,
                                id: item.id
                            }
                        })
                    };
                },
                cache: true
            }
        }); --}}

        $('.batal').on('click', function() {
            $(document).find('label.error-text').text('');
            $("#distributor").empty().append('');
        })

        let distributor = @json($distributor);

        $(document).on('click', '.ubah_data_pesanan', function(event) {
            const id = $(event.currentTarget).attr('id-data-pesanan');
            const data_pesanan = daftar_data_pesanan[id]

            $("#modalEditPesanan").modal('show');
            $("#formEditPesanan [name='id']").val(id)
            $("#formEditPesanan [name='tanggal_pesan']").val(data_pesanan.tanggal_pesan);

            $.each(distributor, function(key, value) {
                $('#distributor')
                    .append(
                        `<option value="${value.id}" ${value.id == data_pesanan.distributor_id ? 'selected' : ''}>${value.nama}</option>`
                    )
            });

            $('#formEditPesanan').on('submit', function(e) {
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
                            $("#modalEditPesanan").modal('hide');
                            swal({
                                    title: "Berhasil",
                                    text: `${data.msg}`,
                                    icon: "success",
                                    successMode: true,
                                }),
                                table_data_pesanan.ajax.reload();
                        }
                    }
                });
            });
        });

        $(document).on('click', '.hapus_data_pesanan', function(event) {
            const id = $(event.currentTarget).attr('id-data-pesanan');

            swal({
                title: "Yakin ?",
                text: "Menghapus Data ?",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            }).then((willDelete) => {

                if (willDelete) {
                    $.ajax({
                        url: "/marketing/hapus-data-pesanan/" + id,
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
                                    table_data_pesanan.ajax.reload()
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
