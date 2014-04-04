<?php
class Directory_Products_Component extends Kwc_Directories_Item_Directory_Component
{
    public static function getSettings()
    {
        $ret = parent::getSettings();
        $ret['componentName'] = trlStatic('Alle Produkte');
        $ret['childModel'] = 'Products';
        $ret['generators']['detail']['component'] = 'Directory_Products_Detail_Component';
        $ret['generators']['child']['component']['view'] = 'Directory_Products_View_Component';
        return $ret;
    }
}
