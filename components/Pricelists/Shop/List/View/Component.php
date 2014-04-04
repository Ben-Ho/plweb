<?php
class Pricelists_Shop_List_View_Component extends Kwc_Directories_List_View_Component
{
    public static function getSettings()
    {
        $ret = parent::getSettings();
        $ret['generators']['child']['component']['searchForm'] = 'Pricelists_Shop_List_View_SearchForm_Component';
        return $ret;
    }

    public function getPartialVars($partial, $nr, $info)
    {
        $ret = parent::getPartialVars($partial, $nr, $info);
        $ret['cssClass'] = $nr % 2 == 0 ? 'even' : 'odd';
        return $ret;
    }

    protected function _getSearchSelect($ret, $searchRow)
    {
        $ret = parent::_getSearchSelect($ret, $searchRow);
        $ret->where(new Kwf_Model_Select_Expr_Like('name', '%'.$searchRow->name.'%'));
        return $ret;
    }
}
