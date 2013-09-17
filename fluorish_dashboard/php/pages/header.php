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
<link href="<?php echo getURL(); ?>bootstrap/extend/jasny-bootstrap/css/jasny-bootstrap.min.css" rel="stylesheet">
<link href="<?php echo getURL(); ?>bootstrap/extend/jasny-bootstrap/css/jasny-bootstrap-responsive.min.css" rel="stylesheet">
<link href="<?php echo getURL(); ?>bootstrap/extend/bootstrap-wysihtml5/css/bootstrap-wysihtml5-0.0.2.css" rel="stylesheet">

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
<link rel="stylesheet" href="<?php echo getURL(); ?>bootstrap/extend/bootstrap-select/bootstrap-select.css" />
<link rel="stylesheet" href="<?php echo getURL(); ?>bootstrap/extend/bootstrap-toggle-buttons/static/stylesheets/bootstrap-toggle-buttons.css" />

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

body { 
  background: url(../assets/images/bg.jpg) no-repeat center center fixed; 
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;
  filter: progid:DXImageTransform.Microsoft.AlphaImageLoader(src='.myBackground.jpg', sizingMethod='scale');
-ms-filter: "progid:DXImageTransform.Microsoft.AlphaImageLoader(src='myBackground.jpg', sizingMethod='scale')";
}

.icon-my-preferences{
   background: url(../assets/images/my_preferences_32.png) no-repeat;
   width: 32px;
   height: 32px;
   border: none;
   margin-right:10px;
   
   display:inline-block;
}
.icon-lab-preferences{
   background: url(../assets/images/lab_preferences_32.png) no-repeat;
   width: 32px;
   height: 32px;
   border: none;
   margin-right:10px;
   
   display:inline-block;
}
.icon-core-preferences{
   background: url(../assets/images/core2_preferences_32.png) no-repeat;
   width: 32px;
   height: 32px;
   border: none;
   margin-right:10px;
   
   display:inline-block;
}
.icon-panels{
   background: url(../assets/images/panels_32.png) no-repeat;
   width: 32px;
   height: 32px;
   border: none;
   margin-right:10px;
   display:inline-block;
}
.icon-core{
   background: url(../assets/images/core2_32.png) no-repeat;
   width: 32px;
   height: 32px;
   border: none;
   margin-right:10px;
   display:inline-block;
}
.icon-lab{
   background: url(../assets/images/lab_32.png) no-repeat;
   width: 32px;
   height: 32px;
   border: none;
   margin-right:10px;
   display:inline-block;
}
.icon-orders{
   background: url(../assets/images/orders_pending_32.png) no-repeat;
   width: 32px;
   height: 32px;
   border: none;
   margin-right:10px;
   display:inline-block;
}

.icon-messages{
   background: url(../assets/images/messages_32.png) no-repeat;
   width: 32px;
   height: 32px;
   border: none;
   margin-right:10px;
   display:inline-block;
}



.glyphicons.myfluorish i {
	background-image: url(../assets/images/my_fluorish_32.png);
	background-position: center;
	background-repeat: no-repeat;
	 margin-right: 10px;
}
.glyphicons.core i {
	background-image: url(../assets/images/core_32.png);
	background-position: center;
	background-repeat: no-repeat;
	 margin-right: 10px;
}
.glyphicons.lab i {
	background-image: url(../assets/images/lab_32.png);
	background-position: center;
	background-repeat: no-repeat;
	 margin-right: 10px;
}

