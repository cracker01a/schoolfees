@extends('partials.master')

@section('content')
@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<div class="nk-content ">
    <div class="container-fluid">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="components-preview wide-md mx-auto">
                    <div class="nk-block nk-block-lg">
                        <div class="nk-block-head">
                            <div class="nk-block-head-content">
                                <h4 class="nk-block-title">Liste des utilisateurs</h4>
                                <p>Tableau des utilisateurs enregistrés dans le système.</p>
                            </div>
                        </div>
                        <div class="card card-bordered card-preview">
                            <table class="table table-orders">
                                <thead class="tb-odr-head">
                                    <tr class="tb-odr-item">
                                        <th class="tb-odr-info">
                                            <span class="tb-odr-id">ID</span>
                                            <span class="tb-odr-date d-none d-md-inline-block">Nom</span>
                                        </th>
                                        <th class="tb-odr-amount">
                                            <span class="tb-odr-total">Email</span>
                                            <span class="tb-odr-status d-none d-md-inline-block">Statut</span>
                                        </th>
                                        <th class="tb-odr-action">&nbsp;</th>
                                    </tr>
                                </thead>
                                <tbody class="tb-odr-body">
                                    @foreach($users as $user)
                                    <tr class="tb-odr-item">
                                        <td class="tb-odr-info">
                                            <span class="tb-odr-id">#{{ $user->id }}</span>
                                            <span class="tb-odr-date">{{ $user->firstname }} {{ $user->lastname }}</span>
                                        </td>
                                        <td class="tb-odr-amount">
                                            <span class="tb-odr-total">
                                                <span class="amount">{{ $user->email }}</span>
                                            </span>
                                            <span class="tb-odr-status">
                                                <span class="badge badge-dot {{ $user->isActive ? 'bg-success' : 'bg-danger' }}">
                                                    {{ $user->isActive ? 'Actif' : 'Inactif' }}
                                                </span>
                                            </span>
                                        </td>
                                        <td class="tb-odr-action">
                                            <div class="tb-odr-btns d-none d-md-inline">
                                                <button class="btn btn-sm btn-primary view-user" data-id="{{ $user->id }}">View</button>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div><!-- .card-preview -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
                    



<!-- Modal -->
<div class="modal fade" id="userDetailsModal" tabindex="-1" aria-labelledby="userDetailsModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="userDetailsModalLabel">Détails de l'utilisateur</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p><strong>Nom : </strong> <span id="user-name"></span></p>
                <p><strong>Email : </strong> <span id="user-email"></span></p>
                <p><strong>Status : </strong> <span id="user-status"></span></p>
                <p><strong>Téléphone : </strong> <span id="user-number"></span></p>
                <p><strong>Créé le : </strong> <span id="user-created-at"></span></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
            </div>
        </div>
    </div>
</div>
<script>
    document.querySelectorAll('.view-user').forEach(button => {
    button.addEventListener('click', function () {
        const userId = this.getAttribute('data-id');

        fetch(`/users/${userId}`)
            .then(response => response.json())
            .then(data => {
                // Mettre à jour les informations du modal
                document.getElementById('user-name').textContent = `${data.firstname} ${data.lastname}`;
                document.getElementById('user-email').textContent = data.email;
                document.getElementById('user-status').textContent = data.isActive ? 'Actif' : 'Inactif';
                document.getElementById('user-number').textContent = data.number || 'N/A';
                document.getElementById('user-created-at').textContent = data.created_at;

                // Afficher le modal
                const modal = new bootstrap.Modal(document.getElementById('userDetailsModal'));
                modal.show();
            })
            .catch(error => console.error('Erreur lors de la récupération des données :', error));
    });
});

</script>
@endsection