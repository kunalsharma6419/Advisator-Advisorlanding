<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <div class="text-center sidebar-brand-wrapper d-flex align-items-center">
        <a class="sidebar-brand brand-logo" href="{{ route('home') }}"><img src="../src/assets/logo/AdvisatorLogo.png"
                alt="logo" style="width: 180px; height: 90px;" /></a>
        <a class="sidebar-brand brand-logo-mini ps-4 pt-3" href="{{ route('home') }}"><img
                src="../src/assets/logo/AdvisatorLogo.png" alt="logo" /></a>
    </div>
    <ul class="nav" style="margin-top: 10px;">
        <li class="nav-item nav-profile">
            <a href="{{url('user/profile')}}" class="nav-link">
                @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                    <div class="nav-profile-image">
                        <img src="{{ Auth::user()->profile_photo_url }}" alt="profile">
                        <span class="login-status online"></span>
                        <!--change to offline or busy as needed-->
                    </div>
                @else
                    <span class="inline-flex rounded-md">
                        <button type="button"
                            class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none focus:bg-gray-50 active:bg-gray-50 transition ease-in-out duration-150">
                            {{ Auth::user()->full_name }}

                            <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                            </svg>
                        </button>
                    </span>
                @endif
                <div class="nav-profile-text d-flex flex-column pe-3">
                    <span class="font-weight-medium mb-2">{{ Auth::user()->full_name }}</span>
                    <span class="font-weight-normal">{{ Auth::user()->unique_id }}</span>
                </div>
                <span class="badge badge-danger text-white ms-3 rounded">{{ Auth::user()->id }}</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('advisatoradmin.dashboard') }}">
                <i class="mdi mdi-home menu-icon"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>
        <li class="nav-item {{ request()->routeIs('advisatoradmin.nominations.list') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('advisatoradmin.nominations.list') }}">
                <i class="fa fa-users menu-icon"></i>
                <span class="menu-title">Nominations</span>
            </a>
        </li>
        <li class="nav-item {{ request()->routeIs('advisatoradmin.advisoraccounts.list') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('advisatoradmin.advisoraccounts.list') }}">
                <i class="fa fa-address-book menu-icon"></i>
                <span class="menu-title">Advisor Accounts</span>
            </a>
        </li>
        <li class="nav-item {{ request()->routeIs('advisatoradmin.contactqueries') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('advisatoradmin.contactqueries') }}">
                <i class="fa fa-phone menu-icon"></i>
                <span class="menu-title">Contact Queries</span>
            </a>
        </li>
        {{-- <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false"
                aria-controls="ui-basic">
                <i class="mdi mdi-crosshairs-gps menu-icon"></i>
                <span class="menu-title">Basic UI Elements</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="pages/ui-features/buttons.html">Buttons</a>
                    </li>
                    <li class="nav-item"> <a class="nav-link" href="pages/ui-features/dropdowns.html">Dropdowns</a>
                    </li>
                    <li class="nav-item"> <a class="nav-link" href="pages/ui-features/typography.html">Typography</a>
                    </li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#icons" aria-expanded="false" aria-controls="icons">
                <i class="mdi mdi-contacts menu-icon"></i>
                <span class="menu-title">Icons</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="icons">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="pages/icons/font-awesome.html">Font
                            Awesome</a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#forms" aria-expanded="false" aria-controls="forms">
                <i class="mdi mdi-format-list-bulleted menu-icon"></i>
                <span class="menu-title">Forms</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="forms">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="pages/forms/basic_elements.html">Form
                            Elements</a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#charts" aria-expanded="false" aria-controls="charts">
                <i class="mdi mdi-chart-bar menu-icon"></i>
                <span class="menu-title">Charts</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="charts">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="pages/charts/chartjs.html">ChartJs</a>
                    </li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#tables" aria-expanded="false" aria-controls="tables">
                <i class="mdi mdi-table-large menu-icon"></i>
                <span class="menu-title">Tables</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="tables">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="pages/tables/basic-table.html">Basic
                            table</a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#auth" aria-expanded="false"
                aria-controls="auth">
                <i class="mdi mdi-lock menu-icon"></i>
                <span class="menu-title">User Pages</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="auth">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="pages/samples/blank-page.html"> Blank
                            Page </a></li>
                    <li class="nav-item"> <a class="nav-link" href="pages/samples/error-404.html"> 404 </a>
                    </li>
                    <li class="nav-item"> <a class="nav-link" href="pages/samples/error-500.html"> 500 </a>
                    </li>
                    <li class="nav-item"> <a class="nav-link" href="pages/samples/login.html"> Login </a>
                    </li>
                    <li class="nav-item"> <a class="nav-link" href="pages/samples/register.html"> Register
                        </a></li>
                </ul>
            </div>
        </li> --}}
        {{-- <li class="nav-item">
            <a class="nav-link" href="docs/documentation.html">
                <i class="mdi mdi-file-document-box menu-icon"></i>
                <span class="menu-title">Documentation</span>
            </a>
        </li> --}}
        <li class="nav-item sidebar-actions">
            <div class="nav-link">
                <div class="mt-4">
                    <div class="border-none">
                        <p class="text-black">Notification</p>
                    </div>
                    <ul class="mt-4 ps-0">
                        <li><a href="#"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                                class="dropdown-item text-blue text-bold">
                                <i class="mdi mdi-logout me-2 text-primary"></i>
                                Sign out
                            </a></li>
                        <form method="post" id="logout-form" action="{{ route('logout') }}" style="display:none;">
                            @csrf
                        </form>
                    </ul>
                </div>
            </div>
        </li>
    </ul>
</nav>
