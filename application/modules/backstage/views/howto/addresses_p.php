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
	<div class="row-fluid" >
		<div class=" well span12">
			<h3>Addresses</h3>
			this is backstage/views/howto/addresses_p.php
			The address module can be loaded with 
			<span class="code"><span style="color:red">$name_I_want_to_call_the_address_module_when_I_reference_it</span> = $this->load_module('addresses');</span><br/>
			<br/>
			If your controller extends MY_Controller or Loggedin_Controller, you can load all the modules by calling <br/>
			$this->load_modules();<br/>
			from your __construct() function. Then you need to reference the address module with<br/>
			"$this->address_module->function_name()"
		</div>

	</div>


<div class="row-fluid" >

<!-- the left-hand menu -->
		<div class="well span2" id="leftmenu" >
			<?=$this->load->view('menu_p');?>
		</div>

		<div class="span10 pageContent">

<!-- XML -->
			<div class="row-fluid">					
				<div class="span12 well" id="xml" >
				<h3>get_xml()</h3>
				<table class="table table-bordered">
					<tr><td><strong>function:</strong></td><td>get_xml($address_id)</td></tr>
					<tr><td><strong>parameter</strong></td><td>(int)</td><td>$address_id</td></tr>
					<tr><td><strong>returns:</strong></td><td>(string)</td><td> an XML string of data for the address specified by the $address_id parameter <br/> (shown here print_r() -ed  within a &lt;textarea&gt; for your viewing convenience)</td></tr>
				</table>
					<textarea><?=$xml?></textarea>
				</div>			
			</div>
		
<!-- ARRAY -->
			<div class="row-fluid">
				<div class="span12 well" id="array" >
				<h3>get_array()</h3>
				<table class="table table-bordered">
					<tr><td><strong>function:</strong></td><td>get_xml($address_id)</td></tr>
					<tr><td><strong>parameter</strong></td><td>(int)</td><td>$address_id</td></tr>
					<tr><td><strong>returns:</strong></td><td>(string)</td><td> a php array for the address specified by the $address_id parameter <br/> (shown here print_r() -ed  within a &lt;textarea&gt; for your viewing convenience)</td></tr>
				</table>
					<textarea><?=print_r($array, true)?></textarea>
				</div>			
			</div>
			
			
			
<!-- DISPLAY	-->	
			<div class="row-fluid">
				<div class="well span12">
					<h3 id="display">display an address</h3>
					addresses/views/partials/display_address_p
					
					<table class="table table-bordered">
						<tr><td><strong>function:</strong></td><td>edit($address_id)</td></tr>
						<tr><td><strong>parameter</strong></td><td>(int)</td><td>$address_id</td></tr>
						<tr><td><strong>returns:</strong></td><td>(string)</td><td> a string of HTML for the edit-address form</td></tr>
						<tr><td>In the controller:</td><td colspan="2">$data['display'] = $address_module->display($address_id);</td></tr>
						<tr><td>In the view:</td><td colspan="2">&lt;div&gt;&lt;?=$display ?&gt;&lt;/div&gt;</td></tr>
					</table>
					
					
					<div style="border:solid 2px green;">
						<?= $display ?>
					</div>
				</div>
				
				
			</div><!-- end .row-fluid -->
			
			
<!-- EDIT -->
			<div class="row-fluid well" id="edit">
				<h3>Form to Create or Edit an Address </h3>
				<table class="table table-bordered">
					<tr><td><strong>function:</strong></td><td>edit($address_id)</td></tr>
					<tr><td><strong>parameter</strong></td><td>(int)</td><td>$address_id</td></tr>
					<tr><td><strong>returns:</strong></td><td>(string)</td><td> a string of HTML for the edit-address form</td></tr>
					<tr><td>In the controller:</td><td colspan="2">$data['edit'] = $address_module->edit($address_id);<br/>or<br/>$data['edit'] = $address_module->edit();</td></tr>
					<tr><td>In the view:</td><td colspan="2">&lt;div&gt;&lt;?=$edit ?&gt;&lt;/div&gt;</td></tr>
				</table>
				
				<div class="span5" style="border:solid green 2px;">
					<?= $edit?>
				</div>
				<div class="span5 offset1" style="border:solid green 2px;">
					<?= $new?>
				</div>
			</div><!-- end .row-fluid -->
			
			
			<div class="row-fluid">
				
				
				
				
			</div><!-- end .row-fluid -->
			<div class="row-fluid">
				
				
				
				
				
			</div><!-- end .row-fluid -->
				
		</div><!-- .close span10 -->		
</div><!-- close .container -->
