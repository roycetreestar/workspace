<?php
//~ die('panels/views/partials/form_panel_p.php says:<br/>$panel:<br/><textarea>'.print_r($panel, true).'</textarea>');
	//~ if(isset($panel))
	//~ {
		//~ $resource_id = $panel['resource_id'];
		//~ $group_id = $panel['group_id'];
		//~ $resource_name = $panel['resource_name'];
		//~ $resource_type = $panel['resource_type'];
		//~ //$metadata = $panel['metadata'];
		//~ $xml = $panel['xml'];
//~ //		$user_id = $panel['user_id'];
		//~ $name = $panel['name'];
		//~ $description = $panel['description'];
		//~ $date = $panel['date'];
		//~ $investigator = $panel['investigator'];
		//~ $cytometer = $panel['cytometer'];
		//~ $species = $panel['species'];
		//~ $sharingpref = $panel['sharingpref'];
		//~ $size = $panel['size'];
		//~ $hash = $panel['hash'];
//~ 
		//~ 
		//~ $edit = 'update_panel';
	//~ }
	//~ else 
	//~ {
		//~ if(isset($group_id))
			//~ $groupid = $group_id;		
		//~ else $groupid = '';
		//~ 
		//~ $resource_id = '';
		//~ $resource_name = '';
		//~ $resource_type = '';
		//~ //$metadata = '';
		//~ $xml = '';
//~ //		$user_id = '';
		//~ $name = '';
		//~ $description = '';
		//~ $date = '';
		//~ $investigator = '';
		//~ $cytometer = '';
		//~ $species = '';
		//~ $sharingpref = '';
		//~ $size = '';
		//~ $hash = '';
		//~ 
		//~ 
		//~ $edit = 'create_panel';
	//~ }
	
	if(isset($resource_id))
		$function='update';
	else
		$function='create';
	
?>
<div class="well ">
	<h2>form_panel_p</h2>
	<form action='<?=base_url('panels/'.$function)?>' method='post'>
		<table>
			<tr><th>	resource data:</th></tr>
			<tr><td>	resource_id			</td><td>		<input type='text' name='resource_id' 	value="<?php isset($resource_id)? $resource_id : '' ?>" readonly />	</td></tr>
			<tr><td>	group_id			</td><td>		<input type='text' name='group_id' 		value ="<?php isset($group_id)? $group_id : '' ?>" readonly />		</td></tr>
			<tr><td>	resource_name		</td><td>		<input type='text' name='resource_name'	value ="<?php isset($resource_name) ? $resource_name : '' ?>"/>		</td></tr>
			<tr><td>	resource_type		</td><td>		<input type='text' name='resource_type'	value ="panel" readonly/>			</td></tr>
		<!--	<tr><td>	metadata		</td><td>		<input type='text' name='metadata' 		value ="<?php isset($metadata) ? $metadata : '' ?>"/>				</td></tr>	-->
			<tr><th> panel specific data:	</td><td>																		</th></tr>
		<!--	<tr><td>	xml				</td><td>		<input type='text' name='xml' value ="<?php isset($xml) ? $xml : '' ?>"/>						</td></tr>	-->
			<tr><td>	xml					</td><td>		<textarea name="xml" ><?php isset($xml) ? $xml : '' ?></textarea>									</td></tr>
			<tr><td>	user_id				</td><td>		<input type='text' name='user_id' 		value="<?=$this->session->userdata['logged_in']['userid']?>" readonly />	</td></tr>
			<tr><td>	name				</td><td>		<input type='text' name='name' 			value ="<?php isset($name) ? $name : '' ?>"/>				</td></tr>
			<tr><td>	description			</td><td>		<input type='text' name='description' 	value ="<?php isset($description) ? $description : '' ?>"/>	</td></tr>
			<tr><td>	date				</td><td>		<input type='text' name='date' 			value ="<?php isset($date) ? $date : '' ?>" readonly />		</td></tr>
			<tr><td>	investigator		</td><td>		<input type='text' name='investigator' 	value ="<?php isset($investigator) ? $investigator : '' ?>"/></td></tr>
			<tr><td>	cytometer			</td><td>		<input type='text' name='cytometer' 	value ="<?php isset($cytometer) ? $cytometer : '' ?>"/>		</td></tr>
			<tr><td>	species				</td><td>		<input type='text' name='species' 		value ="<?php isset($species) ? $species : '' ?>"/>			</td></tr>
			<tr><td>	sharingpref			</td><td>		<input type='text' name='sharingpref' 	value ="<?php isset($sharingpref) ? $sharingpref : '' ?>"/>	</td></tr>
			<tr><td>	size				</td><td>		<input type='text' name='size' 			value ="<?php isset($size) ? $size : '' ?>" readonly />		</td></tr>
			<tr><td>	hash				</td><td>		<input type='text' name='hash' 			value ="<?php isset($hash) ? $hash : '' ?>" readonly />		</td></tr>
			

			<tr><td>						</td><td>		<input type='submit' value='Save' /> </td></tr>
		</table>
	</form>
	
	
	
</div>
