<?php

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

Route::get('/', function () {
    return view('welcome');
})->name('welcome');
/*
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');
Route::get('/dashboard',[
'as'=>'dashboard',
'user'=>'SanphamController@index'
])->middleware(['auth'])->name('dashboard');*/
//welcome

require __DIR__.'/auth.php';
//file
Route::get('upload_file','FileController@index');
Route::post('upload_file','FileController@upload');
//san pham
Route::get('dashboard','SanphamController@dashboard')->middleware(['auth'])->name('dashboard');
Route::get('dashboarduser','SanphamController@dashboarduser')->middleware(['auth'])->name('dashboarduser');
Route::get('/','SanphamController@hienthi')->name('welcome');
Route::get('welcomeuser','SanphamController@hienthiuser')->name('welcomeuser');
Route::get('sanpham','SanphamController@index')->middleware(['auth'])->name('sanpham');
Route::get('themsanpham','SanphamController@add')->middleware(['auth'])->name('themsanpham');
Route::post('themsanpham','SanphamController@create');
Route::get('edit-sanphan/{id}','SanphamController@edit')->middleware(['auth'])->name('editsanpham');
Route::post('edit-sanphan/{id}','SanphamController@post_edit');
Route::get('delete/{id}','SanphamController@delete')->middleware(['auth'])->name('delete');
Route::get('timkiem','SanphamController@timkiem')->name('timkiem');
Route::get('loai_sp/{Ten}','SanphamController@loai_sp')->name('loai_sp');
//danhmuc
Route::get('danhmuc','DanhmucController@index')->middleware(['auth','role:admin'])->name('danhmuc');
Route::get('themdanhmuc','DanhmucController@adddm')->middleware(['auth'])->name('themdanhmuc');
Route::post('themdanhmuc','DanhmucController@createdm');
Route::get('edit-danhmuc/{id}','DanhmucController@editdm')->middleware(['auth'])->name('editdanhmuc');
Route::post('edit-danhmuc/{id}','DanhmucController@post_editdm');
Route::get('deletedm/{id}','DanhmucController@deletedm')->middleware(['auth'])->name('deletedm');
Route::get('lienhe','SanphamController@lienhe')->name('lienhe');
//test
Route::get('listcart','SanphamController@listcart')->name('listcart');
//viewshop
Route::get('view','SanphamController@showcart')->name('view');
//addtocart
Route::get('addtocart/{id}','SanphamController@addcart')->name('addtocart');
Route::get('deleteCart/{id}','SanphamController@deleteCart')->name('deleteCart');
Route::get('deleteListCart/{id}','SanphamController@deleteListCart')->name('deleteListCart');
//updatecart
Route::get('saveListCart/{id}/{qty}','SanphamController@saveListCart')->name('saveListCart');
//checkout
Route::get('checkout','CheckoutController@addcheckout')->name('checkout');
Route::post('checkout','CheckoutController@createcheckout');
Route::get('viewCheckout','CheckoutController@viewCheckout')->middleware(['auth','role:admin'])->name('viewCheckout');
Route::get('viewbill','CheckoutController@viewbill')->name('viewbill');
Route::get('deletebill/{id}','CheckoutController@deletebill')->name('deletebill');
//chitietsp
Route::get('chitietsp/{id}','SanphamController@chitietsp')->name('chitietsp');
Route::get('test','SanphamController@test')->name('test');