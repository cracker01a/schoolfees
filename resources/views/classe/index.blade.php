@extends('partials.master')

@section('content')
<div class="nk-content ">
    <div class="container">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="nk-block-head nk-block-head-sm">
                    <div class="nk-block-between g-3">
                        <div class="nk-block-head-content">
                            <h3 class="nk-block-title page-title">frais de scolarite general</h3>
                            <div class="nk-block-des text-soft">
                                <p>visualiser les frais de scolarite.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="nk-block">
                    <div class="row g-gs">
                        @foreach ($classes as $classe)
                            <div class="col-md-6 col-xxl-3">
                                <div class="card card-bordered pricing">
                                    <div class="pricing-head">
                                        <div class="pricing-title">
                                            <!-- Nom de la classe -->
                                            <h4 class="card-title title">{{ $classe->name }}</h4>
                                            <p class="sub-text">Frais associés à la classe {{ $classe->name }}</p>
                                        </div>
                                        <div class="card-text">
                                            <div class="row">
                                                <div class="col-6">
                                                    <!-- Nombre total de frais -->
                                                    <span class="h4 fw-500">{{ $classe->fees->count() }}</span>
                                                    <span class="sub-text">Nombre de frais</span>
                                                </div>
                                                <div class="col-6">
                                                    <!-- Somme totale des frais -->
                                                    <span class="h4 fw-500">
                                                        {{ number_format($classe->fees->sum('amount'), 2) }} CFA
                                                    </span>
                                                    <span class="sub-text">Total des frais</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="pricing-body">
                                        <ul class="pricing-features">
                                            @foreach ($classe->fees as $fee)
                                                <li>
                                                    <span class="w-50">{{ $fee->type }}</span> - 
                                                    <span class="ms-auto">{{ number_format($fee->amount, 2) }} CFA</span>
                                                </li>
                                            @endforeach
                                        </ul>
                                        <div class="pricing-action">
                                            <!-- Bouton pour afficher le popup -->
                                            <button class="btn btn-outline-light" data-bs-toggle="modal" data-bs-target="#detailsModal{{ $classe->id }}">
                                                Voir les détails
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Popup Modal -->
                            <div class="modal fade" id="detailsModal{{ $classe->id }}" tabindex="-1" aria-labelledby="detailsModalLabel{{ $classe->id }}" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="detailsModalLabel{{ $classe->id }}">
                                                Détails des frais pour la classe {{ $classe->name }}
                                            </h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            @if ($classe->fees->isEmpty())
                                                <p>Aucun frais associé à cette classe.</p>
                                            @else
                                                <ul class="list-group">
                                                    @foreach ($classe->fees as $fee)
                                                        <li class="list-group-item">
                                                            <strong>Type :</strong> {{ $fee->type }}<br>
                                                            <strong>Montant :</strong> {{ number_format($fee->amount, 2) }} CFA<br>
                                                            <strong>Date limite :</strong> {{ $fee->due_date }}<br>
                                                            <strong>Description :</strong> {{ $fee->description }}
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            @endif
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Fin du Modal -->
                        @endforeach
                    </div>
                </div>
            </div>
        </div>                        
    </div>
</div>
@endsection
