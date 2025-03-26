@extends('layouts.master')
@section('title','Modification Question')
@section('content')
    <div class="d-flex justify-content-center align-items-center mt-5">
        <div class="card col-md-8 bg-white">
            <div class="card-header">
                <a class="text-black-50" href="{{ route('admin.question') }}"><i class="bi bi-arrow-left"></i></a>
                <h3>Modification de la question</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('question.update',$question->id) }}" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="libelle" class="form-label">Question</label>
                        <input  type="text" class="form-control" id="libelle" value="{{ $question->libelle }}}" name="libelle" style="height:100px">
                    </div>
                    <button type="submit" class="btn btn-primary">Modifier</button>
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
