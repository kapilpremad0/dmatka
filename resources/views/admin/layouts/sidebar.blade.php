<!-- BEGIN: Main Menu-->
<div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">

    <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
            <li class="nav-item me-auto"><a class="navbar-brand" href="{{ route('admin.dashboard') }}">

                <h2>D-Matka</h2>
                    {{-- <img src="{{ asset('public/logo.png') }}" alt="" width="100%"
                        style="    height: 64px;
                "> --}}

                </a></li>
            <li class="nav-item nav-toggle"><a class="nav-link modern-nav-toggle pe-0" data-bs-toggle="collapse"><i
                        class="d-block d-xl-none text-primary toggle-icon font-medium-4" data-feather="x"></i><i
                        class="d-none d-xl-block collapse-toggle-icon font-medium-4  text-primary" data-feather="disc"
                        data-ticon="disc"></i></a></li>
        </ul>
    </div>
    <div class="shadow-bottom"></div>
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">


            <li class=" nav-item {{ Request::routeIs('admin.dashboard') ? 'active' : '' }}"><a
                    class="d-flex align-items-center" href="{{ route('admin.dashboard') }}"><i
                        data-feather="home"></i><span class="menu-title text-truncate"
                        data-i18n="Dashboards">Dashboard</span><span
                        class="badge badge-light-warning rounded-pill ms-auto me-1"></span></a>

            </li>


                <li
                    class=" nav-item {{ Request::routeIs('admin.games.index', 'admin.games.create','admin.games.edit') ? 'has-sub open' : '' }} ">
                    <a class="d-flex align-items-center" href="#"><i data-feather="briefcase"></i><span
                            class="menu-title text-truncate" data-i18n="Invoice">Game</span></a>
                    <ul class="menu-content">
                        
                            <li>
                                <a class="d-flex align-items-center {{ Request::routeIs('admin.games.index','admin.games.edit') && !request()->input('archive') ? 'active' : '' }}"
                                    href="{{ route('admin.games.index') }}">
                                    <i data-feather="circle"></i>
                                    <span class="menu-item text-truncate" data-i18n="Shop"> List</span>
                                </a>
                            </li>

                            <li>
                                <a class="d-flex align-items-center {{ Request::routeIs('admin.games.create') && !request()->input('archive') ? 'active' : '' }}"
                                    href="{{ route('admin.games.create') }}">
                                    <i data-feather="circle"></i>
                                    <span class="menu-item text-truncate" data-i18n="Shop">Create</span>
                                </a>
                            </li>

                    </ul>
                </li>

            
                <li class=" nav-item {{ Request::routeIs('admin.users.index','admin.users.show','admin.users.winners','admin.users.transactions','admin.users.bids') ? 'active' : '' }}"><a
                    class="d-flex align-items-center" href="{{ route('admin.users.index') }}"><i
                        data-feather="users"></i><span class="menu-title text-truncate"
                        data-i18n="Dashboards">User</span><span
                        class="badge badge-light-warning rounded-pill ms-auto me-1"></span></a>
                </li>

                <li class=" nav-item {{ Request::routeIs('admin.bids.index') ? 'active' : '' }}"><a
                    class="d-flex align-items-center" href="{{ route('admin.bids.index') }}"><i
                        data-feather="file"></i><span class="menu-title text-truncate"
                        data-i18n="Dashboards">Bids</span><span
                        class="badge badge-light-warning rounded-pill ms-auto me-1"></span></a>
                </li>

                <li class=" nav-item {{ Request::routeIs('admin.transactions.index') ? 'active' : '' }}"><a
                    class="d-flex align-items-center" href="{{ route('admin.transactions.index') }}"><i
                        data-feather="file"></i><span class="menu-title text-truncate"
                        data-i18n="Dashboards">Transactions</span><span
                        class="badge badge-light-warning rounded-pill ms-auto me-1"></span></a>
                </li>

                <li class=" nav-item {{ Request::routeIs('admin.declare_result.index') ? 'active' : '' }}"><a
                    class="d-flex align-items-center" href="{{ route('admin.declare_result.index') }}"><i
                        data-feather="settings"></i><span class="menu-title text-truncate"
                        data-i18n="Dashboards">Declare Result</span><span
                        class="badge badge-light-warning rounded-pill ms-auto me-1"></span></a>
                </li>

                <li class=" nav-item {{ Request::routeIs('admin.winners.index') ? 'active' : '' }}"><a
                    class="d-flex align-items-center" href="{{ route('admin.winners.index') }}"><i
                        data-feather="settings"></i><span class="menu-title text-truncate"
                        data-i18n="Dashboards">Winner</span><span
                        class="badge badge-light-warning rounded-pill ms-auto me-1"></span></a>
                </li>

                <li class=" nav-item {{ Request::routeIs('admin.settings.index') ? 'active' : '' }}"><a
                    class="d-flex align-items-center" href="{{ route('admin.settings.index') }}"><i
                        data-feather="settings"></i><span class="menu-title text-truncate"
                        data-i18n="Dashboards">Settings</span><span
                        class="badge badge-light-warning rounded-pill ms-auto me-1"></span></a>
                </li>



        </ul>
    </div>
</div>
<!-- END: Main Menu-->
