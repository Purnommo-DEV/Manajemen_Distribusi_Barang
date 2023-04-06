@extends('Layout.master', ['title' => 'Data Produk'])
@section('nav')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Data Produk/</a></li>
        </ol>
        <h6 class="font-weight-bolder mb-0">Data Produk</h6>
    </nav>
@endsection
@section('konten')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col profil-section" style="margin-bottom: 0% !important">
                <div class="col pb-10">
                    <div class="card">
                        <div class="card-body">
                            {{-- <div class="buttons">
                                <a id="tombol-tambah-pengguna"
                                    class="btn btn-sm btn-primary rounded-pill text-white fw-semibold tambah_isi_elemen"
                                    href="#" data-bs-toggle="modal" data-bs-target="#modalTambahProduk"><i
                                        class="fa fa-plus fa-xs"></i> Tambah Produk
                                </a>
                            </div> --}}
                            {{-- <div class="modal fade text-left" id="modalTambahProduk" data-bs-backdrop="static"
                                data-bs-keyboard="false" aria-labelledby="myModalLabel33" aria-hidden="true">>
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title" id="myModalLabel33">Tambah Data Produk</h4>
                                            <button type="button" class="close batal" data-bs-dismiss="modal"
                                                aria-label="Close">
                                                <i data-feather="x"></i>
                                            </button>
                                        </div>
                                        <form action="{{ route('produksi.TambahDataProduk') }}" id="formTambahProduk"
                                            method="POST">
                                            @csrf
                                            <div class="modal-body">
                                                <label>Nama Produk</label>
                                                <div class="form-group">
                                                    <input type="text" name="nama_produk" placeholder="Nama Produk"
                                                        class="form-control rounded-5">
                                                    <div class="input-group has-validation">
                                                        <label class="text-danger error-text nama_produk_error"></label>
                                                    </div>
                                                </div>
                                                <label>Harga</label>
                                                <div class="form-group">
                                                    <input type="text" id="harga" name="harga"
                                                        placeholder="Harga Produk" class="form-control rounded-5">
                                                    <div class="input-group has-validation">
                                                        <label class="text-danger error-text harga_error"></label>
                                                    </div>
                                                </div>
                                                <label>Stok</label>
                                                <div class="form-group">
                                                    <input type="text" name="stok" placeholder="Stok Produk"
                                                        class="form-control rounded-5">
                                                    <div class="input-group has-validation">
                                                        <label class="text-danger error-text stok_error"></label>
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
                            </div> --}}
                            <table class="table table-striped" id="table-data-produk">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Kode Produk</th>
                                        <th>Nama Produk</th>
                                        <th>Harga</th>
                                        <th>Stok</th>
                                        {{-- <th>Aksi</th> --}}
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
    {{-- <div class="modal fade text-left" id="modalEditProduk" data-bs-backdrop="static" data-bs-keyboard="false"
        aria-labelledby="myModalLabel33" aria-hidden="true">>
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel33">Ubah Data Produk</h4>
                    <button type="button" class="close batal" data-bs-dismiss="modal" aria-label="Close">
                        <i data-feather="x"></i>
                    </button>
                </div>
                <form id="formEditProduk" action="{{ route('produksi.UbahDataProduk') }}" method="POST">
                    <input type="hidden" name="id" hidden>
                    @csrf
                    <div class="modal-body">
                        <label>Nama Produk</label>
                        <div class="form-group">
                            <input type="text" name="nama_produk" placeholder="Nama Produk"
                                class="form-control rounded-5">
                            <div class="input-group has-validation">
                                <label class="text-danger error-text nama_produk_error"></label>
                            </div>
                        </div>
                        <label>Harga</label>
                        <div class="form-group">
                            <input type="text" id="hargaEdit" name="harga" placeholder="Harga Produk"
                                class="form-control rounded-5">
                            <div class="input-group has-validation">
                                <label class="text-danger error-text harga_error"></label>
                            </div>
                        </div>
                        <label>Stok</label>
                        <div class="form-group">
                            <input type="text" name="stok" placeholder="Stok Produk"
                                class="form-control rounded-5">
                            <div class="input-group has-validation">
                                <label class="text-danger error-text stok_error"></label>
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
    </div> --}}
