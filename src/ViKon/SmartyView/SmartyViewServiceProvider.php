<?php namespace ViKon\SmartyView;

use Illuminate\Support\ServiceProvider;

/**
 * Class SmartyViewServiceProvider
 *
 * @package ViKon\SmartyView
 *
 * @author Kovács Vince
 */
class SmartyViewServiceProvider extends ServiceProvider
{

    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot()
    {
        $this->package('vi-kon/smarty-view');
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $app      = $this->app;
        $resolver = function () use ($app)
        {
            return new SmartyView($app['config']);
        };

        $this->app['view']->addExtension('tpl', 'smarty', $resolver);
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return array();
    }
}
