<?php
/**
 * The main controller of the catalog module
 * 
 * 
 *	needs the upload form's file field to have	name="file" 
 * 
 *	all errors along the way are stored in $this->data['errors']['error_type']
 *	At each step the process may abort and report errors
 */

if (!defined('BASEPATH'))
    exit('No direct script access allowed');


class Search extends MY_Controller//Loggedin_Controller// Secure_Controller
{
	private $thesaurus;
////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////
	function __construct()
	{
		parent::__construct();
		$this->thesaurus = $this->load->module('thesaurus');
		$this->load->model('chromes_model');
		$this->load->model('clones_model');
		$this->load->model('species_model');
		$this->load->model('targets_model');
		$this->load->model('catalog_m');
		
		$this->load_modules();
	}
	
////////////////////////////////////////////////////////////////////////


	function index()
	{
		$data['vendors'] = $this->vendors_module->get_current_vendors();
		
		$data['species_dd'] = $this->thesaurus_module->species_dropdown();
		
		$all_targets = $this->get_all_target_names();
		$data['targets'] = json_encode($all_targets);
		
		$all_chromes = $this->get_all_chrome_names();
		$data['format'] = json_encode($all_chromes);

		
		$all_clones = $this->get_all_clone_names();
		$data['clones'] = json_encode($all_clones);
		
		
		return '<div class="">'. $this->get_search_form($data).'</div>';
	}

	

	

////////////////////////////////////////////////////////////////////////
	function targets_for_species($species)
	{
		$this->load->model('target_species_model');
		
		$species = $this->thesaurus->get_species_canonical($species, true );
		$targets = $this->target_species_model->read_by_species($species);
		
		return $targets;

	}

	
////////////////////////////////////////////////////////////////////////
	function products_for_target($target)
	{
		return $this->catalog_m->reagent_by_target_clone($target);
		
	}
	
////////////////////////////////////////////////////////////////////////
	function get_search_form($data)
	{
		return $this->load->view('partials/form_search_p', $data, true);
	}

	
////////////////////////////////////////////////////////////////////////
	function results()
	{
		$data = $this->input->get();
		$data = $_GET;
//~ echo 'catalog search params ($data):<hr/> <pre>'.print_r($data, true).'</pre>';		
//die("catalog/search/results() DATA:<textarea>".print_r($data, true)."</textarea>");
		if(isset($data['target']))
			$data['target'] = $this->thesaurus_module->get_target_canonical($data['target'], true);
		if(isset($data['format']))
			$data['format'] = $this->thesaurus_module->get_chrome_canonical($data['format'], true);
		//if(isset($data['clone']))
			//$data['clone'] = $this->thesaurus_module->get_clones_canonical($data['clone'], true);

		$data['results'] = $this->catalog_m->search($data);
		
		
		
		if($data['results'])
		{
			foreach($data['results'] as $result)
			{
				//~ if(trim($result['vendor_name']) == '')
					$result['vendor_name'] == "custom";//$this->vendors_module->get_vendor_name($result['vendorid']);
			}
//~ die('search results:<br/><pre>'.print_r($data['results'], true).'</pre>');
			echo $this->load->view('partials/search_results_p', $data, true);
			
		}
		else
			echo 'No Products Found';
		//~ die('catalog search params ($results):<hr/> <pre>'.print_r($results, true).'</pre>');
	}
	
	
////////////////////////////////////////////////////////////////////////
	function get_all_targets($starts_with='')
	{
		//~ $this->load->model('targets_model');
		return $this->targets_model->get_all($starts_with);
	}
////////////////////////////////////////////////////////////////////////
	function get_all_target_names($starts_with='')
	{
		$targets = $this->get_all_targets($starts_with);
		$returnable = array();
		foreach ($targets as $target)
		{
			$returnable[] = $target['alternate_name'];
		}
		return $returnable;
	}
	
////////////////////////////////////////////////////////////////////////
	function get_all_species($starts_with = '')
	{
		//~ $this->load->model('species_model');
		return $this->species_model->get_all($starts_with);
	}
	
////////////////////////////////////////////////////////////////////////
	function get_all_chromes($starts_with='')
	{
	//~ $this->load->model('chromes_model');
		return $this->chromes_model->get_all($starts_with);
	}
////////////////////////////////////////////////////////////////////////
	function get_all_chrome_names($starts_with='')
	{
		$chromes = $this->get_all_chromes($starts_with);
		$returnable=array();
		foreach($chromes as $chrome)
		{
			//~ $returnable[]= $chrome['chrome_name'];
			$returnable[]= $chrome['alternate_name'];
		}
		return $returnable;
	}
////////////////////////////////////////////////////////////////////////
	function get_all_clones($starts_with='')
	{
		//~ $this->load->model('clones_model');
		return $this->clones_model->get_all($starts_with);
	}
////////////////////////////////////////////////////////////////////////
	function get_all_clone_names($starts_with = '')
	{
		$clones = $this->get_all_clones($starts_with);
		$returnable=array();
		foreach($clones as $clone)
		{
			$returnable[]= $clone['clone_name'];
		}
		return $returnable;
		
		
	}

