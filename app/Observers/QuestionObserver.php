<?php

namespace App\Observers;

use App\Models\Question;
use Illuminate\Support\Facades\Log;

class QuestionObserver
{
    /**
     * Handle the Question "created" event.
     */
    public function created(Question $question): void
    {
        Log::info('Nouvelle question ajoutée', [
            'question_id' => $question->id,
            'libelle' => $question->libelle,
            'date' => now()->toDateTimeString()
        ]);
    }

    /**
     * Handle the Question "updated" event.
     */
    public function updated(Question $question): void
    {
        Log::info('Question modifiée', [
            'question_id' => $question->id,
            'libelle' => $question->libelle,
            'date' => now()->toDateTimeString()
        ]);
    }

    /**
     * Handle the Question "deleted" event.
     */
    public function deleted(Question $question): void
    {
        Log::warning('Question supprimée', [
            'Question_id' => $question->id,
            'libelle' => $question->libelle,
            'date' => now()->toDateTimeString()
        ]);
    }

    /**
     * Handle the Question "restored" event.
     */
    public function restored(Question $question): void
    {
        //
    }

    /**
     * Handle the Question "force deleted" event.
     */
    public function forceDeleted(Question $question): void
    {
        //
    }
}
