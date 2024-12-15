@extends('partials.master')

@section('content')
@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<div class="card card-bordered">
    <div class="card-inner">
        <div class="card-head">
            <h5 class="card-title">User Information Form</h5>
        </div>
        <form action="{{ route('users.store') }}" method="POST">
            @csrf
            <div class="row g-4">
                <!-- Prénom -->
                <div class="col-lg-6">
                    <div class="form-group">
                        <label class="form-label" for="firstname">Prénom</label>
                        <div class="form-control-wrap">
                            <input type="text" class="form-control" id="firstname" name="user[0][firstname]" placeholder="Ex : Jean" value="{{ old('user.0.firstname') }}">
                        </div>
                    </div>
                </div>

                <!-- Nom -->
                <div class="col-lg-6">
                    <div class="form-group">
                        <label class="form-label" for="lastname">Nom</label>
                        <div class="form-control-wrap">
                            <input type="text" class="form-control" id="lastname" name="user[0][lastname]" placeholder="Ex : Dupont" value="{{ old('user.0.lastname') }}">
                        </div>
                    </div>
                </div>

                <!-- Email -->
                <div class="col-lg-6">
                    <div class="form-group">
                        <label class="form-label" for="email">Email</label>
                        <div class="form-control-wrap">
                            <input type="email" class="form-control" id="email" name="user[0][email]" placeholder="Ex : email@example.com" value="{{ old('user.0.email') }}">
                        </div>
                    </div>
                </div>

                <!-- Statut -->
                <div class="col-lg-6">
                    <div class="form-group">
                        <label class="form-label" for="status">Statut</label>
                        <div class="form-control-wrap">
                            <select class="form-select" id="status" name="user[0][status]">
                                <option value="" disabled selected>-- Sélectionnez un statut --</option>
                                <option value="comptable" {{ old('user.0.status') == 'comptable' ? 'selected' : '' }}>Comptable</option>
                                <option value="parent" {{ old('user.0.status') == 'parent' ? 'selected' : '' }}>Parent</option>
                            </select>
                        </div>
                    </div>
                </div>

                <!-- Numéro -->
                <div class="col-lg-6">
                    <div class="form-group">
                        <label class="form-label" for="number">Numéro</label>
                        <div class="form-control-wrap">
                            <input type="number" class="form-control" id="number" name="user[0][number]" placeholder="Ex : 123456789" value="{{ old('user.0.number') }}">
                        </div>
                    </div>
                </div>

                <!-- Bouton d'envoi -->
                <div class="col-12">
                    <div class="form-group">
                        <button type="submit" class="btn btn-lg btn-primary">Save Information</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
