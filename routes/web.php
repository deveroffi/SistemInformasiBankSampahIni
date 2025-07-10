<?php



use App\Http\Controllers\admin\ChartNasabahController;
use App\Http\Controllers\admin\HomeAdminController;
use App\Http\Controllers\admin\RewardNasabahController;
use App\Http\Controllers\admin\RiwayatNasabahController;
use App\Http\Controllers\admin\TransMasukController;
use App\Http\Controllers\admin\NasabahController;
use App\Http\Controllers\admin\TSPController;
use App\Http\Controllers\admin\TSPNearestNeighborController;


use App\Http\Controllers\nasabah\ChartController;
use App\Http\Controllers\nasabah\HomeNasabahController;
use App\Http\Controllers\nasabah\ProfilController;
use App\Http\Controllers\nasabah\RiwayatController;
use App\Http\Controllers\nasabah\SampahController;
use App\Http\Controllers\nasabah\TransaksiController;
use App\Http\Controllers\nasabah\RewardController;

use App\Http\Controllers\PDFController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;

use App\Http\Controllers\RegisterController;

use App\Http\Middleware\CheckRole;

use App\Http\Controllers\LokasiController;
use App\Http\Controllers\AdminController;

// Route::get('/input-lokasi', [LokasiController::class, 'index']);
// Route::post('/simpan-lokasi', [LokasiController::class, 'simpan']);
// Route::get('google-autocomplete', [LokasiController::class, 'index']);

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
*/
/*
Route::get('/', function () {
    return view('welcome');
});

*/
// routes/web.php


//AUTH
Route::get('/', function () {
    return view('layout.landing');
})->name('landing');
Route::get('/login', function () {
    return view('login');
})->name('login');
Route::post('/actionlogin', [loginController::class, 'actionlogin'])->name('actionlogin');
Route::get('register', [RegisterController::class, 'register'])->name('register');
Route::post('register/action', [RegisterController::class, 'actionregister'])->name('actionregister');
Route::get('register/action', [RegisterController::class, 'actionregister'])->name('actionregister');
Route::get('/logout', [loginController::class, 'logout'])->name('logout');
Route::post('/login', [LoginController::class, 'actionLogin']);
Route::get('actionlogout', [LoginController::class, 'actionlogout'])->name('actionlogout')->middleware('auth');

//ADMIN
Route::group(['middleware' => ['auth', 'CekRole:admin']], function () {
    Route::get('/adminhome', [HomeAdminController::class, 'tampilhomeAdmin'])->name('adminhome');
    Route::get('/riwayatTransaksiNasabah', [RiwayatNasabahController::class, 'tampilRiwayatNasabah'])->name('riwayatTransaksiNasabah');
    Route::get('/detail-Riwayat-Nasabah{user_id}', [RiwayatNasabahController::class, 'detailRiwayatNasabah'])->name('detailRiwayatNasabah');
    //Route::get('/cetak-pdf-detail-riwayat/{userId}', [RiwayatNasabahController::class, 'cetakPDFDetailRiwayat'])->name('cetakPDFDetailRiwayat');
    Route::get('/cetak-pdf-detail-riwayat/{user_id}', [RiwayatNasabahController::class, 'cetakPDFDetailRiwayat'])->name('cetakPDFDetailRiwayat');
    Route::get('/transaksimasukNasabah', [TransMasukController::class, 'tampiltransaksiMasukNasabah'])->name('transaksiMasukNasabah');
    Route::post('/update-selesai', [TSPNearestNeighborController::class, 'updateSelesai'])->name('updateSelesai');
    // Route::post('/update-status', [TSPNearestNeighborController::class, 'updateStatus'])->name('update.status');
    Route::get('/ruteNasabah', [TSPNearestNeighborController::class, 'nearestNeighbor'])->name('ruteNasabah');
    Route::get('/cetak-transaksi-masuk-nasabah', [TransMasukController::class, 'cetakPDFTransaksiMasuk'])->name('cetakTransaksiMasukNasabah');
    Route::get('/detail-sampah/{id}', [TransMasukController::class, 'detailtransaksiMasukNasabah'])->name('detailtransaksiMasukNasabah');
    // Route::get('/edit-sampah/{id}', [TransMasukController::class, 'edittransaksiMasukNasabah'])->name('edittransaksiMasukNasabah');
    //Route::post('/update-sampah/{id}', [TransMasukController::class, 'updatetransaksiMasukNasabah'])->name('updatetransaksiMasukNasabah');
    // Route::post('/update-status', [TransaksiController::class, 'updateStatus'])->name('update.status');
    Route::post('/save-coordinates', [TransMasukController::class, 'saveCoordinates'])->name('saveCoordinates');
    Route::post('/update-status', [TransMasukController::class, 'updateStatus'])->name('update.status');
    Route::get('/edit-Transaksi/{no_reff}', [TransMasukController::class, 'editTransaksiMasukNasabah'])->name('editMasukNasabah');
    Route::post('/update-Transaksi/{no_reff}', [TransMasukController::class, 'updateTransaksiMasukNasabah'])->name('updateTransaksiMasukNasabah');
    Route::get('/listNasabah', [NasabahController::class, 'tampillistNasabah'])->name('listNasabah');
    Route::get('/datatransaksiNasabah', [NasabahController::class, 'tampildatatransaksiNasabah'])->name('datatransaksiNasabah');
    Route::get('/tambahNasabah', [NasabahController::class, 'tampiltambahNasabah'])->name('tambahNasabah');
    Route::post('/storeNasabah', [NasabahController::class, 'storeNasabah'])->name('storeNasabah');
    Route::get('/edit-nasabah/{id}', [NasabahController::class, 'editNasabah'])->name('editNasabah');
    Route::post('/update-nasabah/{id}', [NasabahController::class, 'updateNasabah'])->name('updateNasabah');
    Route::get('/detail-nasabah/{id}', [NasabahController::class, 'detailNasabah'])->name('detailNasabah');
    Route::get('/delete-nasabah/{id}', [NasabahController::class, 'delete'])->name('deleteNasabah');
    Route::get('/rewardNasabah', [RewardNasabahController::class, 'tampilrewardNasabah'])->name('rewardNasabah');
    Route::get('/cetak-reward-nasabah', [RewardNasabahController::class, 'cetakRewardNasabah'])->name('cetakRewardNasabah');
    Route::get('/chartNasabah', [ChartNasabahController::class, 'tampilchartNasabah'])->name('chartNasabah');
    Route::get('/convert-address', [LokasiController::class, 'convertAddressToCoordinates'])->name('convert.address');

    Route::get('/editProfil', [ProfilController::class, 'tampileditProfil'])->name('editProfil');
    Route::post('/updateProfil', [ProfilController::class, 'updateProfil'])->name('updateProfil');
    Route::post('/update-profile-picture', [ProfilController::class, 'updateProfilePicture'])->name('updateProfilePicture');
});



