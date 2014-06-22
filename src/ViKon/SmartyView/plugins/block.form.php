<?php

/**
 * @param array                    $params
 * @param string                   $content
 * @param Smarty_Internal_Template $smarty
 * @param boolean                  $repeat
 *
 * @return string
 *
 * @author Kovács Vince
 */
function smarty_block_form($params, $content, Smarty_Internal_Template &$smarty, &$repeat)
{
    if (is_null($content))
    {
        return '';
    }

    return Form::open($params)
           . $content
           . Form::close();
}