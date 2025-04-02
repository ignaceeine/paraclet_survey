@extends('layouts.master')
@section('title','Membre')
@section('content')
    <div class="container mt-5">
        <h1 class="text-center mb-5 text-white">Dashboard Membre</h1>
        <div class="row">
            <!-- Section Donner des feedbacks -->
            <div class="col-md-4 mb-4">
                <a href="{{ route('feedback.create') }}" class="text-decoration-none">
                    <div class="card text-center h-100" style="background-color: #000a46">
                        <div class="card-body d-flex flex-column justify-content-center mb-5 mt-5">
                            <h3 class="card-title text-white"><strong>Donner des feedbacks</strong></h3>
                        </div>
                    </div>
                </a>
            </div>
            <!-- Section Feedback reçus -->
            <div class="col-md-4 mb-4">
                <a href="{{ route('membre.feedback.received') }}" class="text-decoration-none">
                    <div class="card text-center h-100" style="background-color: #000a46">
                        <div class="card-body d-flex flex-column justify-content-center mb-5 mt-5">
                            <h3 class="card-title text-white"><strong>Feedbacks reçus</strong></h3>
                        </div>
                    </div>
                </a>
            </div>
            <!-- Section Rapport -->
            <div class="col-md-4 mb-4">
                <a href="" class="text-decoration-none">
                    <div class="card text-center h-100" style="background-color: #000a46">
                        <div class="card-body d-flex flex-column justify-content-center mb-5 mt-5">
                            <h3 class="card-title text-white"><strong>Rapport</strong></h3>
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
