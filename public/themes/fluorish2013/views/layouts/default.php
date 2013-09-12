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
<li><a href="#about"><i class="icon-tasks icon-white"></i>About Fluorish</a></li>
<li class="divider-vertical"></li>
<li><a href="#reagentsearch"><i class="icon-search icon-white"></i>Search Reagents</a></li>
<li class="divider-vertical"></li>
<li><a href="#download"><i class="icon-download icon-white"></i>Panel Builder<span class="badge ">Download</span></a></li>
<li class="divider-vertical"></li>
<li><a href="#contact"><i class="icon-comment icon-white"></i>Contact</a></li>
<li class="divider-vertical"></li>
<li><a href="register"><span class="register btn"> Join Fluorish</span></a></li>
<li class="divider-vertical"></li>
<li class="dropdown"> <a class="dropdown-toggle" href="#" data-toggle="dropdown">Sign In <strong class="caret"></strong></a>
  <div class="dropdown-menu" style="padding: 15px; padding-bottom: 0px;"> 
    <!-- Login form here -->
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
    </form>
  </div>
</li>
</nav>
</div>
<!-- End user meta -->
</div>
</div>
</header>
<!-- Header END --> 
<!-- Hero -->
<div id="hero"> 
  
  <!-- Hero slider -->
  <div id="hero-slider" class="flexslider">
    <ul class="slides">
      
      <!-- Slider 1 -->
      <li id="slider-item-1">
        <div class="container">
          <div class="row">
            <div class="span6 topmargin5">
              <h1>Fluorish.com</h1>
              <p class="lead">Fluorish is an online community for scientists that primarily focuses on providing tools for the flow cytometry workflow. Scroll down to learn more of what Fluorish is and where we are heading! Register and start using all of Fluorish's FREE tools today.</p>
              <p class="action_button"><a href="register" class="register btn btn-large">Join Fluorish</a></p>
            </div>
            <div class="span6"><img src="<?php echo getTheme(); ?>img/slides/slider_index_logo.png" alt=""/></div>
          </div>
        </div>
      </li>
      <!-- Slider item 1 END --> 
      
      <!-- Slider 2 -->
      <li id="slider-item-2">
        <div class="container">
          <div class="row">
            <div class="span6 topmargin5">
              <h1>Panel Builder</h1>
              <p class="lead">Expand existing flow cytometry antibody panels or build new ones from scratch. With this free application, locating and matching fluorophore conjugates to your specific instrument has never been easier!</p>
              <p class="action_button" ><a href="#" class="btn btn-large">Panel Builder</a></p>
            </div>
            <div class="span6"><img src="<?php echo getTheme(); ?>img/slides/slider_index_panel.png" alt=""/></div>
          </div>
        </div>
      </li>
      <!-- Slider item 2 END --> 
      
      <!-- Slider 3 -->
      <li id="slider-item-3">
        <div class="container">
          <div class="row">
            <div class="span6 topmargin5">
              <h1>Network</h1>
              <p class="lead">Use Fluorish to network to your core facility and to your lab members. Creating Fluorish Cores and Labs will allow you to access the current functionality and be the first to utilize an ever expanding list of features. Use Fluorish Cores to manage instruments and member lists. Use Fluoirsh Labs to manage inventory and orders (coming soon).</p>
              <p class="action_button"><a href="#" class="btn btn-large">Join Now</a></p>
            </div>
            <div class="span6"><img src="<?php echo getTheme(); ?>img/slides/slider_index_blank.png" alt=""/></div>
          </div>
        </div>
      </li>
      <!-- Slider item 3 END --> 
      
      <!-- Slider 4 -->
      <li id="slider-item-4">
        <div class="container">
          <div class="row">
            <div class="span6 topmargin5">
              <h1>Marketplace</h1>
              <p class="lead">Fluorish has partnered with over 10 major antibody suppliers to offer their databases through manual searching and in the Panel Builder. We continually are adding more partners. Soon, you can also order through all our partners by sending one order to Fluorish. We promise to revolutionize the ordering process.</p>
              <p class="action_button"><a href="#" class="btn btn-large">Search</a></p>
            </div>
            <div class="span6"><img src="<?php echo getTheme(); ?>img/slides/slider_index_vendors.png" alt=""/></div>
          </div>
        </div>
      </li>
      <!-- Slider item 4 END --> 
      
      <!-- Slider 5 -->
      <li id="slider-item-5">
        <div class="container">
          <div class="row">
            <div class="span6 topmargin5">
              <h1>Panel Share</h1>
              <p class="lead">Fluorish is building an online database to upload, share, and comment on user submitted panels. Link OMIP and PMID to the panels to validate them. PanelShare will integrate with FlowRepository to use MIFlowCyt specific criteria to locate experimental details on the usability of each panel.</p>
              <p class="action_button"><a href="#" class="btn btn-large">Coming Soon</a></p>
            </div>
            <div class="span6"><img src="<?php echo getTheme(); ?>img/slides/slider_index_share.png" alt=""/></div>
          </div>
        </div>
      </li>
      <!-- Slider item 5 END -->
      
    </ul>
  </div>
  <!-- Hero slider END --> 
  
