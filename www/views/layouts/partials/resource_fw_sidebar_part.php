<li id="item_<?=$cat->id;?>" class="item <?=$col_class;?> -<?=$cat->active;?>">
	<a href="<?=$cat->url;?>"><?=$cat->title?></a>
	<?php if(!empty($cat->subcats)):?>
			<?php if($type == 'last_cat'):?>
				<?php foreach($cat->subcats as $group):?>
					<ul parent_id="<?=$cat->id;?>" class="sub-cats col-sm-4 <?php if($current_cat->id == $cat->id || $current_cat->parent_id == $cat->id):?>show<?php endif;?>">
						<?=$this->render('/layouts/partials/resource_fw_sidebar_part_items', ['subcats' => $group]);?>
					</ul>
				<?php endforeach;?>
			<?php else:?>
				<ul parent_id="<?=$cat->id;?>" class="sub-cats <?php if($current_cat->id == $cat->id || $current_cat->parent_id == $cat->id):?>show<?php endif;?>">
					<?=$this->render('/layouts/partials/resource_fw_sidebar_part_items', ['subcats' => $cat->subcats]);?>
				</ul>
			<?php endif;?>
	<?php endif;?>
</li>
