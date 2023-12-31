<header id="page-topbar">
    <div class="navbar-header">
        <div class="d-flex">
            <!-- LOGO -->
            <div class="navbar-brand-box">
                <a href="index.html" class="logo logo-dark">
                    <span class="logo-sm">
                        <img src="{{ asset('assets/images/logo/ninja_hr_logo.png') }}" alt="logo-sm" height="22">
                    </span>
                    <span class="logo-lg">
                        <img src="{{ asset('assets/images/logo/ninja_hr_logo.png') }}" alt="logo-sm" height="22">

                    </span>
                </a>

                <a href="index.html" class="logo logo-light">
                    <span class="logo-sm">
                        <img src="{{ asset('assets/images/logo/ninja_hr_logo.png') }}" alt="logo-sm" height="40"
                            class="rounded-circle mt-4 "> </span>
                    <span class="logo-lg ">
                        <img src="{{ asset('assets/images/logo/ninja_hr_logo.png') }}" alt="logo-sm" height="60"
                            class="rounded-circle m-2">
                    </span>
                </a>
            </div>

            <button type="button" class="btn btn-sm px-3 font-size-24 header-item waves-effect" id="vertical-menu-btn">
                <i class="ri-menu-2-line align-middle"></i>
            </button>

            <!-- App Search-->
            <form class="app-search d-none d-lg-block">
                <div class="position-relative">
                    <input type="text" class="form-control" placeholder="Search...">
                    <span class="ri-search-line"></span>
                </div>
            </form>


        </div>

        <div class="d-flex">

            <div class="dropdown d-inline-block d-lg-none ms-2">
                <button type="button" class="btn header-item noti-icon waves-effect" id="page-header-search-dropdown"
                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="ri-search-line"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0"
                    aria-labelledby="page-header-search-dropdown">

                    <form class="p-3">
                        <div class="mb-3 m-0">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search ...">
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="submit"><i
                                            class="ri-search-line"></i></button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="dropdown d-none d-lg-inline-block ms-1">
                <button type="button" class="btn header-item noti-icon waves-effect" data-toggle="fullscreen">
                    <i class="ri-fullscreen-line"></i>
                </button>
            </div>
            <div class="dropdown d-inline-block user-dropdown">
                <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img class="rounded-circle header-profile-user"
                        src="{{ !empty(Auth::user()->profile) ? url(Auth::user()->profile) : url('images/no_image.jpeg') }}"
                        alt="Header Avatar">
                    <span class="d-none d-xl-inline-block ms-1"> {{ Auth::user()->name }}</span>
                    <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-end">
                    <!-- item-->
                    <a class="dropdown-item"
                        href="{{ Auth::user()->role === 'hr' ? route('profile', Auth::user()->id) : route('myprofile', Auth::user()->id) }}"><i
                            class="ri-user-line align-middle me-1"></i>
                        Profile</a>
                    <a class="dropdown-item"
                        href="{{ Auth::user()->role === 'hr' ? route('employee.change_password', Auth::user()->id) : route('my.change_password', Auth::user()->id) }}"><i
                            class="ri-user-line align-middle me-1"></i>
                        Change Password</a>



                    <div class="dropdown-divider"></div>
                    @guest
                        @if (Route::has('login'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                        @endif

                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                    @else
                        <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                        {{-- <li class=" nav-item dropdown">
                            <a id="dropdownMenuButton" class="nav-link dropdown-toggle" href="#" role="button"
                                data-mdb-toggle="dropdown" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>


                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </ul>
                        </li> --}}

                    @endguest
                    {{-- <a class="dropdown-item text-danger" href="#"><i
                                    class="ri-shut-down-line align-middle me-1 text-danger"></i> Logout</a> --}}
                </div>
            </div>
        </div>
    </div>
</header>
