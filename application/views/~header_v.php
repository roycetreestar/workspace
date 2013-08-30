<!doctype html>

<html>
	<head>
		<script type="text/javascript" src="<?php echo base_url('assets/jquery.js') ?>" ></script>
		<script type="text/javascript" src="<?php echo base_url('assets/bootstrap/js/bootstrap.min.js') ?>" ></script>
		
		<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>">
<!--	<link rel="stylesheet" type="text/css" href="<?php //echo base_url('assets/membership.css') ?>">	-->
	</head>
	
	<body>
		<div id="navbar">
			<a class='btn' href="<?php echo base_url('backstage/logout') ?>">logout</a>
			<a class='btn' href="<?php echo base_url('backstage/dashboard') ?>">dashboard</a>
		<?php 
		if(isset( $this->session->userdata['logged_in']))
		{
		?>

			<a class='btn' href="<?php echo base_url('backstage/user_profile/'.$this->session->userdata['logged_in']['userid']) ?>">profile</a>
			<a class='btn' href="<?php echo base_url('cytometers/edit') ?>">cytometer config</a>
			<a class='btn' href="<?php echo base_url('cytometers/my_instruments') ?>">my instruments</a>
		<?php
		}
		?>
		</div>
