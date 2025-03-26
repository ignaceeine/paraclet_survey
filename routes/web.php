<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CampagneController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\GroupeController;
use App\Http\Controllers\MembreController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\QuestionController;
use Illuminate\Support\Facades\Route;


Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');


Route::get('admin/campagnes', [CampagneController::class, 'index'])->name('admin.campagne');
Route::get('admin/campagnes/new', [CampagneController::class, 'create'])->name('campagne.create');
Route::post('/admin/campagnes/new', [CampagneController::class, 'store'])->name('campagne.store');
Route::delete('admin/campagnes/delete', [CampagneController::class, 'destroy'])->name('campagne.destroy');


Route::get('admin/groupes', [GroupeController::class, 'index'])->name('admin.groupe');
Route::get('admin/groupes/new/{id}', [GroupeController::class, 'create'])->name('groupe.create');
Route::post('/admin/groupes/new', [GroupeController::class, 'store'])->name('groupe.store');
Route::post('admin/groupes/edit', [GroupeController::class, 'update'])->name('groupe.update');
Route::get('admin/groupes/show/{id}', [GroupeController::class, 'show'])->name('groupe.show');

Route::get('admin/groupes/membre/new/{id}', [MembreController::class, 'createMembre'])->name('membre.create');
Route::post('admin/groupes/membre/new', [MembreController::class, 'storeMembre'])->name('membre.store');

Route::get('admin/questions', [QuestionController::class, 'index'])->name('admin.question');
Route::get('admin/questions/new', [QuestionController::class, 'create'])->name('question.create');
Route::post('admin/questions/new', [QuestionController::class, 'store'])->name('question.store');
Route::get('admin/questions/edit/{id}', [QuestionController::class, 'edit'])->name('question.edit');
Route::post('admin/questions/update/{id}', [QuestionController::class, 'update'])->name('question.update');
Route::get('admin/questions/delete/{id}', [QuestionController::class, 'destroy'])->name('question.destroy');

Route::get('admin/feedbacks', [FeedbackController::class, 'index'])->name('admin.feedback');



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
