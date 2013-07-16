<div class="well row-fluid">
	<div class="well span4">
		<h1>profile_group_v</h1>
	</div>
	<div class="well span4 ">
		group name: <?=$group['long_group_name'] ?><br/>
		group_type: <?=$group['group_type'] ?>
	</div>
	<div class="well span4 ">
		your permission level: <?=$group['permission']?><br/>
	</div>
	
</div>





<div class="row-fluid">
<!-- display the session array -->
	<div class="span2" style="position:fixed; bottom:10px; ">
		<?php $this->load->view('partials/session_array_p') ?>
	</div>


	
	<div class="well span9 offset2">
		
		<div class='row-fluid'>
			<div class='span6'>
				<?php				
				//<!-- the groups table data -->
					 $this->load->view('partials/display_group_p', $group) ;

				//<!-- all of the group's resources -->

					foreach ($group['resources'] as $resource)
					{
						$data['rdata'] = $resource;
						switch($resource['resource_type'])
						{
							case 'address':
								$class='addresses';
								break;
							case 'cytometer':
								$class = 'cytometers';
								break;
							case 'panel':
								$class = 'panels';
								break;
							case 'other':
								$class = 'other_resources';
								break;
						}
						echo '<a href="'.base_url('index.php/permission_test/'.$class.'/display/'.$resource['id']).'">'.$resource['resource_name'].'</a><br/>';
				//			$this->load->view('partials/display_resource_p', $data);
					}

				?>			
			</div>
			<div class='span6'>
	<!-- create an address -->
	<?php 
		if($group['permission'] == 1 )														// 1 == edit/manage
		{
			$this->load->view('partials/form_address_p', $group) ;
		}

		if($group['group_type'] == 0 || $group['group_type'] == 1 || $group['group_type'] === 'core')		//0 == personal resource-group; 1 == core
		{
			if($group['permission'] == 1 )
				$this->load->view('partials/form_cytometer_p', $group);
		}
		if($group['group_type'] == 0  || $group['group_type'] == 2 || $group['group_type'] === 'lab')		//2 == lab
		{
			if($group['permission'] == 1 )
				$this->load->view('partials/form_panel_p', $group);
		}




	?>
			</div>
		</div><!-- end row -->
	</div>
	
</div><!-- end .row -->