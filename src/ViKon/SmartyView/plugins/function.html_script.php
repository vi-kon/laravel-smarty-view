<?php

function smarty_function_html_script($params, &$smarty)
{
    if (!isset($params['_url']))
    {
        throw new SmartyException('Missing _url attribute for html_script tag');
    }
    $url = $params['_url'];
    unset($params['_url']);

    return HTML::script($url, $params);
}