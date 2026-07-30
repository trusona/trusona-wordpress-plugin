<?php

// PHPUnit bootstrap. The plugin's include files guard on ABSPATH and call a
// handful of WordPress functions, so define the guard and load lightweight
// shims before any test (or include) is loaded.

if (!defined('ABSPATH')) {
    define('ABSPATH', __DIR__ . '/');
}

require_once __DIR__ . '/fixture-functions.php';
