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
        return redirect()->route('question.create')->with('message', "enregistrer avec success");
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
        $question->libelle = $data['libelle'];
        $question->save();
        return redirect()->route('admin.question', $id)->with('message', "modification avec success");
    }
    public function destroy($id)
    {
        $question = Question::find($id);
        $question->delete();
        return redirect()->route('admin.question');
    }

}
