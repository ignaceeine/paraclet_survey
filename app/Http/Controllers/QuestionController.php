<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function index()
    {
        $questions = Question::all();
        return view('question.index',compact('questions'));
    }

    public function create()
    {
        return view('question.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate(['libelle' => 'required|string']);

        $question = new Question();
        $question->libelle = $data['libelle'];
        $question->save();
        return redirect()->route('question.create');
    }
}
