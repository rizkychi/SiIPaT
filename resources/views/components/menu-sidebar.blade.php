<ul class="navbar-nav" id="navbar-nav">
    <li class="menu-title"><span data-key="t-menu">Menu</span></li>

    @php $currentRoute = Route::currentRouteName(); @endphp

    @foreach ($menus as $menu)
        @php
            $menuRoute = $menu->route;
            // $menuPrefix = $menuRoute ? explode('.', $menuRoute)[0] : null;
            $isMenuActive = $menuRoute && $menuRoute === $currentRoute;
            $route = $menuRoute ? route($menuRoute) : '#';

            $baseRoute = $currentRoute ? implode('.', array_slice(explode('.', $currentRoute), 0, -1)) . '.index' : null;

            $submenuActive = false;
            if (!empty($menu->submenus)) {
                $submenuActive = collect($menu->submenus)
                    ->pluck('route')
                    ->contains($baseRoute);
            }
        @endphp

        <li class="nav-item">
            {{-- Menu tanpa submenu --}}
            @if (empty($menu->submenus))
                <a class="nav-link menu-link {{ $isMenuActive ? 'active' : '' }} {{ $menu->show ? '' : 'd-none' }}" href="{{ $route }}">
                    <i class="{{ $menu->icon }}"></i> <span data-key="t-widgets">{{ $menu->name }}</span>
                </a>

            {{-- Menu dengan submenu --}}
            @else
                <a class="nav-link menu-link {{ $submenuActive ? 'active' : '' }} {{ $menu->show ? '' : 'd-none' }}"
                   href="#sidebar{{ $menu->slug }}"
                   data-bs-toggle="collapse"
                   role="button"
                   aria-expanded="{{ $submenuActive ? 'true' : 'false' }}"
                   aria-controls="sidebar{{ $menu->slug }}">
                    <i class="{{ $menu->icon }}"></i> <span data-key="t-widgets">{{ $menu->name }}</span>
                </a>

                <div class="collapse menu-dropdown {{ $submenuActive ? 'show' : '' }}" id="sidebar{{ $menu->slug }}">
                    <ul class="nav nav-sm flex-column">
                        @foreach ($menu->submenus as $sub)
                            @php
                                $subRoute = $sub->route;
                                $isSubActive = $subRoute && $subRoute === $baseRoute;
                                $subUrl = $subRoute ? route($subRoute) : '#';
                            @endphp
                            <li class="nav-item">
                                <a class="nav-link {{ $isSubActive ? 'active' : '' }} {{ $sub->show ? '' : 'd-none' }}" href="{{ $subUrl }}">
                                    <i class="{{ $sub->icon }}"></i> <span data-key="t-widgets">{{ $sub->name }}</span>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </li>
    @endforeach
</ul>
