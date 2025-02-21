<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\SignupController;
use App\Http\Controllers\CovidController;
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
 
 Route::get('/student', [signupController::class, 'index']); 
Route::post('/student', [signupController::class, 'displayInfor']);
Route::get('/covid', [CovidController::class, 'getData']);