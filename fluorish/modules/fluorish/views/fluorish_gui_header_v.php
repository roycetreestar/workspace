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
