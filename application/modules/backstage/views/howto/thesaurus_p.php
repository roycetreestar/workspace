<style>
	textarea
	{
		width:100%;
		//height:100px;
	}
	
	body
	{
		background-color:black;
	}
</style>
<div class="container-fluid" >
	<div class="row-fluid" >
		<div class="well span6" >
			<h3>this is backstage/views/howto/thesaurus_p.php</h3>
			<strong>Controller Location:</strong>		application/modules/thesaurus/thesaurus.php
			<br/>
			<strong>load the thesaurus controller: </strong>		$usermodule = $this->load->module('thesaurus');
			<br/>
			<strong>load the thesaurus model </strong>				$this->load->model('thesaurus_m');
			<br/>
		</div>
		<div class="well span6">
			<strong>public functions:</strong>
			<ul>
				<li></li>
				<li></li>
			</ul>
		</div>
	</div>





	<div class="row-fluid" >
		<div class="well span2" id="leftmenu" >
			<div>
				<h4>howto pages</h4>
				<a href="<?=base_url()?>backstage/howto/addresses">addresses</a><br/>
				<a href="<?=base_url()?>backstage/howto/cytometers">cytometers</a><br/>
				<a href="<?=base_url()?>backstage/howto/groups">groups</a><br/>
				<a href="<?=base_url()?>backstage/howto/inventory">inventory</a><br/>
				<a href="<?=base_url()?>backstage/howto/panels">panels</a><br/>
				<a href="<?=base_url()?>backstage/howto/users">users</a><br/>
				<a href="<?=base_url()?>backstage/howto/thesaurus">thesaurus</a><br/>
			</div>
			<hr/>
			<div>
				<h4>thesaurus data:</h4>
				<a href="#xml">get thesaurus xml</a><br/>
				<a href="#array">get thesaurus array</a><br/>
				<br/>
				<h4>thesaurus partials:</h4>
				<a href="#full">The full thesaurus page</a><br/>
				<a href="#add_chrome">add a fluorochrome</a><br/>
				<a href="#add_chrome_alt">add a fluorochrome alternate name </a><br/>
				<a href="#add_species">add a species</a><br/>
				<a href="#add_species_alt">add a species alternate name</a><br/>
				<a href="#add_target">add a target</a><br/>
				<a href="#add_target_alt">add a target alternate name</a><br/>
				
			
			</div>
		</div>
		


		
		<div class=" span10">
			<div class="row-fluid">

<!-- FULL THESAURUS PAGE -->			
				<div class="well span12">
					<h3 id="full">Full Lookup Page</h3>
					
					<table class="table table-bordered">
						<tr>
							<td><strong>function:</strong></td>
							<td>index()</td>
						</tr>
						<tr>
							<td><strong>parameter</strong></td>
							<td>none</td>
						</tr>
						<tr>
							<td><strong>returns:</strong></td>
							<td>(string)</td>
							<td>the full set of thesaurus-lookup forms</td>
						</tr>
					</table>
					
					<label for="xml_text"><strong>Example Output:</strong></label>
<!--					<textarea id="xml_text"><?=$full?></textarea>
-->					<br/>
				</div>
				
				
		</div><!-- end .row-fluid -->
		<div class="row-fluid">



<!--	ADD A FLUOROCHROME	-->
			<div class="well span12" id="add_chrome">
				<h3>add a new fluorochrome</h3>
					<table class="table table-bordered">
						<tr>
							<td><strong>in the view:</strong></td>
							<td colspan="2">$this->load->view('thesaurus/partials/new_chromes_form_p');</td></tr>
						<tr>
							<td><strong>in the controller:</strong></td>
							<td colspan="2">$variable = $this->load->view('thesaurus/partials/new_chromes_form_p', '', true);</td></tr>
						<tr>
							<td><strong>returns:</strong></td>
							<td>(string)</td>
							<td>HTML of the form</td></tr>
					</table>
					<?=$add_chrome_form //$this->load->view('thesaurus/partials/new_chromes_form_p');?>
			</div>


		</div><!-- end .row-fluid -->
		<div class="row-fluid">

<!--	ADD A FLUOROCHROME ALTERNATE NAME	-->
			<div class="well span12" id="add_chrome_alt">
				<h3>add a new fluorochrome alternate name</h3>
					<table class="table table-bordered">
						<tr>
							<td ><strong>in the view:</strong></td>
							<td colspan="2">$this->load->view('thesaurus/partials/new_chrome_alternates_form_p');</td>
						</tr>
						<tr>
							<td colspan="2"><strong>in the controller:</strong></td>
							<td>$variable = $this->load->view('thesaurus/partials/new_chrome_alternates_form_p', '', true);</td>
						</tr>
						<tr>
							<td><strong>returns:</strong></td>
							<td>(string)</td>
							<td>HTML of the form</td>
						</tr>
					</table>
				<?=	$add_chrome_alt_form//$this->load->view('thesaurus/partials/new_chrome_alternates_form_p');?>
			</div>

		</div><!-- end .row-fluid -->
		<div class="row-fluid">



<!--	LOOKUP A FLUOROCHROME ALTERNATE NAME	-->
			<div class="well span12" id="add_chrome_alt">
				<h3>get_chrome_alternates_lookup_form()</h3><br/>
				lookup chrome alternate names<br/>
				Type the name (or alternate name) of a fluorochrome in the box and submit. An included div ('#find_chrome_alts_results') populates via ajax with the term's canonical name and a table of alternate names and their is_exception values.
				<table class="table table-bordered">
						<tr>
							<td ><strong>in the view:</strong></td>
							<td colspan="2">$this->load->view('thesaurus/partials/get_chrome_alternates_lookup_form');</td>
						</tr>
						<tr>
							<td colspan="2"><strong>in the controller:</strong></td>
							<td>$variable = thesaurus_module->get_chrome_alternates_lookup_form();</td>
						</tr>
						<tr>
							<td><strong>returns:</strong></td>
							<td>(string)</td>
							<td>HTML of the form</td>
						</tr>
					</table>
			<?=$chrome_alt_lookup?>
			</div>

		</div><!-- end .row-fluid -->
		<div class="row-fluid">













