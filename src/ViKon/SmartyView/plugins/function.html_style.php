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
function smarty_function_html_style($params, &$smarty)
{
    if (!isset($params['_url']))
    {
        throw new SmartyException('Missing _url attribute for html_style tag');
    }
    $url = $params['_url'];
    unset($params['_url']);

    return HTML::style($url, $params);
}