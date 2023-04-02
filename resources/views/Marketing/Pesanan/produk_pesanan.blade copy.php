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
            <div class="col-6 profil-section" style="margin-bottom: 0% !important">
                <div class="col pb-10">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('marketing.TambahDistribusiBarang') }}" method="POST"
                                id="formDistribusiBarang">
                                @csrf
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Nomor Transaksi</label>
                                    <input type="email" class="form-control" id="kode_transaksi" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Tanggal</label>
                                    <input class="form-control" type="date" name="tanggal_pesan">
                                </div>
                                <div class="form-group">
                                    <label for="exampleCheck1">Distributor</label>
                                    <select class="form-control form-control-lg" name="distributor_id">
                                        <option value="">Pilih Distributor</option>
                                        @foreach ($distributor as $data_distributor)
                                            <option value="{{ $data_distributor->id }}">{{ $data_distributor->nama }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleCheck1">Barang</label>
                                    <select class="form-control form-control-lg" name="barang_id" id="barang-id">
                                        <option value="">Pilih Barang</option>
                                        @foreach ($produk as $data_produk)
                                            <option value="{{ $data_produk->id }}">{{ $data_produk->nama_produk }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Harga Barang</label>
                                    <input type="text" class="form-control" name="harga" id="harga-barang"
                                        placeholder="Harga Barang" readonly>
                                </div>
                                <div class="col-md-12">
                                    <label for="exampleInputPassword1">Jumlah Pemesanan</label>
                                    <div class="row">
                                        <div class="form-group">
                                            <input class="form-control input-number" name="kuantitas" value=""
                                                type="number" id="kuantitas" min="1" max=""
                                                onwheel="this.blur()">
                                            <label id="errorMsg"></label>
                                        </div>

                                        {{-- <input type="text" id="txtAcrescimo" />
                                        <button type="button" class="altera acrescimo">+</button>
                                        <button type="button" class="altera decrescimo">-</button> --}}

                                        {{-- <div class="col-md-2">
                                            <button type="button" class="minus btn btn-danger btn-number" data-type="minus"
                                                data-field="">
                                                <span class="glyphicon glyphicon-minus"></span>
                                            </button>
                                        </div>
                                        <div class="col-md-2">
                                            <button type="button" class="plus btn btn-success btn-number" data-type="plus"
                                                data-field="">
                                                <span class="glyphicon glyphicon-plus"></span>
                                            </button>
                                        </div> --}}

                                        {{-- 
                                        <div class="col-md-2">
                                            <span class="btn btn-gradient-primary minus">-</span>
                                        </div>
                                        <div class="col-md-2">
                                            <span class="btn btn-gradient-primary plus">+</span>
                                        </div> --}}

                                        {{-- <div class="col-md-2">
                                            <span class="btn btn-gradient-primary" onclick="decrement()">-</span>
                                        </div>
                                        <div class="col-md-2">
                                            <span class="btn btn-gradient-primary" onclick="increment()">+</span>
                                        </div> --}}
                                        <input type="hidden" id="subtotal1">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Sub Total</label>
                                    <input type="text" class="form-control" name="subtotal" id="subtotal"
                                        placeholder="Sub Total" readonly>
                                </div>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            {{-- <div class="col-6 profil-section" style="margin-bottom: 0% !important">
                <div class="col pb-10">
                    <div class="card">
                        <div class="card-body">
                            <form>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Email address</label>
                                    <input type="email" class="form-control" id="exampleInputEmail1"
                                        aria-describedby="emailHelp" placeholder="Enter email">
                                    <small id="emailHelp" class="form-text text-muted">We'll never share your email with
                                        anyone else.</small>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Password</label>
                                    <input type="password" class="form-control" id="exampleInputPassword1"
                                        placeholder="Password">
                                </div>
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                    <label class="form-check-label" for="exampleCheck1">Check me out</label>
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div> --}}
        </div>
    </div>

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
        var random = 1 + Math.floor(Math.random() * 999999999);
        $("#kode_transaksi").val("K-" + random);

        $("#errorMsg").hide();

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

                        $("#kuantitas").keyup(function() {
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
            $("#subtotal").val(format(subtotal));

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
            return ("Rp " + formatted + ((parts) ? "." + parts[1].substr(0, 2) : ",00"));
        };

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
                            $("#modalTambahAsesiKeJadwalUkom").modal('hide')
                        $("#tambahAsesiKeUjiKompetensi").load(location.href +
                            " #tambahAsesiKeUjiKompetensi>*", "");
                        $("#modalTambahAsesiKeJadwalUkom").load(location.href +
                            " #modalTambahAsesiKeJadwalUkom>*", "");
                    }
                }
            });
        });
    </script>
@endsection
