<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ConduitController;

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

// Route::get('/', [ConduitController::class,'index'])->name('conduit.index');

// Route::prefix('conduit')
// ->name('conduit.')
// ->controller(ConduitController::class)
// ->group(function(){
//     Route::get('/', 'index')->name('index');
//     Route::get('/article', 'article')->name('article');
//     Route::get('/editor', 'editor')->name('editor');
// });

Route::name('conduit.')
->controller(ConduitController::class)
->group(function(){
    Route::get('', 'index')->name('index');
    Route::get('article/{id}', 'article')->name('article');
    Route::get('editor', 'editor')->name('editor');
    Route::get('editor/{id}', 'editor_id')->name('editor_id');
    Route::post('editor/{id}', 'update')->name('update');
    Route::get('settings', 'settings')->name('settings');
    Route::get('profile/eric-simons', 'profile')->name('profile');
    Route::post('editor', 'store')->name('store');
    Route::get('destroy/{id}', 'destroy')->name('destroy');
    Route::post('destroy/{id}', 'destroy')->name('destroy');
    Route::post('article/{id}', 'comment')->name('comment');

});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
