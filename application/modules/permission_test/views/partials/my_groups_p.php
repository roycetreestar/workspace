<div class="well">
	<h1>my_groups_p</h1>
	<?php 
	if(isset($my_groups) )
	{
//die('$my_groups:<textarea>'.print_r($my_groups, true).'</textarea>');
		foreach($my_groups as $group)
		{
	?>		
			<div class="well" id="my_group_<?=$group['id']?>">
				<div class="well" id="my_group_result_<?=$group['id']?>"></div>
				group_name: <?=$group['group_name']?><br/>
				long_group_name: <?=$group['long_group_name']?><br/>
				parent_group: <?=$group['parent_group']?><br/>
				access: <?=$group['access']?><br/>
				email: <?=$group['email']?><br/>
				phone: <?=$group['phone']?><br/>
				additional_information: <?=$group['additional_information']?><br/>
				
				<a class="btn" id="remove_from_group_<?=$group['id']?>">remove from group</a>
			</div>
	<?php

		}
	}
	else
		echo 'You\'re not in any groups';
	?>
</div>










<script>
	$('[id^=remove_from_group_]').click( function(event)
	{

		event.preventDefault();				
		var ID = $(this).attr("id");
		var groupid = ID.substr(ID.lastIndexOf('_')+1);
//alert('about to send this url:\n index.php/permission_test/remove_from_group/<?=$this->session->userdata['logged_in']['userid']?>/'+groupid+'/0/1');	
		var values = $(this).serialize();	
		
		$('#my_group_result_'+groupid).html('');
		
//alert('submitted:'+ $(this).serialize());
		$.ajax(
		{
//			url: 'permission_test/join_group/',
			url: 'permission_test/groups/remove_from_group/<?=$this->session->userdata['logged_in']['userid']?>/'+groupid+'/0/1',
			type: 'get',
			data: values,
			success:function(msg)
			{
//alert('message: \n'+msg);
				if(msg === 'success')
					$('#my_group_result_'+groupid).html('You\'ve been removed from this group\n'+msg).css('color', 'green');
				else
					$('#my_group_result_'+groupid).html(msg).css('color', 'red');
			}
		});
	});
</script>