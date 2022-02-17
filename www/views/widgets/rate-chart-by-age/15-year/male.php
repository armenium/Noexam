<ul class="nav nav-tabs custom-age-tabs justify-content-center trans_all" id="<?=$id;?>-male-AgeTab" role="tablist">
	<li class="nav-item text-center" role="presentation">
		<a class="nav-link main-title active" id="<?=$id;?>-male-ages-18-28-tab" data-toggle="tab" href="#<?=$id;?>-male-ages-18-28" role="tab" aria-controls="ages-18-28" aria-selected="true"><span>Ages 18-28</span></a>
	</li>
	<li class="nav-item text-center" role="presentation">
		<a class="nav-link main-title" id="<?=$id;?>-male-ages-29-39-tab" data-toggle="tab" href="#<?=$id;?>-male-ages-29-39" role="tab" aria-controls="ages-29-39" aria-selected="false"><span>Ages 29-39</span></a>
	</li>
	<li class="nav-item text-center" role="presentation">
		<a class="nav-link main-title" id="<?=$id;?>-male-ages-40-49-tab" data-toggle="tab" href="#<?=$id;?>-male-ages-40-49" role="tab" aria-controls="ages-40-49" aria-selected="false"><span>Ages 40-49</span></a>
	</li>
	<li class="nav-item text-center" role="presentation">
		<a class="nav-link main-title" id="<?=$id;?>-male-ages-50-59-tab" data-toggle="tab" href="#<?=$id;?>-male-ages-50-59" role="tab" aria-controls="ages-50-59" aria-selected="false"><span>Ages 50-59</span></a>
	</li>
	<li class="nav-item text-center" role="presentation">
		<a class="nav-link main-title" id="<?=$id;?>-male-ages-60-69-tab" data-toggle="tab" href="#<?=$id;?>-male-ages-60-69" role="tab" aria-controls="ages-60-69" aria-selected="false"><span>Ages 60-65</span></a>
	</li>
	<!-- <li class="nav-item text-center" role="presentation">
		<a class="nav-link main-title" id="<?=$id;?>-male-ages-70-74-tab" data-toggle="tab" href="#<?=$id;?>-male-ages-70-74" role="tab" aria-controls="ages-70-74" aria-selected="false"><span>Ages 70-74</span></a>
	</li> -->
</ul>
<?=$this->render('/widgets/'.$main_dir.'/partials/table-head.html');?>
<div class="tab-content custom-age-tab-content" id="<?=$id;?>-male-AgeTabContent">
	<div class="tab-pane fade show active" id="<?=$id;?>-male-ages-18-28" role="tabpanel" aria-labelledby="<?=$id;?>-male-ages-18-28-tab">
		<?=$this->render('/widgets/'.$main_dir.'/'.$view_dir.'/male/18-28.html');?>
	</div>
	<div class="tab-pane fade" id="<?=$id;?>-male-ages-29-39" role="tabpanel" aria-labelledby="<?=$id;?>-male-ages-29-39-tab">
		<?=$this->render('/widgets/'.$main_dir.'/'.$view_dir.'/male/29-39.html');?>
	</div>
	<div class="tab-pane fade" id="<?=$id;?>-male-ages-40-49" role="tabpanel" aria-labelledby="<?=$id;?>-male-ages-40-49-tab">
		<?=$this->render('/widgets/'.$main_dir.'/'.$view_dir.'/male/40-49.html');?>
	</div>
	<div class="tab-pane fade" id="<?=$id;?>-male-ages-50-59" role="tabpanel" aria-labelledby="<?=$id;?>-male-ages-50-59-tab">
		<?=$this->render('/widgets/'.$main_dir.'/'.$view_dir.'/male/50-59.html');?>
	</div>
	<div class="tab-pane fade" id="<?=$id;?>-male-ages-60-69" role="tabpanel" aria-labelledby="<?=$id;?>-male-ages-60-69-tab">
		<?=$this->render('/widgets/'.$main_dir.'/'.$view_dir.'/male/60-69.html');?>
	</div>
	<!-- <div class="tab-pane fade" id="<?=$id;?>-male-ages-70-74" role="tabpanel" aria-labelledby="<?=$id;?>-male-ages-70-74-tab">
		<?=$this->render('/widgets/'.$main_dir.'/'.$view_dir.'/male/70-74.html');?>
	</div> -->
</div>
