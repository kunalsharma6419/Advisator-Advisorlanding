<nav class="navbar col-lg-12 col-12 p-lg-0 fixed-top d-flex flex-row">
    <div class="navbar-menu-wrapper d-flex align-items-stretch justify-content-between">
        <a class="navbar-brand brand-logo-mini align-self-center d-lg-none" href="{{route('home')}}"><img
                src="../src/assets/logo/AdvisatorLogo.png" alt="logo" style="width: 180px;"/></a>
        <button class="navbar-toggler navbar-toggler align-self-center me-2" type="button" data-toggle="minimize">
            <i class="mdi mdi-menu"></i>
        </button>
        {{-- <ul class="navbar-nav">
            <li class="nav-item dropdown">
                <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="#"
                    data-bs-toggle="dropdown">
                    <i class="mdi mdi-bell-outline"></i>
                    <span class="count count-varient1">7</span>
                </a>
                <div class="dropdown-menu navbar-dropdown navbar-dropdown-large preview-list"
                    aria-labelledby="notificationDropdown">
                    <h6 class="p-3 mb-0 ">Notifications</h6>
                    <a class="dropdown-item preview-item">
                        <div class="preview-thumbnail">
                            <img src="../../../admin/assets/images/faces/face4.jpg" alt="" class="profile-pic">
                        </div>
                        <div class="preview-item-content">
                            <p class="mb-0">Dany Miles <span class="text-small text-muted">commented on
                                    your photo</span></p>
                        </div>
                    </a>
                    <a class="dropdown-item preview-item">
                        <div class="preview-thumbnail">
                            <img src="../../../admin/assets/images/faces/face3.jpg" alt="" class="profile-pic">
                        </div>
                        <div class="preview-item-content">
                            <p class="mb-0">James <span class="text-small text-muted">posted a photo on
                                    your wall</span></p>
                        </div>
                    </a>
                    <a class="dropdown-item preview-item">
                        <div class="preview-thumbnail">
                            <img src="../../../admin/assets/images/faces/face2.jpg" alt="" class="profile-pic">
                        </div>
                        <div class="preview-item-content">
                            <p class="mb-0">Alex <span class="text-small text-muted">just mentioned you
                                    in his post</span></p>
                        </div>
                    </a>
                    <div class="dropdown-divider"></div>
                    <p class="p-3 mb-0 ">View all activities</p>
                </div>
            </li>
            <li class="nav-item dropdown d-none d-sm-flex">
                <a class="nav-link count-indicator dropdown-toggle" id="messageDropdown" href="#"
                    data-bs-toggle="dropdown">
                    <i class="mdi mdi-email-outline"></i>
                    <span class="count  count-varient2">5</span>
                </a>
                <div class="dropdown-menu navbar-dropdown navbar-dropdown-large preview-list"
                    aria-labelledby="messageDropdown">
                    <h6 class="p-3 mb-0 ">Messages</h6>
                    <a class="dropdown-item preview-item">
                        <div class="preview-item-content flex-grow">
                            <span class="badge badge-pill badge-success">Request</span>
                            <p class="text-small text-muted ellipsis mb-0"> Suport needed for user123 </p>
                        </div>
                        <p class="text-small text-muted align-self-start">4:10 PM</p>
                    </a>
                    <a class="dropdown-item preview-item">
                        <div class="preview-item-content flex-grow">
                            <span class="badge badge-pill badge-warning">Invoices</span>
                            <p class="text-small text-muted ellipsis mb-0"> Invoice for order is mailed
                            </p>
                        </div>
                        <p class="text-small text-muted align-self-start">4:10 PM</p>
                    </a>
                    <a class="dropdown-item preview-item">
                        <div class="preview-item-content flex-grow">
                            <span class="badge badge-pill badge-danger">Projects</span>
                            <p class="text-small text-muted ellipsis mb-0"> New project will start tomorrow
                            </p>
                        </div>
                        <p class="text-small text-muted align-self-start">4:10 PM</p>
                    </a>
                    <h6 class="p-3 mb-0 ">See all activity</h6>
                </div>
            </li>
            <li class="nav-item nav-search border-0 ms-1 ms-md-3 ms-lg-5 d-none d-md-flex">
                <form class="nav-link form-inline mt-2 mt-md-0">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search">
                        <div class="input-group-append">
                            <span class="input-group-text">
                                <i class="mdi mdi-magnify"></i>
                            </span>
                        </div>
                    </div>
                </form>
            </li>
        </ul> --}}
        <ul class="navbar-nav navbar-nav-right ml-lg-auto">
            {{-- <li class="nav-item dropdown d-none d-xl-flex border-0">
                <a class="nav-link dropdown-toggle" id="languageDropdown" href="#" data-bs-toggle="dropdown">
                    <i class="mdi mdi-earth"></i> English </a>
                <div class="dropdown-menu navbar-dropdown" aria-labelledby="languageDropdown">
                    <a class="dropdown-item" href="#"> French </a>
                    <a class="dropdown-item" href="#"> Spain </a>
                    <a class="dropdown-item" href="#"> Latin </a>
                    <a class="dropdown-item" href="#"> Japanese </a>
                </div>
            </li> --}}
            <li class="nav-item  nav-profile dropdown border-0">
                @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                    <a class="nav-link dropdown-toggle" id="profileDropdown" href="{{ url('user/profile') }}"
                        data-bs-toggle="dropdown">
                        <img class="nav-profile-img me-2" alt="" src="{{ Auth::user()->profile_photo_url }}">
                        <span class="profile-name">{{ Auth::user()->full_name }}</span>
                    </a>
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
                <div class="dropdown-menu navbar-dropdown w-100" aria-labelledby="profileDropdown">
                    <a class="dropdown-item" href="#">
                        <i class="mdi mdi-cached me-2 text-success"></i> Activity Log </a>
                    {{-- <a class="dropdown-item" href="#">
                        <i class="mdi mdi-logout me-2 text-primary"></i> Signout </a> --}}
                    <a href="#"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                        class="dropdown-item">
                        <i class="mdi mdi-logout me-2 text-primary"></i>
                        Log Out
                    </a>
                    <form method="post" id="logout-form" action="{{ route('logout') }}" style="display:none;">
                        @csrf
                    </form>
                </div>
            </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
            data-toggle="offcanvas">
            <span class="mdi mdi-menu"></span>
        </button>
    </div>
</nav>
