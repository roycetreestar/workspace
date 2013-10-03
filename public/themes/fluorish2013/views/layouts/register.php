<!doctype html>
<!--[if lt IE 7]> <html class="no-js ie6 oldie" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js ie7 oldie" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js ie8 oldie" lang="en"> <![endif]-->
<!--[if gt IE 8]> <html class="no-js" lang="en"> 		   <![endif]-->

<head>
<meta charset="utf-8">

<!-- You can use .htaccess and remove these lines to avoid edge case issues. -->
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<title></title>
<meta name="description" content="">
<meta name="keywords" content="">

<!-- Mobile viewport optimized -->
<meta name="viewport" content="width=device-width,initial-scale=1">

<!-- Set a base location for assets -->
<base href="<?php echo getTheme(); ?>"/>
<!-- End base -->

<!-- CSS. No need to specify the media attribute unless specifically targeting a media type, leaving blank implies media=all-->
<link type="text/css" rel="stylesheet" href="<?php echo getTheme(); ?>css/bootstrap.css">
<link type="text/css" rel="stylesheet" href="<?php echo getTheme(); ?>css/bootstrap-responsive.css">
<link type="text/css" rel="stylesheet" href="<?php echo getTheme(); ?>css/flexslider.css">
<link type="text/css" rel="stylesheet" href="<?php echo getTheme(); ?>css/jquery.fancybox-1.3.4.css">
<link type="text/css" rel="stylesheet" href="<?php echo getTheme(); ?>css/style.css">
<!-- End CSS-->

<!-- Googlelicious -->

<link type="text/css" rel="stylesheet" href="http://fonts.googleapis.com/css?family=Syncopate:400,700">
<link type="text/css" rel="stylesheet" href="http://fonts.googleapis.com/css?family=Michroma">
<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,400italic,700,700italic" rel="stylesheet">

<!-- Add some theme option variables for styling -->
<style type="text/css"></style>
</head>
<body>
<!-- Header -->
<header id="header" class="navbar navbar-fixed-top navbar-inverse">
<div class="navbar-inner">
<div class="container">

<!-- Nav Toggle on Smartphone --> 
<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </a> 
<!-- Nav Toggle on Smartphone END --> 

<!-- Logo --> 
<a class="brand" href="{{ url:base }}"></a> 
<!-- Logo END --> 

<!-- Nav -->
<nav class="nav-collapse collapse">
<ul class="nav pull-right">
<li><a href="<?=site_url('fluorish');?>#about"><i class="icon-tasks icon-white"></i>About Fluorish</a></li>
<li class="divider-vertical"></li>
<li><a href="<?=site_url('fluorish');?>#reagentsearch"><i class="icon-search icon-white"></i>Search Reagents</a></li>
<li class="divider-vertical"></li>
<li><a href="<?=site_url('fluorish');?>#download"><i class="icon-download icon-white"></i>Panel Builder<span class="badge ">Download</span></a></li>
<li class="divider-vertical"></li>
<li><a href="<?=site_url('fluorish');?>#contact"><i class="icon-comment icon-white"></i>Contact</a></li>
<li class="divider-vertical"></li>
<li><a href="<?=site_url('fluorish/register');?>"><span class="register btn"> Join Fluorish</span></a></li>
<li class="divider-vertical"></li>
<li class="dropdown"> <a class="dropdown-toggle" href="#" data-toggle="dropdown">Sign In <strong class="caret"></strong></a>
  <div class="dropdown-menu" style="padding: 15px; padding-bottom: 0px;"> <?php echo Modules::run( 'membership/membership/login' ); ?> 
    
    <!-- Login form here 
    <form action="{{ url:site uri='users/login' }}" class="navbar-search pull-right" method="post" accept-charset="utf-8" id="login-small">
      <input type="hidden" name="redirect_to" value="{{ url:current }}" />
      <label>Email Address</label>
      <input type="text" id="email" name="email" maxlength="120" placeholder="{{ helper:lang line="global:email" }}" />
      <label>Password</label>
      <input type="password" id="password" name="password" maxlength="20" placeholder="{{ helper:lang line="global:password" }}" />
      <input type="submit" value="{{ helper:lang line='user:login_btn' }}" name="btnLogin" class="btn" id="login_nav" />
      <div id="login">
        <p>
          <input type="checkbox" id="remember-checksidebar" name="remember" value="1"  />
        <hr />
        <a href="#">Reset Password</a> | <a href="#">Join Fluorish</a>
        </p>
      </div>
    </form>--> 
  </div>