	function get_clones_for_target($target)
	{
		return $this->clones_model->clones_by_target($target);
		
	}
	
	
	
	
	
	
	
	
////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////
///////////////	PANEL BUILDER FUNCTIONS	////////////////////////////////
////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////
	

	
////////////////////////////////////////////////////////////////////////
/**
 * Panel Builder userCytometers() function
 * 
 * returns a <cytometers> XML element containing the XML for each cytometer
 * in the user's groups
 * 
 * @param	$userid - the userid of the user being queried
 * @return	(string) - a string of xml 
 */
	function user_cytometers($userid='')
	{
		//~ $cytometers = array();
		//~ if($userid=='')
		//~ {
			//~ if(isset($_GET['userid']))
				//~ $userid=$_GET['userid'];
//~ else die( 'We had a problem with your userid');
		//~ }
		$membership_module = $this->load->module('membership');
		$groups = $membership_module->get_groups_by_userid($userid);
//~ die('catalog/search/userCytometers<br/>
//~ $userid: '.$userid.'
//~ $groups<br/>
//~ '.print_r($groups, true));		
		$xml = '<cytometers>
';
		foreach($groups as $group)
		{
			foreach($group['resources'] as $resource)
			{
				if($resource['resource_type'] == 'cytometer')
					//~ $cytometers[] = $resource['xml'];
					$xml .= '
	'.$resource['xml'].'
';
			}
		}
		$xml.= '
</cytometers>';
		
//~ die('catalog/search/userCytometers()<br/>$xml:<br/>
//~ '.$xml);
//echo '<textarea>'.$xml.'</textarea>';	
echo $xml;
	}
////////////////////////////////////////////////////////////////////////
/**
 * Panel Builder targets() function
 * if only $species is passed in, returns XML of all targets that match 
 * that species
 * 
 * if $detailed=true (and $targets is also present), returns XML of those 
 * targets and all clones that match to those targets
 */	
 

 
 
