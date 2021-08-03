<?php
use yii\helpers\Html;

#\yii\helpers\VarDumper::dump($grid_data, 10, 1);
?>
<!-- START FIRST-FLEX-ROW -->
<?php if(isset($grid_data['grid3-1-1']) || isset($grid_data['grid3-1-2']) || isset($grid_data['grid3-2-2'])):?>
<section class="grid cols3 hidden-xs">
	<!-- START FIRST-FLEX-COL -->
	<?php if(isset($grid_data['grid3-1-1']) || isset($grid_data['grid3-1-2'])):?>
	<div class="col col_1_3">
		<?php foreach($grid_data as $k => $data):
			if($k == 'grid3-1-1' || $k == 'grid3-1-2'):
				$style = (!empty($data->bgcolor)) ? "background-color:".$data->bgcolor.";" : "";
				$style .= (!empty($data->bgimage)) ? "background-image:url(".$data->bgimage.");" : "";?>
				<div class="item" style="<?=$style;?>">
					<div class="label" style="color:<?=$data->lbcolor;?>;"><?=$data->label;?></div>
					<div class="cont <?=$data->txcolor;?>">
						<div class="title"><a href="<?=$data->link;?>"><?=$data->title;?></a></div>
						<div class="desc"><?=$data->content;?></div>
						<?php /*<a class="readmore" href="<?=$data->link;?>"><i class="icon-right-circle"></i> Read More</a>*/?>
					</div>
				</div>
			<?php endif;
		endforeach;?>
	</div>
	<?php endif;?>
	<!-- END FIRST-FLEX-COL -->

	<!-- START SECOND-FLEX-COL -->
	<?php if(isset($grid_data['grid3-2-2'])):?>
	<div class="col col_2_3">
		<?php if(isset($grid_data['grid3-2-2'])):
			$style = (!empty($grid_data['grid3-2-2']->bgcolor)) ? "background-color:".$grid_data['grid3-2-2']->bgcolor.";" : "";
			$style .= (!empty($grid_data['grid3-2-2']->bgimage)) ? "background-image:url(".$grid_data['grid3-2-2']->bgimage.");" : "";?>
			<div class="item" style="<?=$style;?>">
				<div class="label" style="color:<?=$grid_data['grid3-2-2']->lbcolor;?>;"><?=$grid_data['grid3-2-2']->label;?></div>
				<div class="cont <?=$grid_data['grid3-2-2']->txcolor;?>">
					<div class="title"><a href="<?=$grid_data['grid3-2-2']->link;?>"><?=$grid_data['grid3-2-2']->title;?></a></div>
					<div class="desc"><?=$grid_data['grid3-2-2']->content;?></div>
					<?php /*<a class="readmore" href="<?=$grid_data['grid3-2-2']->link;?>"><i class="icon-right-circle"></i> Read More</a>*/?>
				</div>
			</div>
		<?php endif;?>
	</div>
	<?php endif;?>
	<!-- END SECOND-FLEX-COL -->
</section>
<?php endif;?>
<!-- END FIRST-FLEX-ROW -->

<!-- START SECOND-FLEX-ROW -->
<?php if(isset($grid_data['grid2-1']) || isset($grid_data['grid2-2'])):?>
<section class="grid cols2 hidden-xs">
	<?php foreach($grid_data as $k => $data):
		if($k == 'grid2-1' || $k == 'grid2-2'):
			$style = (!empty($data->bgcolor)) ? "background-color:".$data->bgcolor.";" : "";
			$style .= (!empty($data->bgimage)) ? "background-image:url(".$data->bgimage.");" : "";?>
		<div class="col col_1_2">
			<div class="item" style="<?=$style;?>">
				<div class="label" style="color:<?=$data->lbcolor;?>;"><?=$data->label;?></div>
				<div class="cont <?=$data->txcolor;?>">
					<div class="title"><a href="<?=$data->link;?>"><?=$data->title;?></a></div>
					<div class="desc"><?=$data->content;?></div>
					<?php /*<a class="readmore" href="<?=$data->link;?>"><i class="icon-right-circle"></i> Read More</a>*/?>
				</div>
			</div>
		</div>
		<?php endif;
	endforeach;?>
</section>
<?php endif;?>
<!-- END SECOND-FLEX-ROW -->

<?php if(isset($grid_data) && !empty($grid_data)):?>
<section class="grid-slider display-xs hidden-sm hidden-md hidden-lg">
	<?php foreach($grid_data as $k => $data):
		$style = (!empty($data->bgcolor)) ? "background-color:".$data->bgcolor.";" : "";
		$style .= (!empty($data->bgimage)) ? "background-image:url(".$data->bgimage.");" : "";?>
		<div class="item" style="<?=$style;?>">
			<div class="label" style="color:<?=$data->lbcolor;?>;"><?=$data->label;?></div>
			<div class="cont <?=$data->txcolor;?>">
				<div class="title"><a href="<?=$data->link;?>"><?=$data->title;?></a></div>
				<div class="desc"><?=$data->content;?></div>
				<?php /*<a class="readmore" href="<?=$data->link;?>"><i class="icon-right-circle"></i> Read More</a>*/?>
			</div>
		</div>
	<?php endforeach;?>
</section>
<div class="clearfix"></div>
<?php endif;?>
