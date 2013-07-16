<?php
//die(print_r($group));
if(isset($cytometer))
	{
		$groupid = $cytometer['groupid'];
		$cytometerid = $cytometer['cytometerid'];
		$name = $cytometer['name'];
		$resource_type = $cytometer['resource_type'];
		$metadata = $cytometer['metadata'];
		$manufacturer = $cytometer['manufacturer'];
		$model = $cytometer['model'];
		$xml = $cytometer['xml'];
		$size = $cytometer['size'];
		$name = $cytometer['name'];
		$timestamp = $cytometer['timestamp'];
		$hash = $cytometer['hash'];
		$uploaded_file_name = $cytometer['uploaded_file_name'];

		
		$edit = 'update_cytometer';
	}
	else 
	{
		if(isset($group_id))
//			echo '<h1 style="color:red">$id:'.$id.'</h1>';
			$groupid = $group_id;		//'';
		else $groupid = '';
		$cytometerid= '';
		$name = '';
		$resource_type = '';
		$metadata = '';
		$manufacturer = '';
		$model = '';
		$xml = '';
		$size = '';
		$name = '';
		$timestamp = '';
		$hash = '';
		$uploaded_file_name = '';
		
		
		$edit = 'create_cytometer';
	}
?>
<div class="well ">
	<h2>form_cytometer_p</h2>
	<form action='<?=base_url('index.php/permission_test/cytometers/'.$edit)?>' method='post'>
		<table>
			<tr><th colspan='2'>resource data:</th></tr>
			<tr><td>cytometerid					</td><td>	<input type='text' name='id' value="<?=$cytometerid?>" readonly /></td></tr>
			<tr><td>group_id					</td><td>	<input type='text' name='group_id' value="<?=$groupid?>" readonly /></td></tr>
			<tr><td>resource_name				</td><td>	<input type='text' name='resource_name' value="<?=$name?>" /></td></tr>
			<tr><td>resource_type				</td><td>	<input type='text' name='resource_type' value='cytometer' readonly /></td></tr>
			<tr><td>metadata					</td><td>	<input type='text' name='metadata' value="<?=$metadata?>" /></td></tr>

			<tr><th colspan='2'> cytometer specific data:</th></tr>
			<tr><td>user_id (the creator's userid)	</td><td>	<input type='text' name='user_id' value="<?=$this->session->userdata['logged_in']['userid']?>" readonly /></td></tr>
			<tr><td>manufacturer				</td><td>	<input type='text' name='manufacturer' value="<?=$manufacturer?>"/></td></tr>
			<tr><td>model						</td><td>	<input type='text' name='model' value="<?=$model?>"/></td></tr>
			<tr><td>xml						</td><td>	<input type='text' name='xml' value="<?=$xml?>"/></td></tr>
			<tr><td>size						</td><td>	<input type='text' name='size' value="<?=$size?>" readonly /></td></tr>
			<tr><td>name						</td><td>	<input type='text' name='name' value="<?=$name?>"/></td></tr>
			<tr><td>timestamp					</td><td>	<input type='text' name='timestamp' value="<?=$timestamp?>" readonly /></td></tr>
			<tr><td>hash						</td><td>	<input type='text' name='hash' value="<?=$hash?>" readonly /></td></tr>
			<tr><td>uploaded_file_name			</td><td>	<input type='text' name='uploaded_file_name' value="<?=$uploaded_file_name?>"/></td></tr>



			<tr><td><input type='submit' value='Save' /></td></tr>
		</table>
	</form>
	
	
	
</div>