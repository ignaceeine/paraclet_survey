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

        Question::create($data);
        return redirect()->route('admin.question')->with('message', "Question créée avec succès");
    }

    public function edit($id)
    {
        $question = Question::find($id);
        return view('question.edit', compact('question'));
    }
    public function update($id, Request $request)
    {
        $data = $request->validate(['libelle' => 'required|string']);

        $question = Question::find($id);
        $question->update($data);
        return redirect()->route('admin.question', $id)->with('message', "Question modifiée avec succès");
    }
    public function destroy($id)
    {
        $question = Question::find($id);
        Question::destroy($question->id);
        return redirect()->route('admin.question')->with('message', 'Question supprimée avec succès');
    }

}
