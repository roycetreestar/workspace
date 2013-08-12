
<div class="well">
	<h1>my_resources_p</h1>
	
<?php
	if(!empty($this->session->userdata['groups']))
	{
		foreach( $this->session->userdata['groups'] as $this_group)
		{
			$this->load->view('group_resources_p', $this_group);
		}
	}
?>
</div>
