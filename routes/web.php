<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;

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




