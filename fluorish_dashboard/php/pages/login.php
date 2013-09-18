<div id="login" class="center">
	<form class="form-signin" method="post" action="<?php echo getURL(array('index')); ?>">
		<div class="widget widget-4">
			<div class="widget-head">
				<h4 class="heading">Login to Fluorish</h4>
			</div>
		</div>
		<h2 class="glyphicons unlock form-signin-heading"><i></i>Please sign in</h2>
		<div class="uniformjs">
			<input type="text" class="input-block-level" placeholder="Email address"> 
			<input type="password" class="input-block-level" placeholder="Password"> 
			<label class="checkbox"><input type="checkbox" value="remember-me">Remember me</label>
		</div>
		<button class="btn btn-large" type="submit">Sign in</button>
        <button class="btn btn-large" type="submit">Register</button>
	</form>
</div>