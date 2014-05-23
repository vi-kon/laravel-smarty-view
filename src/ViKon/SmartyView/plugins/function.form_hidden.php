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
function smarty_function_form_hidden($params, &$smarty)
{
    if (!isset($params['_name']))
    {
        throw new SmartyException('Missing _name attribute for form_hidden tag');
    }
    $name  = $params['_name'];
    $value = isset($params['_value'])
        ?
        $params['_value']
        :
        null;
    unset($params['_name']);
    unset($params['_value']);

    return Form::hidden($name, $value, $params);
}