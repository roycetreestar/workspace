<div class="separator bottom"></div>

<h3>Account Setup</h3>

<div class="innerLR">

	<!-- Account Setup / Fluorish Core Ticket #69 -->
	<div class="wizard" id="rootwizard">
	
		<!-- Account Setup heading -->
		<div class="wizard-head">
			<ul id="wiz">
				<li><a data-toggle="tab" href="#tab1">Step 1</a></li>
				<li><a data-toggle="tab" href="#tab2">Step 2</a></li>
				<li><a data-toggle="tab" href="#tab3">Step 3</a></li>
				<li><a data-toggle="tab" href="#tab4">Step 4</a></li>
				<li><a data-toggle="tab" href="#tab5">Final Core</a></li>
              	<li><a data-toggle="tab" href="#tab6">Final</a></li>
			</ul>
		</div>
		<!-- // Account Setup END -->
		
		<div class="widget widget-2">
		
			<!-- Account Setup Progress bar -->
            <div id="bar" class="widget-head progress progress-primary margin-none">
				<div class="bar">Step <strong class="step-current">1</strong> of <strong class="steps-total">3</strong> </div>
			</div>
			<!-- // Account Setup Progress bar END -->
			 
			<script>
			$(document).ready(function(){
			 
			  $("a.core-manage").click(function(){
				$("#core-manage").load("pages/my_account.php #core-details");
			  });
			  
			  $("a.core-join").click(function(){
				$("#core-join").load("pages/core_membership.php #core-join");
			  });
			  
			  $("a.lab-manage").click(function(){
				  $("#lab-manage").load("pages/my_account.php #lab-details");
				  $("#lab-order").show("display", "block");
			   });
			   
			 $("a.lab-order").click(function(){
				 alert('This Feature is Coming Soon');
				 });
			   
			  $("a.lab-join").click(function(){
				$("#lab-join").load("pages/lab_membership.php #lab-join");
			  });
			 
			 
			});
           </script>
                    
           <div class="widget-body">
				<div class="tab-content">
				
					<!-- Step 1 -->
					<div class="tab-pane active" id="tab1">
					<div class="row-fluid">
                    
                        <div id="core-manage">
							<div class="span12">
								<h4>Would you like to set up a Fluorish Core?</h4>
                            	    <p><strong>Fluorish Cores</strong> provide and share instrument configurations for the users to access in the Panel Builder. Setting up a Fluorish Core is typically done <strong>ONLY</strong> by members affiliated with a physical core facility at an institution.</p>
<p>However, there are some labs with their own instruments that create a Fluorish Core.</p>
							</div>
							<div class="span12">
                            <a href="#" class="btn btn-primary core-manage">Create a Fluorish Core</a>
                            <a href="javascript:;" class="next primary btn btn-primary">Skip this Step</a>
								<div class="separator"></div>
							</div>
						</div>
                        
                        </div>
					</div>
					<!-- // Step 1 END -->
						
					<!-- Step 2 -->
					<div class="tab-pane" id="tab2">
						<div class="row-fluid">
                        
                        <div id="core-join">
							<div class="span12">
								<h4>Join a Fluorish Core?</h4>
                                <p>Joining a <strong>Fluorish Core</strong> will provide you access to all of the instrument resources of that core within the Fluorish website and in the Panel Builder.<br>
