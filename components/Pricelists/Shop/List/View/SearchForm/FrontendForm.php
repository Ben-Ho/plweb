<?php
class Pricelists_Shop_List_View_SearchForm_FrontendForm extends Kwf_Form
{
    protected function _initFields()
    {
        parent::_initFields();
        $this->_model = new Kwf_Model_FnF();
        $this->add(new Kwf_Form_Field_TextField('name', trl('Name')))
            ->setEmptyText(trl('Produktsuche'));
//         $this->add(new Kwf_Form_Field_Checkbox('also_tags', ''))
//             ->setBoxLabel(trl('Auch in Tags suchen'));
    }
}
