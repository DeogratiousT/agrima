<div class="sidebar-menu">
    <ul class="menu">
        <li class="sidebar-title">Menu</li>

        <li class="sidebar-item @if(request()->routeIs('dashboard')) active @endif">
            <a href="{{ route('dashboard') }}" class="sidebar-link">
            <i class="bi bi-grid-fill"></i>
            <span>Dashboard</span>
            </a>
        </li>

        <li class="sidebar-title">Probes</li>

        <li class="sidebar-item @if(request()->routeIs('temperatures*')) active @endif">
            <a href="{{ route('temperatures.index') }}" class="sidebar-link">
                <i class="bi bi-thermometer-half"></i>
            <span>Temperature</span>
            </a>
        </li>

        <li class="sidebar-item @if(request()->routeIs('humidities*')) active @endif">
            <a href="{{ route('humidities.index') }}" class="sidebar-link">
                <i class="bi bi-moisture"></i>
              <span>Humidity</span>
            </a>
        </li>

        <li class="sidebar-item @if(request()->routeIs('atmospheric-pressures*')) active @endif">
            <a href="{{ route('atmospheric-pressures.index') }}" class="sidebar-link">
                <i class="bi bi-wind"></i>
              <span>Atmospheric Pressure</span>
            </a>
        </li>

        <li class="sidebar-title">Settings</li>

        <li class="sidebar-item @if(request()->routeIs('users*')) active @endif">
            <a href="{{ route('users.index') }}" class="sidebar-link">
              <i class="bi bi-person-lines-fill"></i>
              <span>Users</span>
            </a>
        </li>

        <li class="sidebar-item @if(request()->routeIs('probe-settings*')) active @endif">
            <a href="{{ route('probe-settings.index') }}" class="sidebar-link">
              <i class="bi bi-gear"></i>
              <span>Probe Settings</span>
            </a>
        </li>

        {{-- <li class="sidebar-item has-sub">
            <a href="#" class="sidebar-link">
                <i class="bi bi-stack"></i>
                <span>Components</span>
            </a>

            <ul class="submenu">
                <li class="submenu-item">
                    <a href="#" class="submenu-link">Accordion</a>
                </li>

                <li class="submenu-item">
                    <a href="#" class="submenu-link">Alert</a>
                </li>
            </ul>
        </li> --}}
    </ul>
</div>