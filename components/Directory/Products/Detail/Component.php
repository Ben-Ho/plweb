<?php
class Directory_Products_Detail_Component extends Kwc_Directories_Item_Detail_Component
{
    public static function getSettings()
    {
        $ret = parent::getSettings();
        $ret['componentName'] = trlStatic('Produkt');
        $ret['generators']['editForm'] = array(
            'class' => 'Kwf_Component_Generator_Page_Static',
            'component' => 'Directory_Products_Detail_Form_Component',
            'name' => trlStatic('Produkt bearbeiten')
        );
        return $ret;
    }

    public function getTemplateVars(Kwf_Component_Renderer_Abstract $renderer = null)
    {
        $ret = parent::getTemplateVars($renderer);
        $ret['editForm'] = $this->getData()->getChildComponent('_editForm');
        $ret['productId'] = $this->getData()->getRow()->id;
        return $ret;
    }
}
