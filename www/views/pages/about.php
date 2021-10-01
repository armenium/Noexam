<?php
/* @var $this yii\web\View */

use app\assets\AppAsset;
use yii\bootstrap\BootstrapAsset;
use yii\web\JqueryAsset;
use yii\widgets\ActiveForm;
use yii\helpers\Html;


$this->title = 'Buy Life Insurance Online - About Us';
$this->registerMetaTag(['name' => 'description', 'content' => 'Compare life insurance policies and apply for coverage today. Shop the top rated companies offering up to $1,000,000 of coverage from $23 per month.']);
$this->registerMetaTag(['name' => 'keywords', 'content' => '']);

$this->registerCssFile('@web/v2/common/css/shared-styles.css', ['depends' => [BootstrapAsset::className(), AppAsset::className()]]);
$this->registerCssFile('@web/v2/pages/css/about.css', ['depends' => [BootstrapAsset::className(), AppAsset::className()]]);
$this->registerCssFile('@web/v2/common/css/steps.css', ['depends' => [BootstrapAsset::className(), AppAsset::className()]]);
$this->registerCssFile('@web/v2/common/css/get-started.css', ['depends' => [BootstrapAsset::className(), AppAsset::className()]]);
$this->registerCssFile('@web/v2/common/css/breadcrumbs.css', ['depends' => [BootstrapAsset::className(), AppAsset::className()]]);

$this->registerJsFile('@web/v2/pages/js/about.js', ['depends' => [JqueryAsset::className(), AppAsset::className()]]);

#$this->params['breadcrumbs'][] = ['label' => 'Home', 'url' => '/'];
$this->params['breadcrumbs'][] = 'About';

echo $this->render('sections/about/hero.php');
echo $this->render('sections/about/leadership.php');
echo $this->render('sections/about/in-the-press.php');
echo $this->render('sections/about/contact-us.php');
echo $this->render('sections/about/reviews.php');


