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
        <input type="text" id="searchInput" placeholder="Rechercher..." class="form-control mb-3">
        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead class="table-primary">
                <tr>
                    <th scope="col" class="col-md-2">Prénom</th>
                    <th scope="col" class="col-md-2">Nom</th>
                    <th scope="col" class="col-md-4">Email</th>
                    <th scope="col" class="col-md-3">Groupe</th>
                    <th scope="col" class="col-md-1">Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($membres as $m)
                <tr>
                    <td>{{ $m->prenom }}</td>
                    <td>{{ $m->nom }}</td>
                    <td>{{ $m->email }}</td>
                    <td>{{ $m->groupe->nom_groupe }}</td>
                    <td class="text-center">
                        <a href="#"><i class="bi bi-eye fs-5 text-primary"></i></a>
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
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const searchInput = document.getElementById('searchInput');
            const table = document.querySelector('table');
            const rows = table.querySelectorAll('tbody tr');

            searchInput.addEventListener('input', function() {
                const searchTerm = searchInput.value.toLowerCase();

                rows.forEach(row => {
                    const cells = row.querySelectorAll('td');
                    let found = false;

                    cells.forEach(cell => {
                        if (cell.textContent.toLowerCase().includes(searchTerm)) {
                            found = true;
                        }
                    });

                    if (found) {
                        row.style.display = '';
                    } else {
                        row.style.display = 'none';
                    }
                });
            });
        });
    </script>
@endsection
