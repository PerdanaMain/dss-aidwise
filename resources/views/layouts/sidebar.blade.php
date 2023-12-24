<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="{{ route('dashboard') }}" class="app-brand-link">
            <span class="menu-text fw-semibold ms-2" style="font-size:36px;color:#11235A;font-weigth:700;">AidWise</span>
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
            <i class="mdi menu-toggle-icon d-xl-block align-middle mdi-20px"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1 mt-3">
        {{-- get route name --}}
        @php
            $isactive = false;
            $route = Route::currentRouteName();

        @endphp

        <!-- Dashboards -->
        <li class="menu-item {{ $route == 'dashboard' ? 'active' : '' }}">
            <a href="{{ route('dashboard') }}" class="menu-link">
                <div data-i18n="Analytics">Dashboard</div>
            </a>
        </li>
        <li class="menu-item {{ $route == 'ahp' ? 'active' : '' }}">
            <a href="{{ route('ahp') }}" class="menu-link">
                <div data-i18n="Analytics">Perhitungan AHP</div>
            </a>
        </li>
        <li class="menu-item {{ $route == 'valuation' ? 'active' : '' }}">
            <a href="{{ route('valuation') }}" class="menu-link">
                <div data-i18n="Analytics">Kriteria</div>
            </a>
        </li>
        <li class="menu-item {{ $route == 'people' ? 'active' : '' }}">
            <a href="{{ route('people') }}" class="menu-link">
                <div data-i18n="Analytics">Alternatif</div>
            </a>
        </li>
    </ul>
</aside>
