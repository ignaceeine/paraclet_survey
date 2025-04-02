<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use App\Models\Membre;
use App\Models\Question;
use App\Models\Reponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

        // Récupération des membres dont l'utilisateur a déja répondu aux questions
        $alreadyFeedbackedIds = Feedback::where('auteur_id', $currentUser->id)
            ->pluck('destinataire_id')
            ->toArray();

        // Filtre sur la liste des membres
        $membres = Membre::where('groupe_id', $currentUser->groupe_id)
            ->where('id', '!=', $currentUser->id)
            ->whereNotIn('id', $alreadyFeedbackedIds)
            ->get();

        return view('feedbacks.select_member', compact('membres'));
    }

    public function createForMember($membreId)
    {
        $membre = Membre::findOrFail($membreId);
        $questions = Question::all();
        return view('feedbacks.create', compact('questions', 'membre'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'question_id.*' => 'required|exists:questions,id',
            'destinataire_id' => 'required',
        ]);
        $questions = $request->question_id;

        $feedback = new Feedback();
        $feedback->auteur_id = Auth::user()->id;
        $feedback->destinataire_id = $data['destinataire_id'];
        $feedback->save();

        foreach($questions as $key => $q) {
            $reponse = new Reponse();
            $reponse->feedback_id = $feedback->id;
            $reponse->question_id = $q;
            $reponse->contenu = $request->{"additional_message_" . ($q)};
            $reponse->date = date("Y-m-d");
            $reponse->save();
        }

        return redirect()->route('feedback.create')->with('message', 'Vos réponses ont été enregistré avec succès');
    }

    public function received()
    {
        $user = auth()->user();
        
        // Récupérer les feedbacks où l'utilisateur est le destinataire
        $feedbacks = Feedback::where('destinataire_id', $user->id)->get();
        
        // Récupérer toutes les réponses associées à ces feedbacks
        $reponses = Reponse::whereIn('feedback_id', $feedbacks->pluck('id'))->get();
        
        $questions = Question::all();
        return view('membre.feedback_received', compact('reponses', 'questions'));
    }
}
