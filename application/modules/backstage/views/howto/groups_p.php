<style>
	textarea
	{
		width:100%;
		height:100px;
	}
	
	body
	{
		background-color:black;
	}
</style>
<div class="row-fluid" >
	<div class="well span6" >
		<h3>this is backstage/views/howto/groups_p.php</h3>
		<strong>Controller Location:</strong>		application/modules/membership/groups.php
		<br/>
		<strong>load the groups controller: </strong>		$usermodule = $this->load->module('membership/groups');
		<br/>
		<strong>load the groups model </strong>				$this->load->model('membership/groups_m');
		<br/>
	</div>
	
	
	<div class="well span6">
		<strong>public functions:</strong>
		<ul>
			<li>get_xml($userid)</li>
			<li>get_array($userid)</li>
			<li>edit($userid)</li>
		</ul>
	</div>
</div>




<div class="row-fluid" >
	<div class="well span2" id="leftmenu" >
		<?=$this->load->view('menu_p');?>
<!--		<div>
			<h4>howto pages</h4>
			<a href="<?=base_url()?>backstage/howto/addresses">addresses</a><br/>
			<a href="<?=base_url()?>backstage/howto/cytometers">cytometers</a><br/>
			<a href="<?=base_url()?>backstage/howto/groups">groups</a><br/>
			<a href="<?=base_url()?>backstage/howto/inventory">inventory</a><br/>
			<a href="<?=base_url()?>backstage/howto/panels">panels</a><br/>
			<a href="<?=base_url()?>backstage/howto/users">users</a><br/>
		</div>
		<hr/>
		<div>
			<h4>data about users</h4>
			<a href="#xml">get user xml</a><br/>
			<a href="#array">get user array</a><br/>
			<br/>
			<h4>partials about groups:</h4>
			<a href="#grp_avail">available groups</a><br/>
			<a href="#edit">edit a group</a><br/>
			<a href="#display">display a group</a><br/>
			<a href="#register">join a group</a><br/>
			<a href="#managed">groups managed</a><br/>
			<a href="#joined">groups joined</a><br/>
			<a href="#pending">pending members</a><br/>
			<a href="#current">current members</a><br/>
		
		</div>
-->	</div>
	
	
	
	
	
	
	<div class=" span10">
		<div class="row-fluid">

<!-- XML -->			
			<div class="well span11">
				<h3 id="xml">get group xml</h3>
				
				<table class="table table-bordered">
					<tr><td><strong>function:</strong></td><td>get_xml($groupid)</td></tr>
					<tr><td><strong>parameter</strong></td><td>(int)</td><td>$groupid</td></tr>
					<tr><td><strong>returns:</strong></td><td>(string)</td><td> an XML string of data for the group specified by the $groupid parameter <br/> (shown here print_r() -ed  within a &lt;textarea&gt; for viewing convenience)</td></tr>
				</table>
				
				<label for="xml_text"><strong>Example Output:</strong></label>
				<div class="span9 offset1">
					<textarea id="xml_text"><?=print_r($group_xml, true)?></textarea>
				</div>
			</div>
		
		</div>	
		<div class="row-fluid">
			
<!-- ARRAY	-->			
			<div class="well span11">
				<h3 id="array">get_array($groupid)</h3>
				<table class="table table-bordered">
					<tr><td><strong>function:</strong></td>		<td>get_xml($groupid)</td></tr>
					<tr><td><strong>parameter:</strong> </td> 	<td>(int) $groupid - - the entity_id for the group</td></tr>					
					<tr><td><strong>returns:</strong> </td>		<td> a php array of the given group's data <br/> (shown here print_r() -ed  within a &lt;textarea&gt; for viewing convenience)</td></tr>
				</table>
				
				<label for="array_text"><strong>Example Output:</strong></label>
				<div class="span9 offset1" id="array_text">
					<textarea ><?=print_r($group_arr, true)?></textarea>
				</div>
			</div>
			
			
		</div>
		<div class="row-fluid">
			
			
			
