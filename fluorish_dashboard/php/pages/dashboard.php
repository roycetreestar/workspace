<?php 
if(isset($_GET["role"]) && trim($_GET["role"]) == 'manager'){
   $role = 'manager';
}
else 
if(isset($_GET["role"]) && trim($_GET["role"]) == 'user'){
	$role = 'user';
}
?>
<!-- START Global Account Section -->

<div class="separator bottom"></div>
<div class="heading-buttons">
  <div class="row-fluid">
    <div class="span7" id="dashboard-group-select">
      <h4 class="heading">Welcome Back</h4>
      <span> Viewing:</span> 
      <!-- --> 
      <a data-original-title="Select Group"  data-pk="1" data-type="select2" id="select-group" href="#" class="editable editable-click" style="background-color: transparent;" data-placement="bottom">Ostrat Lab, UCSF Flow Core</a> 
      <!-- -->
      <div class="clearfix" style="clear: both;"></div>
    </div>
    <div class="span5">
      <div class="buttons pull-right">
        <ul>
		<?php if ($role == 'manager'): ?>
          <li class="glyphicons notes_2"><a data-original-title="New Orders Request" data-placement="right" data-toggle="tooltip" href="#"><span data-toggle="tab" data-target="#tab1-3"><i></i></span></a></li>
          <span class="badge">6</span>
          <li class="glyphicons user_add"><a data-original-title="Join Requests" data-placement="right" data-toggle="tooltip" href="#"><span data-toggle="tab" data-target="#tab2-3"><i></i></span></a></li>
          <span class="badge">2</span>
          <?php endif; ?>
          <li class="glyphicons shopping_cart"><a data-original-title="Cart" data-placement="right" data-toggle="tooltip" href="#"><span data-toggle="tab" data-target="#tab3-3"><i></i></span></a></li>
          <span class="badge">4</span>
        </ul>
      </div>
      <div style="clear: both;" class="clearfix"></div>
    </div>
  </div>
</div>
<div class="separator bottom"></div>
<!-- END Global Account Section --> 
<!-- Dashboard Expand Panels -->
<div class="innerLR">
<?php if ($role == 'user'): ?>
<!-- mygroup-0 -->
<div id="tabAll" class="tab-pane active">
  <div class="accordion accordion-2" id="accordion-1">
    <div class="accordion-group">
      <div class="accordion-heading dashboard">
        <div class="row-fluid accordion-header">
          <div class="span8 group-title"> <a class="accordion-toggle glyphicons myfluorish" data-toggle="collapse" data-parent="#accordion" href="#group-0"><i></i>
            <h3> My Fluorish<span> Steve</span></h3>
            </a> </div>
          <div class="span4 right">
          <a data-original-title="Account Settings" data-placement="top" data-toggle="tooltip" class="icon-my-preferences" href="#"></a> 
          <a data-original-title="Panels" data-placement="top" data-toggle="tooltip" class="icon-panels" href="#"></a> 
          <a data-original-title="Cores and Instruments" data-placement="top" data-toggle="tooltip" class="icon-core" href="#"></a> 
          <a data-original-title="Labs and Inventory" data-placement="top" data-toggle="tooltip" class="icon-lab" href="#"></a> 
          <a data-original-title="Orders" data-placement="top" data-toggle="tooltip" class="icon-orders" href="#"></a> </div>
        </div>
      </div>
      <div class="row-fluid accordion-toggle">
        <div class="span2 offset10 right"> <span class="pull-right"> <a class="accordion-toggle" id="toggle-1" data-toggle="collapse" data-parent="#group-0" href="#group-0"><i id="" class="icon-chevron-down"></i> Details</span></a> 
          <!--<a href="#"><i class="g2"></i>preferences</span></a>
            <a href="#"><i class="g2"></i>Default<input type="checkbox" checked="checked" value="1" class="checkbox" style="opacity: 0;"></span></a>--> 
        </div>
      </div>
      <div id="group-0" class="accordion-body in collapse">
        <div class="accordion-inner"> 
          <!-- -->
          <div class="row-fluid"> 
            <!-- Dashboard Group Information Left -->
            <div class="span3 center" style="width:17.077%"> <img width="125" height="91" src="../assets/images/steve-o.jpg">
              <div class="separator bottom"></div>
              <address class="margin-none">
              <strong>1001 Potrero Avenue</strong><br>
              <strong>Building 100, Room 310</strong><br>
              San Francisco, CA 94110<br>
              <abbr title="Work email">e-mail:</abbr> <a href="mailto:#">info@mylab.com</a><br>
              <abbr title="Work Phone">phone:</abbr> (555) 345-9301<br>
              <abbr title="Work Fax">fax:</abbr> (555) 322-13201
              </address>
              <div class="clearfix separator bottom"></div>
            </div>
            <!-- // Dashboard Group Information Left End --> 
            <!-- Dashboard Group Information Right -->
            <div class="span9"> 
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
            </div>
          </div>
          <!-- // Dashboard Group Information Right End--> 
          <!-- --> 
        </div>
      </div>
    </div>
  </div>
