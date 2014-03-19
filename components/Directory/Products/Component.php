<?php
class Directory_Products_Component extends Kwc_Directories_Item_Directory_Component
{
    public static function getSettings()
    {
        $ret = parent::getSettings();
        $ret['childModel'] = 'Products';
        $ret['generators']['detail']['component'] = 'Directory_Products_Detail_Component';
        return $ret;
    }
}