<!--	ADD A SPECIES	-->
			<div class="well span12" id="add_species">
				<h3>add a new species</h3>
					<table class="table table-bordered">
						<tr>
							<td colspan="2"><strong>in the view:</strong></td>
							<td>$this->load->view('thesaurus/partials/new_species_form_p');</td>
						</tr>
						<tr>
							<td colspan="2"><strong>in the controller:</strong></td>
							<td>$variable = $this->load->view('thesaurus/partials/new_species_form_p', '', true);</td>
						</tr>
						<tr>
							<td><strong>returns:</strong></td>
							<td>(string)</td>
							<td>HTML of the form</td>
						</tr>
					</table>
					<?=$add_species_form
				//$this->load->view('thesaurus/partials/new_species_form_p');?>
			</div>


		</div><!-- end .row-fluid -->
		<div class="row-fluid">

<!--	ADD A SPECIES ALTERNATE NAME	-->
			<div class="well span12" id="add_species_alt">
				<h3>add a new species alternate name</h3>
					<table class="table table-bordered">
						<tr><td colspan="2"><strong>in the view:</strong></td><td>$this->load->view('thesaurus/partials/new_species_alternates_form_p');</td></tr>
						<tr><td colspan="2"><strong>in the controller:</strong></td><td>$variable = $this->load->view('thesaurus/partials/new_species_alternates_form_p', '', true);</td></tr>
						<tr><td><strong>returns:</strong></td><td>(string)</td><td>HTML of the form</td></tr>
					</table>
				<?=	$add_species_alt_form//$this->load->view('thesaurus/partials/new_species_alternates_form_p');?>
			</div>

		</div><!-- end .row-fluid -->
		<div class="row-fluid">
			
			
			<div class="well">
				lookup species alternate names
				<?=$species_alt_lookup?>
			</div>
			
		</div><!-- end .row-fluid -->
		<div class="row-fluid">

<!--	ADD A TARGET	-->
			<div class="well span12" id="add_target">
				<h3>add a new target</h3>
					<table class="table table-bordered">
						<tr><td colspan="2"><strong>in the view:</strong></td><td>$this->load->view('thesaurus/partials/new_targets_form_p');</td></tr>
						<tr><td colspan="2"><strong>in the controller:</strong></td><td>$variable = $this->load->view('thesaurus/partials/new_targets_form_p', '', true);</td></tr>
						<tr><td><strong>returns:</strong></td><td>(string)</td><td>HTML of the form</td></tr>
					</table>
				<?=	$add_target_form //$this->load->view('thesaurus/partials/new_targets_form_p');?>
			</div>


		</div><!-- end .row-fluid -->
		<div class="row-fluid">

<!--	ADD A TARGET ALTERNATE NAME	-->
			<div class="well span12" id="add_target_alt" >
				<h3>add a new target alternate name</h3>
					<table class="table table-bordered">
						<tr><td colspan="2"><strong>in the view:</strong></td><td>	$this->load->view('thesaurus/partials/new_targets_alternates_form_p'); </td></tr>
						<tr><td colspan="2"><strong>in the controller:</strong></td><td>$variable = 	$this->load->view('thesaurus/partials/new_targets_alternates_form_p', '', true);</td></tr>
						<tr><td><strong>returns:</strong></td><td>(string)</td><td>HTML of the form</td></tr>
					</table>
				<?=	$add_target_alt_form //$this->load->view('thesaurus/partials/new_targets_alternates_form_p');?>
			</div>

			
		</div><!-- end .row-fluid -->
		<div class="row-fluid">
			
<!--	LOOKUP TARGET ALTERNATE NAMES		-->
			<div class="well span12" id="lookup_target_alt">
				lookup target alternate names
				<?=$target_alt_lookup?>
			</div>
			
		</div><!-- end .row-fluid -->
		<div class="row-fluid">

<!-- 	CATEGORIES	-->
			<div class="well">
				add a new product category
				<?=$add_category_form?>
			</div>
			
		</div><!-- end .row-fluid -->
		<div class="row-fluid">
			
			<div class="well">
				lookup category alternate names
				<?=$category_alt_lookup?>
			</div>

		</div><!-- end .row-fluid -->
		<div class="row-fluid">
			
			<div class="well">
				lookup categories
				<?=$category_lookup?>
			</div>

		</div><!-- end .row-fluid -->
		<div class="row-fluid">

			<div class="well">
				add a new category alternate name
				<?=$add_category_alt_form?>
			</div>

		</div><!-- end .row-fluid -->
		<div class="row-fluid">
<!-- APPLICATIONS		-->
			<div class="well">
				add new application 
				<?=$add_application_form?>
			</div>
			
			
		</div><!-- end .row-fluid -->
		<div class="row-fluid">			
			
			<div class="well">
				add new application alternate names form
				<?=$add_application_alt_form?>
			</div>

		</div><!-- end .row-fluid -->
		<div class="row-fluid">

<!-- CATALOG FIELD HEADERS		-->
			<div class="well">
				lookup catalog header alternate names
				<?=$cat_head_alt_lookup_form?>
			</div>

		</div><!-- end .row-fluid -->
