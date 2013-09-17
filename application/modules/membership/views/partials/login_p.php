<?php

if(isset($message))
	$message_value = $message;
else
	$message_value = '';
?>
<div  >


	<div id="login_message"> <?= $message_value ?> </div>

	<form action="<?= base_url('membership/users/do_login') ?>" method="post">
	
		<table>
			<tr><td>username:	</td><td><input type="username" name="username" /></td></tr>
			<tr><td>password:	</td><td><input type="password" name="password" /></td></tr>

			<tr><td><input type="submit" value="login" /></td></tr>
		</table>
	</form>
</div>
