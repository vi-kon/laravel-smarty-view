<?php

/**
 * @param array                    $params
 * @param Smarty_Internal_Template $smarty
 *
 * @throws SmartyException
 * @return string
 *
 * @author Kovács Vince
 */
function smarty_function_html_script($params, Smarty_Internal_Template &$smarty)
{
    if (!isset($params['_url']))
    {
        throw new SmartyException('Missing _url attribute for html_script tag');
    }
    $url = $params['_url'];

    unset($params['_url']);

    return HTML::script($url, $params);
}