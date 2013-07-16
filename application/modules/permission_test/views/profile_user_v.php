
<div class="well row-fluid">
	<h1>profile_user_p</h1>
</div>
<div class="well row-fluid">
	
	<div class="span2" >
		<?php $this->load->view('partials/session_array_p') ?>
	</div>
	
	<div class='span9'>
		<div class='row-fluid'>
			<div class='span5 '>
				<?= $this->load->view('partials/display_user_p') ?>
			</div>
			<div class='span5 '>
				<?= $this->load->view('partials/my_resources_p') ?>
			</div>
		</div>

<!--		<div class='row-fluid'>
			<div class='span4 '>
				<?= $this->load->view('partials/form_cytometer_p') ?>
			</div>
			<div class='span4 '>
				<?= $this->load->view('partials/form_panel_p') ?>
			</div>
		</div>-->
	</div>
</div>