<?php

function smarty_function_url($params, &$smarty)
{
    if (!isset($params['_name']))
    {
        throw new SmartyException('Missing _name attribute for url tag');
    }
    $name = $params['_name'];
    unset($params['_name']);

    return URL::route($name, $params);
}