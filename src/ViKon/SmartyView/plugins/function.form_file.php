<?php

function smarty_function_form_file($params, &$smarty)
{
    if (!isset($params['_name']))
    {
        throw new SmartyException('Missing _name attribute for form_text tag');
    }
    $name = $params['_name'];
    unset($params['_name']);

    return Form::file($name, $params);
}