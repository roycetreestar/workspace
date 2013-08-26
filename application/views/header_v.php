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
			<a class='btn' href="<?php echo base_url('fluorish_driver/logout') ?>">logout</a>
			<a class='btn' href="<?php echo base_url('fluorish_driver/dashboard') ?>">dashboard</a>
		<?php 
		if(isset( $this->session->userdata['logged_in']))
		{
		?>

			<a class='btn pull-right' href="<?php echo base_url('fluorish_driver/user_profile/'.$this->session->userdata['logged_in']['userid']) ?>">profile</a>
		<!--	<a class='btn pull-right' href="<?php //echo base_url('cytometers/edit') ?>">cytometer config</a>-->
		
<!-- cytometer stuff -->	
			<div class="dropdown pull-right">
				<a class="dropdown-toggle btn" data-toggle="dropdown" href="#">Cytometer Stuff <span class="caret"></span></a>
				<ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu">
					<li><a tabindex="-1" href="<?=base_url().'cytometers/my_instruments'?>">All My Cytometers</a></li>
					<li><a tabindex="-1" href="<?php echo base_url('cytometers/edit') ?>">Cytometer Form (configurator)</a></li>
					<li><a tabindex="-1" href="#">cytometer display</a></li>
					
				</ul>
			</div>		
			
<!-- inventory stuff -->
			<div class="dropdown pull-right">
				<a class="dropdown-toggle btn" data-toggle="dropdown" href="#">Inventory Stuff <span class="caret"></span></a>
				<ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu">
					<li><a tabindex="-1" href="<?=base_url().'inventory'?>">Display My Inventories</a></li>
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
			
		<?php
		}
		?>
		</div>
