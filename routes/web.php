<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use App\Http\Controllers\PDFController;
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
    return view('home');
});

Route::post('/upload',[Controller::class, 'upload'])->name('upload');
//Route::post('/generatePDF', [PDFController::class, 'generatePDF'])->name('generatePDF');
Route::get('/preview', [PDFController::class, 'preview'])->name('preview');
Route::get('/download', [PDFController::class, 'download'])->name('download');