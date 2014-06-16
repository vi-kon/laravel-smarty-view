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
function smarty_function_form_checkbox($params, &$smarty)
{
    if (!isset($params['_name']))
    {
        throw new SmartyException('Missing _name attribute for form_checkbox tag');
    }
    $name = $params['_name'];

    $value = isset($params['_value'])
        ? $params['_value']
        : null;

    $checked = isset($params['_checked'])
        ? (bool) $params['_checked']
        : (isset($params['_populate']) && $params['_populate']
            ? (bool) \Input::get($name)
            : null);

    unset($params['_name']);
    unset($params['_value']);
    unset($params['_checked']);

    return Form::checkbox($name, $value, $checked, $params);
}