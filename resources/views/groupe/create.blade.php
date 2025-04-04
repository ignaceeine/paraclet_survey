@extends('layouts.master')
@section('title','Creation Groupe')
@section('content')
    <div class="container mt-5">
        <a class="text-white" href="{{ route('admin.campagne') }}">
            <i class="bi bi-arrow-left" style="font-size: 28px"></i>
        </a>
        <div class="d-flex justify-content-center align-items-center">
            <div class="card col-md-8 bg-light">
                <div class="card-header">
                    @if($campagne->groupe)
                        <h3>Ajout de membres dans {{ $campagne->nom_campagne }}</h3>
                    @else
                        <h3>Création de Groupe pour {{ $campagne->nom_campagne }}</h3>
                    @endif
                </div>
                <div class="card-body">
                    <form action="{{$campagne->groupe ? route('groupe.update') : route('groupe.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="number" name="campagne_id" value="{{$campagne->id}}" hidden>
                        @if($campagne->groupe)
                            <input type="number" name="groupe_id" value="{{$campagne->groupe->id}}" hidden>
                        @endif
                        <div class="mb-3">
                            <label for="nom_groupe" class="form-label">Nom du groupe</label>
                            <input type="text" class="form-control" id="nom_groupe" name="nom_groupe" placeholder="Entrez le nom du groupe" value="{{ $campagne->groupe->nom_groupe ?? '' }}" @if($campagne->groupe)readonly @endif>
                        </div>
                        <div class="mb-3">
                            <label for="membres" class="form-label">Charger les membres</label>
                            <input type="file" class="form-control" id="membres" name="membres">
                        </div>

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <button type="submit" class="btn btn-primary">
                            {{ $campagne->groupe ? 'Ajouter' : 'Enregistrer' }}
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
