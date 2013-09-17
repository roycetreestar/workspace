<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
<meta charset="utf-8" />
<title></title>
<meta content="width=device-width, initial-scale=1.0" name="viewport" />
<meta content="" name="description" />
<meta content="" name="author" />
<!-- BEGIN GLOBAL MANDATORY STYLES -->
<link href="common/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
<link href="common/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" type="text/css"/>
<link href="../m/admin/template_content/assets/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
<link href="../m/admin/template_content/assets/css/style-responsive.css" rel="stylesheet" type="text/css"/>
<link href="../m/admin/template_content/assets/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css"/>
<!-- END GLOBAL MANDATORY STYLES -->
<!-- BEGIN PAGE LEVEL STYLES -->
<!-- BEGIN PLUGINS USED BY X-EDITABLE -->
<link rel="stylesheet" type="text/css" href="../m/admin/template_content/assets/plugins/select2/select2_metro.css" />
<link rel="stylesheet" type="text/css" href="../m/admin/template_content/assets/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.css" />
<link rel="stylesheet" type="text/css" href="../m/admin/template_content/assets/plugins/bootstrap-datepicker/css/datepicker.css" />
<link rel="stylesheet" type="text/css" href="../m/admin/template_content/assets/plugins/bootstrap-timepicker/compiled/timepicker.css" />
<link rel="stylesheet" type="text/css" href="../m/admin/template_content/assets/plugins/bootstrap-datetimepicker/css/datetimepicker.css" />
<!-- END PLUGINS USED BY X-EDITABLE -->
<!-- BEGIN X-EDITABLE PLUGIN-->
<link rel="stylesheet" type="text/css" href="../m/admin/template_content/assets/plugins/bootstrap-editable/bootstrap-editable/css/bootstrap-editable.css"/>
<link rel="stylesheet" type="text/css" href="../m/admin/template_content/assets/plugins/bootstrap-editable/inputs-ext/address/address.css"/>
<!-- END X-EDITABLE PLUGIN-->
<!-- END PAGE LEVEL STYLES -->

<!-- JQueryUI v1.9.2 -->
<link rel="stylesheet" href="common/theme/scripts/plugins/system/jquery-ui-1.9.2.custom/css/smoothness/jquery-ui-1.9.2.custom.min.css" />
<!-- Icons -->
<link rel="stylesheet" href="common/theme/css/icons.css" />
<link rel="stylesheet" href="common/theme/css/fluorish_icons.css" />
<!-- Uniform -->
<link rel="stylesheet" media="screen" href="common/theme/scripts/plugins/forms/pixelmatrix-uniform/css/uniform.default.css" />
<!-- google-code-prettify -->
<link href="common/theme/scripts/plugins/other/google-code-prettify/prettify.css" type="text/css" rel="stylesheet" />

<!-- DataTables -->
<link rel="stylesheet" media="screen" href="common/theme/scripts/plugins/tables/DataTables/media/css/DT_bootstrap.css" />
<link rel="stylesheet" media="screen" href="common/theme/scripts/plugins/tables/DataTables/extras/TableTools/media/css/TableTools.css" />

<!-- JQuery v1.8.2 -->
<script src="common/theme/scripts/plugins/system/jquery-1.8.2.min.js"></script>

<!-- Modernizr -->
<script src="common/theme/scripts/plugins/system/modernizr.custom.76094.js"></script>

<!-- Theme -->
<link rel="stylesheet/less" href="common/theme/less/style.less?<?php echo time(0); ?>" />
<!-- Skin 
<link rel="stylesheet/less" href="common/theme/skins/less/style.less?<?php echo time(0); ?>" />	
<script src="common/theme/scripts/plugins/system/less-1.3.3.min.js"></script>
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body class="container-fluid menu-hidden fixed">
<div class="navbar main hidden-print"> <a class="appbrand" href="index.php?lang=en&amp;page=dashboard"></a> 
  <!--<button type="button" class="btn btn-navbar"> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>-->
  <ul class="topnav pull-right">
    <li><a href=""><span class=""><img width="175" height="40" src="assets/images/dl.png"></span></a></li>
    <li><a href="">Send Invites</a></li>
    <li><a href="">Contact</a></li>
    <li class="account"> <a class="glyphicons logout lock" href="index.php?lang=en&amp;page=dashboard" data-toggle="dropdown"><span class="hidden-phone text">Royce Cano</span><i></i></a>
      <ul class="dropdown-menu pull-right">
        <li><a class="glyphicons cogwheel" href="index.php?lang=en&amp;page=dashboard">Settings<i></i></a></li>
        <li><a class="glyphicons cogwheel" href="index.php?lang=en&amp;page=core_membership">Core Membership<i></i></a></li>
        <li><a class="glyphicons cogwheel" href="index.php?lang=en&amp;page=lab_membership">Lab Membership<i></i></a></li>
        <li class="highlight profile"> <span> <span class="heading">Profile <a class="pull-right" href="index.php?lang=en&amp;page=dashboard">edit</a></span> <span class="img"></span> <span class="details"> <a href="index.php?lang=en&amp;page=dashboard">Fluorish</a> royce@fluorish.com </span> <span class="clearfix"></span> </span> </li>
        <li> <span> <a href="index.php?lang=en&amp;page=dashboard" style="padding: 2px 10px; background: #fff;" class="btn btn-default btn-small pull-right">Sign Out</a> </span> </li>
      </ul>
    </li>
  </ul>