</div>
<!-- // mygroup-0 -->
<?php endif; ?>
<?php if ($role == 'manager'): ?>
<!-- mygroup-0 -->
<div id="tabAll" class="tab-pane active">
  <div class="accordion accordion-2" id="accordion-1">
    <div class="accordion-group">
      <div class="accordion-heading dashboard">
        <div class="row-fluid accordion-header">
          <div class="span8 group-title"> <a class="accordion-toggle glyphicons myfluorish" data-toggle="collapse" data-parent="#accordion" href="#group-0"><i></i>
            <h3> My Fluorish<span> Johnny Knoxville</span></h3>
            </a> </div>
          <div class="span4 right">
          <a data-original-title="Account Settings" data-placement="top" data-toggle="tooltip" class="icon-my-preferences" href="#"></a> 
          <a data-original-title="Panels" data-placement="top" data-toggle="tooltip" class="icon-panels" href="#"></a> 
          <a data-original-title="Cores and Instruments" data-placement="top" data-toggle="tooltip" class="icon-core" href="#"></a> 
          <a data-original-title="Labs and Inventory" data-placement="top" data-toggle="tooltip" class="icon-lab" href="#"></a> 
          <a data-original-title="Orders" data-placement="top" data-toggle="tooltip" class="icon-orders" href="#"></a> </div>
        </div>
      </div>
      <div class="row-fluid accordion-toggle">
        <div class="span2 offset10 right"> <span class="pull-right"> <a class="accordion-toggle" id="toggle-1" data-toggle="collapse" data-parent="#group-0" href="#group-0"><i id="" class="icon icon-chevron-down"></i> Details</span></a> 
          <!--<a href="#"><i class="g2"></i>preferences</span></a>
            <a href="#"><i class="g2"></i>Default<input type="checkbox" checked="checked" value="1" class="checkbox" style="opacity: 0;"></span></a>--> 
        </div>
      </div>
      <div id="group-0" class="accordion-body in collapse">
        <div class="accordion-inner"> 
          <!-- -->
          <div class="row-fluid"> 
            <!-- Dashboard Group Information Left -->
            <div class="span3 center" style="width:17.077%"> <img width="125" height="91" src="../assets/images/johnny_knoxville.jpg">
              <div class="separator bottom"></div>
              <address class="margin-none">
              <strong>1001 Potrero Avenue</strong><br>
              <strong>Building 100, Room 310</strong><br>
              San Francisco, CA 94110<br>
              <abbr title="Work email">e-mail:</abbr> <a href="mailto:#">info@mylab.com</a><br>
              <abbr title="Work Phone">phone:</abbr> (555) 345-9301<br>
              <abbr title="Work Fax">fax:</abbr> (555) 322-13201
              </address>
              <div class="clearfix separator bottom"></div>
            </div>
            <!-- // Dashboard Group Information Left End --> 
            <!-- Dashboard Group Information Right -->
            <div class="span9"> 
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
            </div>
          </div>
          <!-- // Dashboard Group Information Right End--> 
          <!-- --> 
        </div>
      </div>
    </div>
  </div>
