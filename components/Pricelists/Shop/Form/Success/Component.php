<?php
class Pricelists_Shop_Form_Success_Component extends Kwc_Abstract
{
    public function getTemplateVars(Kwf_Component_Renderer_Abstract $renderer = null)
    {
        $ret = parent::getTemplateVars($renderer);
        Header('Location: '.$this->getData()->parent->getUrl());
        exit;
    }
}
