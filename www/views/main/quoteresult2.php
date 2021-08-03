<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 25.10.2018
 * Time: 17:12
 */

use yii\widgets\Breadcrumbs;
use yii\helpers\VarDumper;

//VarDumper::dump($model_data, 10, 1);

$this->title = 'NoExam - Life - Thank You';
$this->params['breadcrumbs'][] = ['label' => 'NoExam - Life', 'url' => '/apply-now2/'];
$this->params['breadcrumbs'][] = 'Thank You';
?>
<script type="text/javascript">
	// NoExam / Life - Thank You /
	var MediaAlphaExchange = {
		"type": "ad_unit",
		"placement_id": "xC0H_zvsKNWQHCIuuf58X5n5_CyV1w",
		"version": "17",
		"sub_1": "test sub id",
		"data": {
			"zip": "<?=$model_data['zip'];?>"
		}
	};
</script>

<div class="page-content page-wrapper trans_all">

	<section class="container">
		<div class="row">
			<div class="col-md-12">
				<h1><?=$this->title;?></h1>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<script src="//insurance.mediaalpha.com/js/serve.js"></script>
			</div>
		</div>
	</section>

</div>

