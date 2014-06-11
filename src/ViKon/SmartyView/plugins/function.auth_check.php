<?php
/**
 * @param array                    $params
 * @param Smarty_Internal_Template $smarty
 *
 * @return bool
 *
 * @author Kovács Vince
 */
function smarty_function_auth_check($params, $smarty)
{
    return \Auth::check();
}
