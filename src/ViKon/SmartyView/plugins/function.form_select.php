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
function smarty_function_form_select($params, Smarty_Internal_Template &$smarty)
{
    if (!isset($params['_name']))
    {
        throw new SmartyException('Missing _name attribute for form_select tag');
    }
    $name = $params['_name'];

    $list = isset($params['_default'])
        ? array($params['_default'])
        : array();

    $list = array_merge($list, isset($params['_list'])
        ? $params['_list']
        : array());

    $selected = isset($params['_selected'])
        ? $params['_selected']
        : (isset($params['_populate']) && $params['_populate']
            ? \Input::get($name)
            : null);

    $range = isset($params['_range']) && $params['_range'];

    unset($params['_name']);
    unset($params['_list']);
    unset($params['_selected']);
    unset($params['_range']);

    if ($range)
    {
        if (!isset($params['_begin']))
        {
            throw new SmartyException('Missing _begin attribute for form_select tag');
        }

        if (!isset($params['_end']))
        {
            throw new SmartyException('Missing _end attribute for form_select tag');
        }

        $begin = $params['_begin'];
        $end   = $params['_end'];

        unset($params['_begin']);
        unset($params['_end']);

        return Form::selectRange($name, $begin, $end, $selected, $params);
    }

    return Form::select($name, $list, $selected, $params);
}