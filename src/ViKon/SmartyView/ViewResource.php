<?php


namespace ViKon\SmartyView;

new \Smarty();

class ViewResource extends \Smarty_Internal_Resource_File
{

    protected function buildFilepath(\Smarty_Template_Source $source, \Smarty_Internal_Template $_template = null)
    {
        return \View::getFinder()
                    ->find($source->name);
    }
}