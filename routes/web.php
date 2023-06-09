<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Admin\Admin_ProdukController;
use App\Http\Controllers\Admin\Admin_LaporanController;
use App\Http\Controllers\Admin\Admin_CustomerController;
use App\Http\Controllers\Admin\Admin_PenggunaController;
use App\Http\Controllers\Admin\Admin_DashboardController;
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

        // DATA PENGGUNA
        Route::controller(Admin_PenggunaController::class)->group(function () {
            Route::get('halaman-pengguna', 'halaman_pengguna')->name('HalamanPengguna');
            Route::any('data-pengguna', 'data_pengguna')->name('DataPengguna');
            Route::post('tambah-data-pengguna', 'tambah_data_pengguna')->name('TambahDataPengguna');
            Route::post('ubah-data-pengguna', 'ubah_data_pengguna')->name('UbahDataPengguna');
            Route::get('hapus-data-pengguna/{id}', 'hapus_data_pengguna')->name('HapusDataPengguna');
        });

        // DATA CUSTOMER
        Route::controller(Admin_CustomerController::class)->group(function () {
            Route::get('halaman-customer', 'halaman_customer')->name('HalamanCustomer');
            Route::any('data-customer', 'data_customer')->name('DataCustomer');
            Route::post('tambah-data-customer', 'tambah_data_customer')->name('TambahDataCustomer');
            Route::post('ubah-data-customer', 'ubah_data_customer')->name('UbahDataCustomer');
            Route::get('hapus-data-customer/{id}', 'hapus_data_customer')->name('HapusDataCustomer');
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
