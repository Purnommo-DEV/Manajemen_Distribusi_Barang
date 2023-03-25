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
                            {{-- <table class="table table-striped" id="table-data-produk">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Nama Produk</th>
                                        <th>Harga</th>
                                        <th>Stok</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                            </table> --}}
                        </div>
                    </div>
                </div>
            </div>
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
