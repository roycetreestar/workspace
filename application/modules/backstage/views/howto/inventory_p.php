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
			<h3>Inventory</h3>
			this is backstage/views/howto/inventory_p.php<br/>
			An inventory resource type is somewhat different from other resource types, as it is a container for inventory items, not a single item in and of itself. It is essentially a collection of catalog items and their additional details for the owning lab or user (such as quantity on hand and titration amounts). The inventory (container) resource is stored in the 'resources' database table, and each item in that inventory is stored in the 'inventories' table.
		</div>

	</div>


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
				<h4>Inventory data</h4>
				<a href="#xml">get inventory xml</a><br/>
				<a href="#array">get inventory array</a><br/>
				<br/>
				<h4>partials about inventory:</h4>
				<a href="#display">display an inventory</a><br/>
				<a href="#edit">edit an inventory</a><br/>
				
				<a href="#filter">filter_inventory_p</a><br/>
				<a href="#fields">show_fields_p</a><br/>
				<a href="#cat_num">add_by_cat_num_p</a><br/>
				<a href="#add_manual">add_manually_p</a><br/>
			
-->			</div>
		</div>

		<div class="span10">

<!-- XML -->
			<div class="row-fluid">					
				<div class="span12 well" id="xml" >
				<h3>get_xml()</h3>
				<table class="table table-bordered">
					<tr><td><strong>function:</strong></td><td>get_xml($resource_id)</td></tr>
					<tr><td><strong>parameter</strong></td><td>(int)</td><td>$resource_id</td></tr>
					<tr><td><strong>returns:</strong></td><td>(string)</td><td> an XML string of data for the inventory specified by the $resource_id parameter <br/> (shown here print_r() -ed  within a &lt;textarea&gt; for your viewing convenience)</td></tr>
					<tr><td colspan="3">		</td></tr>
				</table>
				
				
<h3 style="color:red">XML for Inventories has not yet been determined</h3>
					<textarea><?=$xml?></textarea>			
				</div>			
			</div>
		
		
		
		
<!-- ARRAY -->
			<div class="row-fluid">
				<div class="span12 well" id="array" >
				<h3>get_array()</h3>
				<table class="table table-bordered">
					<tr><td><strong>function:</strong></td><td>get_xml($resource_id)</td></tr>
					<tr><td><strong>parameter</strong></td><td>(int)</td><td>$resource_id</td></tr>
					<tr><td><strong>returns:</strong></td><td>(string)</td><td> a php array for the inventory specified by the $resource_id parameter <br/> (shown here print_r() -ed  within a &lt;textarea&gt; for your viewing convenience)</td></tr>
					<tr><td colspan="3">		</td></tr>
				</table>
				
<h3 style="color:red">Inventory arrays are coming soon</h3>
					<textarea><?=print_r($array, true)?></textarea>
				</div>			
			</div>
			
			
			
			
			
<!-- DISPLAY	-->	
			<div class="row-fluid">
				<div class="well span12">
					<h3 id="display">display an inventory</h3>
					inventories/views/partials/display_inventory_p
					
					<table class="table table-bordered">
						<tr><td><strong>function:</strong></td><td>edit($resource_id)</td></tr>
						<tr><td><strong>parameter</strong></td><td>(int)</td><td>$resource_id</td></tr>
						<tr><td><strong>returns:</strong></td><td>(string)</td><td> a string of HTML for the display-inventory form</td></tr>
						<tr><td>In the controller:</td><td colspan="2">$data['display'] = $inventory_module->display($resource_id);</td></tr>
						<tr><td>In the view:</td><td colspan="2">&lt;div&gt;&lt;?=$display ?&gt;&lt;/div&gt;</td></tr>
						<tr><td colspan="3">		</td></tr>
					</table>
					
					
					<div style="border:solid 2px green;">
						<?= $display ?>
					</div>
				</div>
				
				
			</div><!-- end .row-fluid -->
			
			
			
			
			
<!-- EDIT 
			<div class="row-fluid well" id="edit">
				<h3>Form to Create or Edit an Inventory </h3>
				<table class="table table-bordered">
					<tr><td><strong>function:</strong></td><td>edit($resource_id)</td></tr>
					<tr><td><strong>parameter</strong></td><td>(int)</td><td>$resource_id</td></tr>
					<tr><td><strong>returns:</strong></td><td>(string)</td><td> a string of HTML for the edit-inventory form</td></tr>
					<tr><td>In the controller:</td><td colspan="2">$data['edit'] = $usermodule->edit($resource_id);<br/>or<br/>$data['edit'] = $usermodule->edit();</td></tr>
					<tr><td>In the view:</td><td colspan="2">&lt;div&gt;&lt;?=$edit ?&gt;&lt;/div&gt;</td></tr>
				</table>
				
				<div class="span12" style="border:solid green 2px;">
					<?//= $edit?>
				</div>
				<div class="span12 offset1" style="border:solid green 2px;">
					<?//= $new?>
				</div>
			</div><!-- end .row-fluid -->
	-->		
			
			
			
			
			
			
