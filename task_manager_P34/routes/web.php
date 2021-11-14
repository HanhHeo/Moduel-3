<?php


use App\Http\Controllers\CustomerController;
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
});

// Tạo 1 nhóm route với tiền tố customer
// Route::prefix('customer')->group(function () {

//     Route::get('index', function () {
//         // Hiển thị danh sách khách hàng
//         return view('moduels.customer.index');
//     });


//     Route::get('create', function () {
//         // Hiển thị Form tạo khách hàng
//     });

//     Route::post('store', function () {
//         // Xử lý lưu dữ liệu tạo khách hàng thong qua phương thức POST từ form
//     });

//     Route::get('{id}/show', function () {
//         // Hiển thị thông tin chi tiết khách hàng có mã định danh id
//     });

//     Route::get('{id}/edit', function () {
//         // Hiển thị Form chỉnh sửa thông tin khách hàng
//     });

//     Route::patch('{id}/update', function () {
//         // xử lý lưu dữ liệu thông tin khách hàng được chỉnh sửa thông qua PATCH từ form
//     });

//     Route::delete('{id}', function () {
//         // Xóa thông tin dữ liệu khách hàng
//     });
// });

Route::prefix('customers')->group(function () {
    Route::get('/', [CustomerController::class, 'index'])->name('customers.index');
    Route::get('/create', [CustomerController::class, 'create'])->name('customers.create');
    Route::post('/create', [CustomerController::class, 'store'])->name('customers.store');
    Route::get('/{id}/edit', [CustomerController::class, 'edit'])->name('customers.edit');
    Route::put('/{id}/update', [CustomerController::class, 'update'])->name('customers.update');
    Route::get('/{id}/delete', [CustomerController::class, 'destroy'])->name('customers.destroy');
    Route::get('/{id}/show', [CustomerController::class, 'show'])->name('customers.show');
});
