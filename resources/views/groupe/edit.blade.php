@extends('layouts.master')
@section('title','Modification du Groupe')
@section('content')
    <div class="d-flex justify-content-center align-items-center mt-5">
        <div class="card col-md-8 bg-light">
            <div class="card-header">

            </div>
            <div class="card-body">
                <form action="{{route('groupe.update-name',$groupe->id) }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="nom_groupe" class="form-label">Nom du groupe</label>
                        <input type="text" class="form-control" id="nom_groupe" name="nom_groupe" value="{{ $groupe->nom_groupe }}">
                    </div>
                    <button type="submit" class="btn btn-primary">
                        Modifier
                    </button>
                </form>
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
