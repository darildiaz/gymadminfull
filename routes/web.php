<?php
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [HomeController::class,'index']);
Route::get('/inicio/', [HomeController::class,'index']);
Route::get('/mapas/', [HomeController::class,'mapas']);
Route::get('/locales/', [HomeController::class,'locales']);
Route::get('/servicios/', [HomeController::class,'servicios']);
Route::get('/nosotros/', [HomeController::class,'nosotros']);
Route::get('/local/{id}', [HomeController::class,'localdet']);
Route::get('/demo/', [HomeController::class,'demo']);
