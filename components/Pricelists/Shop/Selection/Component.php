<?php
class Pricelists_Shop_Selection_Component extends Kwc_Abstract
{
    public static function getSettings()
    {
        $ret = parent::getSettings();
        $ret['assets']['dep'][] = 'KwfSwitchDisplay';
        return $ret;
    }

    public function getTemplateVars(Kwf_Component_Renderer_Abstract $renderer = null)
    {
        $ret = parent::getTemplateVars($renderer);
        $ret['pricelists'][] = $this->getData()->parent;
        foreach ($this->getData()->parent->parent->getChildComponents() as $pricelist) {
            if (!in_array($pricelist, $ret['pricelists'])) {
                $ret['pricelists'][] = $pricelist;
            }
        }
        return $ret;
    }
}
