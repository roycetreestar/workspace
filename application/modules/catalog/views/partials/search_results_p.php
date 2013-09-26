<div>
	<table class="table table-bordered">
		<tr>
			<th>Company (Supplier)</th>
			<th>Target (Specificity)</th>
			<th>Format (Fluorochrome)</th>
			<th>Clone</th>
			<th>Amount></th>
			<th>Recent Price</th>
			<th>Catalog Number/Datasheet</th>
			<th>Regulatory Status</th>
			<th>Add to Cart</th>
			
		</tr>
		<?php 
		foreach($results as $result)
		{
?>
			<tr>
					<td style="padding-left:15px;">
						<div class="sprite_container">
							<div class="sprite_vendors sprite_vendors_<?=$result['vendor_name']?>">
								<img src="<?=base_url()?>" />
							</div>
						</div>
						<div class="sprite_vendor_name"><?=$result['vendor_name']?></div>
					</td>
					<td><?=$result['target']?></td>
					<td><?=$result['format']?></td>
					<td><?=$result['clone']?></td>
					<td><?=$result['unit_size']?></td>
					<td><?=$result['price']?></td>
					<td><?=$result['catalog_number']?></td>
					<td><?=$result['regulatory_status']?></td>
					<td><a class="btn">+</a></td>
				</tr>
			
<?php		}
?>
	
	</table>

</div>

<?php
//~ echo '$results:<br/><pre>'.print_r($results, true).'</pre>';
?>
