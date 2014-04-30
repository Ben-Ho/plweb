<?php
class Pricelists_Shop_Form_FrontendForm extends Kwf_Form
{
    protected $_model = 'Products';

    protected function _initFields()
    {
        parent::_initFields();
        $this->add(new Kwf_Form_Field_TextField('name', trl('Name')))
            ->setAllowBlank(false)
            ->setEmptyText(trl('Marke und Produktname'));
        $this->add(new Kwf_Form_Field_NumberField('price', trl('Preis')))
            ->setAllowBlank(false);
        $fs = $this->add(new Kwf_Form_Container_FieldSet());
        $fs->setCls('unit-region');
        $fs->add(new Kwf_Form_Field_NumberField('quantity', trl('Menge')));
        $values = array();
        $values['ml'] = trl('Mililiter');
        $values['l'] = trl('Liter');
        $values['g'] = trl('Gramm');
        $values['kg'] = trl('Kilogramm');
        $values['pieces'] = trl('Stück');
        $values['undefined'] = trl('Unbekannt');
        $fs->add(new Kwf_Form_Field_Select('unit'))
            ->setValues($values);
        $this->add(new FormFields_TagSelect('test', trl('Tags')))
            ->setAllowBlank(false);
    }

    protected function _beforeSave(Kwf_Model_Row_Interface $row)
    {
        parent::_beforeSave($row);
        if ($row->unit == 'kg') {
            $row->unit = 'g';
            $row->quantity = $row->quantity * 1000;
        } else if ($row->unit == 'l') {
            $row->unit = 'ml';
            $row->quantity = $row->quantity * 1000;
        }
    }

    protected function _beforeInsert(Kwf_Model_Row_Interface $row)
    {
        parent::_beforeInsert($row);
        $row->create_time = date('Y-m-d H:i:s', time());
    }
}
