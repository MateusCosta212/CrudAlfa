<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProfileController;

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

Route::get('/', [ContactController::class, 'index'])->name('home');


Route::resource('contacts', 'ContactController');
Route::get('/contact/register', [ContactController::class, 'create'])->name('create_contact');
Route::post('/contact/save', [ContactController::class, 'store'])->name('save_contact');
Route::get('/contact/edit/{id}', [ContactController::class, 'edit'])->name('edit_contact');
Route::put('/contact/update/{id}', [ContactController::class, 'update'])->name('update_contact');
Route::delete('/contact/delete/{id}', [ContactController::class, 'destroy'])->name('delete_contact');
Route::get('/index', [ContactController::class, 'index'])->name('contact_list');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';



