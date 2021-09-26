<?php

namespace App\Http\Controllers;

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

Route::get('/', [HomeController::class, 'index']);

Route::get('/dashboard', [DashboardController::class, 'index'])
->middleware(['auth'])->name('dashboard');

Route::get('/user/data', [UserDataController::class, 'index'])
->middleware(['auth'])->name('data');

Route::prefix('account')->middleware(['auth'])->group(function () {
    Route::get('/', [Account\ShowController::class, 'index']);
    Route::put('/update', [Account\UpdateAccountController::class, 'index']);
    Route::get('/change-password', [Account\ChangePasswordController::class, 'index']);
    Route::put('/update-password', [Account\UpdatePasswordController::class, 'index']);
});


Route::prefix('admin')->group(function () {
   Route::get('/login', [Admin\LoginController::class, 'index']);
   Route::post('/auth', [Admin\AuthController::class, 'index']);

   Route::middleware(['auth', 'is-admin'])->group(function () {
        Route::get('/dashboard', [Admin\DashboardController::class, 'index']);
        Route::get('/edit/{id}', [Admin\EditController::class, 'index']);
        Route::put('/update', [Admin\UpdateController::class, 'index']);
    });
});


Route::get('public/assets/{filename}', function($filename){
    //hosting gratis tidak memberikan akses membuat symlink
    $path = storage_path() . '/app/public/assets/' . $filename;

    if(!\File::exists($path)) {
        return response()->json(['message' => 'Image not found.'], 404);
    }

    $file = \File::get($path);
    $type = \File::mimeType($path);

    $response = \Response::make($file, 200);
    $response->header("Content-Type", $type);

    return $response;
});
require __DIR__.'/auth.php';