.glyphicons.pb i {
	background-image: url(../assets/images/pb_32.png);
	background-position: center;
	background-repeat: no-repeat;
}
.glyphicons.cart i {
	background-image: url(../assets/images/orders_32.png);
	background-position: center;
	background-repeat: no-repeat;
}
.flnav .glyphicons> i {
	margin-top: 10px;
}
.flnav .glyphicons {
	font-size: 11pt;
	font-weight: bold;
}
.accordion.accordion-2 .accordion-heading .accordion-toggle {
	border-bottom: none;
}
.group-resources {
	margin-top: 4px;
}
.row-fluid.accordion-toggle {
	z-index: 500;
	position: absolute;
}
.row-fluid.accordion-toggle a {
	border-bottom: 1px solid #E5E5E5;
	border-left: 1px solid #E5E5E5;
	border-right: 1px solid #E5E5E5;
	font-size: 9px;
	margin: 10px;
	padding: 4px;
}
.badge {
	background-color: #E02222;
	border-radius: 12px 12px 12px 12px !important;
	font-size: 11px !important;
	font-weight: 400;
	height: 13px;
	position: relative;
	right: 15px;
	text-align: center;
	text-shadow: none !important;
	top: 0;
}
#dashboard-group-select {
	margin-top: 15px;
}
#dashboard-group-select > h4 {
    margin-right: 1px;
}

#dashboard-group-select > a {
    font-size: 11px;
}
#dashboard-group-select > span {
	color:#666;
    border-left: 1px solid #CCCCCC;
    margin-left: 20px;
    padding-left: 15px;
	 margin-right: 5px;
}
.fluorishicon  {
	display: inline-block;
	position: relative;
	*display: inline;
	*zoom: 1;
	height: 64px;
	text-align: right;
	padding-top: 15px;
	padding-right: 0;
	padding-bottom: 5px;
	padding-left: 64px;
}
</style>
<script>
$(document).ready(function () {
	
	//$("[id^='group-']").on('click', function()
//	{
//		var ID = $(this).attr("id");
//		var id = ID.substr(ID.lastIndexOf('_')+1);
//		
//		if($('#group-'+id).is(':visible'))
//		{
//			$('#g-'+id).removeClass("icon-chevron-down").addClass("icon-chevron-up");
//		}
//		else
//		{
//			$('#g-'+id).removeClass("icon-chevron-up").addClass("icon-chevron-down");
//		}
//	});
	
	//Show
	$('#group-0').on('shown', function () {
		//$(".t1").text('Close');
		$(".g0.icon-chevron-down").removeClass("icon-chevron-down").addClass("icon-chevron-up");
    });
	$('#group-1').on('shown', function () {
		//$(".t1").text('Close');
		$(".g1.icon-chevron-down").removeClass("icon-chevron-down").addClass("icon-chevron-up");
    });
	$('#group-2').on('shown', function () {
		//$(".t1").text('Close');
		$(".g2.icon-chevron-down").removeClass("icon-chevron-down").addClass("icon-chevron-up");
    });
	
	//Hide
	$('#group-0').on('hidden', function () {
        //$(".t1").text('View Details');
		$(".g0.icon-chevron-up").removeClass("icon-chevron-up").addClass("icon-chevron-down");
    });
    $('#group-1').on('hidden', function () {
        //$(".t1").text('View Details');
		$(".g1.icon-chevron-up").removeClass("icon-chevron-up").addClass("icon-chevron-down");
    });
	$('#group-2').on('hidden', function () {
        //$(".t1").text('View Details');
		$(".g2.icon-chevron-up").removeClass("icon-chevron-up").addClass("icon-chevron-down");
    });
	
	$('#select-group').editable({
            inputclass: 'input-large m-wrap',
            select2: {
                tags: ['Ostrat Lab', 'UCSF Flow Core', 'My Core', 'My Lab'],
                tokenSeparators: [",", " "]
            }
        });
		
		$('#select-instruments').editable({
            inputclass: 'input-large m-wrap',
            select2: {
                tags: ['My Cytometers','UCSF Flow Cytometery Core', 'Stanford Shared Resource Center'],
                tokenSeparators: [",", " "]
            }
        });


});
</script>
</head>
<body>
<!-- Start Content -->
<div class="container-fluid menu-hidden fixed">
<div class="navbar main hidden-print">
 
  <a href="#" class="appbrand"></a>
  <!--<button type="button" class="btn btn-navbar"> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>-->
 
  <ul class="topnav pull-right">
    <li><a href=""><span class=""><img src="../assets/images/dl.png" width="175" height="40"></span></a></li>
    <li><a href="">Send Invites</a></li>
    <li><a href="">Contact</a></li>

    <li class="account">
      
    </li>
  </ul>
</div>

<div id="wrapper">
<div id="content">
