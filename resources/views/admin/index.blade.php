@extends('layouts.master')
@section('title','Admin Dashboard')
@section('content')
    <div class="container mt-5">
        <h1 class="text-center mb-5 text-white">Dashboard Administrateur</h1>
        <div class="row">
            <!-- Section Questions -->
            <div class="col-md-6 col-lg-3 mb-4">
                <a href="#" class="text-decoration-none">
                    <div class="card text-center h-100">
                        <div class="card-body d-flex flex-column justify-content-center mb-5 mt-5">
                            <h5 class="card-title">Questions</h5>
                            <button class="btn btn-outline-secondary mt-3">Accéder</button>
                        </div>
                    </div>
                </a>
            </div>
            <!-- Section Campagnes -->
            <div class="col-md-6 col-lg-3 mb-4">
                <a href="{{ route('admin.campagne') }}" class="text-decoration-none">
                    <div class="card text-center h-100">
                        <div class="card-body d-flex flex-column justify-content-center mb-5 mt-5">
                            <h5 class="card-title">Campagnes</h5>
                            <button class="btn btn-outline-secondary mt-3">Accéder</button>
                        </div>
                    </div>
                </a>
            </div>
            <!-- Section Groupes -->
            <div class="col-md-6 col-lg-3 mb-4">
                <a href="{{ route('admin.groupe') }}" class="text-decoration-none">
                    <div class="card text-center h-100">
                        <div class="card-body d-flex flex-column justify-content-center mb-5 mt-5">
                            <h5 class="card-title">Groupes</h5>
                            <button class="btn btn-outline-secondary mt-3">Accéder</button>
                        </div>
                    </div>
                </a>
            </div>
            <!-- Section Réponses -->
            <div class="col-md-6 col-lg-3 mb-4">
                <a href="#" class="text-decoration-none">
                    <div class="card text-center h-100">
                        <div class="card-body d-flex flex-column justify-content-center mb-5 mt-5">
                            <h5 class="card-title">Feedbacks</h5>
                            <button class="btn btn-outline-secondary mt-3">Accéder</button>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="{{ URL::asset('build/js/jquery-3.7.1.min.js') }}"></script>
    <script src="{{ URL::asset('build/js/common_scripts.min.js') }}"></script>
    <script src="{{ URL::asset('build/js/functions.js') }}"></script>
    <script src="{{ URL::asset('build/js/survey_func.js') }}"></script>
@endsection
