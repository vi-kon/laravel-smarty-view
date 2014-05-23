<?php
function smarty_function_form_submit($params, &$smarty)
{
    $value = isset($params['_value'])
        ?
        $params['_value']
        :
        null;
    unset($params['_value']);

    return Form::submit(Lang::get($value), $params);
}