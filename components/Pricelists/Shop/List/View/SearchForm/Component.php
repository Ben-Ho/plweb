<?php
class Pricelists_Shop_List_View_SearchForm_Component extends Kwc_Form_Component
{
    public static function getSettings()
    {
        $ret = parent::getSettings();
        $ret['method'] = 'get';
        $ret['useAjaxRequest'] = false;
        $ret['generators']['child']['component']['success'] = false;
        $ret['placeholder']['submitButton'] = '&nbsp;';
        return $ret;
    }
}
