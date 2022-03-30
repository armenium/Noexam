<section class="max-w-1400 m-auto">
	<div class="row align-items-center" data-charts='<?=json_encode($charts);?>'>
		<div class="col">
			<a role="button" id="js_rate_chart_by_age_prev_btn" class="tabs__arrow tabs__arrow--left trans_all" data-trigger="js_action_click" data-action="change_tab" data-direction="prev" data-target="#js_invisible_tabs">
				<img src="/v2/common/images/arrow-left-green.svg" alt="">
				<span class="button-small text-center">Universal Term</span>
			</a>
		</div>
		<div class="col-12 col-md-9">
			<ul class="nav nav-tabs d-none justify-content-center trans_all" id="js_invisible_tabs" role="tablist">
				<?php $k=0; foreach($charts as $chart => $chart_title):
					$class = 'nav-link';
					$selected = 'false';
					if($k == 0){
						$class = 'nav-link active';
						$selected = 'true';
					}
					$k++;
				?>
				<li class="nav-item text-center" role="presentation">
					<a class="<?=$class;?>" id="<?=$id;?>-<?=$chart;?>-tab" data-toggle="tab" href="#<?=$id;?>-<?=$chart;?>" role="tab" aria-controls="<?=$chart;?>" aria-selected="<?=$selected;?>"><?=$chart_title;?></a>
				</li>
				<?php endforeach;?>
			</ul>
			<div class="tab-content main-tab-content" id="js_invisible_tabs_content">
				<?php $k=0; foreach($charts as $chart => $chart_title):
					$class = ($k == 0) ? 'tab-pane fade show active' : 'tab-pane';
					$chart_id = Yii::$app->getSecurity()->generateRandomString(8);
					$k++;
				?>
				<div class="<?=$class;?>" id="<?=$id;?>-<?=$chart;?>" role="tabpanel" aria-labelledby="<?=$chart;?>-tab">
					<?=$this->render('/widgets/'.$main_dir.'/'.$chart.'.php', ['id' => $chart_id, 'main_dir' => $main_dir, 'view_dir' => $chart, 'charts' => $charts]);?>
				</div>
				<?php endforeach;?>
			</div>
		</div>
		<div class="col">
			<a role="button" id="js_rate_chart_by_age_next_btn" class="tabs__arrow tabs__arrow--right trans_all" data-trigger="js_action_click" data-action="change_tab" data-direction="next" data-target="#js_invisible_tabs">
				<img src="/v2/common/images/arrow-right-green.svg" alt="">
				<span class="button-small text-center">15 Years Term</span>
			</a>
		</div>
	</div>
</section>
