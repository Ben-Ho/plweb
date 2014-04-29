<?php
class ProductToTag extends Kwf_Model_Db
{
    protected $_table = 'p_product_to_tag';

    protected $_referenceMap = array(
        'Product' => array(
            'refModelClass' => 'Products',
            'column' => 'product_id',
        ),
        'Tag' => array(
            'refModelClass' => 'Tags',
            'column' => 'tag_id',
        )
    );

    protected function _init()
    {
        parent::_init();
        $this->_exprs['tag_name'] = new Kwf_Model_Select_Expr_Parent('Tag', 'name');
    }
}
