<div id="tabAll" class="tab-pane active">
  <div class="accordion accordion-2" id="accordion-1">
    <div class="accordion-group">
      <div class="accordion-heading dashboard">
        <div class="row-fluid accordion-header">
          <div class="span8 group-title"> 
          <!-- insert -->
          <a class="accordion-toggle glyphicons type-<?php echo $grouptype ?>" data-toggle="collapse" data-parent="#accordion" href="#group-<?php echo $groupid ?>"><i></i>
            <h3> <?php echo $groupname ?><span> <?php echo $username ?></span></h3>
            </a> 
            
            </div>
          <div class="span4 right">
          <!-- -- Insert Icons -->
          <?php echo $icons ?>
          </div>
        </div>
      </div>
      <div class="row-fluid accordion-toggle">
        <div class="span2 offset10 right"> <span class="pull-right"> <a class="accordion-toggle" id="toggle-<?php echo $groupid ?>" data-toggle="collapse" data-parent="#group-<?php echo $groupid ?>" href="#group-<?php echo $groupid ?>"><i id="" class="icon icon-chevron-down"></i> Details</span></a> 
        </div>
      </div>
      <div id="group-<?php echo $groupid ?>" class="accordion-body <?php echo($grouptype == 3)?'in':'' ?> collapse">
        <div class="accordion-inner"> 
          <!-- -->
          <div class="row-fluid"> 
            <!-- Dashboard Group Information Left -->
            <div class="span3 center" style="width:17.077%"> 
            <?php echo $myimage ?>
              <div class="separator bottom"></div>
              <address class="margin-none">
              <?php echo $display ?>
              </address>
              <div class="clearfix separator bottom"></div>
            </div>
            <!-- // Dashboard Group Information Left End --> 
            <!-- Dashboard Group Information Right -->
             <div class="span9">
			 <?php echo($grouptype == 3)?'
              <!-- // About END -->
              <div class="well margin-none" style="padding: 5px;">
                <strong>Recent Activity:</strong>
              </div>
              
              <h4 class="heading-arrow">Searches</h4>
              <div class="">
                <ul class="list-timeline">
                  <li> <span class="ellipsis"><a href="#">anti-Human CD3 FITC"</a></span>
                    <div class="clearfix"></div>
                  </li>
                  <li> <span class="ellipsis"><a href="#">anti-Human CD4 APC"</a></span>
                    <div class="clearfix"></div>
                  </li>
                  <li> <span class="ellipsis"><a href="#">anti-Human CD69 PE"</a></span>
                    <div class="clearfix"></div>
                  </li>
                  <li> <span class="ellipsis"><a href="#">anti-Human CD4 Pacific Blue"</a></span>
                    <div class="clearfix"></div>
                  </li>
                </ul>
                 </div>
                <h4 class="heading-arrow">Messages</h4>
              <div class="">
                <ul class="list-timeline">
                  <li> <span class="date">03/13</span><span class="ellipsis"><strong>  UCSF Flow Core</strong>: The LSRII MArs will be down until October 4th. please schedule the LSRII Jupiter for similar configurations.</span>
                    <div class="clearfix"></div>
                  </li>
                  <li> <span class="date">03/13</span><span class="ellipsis"><strong>  Ostaut Lab</strong>: Lab meeting has been moved to 10:00AM today.</span>
                    <div class="clearfix"></div>
                  </li>
                </ul>
                 </div>
              <!-- // About END --> 
            '
			:$group_resources.'<br>'.$group_data; ?>
            </div>
          </div>
          <!-- // Dashboard Group Information Right End--> 
          <!-- --> 
        </div>
      </div>
    </div>
  </div>
</div>
<div class="separator bottom"></div>
<div class="separator bottom"></div>
