<!DOCTYPE html>
<!--[if lt IE 7]> <html class="lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>    <html class="lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>    <html class="lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html>
<!--<![endif]-->
<head>
<title><?php echo APP_NAME; ?>- Dashboard (<?php echo APP_VERSION; ?>)</title>

<!-- Meta -->
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black">

<!-- Bootstrap -->
<link href="<?php echo getURL(); ?>bootstrap/css/bootstrap.min.css" rel="stylesheet" />
<link href="<?php echo getURL(); ?>bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" />

<!-- Bootstrap Extended -->
<link href="<?php echo getURL(); ?>bootstrap/css/jasny-bootstrap.min.css" rel="stylesheet">
<link href="<?php echo getURL(); ?>bootstrap/css/jasny-bootstrap-responsive.min.css" rel="stylesheet">
<link href="<?php echo getURL(); ?>bootstrap/css/bootstrap-wysihtml5-0.0.2.css" rel="stylesheet">

<!-- Select2 -->
<link rel="stylesheet" href="<?php echo getURL(); ?>theme/scripts/plugins/forms/select2/select2.css"/>

<!-- Notyfy -->
<link rel="stylesheet" href="<?php echo getURL(); ?>theme/scripts/plugins/notifications/notyfy/jquery.notyfy.css"/>
<link rel="stylesheet" href="<?php echo getURL(); ?>theme/scripts/plugins/notifications/notyfy/themes/default.css"/>

<!-- Gritter Notifications Plugin -->
<link href="<?php echo getURL(); ?>theme/scripts/plugins/notifications/Gritter/css/jquery.gritter.css" rel="stylesheet" />

<!-- JQueryUI v1.9.2 -->
<link rel="stylesheet" href="<?php echo getURL(); ?>theme/scripts/plugins/system/jquery-ui-1.9.2.custom/css/smoothness/jquery-ui-1.9.2.custom.min.css" />

<!-- Icons -->
<link rel="stylesheet" href="<?php echo getURL(); ?>theme/css/icons.css" />
<link rel="stylesheet" href="<?php echo getURL(); ?>theme/css/fluorish_icons.css" />

<!-- Bootstrap Extended -->
<link rel="stylesheet" href="<?php echo getURL(); ?>bootstrap/css/bootstrap-select.css" />
<link rel="stylesheet" href="<?php echo getURL(); ?>bootstrap/css/bootstrap-toggle-buttons.css" />

<!-- Uniform -->
<link rel="stylesheet" media="screen" href="<?php echo getURL(); ?>theme/scripts/plugins/forms/pixelmatrix-uniform/css/uniform.default.css" />

<!-- google-code-prettify -->
<link href="<?php echo getURL(); ?>theme/scripts/plugins/other/google-code-prettify/prettify.css" type="text/css" rel="stylesheet" />

<!-- DataTables -->
<link rel="stylesheet" media="screen" href="<?php echo getURL(); ?>theme/scripts/plugins/tables/DataTables/media/css/DT_bootstrap.css" />
<link rel="stylesheet" media="screen" href="<?php echo getURL(); ?>theme/scripts/plugins/tables/DataTables/extras/TableTools/media/css/TableTools.css" />

<!-- JQuery v1.8.2 -->
<script src="<?php echo getURL(); ?>theme/scripts/plugins/system/jquery-1.8.2.min.js"></script>

<!-- Modernizr -->
<script src="<?php echo getURL(); ?>theme/scripts/plugins/system/modernizr.custom.76094.js"></script>

