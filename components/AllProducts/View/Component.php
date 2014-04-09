<?php
class AllProducts_View_Component extends Pricelists_Shop_List_View_Component
{
    public function getTemplateVars(Kwf_Component_Renderer_Abstract $renderer = null)
    {
        $ret = parent::getTemplateVars($renderer);
        $ret['title'] = $this->getData()->getPage()->name;
        return $ret;
    }
}
