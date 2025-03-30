@extends('layouts.master')
@section('title','Accueil')
@section('content')
    <div class="wrapper_centering">
        <div class="container_centering">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12 text-center">
                        <div class="main_title_1">
                            <h1 class="text-white" style="font-size: 3rem; font-weight: 700;">PARACLET, révélateur de champion !</h1>
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
