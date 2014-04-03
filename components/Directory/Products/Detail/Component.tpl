<div class="<?=$this->cssClass?>">
    <div class="name"><?=$this->data->getRow()->name;?></div>
    <?=$this->componentLink($this->editForm, '<div class="price">'.money_format('%i', $this->data->getRow()->price).'</div>');?>
    <div class="clear"></div>
</div>