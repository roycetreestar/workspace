<?php
	//~ if ($group['permission'] == 0)
		//~ $permission = 'user';
	//~ else if ($group['permission'] == 1)
		//~ $permission = 'manager';
?>
<!-- Dashboard Expand Panels -->
<div class="innerLR">
<!-- group-1 -->
<div class="tab-pane active" id="tabAll">
  <div class="accordion accordion-2" id="accordion-1">
      <div class="accordion-group"> 
        <!-- widget header -->
        <div class="accordion-heading dashboard">
          <div class="row-fluid accordion-header">
            <div class="span8 group-title">
            	<a href="#group-<?=$group_id?>" data-parent="#accordion" data-toggle="collapse" class="accordion-toggle glyphicons group-type-<?=$group_type?>">
                <i></i><h3><?= $group_name?><span><?= $permission?></span></h3>
				</a>
           </div>
            <div class="span4 right group-resources">
              <?php if($p)
			  {
				  ?>
                  <a href="panels/list_view/<?=$group_id?>" class="btn-icon glyphicons cogwheel" data-toggle="tooltip" data-placement="top" data-original-title="Panels"> Panels <i></i> </a>
				  <?php
                  }
				  if($i)
				  {
					  ?>
                      <a href="inventory/list_view/<?=$group_id?>" class="btn-icon glyphicons stats" data-toggle="tooltip" data-placement="top" data-original-title="Inventory">Inventory<i></i></a>
					  <?php
                      }
					  if($c)
					  {
						  ?>
                          <a href="cytometers/list_view/<?=$group_id?>" class="btn-icon glyphicons cogwheel" data-toggle="tooltip" data-placement="top" data-original-title="Cytometers">Cytometers<i></i></a>
						  <?php
                          }
						  ?>
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
              <div class="span3 center well"><br>
                <?= $this->load->view('partials/group_data_p'); ?>
              </div>
              <!-- // Dashboard Group Information Left End --> 
              <!-- Dashboard Group Information Right -->
              <div class="span6 well">
                <?= $this->load->view('partials/group_additional_info_p'); ?>
              </div>
              <!-- // Dashboard Group Information Right End-->
              <div class="span3 well">
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
</div>
<!-- // End group-1 -->
</div>
<!-- // End Dashboard Expand Panels -->