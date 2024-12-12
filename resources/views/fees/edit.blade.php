@extends('partials.master')

@section('content')

<div class="container">
    <h1>Modifier le Frais</h1>
    <form action="{{ route('fees.update', $fee->id) }}" method="POST">
        @csrf
        @method('PUT')
        
        <div class="card card-bordered">
            <div class="card-inner">
                <div class="card-head">
                    <h5 class="card-title">Customer Info S2</h5>
                </div>
                <div class="row g-4">
                    <!-- Type -->
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="type" class="form-label">Type</label>
                            <div class="form-control-wrap">
                                <input type="text" name="type" class="form-control" id="type" value="{{ old('type', $fee->type) }}" required>
                            </div>
                        </div>
                    </div>

                    <!-- Amount -->
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="amount" class="form-label">Montant</label>
                            <div class="form-control-wrap">
                                <input type="number" name="amount" class="form-control" id="amount" value="{{ old('amount', $fee->amount) }}" required>
                            </div>
                        </div>
                    </div>

                    <!-- Due Date -->
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="due_date" class="form-label">Date limite</label>
                            <div class="form-control-wrap">
                                <input type="date" name="due_date" class="form-control" id="due_date" value="{{ old('due_date', $fee->due_date) }}" required>
                            </div>
                        </div>
                    </div>

                    <!-- Classe -->
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="class_id" class="form-label">Classe</label>
                            <div class="form-control-wrap">
                                <select name="class_id" class="form-control" id="class_id" required>
                                    @foreach($classes as $class)
                                        <option value="{{ $class->id }}" {{ old('class_id', $fee->class_id) == $class->id ? 'selected' : '' }}>
                                            {{ $class->name }}
                                        </option>
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
                                <textarea name="description" class="form-control" id="description">{{ old('description', $fee->description) }}</textarea>
                            </div>
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <div class="col-12">
                        <div class="form-group">
                            <button type="submit" class="btn btn-lg btn-success">Mettre à jour</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

@endsection
