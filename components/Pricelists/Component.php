<?php
class Pricelists_Component extends Kwc_Abstract
{
    public static function getSettings()
    {
        $ret = parent::getSettings();
        $ret['childModel'] = 'Shops';
        $ret['componentName'] = trlStatic('Geschäfts-Preislisten');
        $ret['generators']['child'] = array(
            'class' => 'Kwf_Component_Generator_Page_Table',
            'component' => 'Pricelists_Shop_Component'
        );
        return $ret;
    }

    public function getTemplateVars(Kwf_Component_Renderer_Abstract $renderer = null)
    {
        $ret = parent::getTemplateVars($renderer);
        $ret['firstChild'] = $this->getData()->getChildComponent();
        return $ret;
    }
}
