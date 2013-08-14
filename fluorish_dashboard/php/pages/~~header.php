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
.glyphicons.myfluorish i {
	background-image: url(../assets/images/my_fluorish_32.png);
	background-position: center;
	background-repeat: no-repeat;
}
.glyphicons.core i {
	background-image: url(../assets/images/core_32.png);
	background-position: center;
	background-repeat: no-repeat;
}
.glyphicons.lab i {
	background-image: url(../assets/images/lab_32.png);
	background-position: center;
	background-repeat: no-repeat;
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

</style>
<script>
$(document).ready(function () {
	
    $('#group-1').on('shown', function () {
		//$(".t1").text('Close');
		$(".g1.icon-chevron-down").removeClass("icon-chevron-down").addClass("icon-chevron-up");
    });
	$('#group-2').on('shown', function () {
		//$(".t1").text('Close');
		$(".g2.icon-chevron-down").removeClass("icon-chevron-down").addClass("icon-chevron-up");
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


});
</script>
</head>
<body>

<!-- Start Content -->
<div class="container-fluid menu-hidden <?php echo LAYOUT_TYPE; ?><?php if ($page == 'login' || $page == 'error'): ?> login<?php endif; ?><?php if ($page == 'documentation'): ?> documentation<?php endif; ?>">
<div class="navbar main hidden-print">
  <?php if ($page == 'landing_page'): ?>
  <div class="container-960"> <a href="<?php echo $page == 'login' ? getURL(array('login')) : getURL(array('dashboard')); ?>" class="appbrand pull-left visible-menu-hidden hidden-phone"> </a>
    <ul class="topnav pull-left">
      <li class="active"><a href="<?php echo getURL(array('landing_page')); ?>" class="glyphicons notes"><i></i>Landing page</a></li>
      <li><a href="<?php echo getURL(array('dashboard')); ?>" class="glyphicons dashboard"><i></i>Dashboard</a></li>
      <?php if (SKIN_JS): ?>
      <li class="hidden-phone"><a href="#themer" data-toggle="collapse" class="glyphicons eyedropper"><i></i><span><?php echo $translate->_('Themer'); ?></span></a></li>
      <?php endif; ?>
    </ul>
  </div>
  <?php else: ?>
  <a href="<?php echo $page == 'login' ? getURL(array('login')) : getURL(array('dashboard')); ?>" class="appbrand"></a>
  <?php if ($page != 'login' && $page != 'documentation' && $page != 'error' && $page != 'landing_page'): ?>
  <!--<button type="button" class="btn btn-navbar"> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>-->
  <?php endif; ?>
  <ul class="topnav pull-right">
    <li><a href=""><span class=""><img src="../assets/images/dl.png" width="175" height="40"></span></a></li>
    <li><a href="">Send Invites</a></li>
    <li><a href="">Contact</a></li>
    <?php if (SKIN_JS): ?>
    <!-- <li class="hidden-phone"><a href="#themer" data-toggle="collapse" class="glyphicons eyedropper"><i></i><span><?php echo $translate->_('Themer'); ?></span></a></li>-->
    <?php endif; ?>
    <li class="account">
      <?php if ($page == 'login'): ?>
      <a href="<?php echo 
					//getURL(array('login'));
					getURL(array('dashboard')); 
					?>" class="glyphicons logout lock"><span class="hidden-phone text">Welcome <strong>guest</strong></span><i></i></a>
      <?php else: ?>
      <a data-toggle="dropdown" href="<?php echo 
					//getURL(array('my_account'));
					getURL(array('dashboard')); 
					?>" class="glyphicons logout lock"><span class="hidden-phone text">Royce Cano</span><i></i></a>
      <ul class="dropdown-menu pull-right">
        <li><a href="<?php echo 
						//getURL(array('my-accoutn')); 
						getURL(array('dashboard'));
						?>" class="glyphicons cogwheel">Settings<i></i></a></li>
        <li><a href="<?php echo 
						//getURL(array('my-accoutn')); 
						getURL(array('core_membership'));
						?>" class="glyphicons cogwheel">Core Membership<i></i></a></li>
        <li><a href="<?php echo 
						//getURL(array('my-accoutn')); 
						getURL(array('lab_membership'));
						?>" class="glyphicons cogwheel">Lab Membership<i></i></a></li>
        <li class="highlight profile"> <span> <span class="heading">Profile <a href="<?php echo 
								//getURL(array('my_account'));
								getURL(array('dashboard')); 
								?>" class="pull-right">edit</a></span> <span class="img"></span> <span class="details"> <a href="<?php echo 
									//getURL(array('my_account'));
									getURL(array('dashboard')); 
									?>">Fluorish</a> royce@fluorish.com </span> <span class="clearfix"></span> </span> </li>
        <li> <span> <a class="btn btn-default btn-small pull-right" style="padding: 2px 10px; background: #fff;" href="<?php echo 
								//getURL(array('login'));
								getURL(array('dashboard')); 
								?>">Sign Out</a> </span> </li>
      </ul>
      <?php endif; ?>
    </li>
  </ul>
  <?php endif; ?>
</div>
<?php if ($page != 'login' && $page != 'documentation' && $page != 'error'): ?>
<?php if ($page != 'landing_page'): ?>
<div id="wrapper">
<?php endif; ?>
<div id="content">
<div class="widget widget-tabs widget-tabs-double-2">
<div class="widget-head flnav" id="flnav">
  <ul>
    <li class="active"><a href="#my_fluorish" data-toggle="tab" class="glyphicons myfluorish"><i></i>My Fluorish</a></li>
    <li><a href="#labs_inventory" data-toggle="tab" class="glyphicons lab"><i></i>Labs and Inventory</a></li>
    <li><a href="#cores_instruments" data-toggle="tab" class="glyphicons core"><i></i>Cores and Instruments</a></li>
    <li><a href="#panels" data-toggle="tab" class="glyphicons pb"><i></i>Panels</a></li>
  </ul>
  <ul class="span1 pull-right">
    <li><a href="#" data-toggle="tab" class="glyphicons cart"><i></i>Cart</a></li>
  </ul>
</div>

<?php endif; ?>
