<?php

use App\Models\Admin\Menu;
use Illuminate\Support\Str;

if (!function_exists('getStaticPageUrl')) {
function getStaticPageUrl($pageTitle)
{
    switch ($pageTitle) {
        case 'Why Acharyakulam':
            return '/introduction';
        // Add more static page URLs as needed
        default:
            return '/';
    }
}
}

if (!function_exists('getMenuData')) {
    function getMenuData()
    {
        return Menu::with('subMenu')
                    ->where('status', 2)
                    ->where('menu_position', 1)
                    ->where('menu_category', 1)
                    ->get();
    } 
}



?>