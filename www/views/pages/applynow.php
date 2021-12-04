<?php

/* @var $this yii\web\View */

use app\assets\AppAsset;
use yii\bootstrap\BootstrapAsset;
use yii\web\JqueryAsset;
use yii\web\View;
use yii\widgets\ActiveForm;
use yii\helpers\Html;
use yii\helpers\Url;


$this->registerCssFile('@web/v2/plugins/css/slick.css', ['depends' => [BootstrapAsset::className(), AppAsset::className()]]);
$this->registerCssFile('@web/v2/common/css/cards.css', ['depends' => [BootstrapAsset::className(), AppAsset::className()]]);
$this->registerCssFile('@web/v2/common/css/main-first-screen.css', ['depends' => [BootstrapAsset::className(), AppAsset::className()]]);
$this->registerCssFile('@web/v2/common/css/questions.css', ['depends' => [BootstrapAsset::className(), AppAsset::className()]]);
$this->registerCssFile('@web/v2/pages/css/about.css', ['depends' => [BootstrapAsset::className(), AppAsset::className()]]);
$this->registerCssFile('@web/v2/life-insurance/css/rates.css', ['depends' => [BootstrapAsset::className(), AppAsset::className()]]);
$this->registerCssFile('@web/v2/pages/css/apply-now.css', ['depends' => [BootstrapAsset::className(), AppAsset::className()]]);

$this->registerJsFile('@web/v2/plugins/js/slick.js', ['depends' => [JqueryAsset::className(), AppAsset::className()]]);
$this->registerJsFile('@web/v2/pages/js/apply-now.js', ['depends' => [JqueryAsset::className(), AppAsset::className()]]);

$this->registerMetaTag(['name' => 'description', 'content' => 'Compare life insurance policies and apply for coverage today. Shop the top rated companies offering up to $1,000,000 of coverage from $23 per month.']);
$this->registerMetaTag(['name' => 'keywords', 'content' => '']);

$this->title = 'Life Insurance Quotes - Compare and Apply Online';
$this->params['breadcrumbs'][] = ['label' => 'Apply Now', 'url' => Url::toRoute('apply-now/'), 'class' => 'breadcrumbs__link tags breadcrumbs__link--active'];
#$this->params['breadcrumbs'][] = 'About';

echo $this->render('sections/applynow/hero.php');
echo $this->render('sections/applynow/rates-form.php');
echo $this->render('sections/applynow/reviews.php');
echo $this->render('sections/applynow/cards.php');
echo $this->render('sections/applynow/faqs.php', ['faq_items' => $faq_items]);


