<div class="well row-fluid">
	<h1>backstage/views/profile_user_v</h1>
</div>
<div class="well row-fluid">
	
	<div class="span2" >
		<?php $this->load->view('membership/partials/session_array_p') ?>
	</div>
	
	<div class='span9'>
		
		<div class='row-fluid'>
			<div class='span5 '>
				<?= $this->load->view('membership/partials/display_user_p') ?>
			</div>
			
			
			<div class='span5 '>
				<?= $this->load->view('membership/partials/my_resources_p') ?>
			</div>
		</div>


	</div>
</div>
