<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
 //~ die('<pre>'.print_r(get_defined_vars(), true).'</pre>');
?>
		<?=$this->load->view('header_v'); ?>
<h1>membership/views/membership_v.php</h1>



<div class="row-fluid">
	<div class="span2" style="position:fixed; bottom:10px;">
		<?php $this->load->view('partials/session_array_p') ?>
	</div>
	
	<div class="span10 offset2" >

		<div class="row-fluid">
			<div class="span4">
				<?php // $this->load->view('partials/my_profile_p') ?>
				<?php $this->load->view('partials/display_user_p') ?>
			</div>
			
			<div class="span4">
				<?php // $this->load->view('partials/join_group_p') ?>
				<?php $this->load->view('partials/my_groups_p') ?>	
			</div>
			<div class="span4">
				<?php $this->load->view('partials/my_resources_p') ?>
			</div>
		</div>	

		<div class="row-fluid" >
			<div class="span4" style="height:550px;overflow:auto;">
				<?php $this->load->view('partials/view_users_p') ?>
			</div>
			
			<div class="span4">
				<?php $this->load->view('partials/available_groups_p') ?>	
			</div>
			
<!--			<div class="span4">
				<?php $this->load->view('partials/available_resources_p')?>
			</div>-->
		</div>

		
		
<!-- create things -->
		<div class="row-fluid" >
			<div class="span4">
				<?php $this->load->view('partials/form_user_p') ?>
			</div>
			<div class="span4">
				<?php $this->load->view('partials/form_group_p') ?>	
			</div>
			<div class="span4">
				<?php $this->load->view('partials/form_resource_p') ?>
			</div>
		</div>


	</div>
</div>





<style>
	.well
	{
		border:solid green 2px;
		background-color:lemonchiffon;
	}
	.half_width
	{
		width:50%;
	}
</style>
