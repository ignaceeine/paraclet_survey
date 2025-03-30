@extends('layouts.master')
@section('title','Modification du Groupe')
@section('content')
    <div class="container mt-5">
        <a class="text-white" href="{{ route('admin.groupe') }}">
            <i class="bi bi-arrow-left" style="font-size: 28px"></i>
        </a>
        <div class="d-flex justify-content-center align-items-center">
            <div class="card col-md-8 bg-light">
                <div class="card-header">
                    <h3>Modification de groupe</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('groupe.updatename',$groupe->id) }}" method="POST">
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
    </div>
@endsection
@section('scripts')
    <script src="{{ URL::asset('js/jquery-3.7.1.min.js') }}"></script>
    <script src="{{ URL::asset('js/common_scripts.min.js') }}"></script>
    <script src="{{ URL::asset('js/functions.js') }}"></script>
    <script src="{{ URL::asset('js/survey_func.js') }}"></script>
@endsection
