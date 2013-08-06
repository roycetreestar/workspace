<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div class="well">
	<h1>view_users_p</h1>
<?php 
	foreach($users as $user)
	{
?>
		<div class="well">
			userid:<?=$user['entity_id']?><br/>
			username:<?=$user['user_name']?><br/>
			password:<?=$user['password']?><br/>
			first_name:<?=$user['first_name']?><br/>
			last_name:<?=$user['last_name']?><br/>
			phone:<?=$user['phone']?><br/>
			status:<?=$user['status']?><br/>
			email:<?=$user['email']?><br/>
		</div>
<?php
		// print address(es)
	}
	
	
?>
	
</div>