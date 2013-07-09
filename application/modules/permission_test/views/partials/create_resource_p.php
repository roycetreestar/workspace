<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div class="well">
	<h1>Create_resource_p</h1>
	<div id="create_resource_result"></div>
	<form action="permission_test/resources/create_resource" method="post" id="create_resource_form" >
		
		<table class="table ">			
			<tr><td>resourceid:		</td><td>	<!--<input type="text" name="resourceid" />-->		</td></tr>
			<tr><td>groupid:		</td><td>	<input type="text" name="groupid" />		</td></tr>
<!--			<tr><td>permission:		</td><td>	<input type="text" name="permission" />		</td></tr>-->
			<tr><td>resource_name:	</td><td>	<input type="text" name="resource_name" />		</td></tr>
			<tr><td>resource_type:	</td><td>	<input type="text" name="resource_type" />	</td></tr>
			<tr><td>metadata:		</td><td>	<textarea  name="metadata" ></textarea>		</td></tr>

			<tr><td>				</td><td>	<input type="submit" />					</td></td>
		</table>
		
	</form>
	
</div>
