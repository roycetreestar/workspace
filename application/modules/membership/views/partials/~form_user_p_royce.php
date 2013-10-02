<?php
//the default action="" value goes to membership/users/create_user
//to override this, for example, with a function in the GUI controller,
// pass in $data['form_action']='controllerName/functionName';
	if(!isset($form_action))
		$form_action = 'membership/users/save';
?>
<form action="" method="post" id="edit_user_form" >	
	<div class="row-fluid">
		<div class="span6">
			<div class="control-group">
				<label class="control-label">first_name</label>
				<div class="controls">
					<input type="text" value="<?=isset($first_name)? $first_name : '' ?>" class="span10" />
					<span style="margin: 0;" class="btn-action single glyphicons circle_question_mark" data-toggle="tooltip" data-placement="top" data-original-title="First name is mandatory"><i></i></span> 
				</div>
			</div>
			<div class="control-group">
				<label class="control-label">last_name</label>
				<div class="controls">
					<input type="text" value="<?=isset($last_name)? $last_name : '' ?>" class="span10" />
					<span style="margin: 0;" class="btn-action single glyphicons circle_question_mark" data-toggle="tooltip" data-placement="top" data-original-title="Last name is mandatory"><i></i></span> 
				</div>
			</div>
			<div class="control-group">
				<label class="control-label">Email</label>
				<div class="controls">
					<input type="text" value="<?=isset($email)? $email : '' ?>" class="span10" />
				</div>
			</div>
			<div class="control-group">
				<label class="control-label">Institution</label>
				<div class="controls">
					<input type="hidden" id="institutions"  value="<?=isset($institution)? $institution : '' ?>" />
				</div>
			</div>
		</div>

		<div class="span5">
			<label for="inputUsername">Username</label>
			<input type="text"  value="john.doe2012" class="span10" id="inputUsername">
			<!--<span data-original-title="Username can't be changed" data-placement="top" data-toggle="tooltip" class="btn-action single glyphicons circle_question_mark" style="margin: 0;"><i></i></span>-->
			<div class="separator">
			</div>
			<label for="inputPasswordOld">Old password</label>
			<input type="password" placeholder="Leave empty for no change" value="" class="span10" id="inputPasswordOld">
			<span data-original-title="Leave empty if you don't wish to change the password" data-placement="top" data-toggle="tooltip" class="btn-action single glyphicons circle_question_mark" style="margin: 0;"><i></i></span>
			<div class="separator"></div>
			<label for="inputPasswordNew">New password</label>
			<input type="password" placeholder="Leave empty for no change" value="" class="span12" id="inputPasswordNew">
			<div class="separator"></div>
			<label for="inputPasswordNew2">Repeat new password</label>
			<input type="password" placeholder="Leave empty for no change" value="" class="span12" id="inputPasswordNew2">
			<div class="separator"></div>
		</div>
	</div>


	<div style="margin: 0;" class="form-actions">
		<button class="btn btn-icon btn-primary glyphicons circle_ok" type="submit"><i></i>Save changes</button>
		<button class="btn btn-icon btn-default glyphicons circle_remove" type="button"><i></i>Cancel</button>
	</div>
</form>
