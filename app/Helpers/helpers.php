<?php
// active link
if (!function_exists('activeLink')) {
    function activeLink($route_name, $class = 'active')
    {
        return request()->routeIs($route_name) ? $class : '';
    }
}

// Product Image Path for cards
if (!function_exists('productImage')) {
    function productImage($product)
    {
        return $product->hasMedia('product_image') ? $product->getFirstMediaUrl('product_image', 'thumbnail') : 'https://placehold.co/600x400';
    }
}