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
	.code
	{
		color:red;
	}
</style>
<div class="container-fluid">
	<div class="row-fluid" >
		<div class=" well span12">
			<h3>Search</h3>
			this is backstage/views/howto/search_v.php<br/>
			Search is a controller class of the Catalog module. <br/>
			<span class="code"><span >$variable_name</span> = $this->load->module('catalog/search');</span><br/>
			<br/>
			If your controller extends MY_Controller or Loggedin_Controller, you can load all the modules in your controller by calling <br/>
			<span class="code" >$this->load_modules();</span><br/>
			from your __construct() function. Then you need to reference the search controller with<br/>
			<span class="code">$this->search_module->function_name();</span>
		</div>

	</div>


	<div class="row-fluid" >

<!-- the left-hand menu -->
		<div class="well span2" id="leftmenu" >
			<?=$this->load->view('menu_p');?>
		</div>

		<div id="howto-content" class="span10 pageContent">

				
				
			







			<div class="row-fluid well" id="search_form">
				<h3>index() </h3>
				<table class="table table-bordered">
					<tr><td><strong>function:</strong></td><td>index()</td></tr>
					<tr><td><strong>parameter</strong></td><td>- none -</td><td></td></tr>
					<tr><td><strong>returns:</strong></td><td>(string)</td><td> a string of HTML for the search form</td></tr>
					<tr><td>In the controller:</td><td colspan="2">$data['search_form'] = $search_module->edit($address_id);
					<br/>or<br/>
					$data['search_form'] = $search_module->index();</td></tr>
					<tr><td>In the view:</td><td colspan="2">&lt;div&gt;&lt;?=$search_form ?&gt;&lt;/div&gt;</td></tr>
					<tr><td colspan="3">This form submits via an ajax function included in the widget. Jquery collects the response and inserts it into a container with id="search_results", shown below with the red border. </td></tr>
				</table>
				
				
			
			
		
					<div class="span12">
						<?=$search_partial?>
					</div>


					<div class="span12">
						<?php //=$search_results?>
						<div class="well" id="search_results" style="border:solid red 2px;"></div>
					</div>
				
			</div><!-- end .row-fluid #search_form-->






	<div class="row-fluid">
		<?=$userCytometers?>
	</div>




	
				
	
		</div><!-- close .span10 #howto-content-->		
</div><!-- close .container -->