	function targets()
	{
//~ $params = $_GET; //$this->input->get_post();
//~ die('$params: <pre>'.print_r($params, true).'</pre>' );

	//~ //if species is set, they're looking for all targets that match that species
		//~ if(isset($_GET['species']))
		//~ {
			//~ $this->load->model('target_species_model');
			//~ 
			//~ $params['species'] = $this->input->get_post('species', true);
			//~ $species = $this->thesaurus->get_species_canonical($params['species'], true );
			//~ $targets = $this->target_species_model->read_by_species($species);
			//~ 
			//~ $xml = '<targets species="'.$species.'" count="'.count($targets).'" >
//~ ';
			//~ foreach($targets as $target)
			//~ {
				//~ $xml.='	<target>'.$target['target_name'].'</target>
//~ ';			
			//~ }
			//~ $xml.='</targets>';
			//~ 
//~ die('xml of targets for '.$species.':<br/><textarea style="width:100%; height:90%;" >'.$xml.'</textarea>');			
			//~ return $xml;			
		//~ }
		//~ 
		//~ 
	//~ //otherwise, they're looking for clones that match certain targets	
		//~ else if(isset($_GET['detailed']))
		//~ {
			//~ $targets = explode(',', $this->input->get_post('targets') );		
			//~ 
			//~ $xml = '<targets>'; //.......
			//~ foreach($targets as $target)
			//~ {
				//~ $clones = $this->get_clones_for_target($target);
				//~ 
				//~ 
				//~ $xml .= '
	//~ <target name="'.$target.'">
		//~ <clones>'; //.......
				//~ foreach($clones as $clone)
				//~ {
					//~ $xml .= '
			//~ <clone name="'.$clone.'"> </clone>'; //.......
//~ 
				//~ }
				//~ $xml .= '
		//~ </clones>
	//~ </target>';
			//~ }
			//~ $xml .= '
//~ </targets>'; //.......
			return $xml;
//~ echo '<textarea>'.$xml.'</textarea>';
		//~ }
		
	}
////////////////////////////////////////////////////////////////////////
/**
 *  Panel Builder fluorochromes() function
 */
	function fluorochromes()
	{
		$chromes = $this->chromes_model->read_all();
		
		return $chromes;
		//~ $xml = '<fluorochromes num_results="'.count($chromes).'">';
		//~ foreach($chromes as $chrome)
		//~ {
			//~ $xml.='
	//~ <fluorochrome name="'.$chrome['chrome_name'].'">
		//~ <excitation>'.$chrome['excitation'].'</excitation>
		//~ <emission>'.$chrome['emission'].'</emission>
		//~ <category>'.$chrome['category'].'</category>
		//~ <live_dead>'.$chrome['live_dead'].'</live_dead>
		//~ <efficiency_20>'.$chrome['20Efficiency'].'</efficiency_20>
		//~ <efficiency_60>'.$chrome['60Efficiency'].'</efficiency_60>
		//~ <efficiency_80>'.$chrome['80Efficiency'].'</efficiency_80>
		//~ <cas>'.$chrome['CAS'].'</cas>		
	//~ </fluorochrome>';
		//~ 
		//~ 
		//~ }
		//~ $xml.='</fluorochromes>';
		//~ 
//~ die('<textarea>'.$xml.'</textarea>');
	}
////////////////////////////////////////////////////////////////////////
/**
 * Panel Builder reagents() function
 * takes a target (and optionally a clone) and returns reagents that match it (them)
 * 
 */	
	function reagents($target, $clone='', $source='')//?target=CD4&clone=[optional]
	{
		//~ $target = $_GET['target'];
		//~ if(isset($_GET['clone']))
		//~ {	$clone = $_GET['clone'];
			$reagents = $this->catalog_m->reagent_by_target_clone($target, $clone);
		if($source == 'api')
			return $reagents;
		//~ }
		//~ else
			//~ $reagents = $this->catalog_m->reagent_by_target_clone($target);
			
		//~ $xml='<reagents>';
		//~ 
		//~ foreach($reagents as $reagent)
		//~ {
			//~ $xml.= '
	//~ <reagent id="'.$reagent['id'].'">
		//~ <target name="'.$reagent['target'].'" clone="'.$reagent['clone'].' />
		//~ <fluorochrome name="'.$reagent['format'].'" />
		//~ <isotype name="'.$reagent['isotype'].'" />
		//~ <product catalog_number="'.$reagent['catalog_number'].'" vendor_id="'.$reagent['vendorid'].'" >
			//~ <amount units="'.$reagent['unit_size'].'" >'.$reagent['unit_size'].'</amount>
			//~ <price>'.$reagent['price'].'</price>
		//~ </product>
	//~ </reagent>';
		//~ }
		//~ 
		//~ 
		//~ 
		//~ 
		//~ $xml.='</reagents>';
			//~ 
			//~ 
			//~ 
//~ die('catalog/search/reagents() - $reagents:<textarea>'.print_r($reagents, true).'</textarea><hr/>$xml:<br/><textarea>'.$xml.'</textarea>');
	}
////////////////////////////////////////////////////////////////////////
}//end class
