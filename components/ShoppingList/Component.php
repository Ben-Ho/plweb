<?php
class ShoppingList_Component extends Kwc_Abstract
{
    public static function getSettings()
    {
        $ret = parent::getSettings();
        $ret['componentName'] = trlStatic('Einkaufsliste');
        $ret['assets']['dep'][] = 'ExtXTemplate';
        return $ret;
    }
}
