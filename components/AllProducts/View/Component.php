<?php
class AllProducts_View_Component extends Pricelists_Shop_List_View_Component
{
    public static function getSettings()
    {
        $ret = parent::getSettings();
        $ret['cssClass'] .= 'webStandard';
        return $ret;
    }

    protected function _getSearchSelect($ret, $searchRow)
    {
        $ret = parent::_getSearchSelect($ret, $searchRow);
        return $ret;
    }
}