// NASABAH
Route::group(['middleware' => ['auth', 'CekRole:user']], function () {
    //Route::get('/myhome', [NasabahController::class, 'tampilhome'])->name('myhome');
    Route::get('/nasahome', [HomeNasabahController::class, 'tampilhome'])->name('nasahome');
    // Route::get('/myhome', [NasabahController::class, 'tampilhome'])->middleware('CekRole:user')->name('myhome');
    // Route::post('/hitung-jarak', [TransaksiController::class, 'hitungJarak'])->name('hitung-jarak');
    Route::get('/transaksi', [TransaksiController::class, 'tampiltransaksi'])->name('transaksi');
    Route::get('/history{user_id}', [RiwayatController::class, 'riwayatNasabah'])->name('history');
    Route::get('/cetak-pdf-detail-riwayat/{userId}', [RiwayatController::class, 'cetakDetailRiwayat'])->name('cetakRiwayatNasabah');
    Route::get('/dataTransaksi', [TransaksiController::class, 'tampildatatransaksi'])->name('dataTransaksi');
    Route::post('/storeTransaksi', [TransaksiController::class, 'storeTransaksi'])->name('storeTransaksi');
    Route::get('/detail-Transaksi/{no_reff}', [TransaksiController::class, 'detailTransaksi'])->name('detailTransaksi');
    Route::get('/edit-Transaksi/{no_reff}', [TransaksiController::class, 'editTransaksi'])->name('editTransaksi');
    Route::post('/update-Transaksi/{no_reff}', [TransaksiController::class, 'updateTransaksi'])->name('updateTransaksi');
    Route::get('/delete-Transaksi/{no_reff}', [TransaksiController::class, 'delete'])->name('deleteTransaksi');
    Route::post('/get-lat-long', [TransaksiController::class, 'getLatLong'])->name('getLatLong');
    
    Route::get('/editProfil', [ProfilController::class, 'tampileditProfil'])->name('editProfil');
    Route::post('/updateProfil', [ProfilController::class, 'updateProfil'])->name('updateProfil');
    Route::post('/update-profile-picture', [ProfilController::class, 'updateProfilePicture'])->name('updateProfilePicture');
    Route::get('/dataNasabah', [ProfilController::class, 'tampilnasabah'])->name('nasabah');
    Route::get('/reward', [RewardController::class, 'tampilreward'])->name('reward');
    // Route::post('/simpan-saldo{id}',  [RewardController::class, 'simpanSaldo'])->name('simpan_saldo');
    Route::get('/info', [SampahController::class, 'tampilinfo'])->name('info');
    Route::get('/chart', [ChartController::class, 'tampilchart'])->name('chart');



});




