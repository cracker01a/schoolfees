@extends('partials.master')

@section('content')

<div class="container">
    <h1>Ajouter un Frais</h1>
    <div class="card card-bordered">
        <div class="card-inner">
            <div class="card-head">
                <h5 class="card-title"> Ajout Frais </h5>
            </div>
            <form action="{{ route('fees.store') }}" method="POST">
                @csrf
                <div class="row g-4">
                    <!-- Type -->
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="type" class="form-label">Type</label>
                            <div class="form-control-wrap">
                                <input type="text" name="type" class="form-control" id="type" required>
                            </div>
                        </div>
                    </div>
                    <!-- Amount -->
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="amount" class="form-label">Montant</label>
                            <div class="form-control-wrap">
                                <input type="number" name="amount" class="form-control" id="amount" required>
                            </div>
                        </div>
                    </div>
                    <!-- Due Date -->
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="due_date" class="form-label">Date limite</label>
                            <div class="form-control-wrap">
                                <input type="date" name="due_date" class="form-control" id="due_date" required>
                            </div>
                        </div>
                    </div>
                    <!-- Class -->
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="class" class="form-label">Classe</label>
                            <div class="form-control-wrap">
                                <select name="class_id" class="form-control" id="class" required>
                                    @foreach($classes as $class)
                                        <option value="{{ $class->id }}">{{ $class->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <!-- Description -->
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="description" class="form-label">Description</label>
                            <div class="form-control-wrap">
                                <textarea name="description" class="form-control" id="description"></textarea>
                            </div>
                        </div>
                    </div>
                    <!-- Payment Methods -->
                    
                    <!-- Communication Preferences -->
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="form-label">Communication</label>
                            <ul class="custom-control-group g-3 align-center">
                                <li>
                                    <div class="custom-control custom-control-sm custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="com-email-1">
                                        <label class="custom-control-label" for="com-email-1">Email</label>
                                    </div>
                                </li>
                                <li>
                                    <div class="custom-control custom-control-sm custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="com-sms-1">
                                        <label class="custom-control-label" for="com-sms-1">SMS</label>
                                    </div>
                                </li>
                                <li>
                                    <div class="custom-control custom-control-sm custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="com-phone-1">
                                        <label class="custom-control-label" for="com-phone-1">Téléphone</label>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- Submit Button -->
                    <div class="col-12">
                        <div class="form-group">
                            <button type="submit" class="btn btn-success btn-lg">Ajouter</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
