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
        $childSelect = new Kwf_Model_Select();
        $childSelect->where(new Kwf_Model_Select_Expr_Like('tag_name', '%'.$searchRow->name.'%'));
        $expressions = array();
        $expressions[] = new Kwf_Model_Select_Expr_Like('name', '%'.$searchRow->name.'%');
        if ($searchRow->also_tags) {
            $expressions[] = new Kwf_Model_Select_Expr_Child_Contains('Tags', $childSelect);
        }
        $ret->where(new Kwf_Model_Select_Expr_Or($expressions));
        return $ret;
    }
}
