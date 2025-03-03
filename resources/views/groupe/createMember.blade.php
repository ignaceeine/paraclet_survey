@extends('layouts.master')
@section('title',"Ajout d'un membre")
@section('content')
    <div class="d-flex justify-content-center align-items-center mt-5">
        <div class="card col-md-8 bg-light">
            <div class="card-header">
                <h3>Ajout d'un membre dans {{ $groupe->nom_groupe }}</h3>
            </div>
            <div class="card-body">
                <form action="{{route('membre.store')}}" method="POST">
                    @csrf
                    <input type="number" name="groupe_id" value="{{$groupe->id}}" hidden>
                    <div class="mb-3">
                        <label for="nom_groupe" class="form-label">Nom du groupe</label>
                        <input type="text" class="form-control" id="nom_groupe" name="nom_groupe" placeholder="Entrez le nom du groupe" value="{{ $groupe->nom_groupe ?? '' }}" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="prenom" class="form-label">Prénom</label>
                        <input type="text" class="form-control" id="prenom" name="prenom">
                    </div>
                    <div class="mb-3">
                        <label for="nom" class="form-label">Nom</label>
                        <input type="text" class="form-control" id="nom" name="nom">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Adresse Email</label>
                        <input type="email" class="form-control" id="email" name="email">
                    </div>

                    <button type="submit" class="btn btn-primary">Ajouter</button>
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
