<?php
use yii\bootstrap\Nav;
?>
<header id="js_header" class="header header--empty trans_me" style="background-color: #377660">
	<div class="header__col">
		<a href="/"><img src="/v2/common/images/header/logo-v2.svg" alt="" title="" class="header__logo" width="120" height="24"></a>
	</div>
	<div class="header__col">
		<?=$this->render('../common/mobile/burger', ['color' => 'white']);?>
	</div>
</header>
<?=$this->render('../common/mobile/nav');?>
