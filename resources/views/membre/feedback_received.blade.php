@extends('layouts.master')
@section('title', 'Feedbacks reçus')
@section('content')
    <div class="container mt-5 mb-5">
        <a class="text-white" href="{{ route('membre.index') }}">
            <i class="bi bi-arrow-left" style="font-size: 28px"></i>
        </a>
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card" style="background-color: #000a46">
                    <div class="card-header text-center">
                        <h3 class="text-white mb-0">Feedbacks reçus</h3>
                    </div>
                    <div class="card-body">
                        @if($reponses->isEmpty())
                            <div class="text-center text-white">
                                <h4>Vous n'avez pas encore reçu de feedbacks</h4>
                                <p class="mt-3">Les feedbacks apparaîtront ici une fois que vos collègues vous auront évalué</p>
                            </div>
                        @else
                            @foreach($questions as $question)
                                <div class="mb-3">
                                    <h4 class="text-white mb-4">{{ $question->libelle }}</h4>
                                    <div class="row">
                                        @foreach($reponses->where('question_id', $question->id) as $reponse)
                                            <div class="col-md-6 mb-4">
                                                <div class="card h-100" style="background-color: rgba(255, 255, 255, 0.1)">
                                                    <div class="card-body">
                                                        <p class="card-text text-white">{{ $reponse->contenu }}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
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
