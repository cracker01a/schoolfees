@extends('partials.master')

@section('content')

<div class="container">
    <h1>Liste des Frais</h1>
    <a href="{{ route('fees.create') }}" class="btn btn-primary mb-3">Ajouter un frais</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Type</th>
                <th>Montant</th>
                <th>Date limite</th>
                <th>Classe</th>
                <th>Description</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($fees as $fee)
            <tr>
                <td>{{ $fee->type }}</td>
                <td>{{ $fee->amount }}</td>
                <td>{{ $fee->due_date }}</td>
                <td>{{ $fee->classe->name }}</td> <!-- Affiche le nom de la classe associée -->
                <td>{{ $fee->description }}</td>
                <td>
                    <a href="{{ route('fees.edit', $fee->id) }}" class="btn btn-warning">Modifier</a>
                    <form action="{{ route('fees.destroy', $fee->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Supprimer</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection
