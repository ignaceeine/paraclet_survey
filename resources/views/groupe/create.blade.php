@extends('layouts.master')
@section('title','Creation Groupe')
@section('content')
    <div class="d-flex justify-content-center align-items-center mt-5">
        <div class="card col-md-8 bg-light">
            <div class="card-header">
                <h3>Création de Groupe pour {{ $campagne->nom_campagne }}</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('groupe.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="number" name="campagne_id" value="{{$campagne->id}}" hidden>
                    <div class="mb-3">
                        <label for="nom_groupe" class="form-label">Nom du groupe</label>
                        <input type="text" class="form-control" id="nom_groupe" name="nom_groupe" placeholder="Entrez le nom du groupe">
                    </div>
                    <div class="mb-3">
                        <label for="membres" class="form-label">Charger les membres</label>
                        <input type="file" class="form-control" id="membres" name="membres">
                    </div>
                    <button type="submit" class="btn btn-primary">Enregistrer</button>
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
