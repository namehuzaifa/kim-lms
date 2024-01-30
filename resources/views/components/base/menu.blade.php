<!-- BEGIN: Header-->
    <style>
        .zoominout{
            animation: zoom 2s infinite;
        }
        @keyframes zoom {
            0% {transform: scale(1);}
            50% {transform: scale(1.2);}
            100% {transform: scale(1);}
        }

        .menu-collapsed .main-menu ul li.get-free-session{display: none}
        .main-menu .navbar-header .navbar-brand {
            margin-top: 0.35rem;
        }
        .main-menu .navbar-header {
            padding: 0.35rem 1rem 0.3rem 1rem;
        }

        .main-menu.menu-light .navigation > li.active > a, .main-menu.menu-light .navigation > li ul .active {
            background: linear-gradient(118deg, #118CFF, rgb(17 140 255 / 64%));
            box-shadow: 0 0 10px 1px #118cffa1;
        }

        .main-menu.menu-light .navigation > li.active > a {
            border-radius: 10px;
        }

    </style>
    <nav class="header-navbar navbar navbar-expand-lg align-items-center floating-nav navbar-light navbar-shadow container-xxl">
        <div class="navbar-container d-flex content">

            <ul class="nav navbar-nav align-items-center ms-auto">

                <li class="nav-item d-none d-lg-block"><a class="nav-link nav-link-style"><i class="ficon" data-feather="moon"></i></a></li>

                {{-- <li class="nav-item dropdown dropdown-notification me-25"><a class="nav-link" href="#" data-bs-toggle="dropdown"><i class="ficon" data-feather="bell"></i><span class="badge rounded-pill bg-danger badge-up">5</span></a>
                    <ul class="dropdown-menu dropdown-menu-media dropdown-menu-end">
                        <li class="dropdown-menu-header">
                            <div class="dropdown-header d-flex">
                                <h4 class="notification-title mb-0 me-auto">Notifications</h4>
                                <div class="badge rounded-pill badge-light-primary">6 New</div>
                            </div>
                        </li>
                        <li class="scrollable-container media-list"><a class="d-flex" href="#">
                                <div class="list-item d-flex align-items-start">
                                    <div class="me-1">
                                        <div class="avatar"><img src="../../../app-assets/images/portrait/small/avatar-s-15.jpg" alt="avatar" width="32" height="32"></div>
                                    </div>
                                    <div class="list-item-body flex-grow-1">
                                        <p class="media-heading"><span class="fw-bolder">Congratulation Sam ðŸŽ‰</span>winner!</p><small class="notification-text"> Won the monthly best seller badge.</small>
                                    </div>
                                </div>
                            </a><a class="d-flex" href="#">
                                <div class="list-item d-flex align-items-start">
                                    <div class="me-1">
                                        <div class="avatar"><img src="../../../app-assets/images/portrait/small/avatar-s-3.jpg" alt="avatar" width="32" height="32"></div>
                                    </div>
                                    <div class="list-item-body flex-grow-1">
                                        <p class="media-heading"><span class="fw-bolder">New message</span>&nbsp;received</p><small class="notification-text"> You have 10 unread messages</small>
                                    </div>
                                </div>
                            </a><a class="d-flex" href="#">
                                <div class="list-item d-flex align-items-start">
                                    <div class="me-1">
                                        <div class="avatar bg-light-danger">
                                            <div class="avatar-content">MD</div>
                                        </div>
                                    </div>
                                    <div class="list-item-body flex-grow-1">
                                        <p class="media-heading"><span class="fw-bolder">Revised Order ðŸ‘‹</span>&nbsp;checkout</p><small class="notification-text"> MD Inc. order updated</small>
                                    </div>
                                </div>
                            </a>
                            <div class="list-item d-flex align-items-center">
                                <h6 class="fw-bolder me-auto mb-0">System Notifications</h6>
                                <div class="form-check form-check-primary form-switch">
                                    <input class="form-check-input" id="systemNotification" type="checkbox" checked="">
                                    <label class="form-check-label" for="systemNotification"></label>
                                </div>
                            </div><a class="d-flex" href="#">
                                <div class="list-item d-flex align-items-start">
                                    <div class="me-1">
                                        <div class="avatar bg-light-danger">
                                            <div class="avatar-content"><i class="avatar-icon" data-feather="x"></i></div>
                                        </div>
                                    </div>
                                    <div class="list-item-body flex-grow-1">
                                        <p class="media-heading"><span class="fw-bolder">Server down</span>&nbsp;registered</p><small class="notification-text"> USA Server is down due to high CPU usage</small>
                                    </div>
                                </div>
                            </a><a class="d-flex" href="#">
                                <div class="list-item d-flex align-items-start">
                                    <div class="me-1">
                                        <div class="avatar bg-light-success">
                                            <div class="avatar-content"><i class="avatar-icon" data-feather="check"></i></div>
                                        </div>
                                    </div>
                                    <div class="list-item-body flex-grow-1">
                                        <p class="media-heading"><span class="fw-bolder">Sales report</span>&nbsp;generated</p><small class="notification-text"> Last month sales report generated</small>
                                    </div>
                                </div>
                            </a><a class="d-flex" href="#">
                                <div class="list-item d-flex align-items-start">
                                    <div class="me-1">
                                        <div class="avatar bg-light-warning">
                                            <div class="avatar-content"><i class="avatar-icon" data-feather="alert-triangle"></i></div>
                                        </div>
                                    </div>
                                    <div class="list-item-body flex-grow-1">
                                        <p class="media-heading"><span class="fw-bolder">High memory</span>&nbsp;usage</p><small class="notification-text"> BLR Server using high memory</small>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="dropdown-menu-footer"><a class="btn btn-primary w-100" href="#">Read all notifications</a></li>
                    </ul>
                </li> --}}
                <li class="nav-item dropdown dropdown-user"><a class="nav-link dropdown-toggle dropdown-user-link" id="dropdown-user" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <div class="user-nav d-sm-flex d-none">
                            <span class="user-name fw-bolder">{{ auth()->user()->name }}</span>
                            <span class="user-status">{{ ucwords(auth()->user()->user_role) }}</span>
                        </div><span class="avatar">
                            <img class="round" src="{{ asset('/assets/images/avatar.png') }}" alt="avatar" height="40" width="40"><span class="avatar-status-online"></span></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdown-user">
                        <a class="dropdown-item" href="{{ route('user-edit', auth()->user()->id) }}"><i class="me-50" data-feather="user"></i> Profile</a>
                        <div class="dropdown-divider"></div>
                        {{-- <a class="dropdown-item" href="page-account-settings-account.html"><i class="me-50" data-feather="settings"></i> Settings</a> --}}
                        {{-- <a class="dropdown-item" href="{{ route('logout') }}"><i class="me-50" data-feather="power"></i> Logout</a> --}}
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();">
                                <i class="me-50" data-feather="power"></i> Logout
                            </a>
                        </form>

                    </div>
                </li>
            </ul>
        </div>
    </nav>

    <ul class="main-search-list-defaultlist-other-list d-none">
        <li class="auto-suggestion justify-content-between"><a class="d-flex align-items-center justify-content-between w-100 py-50">
                <div class="d-flex justify-content-start"><span class="me-75" data-feather="alert-circle"></span><span>No results found.</span></div>
            </a></li>
    </ul>
    <!-- END: Header-->


    <!-- BEGIN: Main Menu-->
    <div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
        <div class="navbar-header">
            <ul class="nav navbar-nav flex-row">
                <li class="nav-item me-auto">
                    <a class="navbar-brand" href="{{ route('home') }}">
                        <span class="brand-logo">
                            <img src="{{asset('/')}}assets/images/menu_logo.png"  width="100%" style="max-width: 50px">
                            {{-- <svg viewbox="0 0 139 95" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" height="24">
                                <defs>
                                    <lineargradient id="linearGradient-1" x1="100%" y1="10.5120544%" x2="50%" y2="89.4879456%">
                                        <stop stop-color="#000000" offset="0%"></stop>
                                        <stop stop-color="#FFFFFF" offset="100%"></stop>
                                    </lineargradient>
                                    <lineargradient id="linearGradient-2" x1="64.0437835%" y1="46.3276743%" x2="37.373316%" y2="100%">
                                        <stop stop-color="#EEEEEE" stop-opacity="0" offset="0%"></stop>
                                        <stop stop-color="#FFFFFF" offset="100%"></stop>
                                    </lineargradient>
                                </defs>
                                <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <g id="Artboard" transform="translate(-400.000000, -178.000000)">
                                        <g id="Group" transform="translate(400.000000, 178.000000)">
                                            <path class="text-primary" id="Path" d="M-5.68434189e-14,2.84217094e-14 L39.1816085,2.84217094e-14 L69.3453773,32.2519224 L101.428699,2.84217094e-14 L138.784583,2.84217094e-14 L138.784199,29.8015838 C137.958931,37.3510206 135.784352,42.5567762 132.260463,45.4188507 C128.736573,48.2809251 112.33867,64.5239941 83.0667527,94.1480575 L56.2750821,94.1480575 L6.71554594,44.4188507 C2.46876683,39.9813776 0.345377275,35.1089553 0.345377275,29.8015838 C0.345377275,24.4942122 0.230251516,14.560351 -5.68434189e-14,2.84217094e-14 Z" style="fill:currentColor"></path>
                                            <path id="Path1" d="M69.3453773,32.2519224 L101.428699,1.42108547e-14 L138.784583,1.42108547e-14 L138.784199,29.8015838 C137.958931,37.3510206 135.784352,42.5567762 132.260463,45.4188507 C128.736573,48.2809251 112.33867,64.5239941 83.0667527,94.1480575 L56.2750821,94.1480575 L32.8435758,70.5039241 L69.3453773,32.2519224 Z" fill="url(#linearGradient-1)" opacity="0.2"></path>
                                            <polygon id="Path-2" fill="#000000" opacity="0.049999997" points="69.3922914 32.4202615 32.8435758 70.5039241 54.0490008 16.1851325"></polygon>
                                            <polygon id="Path-21" fill="#000000" opacity="0.099999994" points="69.3922914 32.4202615 32.8435758 70.5039241 58.3683556 20.7402338"></polygon>
                                            <polygon id="Path-3" fill="url(#linearGradient-2)" opacity="0.099999994" points="101.428699 0 83.0667527 94.1480575 130.378721 47.0740288"></polygon>
                                        </g>
                                    </g>
                                </g>
                            </svg> --}}
                        </span>
                        <h2 class="brand-text"> <img src="{{asset('/')}}assets/images/menu_logo2.png"  width="100%" style="max-width: 125px"></h2>
                    </a></li>
                <li class="nav-item nav-toggle"><a class="nav-link modern-nav-toggle pe-0" data-bs-toggle="collapse"><i class="d-block d-xl-none text-primary toggle-icon font-medium-4" data-feather="x"></i><i class="d-none d-xl-block collapse-toggle-icon font-medium-4  text-primary" data-feather="disc" data-ticon="disc"></i></a></li>
            </ul>
        </div>
        <div class="shadow-bottom"></div>
        <div class="main-menu-content">
            <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">

                <li class="nav-item {{ navActive(['dashboard']) }}">
                    <a class="d-flex align-items-center" href="{{ route('dashboard') }}">
                        <i data-feather='home'></i>
                        <span class="menu-title text-truncate" data-i18n="Dashboards">Dashboard</span>
                    </a>
                </li>

                @if (auth()->user()->user_role == "admin")

                    <li class="nav-item">
                        <a class="d-flex align-items-center" href="#">
                            <i data-feather='users'></i>
                            <span class="menu-title text-truncate" data-i18n="Invoice">Users</span>
                        </a>
                            <ul class="menu-content">
                                <li class="{{ navActive(['user-list', 'user-edit']) }}">
                                    <a class="d-flex align-items-center" href="{{ route('user-list') }}">
                                        <i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="List">List</span>
                                    </a>
                                </li>

                                <li class="{{ navActive(['user-create']) }}">
                                    <a class="d-flex align-items-center" href="{{ route('user-create') }}">
                                        <i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Add">Add new</span>
                                    </a>
                                </li>
                                <li class="{{ navActive(['access-token-list']) }}">
                                    <a class="d-flex align-items-center" href="{{ route('access-token-list') }}">
                                        <i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Add">Api Token</span>
                                    </a>
                                </li>
                            </ul>
                    </li>

                    <li class="nav-item"><a class="d-flex align-items-center" href="#">
                        <i data-feather='book-open'></i>
                        <span class="menu-title text-truncate" data-i18n="Invoice">On Demand Sessions</span></a>
                        <ul class="menu-content">
                            <li class="{{ navActive(['coaching-list', 'coaching-edit']) }}">
                                <a class="d-flex align-items-center" href="{{ route('coaching-list') }}">
                                    <i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="List">List</span>
                                </a>
                            </li>

                            <li class="{{ navActive(['coaching-create']) }}">
                                <a class="d-flex align-items-center" href="{{ route('coaching-create') }}">
                                    <i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Add">Add new</span>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item"><a class="d-flex align-items-center" href="#">
                        <i data-feather='book-open'></i>
                        <span class="menu-title text-truncate" data-i18n="Invoice">Schedule Sessions</span></a>
                        <ul class="menu-content">
                            <li class="{{ navActive(['grade-list', 'grade-edit']) }}">
                                <a class="d-flex align-items-center" href="{{ route('grade-list') }}">
                                    <i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="List">Grade list</span>
                                </a>
                            </li>


                        </ul>
                    </li>

                    {{-- <li class="nav-item"><a class="d-flex align-items-center" href="#">
                        <i data-feather='airplay'></i>
                        <span class="menu-title text-truncate" data-i18n="Invoice">Courses</span></a>
                        <ul class="menu-content">
                            <li class="{{ navActive(['courses-list', 'courses-edit']) }}">
                                <a class="d-flex align-items-center" href="{{ route('courses-list') }}">
                                    <i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="List">List</span>
                                </a>
                            </li>

                            <li class="{{ navActive(['courses-create']) }}">
                                <a class="d-flex align-items-center" href="{{ route('courses-create') }}">
                                    <i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Add">Add new</span>
                                </a>
                            </li>
                        </ul>
                    </li> --}}

                    <li class="nav-item"><a class="d-flex align-items-center" href="#">
                        <i data-feather='calendar'></i>
                        <span class="menu-title text-truncate" data-i18n="Invoice">Booked Session</span></a>
                        <ul class="menu-content">
                            <li class="{{ navActive(['session-list', 'session-edit']) }}">
                                <a class="d-flex align-items-center" href="{{ route('session-list') }}">
                                    <i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="List">List</span>
                                </a>
                            </li>
                            <li class="{{ navActive(['today-session-list']) }}">
                                <a class="d-flex align-items-center" href="{{ route('today-session-list','today=true') }}">
                                    <i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="List">Today session</span>
                                </a>
                            </li>
                            <li class="{{ navActive(['pending-session-list']) }}">
                                <a class="d-flex align-items-center" href="{{ route('pending-session-list', "status=pending") }}">
                                    <i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="List">Pending session</span>
                                </a>
                            </li>
                            <li class="{{ navActive(['done-session-list']) }}">
                                <a class="d-flex align-items-center" href="{{ route('done-session-list', "status=done") }}">
                                    <i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="List">Done session</span>
                                </a>
                            </li>

                            {{-- <li class="{{ navActive(['session-create']) }}">
                                <a class="d-flex align-items-center" href="{{ route('session-create') }}">
                                    <i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Add">Add new</span>
                                </a>
                            </li> --}}
                        </ul>
                    </li>

                    {{-- <li class="nav-item"><a class="d-flex align-items-center" href="#">
                        <i data-feather='message-circle'></i>
                        <span class="menu-title text-truncate" data-i18n="Invoice">Blog</span></a>
                        <ul class="menu-content">
                            <li class="{{ navActive(['blog-list', 'blog-edit']) }}">
                                <a class="d-flex align-items-center" href="{{ route('blog-list') }}">
                                    <i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="List">List</span>
                                </a>
                            </li>

                            <li class="{{ navActive(['blog-create']) }}">
                                <a class="d-flex align-items-center" href="{{ route('blog-create') }}">
                                    <i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Add">Add new</span>
                                </a>
                            </li>
                        </ul>
                    </li> --}}

                    {{-- <li class="nav-item"><a class="d-flex align-items-center" href="#">
                        <i data-feather='mic'></i>
                        <span class="menu-title text-truncate" data-i18n="Invoice">Podcast</span></a>
                        <ul class="menu-content">
                            <li class="{{ navActive(['poadcast-list', 'poadcast-edit']) }}">
                                <a class="d-flex align-items-center" href="{{ route('poadcast-list') }}">
                                    <i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="List">List</span>
                                </a>
                            </li>

                            <li class="{{ navActive(['poadcast-create']) }}">
                                <a class="d-flex align-items-center" href="{{ route('poadcast-create') }}">
                                    <i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Add">Add new</span>
                                </a>
                            </li>
                        </ul>
                    </li> --}}

                    {{-- <li class="nav-item"><a class="d-flex align-items-center" href="#">
                        <i data-feather='file-plus'></i>
                        <span class="menu-title text-truncate" data-i18n="Invoice">Pages</span></a>
                        <ul class="menu-content">
                            <li class="{{ navActive(['page-list', 'page-edit']) }}">
                                <a class="d-flex align-items-center" href="{{ route('page-list') }}">
                                    <i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="List">List</span>
                                </a>
                            </li>

                            <li class="{{ navActive(['page-create']) }}">
                                <a class="d-flex align-items-center" href="{{ route('page-create') }}">
                                    <i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Add">Add new</span>
                                </a>
                            </li>
                        </ul>
                    </li> --}}

                    {{-- <li class="nav-item"><a class="d-flex align-items-center" href="#">
                        <i data-feather='database'></i>
                        <span class="menu-title text-truncate" data-i18n="Invoice">Contact Query</span></a>
                        <ul class="menu-content">
                            <li class="{{ navActive(['contact-querys', "contact"]) }}">
                                <a class="d-flex align-items-center" href="{{ route('contact-querys', "contact") }}">
                                    <i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="List">Contact</span>
                                </a>
                            </li>
                            <li class="{{ navActive(['group-coaching-querys', "group-coaching"]) }}">
                                <a class="d-flex align-items-center" href="{{ route('group-coaching-querys', "group-coaching") }}">
                                    <i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="List">Group Coaching</span>
                                </a>
                            </li>
                            <li class="{{ navActive(['webinars-querys', "webinars"]) }}">
                                <a class="d-flex align-items-center" href="{{ route('webinars-querys', "webinars") }}">
                                    <i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="List">Webinars</span>
                                </a>
                            </li>
                        </ul>
                    </li> --}}

                    {{-- <li class="nav-item {{ navActive(['guide-tracking']) }}">
                        <a class="d-flex align-items-center" href="{{ route('guide-tracking') }}">
                            <i data-feather='search'></i>
                            <span class="menu-title text-truncate" data-i18n="Dashboards">Guide Tracking</span>
                        </a>
                    </li>

                    <li class="nav-item {{ navActive(['newsletter-list']) }}">
                        <a class="d-flex align-items-center" href="{{ route('newsletter-list') }}">
                            <i data-feather='mail'></i>
                            <span class="menu-title text-truncate" data-i18n="Dashboards">News Letter</span>
                        </a>
                    </li> --}}


                    {{-- <li class="nav-item">
                        <a class="d-flex align-items-center" href="{{ route('cms-page-edit','about') }}">
                            <i data-feather='airplay'></i>
                            <span class="menu-title text-truncate" data-i18n="Charts">Pages Content</span>
                        </a>

                        <ul class="menu-content">
                            <li class="{{ isset(request()->route()->parameters()['type']) && request()->route()->parameters()['type'] == "home" ? "active" : '' }}">
                                <a class="d-flex align-items-center" href="{{ route('cms-page-edit', 'home') }}">
                                    <i data-feather="circle"></i>
                                    <span class="menu-item text-truncate" data-i18n="Apex">Home</span>
                                </a>
                            </li>
                            <li class="{{ isset(request()->route()->parameters()['type']) && request()->route()->parameters()['type'] == "about" ? "active" : '' }}">
                                <a class="d-flex align-items-center" href="{{ route('cms-page-edit', 'about') }}">
                                    <i data-feather="circle"></i>
                                    <span class="menu-item text-truncate" data-i18n="Apex">About</span>
                                </a>
                            </li>
                            <li class="{{ isset(request()->route()->parameters()['type']) && request()->route()->parameters()['type'] == "site" ? "active" : '' }}">
                                <a class="d-flex align-items-center" href="{{ route('cms-page-edit', 'site') }}">
                                    <i data-feather="circle"></i>
                                    <span class="menu-item text-truncate" data-i18n="Apex">Site information</span>
                                </a>
                            </li>
                            <li class="{{ navActive(['testimnonial-create','testimnonial-edit','testimnonial-list']) }}">
                                <a class="d-flex align-items-center" href="{{ route('testimnonial-list') }}">
                                    <i data-feather="circle"></i>
                                    <span class="menu-item text-truncate" data-i18n="Apex">Testimnonials</span>
                                </a>
                            </li>
                        </ul>
                    </li> --}}
{{--
                    <li class="nav-item"><a class="d-flex align-items-center" href="#">
                        <i data-feather='file-plus'></i>
                        <span class="menu-title text-truncate" data-i18n="Invoice">Site Setting</span></a>
                        <ul class="menu-content">
                            <li class="{{ navActive(['site-setting']) }}">
                                <a class="d-flex align-items-center" href="{{ route('site-setting') }}">
                                    <i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="List">Pages colours</span>
                                </a>
                            </li>
                        </ul>
                    </li> --}}


                @endif

                @if (auth()->user()->user_role == "coach")

                    <li class="nav-item {{ navActive(['user']) }}">
                        <a class="d-flex align-items-center" href="{{ route('user-edit', auth()->user()->id) }}">
                            <i data-feather='user'></i>
                            <span class="menu-title text-truncate" data-i18n="Dashboards">Profile</span>
                        </a>
                    </li>

                    <li class="nav-item"><a class="d-flex align-items-center" href="#">
                        <i data-feather='book-open'></i>
                        <span class="menu-title text-truncate" data-i18n="Invoice">Sessions</span></a>
                        <ul class="menu-content">
                            <li class="{{ navActive(['coaching-list', 'coaching-edit']) }}">
                                <a class="d-flex align-items-center" href="{{ route('coaching-list') }}">
                                    <i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="List">List</span>
                                </a>
                            </li>

                            <li class="{{ navActive(['coaching-create']) }}">
                                <a class="d-flex align-items-center" href="{{ route('coaching-create') }}">
                                    <i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Add">Add new</span>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item"><a class="d-flex align-items-center" href="#">
                        <i data-feather='calendar'></i>
                        <span class="menu-title text-truncate" data-i18n="Invoice">Booked Session</span></a>
                        <ul class="menu-content">
                            <li class="{{ navActive(['session-list', 'session-edit']) }}">
                                <a class="d-flex align-items-center" href="{{ route('session-list') }}">
                                    <i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="List">List</span>
                                </a>
                            </li>
                            <li class="{{ navActive(['today-session-list']) }}">
                                <a class="d-flex align-items-center" href="{{ route('today-session-list','today=true') }}">
                                    <i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="List">Today session</span>
                                </a>
                            </li>
                            <li class="{{ navActive(['pending-session-list']) }}">
                                <a class="d-flex align-items-center" href="{{ route('pending-session-list', "status=pending") }}">
                                    <i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="List">Pending session</span>
                                </a>
                            </li>
                            <li class="{{ navActive(['done-session-list']) }}">
                                <a class="d-flex align-items-center" href="{{ route('done-session-list', "status=done") }}">
                                    <i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="List">Done session</span>
                                </a>
                            </li>

                            {{-- <li class="{{ navActive(['session-create']) }}">
                                <a class="d-flex align-items-center" href="{{ route('session-create') }}">
                                    <i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Add">Add new</span>
                                </a>
                            </li> --}}
                        </ul>
                    </li>
                @endif

                @if (auth()->user()->user_role == "user")

                    <li class="nav-item {{ navActive(['user']) }}">
                        <a class="d-flex align-items-center" href="{{ route('user-edit', auth()->user()->id) }}">
                            <i data-feather='user'></i>
                            <span class="menu-title text-truncate" data-i18n="Dashboards">Profile</span>
                        </a>
                    </li>
                    <li class="nav-item {{ navActive(['session-list']) }}">
                        <a class="d-flex align-items-center" href="{{ route('session-list',auth()->user()->id) }}">
                            <i data-feather='calendar'></i>
                            <span class="menu-title text-truncate" data-i18n="Dashboards">Booked Session</span>
                        </a>
                    </li>
                    <li class="nav-item {{ navActive(['payment-list']) }}">
                        <a class="d-flex align-items-center" href="{{ route('payment-list') }}">
                            <i data-feather='dollar-sign'></i>
                            <span class="menu-title text-truncate" data-i18n="Dashboards">Payment list</span>
                        </a>
                    </li>
                    {{-- <li class="nav-item {{ navActive(['payment-list']) }}">
                        <a class="d-flex align-items-center" href="{{ route('coaching') }}">
                            <i data-feather='file-plus'></i>
                            <span class="menu-title text-truncate" data-i18n="Dashboards">Book New Session</span>
                        </a>
                    </li> --}}

                    @if (isset(getFreeSessionUrl()->slug) && getUserSessionCount() == 0)
                        <li class="m-2 get-free-session" style="white-space: normal">
                            {{-- <div class="card">
                                <div class="card-body">
                                    <p>Once it has been set up you can do these things</p> --}}
                                    <a href="{{ route('session-create', getFreeSessionUrl()->slug) }}" class="btn btn-primary me-1 waves-effect waves-float waves-light zoominout">Book Free Session Now</a>
                                {{-- </div>
                            </div> --}}
                        </li>
                    @endif
                @endif
            </ul>
        </div>
    </div>
    <!-- END: Main Menu-->