<!-- AVAILABLE GROUPS	-->			
			<div class="well span11" id="grp_avail">
				<h3 id="form">available_groups()</h3>
				
				<table class="table table-bordered">
					<tr><td><strong>function:</strong></td>		<td>available_groups()</td></tr>
					<tr><td><strong>parameter:</strong> </td> 	<td>none</td></tr>					
					<tr><td><strong>returns:</strong> </td>		<td> (php array) of groups the current user has not joined</td></tr>
					<tr><td colspan="2">Searches the logged-in user's <a href="<?=base_url()?>/backstage/howto/users#session">session array</a> for their joined_groups and returns an array of groups that are not in the session array. Available cores or available labs can be specified by looping through this array in your controller class and peeling out the appropriate group_type  </td></tr>
				</table>
				
				<div class="span9 offset1">
					<textarea><?=print_r($available, true)?></textarea>
				
				</div>
			
			</div>
			
			
		</div>
		<div class="row-fluid">
			
			
<!-- EDIT/CREATE FORM	-->
			<div class="well span11" id="edit">
				<h3 id="form">edit()</h3>
			
				<table class="table table-bordered">
					<tr><td><strong>function:</strong></td>		<td>edit($groupid)</td></tr>
					<tr><td><strong>parameter:</strong> </td> 	<td>(int) $groupid - - the entity_id for the group</td></tr>					
					<tr><td><strong>returns:</strong> </td>		<td> (string) an HTML form</td></tr>
					<tr><td colspan="2">The one parameter ($groupid) is optional. If present, the function populates the form with that group's data, ready for editing. If missing, the form is blank, ready for creation of a new group</td></tr>
				</table>
				
				<label for="group_form_container"><strong>Example Output:</strong></label>
				<div class="row-fluid" id="group_form_container">
					<div class="span6" >
						<h4>with $groupid parameter:</h4>
						<?=$edit?>				
					</div>
					<div class="span6" >
						<h4>without $groupid parameter:</h4>
						<?=$create?>
					</div>
				</div>
			</div>
	
		
		</div>
		<div class="row-fluid">
			
			
<!--	DISPLAY	-->	
			<div class="well span11" id="display">
				<h3 id="form">display()</h3>
				
				<table class="table table-bordered">
					<tr><td><strong>function:</strong></td>		<td>display($groupid)</td></tr>
					<tr><td><strong>parameter:</strong> </td> 	<td>(int) $groupid - - the entity_id for the group</td></tr>					
					<tr><td><strong>returns:</strong> </td>		<td> (string) an HTML form</td></tr>
					<tr><td colspan="2">The one parameter ($groupid) is optional. If present, the function populates the form with that group's data, ready for editing. If missing, the form is blank, ready for creation of a new group</td></tr>
				</table>
				
				<div class="span9 offset1">
					<?=$display?>
				
				</div>
			
			</div>
			
			

		</div>
		
		
<!--	groups_managed	-->	
		<div class="row-fluid">
			<div class="well span11" id="managed">
				<h3 id="form">groups_managed()</h3>
				
				<table class="table table-bordered">
					<tr><td><strong>function:</strong></td>		<td>groups_managed($group_type)</td></tr>
					<tr><td><strong>parameter:</strong> </td> 	<td>(int) or (string) $group_type - - the group_type for the group </td></tr>					
					<tr><td><strong>returns:</strong> </td>		<td> (string) an HTML table</td></tr>
					<tr><td colspan="2">	To get the proper group_type managed, pass in either the numerical value (1='lab', 2='core', 3='personal') or the string value of the group_type desired. This function also has two alias functions (labs_managed() and cores_managed()), which call this function with the proper string parameter.	</td></tr>
				</table>
				
				<div class="row-fluid">
					labs managed<br/>
					<div class="span9 offset1" style="border:solid green 5px;">					
						<?=$labs_mgd ?><br/>
					</div>
				</div>
				<br/>
				<div class="row-fluid">
					cores managed<br/>
					<div class="span9 offset1" style="border:solid green 5px;">	
						<?=$cores_mgd ?>
					</div>				
				</div>			
			</div>
		</div>
		
		
		
		
