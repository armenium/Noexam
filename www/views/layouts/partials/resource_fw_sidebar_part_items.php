<?php foreach($subcats as $subcat):?>
	<li id="item_<?=$subcat->id;?>" class="item <?=$subcat->active;?>"><a href="<?=$subcat->url;?>"><?=$subcat->title?></a></li>
<?php endforeach;?>
