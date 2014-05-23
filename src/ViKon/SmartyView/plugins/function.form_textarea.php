<?php
function smarty_function_form_textarea($params, &$smarty)
{
    if (!isset($params['_name']))
    {
        throw new SmartyException('Missing _name attribute for form_text tag');
    }
    $name  = $params['_name'];
    $value = isset($params['_value'])
        ? $params['_value']
        : null;
    unset($params['_name']);
    unset($params['_value']);

    return Form::textarea($name, $value, $params);
}