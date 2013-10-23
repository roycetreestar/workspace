<?php
	//~ if ($group['permission'] == 0)
		//~ $permission = 'user';
	//~ else if ($group['permission'] == 1)
		//~ $permission = 'manager';
?>

<!-- group -->
<div class="tab-pane active" id="tabAll">
  <div class="accordion accordion-2" id="accordion-1">
      <div class="accordion-group"> 
        <!-- widget header -->
        <div class="accordion-heading dashboard">
          <div class="row-fluid accordion-header">
<div class="span8 group-title"><a class="accordion-toggle glyphicons type-<?=$group_type?>" data-toggle="collapse" data-parent="#accordion" href="#group-<?=$group_id?>"><i></i><h3><?= $group_name?><span><?= $permission?></span></h3>
				</a>
           </div>
           <div class="span4 right">
          <a data-original-title="Account Settings" data-placement="top" data-toggle="tooltip" class="icon-my-preferences" href="#"></a> 
          <?php if($p){ ?>
          <a data-original-title="Panels" data-placement="top" data-toggle="tooltip" class="icon-panels" href="panels/list_view/<?=$group_id?>"></a> 
          <?php } if($c) { ?>
          <a data-original-title="Cores and Instruments" data-placement="top" data-toggle="tooltip" class="icon-core" href="cytometers/list_view/<?=$group_id?>"></a> 
          <?php } if($i) { ?>
          <a data-original-title="Labs and Inventory" data-placement="top" data-toggle="tooltip" class="icon-lab" href="inventory/list_view/<?=$group_id?>"></a>
          <?php } ?> 
          <a data-original-title="Orders" data-placement="top" data-toggle="tooltip" class="icon-orders" href="#"></a> </div>
        </div>
        </div>
         </div>
        <div class="row-fluid accordion-toggle">
          <div class="span2 offset10 right">
          <span class="pull-right">
          <a href="#group-<?=$group_id?>" data-parent="#group-<?=$group_id?>" data-toggle="collapse" id="toggle-1" class="accordion-toggle"><i class="g1 icon-chevron-up"></i> Details</a>
          </span> 
            <!--<a href="#"><i class="g2"></i>Prefrences</span></a>
            <a href="#"><i class="g2"></i>Default<input type="checkbox" checked="checked" value="1" class="checkbox" style="opacity: 0;"></span></a>--> 
          </div>
        </div>
        <!-- // end widget header --> 
        <!-- start openable/closable content container -->
        <div class="accordion-body collapse" id="group-<?=$group_id?>" >
          <div class="accordion-inner"> 
            <!-- -->
            <div class="row-fluid"> 
              <!-- Dashboard Group Information Left -->
              <div class="span3 center"><br>
                <?= $this->load->view('partials/group_data_p'); ?>
              </div>
              <!-- // Dashboard Group Information Left End --> 
              <!-- Dashboard Group Information Right -->
              <div class="span6">
                <?= $this->load->view('partials/group_additional_info_p'); ?>
              </div>
              <!-- // Dashboard Group Information Right End-->
              <div class="span3" style="margin-top:30px">
                <?php $this->load->view('membership/partials/group_resources_p');?>
              </div>
            </div>
            <!-- // end row --> 
            <!-- Dashboard Group Information Footer -->
            <div id="dash-footer" class="row-fluid">
              <div class="span12 center"> </div>
            </div>
            <!-- // End Dashboard Group Information Footer --> 
            <!-- // --> 
          </div>
        </div>
        <!-- // end openable/closable content container --> 
      </div>
    </div>
<!-- // End group -->
<div class="separator bottom"></div>
<div class="separator bottom"></div>