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
        $currentUser = auth()->user();
        $membres = Membre::where('groupe_id', $currentUser->groupe_id)
            ->where('id', '!=', $currentUser->id)
            ->get();
        return view('feedbacks.select_member', compact('membres'));
    }

    public function createForMember($membreId)
    {
        $membre = Membre::findOrFail($membreId);
        $questions = Question::all();
        return view('feedbacks.create', compact('questions', 'membre'));
    }
}
