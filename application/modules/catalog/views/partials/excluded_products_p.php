<?php //	PRINTS OUT EACH EXCLUDED PRODUCT BASED ON THE $EXCLUDE VARIABLE 
	// $excluded_rows contains the following array elements:
	// [0] => $catalog_number
	// [1] => $problem_field
	// [2] => $item
	// [3] => $weblink
?>


<div class="well">
	<h3>EXCLUDES:</h3>
	These products will be imported directly into the database without passing through our chrome/target/species ontology validation processes
	<hr/>
	<?php 
		$count = 1;
		foreach ($excluded_rows as $row)
		{
			echo $count.' --  Catalog_number:'.$row['catalog_number'].' | problem field:'.$row['problem_field'].' | problem term:"'.$row['problem_string'].'" | product URL:'.$row['weblink'].'<br/>';
			$count++;
		}
	?>
</div>


