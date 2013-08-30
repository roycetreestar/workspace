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

					//~ foreach ($group['resources'] as $resource)
					//~ {
						//~ $data['rdata'] = $resource;
						//~ switch($resource['resource_type'])
						//~ {
							//~ case 'address':
								//~ $class='addresses';
								//~ break;
							//~ case 'cytometer':
								//~ $class = 'cytometers';
								//~ break;
							//~ case 'panel':
								//~ $class = 'panels';
								//~ break;
							//~ case 'other':
								//~ $class = 'other_resources';
								//~ break;
						//~ }
						//~ echo '<a href="'.base_url('membership/'.$class.'/display/'.$resource['id']).'">'.$resource['resource_name'].'</a><br/>';
				//~ //			$this->load->view('partials/display_resource_p', $data);
					//~ }
				foreach($group['resources'] as $resource)
				{
					$resource_type = $resource['resource_type'];
					switch($resource_type)
					{
						case 'address':
							$resource_class = "addresses";
							$function = 'display';
							break;
						case 'cytometer':
							$resource_class = "cytometers";
							$function = 'config';
							break;
						default:
							$resource_class = "resources";
							$function = 'display';
							break;
					}
					echo '<a href="'.base_url($resource_class.'/'.$function.'/'.$resource['id']).'" >'.$resource['resource_name'].'</a><br/>';
				}
				?>			
			</div>
			<div class='span6'>
				<?php
					$this->load->view('partials/my_groups_p', $group['group_id']);
				?>
			</div>
		</div>
		<div class="row-fluid">
			<div class='span6'>
	<!-- create an address -->
	<?php 
// $group['permission']
//		==0 --> member(r);
//		== 1  --> edit/manage(r/w); 
		if($group['permission'] == 1 )														
		{
			$this->load->view('addresses/partials/form_address_p', $group) ;
		}
		
//$group['group_type'] 
//		==0 --> personal resource-group;	
//		==1 --> core;
//		==2 --> lab
		if($group['group_type'] == 0 || $group['group_type'] == 1 || $group['group_type'] === 'core')		
		{
			if($group['permission'] == 1 )
				//~ $this->load->view('partials/form_cytometer_p', $group);
				$this->load->view('cytometers/cytometer_config_v', $group);
		}
		if($group['group_type'] == 0  || $group['group_type'] == 2 || $group['group_type'] === 'lab')		
		{
			if($group['permission'] == 1 )
				$this->load->view('partials/form_panel_p', $group);
		}
		
//make sub-group
		if($group['permission'] == 1)
		{
			$this->load->view('partials/form_group_p', $group);
//			die('<textarea>'.print_r($group, true).'</textarea>');
		}
		

	?>
			</div>
		</div><!-- end row -->
	</div>
	
</div><!-- end .row -->
