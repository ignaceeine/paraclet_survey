@extends('layouts.master')
@section('title', 'Feedbacks')
@section('content')
    <div class="container mt-5">
        @if(session('message'))
            <div class="alert alert-success border-0 bg-success mt-2 alert-dismissible fade show">
                <div class="text-white">{{ session('message') }}</div>
                <button type="button" class="btn-close text-light" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <a class="text-white" href="{{ route('admin.index') }}">
            <i class="bi bi-arrow-left" style="font-size: 28px"></i>
        </a>

        <div class="row mb-3">
            <div class="col-md-9">
                <input type="text" id="searchInput" placeholder="Rechercher..." class="form-control">
            </div>
            <div class="col-md-3">
                <select id="groupeSelect" class="form-control bg-dark-subtle">
                    <option value="">Tous les groupes</option>
                    @foreach($groupes as $groupe)
                        <option value="{{ $groupe->id }}">{{ $groupe->nom_groupe }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead class="table-secondary">
                    <tr>
                        <th scope="col" class="col-md-4">Prénom(s)</th>
                        <th scope="col" class="col-md-2">Nom</th>
                        <th scope="col" class="col-md-5">Email</th>
                        <th scope="col" class="col-md-1">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($membres as $m)
                        <tr data-groupe="{{ $m->groupe_id }}">
                            <td>{{ $m->prenom }}</td>
                            <td>{{ $m->nom }}</td>
                            <td>{{ $m->email }}</td>
                            <td class="text-center">
                                <a href="#" class="text-primary-emphasis edit-btn" data-id="{{ $m->id }}" data-prenom="{{ $m->prenom }}" data-nom="{{ $m->nom }}" ><i class="bi bi-pencil-fill"></i></a>
                                <a href="{{ route('feedback.show_member', $m->id) }}" class="text-primary-emphasis"><i class="bi bi-eye-fill"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
<!-- Modal de modification -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Modifier le membre</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="editForm" method="POST" action="{{ route('membre.feedback.update', ':id') }}">
                        @csrf
                        @method('PUT')
                        <input type="hidden" id="editId" name="id">

                        <div class="mb-3">
                            <label for="editPrenom" class="form-label">Prénom(s)</label>
                            <input type="text" class="form-control" id="editPrenom" name="prenom" required>
                        </div>
                        <div class="mb-3">
                            <label for="editNom" class="form-label">Nom</label>
                            <input type="text" class="form-control" id="editNom" name="nom" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Enregistrer</button>
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
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const searchInput = document.getElementById('searchInput');
            const groupeSelect = document.getElementById('groupeSelect');
            const table = document.querySelector('table');
            const rows = table.querySelectorAll('tbody tr');

            function filterRows() {
                const searchTerm = searchInput.value.toLowerCase();
                const selectedGroupe = groupeSelect.value;

                rows.forEach(row => {
                    const cells = row.querySelectorAll('td');
                    const groupeId = row.getAttribute('data-groupe');
                    let matchesSearch = false;
                    let matchesGroupe = !selectedGroupe || groupeId === selectedGroupe;

                    cells.forEach(cell => {
                        if (cell.textContent.toLowerCase().includes(searchTerm)) {
                            matchesSearch = true;
                        }
                    });

                    row.style.display = (matchesSearch && matchesGroupe) ? '' : 'none';
                });
            }

            searchInput.addEventListener('input', filterRows);
            groupeSelect.addEventListener('change', filterRows);
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const editModal = new bootstrap.Modal(document.getElementById('editModal'));
            const editForm = document.getElementById('editForm');

            // Lorsqu'on clique sur l'icône d'édition
            document.querySelectorAll('.edit-btn').forEach(button => {
                button.addEventListener('click', function () {
                    const id = this.dataset.id;
                    const prenom = this.dataset.prenom;
                    const nom = this.dataset.nom;

                    // Remplir le formulaire
                    document.getElementById('editId').value = id;
                    document.getElementById('editPrenom').value = prenom;
                    document.getElementById('editNom').value = nom;

                    // Modifier dynamiquement l'action du formulaire
                    const formAction = "{{ route('membre.feedback.update', ':id') }}".replace(':id', id);
                    editForm.setAttribute('action', formAction);

                    // Afficher le modal
                    editModal.show();
                });
            });
        });
    </script>
@endsection
