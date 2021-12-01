<?php
/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\helpers\Url;
use app\assets\AdminAsset;
use yii\widgets\Breadcrumbs;
use app\modules\admin\controllers\AdminController;
use app\modules\admin\controllers\ResourceCompaniesController;

AdminAsset::register($this);

$is_admin = AdminController::isAdmin();
$layout_class = AdminController::getLayoutClass();
$body_class = $is_admin ? 'admin' : 'guest';
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">

	<?=$this->render('head.php');?>
	
	<body class="<?=$body_class;?>">
		<?php $this->beginBody();?>
		
		<?=$this->render('header.php', ['is_admin' => $is_admin]);?>
		

		<section class="<?=$layout_class;?>">
			<?=$content;?>
		</section>
		
		<?=$this->render('footer.php');?>

		<?php $this->endBody() ?>
	</body>
</html>
<?php $this->endPage() ?>