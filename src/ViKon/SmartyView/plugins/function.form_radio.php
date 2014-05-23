<?php
function smarty_function_form_radio($params, &$smarty)
{
    if (!isset($params['_name']))
    {
        throw new SmartyException('Missing _name attribute for form_radio tag');
    }
    $name    = $params['_name'];
    $value   = isset($params['_value'])
        ? $params['_value']
        : null;
    $checked = isset($params['_checked'])
        ? (bool) $params['_checked']
        : null;
    unset($params['_name']);
    unset($params['_value']);
    unset($params['_checked']);

    return Form::radio($name, $value, $checked, $params);
}