</div>
<!-- Hero END --> 
<!-- Vendor Logos -->
<div id="vendors">
  <div class="container">
    <p class="lead">Our database features antibody catalogs by: </p>
    <div class="row">
      <div class="span1 vendorlogo"> <a href="<?php echo getTheme(); ?>img/vendors/1.png" class="thumbnail fancybox"> <img src="addons/shared_addons/themes/fluorish/img/vendors/1.png" alt=""></a> </div>
      <div class="span1 vendorlogo"> <a href="<?php echo getTheme(); ?>img/vendors/2.png" class="thumbnail fancybox"> <img src="<?php echo getTheme(); ?>img/vendors/2.png" alt=""></a> </div>
      <div class="span1 vendorlogo"> <a href="<?php echo getTheme(); ?>img/vendors/3.png" class="thumbnail fancybox"> <img src="<?php echo getTheme(); ?>img/vendors/3.png" alt=""></a> </div>
      <div class="span1 vendorlogo"> <a href="<?php echo getTheme(); ?>img/vendors/4.png" class="thumbnail fancybox"> <img src="<?php echo getTheme(); ?>img/vendors/4.png" alt=""></a> </div>
      <div class="span1 vendorlogo"> <a href="<?php echo getTheme(); ?>img/vendors/5.png" class="thumbnail fancybox"> <img src="<?php echo getTheme(); ?>img/vendors/5.png" alt=""></a> </div>
      <div class="span1 vendorlogo"> <a href="<?php echo getTheme(); ?>img/vendors/6.png" class="thumbnail fancybox"> <img src="<?php echo getTheme(); ?>img/vendors/6.png" alt=""></a> </div>
      <div class="span1 vendorlogo"> <a href="<?php echo getTheme(); ?>img/vendors/7.png" class="thumbnail fancybox"> <img src="<?php echo getTheme(); ?>img/vendors/7.png" alt=""></a> </div>
      <div class="span1 vendorlogo"> <a href="<?php echo getTheme(); ?>img/vendors/14.png" class="thumbnail fancybox"> <img src="<?php echo getTheme(); ?>img/vendors/14.png" alt=""></a> </div>
      <div class="span1 vendorlogo"> <a href="<?php echo getTheme(); ?>img/vendors/9.png" class="thumbnail fancybox"> <img src="<?php echo getTheme(); ?>img/vendors/9.png" alt=""></a> </div>
      <div class="span1 vendorlogo"> <a href="<?php echo getTheme(); ?>img/vendors/13.png" class="thumbnail fancybox"> <img src="<?php echo getTheme(); ?>img/vendors/13.png" alt=""></a> </div>
      <div class="span1 vendorlogo"> <a href="<?php echo getTheme(); ?>img/vendors/11.png" class="thumbnail fancybox"> <img src="<?php echo getTheme(); ?>img/vendors/11.png" alt=""></a> </div>
      <div class="span1 vendorlogo"> <a href="<?php echo getTheme(); ?>img/vendors/12.png" class="thumbnail fancybox"> <img src="<?php echo getTheme(); ?>img/vendors/12.png" alt=""></a> </div>
    </div>
  </div>
