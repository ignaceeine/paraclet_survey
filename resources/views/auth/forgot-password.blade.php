@extends('layouts.master')
@section('title', 'Mot de passe oublié')

@section('content')
    <div class="container mt-5 mb-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow-lg rounded">
                    <div class="card-body p-5">
                        <h2 class="text-center mb-4" style="font-family: 'Roboto', sans-serif; font-weight: 700; color: #001659;">Mot de passe oublié ?</h2>

                        <div class="text-center mb-4">
                            <p class="text-muted" style="font-family: 'Roboto', sans-serif; font-weight: 200;">
                                {{ __('Pas de problème. Indiquez-nous simplement votre adresse e-mail et nous vous enverrons un lien de réinitialisation qui vous permettra d\'en choisir un nouveau.') }}
                            </p>
                        </div>

                        <!-- Session Status -->
                        <x-auth-session-status class="mb-4" :status="session('status')" />

                        <form method="POST" action="{{ route('password.email') }}">
                            @csrf

                            <!-- Email Address -->
                            <div class="mb-3">
                                <label for="email" class="form-label" style="font-family: 'Roboto', sans-serif; font-weight: 500;">Email</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror"
                                       id="email" name="email" value="{{ old('email') }}" required autofocus>
                                @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary w-50" style="background-color: #007bff; border-color: #007bff; font-family: 'Roboto', sans-serif; font-weight: 500;">
                                    {{ __('Obtenir le lien') }}
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ URL::asset('js/jquery-3.7.1.min.js') }}"></script>
    <script src="{{ URL::asset('js/common_scripts.min.js') }}"></script>
    <script src="{{ URL::asset('js/functions.js') }}"></script>
@endsection
