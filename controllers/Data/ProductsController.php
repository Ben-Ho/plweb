<?php
class Data_ProductsController extends Kwf_Controller_Action_Auto_Grid
{
    protected $_modelName = 'Products';
    protected $_paging = 25;

    protected function _initColumns()
    {
        $this->_columns->add(new Kwf_Grid_Column('name', trl('Name'), 200))
            ->setEditor(new Kwf_Form_Field_TextField());
        $this->_columns->add(new Kwf_Grid_Column('price', trl('Preis'), 200))
            ->setEditor(new Kwf_Form_Field_TextField());
    }
}