</div>
<!-- // mygroup-0 -->
<?php endif; ?>
<div class="separator bottom"></div>
<div class="separator bottom"></div>
<!-- group-1 -->
<div id="tabAll" class="tab-pane active">
  <div class="accordion accordion-2" id="accordion-1">
    <div class="accordion-group">
      <div class="accordion-heading dashboard">
        <div class="row-fluid accordion-header">
          <div class="span8 group-title"> <a class="accordion-toggle glyphicons lab" data-toggle="collapse" data-parent="#accordion" href="#group-1"><i></i>
            <h3> Ostarat Lab<span><?php if ($role == 'manager'): ?>Manager<?php endif; ?><?php if ($role == 'user'): ?>User<?php endif; ?></span></h3>
            </a> </div>
          <div class="span4 right">
          <?php if ($role == 'manager'): ?>
          <a data-original-title="Message Group" data-placement="top" data-toggle="tooltip" class="icon-messages" href="#"></a> 
          <a data-original-title="Preferences" data-placement="top" data-toggle="tooltip" class="icon-lab-preferences" href="#"></a> 
          <?php endif; ?>  
          </div>
        </div>
      </div>
      <div class="row-fluid accordion-toggle">
        <div class="span2 offset10 right"> <span class="pull-right"> <a class="accordion-toggle" id="toggle-1" data-toggle="collapse" data-parent="#group-1" href="#group-1"><i id="g-1" class="icon icon-chevron-down"></i> Details</span></a> 
          <!--<a href="#"><i class="g2"></i>preferences</span></a>
            <a href="#"><i class="g2"></i>Default<input type="checkbox" checked="checked" value="1" class="checkbox" style="opacity: 0;"></span></a>--> 
        </div>
      </div>
      <div id="group-1" class="accordion-body collapse">
        <div class="accordion-inner"> 
          <!-- -->
          <div class="row-fluid"> 
            <!-- Dashboard Group Information Left -->
            <div class="span3 center"><br />
              <img width="200" height="182" src="../assets/images/UCSF_logo.png">
              <div class="separator bottom"></div>
              <h4> Division of Experimental Medicine</h4>
              <address class="margin-none">
              <strong>1001 Potrero Avenue</strong><br>
              <strong>Building 100, Room 310</strong><br>
              San Francisco, CA 94110<br>
              <abbr title="Work email">e-mail:</abbr> <a href="mailto:#">info@mylab.com</a><br>
              <abbr title="Work Phone">phone:</abbr> (555) 345-9301<br>
              <abbr title="Work Fax">fax:</abbr> (555) 322-13201
              </address>
              <div class="clearfix separator bottom"></div>
            </div>
            <!-- // Dashboard Group Information Left End --> 
            <!-- Dashboard Group Information Right -->
            <div class="span9">
              <h4>Ostrat Lab Information</h4>
              <div class="menubar links primary">
                <ul>
                  <li>Website:</li>
                  <li><a href="#">cfar.ucsf.edu</a></li>
                  <li>Other:</li>
                  <li><a href="#">Immunology</a></li>
                </ul>
              </div>
              <p>About the Immunology Core</p>
              <p>The UCSF-GIVI CFAR Immunology Core provides sophisticated immunology assays and expert consultation and educational opportunities to the HIV research community, develops specialized immunology research tools, and initiates and stimulates innovative research projects that address emerging questions in HIV research.</p>
              <ul>
                <li>Laboratory Services<br>
                  The core provides state-of-the-art immune phenotype and function assay services in support of innovative translational studies to improve the prevention or management of HIV disease and its complication.</li>
                <li>Research<br>
                  The Immunology Core develops, validates, and applies innovative or specialized immunology assays which accelerate research in the prevention, treatment, and monitoring of HIV/AIDS.</li>
                <li>Education<br>
                  Core faculty train and mentor staff, students, fellows, and junior investigators in immunology research, to stimulate inclusion of immunology research in new studies through consultations and educational initiatives that inform the community of recent advances in HIV immunology, and to help community members to understand and interpret research findings.</li>
              </ul>
              <!-- // About END --> 
            </div>
          </div>
          <!-- // Dashboard Group Information Right End--> 
          <!-- Dashboard Group Information Footer -->
          <div class="row-fluid" id="dash-footer">
            <div class="span12 center"> </div>
            <!-- // Dashboard Group Information Footer End --> 
          </div>
          <!-- --> 
        </div>
      </div>
    </div>
  </div>
