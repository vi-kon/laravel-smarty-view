<?php

/**
 * @param array                    $params
 * @param Smarty_Internal_Template $smarty
 *
 * @return string
 *
 * @author Kovács Vince
 */
function smarty_function_form_reset($params, Smarty_Internal_Template &$smarty)
{
    $value = isset($params['_value'])
        ? $params['_value']
        : null;

    unset($params['_value']);

    return Form::reset(Lang::get($value), $params);
}