<div class="separator bottom"></div>
<div class="separator bottom"></div>
<!-- End Content -->
</div>
 <!-- End Wrapper -->
</div>

</div>
</div>
<style>
.large {
    background-color: #2F2F2F;
    color: #666666;
    margin-bottom: -14px;
    padding-top: 5px;
}
</style>

<div id="contact" class="container fixed">
  <div class="container">
    <div class="row">
      <div class="span4">
        <address>
        <div id="f_logo"><img src="<?php echo base_url() ?>public/themes/fluorish2013/img/logo.png"></div>
        <br>
        340 A Street, Suite 101<br>
        Ashland, OR 97520<br>
        <abbr title="Phone">P:</abbr> 800-366-6045 (US and Canada)<br>
        <abbr title="Phone">Int:</abbr> 541-201-0022
        </address>
      </div>
      <div id="footer_support" class="span4">
        <h4>Support</h4>
        <ul>
          <li><a href="mailto:support@fluorish.com">Support@Fluorish.com</a></li>
          <li><a href="/contact">Leave Feedback or Comments</a></li>
          <li><a href="/videos">Videos</a></li>
          <li><a href="/faq">FAQ</a></li>
        </ul>
      </div>
      <div id="footer_partner" class="span4">
        <h4>Partner center</h4>
        <ul>
          <li><a class="btn" href="/partner">Become a partner</a></li>
          <li><a class="btn" href="/login">Partner Dashboard Login</a></li>
        </ul>
      </div>
    </div>
  </div>
</div>


<!-- Sticky Footer -->
<div id="footer" class="footer">
	<div id="terms" class="container">
     	<div class="span5 offset1">
    		<a href="#">Privacy</a> | <a href="#">Terms</a>
    	</div>
        <div class="span5 pull-right" style="color:#5A5A5A">
    	© 2013 Fluorish. Design by Fluorish, LLC. All Rights Reserved.
    	</div>
    </div>
</div>
<!-- JQueryUI v1.9.2 --> 
<script src="<?php echo getURL(); ?>theme/scripts/plugins/system/jquery-ui-1.9.2.custom/js/jquery-ui-1.9.2.custom.min.js"></script> 

<!-- JQueryUI Touch Punch --> 
<!-- small hack that enables the use of touch events on sites using the jQuery UI user interface library --> 
<script src="<?php echo getURL(); ?>theme/scripts/plugins/system/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js"></script> 

<!-- MiniColors --> 
<script src="<?php echo getURL(); ?>theme/scripts/plugins/color/jquery-miniColors/jquery.miniColors.js"></script> 

<!-- Select2 --> 
<script src="<?php echo getURL(); ?>theme/scripts/plugins/forms/select2/select2.js"></script> 

<!-- jQuery Slim Scroll Plugin --> 
<script src="<?php echo getURL(); ?>theme/scripts/plugins/other/jquery-slimScroll/jquery.slimscroll.min.js"></script> 

<!-- Fluorish Data Script --> 
<script src="<?php echo getURL(); ?>theme/scripts/fldata/fluorish.js" type="text/javascript"></script> 

<!-- Common Demo Script --> 
<script src="<?php echo getURL(); ?>theme/scripts/demo/common.js?<?php echo time(0); ?>"></script> 

<!-- Form Elements Custom script --> 
<script src="<?php echo getURL(); ?>theme/scripts/fldata/posts.js" type="text/javascript"></script> 

<!-- ColorPicker --> 
<script src="<?php echo getURL(); ?>theme/scripts/plugins/color/farbtastic/farbtastic.js" type="text/javascript"></script> 

<!-- Form Elements Custom script --> 
<script src="<?php echo getURL(); ?>theme/scripts/demo/form_elements.js" type="text/javascript"></script> 

<!-- Resize Script --> 
<script src="<?php echo getURL(); ?>theme/scripts/plugins/other/jquery.ba-resize.js"></script> 

<!-- Uniform --> 
<script src="<?php echo getURL(); ?>theme/scripts/plugins/forms/pixelmatrix-uniform/jquery.uniform.min.js"></script> 

