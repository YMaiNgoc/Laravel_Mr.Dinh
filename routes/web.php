<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\SignupController;
use App\Http\Controllers\CovidController;				
use App\Http\Controllers\ProductController;		
use App\Http\Controllers\PageController;	

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;

Route::get('/productTable', function () {
    Schema::create('products', function (Blueprint $table) {
        $table->id(); 
        $table->string('name'); 
        $table->integer('price'); 
        $table->string('image'); 
        $table->timestamps(); 
    });

    return 'Bảng products đã được tạo!';
});	
Route::get('/tong', function () {
    return view('tong');
});

// Route::post('/tong', function (Request $request) {
//     $a = $request->input('number1'); 
//     $b = $request->input('number2');

//     return view('tong', ['sum' => $a + $b]);
// });

// Route::group(['prefix' => 'tutorial'], function () {
//     Route::get('/aws', function () {
//         echo "aws tutorial";
//     });
//     Route::get('/jira', function () {
//         echo "jira tutorial";
//     });

//     Route::get('/testng', function () {
//         echo "testng tutorial";
//     });
// });
//  Route::get('/index', [postController::class,'index']);
//  Route::get('/create', [postController::class,'create']);
 
//  Route::get('/student', [signupController::class, 'index']); 
// Route::post('/student', [signupController::class, 'displayInfor']);
// Route::get('/covid', [CovidController::class, 'getData']);
// Route::resource('products', ProductController::class);
// //// buôi 3
// Route::get('/', function(){
//     return-view('welcome');
//     });
//     Route::get('/baitap4', [PageController::class, 'getIndex']);
//     ///////
//     use App\Http\Controllers\DatabaseController;
//     Route::get('/create-tables', [DatabaseController::class, 'createTables']);
    // Route::get('/trangchu', [PageController::class, 'getIndex']);
    
// Route::get('index', [PageController::class, 'getIndex'])->name('trang-chu');
Route::get('/', [PageController::class, 'getIndex'])->name('trang-chu');
Route::get('/type/{id}', [PageController::class, 'getLoaiSp']);		
Route::get('/chitiet/{id}', [PageController::class, 'getChiTietSanPham']);									
// Route::get('/admin', [PageController::class, 'getIndexAdmin']);		
Route::get('/admin', [PageController::class, 'getIndexAdmin'])->name('admin.index');
Route::get('/admin-add-form', [PageController::class, 'getAdminAdd'])->name('add-product');																	
Route::post('/admin-add-form', [PageController::class, 'postAdminAdd']);												
Route::get('/admin-edit-form/{id}', [PageController::class, 'getAdminEdit'])->name('admin.edit');
Route::post('/admin-edit', [PageController::class, 'postAdminEdit']);
Route::post('/admin-delete/{id}', [PageController::class, 'postAdminDelete']);	
													
Route::get('/about', function () {
    return view('page.about');
})->name('about');
Route::get('/lienhe', function () {
    return view('page.lienhe');
})->name('lienhe');
