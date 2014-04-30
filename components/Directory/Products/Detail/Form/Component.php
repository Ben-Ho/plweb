<?php
class Directory_Products_Detail_Form_Component extends Kwc_Form_Component
{
    public static function getSettings()
    {
        $ret = parent::getSettings();
        $ret['viewCache'] = false;
        $ret['componentName'] = trlStatic('Editiere Preis');
        $ret['generators']['child']['component']['header'] = 'Directory_Products_Detail_Form_Header_Component';
        $ret['generators']['child']['component']['success'] = 'Directory_Products_Detail_Form_Success_Component';
        return $ret;
    }

    protected function _initForm()
    {
        parent::_initForm();
        $this->_form->setId($this->getData()->parent->getRow()->id);
    }

    protected function _beforeSave(Kwf_Model_Row_Interface $row)
    {
        parent::_beforeSave($row);
        $oldRow = Kwf_Model_Abstract::getInstance('Products')->getRow($row->id);
        $saveHistory = false;
        $historyRow = $oldRow->createChildRow('History');
        $historyRow->create_time = $oldRow->create_time;
        if ($oldRow->name != $row->name) {
            $saveHistory = true;
            $historyRow->name = $oldRow->name;
        }
        if ($oldRow->price != $row->price) {
            $saveHistory = true;
            $historyRow->price = $oldRow->price;
        }
        if ($oldRow->quantity != $row->quantity) {
            $saveHistory = true;
            $historyRow->quantity = $oldRow->quantity;
        }
        if ($oldRow->unit != $row->unit) {
            $saveHistory = true;
            $historyRow->unit = $oldRow->unit;
        }
        if ($saveHistory) {
            $historyRow->save();
            $row->create_time = date('Y-m-d H:i:s', time());
        }
    }
}
