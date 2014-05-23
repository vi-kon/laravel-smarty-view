<?php

/**
 * @param array                    $params
 * @param Smarty_Internal_Template $smarty
 *
 * @throws SmartyException
 *
 * @author Kovács Vince
 */
function smarty_function_datatable_column($params, &$smarty)
{
    if (!class_exists('Datatable'))
    {
        throw new SmartyException('chumper/datatable not installed');
    }

    if (!isset($params['label']) && !isset($params['token']))
    {
        throw new SmartyException('Missing label or token attribute for datatable_column tag');
    }

    $tables = $smarty->getVariable('datatables')->value;
    /** @var \Chumper\Datatable\Table $table */
    $table = end($tables);
    $table->addColumn(isset($params['label'])
                          ? $params['label']
                          : Lang::get($params['token']));

    $options = array();
    if (isset($params['sortable']))
    {
        $options['orderable'] = (bool) $params['sortable'];
    }
    if (isset($params['orderable']))
    {
        $options['orderable'] = (bool) $params['orderable'];
    }
    if (isset($params['width']))
    {
        $options['width'] = $params['width'];
    }
    if (isset($params['class']))
    {
        $options['className'] = $params['class'];
    }
    if (isset($params['type']) && in_array($params['type'], array('html', 'string', 'numeric', 'date')))
    {
        $options['cellType'] = $params['type'];
    }

    $tableOptions              = $table->getOptions();
    $tableOptions['columns'][] = count($options) == 0
        ? null
        : $options;
    $table->setOptions($tableOptions);
}