<!-- Bootstrap Script --> 
<script src="<?php echo getURL(); ?>bootstrap/js/bootstrap.min.js"></script> 

<!-- Bootstrap Extended --> 
<script src="<?php echo getURL(); ?>bootstrap/extend/bootstrap-select/bootstrap-select.js"></script> 
<script src="<?php echo getURL(); ?>bootstrap/extend/bootstrap-toggle-buttons/static/js/jquery.toggle.buttons.js"></script> 
<script src="<?php echo getURL(); ?>bootstrap/extend/bootstrap-hover-dropdown/twitter-bootstrap-hover-dropdown.min.js"></script> 
<script src="<?php echo getURL(); ?>bootstrap/extend/jasny-bootstrap/js/jasny-bootstrap.min.js" type="text/javascript"></script> 
<script src="<?php echo getURL(); ?>bootstrap/extend/jasny-bootstrap/js/bootstrap-fileupload.js" type="text/javascript"></script> 
<script src="<?php echo getURL(); ?>bootstrap/extend/bootbox.js" type="text/javascript"></script> 
<script src="<?php echo getURL(); ?>bootstrap/extend/bootstrap-wysihtml5/js/wysihtml5-0.3.0_rc2.min.js" type="text/javascript"></script> 
<script src="<?php echo getURL(); ?>bootstrap/extend/bootstrap-wysihtml5/js/bootstrap-wysihtml5-0.0.2.js" type="text/javascript"></script> 
<script type="text/javascript" src="<?php echo getURL(); ?>theme/scripts/plugins/select2/select2.min.js"></script> 
<script type="text/javascript" src="<?php echo getURL(); ?>theme/scripts/plugins/moment.min.js"></script> 
<script type="text/javascript" src="<?php echo getURL(); ?>theme/scripts/plugins/jquery.mockjax.js"></script> 
<script type="text/javascript" src="<?php echo getURL(); ?>theme/scripts/plugins/bootstrap-editable/bootstrap-editable/js/bootstrap-editable.min.js"></script> 

<!-- google-code-prettify --> 
<script src="<?php echo getURL(); ?>theme/scripts/plugins/other/google-code-prettify/prettify.js"></script> 

<!-- Gritter Notifications Plugin --> 
<script src="<?php echo getURL(); ?>theme/scripts/plugins/notifications/Gritter/js/jquery.gritter.min.js"></script> 

<!-- Notyfy --> 
<script type="text/javascript" src="<?php echo getURL(); ?>theme/scripts/plugins/notifications/notyfy/jquery.notyfy.js"></script> 

<!-- Bootstrap Form Wizard Plugin --> 
<script src="<?php echo getURL(); ?>bootstrap/extend/twitter-bootstrap-wizard/jquery.bootstrap.wizard.js"></script> 
<!-- account_setup Page Demo Script --> 
<script src="<?php echo getURL(); ?>theme/scripts/demo/form_wizards.js"></script> 

<!-- Modals Page Demo Script --> 
<script src="<?php echo getURL(); ?>theme/scripts/demo/modals.js"></script> 

<!-- Notifications Page Demo Script --> 
<script src="<?php echo getURL(); ?>theme/scripts/demo/notifications.js"></script>
<script>
// replace the #content container with the button's href:
//for "edit" buttons
	$("a[id^='edit_resource_link_']").click(function(event)
	{
		event.preventDefault();
		
		var buttonid = $(this).attr("id");
		var id = buttonid.substring(buttonid.lastIndexOf("_")+1);
		
		var target = $(this).attr("href");

		$("#content").load(target);		
	});
	
//for "view" buttons	
	$("a[id^='view_resource_link_']").click(function(event)
	{
		event.preventDefault();
		
		var buttonid = $(this).attr("id");
		var id = buttonid.substring(buttonid.lastIndexOf("_")+1);
		
		var target = $(this).attr("href");

		$("#content").load(target);		
	});

</script>

</body>
</html>