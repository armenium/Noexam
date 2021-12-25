<?php

use app\widgets\RateCalcForm2;

?>
<?=RateCalcForm2::widget(['autoload' => 'ajax', 'autoscroll' => 0, 'title' => 'Compare Life Insurance Rates by Age']);?>
<?php #=$this->render('/main/widgets/rate-calc-form.php', ['position' => 'center', 'width' => '', 'cols' => 1, 'autoload' => 0, 'title' => 'Compare Rates From the Best Life Insurance Companies', 'guessing' => 0]);?>
