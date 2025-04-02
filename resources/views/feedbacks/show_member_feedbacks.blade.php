@extends('layouts.master')
@section('title', 'Feedbacks reçus')
@section('content')
    <div class="container mt-5 mb-5">
        <a class="text-white" href="{{ route('admin.feedback') }}">
            <i class="bi bi-arrow-left" style="font-size: 28px"></i>
        </a>

        <div class="card mt-4" style="background-color: #000a46">
            <div class="card-header text-center">
                <h3 class="card-title text-white">Feedbacks reçus par {{ $membre->prenom }} {{ $membre->nom }}</h3>
            </div>
            <div class="card-body">
                @if($feedbacks->isEmpty())
                    <div class="text-center text-white">
                        <p>Aucun feedback reçu pour le moment.</p>
                    </div>
                @else
                    @foreach($feedbacks as $feedback)
                        <div class="card mb-4" style="background-color: rgba(255, 255, 255, 0.1)">
                            <div class="card-header">
                                <h5 class="mb-0 text-white">Feedback de {{ $feedback->auteur->prenom }} {{ $feedback->auteur->nom }}</h5>
                            </div>
                            <div class="card-body">
                                @foreach($feedback->reponses as $reponse)
                                    <div class="mb-3">
                                        <h6 class="text-white">{{ $reponse->question->contenu }}</h6>
                                        <p class="text-white-50">{{ $reponse->contenu }}</p>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="{{ URL::asset('js/jquery-3.7.1.min.js') }}"></script>
    <script src="{{ URL::asset('js/common_scripts.min.js') }}"></script>
    <script src="{{ URL::asset('js/functions.js') }}"></script>
    <script src="{{ URL::asset('js/survey_func.js') }}"></script>
@endsection
