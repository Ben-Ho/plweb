<div class="<?=$this->cssClass?>">
    <h1><?=$this->title;?></h1>
    <? if (isset($this->searchForm)) echo $this->component($this->searchForm); ?>
    <? if (isset($this->count)) echo $this->component($this->count); ?>
    <? if (isset($this->paging)) echo $this->component($this->paging); ?>
    <?=$this->partials($this->data);?>
    <? if (isset($this->paging)) echo $this->component($this->paging); ?>
</div>