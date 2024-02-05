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
use App\Http\Controllers\WindowFilmsController;
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

    //user/pengguna
    Route::get('/data-user', [UserController::class, 'datauser'])->name('data-user');
    Route::post('/save-user', [UserController::class, 'simpanuser']);
    Route::get('/edit-user/{user_id}', [UserController::class, 'edituser'])->name('edit-user');
    Route::post('/edit-pw-user', [UserController::class, 'editakun'])->name("edit-pw-user");
    Route::post('/update-user/{user_id}', [UserController::class, 'updateuser'])->name('update-user');
    Route::get('/delete-user/{user_id}', [UserController::class, 'hapususer'])->name('delete-user');

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

    //pendaftaran
    Route::get('/data-registration', [PendaftaranController::class, 'datapendaftaran'])->name('data-registration');
    Route::get('/form-registration', [PendaftaranController::class, 'inputpendaftaran']);
    Route::post('/save-registration', [PendaftaranController::class, 'simpanpendaftaran']);
    Route::get('/edit-registration/{id_pendaftaran}', [PendaftaranController::class, 'editpendaftaran']);
    Route::post('/update-registration/{id_pendaftaran}', [PendaftaranController::class, 'updatependaftaran']);
    Route::get('/delete-registration/{id_pendaftaran}', [PendaftaranController::class, 'hapuspendaftaran']);
    Route::get('/detail-registration/{id_pendaftaran}', [PendaftaranController::class, 'detailpendaftaran']);

    Route::get('/verified-registration/{id_pendaftaran}', [PendaftaranController::class, 'verifikasistatuspendaftaran']);
    Route::get('/notverified-registration/{id_pendaftaran}', [PendaftaranController::class, 'notverifikasistatuspendaftaran']);
    Route::get('/invalid-registration/{id_pendaftaran}', [PendaftaranController::class, 'invalidstatuspendaftaran']);
    Route::get('/finish-registration/{id_pendaftaran}', [PendaftaranController::class, 'selesaistatuspendaftaran']);

    Route::get('/data-merek', [MerekController::class, 'index'])->name('data-merek');
    Route::post('/save-merek', [MerekController::class, 'store']);
    Route::post('/update-merek', [MerekController::class, 'update']);
    Route::get('/delete-merek/{id}', [MerekController::class, 'destroy'])->name('delete-merek');
});

require __DIR__ . '/auth.php';
