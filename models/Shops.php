<?php
class Shops extends Kwf_Model_Db
{
    protected $_table = 'p_shop';
    protected $_toStringField = 'name';

    protected $_dependentModels = array(
        'Products' => 'Products'
    );

    protected function _setupFilters()
    {
        $filter = new Kwf_Filter_Row_Numberize();
        $this->_filters = array('pos' => $filter);
    }
}
