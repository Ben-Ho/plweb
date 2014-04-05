<?php
class Javascript_ProductsController extends  Kwf_Controller_Action_Auto_Abstract
{
    /**
     * http://porschebank.benjamin.vivid/admin/javascript/products
     */

    public function jsonIndexAction()
    {
        $productIdsParam = $this->_getParam('productIds');
        $productIds = explode(';', $productIdsParam);
        $orExpressions = array();
        foreach ($productIds as $productId) {
            $orExpressions[] = new Kwf_Model_Select_Expr_Equals('id', $productId);
        }
        $select = new Kwf_Model_Select();
        $select->where(new Kwf_Model_Select_Expr_Or($orExpressions));
        $select->order('shop_pos');
        $productRows = Kwf_Model_Abstract::getInstance('Products')->getRows($select);
        $products = array();
        foreach ($productRows as $productRow) {
            $products[] = array(
                'id' => $productRow->id,
                'name' => $productRow->name,
                'price' => $productRow->price,
                'shop' => $productRow->shop_name
            );
        }
        $this->view->products = $products;
    }
}
