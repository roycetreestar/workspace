<style>
	textarea
	{
		width:100%;
		//height:100px;
	}
	
	body
	{
		background-color:black;
	}
</style>
<div class="container-fluid" >
	<div class="row-fluid" >
		<div class="well span6" >
			<h3>this is backstage/views/howto/users_p.php</h3>
			<strong>Controller Location:</strong>		application/modules/membership/users.php
			<br/>
			<strong>load the users controller: </strong>		$usermodule = $this->load->module('membership/users');
			<br/>
			<strong>load the users model </strong>				$this->load->model('membership/users_m');
			<br/>
		</div>
		<div class="well span6">
			<strong>public functions:</strong>
			<ul>
				<li>get_xml($userid)</li>
				<li>get_array($userid)</li>
				<li>edit($userid)</li>
				<li>my_account($userid)</li>
			</ul>
		</div>
	</div>





	<div class="row-fluid" >
		<div class="well span2" id="leftmenu" >
			<div>
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
				<h4>partials about users:</h4>
				<a href="#session">The session array</a><br/>
				<a href="#display">display a user</a><br/>
				<a href="#edit">edit a user</a><br/>
				<a href="#register">register a user</a><br/>
				<a href="#login">The login form</a><br/>
			
			</div>
		</div>
		


		
		<div class=" span10">
			<div class="row-fluid">

	<!-- XML -->			
				<div class="well span12">
					<h3 id="xml">get user xml</h3>
					
					<table class="table table-bordered">
						<tr><td><strong>function:</strong></td><td>get_xml($userid)</td></tr>
						<tr><td><strong>parameter</strong></td><td>(int)</td><td>$userid</td></tr>
						<tr><td><strong>returns:</strong></td><td>(string)</td><td> an XML string of data for the user specified by the $userid parameter <br/> (shown here print_r() -ed  within a &lt;textarea&gt; for viewing convenience)</td></tr>
					</table>
					
					<label for="xml_text"><strong>Example Output:</strong></label>
					<textarea id="xml_text"><?=print_r($user_xml, true)?></textarea>
					<br/>
				</div>
			</div><!-- end .row-fluid -->
			<div class="row-fluid">
				
	<!-- ARRAY	-->			
				<div class="well span12">
					<h3 id="array">get_array($userid)</h3>
					<table class="table table-bordered">
						<tr><td><strong>function:</strong></td>		<td>get_xml($userid)</td></tr>
						<tr><td><strong>parameter:</strong> </td> 	<td>$userid (int) - - the entity_id for the user</td></tr>					
						<tr><td><strong>returns:</strong> </td>		<td> a php array of the given user's data <br/> (shown here print_r() -ed  within a &lt;textarea&gt; for viewing convenience)</td></tr>
					</table>
					
					<label for="array_text"><strong>Example Output:</strong></label>
					<textarea ><?=print_r($user_arr, true)?></textarea>
					
				</div>
			</div><!-- end .row-fluid -->
			<div class="row-fluid">
			
				
				
	<!-- SESSION ARRAY	-->			
				<div class="well span12">
					<h3 id="session">The session array</h3>
					<table class="table table-bordered">
						<tr>	<td><strong>function:</strong></td>		<td>	$this->load->view('membership/partials/session_array_p')		</td>	</tr>
						<tr>	<td><strong>parameter:</strong></td>	<td>	none	</td>	</tr>
						<tr>	<td><strong>returns:</strong></td>		<td>	HTML string of the current user's session array in a &lt;textarea&gt;	</td>	</tr>
						<tr><td colspan="2"> membership/views/partials/session_array_p
					<p>Upon login, a globally available session array is created which holds information about the logged-in user, their groups, and those groups' resources. This partial is intended for development use, reads only the currently logged-in user's data, and is called directly (without a controller)  </p></td></tr>
					</table>
					
					<?php $this->load->view('membership/partials/session_array_p') ?>			
				</div>
				
			</div><!-- end .row-fluid -->
			<div class="row-fluid">
				
				
	<!-- DISPLAY_USER	-->			
				<div class="well span12">
					<h3 id="display">display a user's data</h3>
					membership/views/partials/display_user_p.php
					
					<table class="table table-bordered">
						<tr><td>In the controller:</td><td>$data['display'] = $usermodule->display($userid);</td></tr>
						<tr><td>In the view:</td><td>&lt;div&gt;&lt;?=$display ?&gt;&lt;/div&gt;</td></tr>
					</table>
					
					
					<div style="border:solid 5px green;">
						<?= $display ?>
					</div>
				</div>
				
				
			</div><!-- end .row-fluid -->
			<div class="row-fluid">
				
	<!-- FORM_USER	-->			
				<div class="well span12">
					<h3 id="edit">edit a user's data</h3>
					membership/views/partials/form_user_p.php<br/>
					
					<table class="table table-bordered">
						<tr><td>In the controller:</td><td>$data['form'] = $usermodule->edit($userid);</td></tr>
						<tr><td>In the view:</td><td>&lt;div&gt;&lt;?=$form ?&gt;&lt;/div&gt;</td></tr>
						<tr><td colspan="3">This form is currently deprecated in favor of <a href="#register">the registration form</a></td></tr>
					</table>
					
					<div style="border:solid 5px green;">
						<?= $form ?>
					</div>
					<div style="border:solid 5px green;">
						<?= $new ?>
					</div>
				</div>
				
			</div><!-- end .row-fluid -->
			<div class="row-fluid">
				
				
	<!-- REGISTRATION FORM	-->			
				<div class="well span12">
					<h3 id="register">register a user</h3>
					<table class="table table-bordered">
						<tr><td>File path to partial:</td><td colspan="2">	application/modules/membership/views/partials/form_my_account_p.php</td></tr>
						<tr><td>In the controller:</td><td>$data['registration_form'] = $usermodule->my_account($userid);</td></tr>
						<tr><td>In the view:</td><td>&lt;div&gt;&lt;?=$registration_form ?&gt;&lt;/div&gt;</td></tr>
					</table>
					
					<div style="border:solid 5px green;">
						<?= $registration_form ?>
					</div>
				</div>
				
				
			</div><!-- end .row-fluid -->
			
			<div class="row-fluid">
	<!-- 	LOGIN FORM	-->
				<div class="well span12">
					<h3 id="login">Login Form</h3>
					<table class="table table-bordered">
						<tr><td>File path to partial:</td><td colspan="2">	application/modules/membership/views/partials/login_p.php</td></tr>
						<tr><td>In the controller:</td><td>$data['login_form'] = $usermodule->login_form();</td></tr>
						<tr><td>In the view:</td><td>&lt;div&gt;&lt;?=$login_form ?&gt;&lt;/div&gt;</td></tr>
					</table>
					
					<div class="span4" style="border:solid 5px green;">
						<?= $login_form ?>
					</div>
				</div>
				
			</div>
			
			
			
			
			
			
			
			
			
			
			
			
			
			
		</div>
	</div>

</div><!-- end .container -->
<!--

<table class="table table-bordered">
<tr>	<td><strong>function:</strong></td>		<td>		</td>	</tr>
<tr>	<td><strong>parameter:</strong></td>	<td>		</td>	</tr>
<tr>	<td><strong>returns:</strong></td>		<td>		</td>	</tr>
</table>

-->


