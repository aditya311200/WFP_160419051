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

// Route::get('/', function () {
//     return view('welcome');
// })->name("welcome");

Route::get('/menu', function () {
    $tambahan = ['coklat', 'keju', 'sosis'];
    return view('menu', ['tambahan' => $tambahan]);
})->name("menu");

Route::get('/menu/{jenis?}/{tambahan?}', function ($jenis = 'roti', $tambahan = 'coklat') {
    return view('roti', ['jenis' => $jenis, 'tambahan' => $tambahan]);
});

Route::resource('products', 'ProductController');
Route::resource('categories', 'CategoryController');
Route::resource('customers', 'CustomerController');
Route::resource('transactions', 'TransactionController');

Route::get('/report/showroti/{kategori}', 'CategoryController@showCategory')->name('reportShowCategory');
Route::get('/laporan/kategoriproduk', 'LaporanController@kategoriproduk')->name('laporan.kategoriproduk');

Route::post('transaction/showAjax/', 'TransactionController@showAjax')->name('transaction.showAjax');

Route::get('/', 'ProductController@front_index');
Route::get('cart', 'ProductController@cart');
Route::get('add-to-cart/{id}', 'ProductController@addToCart');

Route::middleware(['auth'])->group(function(){
    Route::post('supplier/showinfo/', 'SupplierController@showInfo')->name('supplier.showinfo');
    Route::post('supplier/showAjax/', 'SupplierController@showAjax')->name('supplier.showAjax');
    Route::post('/supplier/getEditForm', 'SupplierController@getEditForm')->name('supplier.getEditForm');
    Route::post('/supplier/getEditForm2', 'SupplierController@getEditForm')->name('supplier.getEditForm2');
    Route::resource('suppliers', 'SupplierController');
    Route::post('/supplier/saveData', 'SupplierController@saveData')->name('supplier.saveData');
    Route::post('/supplier/deleteData', 'SupplierController@deleteData')->name('supplier.deleteData');

    Route::post('/supplier/saveDataField', 'SupplierController@saveDataField')->name('supplier.saveDataField');
    Route::post('/supplier/changeLogo', 'SupplierController@changeLogo')->name('supplier.changeLogo');

    Route::get('/checkout', 'TransactionController@form_submit_front');
    Route::get('/submit_checkout', 'TransactionController@submit_front')->name('submitCheckout');
});



// Route::resource('/produk', 'ProdukController');

// Route::get('/produk', 'ProdukController@index');

// Route::get('/helloworld', function () {
//     return 'Hello World, Pak Dosen';
// });

// Route::view('/selamatdatang', 'welcome');
// Route::view('/welcome', 'welcome');

// Route::get('/user/{id}', function ($id) {
//     return "User ".$id;
// });

// Route::get('/users/{name?}', function ($name = 'John') {
//     return $name;
// });

// Route::get('/mhs/{name?}', function ($name1 = 'Aditya Wijaya') {
//     echo "Hello ".$name1."!";
// })->name("mhs");

// Route::get('/greeting/{name?}', function ($name = "Semua") {
//     return view('welcome', ['name' => $name]);
// })->name("showgreeting");

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