<!-- filter_inventory_p	-->			
			<div class="row-fluid well" id="filter">
				<h3>filter_inventory_p</h3>
				<table class="table table-bordered">
					<tr><td><strong>function:</strong></td><td></td></tr>
					<tr><td><strong>parameter</strong></td><td>( )</td><td>$ </td></tr>
					<tr><td><strong>returns:</strong></td><td>( )</td><td>  </td></tr>
					<tr><td>In the controller:</td><td colspan="2">$data['edit'] = $usermodule->edit($resource_id);<br/>or<br/>$data['edit'] = $usermodule->edit();</td></tr>
					<tr><td>In the view:</td><td colspan="2">&lt;div&gt;&lt;?=$edit ?&gt;&lt;/div&gt;</td></tr>
					<tr><td colspan="3">		</td></tr>
				</table>
				
				
				<div class="span11" style="border:solid green 5px;">				
					<?= $filter ?>
				</div>
			</div><!-- end .row-fluid -->






<!-- show_fields_p	-->			
			<div class="row-fluid well" id="fields">
				<h3>show_fields_p</h3>
				<table class="table table-bordered">
					<tr><td><strong>function:</strong></td><td></td></tr>
					<tr><td><strong>parameter</strong></td><td>( )</td><td>$ </td></tr>
					<tr><td><strong>returns:</strong></td><td>( )</td><td>  </td></tr>
					<tr><td>In the controller:</td><td colspan="2">$data['show_fields'] = $inventory_module->get_form_show_fields();<br/>or<br/>$data['show_fields'] = $inventory_module->get_form_show_fields();</td></tr>
					<tr><td>In the view:</td><td colspan="2">&lt;div&gt;&lt;?=$edit ?&gt;&lt;/div&gt;</td></tr>
					<tr><td colspan="3">		</td></tr>
				</table>
				
				
				<div class="span11" style="border:solid green 5px;">				
					<?= $show_fields ?>
				</div>
			</div><!-- end .row-fluid -->
			
			
			
			
			
			
<!-- add_by_cat_num_p	-->			
			<div class="row-fluid well" id="cat_num">
				<h3>add_by_cat_num_p</h3>
				<table class="table table-bordered">
					<tr><td><strong>function:</strong></td><td></td></tr>
					<tr><td><strong>parameter</strong></td><td>( )</td><td>$ </td></tr>
					<tr><td><strong>returns:</strong></td><td>( )</td><td>  </td></tr>
					<tr><td>In the controller:</td><td colspan="2">$data['edit'] = $usermodule->edit($resource_id);<br/>or<br/>$data['edit'] = $usermodule->edit();</td></tr>
					<tr><td>In the view:</td><td colspan="2">&lt;div&gt;&lt;?=$edit ?&gt;&lt;/div&gt;</td></tr>
					<tr><td colspan="3">		</td></tr>
				</table>
				
				
				<div class="span11" style="border:solid green 5px;">				
					<?= $add_cat_num?>
				</div>
			</div><!-- end .row-fluid -->
			
			
			
			
			
			
<!-- add_single_item_p	
			<div class="row-fluid well" id="add_single">
				<h3>add_single_item_p</h3>
				<table class="table table-bordered">
					<tr><td><strong>function:</strong></td><td></td></tr>
					<tr><td><strong>parameter</strong></td><td>( )</td><td>$ </td></tr>
					<tr><td><strong>returns:</strong></td><td>( )</td><td>  </td></tr>
					<tr><td>In the controller:</td><td colspan="2">$data['edit'] = $usermodule->edit($resource_id);<br/>or<br/>$data['edit'] = $usermodule->edit();</td></tr>
					<tr><td>In the view:</td>	<td colspan="2">
													&lt;div&gt;&lt;?=$edit ?&gt;&lt;/div&gt;<br/>
													<h5>this partial can also be loaded directly from the view file with</h5>
													<ul><li>&lt;?= $this->load->view('add_single_item_p'); ?&gt;</li></ul>
												</td></tr>
					<tr><td colspan="3">	This partial is intended to be used to add a product to inventory via its catalog number	</td></tr>
				</table>
				
				
				<div class="span11" style="border:solid green 5px;">				
					<?//= $this->load->view('add_single_item_p'); ?>
				</div>
			</div><!-- end .row-fluid -->
-->						
			
			
			
			
			
<!-- add_manually_p	-->			
			<div class="row-fluid well" id="add_manual">
				<h3>add_manually_p</h3>
				<table class="table table-bordered">
					<tr><td><strong>function:</strong></td><td></td></tr>
					<tr><td><strong>parameter</strong></td><td>( )</td><td>$ </td></tr>
					<tr><td><strong>returns:</strong></td><td>( )</td><td>  </td></tr>
					<tr><td>In the controller:</td><td colspan="2">$data['add_manually'] = $inventory_module-> get_form_add_item($inventory_id);<br/>or<br/>$data['add_manually'] = $inventory_module-> get_form_add_item();</td></tr>
					<tr><td>In the view:</td><td colspan="2">&lt;div&gt;&lt;?=$edit ?&gt;&lt;/div&gt;</td></tr>
					<tr><td colspan="3">		</td></tr>
				</table>
				
				
				<div class="span11" style="border:solid green 5px;">				
					<?= $add_manually ?>
				</div>
			</div><!-- end .row-fluid -->
				
				
				
				
				
		</div><!-- .close span10 -->		
</div><!-- close .container -->
