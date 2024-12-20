<div class="nk-sidebar nk-sidebar-fixed is-dark " data-content="sidebarMenu">
    <div class="nk-sidebar-element nk-sidebar-head">
        <div class="nk-menu-trigger">
            <a href="#" class="nk-nav-toggle nk-quick-nav-icon d-xl-none" data-target="sidebarMenu"><em class="icon ni ni-arrow-left"></em></a>
            <a href="#" class="nk-nav-compact nk-quick-nav-icon d-none d-xl-inline-flex" data-target="sidebarMenu"><em class="icon ni ni-menu"></em></a>
        </div>
        <div class="nk-sidebar-brand">
            <a href="html/index.html" class="logo-link nk-sidebar-logo">
                <img class="log.png" src="log.png"  alt="logo">
                <img class="log.png" src="log.png" alt="logo-dark">
            </a>
        </div>
    </div><!-- .nk-sidebar-element -->
    <div class="nk-sidebar-element nk-sidebar-body">
        <div class="nk-sidebar-content">
            <div class="nk-sidebar-menu" data-simplebar>
                <ul class="nk-menu">

                    <li class="nk-menu-heading">
                        <h6 class="overline-title text-primary-alt">Dashboards</h6>
                    </li><!-- .nk-menu-item -->
                    <li class="nk-menu-item">
                        <a href="{{ route('bb') }}" class="nk-menu-link">
                            <span class="nk-menu-icon"><em class="icon ni ni-dashlite"></em></span>
                            <span class="nk-menu-text"> Dashboard </span>
                        </a>
                    </li><!-- .nk-menu-item -->


                    <!-- Vérifie si l'utilisateur n'est pas un parent -->
                    @if(auth()->user()->status !== 'parent')
                    <li class="nk-menu-heading">
                        <h6 class="overline-title text-primary-alt">paiements</h6>
                    </li><!-- .nk-menu-heading -->
                    <li class="nk-menu-item has-sub">
                        <a href="#" class="nk-menu-link nk-menu-toggle">
                            <span class="nk-menu-icon"><em class="icon ni ni-tile-thumb"></em></span>
                            <span class="nk-menu-text">Gestion de frais</span>
                        </a>
                        <ul class="nk-menu-sub">
                            <li class="nk-menu-item">
                                <a href="{{ route('fees.create') }}" class="nk-menu-link"><span class="nk-menu-text">Ajout</span></a>
                            </li>
                            <li class="nk-menu-item">
                                <a href="{{ route('fees.index') }}" class="nk-menu-link"><span class="nk-menu-text">List</span></a>
                            </li>
                        </ul><!-- .nk-menu-sub -->
                    </li><!-- .nk-menu-item -->
                   
                    <li class="nk-menu-item has-sub">
                        <a href="" class="nk-menu-link nk-menu-toggle">
                            <span class="nk-menu-icon"><em class="icon ni ni-tranx"></em></span>
                            <span class="nk-menu-text">frais de scolarite</span>
                        </a>
                        <ul class="nk-menu-sub">
                            <li class="nk-menu-item">
                                <a href="{{ route('frais.indexa') }}" class="nk-menu-link"><span class="nk-menu-text">bilan list frais</span></a>
                            </li>
                            <li class="nk-menu-item">
                                <a href="html/transaction-crypto.html" class="nk-menu-link"><span class="nk-menu-text">Trans List</span></a>
                            </li>
                        </ul>
                    </li><!-- .nk-menu-item -->
                    <li class="nk-menu-item has-sub">
                        <a href="{{ route('parents.index') }}" class="nk-menu-link nk-menu-toggle">
                            <span class="nk-menu-icon"><em class="icon ni ni-grid-alt"></em></span>
                            <span class="nk-menu-text">Notifications</span>
                        </a>
                        <ul class="nk-menu-sub">
                            <li class="nk-menu-item">
                                <a href="{{ route('parents.index') }}" class="nk-menu-link"><span class="nk-menu-text">Messages</span></a>
                            </li>
                            <li class="nk-menu-item">
                                <a href="html/apps-inbox.html" class="nk-menu-link"><span class="nk-menu-text">Inbox / Mail</span></a>
                            </li>
                            
                        </ul><!-- .nk-menu-sub -->
                    </li><!-- .nk-menu-item -->
                    <li class="nk-menu-item has-sub">
                        <a href="#" class="nk-menu-link nk-menu-toggle">
                            <span class="nk-menu-icon"><em class="icon ni ni-file-docs"></em></span>
                            <span class="nk-menu-text">Gest de remboursement</span>
                        </a>
                        <ul class="nk-menu-sub">
                            <li class="nk-menu-item">
                                <a href="{{ route('refunds.index') }}" class="nk-menu-link"><span class="nk-menu-text">Demande</span></a>
                            </li>
                            <li class="nk-menu-item">
                                <a href="html/invoice-details.html" class="nk-menu-link"><span class="nk-menu-text">validation</span></a>
                            </li>
                        </ul><!-- .nk-menu-sub -->
                    </li>
                    <li class="nk-menu-item has-sub">
                        <a href="#" class="nk-menu-link nk-menu-toggle">
                            <span class="nk-menu-icon"><em class="icon ni ni-users"></em></span>
                            <span class="nk-menu-text">User Manage</span>
                        </a>
                        <ul class="nk-menu-sub">
                            <li class="nk-menu-item">
                                <a href="{{ route('users.create') }}" class="nk-menu-link"><span class="nk-menu-text">Ajout</span></a>
                            </li>
                            <li class="nk-menu-item">
                                <a href="{{ route('users.index') }}" class="nk-menu-link"><span class="nk-menu-text">List</span></a>
                            </li>
                        </ul><!-- .nk-menu-sub -->
                    </li><!-- .nk-menu-item -->
                    @endif
                    @if(auth()->user()->status !== 'comptable')

                    <li class="nk-menu-item has-sub">
                        <a href="{{ route('children.index') }}" class="nk-menu-link nk-menu-toggle">
                            <span class="nk-menu-icon"><em class="icon ni ni-user-list"></em></span>
                            <span class="nk-menu-text">Enregistrement</span>
                        </a>
                        <ul class="nk-menu-sub">
                            <li class="nk-menu-item">
                                <a href="{{ route('children.index') }}" class="nk-menu-link">
                                    <span class="nk-menu-text">Ajout</span>
                                </a>
                            </li>
                            <li class="nk-menu-item">
                                <a href="html/customer-details.html" class="nk-menu-link">
                                    <span class="nk-menu-text">List</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    @if(isset($parentId))
                    <li class="nk-menu-item has-sub">
                        <a href="{{ route('frais.index', ['id' => $parentId]) }}" class="nk-menu-link nk-menu-toggle">
                            <span class="nk-menu-icon"><em class="icon ni ni-file-docs"></em></span>
                            <span class="nk-menu-text">Paiements Clés</span>
                        </a>
                        <ul class="nk-menu-sub">
                           
                            <li class="nk-menu-item">
                                <a href="{{ route('frais.index', ['id' => $parentId]) }}" class="nk-menu-link">
                                    <span class="nk-menu-text">List</span>
                                </a>
                            </li>
                          
                            @else 
                            <li class="nk-menu-item">
                                <a href="" class="nk-menu-link">
                                    <span class="nk-menu-text">paiements</span>
                                </a>
                            </li>
                            @endif
                        </ul>
                    </li>

                    <li class="nk-menu-item has-sub">
                        <a href="{{ route('frais.pay') }}" class="nk-menu-link nk-menu-toggle">
                            <span class="nk-menu-icon"><em class="icon ni ni-card-view"></em></span>
                            <span class="nk-menu-text">PAY</span>
                        </a>
                        <ul class="nk-menu-sub">
                            <li class="nk-menu-item">
                                <a href="{{ route('frais.pay') }}" class="nk-menu-link">
                                    <span class="nk-menu-text">Product List</span>
                                </a>
                            </li>
                            <li class="nk-menu-item">
                                <a href="html/product-card.html" class="nk-menu-link">
                                    <span class="nk-menu-text">Product Card</span>
                                </a>
                            </li>
                            <li class="nk-menu-item">
                                <a href="html/product-details.html" class="nk-menu-link">
                                    <span class="nk-menu-text">Product Details</span>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="nk-menu-item">
                        <a href="{{ route('refunds.create') }}" class="nk-menu-link">
                            <span class="nk-menu-icon"><em class="icon ni ni-view-col"></em></span>
                            <span class="nk-menu-text">remboursement</span>
                        </a>
                    </li>

                   
                    @endif

            </div><!-- .nk-sidebar-menu -->
        </div><!-- .nk-sidebar-content -->
    </div><!-- .nk-sidebar-element -->
</div>