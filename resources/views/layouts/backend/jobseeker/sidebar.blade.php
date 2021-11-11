<div id="sidebar" class="active">
    <div class="sidebar-wrapper active">
        <div class="sidebar-header">
            <div class="d-flex justify-content-between">
                <div class="logo">
                    <a href="index.html"><img src="/backend/images/logo/logo.png" alt="Logo" srcset=""></a>
                </div>
                <div class="toggler">
                    <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                </div>
            </div>
        </div>
        <div class="sidebar-menu">
            <ul class="menu">
                <li class="sidebar-item {{ $nav_tree=='jobseeker-dashboard'?'active':'' }}">
                    <a href="{{ route('jobseeker.dashboard') }}" class='sidebar-link'>
                        <i class="bi bi-grid-fill"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li class="sidebar-item {{ $nav_tree=='jobseeker-profile'?'active':'' }}">
                    <a href="{{ route('jobseeker.profile.index') }}" class='sidebar-link'>
                        <i class="bi bi-person"></i>
                        <span>Your Profile</span>
                    </a>
                </li>
                <li class="sidebar-item {{ nav_on(['job_vacanci']) }}">
                    <a href="/jobseeker/job_vacanci" class='sidebar-link'>
                        <i class="far fa-building"></i>
                        <span>Job Vacancy</span>
                    </a>
                </li>

                <li class="sidebar-title">Jobs</li>
                <li class="sidebar-item">
                    <a href="#" class='sidebar-link'>
                        <i class="bi bi-search"></i>
                        <span>Browse</span>
                    </a>
                </li>
            </ul>

            <ul class="menu">
                <li class="sidebar-item ">
                    <a class="dropdown-item sidebar-link text-danger" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="bi bi-box-arrow-left text-danger"></i>
                        <span>Logout</span>
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </li>
            </ul>
        </div>
        <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
    </div>
</div>
