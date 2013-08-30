<div class="well">
	<h3>membership/views/partials/display_user_p:</h3>
<!--	<textarea style='width:40%; height:500px;'><?php // print_r($user, true)?></textarea><br/>	-->
	<table>
		<tr><td>userid		</td><td><?=$user['entity_id']?>			</td></tr>
		<tr><td>username	</td><td><?=$user['user_name']?>	</td></tr>
		<tr><td>password	</td><td><?=$user['password']?>		</td></tr>
		<tr><td>first_name	</td><td><?=$user['first_name']?>	</td></tr>
		<tr><td>last_name	</td><td><?=$user['last_name']?>	</td></tr>
		<tr><td>phone		</td><td><?=$user['phone']?>		</td></tr>
		<tr><td>status		</td><td><?=$user['status']?>		</td></tr>
		<tr><td>email		</td><td><?=$user['email']?>		</td></tr>
		
	</table>

	<?php
//		}
	?>
</div>
