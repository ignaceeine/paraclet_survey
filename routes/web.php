<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CampagneController;
use App\Http\Controllers\GroupeController;
use App\Http\Controllers\MembreController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;


Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');


Route::get('admin/campagnes', [CampagneController::class, 'index'])->name('admin.campagne');
Route::get('admin/campagnes/new', [CampagneController::class, 'create'])->name('campagne.create');
Route::post('/admin/campagnes/new', [CampagneController::class, 'store'])->name('campagne.store');


Route::get('admin/groupes', [GroupeController::class, 'index'])->name('admin.groupe');
Route::get('admin/groupes/new/{id}', [GroupeController::class, 'create'])->name('groupe.create');
Route::post('/admin/groupes/new', [GroupeController::class, 'store'])->name('groupe.store');



Route::post('/admin/excel', [MembreController::class, 'store'])->name('members.store');


Route::get('/', function () {
    return view('index');
})->name('index');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
