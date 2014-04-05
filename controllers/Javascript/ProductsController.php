<?php
class Javascript_ProductsController extends Kwf_Controller_Action_Auto_Abstract
{
    /**
     * http://porschebank.benjamin.vivid/admin/javascript/products
     */
    public function indexAction()
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
        $productJsons = array();
        foreach ($productRows as $productRow) {
            $productJsons[] = '{'
                .'"id":"'.$productRow->id.'",'
                .'"product":"'.$productRow->name.'",'
                .'"price":"'.$productRow->price.'",'
                .'"shop":"'.$productRow->shop_name.'"'
            .'}';
        }

        $json = '{'
            .'"products":['.implode(',', $productJsons).']'
        .'}';
        echo $json;
        exit;
    }
}
