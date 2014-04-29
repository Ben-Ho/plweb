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
        $searchTerms = explode(' ', $searchRow->name);

        $expressions = array();
        $productNameSearch = array();
        foreach ($searchTerms as $searchTerm) {
            $productNameSearch[] = new Kwf_Model_Select_Expr_Like('name', '%'.$searchTerm.'%');
        }
        $expressions[] = new Kwf_Model_Select_Expr_And($productNameSearch);

//         if ($searchRow->also_tags) {
            $tagNameSearch = array();
            foreach ($searchTerms as $searchTerm) {
                $childSelect = new Kwf_Model_Select();
                $childSelect->where(new Kwf_Model_Select_Expr_Like('tag_name', '%'.$searchTerm.'%'));
                $tagNameSearch[] = new Kwf_Model_Select_Expr_Child_Contains('Tags', $childSelect);
            }
            $expressions[] = new Kwf_Model_Select_Expr_And($tagNameSearch);
//         }
        $ret->where(new Kwf_Model_Select_Expr_Or($expressions));
        return $ret;
    }
}
