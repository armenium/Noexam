<?php

use yii\widgets\Breadcrumbs;

if(!empty($this->context->current_cat->meta_desc)){
	$this->registerMetaTag(['name' => 'description', 'content' => $this->context->current_cat->meta_desc]);
}
if(!empty($this->context->current_cat->meta_keys)){
	$this->registerMetaTag(['name' => 'keywords', 'content' => $this->context->current_cat->meta_keys]);
}
if(!empty($this->context->current_cat->meta_title)){
	$this->title = $this->context->current_cat->meta_title;
}else{
	$this->title = $this->context->current_cat->title;
}
$this->params['breadcrumbs'][] = ['label' => 'Life Insurance', 'url' => '/life-insurance/'];
$this->params['breadcrumbs'][] = ['label' => 'Whole Life Insurance', 'url' => '/life-insurance/whole/'];
$this->params['breadcrumbs'][] = $this->context->current_cat->title;
?>
<div class="page-content page-wrapper trans_all">

	<?=$this->render('@app/views/layouts/resource_grid.php', ['grid_data' => $grid_data]); ?>

	<!-- START PAGE-CONTENT -->
	<section class="page">

		<article class="content">
			<h1>Borrowing</h1>
			<?=Breadcrumbs::widget(['links' => $this->params['breadcrumbs']]);?>
			<?=$this->render('/main/widgets/authors-small.php', ['updated' => date('F j, Y', filemtime(__FILE__))]);?>

			<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam vitae nisl quis metus facilisis sodales. Maecenas efficitur iaculis consectetur. Aenean efficitur tempus ligula, eu pretium magna semper elementum. Sed elit arcu, cursus eget porttitor eget, tempus quis ligula. Morbi quis est sed quam convallis interdum. Nullam pharetra elementum ex, ac scelerisque nunc viverra ac. Ut consectetur vestibulum malesuada. Aenean aliquam sapien vel est iaculis, ut sollicitudin lectus mollis. Proin ipsum lorem, posuere a bibendum vel, tristique id libero. Proin odio felis, congue ut justo non, accumsan auctor ante.</p>
			<p>Nullam est lectus, sollicitudin in luctus sed, blandit quis arcu. Sed vel mollis est, ac gravida massa. Donec pulvinar viverra tristique. Vivamus dui neque, iaculis et volutpat eu, molestie rhoncus nunc. Maecenas vel neque in mi mattis accumsan sed eu augue. Suspendisse aliquet maximus dolor, at gravida mi accumsan sed. Quisque nec lacinia nisi. Nunc aliquet auctor neque eleifend lacinia. Sed vel arcu et nibh imperdiet imperdiet id id augue.</p>
			<p>Praesent eu vulputate lectus. Vestibulum a metus libero. Pellentesque volutpat urna nulla, sit amet porttitor odio luctus ac. Nulla est massa, sagittis nec velit a, blandit porta diam. Aenean molestie nec velit eu pellentesque. Aliquam venenatis imperdiet velit eget aliquet. Fusce varius tellus a sem porta consectetur.</p>
			<p>In nec euismod arcu, sed luctus mauris. Suspendisse nec nisl tempor, feugiat enim id, ultricies nulla. Nam ut tellus at leo vehicula tincidunt sed euismod massa. Fusce consectetur neque et felis lobortis, efficitur ullamcorper metus ultrices. Morbi quis feugiat lectus. Vestibulum at varius justo. Curabitur pharetra arcu quis congue varius.</p>
			<p>Curabitur tristique tortor suscipit lacus rutrum, vitae sollicitudin erat pretium. Etiam viverra ex nec quam pulvinar, eu lacinia elit rhoncus. Maecenas ut velit eu ligula elementum consectetur. Praesent id turpis velit. Donec id blandit ex. Duis consectetur gravida condimentum. Donec sit amet leo a odio tristique porta. Etiam sit amet placerat elit, quis ultrices felis. In tempus orci eget velit tincidunt, ultrices pretium massa malesuada. Ut varius, velit lobortis sollicitudin sodales, ante est fringilla urna, sit amet convallis ipsum neque quis nulla. Sed nec tempor elit. Donec in dui arcu. Nulla pharetra tincidunt leo, id sagittis velit condimentum in. Nam vitae nisl turpis. Praesent finibus non ex ut pretium. Integer ullamcorper tempor bibendum.</p>
		</article>

	</section>
	<!-- END PAGE-CONTENT -->

</div>
<?=$this->render('/main/widgets/bio-jonathan-holloway.php'); //Bio Embed Code?>