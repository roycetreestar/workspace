<?php
//die(print_r($this->session->userdata));
$permission = $this->session->userdata['groups'][$rdata['group_id']]['permission'];

if($permission == 0)
{
	   ?>
	   
<div class='well'>
	$permission: <?=$permission?><br/>
	<table class='table'>
		
	<tr><th>resource_name:	</th><th> <?=$rdata['resource_name']?>	</th></tr>
	<tr><td>resourceid:		</td><td><?=$rdata['id']?>	</td></tr>
	<tr><td>groupid:		</td><td><?=$rdata['group_id']?>		</td></tr>
	<tr><td>resource_type:	</td><td> <?=$rdata['resource_type']?>	</td></tr>
	<tr><td>metadata:		</td><td><?=$rdata['metadata']?>		</td></tr>
	
	</table>
</div>

<?php
}
if( $permission == 1)
{
?>
<div class="well">
	$permission: <?=$permission?><br/>
	<form action="" method="post">
		resource_name:<input type="text" name="resource_name" value="<?=$rdata['resource_name']?>" /><br/>
		resourceid:<?=$rdata['id']?> <br/>
		groupid:<?=$rdata['group_id']?><br/>
		resource_type:<input type="text" name="resource_type" value="<?=$rdata['resource_type']?>" /><br/>
		metadata:<textarea name="metadata"><?=$rdata['metadata']?></textarea><br/>
		
		<input type="submit" />
		
		
	</form>
	
</div>
	
<?php	
}
else echo 'bummer!';
?>