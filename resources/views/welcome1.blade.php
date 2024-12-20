@extends('partials.master')

@section('content')
<div class="nk-content ">
    <div class="container-fluid">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="nk-block-head nk-block-head-sm">
                    <div class="nk-block-between">
                        <div class="nk-block-head-content">
                            <h3 class="nk-block-title page-title">Dashboard</h3>
                            <div class="nk-block-des text-soft">
                                <p>Welcome to the Management Dashboard</p>
                            </div>
                        </div>
                    </div>
                </div><!-- .nk-block-head -->

                <div class="nk-block">
                    <div class="row g-gs">
                        <!-- Utilisateurs -->
                        <div class="col-md-4">
                            <div class="card card-bordered card-full">
                                <div class="card-inner">
                                    <div class="card-title-group align-start mb-0">
                                        <div class="card-title">
                                            <h6 class="subtitle">Total Users</h6>
                                        </div>
                                    </div>
                                    <div class="card-amount">
                                        <span class="amount">{{ $totalUsers }}</span>
                                    </div>
                                    <div class="invest-data">
                                        <div class="invest-data-history">
                                            <div class="title">Active Users</div>
                                            <div class="amount">{{ $activeUsers }}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><!-- .col -->

                        <!-- Remboursements -->
                        <div class="col-md-4">
                            <div class="card card-bordered card-full">
                                <div class="card-inner">
                                    <div class="card-title-group align-start mb-0">
                                        <div class="card-title">
                                            <h6 class="subtitle">Refund Requests</h6>
                                        </div>
                                    </div>
                                    <div class="card-amount">
                                        <span class="amount">{{ $totalRefundRequests }}</span>
                                    </div>
                                    <div class="invest-data">
                                        <div class="invest-data-history">
                                            <div class="title">Pending</div>
                                            <div class="amount">{{ $pendingRefunds }}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><!-- .col -->

                        <!-- Communications -->
                       
                        </div><!-- .col -->
                    </div><!-- .row -->

                    <!-- Section statistique -->
                    <div class="col-xxl-6">
                            <div class="card card-bordered h-100">
                                <div class="card-inner">
                                    <div class="card-title-group align-start gx-3 mb-3">
                                        <div class="card-title">
                                            <h6 class="title">Total des frais </h6>
                                            <p>In 30 days sales of product subscription. <a href="#">See Details</a></p>
                                        </div>
                                        <div class="card-tools">
                                            <div class="dropdown">
                                                <a href="#" class="btn btn-primary btn-dim d-none d-sm-inline-flex" data-bs-toggle="dropdown"><em class="icon ni ni-download-cloud"></em><span><span class="d-none d-md-inline">Download</span> Report</span></a>
                                                <a href="#" class="btn btn-icon btn-primary btn-dim d-sm-none" data-bs-toggle="dropdown"><em class="icon ni ni-download-cloud"></em></a>
                                                <div class="dropdown-menu dropdown-menu-end">
                                                    <ul class="link-list-opt no-bdr">
                                                        <li><a href="#"><span>Download Mini Version</span></a></li>
                                                        <li><a href="#"><span>Download Full Version</span></a></li>
                                                        <li class="divider"></li>
                                                        <li><a href="#"><em class="icon ni ni-opt-alt"></em><span>More Options</span></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="nk-sale-data-group align-center justify-between gy-3 gx-5">
                                        <div class="nk-sale-data">
                                            <span class="amount">fcfa82,944.60</span>
                                        </div>
                                        <div class="nk-sale-data">
                                            <span class="amount sm">1,937 <small>Subscribers</small></span>
                                        </div>
                                    </div>
                                    <div class="nk-sales-ck large pt-4">
                                        <canvas class="sales-overview-chart" id="salesOverview"></canvas>
                                    </div>
                                </div>
                            </div><!-- .card -->
                        </div><!-- .col -->
                </div><!-- .nk-block -->
            </div>
        </div>
    </div>
</div>


@endsection
