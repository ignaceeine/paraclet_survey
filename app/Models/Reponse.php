<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reponse extends Model
{
    protected $fillable = [
        'feedback_id',
        'question_id',
        'contenu',
        'date'
    ];

    public function feedback()
    {
        return $this->belongsTo(Feedback::class);
    }

    public function question()
    {
        return $this->belongsTo(Question::class);
    }
}
