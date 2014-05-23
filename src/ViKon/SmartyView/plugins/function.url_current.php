<?php

function smarty_function_url_current($params, &$smarty)
{
    return \URL::current();
}