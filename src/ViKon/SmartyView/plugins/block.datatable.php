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
function smarty_block_datatable($params, $content, &$smarty, &$repeat)
{
    if (!class_exists('Datatable'))
    {
        throw new SmartyException('chumper/datatable not installed');
    }

    if ($repeat)
    {
        $options = array(
            'processing'  => true,
            'bProcessing' => true,
            'stateSave'   => true,
            'autoWidth'   => false,
            'columns'     => array(),
        );

        $table = Datatable::table();

        if (isset($params['url']))
        {
            $table->setUrl($params['url']);
            unset($params['url']);
        }
        elseif (isset($params['action']))
        {
            $table->setUrl(URL::action($params['action']));
            unset($params['action']);
        }

        if (isset($params['searching']))
        {
            $options['searching'] = $params['searching'];
        }

        if (isset($params['lengthChange']))
        {
            $options['lengthChange'] = $params['lengthChange'];
        }

        if (isset($params['class']))
        {
            $table->setClass($params['class']);
        }

        $table->setOptions($options);
        $smarty->append('datatables', $table);
    }
    else
    {
        $tables = $smarty->getVariable('datatables')->value;
        $table  = array_pop($tables);
        $smarty->assign('datatables', $tables);

        if (isset($params['view']))
        {
            return $table->render($params['view']);
        }

        return $table->render('datatable');
    }

    return '';
}
