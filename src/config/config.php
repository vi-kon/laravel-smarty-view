<?php

return array(
    // Enable or disable caching
    'caching'         => false,
    // Enable or disable debugging
    'debugging'       => false,
    // Set cache lifetime
    'cache_lifetime'  => 3600,
    // Check compile
    'compile_check'   => true,
    // Set error reporting level in Smarty templates
    'error_reporting' => null,

    // Template directory
    'template_dir'    => app_path() . '/views',
    // Cache directory
    'cache_dir'       => app_path() . '/storage/views/cache',
    // Compile directory
    'compile_dir'     => app_path() . '/storage/views/compile',

    // Plugins directory
    'plugins_path'    => array(),
);