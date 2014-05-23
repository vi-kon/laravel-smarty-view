<?php

function smarty_function_url_full($params, &$smarty)
{
    return \URL::full();
}