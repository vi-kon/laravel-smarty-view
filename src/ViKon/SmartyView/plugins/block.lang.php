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
function smarty_block_lang($params, $content, Smarty_Internal_Template &$smarty, &$repeat)
{
    if (is_null($content))
    {
        return '';
    }
    $content = trim($content);

    if (array_key_exists('_count', $params))
    {
        $count = $params['_count'];
        unset($params['_count']);

        $translated = Lang::choice($content, $count, $params);
    }
    else
    {
        $translated = Lang::get($content, $params);
    }

    return $translated;
}
