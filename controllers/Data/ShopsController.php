<?php
class Data_ShopsController extends Kwf_Controller_Action_Auto_Grid
{
    protected $_modelName = 'Shops';
    protected $_paging = 25;

    protected function _initColumns()
    {
        $this->_columns->add(new Kwf_Grid_Column('pos', trl('Position'), 50))
            ->setEditor(new Kwf_Form_Field_TextField());
        $this->_columns->add(new Kwf_Grid_Column('name', trl('Name'), 200))
            ->setEditor(new Kwf_Form_Field_TextField());
    }

    public function indexAction()
    {
        parent::indexAction();
        $this->view->xtype = 'pricelist.structure';
    }
}
