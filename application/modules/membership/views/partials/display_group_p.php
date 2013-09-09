<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div class="well" id="my_group_<?=$group['entity_id']?>">
<!--	<h3>display_group_p.php</h3>	-->
	<h3><?=$group['group_name']?></h3>
				<div class="well" id="my_group_result_<?=$group['entity_id']?>"></div>
				group_id: 						<?=$group['entity_id']?>				<br/>
				group_name: 					<?=$group['group_name']?>				<br/>
				long_group_name: 				<?=$group['long_group_name']?>			<br/>
				parent_group: 					<?=$group['parent_group']?>				<br/>
				access: 						<?=$group['access']?>					<br/>
				email: 							<?=$group['email']?>					<br/>
				phone: 							<?=$group['phone']?>					<br/>
				additional_information: <br/>	<?=$group['additional_information']?>	<br/>
				
			<!--	<a class="btn" id="remove_from_group_<?=$group['entity_id']?>">remove from group</a>	-->
</div>
