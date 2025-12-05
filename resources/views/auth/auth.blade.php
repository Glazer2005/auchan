@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">

            <div class="card shadow-sm rounded-4 border-0">
                <div class="card-header bg-danger text-white text-center fw-bold fs-5 rounded-top-4">
                    Bienvenue sur Auchan Clone
                </div>

                <div class="card-body p-4">

                    <!-- Onglets -->
                    <ul class="nav nav-tabs mb-4 justify-content-center" id="authTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active fw-semibold" id="login-tab" data-bs-toggle="tab" data-bs-target="#login-pane" type="button" role="tab" aria-controls="login-pane" aria-selected="true">
                                Connexion
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link fw-semibold" id="register-tab" data-bs-toggle="tab" data-bs-target="#register-pane" type="button" role="tab" aria-controls="register-pane" aria-selected="false">
                                Inscription
                            </button>
                        </li>
                    </ul>

                    <div class="tab-content" id="authTabContent">

                        <!-- Connexion -->
                        <div class="tab-pane fade show active" id="login-pane" role="tabpanel" aria-labelledby="login-tab">
                            <form method="POST" action="{{ route('login') }}">
                                @csrf
                                <div class="mb-3">
                                    <label class="fw-bold">Email</label>
                                    <input type="email" name="email" class="form-control shadow-sm" required>
                                </div>
                                <div class="mb-3">
                                    <label class="fw-bold">Mot de passe</label>
                                    <input type="password" name="password" class="form-control shadow-sm" required>
                                </div>
                                <button type="submit" class="btn btn-danger w-100 shadow-sm">
                                    Connexion
                                </button>
                            </form>
                        </div>

                        <!-- Inscription -->
                        <div class="tab-pane fade" id="register-pane" role="tabpanel" aria-labelledby="register-tab">
                            <form method="POST" action="{{ route('register') }}">
                                @csrf
                                <div class="mb-3">
                                    <label class="fw-bold">Nom</label>
                                    <input type="text" name="name" class="form-control shadow-sm" required>
                                </div>
                                <div class="mb-3">
                                    <label class="fw-bold">Email</label>
                                    <input type="email" name="email" class="form-control shadow-sm" required>
                                </div>
                                <div class="mb-3">
                                    <label class="fw-bold">Mot de passe</label>
                                    <input type="password" name="password" class="form-control shadow-sm" required>
                                </div>
                                <div class="mb-3">
                                    <label class="fw-bold">Confirmer le mot de passe</label>
                                    <input type="password" name="password_confirmation" class="form-control shadow-sm" required>
                                </div>
                                <button type="submit" class="btn btn-success w-100 shadow-sm">
                                    S’inscrire
                                </button>
                            </form>
                        </div>

                    </div>
                </div>

            </div>

        </div>
    </div>
</div>
@endsection
