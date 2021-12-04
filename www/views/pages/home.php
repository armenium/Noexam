<?php
/* @var $this yii\web\View */

use app\assets\AppAsset;
use yii\bootstrap\BootstrapAsset;
use yii\web\JqueryAsset;
use yii\widgets\ActiveForm;
use yii\helpers\Html;


$this->title = 'Buy Life Insurance Online - Compare and Save';
$this->registerMetaTag(['name' => 'description', 'content' => 'Compare life insurance policies and apply for coverage today. Shop the top rated companies offering up to $1,000,000 of coverage from $23 per month.']);
$this->registerMetaTag(['name' => 'keywords', 'content' => '']);

$this->registerCssFile('@web/v2/pages/css/home.css', ['depends' => [BootstrapAsset::className(), AppAsset::className()]]);
$this->registerCssFile('@web/v2/plugins/css/slick.css', ['depends' => [BootstrapAsset::className(), AppAsset::className()]]);
$this->registerCssFile('@web/v2/common/css/questions.css', ['depends' => [BootstrapAsset::className(), AppAsset::className()]]);
$this->registerCssFile('@web/v2/common/css/steps.css', ['depends' => [BootstrapAsset::className(), AppAsset::className()]]);
$this->registerCssFile('@web/v2/common/css/get-started.css', ['depends' => [BootstrapAsset::className(), AppAsset::className()]]);

$this->registerJsFile('@web/v2/plugins/js/slick.js', ['depends' => [JqueryAsset::className(), AppAsset::className()]]);
$this->registerJsFile('@web/v2/pages/js/home.js', ['depends' => [JqueryAsset::className(), AppAsset::className()]]);

echo $this->render('sections/home/hero.php');
echo $this->render('sections/home/customers.php');
echo $this->render('sections/home/advantages.php');
echo $this->render('sections/home/steps.php');
echo $this->render('sections/home/companies.php');
echo $this->render('sections/home/reviews.php');
echo $this->render('sections/home/cards.php');
echo $this->render('sections/home/faqs.php', ['faq_items' => $faq_items]);
echo $this->render('sections/home/get-started.php');


