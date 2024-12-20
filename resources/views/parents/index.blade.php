
@extends('partials.master')

@section('content')
<div class="container">
    <h3 class="mb-4">Liste des Parents</h3>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Nom</th>
                <th>Email</th>
                <th>Téléphone</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($parents as $parent)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $parent->firstname }} {{ $parent->lastname }}</td>
                    <td>{{ $parent->email }}</td>
                    <td>{{ $parent->number }}</td>
                    <td>
                        <button class="btn btn-primary btn-sm" onclick="openChatModal({{ $parent->id }}, '{{ $parent->firstname }}')">Chat</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

<!-- Modal pour le chat -->
<div class="modal fade" id="chatModal" tabindex="-1" aria-labelledby="chatModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="chatModalLabel">Envoyer un message</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="chatForm">
                    <input type="hidden" id="userId" name="user_id">
                    <div class="mb-3">
                        <label for="message" class="form-label">Message</label>
                        <textarea id="message" name="message" class="form-control" rows="4" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Envoyer par E-mail</button>
                    <button type="button" class="btn btn-success" onclick="sendWhatsApp()">Envoyer sur WhatsApp</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    function openChatModal(id, name) {
        document.querySelector('#chatModal #userId').value = id;
        document.querySelector('#chatModal #chatModalLabel').textContent = `Envoyer un message à ${name}`;
        $('#chatModal').modal('show');
    }

    // Envoi d'un e-mail
    document.querySelector('#chatForm').addEventListener('submit', function (e) {
        e.preventDefault();
        const userId = document.querySelector('#chatModal #userId').value;
        const message = document.querySelector('#chatModal #message').value;

        fetch(`/parents/email/${userId}`, {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({ message })
        })
        .then(response => response.json())
        .then(data => {
            alert(data.message);
            $('#chatModal').modal('hide');
        })
        .catch(error => console.error('Erreur:', error));
        document.querySelector('#chatForm').addEventListener('submit', async function (e) {
    e.preventDefault();

    const userId = document.querySelector('#chatModal #userId').value;
    const message = document.querySelector('#chatModal #message').value;

    try {
        const response = await fetch('/send-email', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            },
            body: JSON.stringify({ user_id: userId, message: message }),
        });

        const result = await response.json();
        if (response.ok) {
            alert('E-mail envoyé avec succès !');
        } else {
            alert('Erreur lors de l\'envoi de l\'e-mail : ' + result.message);
        }
    } catch (error) {
        alert('Une erreur s\'est produite : ' + error.message);
    }
});

    });

    // Envoi de WhatsApp
    function sendWhatsApp() {
        const userId = document.querySelector('#chatModal #userId').value;
        const message = document.querySelector('#chatModal #message').value;

        fetch(`/parents/whatsapp/${userId}`, {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({ message })
        })
        .then(response => response.json())
        .then(data => {
            alert(data.message);
            $('#chatModal').modal('hide');
        })
        .catch(error => console.error('Erreur:', error));
    }
    async function sendWhatsApp() {
    const userId = document.querySelector('#chatModal #userId').value;
    const message = document.querySelector('#chatModal #message').value;

    try {
        const response = await fetch('/send-whatsapp', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            },
            body: JSON.stringify({ user_id: userId, message: message }),
        });

        const result = await response.json();
        if (response.ok) {
            alert('Message WhatsApp envoyé avec succès !');
        } else {
            alert('Erreur lors de l\'envoi du message : ' + result.message);
        }
    } catch (error) {
        alert('Une erreur s\'est produite : ' + error.message);
    }
}

</script>
@endpush
