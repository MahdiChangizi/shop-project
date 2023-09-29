<nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
    id="layout-navbar">
    <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
        <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
            <i class="ti ti-menu-2 ti-sm"></i>
        </a>
    </div>

    <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">

        <ul class="navbar-nav flex-row align-items-center ms-auto">
            <!-- Style Switcher -->
            <li class="nav-item me-2 me-xl-0">
                <a class="nav-link style-switcher-toggle hide-arrow" href="javascript:void(0);">
                    <i class="ti ti-md"></i>
                </a>
            </li>
            <!--/ Style Switcher -->

            <!-- User -->
            <li class="nav-item navbar-dropdown dropdown-user dropdown">
                <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                    <div class="avatar avatar-online">
                        @if(auth()->user()->profile)
                            <img src="{{ asset(auth()->user()->profile->profile) }}" alt class="h-auto rounded-circle" />
                        @else
                            <img src="{{ asset('assets/img/user.jpg') }}" alt class="h-auto rounded-circle" />
                        @endif
                    </div>
                </a>

                <ul class="dropdown-menu dropdown-menu-end">
                    <li>
                        <a class="dropdown-item" href="{{ route('admin.profile.setting') }}">
                            <div class="d-flex">
                                <div class="flex-shrink-0 me-3">
                                    <div class="avatar avatar-online">
                                        @if(auth()->user()->profile)
                                            <img src="{{ asset(auth()->user()->profile->profile) }}" alt class="h-auto rounded-circle" />
                                        @else
                                            <img src="{{ asset('assets/img/user.jpg') }}" alt class="h-auto rounded-circle" />
                                        @endif
                                    </div>
                                </div>
                                <div class="flex-grow-1">
                                    <span class="fw-semibold d-block">{{ auth()->user()->userName }}</span>
                                    <small class="text-muted">Admin</small>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <div class="dropdown-divider"></div>
                    </li>
                    <li>
                        <a class="dropdown-item" href="{{ route('admin.profile.index') }}">
                            <i class="ti ti-user-check me-2 ti-sm"></i>
                            <span class="align-middle">پروفایل من</span>
                        </a>
                    </li>

                    <li>
                        <a class="dropdown-item" href="{{ route('admin.profile.setting') }}">
                            <i class="ti ti-settings me-2 ti-sm"></i>
                            <span class="align-middle">تنظیمات</span>
                        </a>
                    </li>
                    
                    <li>
                        <div class="dropdown-divider"></div>
                    </li>

                    <li>
                        <form action="{{ route('auth.logout') }}" method="POST">
                            @csrf
                            <button class="dropdown-item" target="_blank">
                                <i class="ti ti-logout me-2 ti-sm"></i>
                                <span type="submit" class="align-middle">خروج</span>
                            </button>
                        </form>
                    </li>

                </ul>
            </li>
            <!--/ User -->
        </ul>
    </div>
</nav>
