<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
		
<h1>from the view</h1>

<!--
	<a href='<?=base_url('index.php/permission_test/register')?>'>register</a>
	<br/>
	<a href='<?=base_url('permission_test/view_groups')?>'>view_groups</a>
	<br/>
	<a href='<?=base_url('permission_test/view_my_groups')?>'>view_my_groups</a>
	<br/>
	<a href='<?=base_url('permission_test/create_group')?>'>create_group</a>
	<br/>
	<a href='<?=base_url('permission_test/edit_group')?>'>edit_group</a>
	<br/>
-->


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