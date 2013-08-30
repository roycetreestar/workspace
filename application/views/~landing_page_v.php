<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>


<h1>landing_page_v.php</h1>



<div class="row-fluid">
	<div class="span2" >
		<?php  $this->load->view('membership/partials/session_array_p') ?>
	</div>
	
	<div class="span5">
		<?php $this->load->view('membership/partials/form_user_p') ?>
	</div>
	
	<div class="span5">
		<?php  $this->load->view('backstage/partials/login_p') ?>
	</div>	
</div>	



