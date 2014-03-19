<?php
class Pricelists_Shop_Component extends Kwc_Abstract_Composite_Component
{
    public static function getSettings()
    {
        $ret = parent::getSettings();
        $ret['componentName'] = trlStatic('Geschäfts-Preisliste');
        $ret['generators']['child']['component']['selection'] = 'Pricelists_Shop_Selection_Component';
        $ret['generators']['child']['component']['form'] = 'Pricelists_Shop_Form_Component';
        $ret['generators']['child']['component']['pricelist'] = 'Pricelists_Shop_List_Component';
        return $ret;
    }

    public function getTemplateVars(Kwf_Component_Renderer_Abstract $renderer = null)
    {
        $ret = parent::getTemplateVars($renderer);
        return $ret;
    }
}