@endsection
@section('script')
    <script>
        let daftar_data_produk = [];
        const table_data_produk = $('#table-data-produk').DataTable({
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
                url: "{{ route('marketing.DataProduk') }}",
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
                        daftar_data_produk[row.id] = row;
                        return meta.row + 1;
                    }
                },
                {
                    "targets": 1,
                    "class": "text-wrap text-center",
                    "render": function(data, type, row, meta) {
                        daftar_data_produk[row.id] = row;
                        return row.kode;
                    }
                },
                {
                    "targets": 2,
                    "class": "text-wrap text-center",
                    "render": function(data, type, row, meta) {
                        daftar_data_produk[row.id] = row;
                        return row.nama_produk;
                    }
                },
                {
                    "targets": 3,
                    "class": "text-wrap text-center",
                    "render": function(data, type, row, meta) {
                        daftar_data_produk[row.id] = row;
                        return $.fn.dataTable.render.number('.', ',', 2, 'Rp ').display(row.harga);
                    }
                },
                {
                    "targets": 4,
                    "class": "text-wrap text-center",
                    "render": function(data, type, row, meta) {
                        daftar_data_produk[row.id] = row;
                        return row.stok;
                    }
                },
                // {
                //     "targets": 4,
                //     "class": "text-nowrap text-center",
                //     "render": function(data, type, row, meta) {
                //         let tampilan;
                //         tampilan = `
            //                 <div class="ms-auto">
            //                     <a class="btn btn-link text-dark px-3 mb-0" href="#!" onclick="clickEditProduk(${row.id})"><i class="fas fa-pencil-alt text-dark me-2" aria-hidden="true"></i>Ubah</a>
            //                     <a class="btn btn-link text-danger text-gradient px-3 mb-0 hapus_data_produk" id-data-produk = "${row.id}"href="#!"><i class="far fa-trash-alt me-2"></i>Hapus</a>
            //                 </div>
            //                 `
                //         return tampilan;
                //     }
                // },
            ]
        });


        // var hargaId = document.getElementById('harga');
        // hargaId.addEventListener('keyup', function(e) {
        //     hargaId.value = formatRupiah(this.value, 'Rp. ');
        // });

        function formatRupiah(angka, prefix) {
            var number_string = angka.replace(/[^,\d]/g, '').toString(),
                split = number_string.split(','),
                sisa = split[0].length % 3,
                rupiah = split[0].substr(0, sisa),
                ribuan = split[0].substr(sisa).match(/\d{3}/gi);

            if (ribuan) {
                separator = sisa ? '.' : '';
                rupiah += separator + ribuan.join('.');
            }
            rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
            return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
        }

        // $('#formTambahProduk').on('submit', function(e) {
        //     e.preventDefault();
        //     $.ajax({
        //         url: $(this).attr('action'),
        //         method: $(this).attr('method'),
        //         data: new FormData(this),
        //         processData: false,
        //         dataType: 'json',
        //         contentType: false,
        //         beforeSend: function() {
        //             $(document).find('label.error-text').text('');
        //         },
        //         success: function(data) {
        //             if (data.status == 0) {
        //                 $.each(data.error, function(prefix, val) {
        //                     $('label.' + prefix + '_error').text(val[0]);
        //                     // $('span.'+prefix+'_error').text(val[0]);
        //                 });
        //             } else if (data.status == 1) {
        //                 swal({
        //                         title: "Berhasil",
        //                         text: `${data.msg}`,
        //                         icon: "success",
        //                         buttons: true,
        //                         successMode: true,
        //                     }),
        //                     table_data_produk.ajax.reload(null, false)

        //                 $("#formTambahProduk")[0].reset();
        //                 $("#modalTambahProduk").modal('hide')
        //             }
        //         }
        //     });
        // });

        // var hargaEditId = document.getElementById('hargaEdit');
        // hargaEditId.addEventListener('keyup', function(e) {
        //     hargaEditId.value = formatRupiah(this.value, 'Rp. ');
        // });


        // function clickEditProduk(id) {
        //     const data_pengguna = daftar_data_produk[id]

        //     let num = data_pengguna.harga;
        //     let text = num.toLocaleString("id-ID", {
        //         style: "currency",
        //         currency: "IDR"
        //     });

        //     $("#modalEditProduk").modal('show');
        //     $("#formEditProduk [name='id']").val(id)
        //     $("#formEditProduk [name='nama_produk']").val(data_pengguna.nama_produk);
        //     $("#formEditProduk [name='harga']").val(text);
        //     $("#formEditProduk [name='stok']").val(data_pengguna.stok);

        //     $('#formEditProduk').on('submit', function(e) {
        //         e.preventDefault();
        //         $.ajax({
        //             url: $(this).attr('action'),
        //             method: $(this).attr('method'),
        //             data: new FormData(this),
        //             processData: false,
        //             dataType: 'json',
        //             contentType: false,
        //             beforeSend: function() {
        //                 $(document).find('label.error-text').text('');
        //             },
        //             success: function(data) {
        //                 if (data.status == 0) {
        //                     $.each(data.error, function(prefix, val) {
        //                         $('label.' + prefix + '_error').text(val[0]);
        //                         // $('span.'+prefix+'_error').text(val[0]);
        //                     });
        //                 } else if (data.status == 1) {
        //                     $("#modalEditProduk").modal('hide');
        //                     swal({
        //                             title: "Berhasil",
        //                             text: `${data.msg}`,
        //                             icon: "success",
        //                             successMode: true,
        //                         }),
        //                         table_data_produk.ajax.reload(null, false);
        //                 }
        //             }
        //         });
        //     });
        // }

        // $(document).on('click', '.hapus_data_produk', function(event) {
        //     const id = $(event.currentTarget).attr('id-data-produk');

        //     swal({
        //         title: "Yakin ?",
        //         text: "Menghapus Data ?",
        //         icon: "warning",
        //         buttons: true,
        //         dangerMode: true,
        //     }).then((willDelete) => {

        //         if (willDelete) {
        //             $.ajax({
        //                 url: "/produksi/hapus-data-produk/" + id,
        //                 dataType: 'json',
        //                 success: function(response) {
        //                     if (response.status == 0) {
        //                         alert("Gagal Hapus")
        //                     } else if (response.status == 1) {
        //                         swal({
        //                                 title: "Berhasil",
        //                                 text: `${response.msg}`,
        //                                 icon: "success",
        //                                 successMode: true,
        //                             }),
        //                             table_data_produk.ajax.reload()
        //                     }
        //                 }
        //             });
        //         } else {
        //             //alert ('no');
        //             return false;
        //         }
        //     });
        // });
    </script>
@endsection
