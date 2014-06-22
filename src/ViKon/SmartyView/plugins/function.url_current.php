<?php

/**
 * @param array                    $params
 * @param Smarty_Internal_Template $smarty
 *
 * @return string
 *
 * @author Kovács Vince
 */
function smarty_function_url_current($params, Smarty_Internal_Template &$smarty)
{
    return \URL::current();
}