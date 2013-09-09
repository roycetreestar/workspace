<!doctype html>

<html>
	<head>
		<script type="text/javascript" src="<?php echo base_url('assets/jquery.js') ?>" ></script>
		<script type="text/javascript" src="<?php echo base_url('assets/bootstrap/js/bootstrap.min.js') ?>" ></script>
		
		<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>">
<!--	<link rel="stylesheet" type="text/css" href="<?php //echo base_url('assets/membership.css') ?>">	-->
		
		<!-- make sure we've got the greek characters rendering properly -->
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

	</head>
	
	<body>
		<div id="navbar">
			<a class='btn' href="<?php echo base_url('backstage/logout') ?>">logout</a>
			<a class='btn' href="<?php echo base_url('fluorish_gui') ?>">dashboard</a>
		<?php 
		if(isset( $this->session->userdata['logged_in']))
		{
		?>

			<a class='btn ' href="<?php echo base_url('backstage/debug_page') ?>">debug_page</a>
			<a class='btn pull-right' href="<?php echo base_url('backstage/user_profile/'.$this->session->userdata['logged_in']['userid']) ?>">profile</a>
		<!--	<a class='btn pull-right' href="<?php //echo base_url('cytometers/edit') ?>">cytometer config</a>-->
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
<!-- group/user stuff -->	
			<div class="dropdown pull-right">
				<a class="dropdown-toggle btn" data-toggle="dropdown" href="#">group/user Stuff <span class="caret"></span></a>
				<ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu">
					<li><a tabindex="-1" href="<?=base_url().'backstage/edit_group/'?>">form create a group</a></li>
					<li><a tabindex="-1" href="<?=base_url().'backstage/edit_group/'.key($this->session->userdata['groups'])?>">edit group</a></li>
					<li><a tabindex="-1" href="<?=base_url().'backstage/display_group/'.key($this->session->userdata['groups'])?>">display_group_p </a></li> <!-- key() grabs the key of the first element (the first group's entity_id) -->					
					<li><a tabindex="-1" href="<?=base_url().'backstage/get_group_array/'.key($this->session->userdata['groups'])?>">my_group as an array</a></li>
					<li><a tabindex="-1" href="<?=base_url().'backstage/get_group_xml/'.key($this->session->userdata['groups'])?>">my_group as xml</a></li>
					
<!--				<li><a tabindex="-1" href="<?php //base_url().'membership/groups/display_group/'.key($this->session->userdata['groups'])?>">display_group_p </a></li> -->
					<li><a tabindex="-1" href="<?=base_url().'backstage/my_groups/'.$this->session->userdata['logged_in']['userid']?>">my groups</a></li>
					<li><a tabindex="-1" href="<?=base_url().'backstage/available_groups/'.$this->session->userdata['logged_in']['userid']?>">available groups</a></li>
				<li class="divider"></li>
					<li><a tabindex="-1" href="<?=base_url().'backstage/edit_user'?>">user registration form</a></li>					
					<li><a tabindex="-1" href="<?=base_url().'backstage/edit_user/'.$this->session->userdata['logged_in']['userid']?>">edit my_user</a></li>
					<li><a tabindex="-1" href="<?=base_url().'backstage/get_user_array/'.$this->session->userdata['logged_in']['userid']?>">my_user as an array</a></li>
					<li><a tabindex="-1" href="<?=base_url().'backstage/get_user_xml/'.$this->session->userdata['logged_in']['userid']?>">my_user as xml</a></li>
					<li><a tabindex="-1" href="<?=base_url().'backstage/display_user/'.$this->session->userdata['logged_in']['userid']?>">display my_user</a></li>
					<li><a tabindex="-1" href="<?=base_url().'backstage/user_profile/'.$this->session->userdata['logged_in']['userid']?>">user profile</a></li>
					
					
					
				</ul>
			</div>	
			
			
		
			
			
<!-- cytometer stuff -->	
			<div class="dropdown pull-right">
				<a class="dropdown-toggle btn" data-toggle="dropdown" href="#">Cytometer Stuff <span class="caret"></span></a>
				<ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu">
					<li><a tabindex="-1" href="<?=base_url().'cytometers/my_instruments'?>">Display My Cytometers</a></li>
					<li><a tabindex="-1" href="<?php echo base_url('cytometers/edit') ?>">Cytometer Form (configurator)</a></li>	
					<li class="divider"></li>
					<li class="divider"></li>
					<li><a tabindex="-1" href="<?php echo base_url('backstage/my_cytometers') ?>">		backstage/my_cytometers</a></li>
					<li><a tabindex="-1" href="<?php echo base_url('backstage/display_cytometer') ?>">	backstage/display_cytometer</a></li>
					<li><a tabindex="-1" href="<?php echo base_url('backstage/edit_cytometer') ?>">		backstage/edit_cytometer</a></li>
					<li><a tabindex="-1" href="<?php echo base_url('backstage/cytometer_xml') ?>">		backstage/cytometer_xml</a></li>
					<li><a tabindex="-1" href="<?php echo base_url('backstage/cytometer_array') ?>">	backstage/cytometer_array</a></li>
									
				</ul>
			</div>		
			
			
			
			
<!-- inventory stuff -->
			<div class="dropdown pull-right">
				<a class="dropdown-toggle btn" data-toggle="dropdown" href="#">Inventory Stuff <span class="caret"></span></a>
				<ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu">
					<li><a tabindex="-1" href="<?=base_url().'inventory/create_inventory'?>">create a new inventory</a></li>
					<li><a tabindex="-1" href="<?=base_url().'inventory/my_inventories'?>">Display My Inventories</a></li>
					<li><a tabindex="-1" href="<?=base_url().'inventory/edit'?>">Edit My Inventories</a></li>
					<li class="divider"></li>
					<li><a tabindex="-1" href="<?=base_url().'inventory/get_form_add_cat_num'?>">Add an Item by Catalog Number</a></li>
					<li><a tabindex="-1" href="<?=base_url().'inventory/get_form_add_item/45'?>">Add an Item Manually</a></li>
<!--					<li><a tabindex="-1" href="<?php //base_url().'inventory/form_inventory_item'?>">An Inventory Item Display Element</a></li>

		<li class="divider"></li>
					<li><a tabindex="-1" href="#">Full Inventory Form</a></li>
					<li><a tabindex="-1" href="#">Full Inventory Display</a></li>
-->
					<li class="divider"></li>
					<li><a tabindex="-1" href="<?=base_url().'inventory/get_form_show_fields'?>">Show_Fields Form (inventory preferences)</a></li>
					<li><a tabindex="-1" href="<?=base_url().'inventory/get_form_filter'?>">Filter Inventory Items</a></li>
				</ul>
			</div>
			
			
			
			
			
			
			
<!-- panel stuff -->	
			<div class="dropdown pull-right">
				<a class="dropdown-toggle btn" data-toggle="dropdown" href="#">Panel Stuff <span class="caret"></span></a>
				<ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu">
					<li><a tabindex="-1" href="<?=base_url().'backstage/my_panels/'?>">backstage/my_panels</a></li>
					<li><a tabindex="-1" href="<?=base_url().'backstage/display_panel'?>">backstage/display_panel</a></li>
					<li><a tabindex="-1" href="<?=base_url().'backstage/edit_panel'?>">backstage/edit_panel</a></li>
					<li><a tabindex="-1" href="<?=base_url().'backstage/panel_xml'?>">backstage/panel_xml</a></li>
					<li><a tabindex="-1" href="<?=base_url().'backstage/panel_array'?>">backstage/panel_array</a></li>
				</ul>
			</div>	
			
			
			
			
<!-- address stuff -->	
			<div class="dropdown pull-right">
				<a class="dropdown-toggle btn" data-toggle="dropdown" href="#">address Stuff <span class="caret"></span></a>
				<ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu">
					<li><a tabindex="-1" href="<?=base_url().'backstage/my_addresses'?>">backstage/my_addresses</a></li>
					<li><a tabindex="-1" href="<?=base_url().'backstage/edit_address' ?>">backstage/edit_address </a></li>
					<li><a tabindex="-1" href="<?=base_url().'backstage/display_address'?>">backstage/display_address</a></li>
					<li><a tabindex="-1" href="<?=base_url().'backstage/address_xml'?>">backstage/address_xml</a></li>
					<li><a tabindex="-1" href="<?=base_url().'backstage/address_array'?>">backstage/address_array</a></li>
					
				</ul>
			</div>	
		<?php
		}
		?>
		</div>
