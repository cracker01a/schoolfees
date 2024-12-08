// resources/views/fees/create.blade.php
@extends('partials.master')

@section('content')

<div class="container">
    <h1>Ajouter un Frais</h1>
    <form action="{{ route('fees.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="type" class="form-label">Type</label>
            <input type="text" name="type" class="form-control" id="type" required>
        </div>
        <div class="mb-3">
            <label for="amount" class="form-label">Montant</label>
            <input type="number" name="amount" class="form-control" id="amount" required>
        </div>
        <div class="mb-3">
            <label for="due_date" class="form-label">Date limite</label>
            <input type="date" name="due_date" class="form-control" id="due_date" required>
        </div>
        <div class="mb-3">
            <label for="class" class="form-label">Classe</label>
            <select name="class_id" class="form-control" id="class" required>
                @foreach($classes as $class)
                    <option value="{{ $class->id }}">{{ $class->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea name="description" class="form-control" id="description"></textarea>
        </div>
        <button type="submit" class="btn btn-success">Ajouter</button>
    </form>
</div>

@endsection