</div>
<!-- Vendor Logos End --> 
<!-- Features -->
<div id="features">
  <div class="container">
    <div class="row"> 
      
      <!-- Feature box 1 -->
      <div class="span3 featurebox">
        <p><img src="<?php echo getTheme()?>img/icon-feature1.png"> </p>
        <h3>PANEL BUILDER</h3>
        <p>This FREE software package is designed to make the process of creating new, or expanding existing, flow cytometry reagent panels easier and faster. Don't reinvent the wheel!<br />
          Use PANEL SHARE to locate existing panels that other researchers have optimized and use them as a starting point.<br>
          <a href="{{ url:site }}#download">Read More</a> </p>
      </div>
      <!-- Feature box 1 END --> 
      
      <!-- Feature box 2 -->
      <div class="span3 featurebox">
        <p><img src="<?php echo getTheme(); ?>img/icon-feature2.png"></p>
        <h3>FLUORISH CORES</h3>
        <p>Fluorish Cores allow you to manage and share instruments with your users of the facility.  Users can view the details of the instrumentation and schedule appointments. Managers can track user appointments and create facility reports. <br>
          <a href="{{ url:site }}fluorishcores ">Read More</a> </p>
      </div>
      <!-- Feature box 2 END --> 
      <!-- Feature box 3 -->
      <div class="span3 featurebox">
        <p><img src="<?php echo getTheme(); ?>img/icon-feature3.png"></p>
        <h3>FLUORISH LABS</h3>
        <p>Lab members can create a virtual lab inventory to track reagent stocks.  Monitor the use of antibodies, use the titration calculator to quickly update amounts after daily experiment, and set up notifications for reordering.<br />
          <a href="{{ url:site }}fluorishlabs">Read More</a> </p>
      </div>
      <!-- Feature box 3 END --> 
      <!-- Feature box 4 -->
      <div class="span3 featurebox">
        <p><img src="<?php echo getTheme(); ?>img/icon-feature4.png"></p>
        <h3>SIMPLIFIED ORDERS</h3>
        <p>Save time and paperwork for you, and your purchasing agent, by submitting a single order to Fluorish.  Fluorish will use your institutional discounts that have been negotiated with each vendor, but process reagents for numerous companies in one order!  Plus, the more people order from Fluorish, the better the discounts.<br />
          <a href="{{ url:site }}ordering">Read More</a> </p>
      </div>
      <!-- Feature box 4 END --> 
    </div>
  </div>
</div>
<!-- Features END --> 
<!-- About -->
<div id="about">
  <div id="container" class="container"> 
    
    <!-- About -->
    <div id="about1" class="row">
      <div class="span6 topmargin2">
        <iframe width="560" height="315" src="http://www.youtube.com/embed/L2IUNzMB-3s" frameborder="0" allowfullscreen></iframe>
      </div>
      <div class="span6">
        <h2 class="bottommargin5">Introduction to Fluorish</h2>
        <p class=" bottommargin5">Flow is what we know!  So this is where we have focused our initial energy.  Fluorish has designed a lot of its primary functionality with the scientist using flow cytometry 
          in mind, so our efforts have been on building, sharing, and managing the flow cytometry workflow.</p>
        <p class=" bottommargin5">Fluorish Cores has been mainly designed for flow cytometry core facilities, the Panel Builder constructs panels for specific flow cytometery instruments, and all of our current 
          reagent partners have strong flow cytometry portfolios. Even PanelShare is currently designed for flow cytometry panel annotation and sharing.</p>
        <p class=" bottommargin5">Once you start using Fluorish, you will quickly realize that Fluorish's tools are not only for flow cytometry.  In fact, Fluorish Labs has numerous tools that will help labs 
          manage inventory, schedule lab specific instrumentation/equipment, and single click ordering from all of our partners! In the future, our goal is to expand Fluorish beyond flow cytometry and provide 
          tools for other scientific applications.</p>
      </div>
    </div>
    <!-- About END --> 
  </div>
</div>
<!-- About END --> 
<!-- Reagent Search -->
<div id="reagentsearch" class="row">
  <div class="container">
    <div class="span12 topmargin2">
      <h2 class="bottommargin5">Reagent Search</h2>
    </div>
  </div>
