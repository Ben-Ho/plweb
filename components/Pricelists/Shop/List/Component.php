<?php
class Pricelists_Shop_List_Component extends Kwc_Directories_List_Component
{
    public static function getSettings()
    {
        $ret = parent::getSettings();
        $ret['generators']['child']['component']['view'] = 'Pricelists_Shop_List_View_Component';
        return $ret;
    }

    protected function _getItemDirectory()
    {
        return Kwf_Component_Data_Root::getInstance()->getComponentById('root-products');
    }

    public static function getItemDirectoryClasses($componentClass)
    {
        return array('Directory_Products_Component');
    }

    public function getSelect()
    {
        $ret = parent::getSelect();
        $ret->whereEquals('shop_id', $this->getData()->parent->getRow()->id);
        return $ret;
    }
}
