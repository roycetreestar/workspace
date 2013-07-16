<div class="well">
	<h3>display_user_p:</h3>
	<!--<textarea style='width:40%; height:500px;'><?= print_r($user, true)?></textarea><br/>-->
	<table>
		<tr><td>userid		</td><td><?=$user[0]['entity_id']?>			</td></tr>
		<tr><td>username	</td><td><?=$user[0]['user_name']?>	</td></tr>
		<tr><td>password	</td><td><?=$user[0]['password']?>		</td></tr>
		<tr><td>first_name	</td><td><?=$user[0]['first_name']?>	</td></tr>
		<tr><td>last_name	</td><td><?=$user[0]['last_name']?>	</td></tr>
		<tr><td>phone		</td><td><?=$user[0]['phone']?>		</td></tr>
		<tr><td>status		</td><td><?=$user[0]['status']?>		</td></tr>
		<tr><td>email		</td><td><?=$user[0]['email']?>		</td></tr>
		
	</table>

	<?php
//		}
	?>
</div>