<?php
class Pricelists_Shop_Form_Component extends Kwc_Form_Component
{
    public static function getSettings()
    {
        $ret = parent::getSettings();
        $ret['componentName'] = trlStatic('Produkt-Formular');
        $ret['generators']['child']['component']['success'] = 'Pricelists_Shop_Form_Success_Component';
        $ret['useAjaxRequest'] = false;
        return $ret;
    }

    protected function _beforeInsert(Kwf_Model_Row_Interface $row)
    {
        parent::_beforeInsert($row);
        $row->shop_id = $this->getData()->parent->getRow()->id;
        $row->component_id = 'root-products';
    }
}
