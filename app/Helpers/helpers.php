<?php
// active link
if (!function_exists('activeLink')) {
    function activeLink($route_name, $class = 'active')
    {
        return request()->routeIs($route_name) ? $class : '';
    }
}
