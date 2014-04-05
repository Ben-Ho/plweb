<?php
class Acl extends Kwf_Acl_Component
{
    public function __construct()
    {
        parent::__construct();
        $this->allow('admin', 'kwf_user_changeuser');
        $this->allow('admin', 'kwf_user_users');

        $this->addResource(new Zend_Acl_Resource('data_structure'));
        $this->addResource(new Kwf_Acl_Resource_MenuUrl('data_shops',
            array('text' => trl('Preisliste'), 'icon' => 'basket_add.png'),
            '/admin/data/shops'), 'data_structure');
            $this->addResource(new Zend_Acl_Resource('data_products'), 'data_structure');

        $this->addResource(new Zend_Acl_Resource('javascript_products', '/admin/javascript/products'));
        $this->allow('guest', 'javascript_products');
    }
}
