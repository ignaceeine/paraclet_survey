@extends('layouts.master')
@section('title','Questions')
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
        <div class="d-flex justify-content-end align-items-center mb-4">
            <a class="btn btn-primary" href="{{ route('question.create') }}">Créer Question</a>
        </div>

            <div class="mb-3">
                @foreach($questions as $quetion)
                    <div class="card mb-3">
                        <div class="card-body d-flex justify-content-between align-items-center">
                            <div class="col-10">
                                {{ $quetion->libelle }}
                            </div>
                           <div class="col-end-1">
                               <a href="{{ route('question.edit',$quetion->id) }}"><i class="bi bi-pencil-square fs-5 text-warning"></i></a>
                               <a href="{{ route('question.destroy', $quetion->id) }}" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette question ?');">
                                   <i class="bi bi-trash fs-5 text-danger"></i>
                               </a>
                           </div>
                        </div>
                    </div>
                @endforeach
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
