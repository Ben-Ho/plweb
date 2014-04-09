<?php
class Directory_Products_Detail_Form_Component extends Kwc_Form_Component
{
    public static function getSettings()
    {
        $ret = parent::getSettings();
        $ret['viewCache'] = false;
        $ret['componentName'] = trlStatic('Editiere Preis');
        $ret['generators']['child']['component']['header'] = 'Directory_Products_Detail_Form_Header_Component';
        $ret['generators']['child']['component']['success'] = 'Directory_Products_Detail_Form_Success_Component';
        return $ret;
    }

    protected function _initForm()
    {
        parent::_initForm();
        $this->_form->setId($this->getData()->parent->getRow()->id);
    }
}
