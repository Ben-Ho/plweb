<?php
class ProductHistory extends Kwf_Model_Db
{
    protected $_table = 'p_product_history';

    protected $_referenceMap = array(
        'Product' => array(
            'refModelClass' => 'Products',
            'column' => 'product_id',
        )
    );
}

