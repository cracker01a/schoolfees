@extends('partials.master')


@section('content')
<div class="container">
    <h1>Gestion des enfants</h1>

    {{-- Message de succès --}}
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    {{-- Formulaire pour ajouter un enfant --}}
    <div class="card mb-4">
        <div class="card-header">
            <h3>Ajouter un enfant</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('children.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="firstname">Prénom</label>
                    <input type="text" name="firstname" id="firstname" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="lastname">Nom</label>
                    <input type="text" name="lastname" id="lastname" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="class_id">Classe</label>
                    <select name="class_id" id="class_id" class="form-control" required>
                        <option value="">-- Sélectionnez une classe --</option>
                        @foreach($classes as $classe)
                            <option value="{{ $classe->id }}">{{ $classe->name }}</option>
                        @endforeach
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Ajouter</button>
            </form>
        </div>
    </div>

    {{-- Liste des enfants et frais --}}
    <div class="card">
        <div class="card-header">
            <h3>Liste des enfants</h3>
        </div>
        <div class="card-body">
            @if($children->isEmpty())
                <p>Aucun enfant inscrit.</p>
            @else
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Prénom</th>
                            <th>Nom</th>
                            <th>Classe</th>
                            <th>Frais associés</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($children as $child)
                            <tr>
                                <td>{{ $child->firstname }}</td>
                                <td>{{ $child->lastname }}</td>
                                <td>{{ $child->classe->name }}</td>
                                <td>
                                    <ul>
                                        @foreach($child->classe->fees as $fee)
                                            <li>{{ $fee->type }} : {{ $fee->amount }} € (à payer avant {{ $fee->due_date }})</li>
                                        @endforeach
                                    </ul>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
</div>
@endsection

