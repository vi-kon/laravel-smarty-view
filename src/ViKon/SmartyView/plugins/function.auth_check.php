<?php
/**
 * @param array                    $params
 * @param Smarty_Internal_Template $smarty
 *
 * @return bool
 *
 * @author Kovács Vince
 */
function smarty_function_auth_check($params, Smarty_Internal_Template $smarty)
{
    return \Auth::check();
}
