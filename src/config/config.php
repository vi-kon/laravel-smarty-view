<?php

return array(
    'caching'         => false,
    'debugging'       => false,
    'cache_lifetime'  => 3600,
    'compile_check'   => true,
    'error_reporting' => null,

    'template_dir'    => app_path() . '/views',
    'cache_dir'       => app_path() . '/storage/views/cache',
    'compile_dir'     => app_path() . '/storage/views/compile',

    'plugins_path'    => array(),
);