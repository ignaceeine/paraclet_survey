@extends('layouts.master')
@section('title', 'Sélectionner un membre')
@section('content')
    <div class="container mt-5 mb-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card" style="background-color: #000a46">
                    <div class="card-header text-center">
                        <h3 class="text-white mb-0">Sélectionner un membre</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            @foreach($membres as $membre)
                                <div class="col-md-6 mb-4">
                                    <a href="{{ route('feedback.create_for_member', $membre->id) }}" class="text-decoration-none">
                                        <div class="card h-100" style="background-color: rgba(255, 255, 255, 0.1)">
                                            <div class="card-body text-center">
                                                <h5 class="card-title text-white">{{ $membre->prenom }} {{ $membre->nom }}</h5>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            @endforeach
                        </div>
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
