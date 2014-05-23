<?php

function smarty_block_form($params, $content, &$smarty, &$repeat)
{
    if (is_null($content))
    {
        return '';
    }

    return Form::open($params)
           . $content
           . Form::close();
}