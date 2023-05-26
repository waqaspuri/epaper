<?php

use App\Http\Controllers\Admin\PaperController;
use App\Http\Controllers\HomeController;
use App\Models\Epaper;
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
date_default_timezone_set("Asia/Karachi");

Route::get('/mi', function() {
    $exitCode = Artisan::call('config:clear');
    dd('ok');
    // return what you want php artisan cache:clear
});
Route::get('/', function () {
    return redirect()->route('singlePaper');
});
Route::get('/singlepaper', [HomeController::class, 'singlePaper'])->name('singlePaper');
Route::get('/single_news/{id}', [HomeController::class, 'single_news'])->name('single_news');


Route::get('/generatepdf/{id}', [HomeController::class, 'pdfPaper'])->name('pdfPaper');

Route::get('/single_item/{id}', [HomeController::class, 'single_item'])->name('single_item');

//Route::get('/paper', function () {
//    return view('admin.pages.uploadPaper');
//})->name('createPaper');

Route::middleware(['admin'])->group(function () {
    Route::group(['namespace' => "Admin", 'prefix' => 'admin'], function () {
        Route::get('/paper', function () {

            return view('admin.pages.uploadPaper');
        })->name('create_new');
        Route::post('/createpaper', [PaperController::class, 'createPaper'])->name('createPaper');
        Route::get('/showlist', [PaperController::class, 'showList'])->name('showList');
        Route::get('/link/{id}', [PaperController::class, 'addLink'])->name('addLink');
        Route::get('/delete/{id}', [PaperController::class, 'del_paper'])->name('del_paper');
        Route::post('/update', [PaperController::class, 'updatePaper'])->name('updatePaper');
        Route::post('/savelink', [PaperController::class, 'saveLink'])->name('saveLink');
        Route::get('/dellink{id}', [PaperController::class, 'del_link'])->name('del_link');
        Route::get('/deletepaper/{date}', [PaperController::class, 'deletePaper'])->name('deletePaper');
    });
});



Route::get('/dashboard', function () {
    return redirect()->route('create_new');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
