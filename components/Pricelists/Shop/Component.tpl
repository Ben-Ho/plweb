<div class="<?=$this->cssClass?>">
    <?=$this->component($this->selection);?>
    <div class="new-product kwfSwitchDisplay">
        <div class="switchLink"><?=$this->data->trl('Neues Produkt');?></div>
        <div class="switchContent">
            <?=$this->component($this->form);?>
        </div>
    </div>
    <?=$this->component($this->pricelist);?>
</div>