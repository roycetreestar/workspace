<!-- Contact -->
<div class="large" id="contact">
	<div class="container">
    	<div class="row">
            <div class="span4">
                    <address>
                    <div id="f_logo">{{ theme:image file="logo.png" }}</div>
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
            		<li><a href="<?php echo base_URL() ?>partner" class="btn">Become a partner</a></li>
            		<li><a href="<?php echo base_URL() ?>partner/admin/login" class="btn">Partner Dashboard Login</a></li>
            		</ul>
            </div>
		</div>
	</div>
</div>	
<!-- Contact END --> 
</div>
<!-- /container --> 
<!-- Footer -->
<footer id="footer">
      <div class="container">
      
    <div class="row">
    <div class="span2" id="footer_terms">
    <a href="{{ url:site }}privacy">Privacy</a> | <a href="{{ url:site }}terms">Terms</a>
    </div>
          <div class="span9">
        <p> &copy; 2013 Fluorish. Design by <a href="http://fluorish.com" rel="nofollow">Fluorish, LLC</a>. All Rights Reserved.</p>
      </div>
        </div>
  </div>
    </footer>
<!-- Footer END --> 

<!-- JavaScript
================================================== --> 
<script src="<?php echo js() ?>jquery-1.8.3.min.js"></script> 
<script src="<?php echo js() ?>jquery-1.8.3.min.js"></script> 
<script src="<?php echo js() ?>bootstrap.min.js"></script> 
<script src="<?php echo js() ?>jquery.flexslider-min.js"></script> 
<script src="<?php echo js() ?>jquery.fitvids.js"></script> 
<script src="<?php echo js() ?>jquery.smooth-scroll.min.js"></script> 
<script src="<?php echo js() ?>jquery.fancybox-1.3.4.pack.js"></script> 
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