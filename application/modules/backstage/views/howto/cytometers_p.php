<style>
	textarea
	{
		width:100%;
		height:200px;
	}
	
	body
	{
		background-color:black;
	}
</style>
<div class="container-fluid">
	<div class="row-fluid">
		<div class="well span12" >
			<h3>this is backstage/views/howto/cytometers_p.php</h3>


		</div>
	</div><!-- end .row-fluid -->
	


	<div class="row-fluid" >

<!-- the left-hand menu -->
		<div class="well span2" id="leftmenu" >
			<?=$this->load->view('menu_p');?>
<!--			<div>
				<h4>howto pages</h4>
				<a href="<?=base_url()?>backstage/howto/addresses">addresses</a><br/>
				<a href="<?=base_url()?>backstage/howto/cytometers">cytometers</a><br/>
				<a href="<?=base_url()?>backstage/howto/groups">groups</a><br/>
				<a href="<?=base_url()?>backstage/howto/inventory">inventory</a><br/>
				<a href="<?=base_url()?>backstage/howto/panels">panels</a><br/>
				<a href="<?=base_url()?>backstage/howto/users">users</a><br/>
			</div>
			<hr/>
			<div>
				<h4>data about cytometers</h4>
				<a href="#xml">get cytometer xml</a><br/>
				<a href="#array">get cytometer array</a><br/>
				<br/>
				<h4>partials about cytometers:</h4>
				<a href="#display">display a cytometer</a><br/>
				<a href="#edit">edit a cytometer</a><br/>
			
			</div>
-->		</div>
		
		

		<div class="span10">
<!-- XML -->
			<div class="row-fluid">					
				<div class="span12 well" id="xml" >
				<h3>get_xml()</h3>
				<table class="table table-bordered">
					<tr><td><strong>function:</strong></td><td>get_xml($userid)</td></tr>
					<tr><td><strong>parameter</strong></td><td>(int)</td><td>$userid</td></tr>
					<tr><td><strong>returns:</strong></td><td>(string)</td><td> an XML string of data for the user specified by the $userid parameter <br/> (shown here print_r() -ed  within a &lt;textarea&gt; for viewing convenience)</td></tr>
				</table>
					<textarea><?=$xml?></textarea>
				</div>			
			</div>
		
<!-- ARRAY -->
			<div class="row-fluid">
				<div class="span12 well" id="array" >
				<h3>get_array()</h3>
				<table class="table table-bordered">
					<tr><td><strong>function:</strong></td><td>get_xml($userid)</td></tr>
					<tr><td><strong>parameter</strong></td><td>(int)</td><td>$userid</td></tr>
					<tr><td><strong>returns:</strong></td><td>(string)</td><td> an XML string of data for the user specified by the $userid parameter <br/> (shown here print_r() -ed  within a &lt;textarea&gt; for viewing convenience)</td></tr>
				</table>
					<textarea><?=print_r($array, true)?></textarea>
				</div>			
			</div>
			
		
<!-- EDIT -->	
			<div class="row-fluid">
				<div class="span12 well" >
					<h3 id="edit">edit($cytometer_id)</h3>
						
						<table class="table table-bordered">
							<tr><td><strong>function:</strong></td>		<td>edit($cytometer_id)</td></tr>
							<tr><td><strong>parameter</strong></td>		<td>(int) - optional</td><td>$userid</td></tr>
							<tr><td><strong>returns:</strong></td>		<td>(string)</td><td> an XML string of data for the user specified by the $userid parameter <br/> (shown here print_r() -ed  within a &lt;textarea&gt; for viewing convenience)</td></tr>
							<tr><td>In the controller:</td>				<td><strong>load the module:</strong><br/> $cytometer_module = $this->load->module('cytometers');<br/><br/><strong>load the form:</strong><br/>$data['new'] = $cytometer_module->edit();<br/>or<br/>$data['edit'] = $cytometer_module->edit($cytometer_id); </td></tr>
							<tr><td>In the view:</td>					<td>&lt;div&gt;&lt;?=$new ?&gt;&lt;/div&gt;<br/>or<br/>&lt;div&gt;&lt;?=$edit ?&gt;&lt;/div&gt;</td></tr>
							<tr><td colspan="3">When cytometers/edit is called without the parameter, the return string is of an empty form for creating a new cytometer configuration. When the parameter is included, the same form is populated with that configuration's resource_id </td></tr>
						</table>
						
						
						<div class="span11" id="new" style="border:solid green 5px;">
							<?=$new?>
						</div>
		<!--			
					<div class="row-fluid"></div>
		-->				<div class="span11" id="edit" style="border:solid green 5px;">
							<?=$edit?>
						</div>
					
				</div>
			</div><!-- end .row-fluid -->
	
	
<!-- DISPLAY -->
	
	
			<div class="row-fluid">
				<div class="span12 well" id="display" >
					<h3 id="display">display()</h3>
					
					<table class="table table-bordered">
						<tr><td><strong>function:</strong></td>				<td>get_xml($userid)</td></tr>
						<tr><td><strong>parameter</strong></td>				<td>(int)</td><td>$userid</td></tr>
						<tr><td><strong>returns:</strong></td>				<td>(string)</td><td> an XML string of data for the user specified by the $userid parameter <br/> (shown here print_r() -ed  within a &lt;textarea&gt; for viewing convenience)</td></tr>
						<tr><td><strong>In the controller:</strong></td>	<td colspan="2">$data['display'] = $cytometer_module->display($cytometer_id); </td></tr>
						<tr><td><strong>In the view:</strong></td>			<td colspan="2">&lt;div&gt;&lt;?=$display ?&gt;&lt;/div&gt;</td></tr>
						<tr><td colspan="3">This function returns a text string containing the html of two &lt;div&gt;s:<br/>
						 The outer <span style="color:red">(id="cytometer_19" class="cytometerConfigDiv_19")</span> holds the configuration's name, a picture of that model (if we have one on file), and the manufacturer's name and its model name.<br/>
						 The other <span style="color:green">(id="laser_details_19" class="laserConfigDiv well")</span> displays laser and detector details</td></tr>
					</table>
					
					<style>
						#cytometer_19{border:solid red 2px; }
						#laser_details_19{border:solid green 2px; }
						
					</style>
					<div style="well border:solid 2px green;">
						<?=$display?>
					</div>
				</div>			
			</div>
		</div>
		
		
		
	</div><!-- end .row-fluid -->
		
		
		
		
		
</div><!-- end .container-fluid -->
