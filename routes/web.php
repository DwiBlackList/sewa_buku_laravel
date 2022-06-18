<?php

use App\Http\Controllers\DataPeminjamController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\PeminjamController;
use App\Models\DataPeminjam;
use Illuminate\Support\Facades\Route;

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
// job 2
// sebelum 
// Route::get('/', function () {
//     return view('welcome');
// });

// setelah
// Route::get('/', function () {
//     return 'Selamat datang di perpustakaan kami , selamat membaca';
// });

// Route::get('biodata', function(){
//     return 'Nama : Ichsanul Dwi Prayitno <br> 
//             Nim : 4.33.20.0.14 <br> 
//             Alamat : Cangkiran, Semarang <br> 
//             Hobi : Unknown'
//         ;
// });

// Route::get('mahasiswa/{prodi}', function ($prodi) {
//     return 'Mahasiswa Program Studi : '.$prodi;
// });

// Route::get('mahasiswa2/{prodi?}', function ($prodi=null) {
//     if($prodi == null)
//         return "Data Program Studi Kosong";
//     return "Mahasiswa Program Studi : ".$prodi;
// });

// Route::get('mahasiswa3/{prodi?}', function ($prodi = "Teknologi Rekayasa Komputer") {
//     return 'Mahasiswa Prodi : '.$prodi;
// });

// Route::get('biodata2', function(){
//     return view('biodata2');
// });

// Route::group([], function(){
//     Route::get('/pertama', function(){
//         echo "route pertama";
//     });
//     Route::get('/kedua', function(){
//         echo "route kedua";
//     });
//     Route::get('/ketiga', function(){
//         echo "route ketiga";
//     });
// });

// Route::group(['prefix' => 'latihan'], function(){
//     Route::get('/satu', function(){
//         echo "Latihan 1";
//     });
//     Route::get('/dua', function(){
//         echo "Latihan 2";
//     });
//     Route::get('/tiga', function(){
//         echo "Latihan 3";
//     });
// });

// Route::group(array('prefix' =>'admin'), function(){
//     // url ke home
//     Route::get('/', function(){
//         return 'Halaman Home Admin';
//     });
//     // route ke input data buku
//     Route::get('posts', function(){
//         return 'Halaman Input Data Buku';
//     });
//     // route ke halaman menyimpan data
//     Route::get('posts/simpan', function(){
//         return 'Data Berhasil Disimpan';
//     });
// });

// Route::name('kuliah')->group(function(){
//     Route::get('Teknologi Rekayasa Komputer', function(){
//         return "Kuliah di Program Studi Teknologi Rekayasa Komputer";
//     });
// });

// job 3

// Route::get('/' , function ()
// {
//     return view('welcome');
// });

// Route::get('/' , function ()
// {
//     return view('index');
// });

Route::get('/' , [HomeController::class, 'index']);

// Route::get('data_peminjam' , [HomeController::class, 'DataPeminjam']);

Route::get('lihat_data_peminjam' , [PeminjamController::class, 'LihatDataPeminjam']);

Route::get('data_peminjam' , [DataPeminjamController::class , 'index'])->name('data_peminjam.index');
Route::get('data_peminjam/create' , [DataPeminjamController::class , 'create'])->name('data_peminjam.create');
Route::post('data_peminjam/store' , [DataPeminjamController::class , 'store'])->name('data_peminjam.store');

// job 7

Route::get('data_peminjam/edit/{id}' , [DataPeminjamController::class , 'edit'])->name('data_peminjam.edit');

Route::post('data_peminjam/edit/{id}' , [DataPeminjamController::class , 'update'])->name('data_peminjam.update');

Route::post('data_peminjam/delete/{id}' , [DataPeminjamController::class , 'destroy'])->name('data_peminjam.destroy');

// job 8

Route::get('coba_collection' , [DataPeminjamController::class , 'CobaCollection']);
Route::get('collection_first' , [DataPeminjamController::class , 'CollectionFirst']);
Route::get('collection_last' , [DataPeminjamController::class , 'CollectionLast']);
Route::get('collection_count' , [DataPeminjamController::class , 'CollectionCount']);
Route::get('collection_take' , [DataPeminjamController::class , 'CollectionTake']);
Route::get('collection_pluck' , [DataPeminjamController::class , 'CollectionPluck']);
Route::get('collection_where' , [DataPeminjamController::class , 'CollectionWhere']);
Route::get('collection_wherein' , [DataPeminjamController::class , 'CollectionWhereIn']);
Route::get('collection_toarray' , [DataPeminjamController::class , 'CollectionToArray']);
Route::get('collection_tojson' , [DataPeminjamController::class , 'CollectionToJson']);

//job 11

Route::get('peminjaman' , [PeminjamanController::class , 'index']);
Route::get('peminjaman/create' , [PeminjamanController::class , 'create'])->name('peminjaman.create');
Route::post('peminjaman/store' , [PeminjamanController::class , 'store'])->name('peminjaman.store');
Route::get('peminjaman/detail_peminjam/{id}' , [PeminjamanController::class , 'detail_peminjam'])->name('peminjaman.detail_peminjam');
Route::get('peminjaman/detail_buku/{id}' , [PeminjamanController::class , 'detail_buku'])->name('peminjaman.detail_buku');

//job 12 searching data peminjam
Route::get('data_peminjam/search' , [DataPeminjamController::class , 'search'])->name('data_peminjam.search');