<!-- MiniColors -->
<link rel="stylesheet" media="screen" href="<?php echo getURL(); ?>theme/scripts/plugins/color/jquery-miniColors/jquery.miniColors.css" />
<?php if (DEV): ?>
<!-- Theme -->
<link rel="stylesheet/less" href="<?php echo getURL(); ?>theme/less/<?php echo STYLE; ?>.less?<?php echo time(0); ?>" />
<?php if (SKIN): ?>
<!-- Skin -->
<link rel="stylesheet/less" href="<?php echo getURL(); ?>theme/skins/less/<?php echo SKIN; ?>.less?<?php echo time(0); ?>" />
<?php endif; ?>
<?php else: ?>
<!-- Theme -->
<link rel="stylesheet" href="<?php echo getURL(); ?>theme/css/<?php echo STYLE; ?>.css?<?php echo time(0); ?>" />
<?php if (SKIN): ?>
<!-- Skin -->
<link rel="stylesheet" href="<?php echo getURL(); ?>theme/skins/css/<?php echo SKIN; ?>.css?<?php echo time(0); ?>" />
<?php endif; ?>
<?php endif; ?>
<?php if (DEV): ?>
<!-- FireBug Lite -->
<!-- <script type="text/javascript" src="https://getfirebug.com/firebug-lite-debug.js"></script> -->

<?php endif; ?>
<?php if (GA): ?>
<!-- Google Analytics -->
<script type="text/javascript">

	  var _gaq = _gaq || [];
	  _gaq.push(['_setAccount', '']);
	  _gaq.push(['_trackPageview']);
	
	  (function() {
	    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
	    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
	    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
	  })();
	
	</script>
<?php endif; ?>
<!-- LESS 2 CSS -->
<script src="<?php echo getURL(); ?>theme/scripts/plugins/system/less-1.3.3.min.js"></script>
<style>

</style>
<script>
$(document).ready(function () {
	
	
    $("div[id^=group-]").on('shown', function () {
		//$(".t1").text('Close');
		$(".g1.icon-chevron-down").removeClass("icon-chevron-down").addClass("icon-chevron-up");
    });
	
    $("div[id^=group-]").on('hidden', function () {
        //$(".t1").text('View Details');
		$(".g1.icon-chevron-up").removeClass("icon-chevron-up").addClass("icon-chevron-down");
    });
	
	
	$('#select-group').editable({
            inputclass: 'input-large m-wrap',
            select2: {
                tags: ['Ostrat Lab', 'UCSF Flow Core', 'My Core', 'My Lab'],
                tokenSeparators: [",", " "]
            }
        });


});
</script>
</head>
<body>
<?php
	if(isset($this->session->userdata['logged_in']))
		$username = $this->session->userdata['logged_in']['username'];
	else
		$username = '';
?>
<!-- Start Content -->
<div class="container-fluid menu-hidden <?php echo LAYOUT_TYPE; ?>">
<div class="navbar main hidden-print">
<a href="#" class="appbrand"><span><span></span></span></a>

  <ul class="topnav pull-right">
    <li><a href=""><span class=""><img src="fluorish_dashboard/assets/images/dl.png" width="175" height="40"></span></a></li>
    <li><a href="">Send Invites</a></li>
    <li><a href="">Contact</a></li>
   
    <li class="account"> <a data-toggle="dropdown" href="#" class="glyphicons logout lock"><span class="hidden-phone text"><?= $username?></span><i></i></a>
      <ul class="dropdown-menu pull-right">
        <li><a href="#" class="glyphicons cogwheel">Settings<i></i></a></li>
        <li><a href="#" class="glyphicons cogwheel">Core Membership<i></i></a></li>
        <li><a href="#" class="glyphicons cogwheel">Lab Membership<i></i></a></li>
        <li class="highlight profile">
        	<span>
            <span class="heading">Profile <a href="#" class="pull-right">edit</a></span>
            <span class="img"></span>
            <span class="details"> <a href="#">Fluorish</a> <?= $username?> </span>
            <span class="clearfix"></span>
            </span>
        </li>
        <li> <span> <a class="btn btn-default btn-small pull-right" style="padding: 2px 10px; background: #fff;" href="#">Sign Out</a> </span> </li>
      </ul>
    </li>
  </ul>
</div>
<div id="wrapper">
<div id="content">
