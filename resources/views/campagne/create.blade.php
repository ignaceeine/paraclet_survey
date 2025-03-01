@extends('layouts.master')
@section('title','Creation Campagne')
@section('content')
    <div class="d-flex justify-content-center align-items-center mt-5">
        <div class="card col-md-8 bg-white">
            <div class="card-header">
                <h3>Création de Campagne</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('campagne.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="nom_campagne" class="form-label">Nom de la campagne</label>
                        <input  type="text" class="form-control" id="nom_campagne" name="nom_campagne" placeholder="Entrez le nom de la campagne">
                    </div>
                    <div class="mb-3">
                        <label for="date_debut" class="form-label">Date de début</label>
                        <input type="date" class="form-control" id="date_debut" name="date_debut">
                    </div>
                    <div class="mb-3">
                        <label for="date_fin" class="form-label">Date de fin</label>
                        <input type="date" class="form-control" id="date_fin" name="date_fin">
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
