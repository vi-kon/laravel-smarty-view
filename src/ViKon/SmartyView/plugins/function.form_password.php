<?php
function smarty_function_form_password($params, &$smarty)
{
    if (!isset($params['_name']))
    {
        throw new SmartyException('Missing _name attribute for form_password tag');
    }
    $name = $params['_name'];
    unset($params['_name']);

    return Form::password($name, $params);
}