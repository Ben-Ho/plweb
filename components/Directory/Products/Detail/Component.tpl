<div class="<?=$this->cssClass?>" data-product-id="<?=$this->productId;?>">
    <div class="name"><?=$this->data->getRow()->name;?></div>
    <div class="shop"><?=$this->data->getRow()->getParentRow('Shop')->name;?></div>
    <?=$this->componentLink($this->editForm, '<div class="price">'.money_format('%i', $this->data->getRow()->price).'</div>');?>
    <div class="clear"></div>
</div>