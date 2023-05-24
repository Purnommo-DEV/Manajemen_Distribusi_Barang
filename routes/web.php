<?php

use App\Http\Controllers\Admin\Admin_AreaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Admin\Admin_ProdukController;
use App\Http\Controllers\Admin\Admin_LaporanController;
use App\Http\Controllers\Admin\Admin_CustomerController;
use App\Http\Controllers\Admin\Admin_PenggunaController;
use App\Http\Controllers\Admin\Admin_DashboardController;
use App\Http\Controllers\Admin\Admin_KendaraanController;
use App\Http\Controllers\Admin\Admin_Perencanaan;
use App\Http\Controllers\Admin\WilayahIndonesiaController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::middleware('guest')->group(function () {
Route::controller(AuthController::class)->group(function () {
    Route::get('/', 'login')->name('Login');
    Route::post('login', 'authenticate')->name('Auth');
});
// });

Route::middleware(['auth'])->group(function () {

    Route::get('logout', [AuthController::class, 'logout'])->name('Logout');

    // Route::prefix('superadmin')->name('superadmin.')->middleware(['isSuperAdmin'])->group(function () {
    //     Route::controller(SuperAdmin_DashboardController::class)->group(function () {
    //         Route::get('dashboard', 'dashboard')->name('Dashboard');
    //     });
    //     Route::controller(SuperAdmin_DataUserController::class)->group(function () {
    //         Route::get('halaman-pengguna', 'halaman_pengguna')->name('HalamanPengguna');
    //         Route::any('data-pengguna', 'data_pengguna')->name('DataPengguna');
    //         Route::post('tambah-data-pengguna', 'tambah_data_pengguna')->name('TambahDataPengguna');
    //         Route::post('ubah-data-pengguna', 'ubah_data_pengguna')->name('UbahDataPengguna');
    //         Route::get('hapus-data-pengguna/{id}', 'hapus_data_pengguna')->name('HapusDataPengguna');
    //     });
    // });

    Route::prefix('admin')->name('admin.')->middleware(['isAdmin'])->group(function () {
        Route::controller(Admin_DashboardController::class)->group(function () {
            Route::get('dashboard', 'dashboard')->name('Dashboard');
        });

        // PRODUK
        Route::controller(Admin_ProdukController::class)->group(function () {
            Route::get('halaman-produk', 'halaman_produk')->name('Produk');
            Route::any('data-produk', 'data_produk')->name('DataProduk');
            Route::post('tambah-data-produk', 'tambah_data_produk')->name('TambahDataProduk');
            Route::post('ubah-data-produk', 'ubah_data_produk')->name('UbahDataProduk');
            Route::get('hapus-data-produk/{id}', 'hapus_data_produk')->name('HapusDataProduk');
        });

        // PENGGUNA
        Route::controller(Admin_PenggunaController::class)->group(function () {
            Route::get('halaman-pengguna', 'halaman_pengguna')->name('HalamanPengguna');
            Route::any('data-pengguna', 'data_pengguna')->name('DataPengguna');
            Route::post('tambah-data-pengguna', 'tambah_data_pengguna')->name('TambahDataPengguna');
            Route::post('ubah-data-pengguna', 'ubah_data_pengguna')->name('UbahDataPengguna');
            Route::get('hapus-data-pengguna/{id}', 'hapus_data_pengguna')->name('HapusDataPengguna');
        });

        // CUSTOMER
        Route::controller(Admin_CustomerController::class)->group(function () {
            Route::get('halaman-customer', 'halaman_customer')->name('HalamanCustomer');
            Route::any('data-customer', 'data_customer')->name('DataCustomer');
            Route::post('tambah-data-customer', 'tambah_data_customer')->name('TambahDataCustomer');
            Route::post('ubah-data-customer', 'ubah_data_customer')->name('UbahDataCustomer');
            Route::get('hapus-data-customer/{id}', 'hapus_data_customer')->name('HapusDataCustomer');
            Route::get('print-barcode-customer/{kode}', 'print_barcode_customer')->name('PrintBarcodeCustomer');
        });

        // AREA
        Route::controller(Admin_AreaController::class)->group(function () {
            Route::get('halaman-area', 'halaman_area')->name('HalamanArea');
            Route::any('data-area', 'data_area')->name('DataArea');
            Route::post('tambah-data-area', 'tambah_data_area')->name('TambahDataArea');
            // Route::post('ubah-data-area', 'ubah_data_area')->name('UbahDataArea');
            Route::get('ubah-data-area/{kode}', 'ubah_data_area')->name('UbahDataArea');
            Route::post('proses-ubah-data-area/{kode}', 'proses_ubah_data_area')->name('ProsesUbahDataArea');
            Route::get('hapus-data-area/{id}', 'hapus_data_area')->name('HapusDataArea');
        });

        // KENDARAAN
        Route::controller(Admin_KendaraanController::class)->group(function () {
            Route::get('halaman-kendaraan', 'halaman_kendaraan')->name('HalamanKendaraan');
            Route::any('data-kendaraan', 'data_kendaraan')->name('DataKendaraan');
            Route::post('tambah-data-kendaraan', 'tambah_data_kendaraan')->name('TambahDataKendaraan');
            Route::post('ubah-data-kendaraan', 'ubah_data_kendaraan')->name('UbahDataKendaraan');
            Route::get('hapus-data-kendaraan/{id}', 'hapus_data_kendaraan')->name('HapusDataKendaraan');
        });

        Route::controller(WilayahIndonesiaController::class)->group(function () {
            Route::get('provinsi', 'provinces')->name('Provinsi');
            Route::get('kota', 'kota')->name('Kota');
            Route::get('kecamatan', 'kecamatan')->name('Kecamatan');
            Route::get('desa', 'desa')->name('Desa');
        });

        //PERENCANAAN
        Route::controller(Admin_Perencanaan::class)->group(function () {
            Route::get('halaman-perjalanan', 'halaman_perjalanan')->name('HalamanPerjalanan');
            Route::any('data-perjalanan', 'data_perjalanan')->name('DataPerjalanan');
            Route::post('tambah-data-perjalanan', 'tambah_data_perjalanan')->name('TambahDataPerjalanan');
            Route::post('ubah-data-perjalanan', 'ubah_data_perjalanan')->name('UbahDataPerjalanan');
            Route::get('hapus-data-perjalanan/{id}', 'hapus_data_perjalanan')->name('HapusDataPerjalanan');

            Route::get('halaman-kunjungi-customer/{kode_perjalanan}', 'halaman_kunjungi_customer')->name('HalamanPerjalanan.HalamanKunjungiCustomer');
            Route::any('data-kunjungi-customer/{perjalanan_id}', 'data_kunjungi_customer')->name('DataKunjungiCustomer');
            Route::post('tambah-data-kunjungi-customer', 'tambah_data_kunjungi_customer')->name('TambahDataKunjungiCustomer');
            Route::post('ubah-data-kunjungi-customer', 'ubah_data_kunjungi_customer')->name('UbahDataKunjungiCustomer');
            Route::get('hapus-data-kunjungi-customer/{id}', 'hapus_data_kunjungi_customer')->name('HapusDataKunjungiCustomer');
        });

        // Route::controller(Admin_LaporanController::class)->group(function () {
        //     Route::get('laporan-pesanan', 'laporan_pesanan')->name('Laporan');
        //     Route::any('data-pesanan', 'data_pesanan')->name('DataPesanan');
        //     Route::any('data-produk-pesanan/{id}', 'data_produk_pesanan')->name('DataProdukPesanan');
        //     Route::get('laporan-produk-pesanan/{id}', 'laporan_produk_pesanan')->name('LaporanProdukPesanan');
        //     Route::any('data-status-pesanan/{id}', 'data_status_pesanan')->name('DataStatusPesanan');
        // });
    });

    // Route::prefix('produksi')->name('produksi.')->middleware(['isProduksi'])->group(function () {
    //     Route::controller(ProdukController::class)->group(function () {
    //         Route::get('dashboard', 'dashboard')->name('Dashboard');
    //         Route::get('halaman-produksi', 'halaman_produksi')->name('Produksi');
    //         Route::any('data-produk', 'data_produk')->name('DataProduk');
    //         Route::post('tambah-data-produk', 'tambah_data_produk')->name('TambahDataProduk');
    //         Route::post('ubah-data-produk', 'ubah_data_produk')->name('UbahDataProduk');
    //         Route::get('hapus-data-produk/{id}', 'hapus_data_produk')->name('HapusDataProduk');
    //     });
    //     Route::controller(BarangKeluarController::class)->group(function () {
    //         Route::get('halaman-barang-keluar', 'halaman_barang_keluar')->name('BarangKeluar');
    //         Route::any('data-produk-keluar', 'data_produk_keluar')->name('DataProdukKeluar');
    //     });
    // });

    // Route::prefix('marketing')->name('marketing.')->middleware(['isMarketing'])->group(function () {
    //     Route::controller(Marketing_DashboardController::class)->group(function () {
    //         Route::get('dashboard', 'dashboard')->name('Dashboard');
    //     });
    //     Route::controller(ProdukController::class)->group(function () {
    //         Route::get('halaman-produk', 'halaman_produksi_marketing')->name('Produk');
    //         Route::any('data-produk', 'data_produk')->name('DataProduk');
    //     });
    //     Route::controller(Marketing_DistributorController::class)->group(function () {
    //         Route::get('halaman-distributor', 'halaman_distributor')->name('HalamanDistributor');
    //         Route::any('data-distributor', 'data_distributor')->name('DataDistributor');
    //         Route::post('tambah-data-distributor', 'tambah_data_distributor')->name('TambahDataDistributor');
    //         Route::post('ubah-data-distributor', 'ubah_data_distributor')->name('UbahDataDistributor');
    //         Route::get('hapus-data-distributor/{id}', 'hapus_data_distributor')->name('HapusDataDistributor');
    //     });
    //     Route::controller(Marketing_PesananController::class)->group(function () {
    //         Route::get('halaman-pesanan', 'halaman_pesanan')->name('Pesanan');
    //         Route::get('produk-detail/{id}', 'produk_detail')->name('ProdukDetail');
    //         Route::post('tambah-distribusi-barang', 'tambah_distribusi_barang')->name('TambahDistribusiBarang');
    //         Route::any('data-pesanan', 'data_pesanan')->name('DataPesanan');
    //         Route::post('tambah-data-pesanan', 'tambah_data_pesanan')->name('TambahDataPesanan');
    //         Route::post('ubah-data-pesanan', 'ubah_data_pesanan')->name('UbahDataPesanan');
    //         Route::get('hapus-data-pesanan/{id}', 'hapus_data_pesanan')->name('HapusDataPesanan');
    //         // Route::get('cari-distributor', 'pilih_cari_distributor')->name('CariDistributor');

    //         Route::get('produk-pesanan/{id}', 'produk_pesanan')->name('Pesanan.ProdukPesanan');
    //         Route::any('data-produk-pesanan/{id}', 'data_produk_pesanan')->name('DataProdukPesanan');
    //         Route::get('hapus-data-produk-pesanan/{id}', 'hapus_data_produk_pesanan')->name('HapusDataProdukPesanan');

    //         Route::post('status-pesanan', 'status_pesanan')->name('StatusPesanan');
    //         Route::any('data-status-pesanan/{id}', 'data_status_pesanan')->name('DataStatusPesanan');
    //     });
    //     Route::controller(Marketing_PengembalianController::class)->group(function () {
    //         Route::get('halaman-pengembalian', 'halaman_pengembalian')->name('Pengembalian');
    //         Route::any('data-pesanan-diterima', 'data_pesanan_diterima')->name('DataPesananDiterima');
    //         Route::get('produk-pengembalian/{id}', 'pengembalian_produk_pesanan')->name('PengembalianProdukDetail');
    //         Route::any('produk-dipesan/{pesanan_id}/{id}', 'data_produk_dipesan');
    //         Route::any('data-produk-dikembalikan/{id}', 'data_produk_pengembalian');
    //         Route::post('pengembalian-barang', 'pengembalian_barang')->name('PengembalianBarang');
    //         Route::get('hapus-data-pengembalian/{id}', 'hapus_data_pengembalian')->name('HapusDataPengembalian');
    //         // Route::any('data-pengembalian', 'data_pengembalian')->name('DataPengembalian');
    //     });
    // });

});
