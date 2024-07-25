<aside class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4 "
    id="sidenav-main">
    <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
            aria-hidden="true" id="iconSidenav"></i>
        <a class="navbar-brand m-0 text-center"
            @if (Auth::user()->role == 'admin') href="{{ route('dashboard-admin') }}" @else href="{{ route('dashboard-lab') }}" @endif>
            <img src="{{ asset('argon/img/scci.png') }}" class="navbar-brand-img h-100" alt="main_logo"><br>
            <span class="ms-1 font-weight-bold">Sistem Report of Analysis</span>
        </a>
    </div>
    <hr class="horizontal dark mt-0">
    <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link {{ Route::is('dashboard-admin') || Route::is('dashboard-lab') ? 'active' : '' }}"
                    @if (Auth::user()->role == 'admin') href="{{ route('dashboard-admin') }}"
                    @else href="{{ route('dashboard-lab') }}" @endif>
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-tv-2 text-primary text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Dashboard</span>
                </a>
            </li>
            <li class="nav-item mt-3 d-flex align-items-center">
                <h6 class="ps-2 ms-2 text-uppercase text-xs font-weight-bolder opacity-6 mb-0">Pages</h6>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Route::is('dashboard') ? 'active' : '' }}" href="#">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-single-02 text-dark text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Profile</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Route::is('hasil-analisa-lab') || Route::is('data-hasil-analisa') || Route::is('add-data-analisa-astm') || Route::is('add-data-analisa-rapid') ? 'active' : '' }}"
                    @if (Auth::user()->role == 'admin') href="{{ route('hasil-analisa-lab') }}"
                    @else href="{{ route('data-hasil-analisa') }}" @endif>
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-single-copy-04 text-dark text-sm opacity-10"></i>
                    </div>
                    @if (Auth::user()->role == 'admin')
                        <span class="nav-link-text ms-1">Data Hasil Analisa Lab</span>
                    @else
                        <span class="nav-link-text ms-1">Data Analisa</span>
                    @endif
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Route::is('data-report') || Route::is('add-report-analisa-astm') || Route::is('add-report-analisa-rapid') ? 'active' : '' }}"
                    href="{{ route('data-report') }}">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-archive-2 text-dark text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Data Report of Analysis</span>
                </a>
            </li>
        </ul>
    </div>

</aside>