</div>


<div class="wrapper">
  <div class="content"> 
    	<div><textarea id="console" rows="8" style="width: 150px; height: 50px" class="m-wrap"></textarea></div>
        
    <!-- -->
    <ul class="breadcrumb">
    </ul>
    <div class="separator bottom"></div>
    <div class="heading-buttons">
      <h3 class="glyphicons ">Inventory Manager</h3>
      <div class="buttons pull-right"> <a href="" class="btn btn-default btn-icon glyphicons inbox"><i></i> Inventory Settings</a> </div>
      <div class="clearfix"></div>
      <form class="form-inline" style="margin:0px">
          <label>
            <input type="checkbox" id="autoopen">
            &nbsp;Auto-open next field</label>
          <label>
            <input type="checkbox" id="inline">
            &nbsp;Inline editing</label>
          <button id="enable" class="btn blue">Enable / Disable</button>
        </form>
    </div>
    <div class="separator bottom"></div>
    <!-- --> 
    
    
    <div class="filter-bar filter-bar-2">
        <form>
            <div class="lbl glyphicons cogwheel"><i></i>Filter</div>
            <div>
                
                <select name="from" style="width: 200px;">
                <option>Target (Specificity)</option>
                <option>CD3</option>
                <option>CD5</option>
                </select>
            </div>
            <div>
                <select name="from" style="width: 80px;">
                <option>Equals</option>
                <option>Contains</option>
                <option>'>'</option>
                <option>'<'</option>
                </select>
            </div>
            <div>
                <label></label>
                <div class="input-append">
                    <input type="text" name="from" class="input-mini" style="width: 30px;" value="" />
                    <span class="add-on glyphicons"></span>
                </div>
            </div>
            <div>
                
            </div>
            <div>
            <label></label>
                <a href="" class="btn btn-default">Reagent List</a>
            </div>
            <div>
                <label></label>
                <a href="" class="btn btn-default">Show All</a>
            </div>
            <div class="clearfix"></div>
        </form>
    </div>

    
    <!-- BEGIN AJAX INVENTORY CONTENT-->
    <table id="user" class="table table-bordered table-condensed table-striped table-vertical-center checkboxs js-table-sortable table-thead-simple table-thead-border-none ui-sortable" style="font-size:8pt;">
          <thead>
            <tr>
              <th class="center">Target</th>
              <th class="center">Format</th>
              <th class="center">Clone</th>
              <th class="center">Target_Species</th>
              <th class="center">Company</th>
              <th class="center">Product #</th>
              <th class="center">Amount</th>
              <th class="center">Category</th>
              <th class="center">Description</th>
              <th class="center">Location</th>
              <th class="center">Date</th>
              <th class="center">Action</th>
            </tr>
          </thead>
          <tbody>
            <tr class="ajax-demo">
              <td><a href="#" id="target" data-type="select2" data-pk="1" data-value="0" data-original-title="Select Target"></a></td>
              <td><a href="#" id="format" data-type="select2" data-pk="1" data-value="0" data-original-title="Select Format"></a></td>
              <td><a href="#" id="clone" data-type="select2" data-pk="1" data-value="0" data-original-title="Select Clone"></a></td>
              <td><a href="#" id="target_specie" data-type="select2" data-pk="1" data-value="0" data-original-title="Select Target Specie"></a></td>
              <td><a href="#" id="manufacture" data-type="select2" data-pk="1" data-value="0" data-original-title="Select Manufacture"></a></td>
              <td><a href="#" id="product_id" data-type="select2" data-pk="1" data-value="0" data-original-title="Select Product Id"></a></td>
              <td><a href="#" id="amount" data-type="text" data-pk="1" data-original-title="Enter Amount">450</a> <span>(ul)</span></td>
              <td><a href="#" id="category" data-type="select2" data-pk="1" data-value="0" data-original-title="Select Category"></a></td>
              <td><div id="note" data-pk="1" data-type="wysihtml5" data-toggle="manual" data-original-title="Enter notes">Some notes will accept<a href="#" id="pencil"><i class="icon-pencil"></i></a></div></td>
              <td><a href="#" id="location" data-type="text" data-pk="1" data-original-title="Enter Location">Fridge #2</a></td>
              <td><a href="#" id="dob" data-type="combodate" data-value="2012-05-15" data-format="YYYY-MM-DD" data-viewformat="DD/MM/YYYY" data-template="D / MMM / YYYY" data-pk="1"  data-original-title="Select Date"></a></td>
              <td><a href="#" class="btn-action glyphicons remove_2 btn-danger"><i></i> &nbsp; x &nbsp; </a>&nbsp; | &nbsp; <a href="#" class="btn-action glyphicons pencil btn-success"><i></i> &nbsp; + &nbsp; </a></td>
            </tr>
          </tbody>
        </table>
    <!-- END  AJAX INVENTORY CONTENT--> 
    
  
    
  
  <!-- END PAGE CONTAINER--> 
