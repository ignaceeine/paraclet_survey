@extends('layouts.master')
@section('title', 'Connexion')

@section('content')
    <div class="container mt-5 mb-5">
        @if($errors->has('login'))
            <ul>
                @foreach($errors->get('login') as $message)
                    <div class="alert alert-danger">{{ $message }}</div>
                @endforeach
            </ul>
        @endif

        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow-lg rounded">
                    <div class="card-body p-5">
                        <h2 class="text-center mb-4" style="color: #001659; font-family: 'Roboto', sans-serif; font-weight: 700;">CONNEXION</h2>

                        <!-- Session Status -->
                        <x-auth-session-status class="mb-4" :status="session('status')" />

                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <!-- Login -->
                            <div class="mb-3">
                                <label for="login" class="form-label" style="font-family: 'Roboto', sans-serif; font-weight: 500;">Nom d'utilisateur ou Email</label>
                                <input type="text" class="form-control @error('login') is-invalid @enderror"
                                       id="login" name="login" value="{{ old('login') }}" required autofocus>
                                @error('login')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Password -->
                            <div class="mb-3">
                                <label for="password" class="form-label" style="font-family: 'Roboto', sans-serif; font-weight: 500;">Mot de passe</label>
                                <input type="password" class="form-control @error('password') is-invalid @enderror"
                                       id="password" name="password" required>
                                @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Remember Me -->
                            <div class="mb-3 d-flex flex-column flex-sm-row justify-content-between align-items-start align-items-sm-center">
                                <div class="form-check mb-2 mb-sm-0">
                                    <input type="checkbox" class="form-check-input" id="remember_me" name="remember">
                                    <label class="form-check-label" for="remember_me" style="font-family: 'Roboto', sans-serif; font-weight: 400;">Se souvenir de moi</label>
                                </div>

                                @if (Route::has('password.request'))
                                    <a href="{{ route('password.request') }}" class="text-decoration-none" style="color: #007bff; font-family: 'Roboto', sans-serif; font-weight: 400;">
                                        Mot de passe oublié ?
                                    </a>
                                @endif
                            </div>

                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary" style="background-color: #007bff; border-color: #007bff; font-family: 'Roboto', sans-serif; font-weight: 500;">
                                    Se connecter
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
