<?php

use app\assets\AppAsset;
use app\components\BreadcrumbsNew;
use app\widgets\Author;
use yii\bootstrap\BootstrapAsset;
use yii\helpers\Url;
use yii\web\JqueryAsset;

$this->registerCssFile('@web/v2/common/css/get-started.css', ['depends' => [BootstrapAsset::className(), AppAsset::className()]]);
$this->registerCssFile('@web/v2/pages/css/article.css', ['depends' => [BootstrapAsset::className(), AppAsset::className()]]);

$this->registerMetaTag(['name' => 'description', 'content' => 'Compare life insurance policies and apply for coverage today. Shop the top rated companies offering up to $1,000,000 of coverage from $23 per month.']);
$this->registerMetaTag(['name' => 'keywords', 'content' => '']);

$this->title = 'Buy Life Insurance Online - Licenses';
$this->params['breadcrumbs'][] = ['label' => 'Licenses', 'url' => Url::toRoute('licenses/'), 'class' => 'breadcrumbs__link tags breadcrumbs__link--active'];

?>
<div class="main-wrapp bg1">
	<div class="wrapp pb-4">
		<?=BreadcrumbsNew::widget(['links' => $this->params['breadcrumbs']]);?>
	</div>
</div>
<article class="main-wrapp">

	<section>
		<h1 class="heading-0">Licenses</h1>
		<?=Author::widget(['db_time' => '2021-12-03', 'file_time' => filemtime(__FILE__)]);?>
		<p>Jonathan Fritz (884037) is a licensed life insurance agent operating under No Exam Life Insurance (177110) Incorporated. The license numbers below represent the states we can help buyers find life insurance in a matter of minutes. </p>
		<p>NoExam.com has life insurance agents in 50 states who are responsible for maintaining their individual residential and non-residential state licenses. If you have any questions please visit our corporate office at 24 Sloan St, Roswell GA 30075 or contact our offices at 888-407-0714. Read more <a href="https://www.noexam.com/about/">about NoExam.com</a>.</p>
	</section>

	<section>
		<h2>Life Insurance License Numbers by State for Jonathan Fritz</h2>
		<ul class="d-flex flex-row flex-wrap justify-content-start align-items-start list-3-col mb-5">
			<li>Georgia Jonathan Fritz: 884037  (Resident State)</li>
			<li>Alabama 671140</li>
			<li>Arizona 13468653</li>
			<li>Arkansas 13468653</li>
			<li>California 0I29098</li>
			<li>Colorado 429314</li>
			<li>Connecticut 2436627</li>
			<li>Delaware 1335369</li>
			<li>Florida W321339</li>
			<li>Idaho 454825</li>
			<li>Illinois 13468653</li>
			<li>Indiana 895563</li>
			<li>Iowa 13468653</li>
			<li>Kansas 13468653</li>
			<li>Kentucky 816865</li>
			<li>Louisiana 597761</li>
			<li>Maine PRN219829</li>
			<li>Mass 1938570</li>
			<li>Michigan 13468653</li>
			<li>Minnesota 40346473</li>
			<li>Mississippi 10297481</li>
			<li>Missouri 8297522</li>
			<li>Montana 100104744</li>
			<li>Nebraska 13468653</li>
			<li>Nevada 895221</li>
			<li>New Hampshire 2275797</li>
			<li>New Jersey 1524062</li>
			<li>North Carolina 13468653</li>
			<li>Ohio 988076</li>
			<li>Oklahoma 100167108</li>
			<li>Oregon 13468653</li>
			<li>Pennsylvania 661245</li>
			<li>Rhode Island 2267897</li>
			<li>South Carolina 13468653</li>
			<li>South Dakota 40337742</li>
			<li>Tennessee 2250565</li>
			<li>Texas 1828274</li>
			<li>Utah 454729</li>
			<li>Vermont 895316</li>
			<li>Virginia 864387</li>
			<li>Washington 838243</li>
			<li>West Virginia 13468653</li>
			<li>Wisconsin 13468653</li>
			<li>Wyoming 247426</li>

		</ul>
		<h2>Life Insurance Licenses by State for Jonathan Holloway</h2>
		<ul>
			<li>Georgia: 3133449 (Resident State)</li>
		</ul>
		<p>If you have questions about our corporate licensing for No Exam Life Insurance, Inc, please contact our office at 888-407-0714</p>
	</section>
	
</article>
<?=$this->render('sections/home/get-started.php');?>
