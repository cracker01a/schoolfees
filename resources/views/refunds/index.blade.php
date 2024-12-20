@extends('partials.master')





@section('content')
<div class="nk-content">
    <div class="container-fluid">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="nk-block">
                    <div class="card card-bordered card-stretch">
                        <div class="card-inner-group">
                            <div class="card-inner">
                                <div class="card-title-group">
                                    <div class="card-title">
                                        <h5 class="title">Liste des demandes de remboursement</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="card-inner p-0">
                                <div class="table-responsive">
                                    <table class="table nk-tb-list nk-tb-ulist">
                                        <thead>
                                            <tr class="nk-tb-item nk-tb-head">
                                                <th class="nk-tb-col">#</th>
                                                <th class="nk-tb-col">Nom de l'utilisateur</th>
                                                <th class="nk-tb-col">Numéro de l'utilisateur</th>
                                                <th class="nk-tb-col">Montant</th>
                                                <th class="nk-tb-col">Raison</th>
                                                <th class="nk-tb-col">Statut</th>
                                                <th class="nk-tb-col">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($refundRequests as $request)
                                            <tr class="nk-tb-item" id="refund-request-{{ $request->id }}">
                                                <td class="nk-tb-col">{{ $request->id }}</td>
                                                <td class="nk-tb-col">{{ $request->user->name }}</td>
                                                <td class="nk-tb-col">{{ $request->user->number }}</td>
                                                <td class="nk-tb-col">{{ $request->amount }} Fcfa</td>
                                                <td class="nk-tb-col">{{ $request->reason }}</td>
                                                <td class="nk-tb-col">
                                                    <span class="badge 
            {{ $request->status == 'pending' ? 'bg-warning' : ($request->status == 'approved' ? 'bg-success' : 'bg-danger') }}">
                                                        {{ ucfirst($request->status) }}
                                                    </span>
                                                </td>
                                                <td class="nk-tb-col">
                                                    <div class="btn-group">
                                                        <button class="btn btn-sm btn-success" onclick="approveRequest({{ $request->id }})">Valider</button>
                                                        <button class="btn btn-sm btn-danger" onclick="rejectRequest({{ $request->id }})">Rejeter</button>
                                                    </div>
                                                </td>
                                            </tr>

                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- .nk-block -->
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    function approveRequest(id) {
        Swal.fire({
            title: 'Êtes-vous sûr(e) ?',
            text: "Voulez-vous vraiment valider cette demande ?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#28a745',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Oui, valider!',
            cancelButtonText: 'Annuler',
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire(
                    'Validé !',
                    'La demande a été validée avec succès.',
                    'success'
                );
            }
        });
    }

    function rejectRequest(id) {
        Swal.fire({
            title: 'Êtes-vous sûr(e) ?',
            text: "Voulez-vous vraiment rejeter cette demande ? Cette action est irréversible.",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#dc3545',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Oui, rejeter!',
            cancelButtonText: 'Annuler',
        }).then((result) => {
            if (result.isConfirmed) {
                // Envoyer une requête AJAX pour supprimer la demande
                fetch(`/refund-requests/${id}`, {
                        method: 'DELETE',
                        headers: {
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                            'Content-Type': 'application/json'
                        }
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            Swal.fire(
                                'Rejeté !',
                                'La demande a été rejetée et supprimée avec succès.',
                                'error'
                            );

                            // Supprimer la ligne du tableau
                            document.querySelector(`#refund-request-${id}`).remove();
                        } else {
                            Swal.fire(
                                'Erreur !',
                                'Une erreur s\'est produite lors de la suppression de la demande.',
                                'error'
                            );
                        }
                    })
                    .catch(error => {
                        Swal.fire(
                            'Erreur !',
                            'Une erreur s\'est produite lors de la suppression de la demande.',
                            'error'
                        );
                        console.error('Erreur:', error);
                    });
            }
        });
    }
</script>
@endsection