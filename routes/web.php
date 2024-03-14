<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CatController;
use App\Http\Controllers\DogController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\MobileController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    // return view('welcome');
    return redirect('/cats');
});

// cats 小貓
Route::get('/cats_excel', [CatController::class, 'excel'])->name('cats.excel');
Route::resource('cats', CatController::class);

// dogs 小狗
Route::resource('dogs', DogController::class);

//child
Route::get('/child', function () {
    return view('child');
});

// students 學生
Route::resource('students', StudentController::class);

// mobiles 手機
Route::resource('mobiles', MobileController::class);

// loves 愛好
Route::resource('loves', MobileController::class);
