<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<?php $this->load->view('header_v'); ?>

<h1>Permission test landing page</h1>

<div class="row-fluid">
	<div class="span6">
		<?php $this->load->view('partials/form_user_p') ?>
	</div>
	<div class="span6">
		<?php $this->load->view('partials/login_p') ?>
	</div>	
</div>	


<!--<div class="span2" style="position:fixed; bottom:10px;">
		<?php  $this->load->view('partials/session_array_p') ?>
	</div>-->