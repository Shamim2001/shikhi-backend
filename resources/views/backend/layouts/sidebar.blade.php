<!-- ========== App Menu ========== -->
        <div class="app-menu navbar-menu">
            <!-- LOGO -->
            <div class="navbar-brand-box">
                <!-- Dark Logo-->
                <a href="index-2.html" class="logo logo-dark">
                    <span class="logo-sm">
                        <img src="{{ asset('backend') }}/assets/images/logo-sm.png" alt="" height="22">
                    </span>
                    <span class="logo-lg">
                        <img src="{{ asset('backend') }}/assets/images/logo-dark.png" alt="" height="17">
                    </span>
                </a>
                <!-- Light Logo-->
                <a href="index-2.html" class="logo logo-light">
                    <span class="logo-sm">
                        <img src="{{ asset('backend') }}/assets/images/logo-sm.png" alt="" height="22">
                    </span>
                    <span class="logo-lg">
                        <img src="{{ asset('backend') }}/assets/images/logo-light.png" alt="" height="17">
                    </span>
                </a>
                <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover"
                    id="vertical-hover">
                    <i class="ri-record-circle-line"></i>
                </button>
            </div>

            <div id="scrollbar">
                <div class="container-fluid">

                    <div id="two-column-menu">
                    </div>
                    <ul class="navbar-nav" id="navbar-nav">
                        <li class="menu-title"><span data-key="t-menu">Menu</span></li>
                        <li class="nav-item">
                            <a class="nav-link menu-link" href="{{ route('dashboard.index') }}">
                                <i class="mdi mdi-speedometer"></i> <span data-key="t-dashboards">Dashboards</span>
                            </a>
                        </li> <!-- end Dashboard Menu -->

                        <!-- start permission -->
                        <li class="nav-item">
                            <a class="nav-link menu-link" href="#sidebarPermissions" data-bs-toggle="collapse"
                                role="button" aria-expanded="false" aria-controls="sidebarPermissions">
                                <i class="mdi mdi-account-circle-outline"></i> <span data-key="t-dashboards">User Management</span>
                            </a>
                            <div class="collapse menu-dropdown" id="sidebarPermissions">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item">
                                        <a href="{{ route('user.role.index') }}" class="nav-link" data-key="t-roles"> Role </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#" class="nav-link" data-key="t-permissions">
                                            Permission </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#" class="nav-link" data-key="t-users">
                                            Users </a>
                                    </li>
                                </ul>
                            </div>
                        </li> <!-- end permission -->

                        <li class="nav-item">
                            <a class="nav-link menu-link" href="{{ route('course.index') }}" {{ request()->routeIs('course.*') ? 'text-white hover:text-white' : '' }}>
                                <i class="mdi mdi-speedometer"></i> <span data-key="t-dashboards">Courses</span>
                            </a>
                        </li> <!-- end courses -->

                        <li class="nav-item">
                            <a class="nav-link menu-link" href="#">
                                <i class="mdi mdi-account-circle-outline"></i> <span data-key="t-dashboards">Category</span>
                            </a>
                        </li> <!-- end Category -->


