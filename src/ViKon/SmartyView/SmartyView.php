<?php


namespace ViKon\SmartyView;

use Illuminate\Config\Repository;
use Illuminate\View\Engines\EngineInterface;

/**
 * Class SmartyView
 *
 * @package ViKon\SmartyView
 *
 * @author  Kovács Vince
 */
class SmartyView implements EngineInterface
{
    /**
     * @var \Illuminate\Config\Repository
     */
    private $config;

    /**
     * @param Repository $config
     */
    public function __construct(Repository $config)
    {
        $this->config = $config;
    }

    /**
     * Get the evaluated contents of the view.
     *
     * @param  string $path
     * @param  array  $data
     *
     * @throws \Exception
     * @return string
     */
    public function get($path, array $data = array())
    {
        ob_start();

        try
        {
            $smarty = new \Smarty();

            $smarty->caching         = $this->config->get('smarty-view::caching');
            $smarty->debugging       = $this->config->get('smarty-view::debugging');
            $smarty->cache_lifetime  = $this->config->get('smarty-view::cache_lifetime');
            $smarty->compile_check   = $this->config->get('smarty-view::compile_check');
            $smarty->error_reporting = $this->config->get('smarty-view::error_reporting');

            $smarty->setTemplateDir($this->config->get('smarty-view::template_dir'));
            $smarty->setCompileDir($this->config->get('smarty-view::compile_dir'));
            $smarty->setCacheDir($this->config->get('smarty-view::cache_dir'));
            $smarty->registerResource('view', new ViewResource());

            $smarty->addPluginsDir(__DIR__ . '/plugins');
            foreach ($this->config->get('smarty-view::plugins_path', array()) as $path)
            {
                $smarty->addPluginsDir($path);
            }

            foreach ($data as $key => $value)
            {
                $smarty->assign($key, $value);
            }

            $smarty->display($path);
        } catch (\Exception $e)
        {
            ob_get_clean();
            throw $e;
        }

        return ltrim(ob_get_clean());
    }
}