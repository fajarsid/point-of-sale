<?php

namespace App\View\Components\Admin;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Aside extends Component
{
    /**
     * Create a new component instance.
     */
    public $routes;
    public function __construct()
    {
        $this->routes = [
            [
           "label" => "Dashboard",
           "icon" => "fas fa-desktop",
           "route_name" => "dashboard",
           "route_active" => request()->routeIs('dashboard'),
           "is_dropdown" => false
            ],
            [
                "label" => "Master Data",
                "icon" => "fas fa-database",
                "route_active" => request()->routeIs('master-data.*'),
                "is_dropdown" => true,
                "dropdown" => [
                    [
                        "label" => "Kategori",
                        "icon" => "far fa-circle",
                        "route_name" => "master-data.categories.index",
                        "route_active" => request()->routeIs('master-data.categories.*'),
                    ],
                    [
                        "label" => "Produk",
                        "icon" => "far fa-circle",
                        "route_name" => "master-data.products.index",
                        "route_active" => request()->routeIs('master-data.products.*'),
                    ],
                    
                ]
            ]
        ];
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.admin.aside');
    }
}
