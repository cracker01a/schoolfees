@extends('partials.master')

@section('content')

<div class="container">
    <h1>Modifier le Frais</h1>
    <form action="{{ route('fees.update', $fee->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="type" class="form-label">Type</label>
            <input type="text" name="type" class="form-control" id="type" value="{{ $fee->type }}" required>
        </div>
        <div class="mb-3">
            <label for="amount" class="form-label">Montant</label>
            <input type="number" name="amount" class="form-control" id="amount" value="{{ $fee->amount }}" required>
        </div>
        <div class="mb-3">
            <label for="due_date" class="form-label">Date limite</label>
            <input type="date" name="due_date" class="form-control" id="due_date" value="{{ $fee->due_date }}" required>
        </div>
        <div class="mb-3">
            <label for="class_id" class="form-label">Classe</label>
            <select name="class_id" class="form-control" id="class_id" required>
                @foreach($classes as $class)
                    <option value="{{ $class->id }}" {{ $fee->class_id == $class->id ? 'selected' : '' }}>
                        {{ $class->name }} <!-- Assurez-vous que 'name' est la colonne correcte -->
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea name="description" class="form-control" id="description">{{ $fee->description }}</textarea>
        </div>
        <button type="submit" class="btn btn-success">Mettre à jour</button>
    </form>
</div>

@endsection
