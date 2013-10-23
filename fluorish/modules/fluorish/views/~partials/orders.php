<div class="widget widget-2 widget-body-white">
	<div class="widget-head">
		<h4 class="heading glyphicons shopping_cart"><i></i> Orders</h4>
	</div>
	<div class="widget-body">
		<table class="table table-condensed table-primary table-vertical-center table-thead-simple">
			<thead>
				<tr>
					<th class="center" style="width: 1%"><?php echo $translate->_('no_crt'); ?></th>
					<th><?php echo $translate->_('transaction'); ?></th>
					<th class="center"><?php echo $translate->_('date'); ?></th>
					<th class="center"><?php echo $translate->_('amount'); ?></th>
					<th class="right"><?php echo $translate->_('actions'); ?></th>
				</tr>
			</thead>
			<tbody>
				<?php 
				$trans = array('eBioscience', 'Tombo', 'BDScience', 'Backman & Colture');
				$type = array(
					'<span class="glyphicons up_arrow btn-success btn-action single"><i></i></span>',
					'<span class="glyphicons down_arrow btn-danger btn-action single"><i></i></span>'	
				); 
				?>
				<?php for($i=1;$i<=6;$i++): ?>
				<tr class="selectable">
					<td class="center"><?php echo $i; ?></td>
					<td class="important"><?php echo $type[mt_rand(0,1)] . $trans[mt_rand(0,3)]; ?></td>
					<td class="center"><span class="label label-important">23 Jan 2013</span></td>
					<td class="center">$<?php echo number_format(mt_rand(100,800),2); ?></td>
					<td class="right actions">
						<a href="#" class="btn-action glyphicons eye_open btn-info"><i></i></a>
						<a href="#" class="btn-action glyphicons pencil btn-success"><i></i></a>
						<a href="#" class="btn-action glyphicons remove_2 btn-danger"><i></i></a>
					</td>
				</tr>
				<?php endfor; ?>
			</tbody>
		</table>
		<div class="separator top"><a href="" class="glyphicons list single"><i></i> <?php echo $translate->_('show_all'); ?></a></div>
	</div>
</div>

<br/>