<?php


/**
 * @param array                    $params
 * @param string                   $content
 * @param Smarty_Internal_Template $smarty
 * @param boolean                  $repeat
 *
 * @throws SmartyException
 * @return string
 *
 * @author Kovács Vince
 */
function smarty_block_form_label($params, $content, &$smarty, &$repeat)
{
    if (is_null($content))
    {
        return '';
    }

    if (!isset($params['_name']))
    {
        throw new SmartyException('Missing _name attribute for form_label tag');
    }
    $name    = $params['_name'];
    $content = trim($content);
    unset($params['_name']);

    return Form::label($name, Lang::get($content), $params);
}