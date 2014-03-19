<div class="<?=$this->cssClass;?> kwfSwitchDisplay">
    <? $first = true; ?>
    <? foreach ($this->pricelists as $pricelist) { ?>
        <? if ($first) { ?>
            <div class="pricelist current switchLink">
                <?=$pricelist->getRow()->name;?>
            </div>
            <div class="switchContent">
            <? $first = false; ?>
        <? } else { ?>
            <?=$this->componentLink($pricelist, '<div class="pricelist">'.$pricelist->getRow()->name.'</div>');?>
        <? } ?>
    <? } ?>
    </div>
</div>