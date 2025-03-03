@extends('layouts.master')
@section('title','Campagnes')
@section('content')
    <div class="container mt-5">
        @if(session('message'))
            <div class="alert alert-success border-0 bg-success mt-2 alert-dismissible fade show">
                <div class="text-white">{{ session('message') }}</div>
                <button type="button" class="btn-close text-light" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="text-white mb-0">Liste des Campagnes</h1>
            <a class="btn btn-primary" href="{{ route('campagne.create') }}">Créer Campagne</a>
        </div>
        <div class="table-responsive">
            <table class="table table-striped table-hover table-bordered">
                <thead class="table-secondary">
                <tr>
                    <th scope="col" class="col-md-4">Nom</th>
                    <th scope="col" class="col-md-3">Date de début</th>
                    <th scope="col" class="col-md-3">Date de fin</th>
                    <th scope="col" class="col-md-1">Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($campagnes as $campagne)
                    <tr>
                        <td>{{ $campagne->nom_campagne }}</td>
                        <td>{{ $campagne->date_debut }}</td>
                        <td>{{ $campagne->date_fin }}</td>
                        <td>
                            <a href="#"><i class="bi bi-pencil-square fs-5 text-warning"></i></a>
                            <form action="{{ route('campagne.destroy') }}" method="POST"
                                  style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <input type="number" name="campagne_id" value="{{ $campagne->id }}" hidden>
                                <button type="submit" style="background-color: transparent" class="border-0" onclick="return confirm('Confirmez-vous la suppression de cette campagne ?');">
                                    <i class="bi bi-trash3-fill fs-5 text-danger"></i>
                                </button>
                            </form>
                            <a href="{{ route('groupe.create',$campagne->id) }}"><i class="bi bi-people-fill fs-5 text-success"></i></a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="{{ URL::asset('build/js/jquery-3.7.1.min.js') }}"></script>
    <script src="{{ URL::asset('build/js/common_scripts.min.js') }}"></script>
    <script src="{{ URL::asset('build/js/functions.js') }}"></script>
    <script src="{{ URL::asset('build/js/survey_func.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
@endsection