All the cores available at your institution are listed below. Please select a core (or cores) to join and press continue.<br>
If you cannot find your core, you can try clicking the "Core Not Listed" button. If you still can't find it, you can send an Email to your facility requesting they set up their Fluorish Core</p>
							</div>
							<div class="span12">
                            <a href="#" class="btn btn-primary">Email your Core</a>
                            <a href="#" class="btn btn-primary core-join">Yes</a>
                            <a href="javascript:;" class="next primary btn btn-primary">Skip this Step</a>
								<div class="separator"></div>
							</div>
                        </div>
                            
						</div>
					</div>
					<!-- // Step 2 END -->
					
					<!-- Step 3 -->
					<div class="tab-pane" id="tab3">
						<div class="row-fluid">
                        
                        <div id="lab-manage">
							<div class="span12">
								<h4>Would you like to set up a Fluorish Lab?</h4>
                                <p><strong>Fluorish Labs</strong> allow lab managers to control inventory access and ordering settings for all of their lab members. Reagents can be listed within the Fluorish inventory, usage can be tracked, and items can be reordered quickly. In addition, the items entered into the Fluorish Lab are available in the Panel Builder..</p>
							</div>
							<div class="span12">
                            <a href="#" class="btn btn-primary lab-manage">Create a Fluorish Lab</a>
                            <a href="javascript:;" class="next primary btn btn-primary">Skip this Step</a>
								<div class="separator"></div>
							</div>
                         </div>
                         
                         <div id="lab-order" style="display:none">
							<div class="span12">
								<h4>Lab Ordering Sets (<span style="color:#F00">Coming Soon</span>)</h4>
                                <p><strong>Fluorish Labs</strong> provides ordering sets for their lab members to quickly access addresses and vendor account numbers. These will ensure proper discounts are applied to requested items and orders can be processed quickly and efficiently. Please provide the information for the lab using the fields below. You can add these later or modify them in the ordering preferences of your account settings.</p>
							</div>
							<div class="span12">
                            <a href="#" class="next primary btn btn-primary lab-order">Save</a>
                            <a href="javascript:;" class="next primary btn btn-primary">Skip this Step</a>
								<div class="separator"></div>
							</div>
                         </div>
                            
						</div>
					</div>
					<!-- // Step 3 END -->
                  
                  
                 
                <!-- Step 4 -->
					<div class="tab-pane" id="tab4">
						<div class="row-fluid">
                        
                        <div id="lab-join">
							<div class="span12">
								<h4>Join a Fluorish Lab?</h4>
                                <p><strong>Fluorish Labs</strong> are crucial to the Fluorish experience. Lab members share and manage inventory, book time on lab equipment, and submit order requests to the lab manager.<br>
A list of labs available to join at your institution is presented below. Please select a lab (or labs) to join and press continue. If your lab is not listed, please send an email to the lab manager and ask that they create a Fluorish Lab. </p>
							</div>
							<div class="span12">
                            <a href="#" class="btn btn-primary">Email Lab Manager</a>
                            <a href="#" class="btn btn-primary lab-join">Yes</a>
                            <a href="javascript:;" class="next primary btn btn-primary">Finish</a>
								<div class="separator"></div>
							</div>
                         </div>
                            
						</div>
					</div>
					<!-- // Step 4 END -->
					
					<!-- Step 5 -->
					<div  class="tab-pane" id="tab5">
                    	<div class="row-fluid">
							<div class="span12">
								<h4>Upload Your Instruments</h4>
                                <p>As a <strong>Fluorish Core</strong> manager, you can upload your instrument configuration files for your users. Please click "Take me to my Core" below to begin uploading your configuration files for your instruments</p>
							</div>
							<div class="span9">
                            <a href="#" class="btn btn-primary">Take me to my Core</a>
                            <a href="#" class="btn btn-primary">Take me to Dashboard</a>
								<div class="separator"></div>
							</div>
						</div>
					</div>
					<!-- // Step 5 END -->
					
					<!-- Step 6 -->
					<div  class="tab-pane" id="tab6">
                    	<div class="row-fluid">
							<div class="span12">
								<h4>Time to Fluorish</h4>
                                <p>If you joined a<strong> Fluorish Core, </strong>you can view the instrument configuration files available in that core.<br>
                                If you joined a<strong> Fluorish Lab, </strong>you can view the lab inventory or upload new reagents (once access is confirmed by the lab manager).</p>
							</div>
							<div class="span9">
                            <a href="#" class="btn btn-primary">Take me to my Core</a>
                            <a href="#" class="btn btn-primary">Take me to my Lab</a>
                            <a href="#" class="btn btn-primary">Take me to my Dashboard</a>
								<div class="separator"></div>
							</div>
						</div>
					</div>
					<!-- // Step 6 END -->
					
				</div>
				
				<!-- Wizard pagination controls 
				<div class="pagination margin-bottom-none">
					<ul>
						<li class="primary previous first"><a href="javascript:;">First</a></li>
						<li class="primary previous"><a href="javascript:;">Previous</a></li>
						
					  	<li class="next primary"><a href="javascript:;">Next</a></li>
                        <li class="last primary"><a href="javascript:;">Last</a></li>
                        
						<li class="next finish primary" style="display:none;"><a href="<?php echo getURL(array('dashboard')); ?>">Finish</a></li>
					</ul>
				</div>
				 // Wizard pagination controls END -->
				
			</div>
		</div>
	</div>
	<!-- // Account Setup / Fluorish Core Ticket #69 -->
	
</div>