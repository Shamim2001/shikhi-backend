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
                <h1 class="text-white p-3">Shikhi</h1>
            </span>
        </a>
        <!-- Light Logo-->
        <a href="index-2.html" class="logo logo-light">
            <span class="logo-sm">
                <img src="{{ asset('backend') }}/assets/images/logo-sm.png" alt="" height="22">
            </span>
            <span class="logo-lg">
                <h1 class="text-white p-3">Shikhi</h1>
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
                    <a class="nav-link menu-link" href="#sidebarPermissions" data-bs-toggle="collapse" role="button"
                        aria-expanded="false" aria-controls="sidebarPermissions">
                        <i class="mdi mdi-account-circle-outline"></i> <span data-key="t-dashboards">User
                            Management</span>
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
                    <a class="nav-link menu-link" href="{{ route('course.index') }}">
                        <i class="mdi mdi-speedometer"></i> <span data-key="t-dashboards">Courses</span>
                    </a>
                </li> <!-- end courses -->

                <li class="nav-item">
                    <a class="nav-link menu-link" href="{{ route('category.index') }}">
                        <i class="mdi mdi-account-circle-outline"></i> <span data-key="t-dashboards">Category</span>
                    </a>
                </li> <!-- end Category -->
                <li class="nav-item">
                    <a class="nav-link menu-link" href="{{ route('user.index') }}">
                        <i class="mdi mdi-account-circle-outline"></i> <span data-key="t-dashboards">Users</span>
                    </a>
                </li> <!-- end User -->
                <li class="nav-item">
                    <a class="nav-link menu-link" href="{{ route('lesson.index') }}" {{ request()->routeIs('lesson.') ? 'active' : ''}}>
                        <i class="mdi mdi-account-circle-outline"></i> <span data-key="t-dashboards">Lessons</span>
                    </a>
                </li> <!-- end Lesson -->
            </ul>
        </div>
        <!-- Sidebar -->
    </div>

    <div class="sidebar-background"></div>
</div>
<!-- Left Sidebar End -->

<!-- Vertical Overlay-->
<div class="vertical-overlay"></div>