</li>
</nav>
</div>
<!-- End user meta -->
</div>
</div>
</header>
<!-- Header END --> 
<!-- Register and Login -->
<div class="page-container row-fluid">
  <div class="page-content">
    <div class="container page">
      <div class="span6">
        <h2 id="page_title" class="page-title">Registration</h2>
        <?php echo Modules::run( 'membership/users/my_account' ); ?>
      </div>
      <div class="span6">
        <h2 id="page_title" class="page-title">Already A Member</h2>
        <?php echo Modules::run( 'membership/membership/login' ); ?>
      </div>
    </div>
  </div>
</div>
<!-- Register and Login END --> 
<!-- Contact -->
<div class="large" id="contact">
  <div class="container">
    <div class="row">
      <div class="span4">
        <address>
        <div id="f_logo"><img src="<?php echo getTheme(); ?>img/logo.png"></div>
        <br>
        340 A Street, Suite 101<br>
        Ashland, OR 97520<br>
        <abbr title="Phone">P:</abbr> 800-366-6045 (US and Canada)<br />
        <abbr title="Phone">Int:</abbr> 541-201-0022
        </address>
      </div>
      <div class="span4" id="footer_support">
        <h3>Support</h3>
        <ul>
          <li><a href="mailto:support@fluorish.com">Support@Fluorish.com</a></li>
          <li><a href="{{ url:site }}contact">Leave Feedback or Comments</a></li>
          <li><a href="{{ url:site }}videos">Videos</a></li>
          <li><a href="{{ url:site }}faq">FAQ</a></li>
        </ul>
      </div>
      <div class="span4" id="footer_partner">
        <h3>Partner center</h3>
        <ul>
          <li><a href="{{ url:site }}partner" class="btn">Become a partner</a></li>
          <li><a href="{{ url:site }}partner/admin/login" class="btn">Partner Dashboard Login</a></li>
        </ul>
      </div>
    </div>
  </div>
</div>
<!-- Contact END --> 
<!-- Footer -->
<footer id="footer">
  <div class="container">
    <div class="row">
      <div class="span2" id="footer_terms"> <a href="{{ url:site }}privacy">Privacy</a> | <a href="{{ url:site }}terms">Terms</a> </div>
      <div class="span9">
        <p> &copy; 2013 Fluorish. Design by <a href="http://fluorish.com" rel="nofollow">Fluorish, LLC</a>. All Rights Reserved.</p>
      </div>
    </div>
  </div>
</footer>
<!-- Footer END --> 

<!-- JavaScript
================================================== --> 
<script src="<?php echo getTheme(); ?>js/jquery-1.8.3.min.js"></script> 
<script src="<?php echo getTheme(); ?>js/bootstrap.min.js"></script> 
<script src="<?php echo getTheme(); ?>js/jquery.flexslider-min.js"></script> 
<script src="<?php echo getTheme(); ?>js/jquery.fitvids.js"></script> 
<script src="<?php echo getTheme(); ?>js/jquery.smooth-scroll.min.js"></script> 
<script src="<?php echo getTheme(); ?>js/jquery.fancybox-1.3.4.pack.js"></script> 
<script>
$(document).ready(function() {
	
	// Hero slider settings //
	$('#hero-slider').flexslider({
		// You should better not change these settings //
		animation: "slide",
		controlNav: false,
		prevText: "&lsaquo;",
		nextText: "&rsaquo;",
		// You can change these settings //
		slideshow: true,		//Boolean: Animate slider automatically
		slideshowSpeed: 7000,	//Integer: Set the speed of the slideshow cycling, in milliseconds
		animationSpeed: 600		//Integer: Set the speed of animations, in milliseconds
	});
	
	// General slider settings //
	$('#myCarousel').flexslider({
		// You should better not change these settings //
		animation: "slide",
		controlNav: false,
		prevText: "&lsaquo;",
		nextText: "&rsaquo;",
		// You can change these settings //
		slideshow: true,		//Boolean: Animate slider automatically
		slideshowSpeed: 7000,	//Integer: Set the speed of the slideshow cycling, in milliseconds
		animationSpeed: 600		//Integer: Set the speed of animations, in milliseconds
	});
	
	// FitVid
    $(".container").fitVids();
	
	// smoothScroll
	$('a').smoothScroll();
	
	//Fancybox
	//$("a.fancybox").fancybox();
	
});
</script>
</body>
</html>