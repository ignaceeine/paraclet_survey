<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CampagneController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\GroupeController;
use App\Http\Controllers\MembreController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\QuestionController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth','admin'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');

    Route::get('admin/campagnes', [CampagneController::class, 'index'])->name('admin.campagne');
    Route::get('admin/campagnes/new', [CampagneController::class, 'create'])->name('campagne.create');
    Route::post('/admin/campagnes/new', [CampagneController::class, 'store'])->name('campagne.store');
    Route::get('admin/campagnes/edit/{id}', [CampagneController::class, 'edit'])->name('campagne.edit');
    Route::post('admin/campagnes/update/{id}', [CampagneController::class, 'update'])->name('campagne.update');
    Route::delete('admin/campagnes/delete', [CampagneController::class, 'destroy'])->name('campagne.destroy');

    Route::get('admin/groupes', [GroupeController::class, 'index'])->name('admin.groupe');
    Route::get('admin/groupes/new/{id}', [GroupeController::class, 'create'])->name('groupe.create');
    Route::post('/admin/groupes/new', [GroupeController::class, 'store'])->name('groupe.store');
    Route::delete('admin/groupes/delete/{id}', [GroupeController::class, 'destroy'])->name('groupe.destroy');
    Route::get('admin/groupes/edit/{id}', [GroupeController::class, 'edit'])->name('groupe.edit');
    Route::post('admin/groupes/update', [GroupeController::class, 'update'])->name('groupe.update');
    Route::post('admin/groupes/update/{id}', [GroupeController::class, 'updatename'])->name('groupe.updatename');
    Route::get('admin/groupes/show/{id}', [GroupeController::class, 'show'])->name('groupe.show');

    Route::get('admin/groupes/membre/new/{id}', [MembreController::class, 'createMembre'])->name('membre.create');
    Route::post('admin/groupes/membre/new', [MembreController::class, 'storeMembre'])->name('membre.store');
    Route::delete('admin/groupes/membre/delete/{id}', [MembreController::class, 'destroyMembre'])->name('membre.destroy');

    Route::get('admin/questions', [QuestionController::class, 'index'])->name('admin.question');
    Route::get('admin/questions/new', [QuestionController::class, 'create'])->name('question.create');
    Route::post('admin/questions/new', [QuestionController::class, 'store'])->name('question.store');
    Route::get('admin/questions/edit/{id}', [QuestionController::class, 'edit'])->name('question.edit');
    Route::post('admin/questions/update/{id}', [QuestionController::class, 'update'])->name('question.update');
    Route::get('admin/questions/delete/{id}', [QuestionController::class, 'destroy'])->name('question.destroy');

    Route::get('admin/feedbacks', [FeedbackController::class, 'index'])->name('admin.feedback');
    Route::get('admin/feedbacks/{membreId}', [FeedbackController::class, 'showMemberFeedbacks'])->name('feedback.show_member');

    Route::post('/admin/excel', [MembreController::class, 'store'])->name('members.store');
    Route::put('/membre/feedback/update/{id}', [MembreController::class, 'update'])->name('membre.feedback.update');
});

Route::middleware(['auth','membre'])->group(function () {
    Route::get('/membre', [MembreController::class, 'index'])->name('membre.index');

    Route::get('membre/feedbacks/new', [FeedbackController::class, 'create'])->name('feedback.create');
    Route::get('membre/feedbacks/new/{membreId}', [FeedbackController::class, 'createForMember'])->name('feedback.create_for_member');
    Route::post('membre/feedbacks/new', [FeedbackController::class, 'store'])->name('feedback.store');
    Route::get('membre/feedbacks/received', [FeedbackController::class, 'received'])->name('membre.feedback.received');
});

Route::get('/', function (){
    return view('index');
})->name('index');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