</div>
<!-- // group-1 -->
<div class="separator bottom"></div>
<div class="separator bottom"></div>
<!-- group-2 -->
<div id="tabAll" class="tab-pane active">
  <div class="accordion accordion-2" id="accordion-2">
    <div class="accordion-group">
      <div class="accordion-heading dashboard">
        <div class="row-fluid accordion-header">
          <div class="span8 group-title"> <a class="accordion-toggle glyphicons core" data-toggle="collapse" data-parent="#accordion" href="#group-2"><i></i>
            <h3> UCSF Core<span><?php if ($role == 'manager'): ?>Manager<?php endif; ?><?php if ($role == 'user'): ?>User<?php endif; ?></span></h3>
            </a> </div>
          <div class="span4 right">
		  <?php if ($role == 'manager'): ?>
          <a data-original-title="Message Group" data-placement="top" data-toggle="tooltip" class="icon-messages" href="#"></a> 
          <a data-original-title="Preferences" data-placement="top" data-toggle="tooltip" class="icon-core-preferences" href="#"></a> 
          <?php endif; ?>   
          </div>
        </div>
      </div>
      <div class="row-fluid accordion-toggle">
        <div class="span2 offset10 right"> <span class="pull-right"> <a class="accordion-toggle" id="toggle-1" data-toggle="collapse" data-parent="#group-2" href="#group-2"><i id="g-2" class="icon-chevron-down"></i> Details</span></a> </div>
      </div>
      <div id="group-2" class="accordion-body collapse">
        <div class="accordion-inner"> 
          <!-- -->
          <div class="row-fluid"> 
            <!-- Dashboard Group Information Left -->
            <div class="span3 center"> <br />
              <img width="200" height="182" src="../assets/images/UCSF_logo.png">
              <div class="separator bottom"></div>
              <h4> Division of Experimental Medicine</h4>
              <address class="margin-none">
              <strong>1001 Potrero Avenue</strong><br>
              <strong>Building 100, Room 310</strong><br>
              San Francisco, CA 94110<br>
              <abbr title="Work email">e-mail:</abbr> <a href="mailto:#">info@mylab.com</a><br>
              <abbr title="Work Phone">phone:</abbr> (555) 345-9301<br>
              <abbr title="Work Fax">fax:</abbr> (555) 322-13201
              </address>
              <div class="clearfix separator bottom"></div>
            </div>
            <!-- // Dashboard Group Information Left End --> 
            <!-- Dashboard Group Information Right -->
            <div class="span9">
              <h4>UCSF Core Information</h4>
              <div class="menubar links primary">
                <ul>
                  <li>Website:</li>
                  <li><a href="#">cfar.ucsf.edu</a></li>
                  <li>Other:</li>
                  <li><a href="#">Immunology</a></li>
                </ul>
              </div>
              <p>About the Immunology Core</p>
              <p>The UCSF-GIVI CFAR Immunology Core provides sophisticated immunology assays and expert consultation and educational opportunities to the HIV research community, develops specialized immunology research tools, and initiates and stimulates innovative research projects that address emerging questions in HIV research.</p>
              <ul>
                <li>Laboratory Services<br>
                  The core provides state-of-the-art immune phenotype and function assay services in support of innovative translational studies to improve the prevention or management of HIV disease and its complication.</li>
                <li>Research<br>
                  The Immunology Core develops, validates, and applies innovative or specialized immunology assays which accelerate research in the prevention, treatment, and monitoring of HIV/AIDS.</li>
                <li>Education<br>
                  Core faculty train and mentor staff, students, fellows, and junior investigators in immunology research, to stimulate inclusion of immunology research in new studies through consultations and educational initiatives that inform the community of recent advances in HIV immunology, and to help community members to understand and interpret research findings.</li>
              </ul>
              <!-- // About END --> 
            </div>
          </div>
          <!-- // Dashboard Group Information Right End--> 
          <!-- Dashboard Group Information Footer -->
          <div class="row-fluid" id="dash-footer">
            <div class="span12 center"> </div>
            <!-- // Dashboard Group Information Footer End --> 
          </div>
          <!-- --> 
        </div>
      </div>
    </div>
  </div>
</div>
<!-- // group-2 -->
<?php include("search.php") ?>
