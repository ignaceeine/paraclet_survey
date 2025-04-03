@extends('layouts.master')
@section('title','Admin')
@section('content')
    <div class="container mt-5">
        <h1 class="text-center mb-5 text-white">Dashboard Administration</h1>
        <div class="row">
            <!-- Section Questions -->
            <div class="col-md-6 col-lg-3 mb-4">
                <a href="{{ route('admin.question') }}" class="text-decoration-none">
                    <div class="card text-center h-100" style="background-color: #000a46">
                        <div class="card-body d-flex flex-column justify-content-center mb-5 mt-5">
                            <h3 class="card-title text-white"><strong>Questions</strong></h3>
                        </div>
                    </div>
                </a>
            </div>
            <!-- Section Campagnes -->
            <div class="col-md-6 col-lg-3 mb-4">
                <a href="{{ route('admin.campagne') }}" class="text-decoration-none">
                    <div class="card text-center h-100" style="background-color: #000a46">
                        <div class="card-body d-flex flex-column justify-content-center mb-5 mt-5">
                            <h3 class="card-title text-white"><strong>Campagnes</strong></h3>
                        </div>
                    </div>
                </a>
            </div>
            <!-- Section Groupes -->
            <div class="col-md-6 col-lg-3 mb-4">
                <a href="{{ route('admin.groupe') }}" class="text-decoration-none">
                    <div class="card text-center h-100" style="background-color: #000a46">
                        <div class="card-body d-flex flex-column justify-content-center mb-5 mt-5">
                            <h3 class="card-title text-white"><strong>Groupes</strong></h3>
                        </div>
                    </div>
                </a>
            </div>
            <!-- Section Réponses -->
            <div class="col-md-6 col-lg-3 mb-4">
                <a href="{{ route('admin.feedback') }}" class="text-decoration-none">
                    <div class="card text-center h-100" style="background-color: #000a46">
                        <div class="card-body d-flex flex-column justify-content-center mb-5 mt-5">
                            <h3 class="card-title text-white"><strong>Feedbacks</strong></h3>
                        </div>
                    </div>
                </a>
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
