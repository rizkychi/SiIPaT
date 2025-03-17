<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\Component;

class Menu extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $view,
    ){}

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $admin = [
            (object) [
                'name' => 'Dashboard',
                'icon' => 'ri-dashboard-2-line',
                'route' => 'dashboard.index',
                'show' => true,
            ],
            (object) [
                'name' => 'Pengaturan',
                'icon' => 'mdi mdi-cog-outline',
                'route' => 'password.index',
                'show' => false,
            ],
            (object) [
                'name' => 'Profile',
                'icon' => 'mdi mdi-account-circle',
                'route' => 'profile.index',
                'show' => false,
            ],
            // (object) [
            //     'name' => 'Penjadwalan',
            //     'icon' => 'mdi mdi-calendar-multiselect',
            //     'route' => null,
            //     'show' => true,
            //     'slug' => 'schedule',
            //     'submenus' => [
            //         (object) [
            //             'name' => 'Jadwal Reguler',
            //             'icon' => 'ri-calendar-todo-line',
            //             'route' => 'regular',
            //             'show' => true,
            //         ],
            //         (object) [
            //             'name' => 'Jadwal Shift',
            //             'icon' => 'ri-calendar-2-fill ',
            //             'route' => 'sift',
            //             'show' => true,
            //         ],
            //     ],
            // ],
        ];

        $user = [
            // (object) [
            //     'name' => 'Dashboard',
            //     'icon' => 'ri-dashboard-2-line',
            //     'route' => 'dashboard.index',
            // ],
            (object) [
                'name' => 'Pengaturan',
                'icon' => 'mdi mdi-cog-outline',
                'route' => 'password.index',
                'show' => false,
            ],
            (object) [
                'name' => 'Profile',
                'icon' => 'mdi mdi-account-circle',
                'route' => 'profile.index',
                'show' => false,
            ],
        ];

        $role = Auth::user()->role;
        if ($role == 'superadmin' || $role == 'admin') {
            $menus = $admin;
        } else {
            $menus = $user;
        }
        
        return view('components.'.$this->view, compact('menus'));
    }
}
