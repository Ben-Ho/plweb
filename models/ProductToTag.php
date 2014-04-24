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
}
