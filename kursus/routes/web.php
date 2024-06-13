<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\SocialiteController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SekolahController;
use App\Http\Controllers\ProgramStudiController;
use App\Http\Controllers\JadwalKegiatanController;
use App\Http\Controllers\PendaftaranController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\PengumumanController;
use App\Http\Controllers\LogAkunController;
use App\Http\Controllers\WarrantyController;
use App\Http\Controllers\DropdownController;
use App\Http\Controllers\MerekController;
use App\Http\Controllers\TipeController;
use App\Http\Controllers\WindowFilmsController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\M_WarrantyController;
use App\Http\Controllers\ResellerController;
use App\Models\Pendaftaran;

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

Route::get('/', function () {
    return view('welcome');
});
Route::get('dropdown', [DropdownController::class, 'index']);
Route::post('api/fetch-tipe', [DropdownController::class, 'fetchTipe']);
Route::post('regist', [UserController::class, 'insertRegis'])->name('regist');
Route::post('regist', [LogAkunController::class, 'store']);
Route::get('windowfilms', [WindowFilmsController::class, 'index']);

// guest fp page
Route::resource('fp', WarrantyController::class);
Route::post('claim-warranty', [WarrantyController::class, 'claim']);
Route::get('fp/{code}/claim', [WarrantyController::class, 'claimadmin']);
Route::get('mauklaim/{code}', [WarrantyController::class, 'mauklaim']);
Route::get('tunggu/{code}', [WarrantyController::class, 'tunggu']);
Route::get('udah/{code}', [WarrantyController::class, 'udah']);
/**
 * socialite auth
 */
Route::get('/auth/{provider}', [SocialiteController::class, 'redirectToProvider']);
Route::get('/auth/{provider}/callback', [SocialiteController::class, 'handleProvideCallback']);

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
    //akun
    Route::get('/profile', [LogAkunController::class, 'dataprofil'])->name("profile");
    Route::post('/edit-profile', [LogAkunController::class, 'editprofil']);
    Route::post('/edit-pw', [LogAkunController::class, 'editakun']);

    //sekolah
    Route::get('/data-sekolah', [SekolahController::class, 'datasekolah'])->name('data-sekolah');
    Route::post('/save-school', [SekolahController::class, 'simpansekolah']);
    Route::post('/update-school/{NPSN}', [SekolahController::class, 'updatesekolah']);
    Route::get('/delete-school/{id}', [SekolahController::class, 'hapussekolah']);

    //produk
    Route::get('/data-produk', [ProgramStudiController::class, 'dataproduk'])->name('data-produk');
    Route::post('/save-produk', [ProgramStudiController::class, 'simpanproduk']);
    Route::post('/update-produk/{id_produk}', [ProgramStudiController::class, 'updateproduk']);
    Route::get('/delete-produk/{id_produk}', [ProgramStudiController::class, 'hapusproduk']);

    Route::get('/data-merek', [MerekController::class, 'index'])->name('data-merek');
    Route::post('/save-merek', [MerekController::class, 'store']);
    Route::post('/update-merek', [MerekController::class, 'update']);
    Route::get('/delete-merek/{id}', [MerekController::class, 'destroy'])->name('delete-merek');

    Route::get('/data-tipe', [TipeController::class, 'index'])->name('data-tipe');
    Route::post('/save-tipe', [TipeController::class, 'store']);
    Route::post('/update-tipe', [TipeController::class, 'update']);
    Route::get('/delete-tipe/{id}', [TipeController::class, 'destroy'])->name('delete-tipe');

    Route::get('/data-pendaftaran', [PendaftaranController::class, 'index'])->name('data-pendaftaran');
    Route::post('/save-pendaftaran', [PendaftaranController::class, 'store']);
    Route::post('/update-pendaftaran', [PendaftaranController::class, 'update']);
    Route::get('/delete-pendaftaran/{id}', [PendaftaranController::class, 'destroy'])->name('delete-pendaftaran');
    Route::get('/generate-kode', [PendaftaranController::class, 'generateKode'])->name('generate-kode');

    Route::get('/verified-registration/{id}', [PendaftaranController::class, 'verifikasistatuspendaftaran']);
    Route::get('/notverified-registration/{id}', [PendaftaranController::class, 'notverifikasistatuspendaftaran']);
    Route::get('/invalid-registration/{id}', [PendaftaranController::class, 'invalidstatuspendaftaran']);
    Route::get('/finish-registration/{id}', [PendaftaranController::class, 'selesaistatuspendaftaran']);

    Route::get('/data-kategori', [KategoriController::class, 'index'])->name('data-kategori');
    Route::post('/save-kategori', [KategoriController::class, 'store']);
    Route::post('/update-kategori', [KategoriController::class, 'update']);
    Route::get('/delete-kategori/{id}', [KategoriController::class, 'destroy'])->name('delete-kategori');

    Route::get('/data-reseller', [ResellerController::class, 'index'])->name('data-reseller');
    Route::post('/save-reseller', [ResellerController::class, 'store']);
    Route::post('/update-reseller', [ResellerController::class, 'update']);
    Route::get('/delete-reseller/{id}', [ResellerController::class, 'destroy'])->name('delete-reseller');

    Route::get('/data-m_warranty', [M_WarrantyController::class, 'index'])->name('data-m_warranty');
    Route::post('/save-m_warranty', [M_WarrantyController::class, 'store']);
    Route::post('/update-m_warranty', [M_WarrantyController::class, 'update']);
    Route::get('/delete-m_warranty/{id}', [M_WarrantyController::class, 'destroy'])->name('delete-m_warranty');
});

require __DIR__ . '/auth.php';
