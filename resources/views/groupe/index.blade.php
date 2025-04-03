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
            <thead class="table-secondary">
                <tr>
                    <th scope="col" class="col-md-5">Nom du groupe</th>
                    <th scope="col" class="col-md-5">Nom de la campagne</th>
                    <th scope="col" class="col-md-2">Actions</th>
                </tr>
            </thead>
            <tbody>
                @if($groupes)
                    @foreach($groupes as $g)
                        <tr>
                            <td>{{ $g->nom_groupe }}</td>
                            <td>{{ $g->campagne->nom_campagne }}</td>
                            <td>
                                <a href="{{ route('groupe.edit',$g->id) }}"><i class="bi bi-pencil-square fs-5 text-warning"></i></a>
                                <form action="{{ route('groupe.destroy',$g->id) }}" method="POST"
                                      style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <input type="number" name="id" value="{{ $g->id }}" hidden>
                                    <button type="submit" style="background-color: transparent" class="border-0" onclick="return confirm('Confirmez-vous la suppression de ce groupe ?');">
                                        <i class="bi bi-trash3-fill fs-5 text-danger"></i>
                                    </button>
                                </form>
                                <a href="{{ route('groupe.show',$g->id) }}" class="voir-groupe" data-id="{{ $g->id }}" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="bi bi-eye fs-5 text-primary"></i></a>
                                <a href="{{ route('membre.create',$g->id) }}"><i class="bi bi-person-add fs-5 text-success"></i></a>
                            </td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
    </div>
</div>
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Liste des Membres du Groupe @isset($groupe->nom_groupe) {{$groupe->nom_groupe}} @endisset</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="table-responsive">
                    <table class="table table-striped caption-top">
                        <thead>
                        <tr>
                            <th scope="col">Nom</th>
                            <th scope="col">Prénom</th>
                            <th scope="col">Email</th>
                            <th scope="col">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if(isset($groupe))
                            @foreach($groupe->membres as $index => $membre)
                                <tr>
                                    <td>{{$membre->nom }}</td>
                                    <td>{{$membre->prenom }}</td>
                                    <td>{{$membre->email }}</td>
                                    <td>
                                        <form action="{{ route('membre.destroy',$membre->id) }}" method="POST"
                                              style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <input type="number" name="id" value="{{ $membre->id }}" hidden>
                                            <button type="submit" style="background-color: transparent" class="border-0" onclick="return confirm('Confirmez-vous la suppression de ce membre ?');">
                                                <i class="bi bi-trash3-fill fs-5 text-danger"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
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
<script>
    $(document).ready(function () {
        $('.voir-groupe').on('click', function () {
            let groupeId = $(this).data('id'); // Récupérer l'ID du groupe
            let modal = $('#exampleModal');

            $.ajax({
                url: '/admin/groupes/show/' + groupeId, // Appelle la route show du contrôleur
                type: 'GET',
                success: function (response) {
                    // Mettre à jour le titre du modal
                    modal.find('.modal-title').text('Liste des Membres du Groupe ' + response.groupe.nom_groupe);

                    // Mettre à jour le tableau avec les membres
                    let tbody = modal.find('tbody');
                    tbody.empty(); // On vide le tableau avant d’ajouter les nouvelles lignes

                    response.membres.forEach(function (membre) {
                        tbody.append(`
                            <tr>
                                <td>${membre.nom}</td>
                                <td>${membre.prenom}</td>
                                <td>${membre.email}</td>
                                <td>
                                    <form action="groupes/membre/delete/${membre.id}" method="POST" style="display:inline;">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="id" value="${membre.id}">
                                        <button type="submit" style="background-color: transparent" class="border-0" onclick="return confirm('Confirmez-vous la suppression de ce membre ?');">
                                            <i class="bi bi-trash3-fill fs-5 text-danger"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        `);
                    });
                }
            });
        });
    });
</script>
@endsection
