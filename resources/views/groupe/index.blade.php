@extends('layouts.master')
@section('title','Groupes')
@section('content')
<div class="container mt-5">
    @if(session('message'))
    <div class="alert alert-success border-0 bg-success mt-2 alert-dismissible fade show">
        <div class="text-white">{{ session('message') }}</div>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
        <a class="text-white" href="{{ route('admin.index') }}">
            <i class="bi bi-arrow-left" style="font-size: 28px"></i>
        </a>
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
                @if($groupes)
                    @foreach($groupes as $groupe)
                        <tr>
                            <td>{{ $groupe->nom_groupe }}</td>
                            <td>{{ $groupe->campagne->nom_campagne }}</td>
                            <td>
                                <a href="{{ route('groupe.edit',$groupe->id) }}"><i class="bi bi-pencil-square fs-5 text-warning"></i></a>
                                <a href="#"><i class="bi bi-trash3-fill fs-5 text-danger"></i></a>
                                <a type="button" href="{{ route('groupe.show',$groupe->id) }}" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="bi bi-eye fs-5 text-primary"></i></a>
                                <a href="{{ route('membre.create',$groupe->id) }}"><i class="bi bi-person-add fs-5 text-success"></i></a>
                            </td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
    </div>
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Liste des Membres du Groupe @isset($groupe->nom_groupe) {{$groupe->nom_groupe}} @endisset</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <table class="table caption-top">
                    <caption>Listes de Membres</caption>
                    <thead>
                    <tr>
                        <th scope="col">#CD</th>
                        <th scope="col">Nom</th>
                        <th scope="col">Prenom</th>
                        <th scope="col">Email</th>
                        <th scope="col">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        @if(isset($groupe))
                            @foreach($groupe->membres as $index => $membre)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{$membre->nom }}</td>
                                    <td>{{$membre->prenom }}</td>
                                    <td>{{$membre->email }}</td>
                                    <td>
                                        <a href="#"><i class="bi bi-pencil-square fs-5 text-warning"></i></a>
                                        <a href="#"><i class="bi bi-trash3-fill fs-5 text-danger"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
            </div>
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
