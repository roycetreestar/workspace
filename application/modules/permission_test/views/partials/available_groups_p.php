<div class="well">
	<h1>available_groups_p</h1>
<?php 
	foreach($available_groups as $group)
	{
		$groupid = $group['id'];
	
?>
		<div class="well">
			<div class="well" id="available_group_<?=$groupid?>"></div>
			<table class="table ">
				<tr><td>group_name:				</td><td><?=$group['group_name']?>				</td></tr>
				<tr><td>long_group_name:			</td><td><?=$group['long_group_name']?>			</td></tr>
				<tr><td>parent_group:			</td><td><?=$group['parent_group']?>			</td></tr>
				<tr><td>access:				</td><td><?=$group['access']?>				</td></tr>
				<tr><td>email:					</td><td><?=$group['email']?>					</td></tr>
				<tr><td>phone:					</td><td><?=$group['phone']?>					</td></tr>
				<tr><td>additional_information:	</td><td><?=$group['additional_information']?>	</td></tr>
			</table>
			<a class="btn" id="join_group_button_<?=$groupid?>" >Join Group</a>
		</div>
<?php

	}
?>
</div>












<script>
	$('[id^=join_group_button]').click( function(event)
	{

		event.preventDefault();				
		var ID = $(this).attr("id");
		var groupid = ID.substr(ID.lastIndexOf('_')+1);
//alert('about to send this url:\n index.php/permission_test/join_group/<?=$this->session->userdata['logged_in']['userid']?>/'+groupid+'/0/1');	
		var values = $(this).serialize();	
		
		$('#available_group_'+groupid).html('');
		
//alert('submitted:'+ $(this).serialize());
		$.ajax(
		{
//			url: 'permission_test/join_group/',
			url: 'permission_test/groups/join_group/<?=$this->session->userdata['logged_in']['userid']?>/'+groupid+'/0/1',
			type: 'get',
			data: values,
			success:function(msg)
			{
//alert('message: \n'+msg);
				if(msg === 'success')
					$('#available_group_'+groupid).html('Group joined\n'+msg).css('color', 'green');
				else
					$('#available_group_'+groupid).html(msg).css('color', 'red');
			},
			error:function(msg)
			{
alert('error message: \,'+msg.responseText);	
			}
		});
	});
</script>