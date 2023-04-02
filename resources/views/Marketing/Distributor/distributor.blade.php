@extends('Layout.master', ['title' => 'Data Distributor'])
@section('nav')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Data Distributor/</a></li>
        </ol>
        <h6 class="font-weight-bolder mb-0">Data Distributor</h6>
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
                                    href="#" data-bs-toggle="modal" data-bs-target="#modalTambahDistributor"><i
                                        class="fa fa-plus fa-xs"></i> Tambah Distributor
                                </a>
                            </div>
                            <div class="modal fade text-left" id="modalTambahDistributor" data-bs-backdrop="static"
                                data-bs-keyboard="false" aria-labelledby="myModalLabel33" aria-hidden="true">>
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title" id="myModalLabel33">Tambah Data Distributor</h4>
                                            <button type="button" class="close batal" data-bs-dismiss="modal"
                                                aria-label="Close">
                                                <i data-feather="x"></i>
                                            </button>
                                        </div>
                                        <form action="{{ route('marketing.TambahDataDistributor') }}"
                                            id="formTambahDistributor" method="POST">
                                            @csrf
                                            <div class="modal-body">
                                                <label>Nama</label>
                                                <div class="form-group">
                                                    <input type="text" name="nama" placeholder="Nama"
                                                        class="form-control rounded-5">
                                                    <div class="input-group has-validation">
                                                        <label class="text-danger error-text nama_error"></label>
                                                    </div>
                                                </div>
                                                <label>Alamat</label>
                                                <div class="form-group">
                                                    <input type="text" id="alamat" name="alamat" placeholder="Alamat"
                                                        class="form-control rounded-5">
                                                    <div class="input-group has-validation">
                                                        <label class="text-danger error-text alamat_error"></label>
                                                    </div>
                                                </div>
                                                <label>No HP/WA</label>
                                                <div class="form-group">
                                                    <input type="text" name="nomor_hp" placeholder="Telp/WA"
                                                        class="form-control rounded-5">
                                                    <div class="input-group has-validation">
                                                        <label class="text-danger error-text nomor_hp_error"></label>
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
                            <table class="table table-striped" id="table-data-distributor">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Nama</th>
                                        <th>Alamat</th>
                                        <th>Nomor HP</th>
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

    {{-- MODAL EDIT DATA PENGGUNA --}}
    {{-- MODAL EDIT --}}
    <div class="modal fade text-left" id="modalEditDistributor" data-bs-backdrop="static" data-bs-keyboard="false"
        aria-labelledby="myModalLabel33" aria-hidden="true">>
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel33">Ubah Data Distributor</h4>
                    <button type="button" class="close batal" data-bs-dismiss="modal" aria-label="Close">
                        <i data-feather="x"></i>
                    </button>
                </div>
                <form id="formEditDistributor" action="{{ route('marketing.UbahDataDistributor') }}" method="POST">
                    <input type="hidden" name="id" hidden>
                    @csrf
                    <div class="modal-body">
                        <label>Nama</label>
                        <div class="form-group">
                            <input type="text" name="nama" placeholder="Nama" class="form-control rounded-5">
                            <div class="input-group has-validation">
                                <label class="text-danger error-text nama_error"></label>
                            </div>
                        </div>
                        <label>Alamat</label>
                        <div class="form-group">
                            <input type="text" name="alamat" placeholder="Alamat" class="form-control rounded-5">
                            <div class="input-group has-validation">
                                <label class="text-danger error-text harga_error"></label>
                            </div>
                        </div>
                        <label>No HP/WA</label>
                        <div class="form-group">
                            <input type="text" name="nomor_hp" placeholder="Nomor HP" class="form-control rounded-5">
                            <div class="input-group has-validation">
                                <label class="text-danger error-text nomor_hp_error"></label>
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
        let daftar_data_distributor = [];
        const table_data_distributor = $('#table-data-distributor').DataTable({
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
            "bServerSide": true,
            "searching": true,
            "responsive": false,
            "sScrollX": '100%',
            "sScrollXInner": "100%",
            ajax: {
                url: "{{ route('marketing.DataDistributor') }}",
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
                        daftar_data_distributor[row.id] = row;
                        return meta.row + 1;
                    }
                },
                {
                    "targets": 1,
                    "class": "text-wrap text-center",
                    "render": function(data, type, row, meta) {
                        daftar_data_distributor[row.id] = row;
                        return row.nama;
                    }
                },
                {
                    "targets": 2,
                    "class": "text-wrap text-center",
                    "render": function(data, type, row, meta) {
                        daftar_data_distributor[row.id] = row;
                        return row.alamat;
                    }
                },
                {
                    "targets": 3,
                    "class": "text-wrap text-center",
                    "render": function(data, type, row, meta) {
                        daftar_data_distributor[row.id] = row;
                        return row.nomor_hp;
                    }
                },
                {
                    "targets": 4,
                    "class": "text-nowrap text-center",
                    "render": function(data, type, row, meta) {
                        let tampilan;
                        tampilan = `
                                <div class="ms-auto">
                                    <a class="btn btn-link text-dark px-3 mb-0 edit_data_distributor" id-data-distributor = "${row.id}" href="#!"><i class="fas fa-pencil-alt text-dark me-2" aria-hidden="true"></i>Ubah</a>
                                    <a class="btn btn-link text-danger text-gradient px-3 mb-0 hapus_data_distributor" id-data-distributor = "${row.id}" href="#!"><i class="far fa-trash-alt me-2"></i>Hapus</a>
                                </div>
                                `
                        return tampilan;
                    }
                },
            ]
        });

        $('#formTambahDistributor').on('submit', function(e) {
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
                            table_data_distributor.ajax.reload(null, false)

                        $("#formTambahDistributor")[0].reset();
                        $("#modalTambahDistributor").modal('hide')
                    }
                }
            });
        });

        $(document).on('click', '.edit_data_distributor', function(event) {
            const id = $(event.currentTarget).attr('id-data-distributor');

            const data_distributor = daftar_data_distributor[id]

            $("#modalEditDistributor").modal('show');
            $("#formEditDistributor [name='id']").val(id)
            $("#formEditDistributor [name='nama']").val(data_distributor.nama);
            $("#formEditDistributor [name='alamat']").val(data_distributor.alamat);
            $("#formEditDistributor [name='nomor_hp']").val(data_distributor.nomor_hp);

            $('#formEditDistributor').on('submit', function(e) {
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
                            $("#modalEditDistributor").modal('hide');
                            swal({
                                    title: "Berhasil",
                                    text: `${data.msg}`,
                                    icon: "success",
                                    successMode: true,
                                }),
                                table_data_distributor.ajax.reload(null, false);
                        }
                    }
                });
            });
        });

        $(document).on('click', '.hapus_data_distributor', function(event) {
            const id = $(event.currentTarget).attr('id-data-distributor');

            swal({
                title: "Yakin ?",
                text: "Menghapus Data ?",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            }).then((willDelete) => {

                if (willDelete) {
                    $.ajax({
                        url: "/marketing/hapus-data-distributor/" + id,
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
                                    table_data_distributor.ajax.reload()
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
