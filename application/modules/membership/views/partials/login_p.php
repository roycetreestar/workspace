<?php

if(isset($message))
	$message_value = $message;
else
	$message_value = '';
?>

<!-- -->
<div id="login_message"> <?= $message_value ?> </div>
  <form id="login-small" accept-charset="utf-8" method="post" class="navbar-search" action="<?= base_url('membership/users/do_login') ?>">
    <input type="hidden" value="<?php echo base_url()?>" name="redirect_to">
    <label>Email Address</label>
    <input type="text" placeholder="E-mail" maxlength="120" name="username" id="username">
    <label>Password</label>
    <input type="password" placeholder="Password" maxlength="20" name="password" id="password">
    <input type="submit" id="login_nav" class="btn" name="btnLogin" value="Login">
    <div id="login">
      <p>
        <input type="checkbox" value="login" name="remember" id="remember-checksidebar">
        Remember Me </p>
      <hr>
      <a href="<?php echo base_url().'fluorish/reset_pass'?>">Reset Password</a> | <a href="<?php echo base_url().'fluorish/register'?>">Join Fluorish</a>
      <p></p>
    </div>
  </form>
<!-- -->