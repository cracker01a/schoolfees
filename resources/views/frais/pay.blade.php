@extends('partials.master')


@section('content')
<div class="container">
    <h2 class="text-center mb-4">Frais à Payer</h2>
    <div class="d-flex flex-wrap justify-content-center">
        @foreach($children as $child)
            @if(isset($fees[$child->class_id]) && $fees[$child->class_id]->isNotEmpty())
                <div class="card m-3" style="width: 18rem;">
                    <div class="card-header bg-primary text-white">
                    Classe : {{ $child->classe->name ?? 'Non définie' }}

                    </div>
                    <ul class="list-group list-group-flush">
                        @foreach($fees[$child->class_id] as $fee)
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                {{ $fee->description }}
                                <span>{{ number_format($fee->amount, 2) }} CFA</span>
                            </li>
                        @endforeach
                    </ul>
                    <!--  <div class="card-footer">
                        <a href="{{ route('payment.pay', ['class_id' => $child->class_id]) }}" class="btn btn-success btn-block">Payer</a>
                    </div> --->
                    <div class="card-footer">
                        <a href="{{ route('cinetpay.cine.pay') }}" class="btn btn-success btn-block">Payer</a>
                    </div>
                   
                   
            @else
                <div class="alert alert-warning w-100">
                    Aucun frais à payer pour la classe {{ $child->class->name }}.
                </div>
            @endif
        @endforeach
    </div>
</div>
@endsection
