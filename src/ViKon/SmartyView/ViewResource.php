<?php


namespace ViKon\SmartyView;

new \Smarty();

/**
 * Class ViewResource
 *
 * @package ViKon\SmartyView
 *
 * @author Kovács Vince
 */
class ViewResource extends \Smarty_Internal_Resource_File
{

    /**
     * @param \Smarty_Template_Source   $source
     * @param \Smarty_Internal_Template $_template
     *
     * @return string
     */
    protected function buildFilepath(\Smarty_Template_Source $source, \Smarty_Internal_Template $_template = null)
    {
        return \View::getFinder()
                    ->find($source->name);
    }
}