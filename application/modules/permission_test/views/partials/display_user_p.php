<div class="well">
	<h3>display_user_p:</h3>
<!--	<textarea style='width:40%; height:500px;'><?= print_r($user)?></textarea><br/>-->
	<table>
		<tr><td>userid		</td><td><?=$user[0]['id']?>			</td></tr>
		<tr><td>username	</td><td><?=$user[0]['user_name']?>	</td></tr>
		<tr><td>password	</td><td><?=$user[0]['password']?>		</td></tr>
		<tr><td>first_name	</td><td><?=$user[0]['first_name']?>	</td></tr>
		<tr><td>last_name	</td><td><?=$user[0]['last_name']?>	</td></tr>
		<tr><td>phone		</td><td><?=$user[0]['phone']?>		</td></tr>
		<tr><td>status		</td><td><?=$user[0]['status']?>		</td></tr>
		<tr><td>email		</td><td><?=$user[0]['email']?>		</td></tr>
		
	</table>
<!--	<h3>user address(es)</h3>-->
	
	<?php
////	die('$user_address: <textarea>'.print_r($user_address, true).'</textarea>');
//		foreach($user_address as $addr)
//		{
	?>
<!--	<table>
		<tr><td>address_line_1	</td><td><?=$addr[0]['address_line_1']?>	</td></tr>
		<tr><td>address_line_2:	</td><td><?=$addr[0]['address_line_2']?>	</td></tr>
		<tr><td>city:			</td><td><?=$addr[0]['city']?>			</td></tr>
		<tr><td>state:			</td><td><?=$addr[0]['state']?>			</td></tr>
		<tr><td>zipcode:		</td><td><?=$addr[0]['zipcode']?>		</td></tr>
		<tr><td>country:		</td><td><?=$addr[0]['country']?>		</td></tr>
			
	
	</table>-->
				
	
	
	
	<?php
//		}
	?>
</div>