<?php
class Box_Google_Component extends Kwc_Abstract
{
    public static function getSettings()
    {
        $ret = parent::getSettings();
//         $ret['useAjaxRequest'] = false;
        return $ret;
    }

    //https://www.google.com/search?q=test
//     protected function _beforeInsert(Kwf_Model_Row_Interface $row)
//     {
//         parent::_beforeInsert($row);
//         header('Location http://www.google.com/search?q='.$row->search_query);
//         exit;
//     }
}
