<?php
// $handle = file_get_contents("D:\\csv.csv");
// $handle = explode("\n",$handle);
// print_r($handle);
// print_r(explode(";",$handle[9]));
if(count($prices)){
	$i=0;
	foreach ($prices as $term => $data) {
		$i++;
		echo '<div class="col-md-3 wrap">
		   <div class="plan">
		        <div class="offer">best value</div>
		       <div class="term">'.$term.' Years</div>
		       <div class="price">$'.round($data['month'], 2).'/month</div>
		       <div class="button">
		           <button id="applynow_'.$i.'" type="button" class="btn btn-default btn-lg btn-apply">Apply Now</button>
		       </div>
		   </div>
		</div>';
	}
}else{
	echo '<div class="alert alert-danger">
		  	<strong>Sorry, but we could not find the appropriate plan for you.</strong>
		  </div>';
}

?>