</div>
<!-- Reagent Search END --> 
<!-- Download -->
<div id="download" class="topmargin2" >
  <div class="container">
    <h2>The Panel Builder</h2>
    <div class="row">
      <div class="span6">
        <p class="bottommargin5" id="example"> The Panel Builder will take you step wise through the panel design process. Once you load your instrument configuration file (available by joining a Fluorish Core, or by manually building one and uploading to your Fluorish account), the panel builder will utilize the spectral profiles of over 250 fluorophores to identify the ones that are optimal with the provided instrument configuration. By identifying your required antigen targets, the Fluorish Panel Builder will then provide the conjugate list for all the entered targets with fluorophore options specific to your instrument. As conjugate options are selected, the fluorophores are placed in the optimal channels and the remaining list refines to prevent the selection of significantly overlapping fluorophores.</p>
        <p class="bottommargin5">Use the Panel Builder to design a completely new panel, or to add another few targets into an existing panel. <a href="http://www.fluorish.com/design/" data-toggle="tooltip" title="Go to the Cytometer Configuration Builder">Learn More</a> </p>
        <!-- System Requirements box -->
        <button type="button" class="btn btn-info btn-small" data-toggle="collapse" data-target="#requirements">System Requirements</button>
        <div id="requirements" class="collapse">
          <ul>
            <li>This is a stand alone Java application that will run directly on Mac or PC.</li>
            <li>Java 6</li>
            <li>512 MB RAM</li>
            <li>Internet Connection</li>
            <li>Mac users: Mac OS 10.5 or higher</li>
            <li>PC users: Windows XP, Vista or 7</li>
            <li>Download the tech-note for an overview of the Fluorish Panel Wizard, here.</li>
          </ul>
        </div>
        <!-- System Requirements box END -->
        <p> 
          <!-- Download box Windows -->
        <div id="downloadbox-windows" class="span3 downloadbox"> <a href="#" class="btn btn-success btn-large bottommargin10 topmargin10">Windows Download</a> </div>
        <!-- Download box Windows END --> 
        <!-- Download box iOS -->
        <div id="downloadbox-ios" class="span3 downloadbox"> <a href="#" class="btn btn-primary btn-large bottommargin10 topmargin10">OSX Download</a> </div>
        <!-- Download box iOS END --> 
      </div>
      </p>
      <!-- Screen Shot Carousel -->
      <div class="row">
        <div class="span6">
          <div id="myCarousel" class="flexslider">
            <ul class="slides">
              <li id="slider-item-1">
                <div class="container">
                  <div class="row">
                    <div class="span6"> <a href="#" class="thumbnail fancybox"><img src="<?php echo getTheme(); ?>img/screenshots/thumb1.jpg"></a> </div>
                  </div>
                </div>
              </li>
              <li id="slider-item-2">
                <div class="container">
                  <div class="row">
                    <div class="span6"> <a href="#" class="thumbnail fancybox"><img src="<?php echo getTheme(); ?>img/screenshots/thumb2.jpg"></a> </div>
                  </div>
                </div>
              </li>
              <li id="slider-item-3">
                <div class="container">
                  <div class="row">
                    <div class="span6"> <a href="#" class="thumbnail fancybox"><img src="<?php echo getTheme(); ?>img/screenshots/thumb3.jpg"></a> </div>
                  </div>
                </div>
              </li>
              <li id="slider-item-4">
                <div class="container">
                  <div class="row">
                    <div class="span6"> <a href="#" class="thumbnail fancybox"><img src="<?php echo getTheme(); ?>img/screenshots/thumb4.jpg"</a> </div>
                  </div>
                </div>
              </li>
              <li id="slider-item-4">
                <div class="container">
                  <div class="row">
                    <div class="span6"> <a href="#" class="thumbnail fancybox"><img src="<?php echo getTheme(); ?>img/screenshots/thumb5.jpg"></a> </div>
                  </div>
                </div>
              </li>
              <li id="slider-item-4">
                <div class="container">
                  <div class="row">
                    <div class="span6"> <a href="#" class="thumbnail fancybox"><img src="<?php echo getTheme(); ?>img/screenshots/thumb6.jpg"></a> </div>
                  </div>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </div>
      <!-- End Screen Shot Carousel --> 
      
    </div>
  </div>
</div>
<!-- Download END --> 
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
	$('.flexslider').flexslider({
		// You should better not change these settings //
		animation: "slide",
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