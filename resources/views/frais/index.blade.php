@extends('partials.master')

@section('content')
<div class="nk-content">
    <div class="container">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="nk-block-head nk-block-head-sm">
                    <h3 class="nk-block-title page-title">Frais à Payer pour vos Enfants</h3>
                    <div class="nk-block-des text-soft">
                        <p>Consultez les paiements de la classe de vos enfants.</p>
                    </div>
                </div>

                @foreach ($children as $child)
                    <div class="card card-bordered mb-4">
                        <div class="card-header">
                            <h5 class="card-title">
                                Enfant : {{ $child->firstname }} {{ $child->lastname }} 
                                | Classe : {{ $child->classe->name ?? 'Non assignée' }}
                            </h5>
                        </div>
                        <div class="card-body">
                            @if ($child->classe && $child->classe->fees->count())
                                <ul class="list-group">
                                    @foreach ($child->classe->fees as $fee)
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                            <div>
                                                <strong>Type :</strong> {{ $fee->type }} <br>
                                                <small>Description : {{ $fee->description }}</small>
                                            </div>
                                            <div>
                                                <span class="badge badge-primary">
                                                {{ number_format((float) $fee->amount, 2) }} Fcfa

                                                </span>
                                                <br>
                                                <small>Date limite : {{ $fee->due_date }}</small>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            @else
                                <p>Aucun frais associé à cette classe.</p>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
