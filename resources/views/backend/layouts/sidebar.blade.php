<!-- ========== App Menu ========== -->
<div class="app-menu navbar-menu">
    <!-- LOGO -->
    <div class="navbar-brand-box">
        <!-- Dark Logo-->
        <a href="{{ route('dashboard.index') }}" class="logo logo-dark">
            <span class="logo-sm">
                <img src="{{ asset('backend') }}/assets/images/logo-sm.png" alt="" height="22">
            </span>
            <span class="logo-lg">
                <img src="{{ asset('backend') }}/assets/images/shikhi.png" alt="" height="70">
            </span>
        </a>
        <!-- Light Logo-->
        <a href="{{ route('dashboard.index') }}" class="logo logo-light">
            <span class="logo-sm">
                <img src="{{ asset('backend') }}/assets/images/logo-sm.png" alt="" height="22">
            </span>
            <span class="logo-lg">
                <img src="{{ asset('backend') }}/assets/images/shikhi.png" alt="" height="70">
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
                    <a class="nav-link menu-link {{ request()->routeIs('dashboard.*') ? 'active' : '' }}"
                        href="{{ route('dashboard.index') }}">
                        <i class="mdi mdi-speedometer"></i> <span data-key="t-dashboards">Dashboards</span>
                    </a>
                </li> <!-- end Dashboard Menu -->

                <li class="nav-item">
                    <a class="nav-link menu-link {{ request()->routeIs('user.*') ? 'active' : '' }}"
                        href="{{ route('user.index') }}">
                        <i class="mdi mdi-account-circle-outline"></i> <span data-key="t-users">Users</span>
                    </a>
                </li> <!-- end User -->
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
                    <a class="nav-link menu-link {{ request()->routeIs('course.*') ? 'active' : '' }}"
                        href="{{ route('course.index') }}">
                        <i class="las la-book-open "></i> <span data-key="t-dashboards">Courses</span>
                    </a>
                </li> <!-- end courses -->

                <li class="nav-item">
                    <a class="nav-link menu-link {{ request()->routeIs('lesson.*') ? 'active' : '' }}"
                        href="{{ route('lesson.index') }}">
                        <i class="las la-book-reader"></i> <span data-key="t-lessons">Lessons</span>
                    </a>
                </li> <!-- end Lesson -->

                <li class="nav-item">
                    <a class="nav-link menu-link {{ request()->routeIs('category.*') ? 'active' : '' }}"
                        href="{{ route('category.index') }}">
                        <i class=" las la-tag"></i> <span data-key="t-category">Category</span>
                    </a>
                </li> <!-- end Category -->

                <li class="nav-item">
                    <a class="nav-link menu-link {{ request()->routeIs('tag.*') ? 'active' : '' }}"
                        href="{{ route('tag.index') }}">
                        <i class=" las la-tag"></i> <span data-key="t-tags">Tags</span>
                    </a>
                </li> <!-- end Tags -->





                <li class="nav-item">
                    <a class="nav-link menu-link {{ request()->routeIs('review.*') ? 'active' : '' }}"
                        href="{{ route('review.index') }}">
                        <i class="las la-star "></i> <span data-key="t-lessons">Reviews</span>
                    </a>
                </li> <!-- end review -->
            </ul>
        </div>
        <!-- Sidebar -->
    </div>

    <div class="sidebar-background"></div>
</div>
<!-- Left Sidebar End -->

<!-- Vertical Overlay-->
<div class="vertical-overlay"></div>