{{--
                        <li class="nav-item">
                            <a class="nav-link menu-link" href="#sidebarApps" data-bs-toggle="collapse" role="button"
                                aria-expanded="false" aria-controls="sidebarApps">
                                <i class="mdi mdi-view-grid-plus-outline"></i> <span data-key="t-apps">Apps</span>
                            </a>
                            <div class="collapse menu-dropdown" id="sidebarApps">
                                <ul class="nav nav-sm flex-column">

                                    <li class="nav-item">
                                        <a href="#sidebarTasks" class="nav-link" data-bs-toggle="collapse" role="button"
                                            aria-expanded="false" aria-controls="sidebarTasks" data-key="t-tasks"> Tasks
                                        </a>
                                        <div class="collapse menu-dropdown" id="sidebarTasks">
                                            <ul class="nav nav-sm flex-column">
                                                <li class="nav-item">
                                                    <a href="apps-tasks-kanban.html" class="nav-link"
                                                        data-key="t-kanbanboard"> Kanban Board </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a href="apps-tasks-list-view.html" class="nav-link"
                                                        data-key="t-list-view"> List View </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a href="apps-tasks-details.html" class="nav-link"
                                                        data-key="t-task-details"> Task Details </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#sidebarInvoices" class="nav-link" data-bs-toggle="collapse"
                                            role="button" aria-expanded="false" aria-controls="sidebarInvoices">
                                            Invoices
                                        </a>
                                        <div class="collapse menu-dropdown" id="sidebarInvoices">
                                            <ul class="nav nav-sm flex-column">
                                                <li class="nav-item">
                                                    <a href="apps-invoices-list.html" class="nav-link"
                                                        data-key="t-list-view"> List View </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a href="apps-invoices-details.html" class="nav-link"
                                                        data-key="t-details"> Details </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a href="apps-invoices-create.html" class="nav-link"
                                                        data-key="t-create-invoice"> Create Invoice </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link menu-link" href="#sidebarLayouts" data-bs-toggle="collapse" role="button"
                                aria-expanded="false" aria-controls="sidebarLayouts">
                                <i class="mdi mdi-view-carousel-outline"></i> <span data-key="t-layouts">Layouts</span>
                            </a>
                            <div class="collapse menu-dropdown" id="sidebarLayouts">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item">
                                        <a href="layouts-horizontal.html" class="nav-link" target="_blank"
                                            data-key="t-horizontal">Horizontal</a>
                                    </li>
                                </ul>
                            </div>
                        </li> <!-- end Dashboard Menu -->

                        <li class="menu-title"><i class="ri-more-fill"></i> <span data-key="t-pages">Pages</span></li>

                        <li class="nav-item">
                            <a class="nav-link menu-link" href="#sidebarAuth" data-bs-toggle="collapse" role="button"
                                aria-expanded="false" aria-controls="sidebarAuth">
                                <i class="mdi mdi-account-circle-outline"></i> <span
                                    data-key="t-authentication">Authentication</span>
                            </a>
                            <div class="collapse menu-dropdown" id="sidebarAuth">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item">
                                        <a href="#sidebarResetPass" class="nav-link" data-bs-toggle="collapse"
                                            role="button" aria-expanded="false" aria-controls="sidebarResetPass"
                                            data-key="t-password-reset">Password Reset
                                        </a>
                                        <div class="collapse menu-dropdown" id="sidebarResetPass">
                                            <ul class="nav nav-sm flex-column">
                                                <li class="nav-item">
                                                    <a href="auth-pass-reset-basic.html" class="nav-link"
                                                        data-key="t-basic"> Basic </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a href="auth-pass-reset-cover.html" class="nav-link"
                                                        data-key="t-cover"> Cover </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </li>

                                    <li class="nav-item">
                                        <a href="#sidebarchangePass" class="nav-link" data-bs-toggle="collapse"
                                            role="button" aria-expanded="false" aria-controls="sidebarchangePass"
                                            data-key="t-password-create">
                                            Password Create
                                        </a>
                                        <div class="collapse menu-dropdown" id="sidebarchangePass">
                                            <ul class="nav nav-sm flex-column">
                                                <li class="nav-item">
                                                    <a href="auth-pass-change-basic.html" class="nav-link"
                                                        data-key="t-basic">
                                                        Basic </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a href="auth-pass-change-cover.html" class="nav-link"
                                                        data-key="t-cover">
                                                        Cover </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </li>

                                    <li class="nav-item">
                                        <a href="#sidebarLockScreen" class="nav-link" data-bs-toggle="collapse"
                                            role="button" aria-expanded="false" aria-controls="sidebarLockScreen"
                                            data-key="t-lock-screen"> Lock Screen
                                        </a>
                                        <div class="collapse menu-dropdown" id="sidebarLockScreen">
                                            <ul class="nav nav-sm flex-column">
                                                <li class="nav-item">
                                                    <a href="auth-lockscreen-basic.html" class="nav-link"
                                                        data-key="t-basic"> Basic </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a href="auth-lockscreen-cover.html" class="nav-link"
                                                        data-key="t-cover"> Cover </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </li>

                                </ul>
                            </div>
                        </li>

                        <li class="menu-title"><i class="ri-more-fill"></i> <span
                                data-key="t-components">Components</span></li>

                        <li class="nav-item">
                            <a class="nav-link menu-link" href="#sidebarUI" data-bs-toggle="collapse" role="button"
                                aria-expanded="false" aria-controls="sidebarUI">
                                <i class="mdi mdi-cube-outline"></i> <span data-key="t-base-ui">Base UI</span>
                            </a>
                            <div class="collapse menu-dropdown mega-dropdown-menu" id="sidebarUI">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <ul class="nav nav-sm flex-column">
                                            <li class="nav-item">
                                                <a href="ui-alerts.html" class="nav-link" data-key="t-alerts">Alerts</a>
                                            </li>

                                            <li class="nav-item">
                                                <a href="ui-carousel.html" class="nav-link"
                                                    data-key="t-carousel">Carousel</a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="ui-dropdowns.html" class="nav-link"
                                                    data-key="t-dropdowns">Dropdowns</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </li>
 --}}

                    </ul>
                </div>
                <!-- Sidebar -->
            </div>

            <div class="sidebar-background"></div>
        </div>
        <!-- Left Sidebar End -->

        <!-- Vertical Overlay-->
        <div class="vertical-overlay"></div>
