@extends('partials.master')

@section('content')

<div class="nk-content">
    <div class="container-fluid">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="nk-block-head nk-block-head-sm">
                    <div class="nk-block-between g-3">
                        <div class="nk-block-head-content">
                            <h3 class="nk-block-title page-title">Liste des Frais</h3>
                            <div class="nk-block-des text-soft">
                                <p>Total des frais : {{ $fees->count() }}</p>
                            </div>
                        </div><!-- .nk-block-head-content -->
                        <div class="nk-block-head-content">
                            <ul class="nk-block-tools g-3">
                                <li>
                                    <a href="{{ route('fees.create') }}" class="btn btn-icon btn-primary">
                                        <em class="icon ni ni-plus"></em> Ajouter un frais
                                    </a>
                                </li>
                            </ul>
                        </div><!-- .nk-block-head-content -->
                    </div><!-- .nk-block-between -->
                </div><!-- .nk-block-head -->
                
                <div class="nk-block">
                    <div class="card card-bordered card-stretch">
                        <div class="card-inner-group">
                            <div class="card-inner">
                                <div class="card-title-group">
                                    <div class="card-title">
                                        <h5 class="title">Tous les frais</h5>
                                    </div>
                                    <div class="card-tools me-n1">
                                        <ul class="btn-toolbar">
                                            <li>
                                                <a href="#" class="btn btn-icon search-toggle toggle-search" data-target="search">
                                                    <em class="icon ni ni-search"></em>
                                                </a>
                                            </li><!-- li -->
                                        </ul><!-- .btn-toolbar -->
                                    </div><!-- card-tools -->
                                    <div class="card-search search-wrap" data-search="search">
                                        <div class="search-content">
                                            <a href="#" class="search-back btn btn-icon toggle-search" data-target="search">
                                                <em class="icon ni ni-arrow-left"></em>
                                            </a>
                                            <input type="text" class="form-control form-control-sm border-transparent form-focus-none" placeholder="Recherche rapide par type ou description">
                                            <button class="search-submit btn btn-icon">
                                                <em class="icon ni ni-search"></em>
                                            </button>
                                        </div>
                                    </div><!-- card-search -->
                                </div><!-- .card-title-group -->
                            </div><!-- .card-inner -->

                            <div class="card-inner p-0">
                                <table class="table table-tranx">
                                    <thead>
                                        <tr class="tb-tnx-head">
                                            <th class="tb-tnx-id"><span>#</span></th>
                                            <th class="tb-tnx-info">
                                                <span class="tb-tnx-desc">Type</span>
                                            </th>
                                            <th class="tb-tnx-amount">
                                                <span class="tb-tnx-total">Montant</span>
                                            </th>
                                            <th class="tb-tnx-status">
                                                <span>Date limite</span>
                                            </th>
                                            <th class="tb-tnx-action">
                                                <span>Actions</span>
                                            </th>
                                        </tr><!-- tb-tnx-item -->
                                    </thead>
                                    <tbody>
                                        @foreach($fees as $fee)
                                        <tr class="tb-tnx-item">
                                            <td class="tb-tnx-id">
                                                <span>{{ $fee->id }}</span>
                                            </td>
                                            <td class="tb-tnx-info">
                                                <div class="tb-tnx-desc">
                                                    <span>{{ $fee->type }}</span>
                                                </div>
                                            </td>
                                            <td class="tb-tnx-amount">
                                                <div class="tb-tnx-total">
                                                    <span class="amount">{{ $fee->amount }}F cfa</span>
                                                </div>
                                            </td>
                                            <td class="tb-tnx-status">
                                                <span class="date">{{ $fee->due_date }}</span>
                                            </td>
                                            <td class="tb-tnx-action">
                                                <div class="dropdown">
                                                    <a class="text-soft dropdown-toggle btn btn-icon btn-trigger" data-bs-toggle="dropdown">
                                                        <em class="icon ni ni-more-h"></em>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-end dropdown-menu-xs">
                                                        <ul class="link-list-plain">
                                                            <li><a href="{{ route('fees.edit', $fee->id) }}">Modifier</a></li>
                                                            <li>
                                                                <form action="{{ route('fees.destroy', $fee->id) }}" method="POST" style="display:inline;">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="submit" class="btn btn-danger">Supprimer</button>
                                                                </form>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div><!-- .card-inner -->

                            <div class="card-inner">
                                <ul class="pagination justify-content-center justify-content-md-start">
                                    <li class="page-item"><a class="page-link" href="#">Précédent</a></li>
                                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                                    <li class="page-item"><span class="page-link"><em class="icon ni ni-more-h"></em></span></li>
                                    <li class="page-item"><a class="page-link" href="#">Suivant</a></li>
                                </ul><!-- .pagination -->
                            </div><!-- .card-inner -->
                        </div><!-- .card-inner-group -->
                    </div><!-- .card -->
                </div><!-- .nk-block -->
            </div>
        </div>
    </div>
</div>

@endsection
