<!doctype html>

<html>
	<head>
		<script type="text/javascript" src="<?php echo base_url('assets/jquery.js') ?>" ></script>
		<script type="text/javascript" src="<?php echo base_url('assets/bootstrap/js/bootstrap.min.js') ?>" ></script>
		
		<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/permission_test.css') ?>">
	</head>
	
	<body>
		<div id="navbar">
			<a class='btn' href="<?php echo base_url('index.php/permission_test/users/logout') ?>">logout</a>
			<a class='btn' href="<?php echo base_url('index.php/permission_test') ?>">dashboard</a>
		<?php if(isset( $this->session->userdata['logged_in']))
		{
		?>
			<a class='btn' href="<?php echo base_url('index.php/permission_test/users/profile/'.$this->session->userdata['logged_in']['userid']) ?>">profile</a>
		<?php
		}
		?>
		</div>