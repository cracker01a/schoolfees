
@extends('partials.master')

@section('content')
<div class="dashboard">
  <aside class="sidebar">
    <ul>
      <li><a href="/dashboard">Tableau de bord</a></li>
      <li><a href="/users">Utilisateurs</a></li>
      <li><a href="/refund-requests">Remboursements</a></li>
      <li><a href="/communications">Communications</a></li>
      <li><a href="/stats">Statistiques</a></li>
    </ul>
  </aside>

  <main class="main-content">
    <header>
      <h1>Tableau de bord</h1>
    </header>

    <section class="stats">
      <div class="stat-card">
        <h3>Total utilisateurs</h3>
        <p>{{ $totalUsers }}</p>
      </div>
      <div class="stat-card">
        <h3>Demandes de remboursement</h3>
        <p>{{ $totalRefundRequests }}</p>
      </div>
      <!-- Autres cartes -->
    </section>

    <section class="charts">
      <canvas id="refundsChart"></canvas>
      <canvas id="usersChart"></canvas>
    </section>
  </main>
</div>
@endsection