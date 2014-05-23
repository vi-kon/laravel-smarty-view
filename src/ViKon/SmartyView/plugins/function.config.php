<?php
/**
 * @param array                    $params
 * @param Smarty_Internal_Template $smarty
 *
 * @throws SmartyException
 * @return mixed
 *
 * @author Kovács Vince
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
