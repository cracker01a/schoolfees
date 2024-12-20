@extends('partials.master')

@section('content')
<div class="nk-content ">
    <div class="container-fluid">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="components-preview wide-md mx-auto">
                    <div class="nk-block-head nk-block-head-lg wide-sm">
                        <div class="nk-block-head-content">
                            <div class="nk-block-head-sub"><a class="back-to" href="html/components.html"><em class="icon ni ni-arrow-left"></em><span>Components</span></a></div>
                            <h2 class="nk-block-title fw-normal">Demande</h2>
                            <div class="nk-block-des">
                                <p class="lead">Si vous avez un probleme de transaction vous pouvez effectuer une reclamation ou une demande de remboursement.</p>
                            </div>
                        </div>
                    </div><!-- .nk-block -->
                    <div class="nk-block nk-block-lg">
                        <div class="nk-block-head">
                            <div class="nk-block-head-content">
                                <h4 class="title nk-block-title">Demande de remboursement</h4>
                                <p>Utilisez ce formulaire pour soumettre une demande de remboursement.</p>
                            </div>
                        </div>
                        <div class="card card-bordered">
                            <div class="card-inner">
                                @if (session('success'))
                                    <div class="alert alert-success">{{ session('success') }}</div>
                                @endif
                                <form action="{{ route('refunds.store') }}" method="POST">
                                    @csrf
                                    <div class="row g-4">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="form-label" for="child_id">Sélectionner un enfant (facultatif)</label>
                                                <div class="form-control-wrap">
                                                    <select name="child_id" id="child_id" class="form-control">
                                                        <option value="">Aucun</option>
                                                        @foreach ($children as $child)
                                                            <option value="{{ $child->id }}">{{ $child->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="form-label" for="amount">Montant</label>
                                                <div class="form-control-wrap">
                                                    <input type="number" name="amount" id="amount" class="form-control" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label class="form-label" for="reason">Raison</label>
                                                <div class="form-control-wrap">
                                                    <textarea name="reason" id="reason" class="form-control" rows="4" required></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-lg btn-primary">Envoyer la demande</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
