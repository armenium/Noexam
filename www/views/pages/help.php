<?php

use app\assets\AppAsset;
use yii\bootstrap\BootstrapAsset;
use yii\helpers\Url;
use yii\web\JqueryAsset;

$this->registerCssFile('@web/v2/common/css/get-started.css', ['depends' => [BootstrapAsset::className(), AppAsset::className()]]);
$this->registerCssFile('@web/v2/pages/css/article.css', ['depends' => [BootstrapAsset::className(), AppAsset::className()]]);

$this->registerMetaTag(['name' => 'description', 'content' => '']);
$this->registerMetaTag(['name' => 'keywords', 'content' => '']);

$this->title = 'Buy Life Insurance Online - Help';
$this->params['breadcrumbs'][] = ['label' => 'Help', 'url' => Url::toRoute('help/'), 'class' => 'breadcrumbs__link tags breadcrumbs__link--active'];

?>
<?=$this->render('sections/about/get-started.php');?>
