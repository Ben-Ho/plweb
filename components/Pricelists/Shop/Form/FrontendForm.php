<?php
class Pricelists_Shop_Form_FrontendForm extends Kwf_Form
{
    protected $_model = 'Products';

    protected function _initFields()
    {
        parent::_initFields();
        $this->add(new Kwf_Form_Field_TextField('name', trl('Name')));
        $this->add(new Kwf_Form_Field_NumberField('price', trl('Preis')));
    }
}
