<?php
class Pricelists_Shop_List_View_Component extends Kwc_Directories_List_View_Component
{
    public static function getSettings()
    {
        $ret = parent::getSettings();
        return $ret;
    }

    public function getPartialVars($partial, $nr, $info)
    {
        $ret = parent::getPartialVars($partial, $nr, $info);
        $ret['cssClass'] = $nr % 2 == 0 ? 'even' : 'odd';
        return $ret;
    }
}
