<?php

namespace App\Http\Controllers;

use App\Models\Membre;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    public function index()
    {
        $membres = Membre::select('id','nom','prenom','email','groupe_id')->where('role','membre')->get();
        return view('feedbacks.index',compact('membres'));
    }
}
