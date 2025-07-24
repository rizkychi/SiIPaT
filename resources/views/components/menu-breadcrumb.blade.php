@php
    $currentMenu = null;
    $currentParent = null;
    $currentRoute = Route::currentRouteName();

    // Tambahan: Deteksi aksi (edit/create)
    $routeAction = null;
    $baseRoute = $currentRoute;
    
    if (str_ends_with($currentRoute, '.create')) {
        $routeAction = 'Tambah';
        $baseRoute = str_replace('.create', '.index', $currentRoute);
    } elseif (str_ends_with($currentRoute, '.edit')) {
        $routeAction = 'Edit';
        $baseRoute = str_replace('.edit', '.index', $currentRoute);
    }

    foreach ((array) $menus as $menu) {
        // Check parent menu - cek exact match atau base route
        if ($menu->route && ($currentRoute === $menu->route || $baseRoute === $menu->route)) {
            $currentMenu = $menu;
            break;
        }

        // Check submenu - cek exact match atau base route
        if (!empty($menu->submenus)) {
            foreach ((array) $menu->submenus as $sub) {
                if ($sub->route && ($currentRoute === $sub->route || $baseRoute === $sub->route)) {
                    $currentMenu = $sub;
                    $currentParent = $menu;
                    break 2;
                }
            }
        }
    }

@endphp

<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between bg-galaxy-transparent">
            <h4 class="mb-sm-0">{{ $currentMenu->name }}</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    {{-- <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li> --}}
                    @if (@$currentParent)
                        <li class="breadcrumb-item"><a href="javascript: void(0);">{{ $currentParent->name }}</a></li>
                    @endif
                    @if ($currentMenu)
                        @if ($routeAction)
                            <li class="breadcrumb-item"><a href="{{ route($baseRoute) }}">{{ $currentMenu->name }}</a></li>
                        @else
                            <li class="breadcrumb-item active">{{ $currentMenu->name }}</li>
                        @endif
                    @endif

                    @if ($routeAction)
                        <li class="breadcrumb-item active">{{ $routeAction }}</li>
                    @endif
                </ol>
            </div>

        </div>
    </div>
</div>