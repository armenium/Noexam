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
$this->params['breadcrumbs'][] = ['label' => 'Companies', 'url' => '/life-insurance/companies/'];
$this->params['breadcrumbs'][] = $this->context->current_cat->title;
?>
	<div class="page-content page-wrapper trans_all">


		<!-- START PAGE-CONTENT -->
		<section class="page">
			<article class="content">
				<h1>Protective vs Metlife Life Insurance</h1>
				<?=Breadcrumbs::widget(['links' => $this->params['breadcrumbs']]);?>
				<?=$this->render('/main/widgets/authors-small.php', ['updated' => date('F j, Y', filemtime(__FILE__))]);?>

				<p> Protective and Metlife are two of the largest life insurance companies in existence today. If you are looking to compare these two life insurance companies, you are in the right place. We have gathered all the data necessary to compare these companies side by side. Our hope is that this information helps you to make a more informed decision when buying life insurance.</p>
				<div style="align-items: center;"><img class="size-full" src="../../../img/protective.jpg" alt="protective life insurance" width="300" height="226"/><img src="../../../img/metlife-1-300x183.jpg" alt="metlife logo" width="300" height="183"/></div>

				<h2>Protective vs Metlife General Info</h2>

				<table id="tablepress-89" class="tablepress tablepress-id-89">
					<thead>
					<tr class="row-1 odd">
						<th class="column-1">&nbsp;</th>
						<th class="column-2">Protective</th>
						<th class="column-3">Metlife</th>
					</tr>
					</thead>
					<tbody class="row-hover">
					<tr class="row-2 even">
						<td class="column-1">Address</td>
						<td class="column-2">111 Congressional Blvd., Suite 500<br/>
							Carmel, IN 46032
						</td>
						<td class="column-3">200 Park Avenue<br/>
							New York City, NY
						</td>
					</tr>
					<tr class="row-3 odd">
						<td class="column-1">Phone Number</td>
						<td class="column-2">800-626-8381</td>
						<td class="column-3">800-638-5433</td>
					</tr>
					<tr class="row-4 even">
						<td class="column-1">Website</td>
						<td class="column-2">https://www.protectiveinsurance.com/</td>
						<td class="column-3">https://www.metlife.com</td>
					</tr>
					<tr class="row-5 odd">
						<td class="column-1">Year Founded</td>
						<td class="column-2">1907</td>
						<td class="column-3">1868</td>
					</tr>
					<tr class="row-6 even">
						<td class="column-1">Current CEO</td>
						<td class="column-2">John D. Johns</td>
						<td class="column-3">Steven A. Kandarian</td>
					</tr>
					</tbody>
				</table>

				<h2>Protective vs Metlife Financial Ratings</h2>

				<table id="tablepress-90" class="tablepress tablepress-id-90">

					<thead>
					<tr class="row-1 odd">
						<th class="column-1">&nbsp;</th>
						<th class="column-2">Protective</th>
						<th class="column-3">Metlife</th>
					</tr>
					</thead>
					<tbody class="row-hover">
					<tr class="row-2 even">
						<td class="column-1">JD Power</td>
						<td class="column-2">774</td>
						<td class="column-3">812</td>
					</tr>
					<tr class="row-3 odd">
						<td class="column-1">BBB</td>
						<td class="column-2">A+</td>
						<td class="column-3">C-</td>
					</tr>
					<tr class="row-4 even">
						<td class="column-1">AM Best</td>
						<td class="column-2">A+</td>
						<td class="column-3">A+</td>
					</tr>
					<tr class="row-5 odd">
						<td class="column-1">Moody's</td>
						<td class="column-2">A1</td>
						<td class="column-3">Aa3</td>
					</tr>
					<tr class="row-6 even">
						<td class="column-1">Fitch</td>
						<td class="column-2">A+</td>
						<td class="column-3">AA-</td>
					</tr>
					<tr class="row-7 odd">
						<td class="column-1">Standard &amp; Poor</td>
						<td class="column-2">AA-</td>
						<td class="column-3">AA-</td>
					</tr>
					<tr class="row-8 even">
						<td class="column-1">Comdex Score</td>
						<td class="column-2">92</td>
						<td class="column-3">95</td>
					</tr>
					</tbody>
				</table>

				<h2>Protective vs Metlife Financial Status</h2>

				<table id="tablepress-91" class="tablepress tablepress-id-91">

					<thead>
					<tr class="row-1 odd">
						<th class="column-1">&nbsp;</th>
						<th class="column-2">Protective</th>
						<th class="column-3">Metlife</th>
					</tr>
					</thead>
					<tbody class="row-hover">
					<tr class="row-2 even">
						<td class="column-1">Total Assets</td>
						<td class="column-2">$75 Billion USD (2016)</td>
						<td class="column-3">$719.892 Billion</td>
					</tr>
					<tr class="row-3 odd">
						<td class="column-1">Life Insurance in Force</td>
						<td class="column-2">$767.3 Billion</td>
						<td class="column-3">$4,594,523 Million</td>
					</tr>
					</tbody>
				</table>

				<h2>Protective vs Metlife Products Offered</h2>

				<table id="tablepress-92" class="tablepress tablepress-id-92">

					<thead>
					<tr class="row-1 odd">
						<th class="column-1">&nbsp;</th>
						<th class="column-2">Protective</th>
						<th class="column-3">Metlife</th>
					</tr>
					</thead>
					<tbody class="row-hover">
					<tr class="row-2 even">
						<td class="column-1">Types of Life Insurance</td>
						<td class="column-2">Term Life Insurance<br/>
							Whole Life Insurance<br/>
							Universal Life Insurance<br/>
							Variable Universal Life Insurance<br/>
							Indexed Universal Life Insurance<br/>
							Survivorship Universal Life Insurance<br/>
							Life Insurance for Children
						</td>
						<td class="column-3">Term Life Insurance<br/>
							Whole Life Insurance<br/>
							Universal Life Insurance<br/>
							Accidental Death and Dismemberment
						</td>
					</tr>
					<tr class="row-3 odd">
						<td class="column-1">Products Offered</td>
						<td class="column-2">Protective Custom Choice UL <br/>
							Protective Advantage Choice UL<br/>
							Protective Indexed Choice UL<br/>
							Protective Classic Choice Term<br/>
							Protective One Year Term <br/>
							ProClassic II <br/>
							ProClassic Legacy<br/>
							Investors Choice VUL <br/>
							Strategic Objective VUL<br/>
							Survivorship Term <br/>
							Survior UL<br/>
							Protective Whole Life
						</td>
						<td class="column-3">Basic Term Life <br/>
							Supplemental Life<br/>
							Dependent Life<br/>
							Voluntary Retiree Life<br/>
							Whole life insurance<br/>
							Group Variable Universal Life (GVUL)<br/>
							Group Universal Life (GUL)<br/>
							Basic Accidental Death &amp; Dismemberment (AD&amp;D)<br/>
							Supplemental AD&amp;D<br/>
							Dependent AD&amp;D<br/>
							Voluntary AD&amp;D<br/>
							Business Travel Accident (BTA)
						</td>
					</tr>
					<tr class="row-4 even">
						<td class="column-1">Riders Available</td>
						<td class="column-2">Accidental death benefit rider.<br/>
							Accelerated death benefit rider.<br/>
							Waiver of premium rider. <br/>
							Disability income rider.<br/>
							Guaranteed insurability rider.<br/>
							Term insurance rider.<br/>
							Children’s term rider.
						</td>
						<td class="column-3">Accidental Death Benefit Rider<br/>
							Accelerated Death<br/>
							Benefit Rider
						</td>
					</tr>
					<tr class="row-5 odd">
						<td class="column-1">States</td>
						<td class="column-2">50</td>
						<td class="column-3">50</td>
					</tr>
					</tbody>
				</table>

				<h2>Protective vs Metlife Overall</h2>

				<table id="tablepress-93" class="tablepress tablepress-id-93">

					<thead>
					<tr class="row-1 odd">
						<th class="column-1">&nbsp;</th>
						<th class="column-2">Protective</th>
						<th class="column-3">Metlife</th>
					</tr>
					</thead>
					<tbody class="row-hover">
					<tr class="row-2 even">
						<td class="column-1">Top Awards</td>
						<td class="column-2"> 2010 Optimas Award from Workforce Management Magazine</td>
						<td class="column-3">Best Place to Work for Disability Inclusion<br/>
							America's Top 50 Organizations for Multicultural Business Opportunities<br/>
							Best Customer Experience, Product or Service Innovation with Cogito — Real Time Customer Service Coaching
						</td>
					</tr>
					<tr class="row-3 odd">
						<td class="column-1">Pro's</td>
						<td class="column-2">Financially sound.<br/>
							Competitive, comprehensive rates.<br/>
							Flexible health guidelines.
						</td>
						<td class="column-3">High Security<br/>
							Policy Variety<br/>
							Additional Insurance Coverage Options
						</td>
					</tr>
					<tr class="row-4 even">
						<td class="column-1">Con's</td>
						<td class="column-2">Approval can take awhile. <br/>
							Low tolerance for smoking.
						</td>
						<td class="column-3">No Online Application<br/>
							Major Class Action Lawsuits
						</td>
					</tr>
					</tbody>
				</table>

				<p>Disclaimer: We make every attempt to make sure our information is up to date, but since thing change often it is best to double check the data. This review is an opinion.</p>
			</article>
		</section>
		<!-- END PAGE-CONTENT -->

		<section class="related-articles">
			<h2>Related Articles</h2>
			<?=$this->render('@app/views/layouts/resource_grid.php', ['grid_data' => $grid_data]);?>
		</section>
	</div>
<?=$this->render('/main/widgets/bio-jonathan-holloway.php'); //Bio Embed Code?>