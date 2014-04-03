<?php
class Menu_MainWrapper_Component extends Kwc_Abstract_Composite_Component
{
    public static function getSettings()
    {
        $ret = parent::getSettings();
        $ret['generators']['child']['component']['menu'] = 'Menu_MainWrapper_Main_Component';
        return $ret;
    }
}
