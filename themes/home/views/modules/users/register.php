<div class="span6">
<h2 class="page-title" id="page_title"><?php echo lang('user:register_header') ?></h2>

<p>
	<span id="active_step"><?php echo lang('user:register_step1') ?></span> -&gt;
	<span><?php echo lang('user:register_step2') ?></span>
</p>

<?php if ( ! empty($error_string)):?>
<!-- Woops... -->
<div class="error-box">
	<?php echo $error_string;?>
</div>
<?php endif;?>

<?php echo form_open('register', array('id' => 'register')) ?>
<ul>
	
	<?php if ( ! Settings::get('auto_username')): ?>
	<li>
		<label for="username"><?php echo lang('user:username') ?></label>
		<input type="text" name="username" maxlength="100" value="<?php echo $_user->username ?>" />
	</li>
	<?php endif ?>
	
	<li>
		<label for="email"><?php echo lang('global:email') ?></label>
		<input type="text" name="email" maxlength="100" value="<?php echo $_user->email ?>" />
		<?php echo form_input('d0ntf1llth1s1n', ' ', 'class="default-form" style="display:none"') ?>
	</li>
	
	<li>
		<label for="password"><?php echo lang('global:password') ?></label>
		<input type="password" name="password" maxlength="100" />
	</li>

	<?php foreach($profile_fields as $field) { if($field['required'] and $field['field_slug'] != 'display_name') { ?>
	<li>
		<label for="<?php echo $field['field_slug'] ?>"><?php echo (lang($field['field_name'])) ? lang($field['field_name']) : $field['field_name'];  ?></label>
		<div class="input"><?php echo $field['input'] ?></div>
	</li>
	<?php } } ?>

	<?php //foreach($profile_fields as $field) { if($field['required'] and $field['field_slug'] != 'display_name') { ?>
	<li>
		<label for="<?php //echo $field['field_slug'] ?>"><?php //echo (lang($field['field_name'])) ? lang($field['field_name']) : $field['field_name'];  ?></label>
		<div class="input"><?php //echo $field['input'] ?><select name="institution">
		  <option>Select Institution</option>
		</select></div>
	</li>
	<?php //} } ?>
    
    
	<li>
		<?php echo form_submit('btnSubmit', lang('user:register_btn')) ?>
	</li>
</ul>
<?php echo form_close() ?>
</div>

<div class="span6">
<h2 class="page-title" id="page_title">Already A Member</h2>
	<div>
    <form class="form-horizontal" action="{{ url:site uri='users/login' }}" method="post" accept-charset="utf-8" id="login-small">
    	      <input type="hidden" name="redirect_to" value="{{ url:current }}" />
	
    <div class="control-group">
		<label class="control-label" for="inputEmail">Email</label>
			<div class="controls">
            <input type="text" id="email" name="email" maxlength="120" placeholder="{{ helper:lang line="global:email" }}" />
			</div>
	</div>
    <div class="control-group">
    	<label class="control-label" for="inputPassword">Password</label>
			<div class="controls">
            <input type="password" id="password" name="password" maxlength="20" placeholder="{{ helper:lang line="global:password" }}" />
			</div>
    </div>
    
    <div class="control-group">
    <div class="controls">
    <input type="submit" value="{{ helper:lang line='user:login_btn' }}" name="btnLogin" class="btn" />
    <label class="checkbox">
    <input type="checkbox" id="remember-checksidebar" name="remember" value="1"  />{{ helper:lang line="user:remember" }}</label>
    <a href="{{ url:site }}users/reset_pass">Password Reset</a>
    </div>
    </div>
    </form>
      </div>
</div>
