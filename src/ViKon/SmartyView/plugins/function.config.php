<?php
/**
 * @param array                    $params
 * @param Smarty_Internal_Template $smarty
 *
 * @return mixed
 * @throws SmartyException
 */
function smarty_function_config($params, $smarty)
{
    if (!isset($params['key']))
    {
        throw new SmartyException('Missing key attribute for config tag');
    }

    if (isset($params['default']))
    {
        return Config::get($params['key'], $params['default']);
    }

    return Config::get($params['key']);
}
