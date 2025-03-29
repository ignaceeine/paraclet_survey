@extends('layouts.master')
@section('title','Modification Campagne')
@section('content')
    <div class="container mt-5">
        <a class="text-white" href="{{ route('admin.campagne') }}">
            <i class="bi bi-arrow-left" style="font-size: 28px"></i>
        </a>
        <div class="d-flex justify-content-center align-items-center">
            <div class="card col-md-8 bg-white">
                <div class="card-header">
                    <h3>Modification de Campagne</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('campagne.update',$campagne->id) }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="nom_campagne" class="form-label">Nom de la campagne</label>
                            <input  type="text" class="form-control" id="nom_campagne" value="{{ $campagne->nom_campagne }}" name="nom_campagne" placeholder="Entrez le nom de la campagne">
                        </div>
                        <div class="mb-3">
                            <label for="date_debut" class="form-label">Date de début</label>
                            <input type="date" class="form-control" value="{{ $campagne->date_debut }}" id="date_debut" name="date_debut">
                        </div>
                        <div class="mb-3">
                            <label for="date_fin" class="form-label">Date de fin</label>
                            <input type="date" class="form-control" id="date_fin" value="{{ $campagne->date_fin }}" name="date_fin">
                        </div>
                        <button type="submit" class="btn btn-primary">Modifier</button>
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