</div>
<!-- END PAGE -->
</div>
<!-- END CONTAINER --> 
<script src="../m/admin/template_content/assets/plugins/jquery-1.10.1.min.js" type="text/javascript"></script> 
<script src="../m/admin/template_content/assets/plugins/jquery-migrate-1.2.1.min.js" type="text/javascript"></script> 
<script src="../m/admin/template_content/assets/plugins/jquery-ui/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script> 
<script src="../m/admin/template_content/assets/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script> 
<script src="../m/admin/template_content/assets/plugins/bootstrap-hover-dropdown/twitter-bootstrap-hover-dropdown.min.js" type="text/javascript" ></script> 
<!--[if lt IE 9]>
	<script src="assets/plugins/excanvas.min.js"></script>
	<script src="assets/plugins/respond.min.js"></script>  
	<![endif]--> 
<script src="../m/admin/template_content/assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script> 
<script src="../m/admin/template_content/assets/plugins/jquery.blockui.min.js" type="text/javascript"></script> 
<script src="../m/admin/template_content/assets/plugins/jquery.cookie.min.js" type="text/javascript"></script> 
<script src="../m/admin/template_content/assets/plugins/uniform/jquery.uniform.min.js" type="text/javascript" ></script> 
<script type="text/javascript" src="../m/admin/template_content/assets/plugins/select2/select2.min.js"></script> 
<script type="text/javascript" src="../m/admin/template_content/assets/plugins/bootstrap-wysihtml5/wysihtml5-0.3.0.js"></script> 
<script type="text/javascript" src="../m/admin/template_content/assets/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.js"></script> 
<script type="text/javascript" src="../m/admin/template_content/assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script> 
<script type="text/javascript" src="../m/admin/template_content/assets/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js"></script> 
<script type="text/javascript" src="../m/admin/template_content/assets/plugins/moment.min.js"></script> 
<script type="text/javascript" src="../m/admin/template_content/assets/plugins/jquery.mockjax.js"></script> 
<script type="text/javascript" src="../m/admin/template_content/assets/plugins/bootstrap-editable/bootstrap-editable/js/bootstrap-editable.min.js"></script> 
<script type="text/javascript" src="../m/admin/template_content/assets/plugins/bootstrap-editable/inputs-ext/address/address.js"></script> 
<script type="text/javascript" src="../m/admin/template_content/assets/plugins/bootstrap-editable/inputs-ext/wysihtml5/wysihtml5.js"></script> 
<script src="../m/admin/template_content/assets/scripts/app.js"></script> 
<script src="common/theme/scripts/form-editable.js"></script> 
<script>
		jQuery(document).ready(function() {
		// initiate layout and plugins
		App.init();
		FormEditable.init();
		});
	</script> 
<!-- END PAGE LEVEL SCRIPTS -->
</body>
<!-- END BODY -->
</html>