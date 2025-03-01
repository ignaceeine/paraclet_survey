@extends('layouts.master')
@section('title','Groupes')
@section('content')
    <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="text-white mb-0">Liste des Groupes</h1>
        </div>
        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead class="table-primary">
                <tr>
                    <th scope="col" class="col-md-5">Nom du groupe</th>
                    <th scope="col" class="col-md-5">Nom de la campagne</th>
                    <th scope="col" class="col-md-2">Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($groupes as $groupe)
                    <tr>
                        <td>{{ $groupe->nom_groupe }}</td>
                        <td>{{ $groupe->campagne->nom_campagne }}</td>
                        <td>
                            <a href="#"><i class="bi bi-pencil-square fs-5 text-warning"></i></a>
                            <a href="#"><i class="bi bi-trash3-fill fs-5 text-danger"></i></a>
                            <a href="#"><i class="bi bi-eye fs-5 text-primary"></i></a>
                            <a href="#"><i class="bi bi-person-add fs-5 text-success"></i></a>
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
@endsection
