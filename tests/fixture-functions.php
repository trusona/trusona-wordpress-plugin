<?php

// Minimal WordPress shims so the plugin's pure helper functions can be
// exercised without a full WordPress runtime.

if (!function_exists('home_url')) {
    function home_url() {
        return 'https://www.tacoshrimp.com/wp-admin?dipping_sauce=yesplease';
    }
}

if (!function_exists('wp_parse_url')) {
    function wp_parse_url($url, $component = -1) {
        return parse_url($url, $component);
    }
}

?>
