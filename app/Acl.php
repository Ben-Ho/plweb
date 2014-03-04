<?php
class Acl extends Kwf_Acl_Component
{
    public function __construct()
    {
        parent::__construct();
        $this->allow('admin', 'kwf_user_changeuser');
        $this->allow('admin', 'kwf_user_users');

    }
}