<!--	groups_joined	-->	
		<div class="row-fluid">
			<div class="well span11" id="joined">
				<h3 id="form">groups_joined()</h3>
				
				<table class="table table-bordered">
					<tr><td><strong>function:</strong></td>		<td>groups_joined($group_type)</td></tr>
					<tr><td><strong>parameter:</strong> </td> 	<td>(int) or (string) $group_type - - the group_type for the group</td></tr>					
					<tr><td><strong>returns:</strong> </td>		<td> (string) an HTML table</td></tr>
					<tr><td colspan="2">	To get the proper group_type joined, pass in either the numerical value (1='lab', 2='core', 3='personal') or the string value of the group_type desired. This function also has two alias functions (labs_joined() and cores_joined()), which call this function with the proper string parameter.	</td></tr>
				</table>
				
				<div class="row-fluid">
					labs joined<br/>
					<div class="span9 offset1" style="border:solid green 5px;">					
						<?=$labs_joined ?><br/>
					</div>
				</div>
				<br/>
				<div class="row-fluid">
					cores joined<br/>
					<div class="span9 offset1" style="border:solid green 5px;">	
						<?=$cores_joined ?>
					</div>				
				</div>			
			</div>
		</div>
		
		
		
		
<!-- pending_members	-->

		<div class="row-fluid">
			<div class="well span11" id="pending">
				<h3 id="form">pending_members()</h3>
				<table class="table table-bordered">
					<tr><td><strong>function:</strong></td>		<td>pending_members($group_id)</td></tr>
					<tr><td><strong>parameter:</strong> </td> 	<td>(int) $group_id - - the group_id for the group whose pending members will populate the partial</td></tr>					
					<tr><td><strong>returns:</strong> </td>		<td> (string) an HTML partial</td></tr>
					<tr><td colspan="2">	Users who join a private group (where the 'access' field in the groups table holds 0) must be manually accepted by the group's manager(s) before gaining access to that group's resources. Until that time, the user will appear in this partial 	</td></tr>
				</table>
				
				<div class="row-fluid">
					<div class="span9 offset1" style="border:solid green 5px;">					
						<?=$pending_members_div ?><br/>
					</div>
				</div>
			
			
			
			</div>
		
		
		</div>
		
		
		
<!-- current_members	-->

		<div class="row-fluid">
			<div class="well span11" id="current">
				<h3 id="form">current_members()</h3>
				<table class="table table-bordered">
					<tr><td><strong>function:</strong></td>		<td>current_members($group_id)</td></tr>
					<tr><td><strong>parameter:</strong> </td> 	<td>(int) $group_id - - the group_id for the group whose members will populate the partial</td></tr>					
					<tr><td><strong>returns:</strong> </td>		<td> (string) an HTML partial</td></tr>
					<tr><td colspan="2">	This partial lists all members of a group who are not its manager(s) and are not still pending	</td></tr>
				</table>
				
				<div class="row-fluid">
					<div class="span9 offset1" style="border:solid green 5px;">					
						<?=$current_members?><br/>
					</div>
				</div>
			
			
			
			</div>
		
		
		</div>
		
		
		
		
		
<!-- group_info	-->

		<div class="row-fluid">
			<div class="well span11" id="current">
				<h3 id="form">group_info()</h3>
				<table class="table table-bordered">
					<tr><td><strong>function:</strong></td>		<td>group_info($group_id)</td></tr>
					<tr><td><strong>parameter:</strong> </td> 	<td>(int) $group_id - - the group_id whose data will populate the partial</td></tr>					
					<tr><td><strong>returns:</strong> </td>		<td> (string) an HTML partial</td></tr>
					<tr><td colspan="2">		</td></tr>
				</table>
				
				<div class="row-fluid">
					<div class="span9 offset1" style="border:solid green 5px;">					
						<?=$group_info?><br/>
					</div>
				</div>
			
			
			
			</div>
		
		
		</div>
</div>

