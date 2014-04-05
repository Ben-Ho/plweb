<?php
class Products extends Kwf_Model_Db
{
    protected $_table = 'p_product';

    protected $_referenceMap = array(
        'Shop' => array(
            'refModelClass' => 'Shops',
            'column' => 'shop_id',
        )
    );

    protected function _init()
    {
        parent::_init();
        $this->_exprs['shop_pos'] = new Kwf_Model_Select_Expr_Parent('Shop', 'pos');
        $this->_exprs['shop_name'] = new Kwf_Model_Select_Expr_Parent('Shop', 'name');
    }
}

