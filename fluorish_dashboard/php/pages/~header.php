<!DOCTYPE html>
<!--[if lt IE 7]> <html class="lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>    <html class="lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>    <html class="lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html> <!--<![endif]-->
<head>
	<title><?php echo APP_NAME; ?> - Dashboard (<?php echo APP_VERSION; ?>)</title>
	
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
	
	<!-- Glyphicons -->
	<link rel="stylesheet" href="<?php echo getURL(); ?>theme/css/glyphicons.css" />
    
    <!-- Icons (More) -->
    <link rel="stylesheet" href="<?php echo getURL(); ?>theme/css/icons.css" />
    <style>
    .glyphicons.myfluorish i{
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
    .flnav .glyphicons> i{
        margin-top:10px;
    }
    .flnav .glyphicons {
        font-size: 11pt;
        font-weight: bold;
    }
    </style>
	
	<!-- Bootstrap Extended -->
	<link rel="stylesheet" href="<?php echo getURL(); ?>bootstrap/extend/bootstrap-select/bootstrap-select.css" />
	<link rel="stylesheet" href="<?php echo getURL(); ?>bootstrap/extend/bootstrap-toggle-buttons/static/stylesheets/bootstrap-toggle-buttons.css" />
	
	<!-- Uniform -->
	<link rel="stylesheet" media="screen" href="<?php echo getURL(); ?>theme/scripts/plugins/forms/pixelmatrix-uniform/css/uniform.default.css" />
	
	<!-- google-code-prettify -->
	<link href="<?php echo getURL(); ?>theme/scripts/plugins/other/google-code-prettify/prettify.css" type="text/css" rel="stylesheet" />

<?php if ($page == 'tables'): ?>
	<!-- DataTables -->
	<link rel="stylesheet" media="screen" href="<?php echo getURL(); ?>theme/scripts/plugins/tables/DataTables/media/css/DT_bootstrap.css" />
	<link rel="stylesheet" media="screen" href="<?php echo getURL(); ?>theme/scripts/plugins/tables/DataTables/extras/TableTools/media/css/TableTools.css" />

<?php endif; ?>
<?php if ($page == 'form_elements'): ?>
	<!-- ColorPicker -->
	<link rel="stylesheet" media="screen" href="<?php echo getURL(); ?>theme/scripts/plugins/color/farbtastic/farbtastic.css" />

<?php endif; ?>
	<!-- JQuery v1.8.2 -->
	<script src="<?php echo getURL(); ?>theme/scripts/plugins/system/jquery-1.8.2.min.js"></script>
	
	<!-- Modernizr -->
	<script src="<?php echo getURL(); ?>theme/scripts/plugins/system/modernizr.custom.76094.js"></script>
	
	<!-- MiniColors -->
	<link rel="stylesheet" media="screen" href="<?php echo getURL(); ?>theme/scripts/plugins/color/jquery-miniColors/jquery.miniColors.css" />
	
<?php if ($page == 'calendar'): ?>
	<!-- Calendar -->
	<link rel="stylesheet" media="screen" href="<?php echo getURL(); ?>theme/scripts/plugins/calendars/fullcalendar/fullcalendar/fullcalendar.css" />

<?php endif; ?>
<?php if ($page == 'file_managers'): ?>
	<!-- plupload -->
	<style type="text/css">@import url(<?php echo getURL(); ?>theme/scripts/plugins/forms/plupload/js/jquery.plupload.queue/css/jquery.plupload.queue.css);</style>
	
<?php endif; ?>
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
	
<?php if ($page == 'gallery' || $page == 'finances' || $page == 'index' || $page == 'charts'): ?>	
	<!--[if IE]><script type="text/javascript" src="<?php echo getURL(); ?>theme/scripts/plugins/other/excanvas/excanvas.js"></script><![endif]-->
	<!--[if lt IE 8]><script type="text/javascript" src="<?php echo getURL(); ?>theme/scripts/plugins/other/json2.js"></script><![endif]-->
<?php endif; ?>
</head>
<body>

<!-- Start Content -->
<div class="container-fluid menu-hidden <?php echo LAYOUT_TYPE; ?><?php if ($page == 'login' || $page == 'error'): ?> login<?php endif; ?><?php if ($page == 'documentation'): ?> documentation<?php endif; ?>">
<div class="navbar main hidden-print">
  <?php if ($page == 'landing_page'): ?>
  <div class="container-960">
  <a href="<?php echo $page == 'login' ? getURL(array('login')) : getURL(array('index')); ?>" class="appbrand pull-left visible-menu-hidden hidden-phone">
    
  </a>
    <ul class="topnav pull-left">
      <li class="active"><a href="<?php echo getURL(array('landing_page')); ?>" class="glyphicons notes"><i></i>Landing page</a></li>
      <li><a href="<?php echo getURL(array('index')); ?>" class="glyphicons dashboard"><i></i>Dashboard</a></li>
      <?php if (SKIN_JS): ?>
      <li class="hidden-phone"><a href="#themer" data-toggle="collapse" class="glyphicons eyedropper"><i></i><span><?php echo $translate->_('Themer'); ?></span></a></li>
      <?php endif; ?>
    </ul>
  </div>
  <?php else: ?>
  <a href="<?php echo $page == 'login' ? getURL(array('login')) : getURL(array('index')); ?>" class="appbrand"></a>
  <?php if ($page != 'login' && $page != 'documentation' && $page != 'error' && $page != 'landing_page'): ?>
  <button type="button" class="btn btn-navbar"> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
  <?php endif; ?>
  <ul class="topnav pull-right">
    <!--<li class="visible-desktop">
					<ul class="notif">
						<li><a href="" class="glyphicons envelope" data-toggle="tooltip" data-placement="bottom" data-original-title="5 new messages"><i></i> 5</a></li>
						<li><a href="" class="glyphicons shopping_cart" data-toggle="tooltip" data-placement="bottom" data-original-title="1 new orders"><i></i> 1</a></li>
						<li><a href="" class="glyphicons log_book" data-toggle="tooltip" data-placement="bottom" data-original-title="3 new activities"><i></i> 3</a></li>
					</ul>
				</li>-->
    <li class="dropdown visible-desktop"> <a href="" data-toggle="dropdown" class="glyphicons cogwheel"><i></i>Contact <span class="caret"></span></a>
      <ul class="dropdown-menu pull-right">
        <li><a href="">Some option</a></li>
        <li><a href="">Some other option</a></li>
        <li><a href="">Other option</a></li>
      </ul>
    </li>
    <?php if (SKIN_JS): ?>
   <!-- <li class="hidden-phone"><a href="#themer" data-toggle="collapse" class="glyphicons eyedropper"><i></i><span><?php echo $translate->_('Themer'); ?></span></a></li>-->
    <?php endif; ?>
    <li class="account">
      <?php if ($page == 'login'): ?>
      <a href="<?php echo 
					//getURL(array('login'));
					getURL(array('index')); 
					?>" class="glyphicons logout lock"><span class="hidden-phone text">Welcome <strong>guest</strong></span><i></i></a>
      <?php else: ?>
      <a data-toggle="dropdown" href="<?php echo 
					//getURL(array('my_account'));
					getURL(array('index')); 
					?>" class="glyphicons logout lock"><span class="hidden-phone text">Royce Cano</span><i></i></a>
      <ul class="dropdown-menu pull-right">
        <li><a href="<?php echo 
						//getURL(array('my-accoutn')); 
						getURL(array('index'));
						?>" class="glyphicons cogwheel">Settings<i></i></a></li>
        <li><a href="<?php echo 
						//getURL(array('my_account'));
						getURL(array('index')); 
						?>" class="glyphicons camera">My Photos<i></i></a></li>
        <li class="highlight profile"> <span> <span class="heading">Profile <a href="<?php echo 
								//getURL(array('my_account'));
								getURL(array('index')); 
								?>" class="pull-right">edit</a></span> <span class="img"></span> <span class="details"> <a href="<?php echo 
									//getURL(array('my_account'));
									getURL(array('index')); 
									?>">Fluorish</a> royce@fluorish.com </span> <span class="clearfix"></span> </span> </li>
        <li> <span> <a class="btn btn-default btn-small pull-right" style="padding: 2px 10px; background: #fff;" href="<?php echo 
								//getURL(array('login'));
								getURL(array('index')); 
								?>">Sign Out</a> </span> </li>
      </ul>
      <?php endif; ?>
    </li>
  </ul>
  <?php endif; ?>
</div>
<?php if ($page != 'login' && $page != 'documentation' && $page != 'error'): ?>
<?php if ($page != 'landing_page'): ?>
<!-- -->

<!-- -->
<div id="header_wrapper">
	<div class="row-fluid">
    	<div class="span3" style="margin-left:20px; margin-bottom:10px; margin-top:10px">
        <img alt="Banner" src="../assets/images/dl_pb.png">
        </div>
        <div class="span2 pull-right" style="margin-bottom:10px; margin-top:10px">
        <ul class="">
			<li class="glyphicons user_add"><a href="#"><span data-toggle="tab" data-target="#tab1-3"><i></i></span></a></li>
			<li class="glyphicons shopping_cart"><a href="#"><span data-toggle="tab" data-target="#tab2-3"><i></i></span></a></li>
			<li class="glyphicons envelope"><a href="#"><span data-toggle="tab" data-target="#tab3-3"><i></i></span></a></li>
		</ul>
        </div>
		<div class="clearfix"></div>
    </div>
</div>
<div id="wrapper">
<div id="menu" class="hidden-phone">
  <div id="menuInner"> 
    
    <!-- Scrollable menu wrapper with Maximum height -->
    <div class="slim-scroll" data-scroll-height="420px">
      <div id="search">
        <input type="text" placeholder="Quick search ..." />
        <button class="glyphicons search"><i></i></button>
      </div>
      <ul>
        <li class="heading"><span>Optional Menu</span></li>
      </ul>
    </div>
  </div>
  <!-- // Nice Scroll Wrapper END --> 
  
</div>
<?php endif; ?>
<div id="content">
<div class="widget widget-tabs widget-tabs-double-2">
  <div class="widget-head flnav" id="flnav">
    <ul>
      <li class="active"><a href="#my_fluorish" data-toggle="tab" class="glyphicons myfluorish"><i></i>My Fluorish</a></li>
      <li><a href="#cores_instruments" data-toggle="tab" class="glyphicons core"><i></i>Cores and Instruments</a></li>
      <li><a href="#labs_inventory" data-toggle="tab" class="glyphicons lab"><i></i>Labs and Inventory</a></li>
      <li><a href="#panels" data-toggle="tab" class="glyphicons pb"><i></i>Panels</a></li>
    </ul>
  </div>
  <div class="widget-body">
    <div class="tab-content"> 
      
      <!-- my_fluorish -->
      <div class="tab-pane active" id="my_fluorish">
      <ul class="breadcrumb">
          <li><a href="<?php echo getURL(array('dashboard')); ?>" class="glyphicons home"><i></i>All</a></li>
          <li class="divider"></li>
          <li><a href="#" class=""><i></i>Lab1</a></li>
          <li class="divider"></li>
          <li><a href="#" class=""><i></i>Lab1</a></li>
          <li class="divider"></li>
          <li><a href="#" class=""><i></i>Core1</a></li>
          <li class="divider"></li>
          <li><a href="#" class=""><i></i>Core2</a></li>
          <li class="divider"></li>
          <li><a href="#" class=""><i></i>Core3</a></li>
        </ul>
      </div>
      <!-- my_fluorish END --> 
      
      <!-- cores_instruments -->
      <div class="tab-pane" id="cores_instruments">
      <ul class="breadcrumb">
          <li><a href="<?php echo getURL(array('dashboard')); ?>" class="glyphicons home"><i></i>Cores and Instruments</a></li>
          <li class="divider"></li>
          <li><a href="#" class=""><i></i>All</a></li>
          <li class="divider"></li>
          <li><a href="#" class=""><i></i>My Cytometers</a></li>
          <li class="divider"></li>
          <li><a href="#" class=""><i></i>Core 1</a></li>
          <li class="divider"></li>
          <li><a href="#" class=""><i></i>Core 2</a></li>
          <li class="divider"></li>
          <li><a href="#" class=""><i></i>Manage Core Membership</a></li>
        </ul> 
      </div>
      <!-- cores_instruments END --> 
      
      <!-- labs_inventory -->
      <div class="tab-pane" id="labs_inventory">
      <ul class="breadcrumb">
          <li><a href="<?php echo getURL(array('index')); ?>" class="glyphicons home"><i></i>Labs and Inventory</a></li>
          <li class="divider"></li>
          <li><a href="#" class=""><i></i>All</a></li>
          <li class="divider"></li>
          <li><a href="#" class=""><i></i>Lab 1</a></li>
          <li class="divider"></li>
          <li><a href="#" class=""><i></i>Lab 2</a></li>
          <li class="divider"></li>
          <li><a href="#" class=""><i></i>Manage Lab Membership</a></li>
        </ul> 
      </div>
      <!-- labs_inventory END --> 
      
      <!-- panels -->
      <div class="tab-pane" id="panels">
      <ul class="breadcrumb">
          <li><a href="<?php echo getURL(array('index')); ?>" class="glyphicons "><i></i>My Panels</a></li>
          <li class="divider"></li>
          <li><a href="<?php echo getURL(array('messages')); ?>" class=""><i></i>New Panels</a></li>
        </ul> 
      </div>
      <!-- panels END --> 
      
      <!-- search_products -->
      <div class="tab-pane" id="search_products">
      <ul class="breadcrumb">
          <li><a href="<?php echo getURL(array('index')); ?>" class="glyphicons "><i></i>All Products</a></li>
          <li class="divider"></li>
          <li><a href="<?php echo getURL(array('messages')); ?>" class=""><i></i>Reagents</a></li>
          <li class="divider"></li>
          <li><a href="<?php echo getURL(array('messages')); ?>" class=""><i></i>Saved Search's</a></li>
        </ul> </div>
      <!-- search_products END --> 
      
    </div>
  </div>
</div>
<!-- --> 
<?php endif; ?>
