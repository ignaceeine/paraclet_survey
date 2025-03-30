@extends('layouts.master')
@section('title','Accueil')
@section('content')
    @if(session('error'))
        <div class="alert alert-warning border-0 bg-warning mt-2 alert-dismissible fade show w-25">
            <div class="text-white"><h5><i class="bi bi-exclamation-octagon"></i> {{ session('error') }}</h5></div>
            <button type="button" class="btn-close text-white" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
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
