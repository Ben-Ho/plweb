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
}

