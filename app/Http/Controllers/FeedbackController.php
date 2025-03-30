<?php

namespace App\Http\Controllers;

use App\Models\Membre;
use App\Models\Question;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    public function index()
    {
        $membres = Membre::select('id','nom','prenom','email','groupe_id')->where('role','membre')->get();
        return view('feedbacks.index',compact('membres'));
    }

    public function create()
    {
        $questions = Question::all();
        return view('feedbacks.create',compact('questions'));
    }
}
