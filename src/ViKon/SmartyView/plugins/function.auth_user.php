<?php
/**
 * @param array                    $params
 * @param Smarty_Internal_Template $smarty
 *
 * @return \Illuminate\Auth\UserInterface|null
 *
 * @author Kovács Vince
 */
function smarty_function_auth_user($params, $smarty)
{
    return \Auth::user();
}
