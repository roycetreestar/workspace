<div class="tab-pane active" id="account-settings">
	<div class="widget widget-2">
		<div class="widget-head">
			<h4 class="heading glyphicons edit"><i></i>Registration</h4>
		</div>
		<div class="widget-body" style="padding-bottom: 0;">
			<div class="row-fluid">
			<div class="span6">

			  <div class="control-group">
				<label class="control-label">First Name</label>
				<div class="controls">
				  <input type="text" value="<?= isset($first_name)? $first_name : '' ?>" class="span10" />
				  <span style="margin: 0;" class="btn-action single glyphicons circle_question_mark" data-toggle="tooltip" data-placement="top" data-original-title="First name is mandatory"><i></i></span> </div>
			  </div>
			  
			  <div class="control-group">
				<label class="control-label">Last Name</label>
				<div class="controls">
				  <input type="text" value="<?= isset($last_name)? $last_name : '' ?>" class="span10" />
				  <span style="margin: 0;" class="btn-action single glyphicons circle_question_mark" data-toggle="tooltip" data-placement="top" data-original-title="Last name is mandatory"><i></i></span> </div>
			  </div>
			  
			  <div class="control-group">
				<label class="control-label">Email</label>
				<div class="controls">
				  <input type="text" value="<?= isset($email)? $email : '' ?>" class="span10" />
				<span style="margin: 0;" class="btn-action single glyphicons circle_question_mark" data-toggle="tooltip" data-placement="top" data-original-title="Email is mandatory"><i></i></span> </div>
			  </div>
			  
			  <div class="control-group">
				<label class="control-label">Institution</label>
				<div class="controls"> 
<!--				  <input type="text" value="<?= isset($institution)? $institution : '' ?>" class="span10 institutions" />		-->
					<?=$institution_dd?>
				<span style="margin: 0;" class="btn-action single glyphicons circle_question_mark" data-toggle="tooltip" data-placement="top" data-original-title="An Institution is mandatory"><i></i></span> </div>
			  </div>
			  
			</div>
			<div class="span5">
<?php if(isset($first_name))
{
?>
			<div class="control-group">
			  <label for="inputPasswordOld">Old password</label>
			  <div class="controls">
				<input type="password" placeholder="Leave empty for no change" value="" class="span10" id="inputPasswordOld">
				<span data-original-title="Leave empty if you don't wish to change the password" data-placement="top" data-toggle="tooltip" class="btn-action single glyphicons circle_question_mark" style="margin: 0;"><i></i></span></div>
			</div>

			<div class="control-group">
			  <label for="inputPasswordNew">New password</label>
			<div class="controls">
			  <input type="password" placeholder="Leave empty for no change" value="" class="span10" id="inputPasswordNew">
			  <span data-original-title="Leave empty if you don't wish to change the password" data-placement="top" data-toggle="tooltip" class="btn-action single glyphicons circle_question_mark" style="margin: 0;"><i></i></span></div>
			</div>

			<div class="control-group">
				<label for="inputPasswordNew">New password</label>
				<div class="controls">
					<input type="password" placeholder="Leave empty for no change" value="" class="span10" id="inputPasswordNew">
					<span data-original-title="Leave empty if you don't wish to change the password" data-placement="top" data-toggle="tooltip" class="btn-action single glyphicons circle_question_mark" style="margin: 0;">
						<i></i>
					</span>
				</div>
			</div>
<?php
}
else
{
?>			  
			<div class="control-group">
				<label for="inputPasswordNew">Password</label>
				<div class="controls">
					<input type="password" placeholder="Leave empty for no change" value="" class="span10" id="inputPasswordNew" name="password">
					<span data-original-title="Leave empty if you don't wish to change the password" data-placement="top" data-toggle="tooltip" class="btn-action single glyphicons circle_question_mark" style="margin: 0;">
						<i></i>
					</span>
				</div>
			</div>

<?php
}
?>
			</div>
			</div>
			<div style="margin: 0;" class="form-actions">
			<button class="btn btn-icon btn-primary glyphicons circle_ok" type="submit"><i></i>Save changes</button>
			<button class="btn btn-icon btn-default glyphicons circle_remove" type="button"><i></i>Cancel</button>
			</div>
		</div>
	</div>
</div>
