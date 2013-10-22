<div class="tab-pane active" id="account-settings">
	<div class="widget widget-2">
		<div class="widget-head">
			<h4 class="heading glyphicons edit"><i></i>Registration</h4>
		</div>
<div id="form_my_account_result"></div>
		<div class="widget-body" style="padding-bottom: 0;">
			<div class="row-fluid">
				<form id="my_account_form" action="<?=base_url()?>membership/users/save" method="post" >

<input type="hidden" value="<?=$entity_id?>" name="entity_id" />
					
								<div class="span6">

									<div class="control-group">
										<label class="control-label">First Name</label>
										<div class="controls">
											<input type="text" value="<?= isset($first_name)? $first_name : '' ?>" name="first_name" class="span10" />
											<span style="margin: 0;" class="btn-action single glyphicons circle_question_mark" data-toggle="tooltip" data-placement="top" data-original-title="First name is mandatory"><i></i></span>
										</div>
									</div>
								  
									<div class="control-group">
										<label class="control-label">Last Name</label>
										<div class="controls">
											<input type="text" value="<?= isset($last_name)? $last_name : '' ?>" name="last_name" class="span10" />
											<span style="margin: 0;" class="btn-action single glyphicons circle_question_mark" data-toggle="tooltip" data-placement="top" data-original-title="Last name is mandatory"><i></i></span> 
										</div>
									</div>
								  
									<div class="control-group">
										<label class="control-label">Email</label>
										<div class="controls">
											<input type="text" value="<?= isset($email)? $email : '' ?>" name="email" class="span10" />
											<span style="margin: 0;" class="btn-action single glyphicons circle_question_mark" data-toggle="tooltip" data-placement="top" data-original-title="Email is mandatory"><i></i></span>
										</div>
									</div>
								  
									<div class="control-group">
										<label class="control-label">Institution</label>
										<div class="controls"> 
										<!--				  <input type="text" value="<?= isset($institution)? $institution : '' ?>" class="span10 institutions" />		-->
											<?=$institution_dd?>
											<span style="margin: 0;" class="btn-action single glyphicons circle_question_mark" data-toggle="tooltip" data-placement="top" data-original-title="An Institution is mandatory"><i></i></span> </div>
									</div>
								  
								</div><!-- end span6	-->
								<div class="span5">
				<?php if(isset($first_name))
				{
				?>
									<div class="control-group">
										<label for="inputPasswordOld">Old password</label>
										<div class="controls">
											<input type="password" placeholder="Leave empty for no change" value="" class="span10" id="inputPasswordOld" name="old_password" >
											<span data-original-title="Leave empty if you don't wish to change the password" data-placement="top" data-toggle="tooltip" class="btn-action single glyphicons circle_question_mark" style="margin: 0;"><i></i></span>
										</div>
									</div>

									<div class="control-group">
										<label for="inputPasswordNew">New password</label>
										<div class="controls">
											<input type="password" placeholder="Leave empty for no change" value="" class="span10" id="inputPasswordNew" name="password1" >
											<span data-original-title="Leave empty if you don't wish to change the password" data-placement="top" data-toggle="tooltip" class="btn-action single glyphicons circle_question_mark" style="margin: 0;"><i></i></span>
										</div>
									</div>

									<div class="control-group">
										<label for="inputPasswordNew">New password</label>
										<div class="controls">
											<input type="password" placeholder="Leave empty for no change" value="" class="span10" id="inputPasswordNew" name="password2" >
											<span data-original-title="Leave empty if you don't wish to change the password" data-placement="top" data-toggle="tooltip" class="btn-action single glyphicons circle_question_mark" style="margin: 0;"><i></i></span>
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
											<span data-original-title="Leave empty if you don't wish to change the password" data-placement="top" data-toggle="tooltip" class="btn-action single glyphicons circle_question_mark" style="margin: 0;"><i></i></span>
										</div>
									</div>

				<?php
				}
				?>
								</div><!-- end span5 -->
							</div><!-- end row -->
							<div style="margin: 0;" class="form-actions">
								<button class="btn btn-icon btn-primary glyphicons circle_ok" type="submit"><i></i>Save changes</button>
								<button class="btn btn-icon btn-default glyphicons circle_remove" type="button"><i></i>Cancel</button>
							</div>
			</form>
		</div>
	</div>
</div>




<script type="text/javascript" >


	$('#my_account_form').submit( function(event)
	{
//alert('form submitted and caught by jquery');
		event.preventDefault();				
		var values = $(this).serialize();	
		
/*
		$('#form_my_account_result').html($('#load_spinner').html());
*/
		
//alert('submitted');
		$.ajax(
		{
			url: '<?=base_url()?>membership/users/save',
			type: 'post',
			data: values,
			success:function(msg)
			{
//alert(msg);				
		$('#form_my_account_result').html(msg).css('color', 'blueviolet');
/*
		$('#form_my_account_result').html('Update Successful').css('color', 'green');
*/
	
			},
			error: function (msg) 
			{ 
//alert(msg.responseText);
				var the_error = msg.responseText;
				var start = the_error.indexOf("<div");
				var end = the_error.indexOf("</div>") + 7;
				var error_div = the_error.substring(start, end);

				$('#form_my_account_result').html(error_div).css('color', 'red');
			}
		});
		
		

	});
	

</script>




