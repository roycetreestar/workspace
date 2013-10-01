<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');


class Api extends MY_Controller// Loggedin_Controller// Secure_Controller
{

////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////
	function __construct()
	{
		parent::__construct();
		$this->search_module = $this->load->module('catalog/search');
		$this->thesaurus_module = $this->load->module('thesaurus');
	}
	
	function index()
	{
		echo 'you\'ve reached the fluorish API\'s index function';
	}
	
	
	function user_cytometers($userid='')
	{
		
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
			//if species is set, they're looking for all targets that match that species
		if(isset($_GET['species']))
		{
			$species = $this->input->get_post('species', true);
			$targets = $this->search_module->targets_for_species($species);
			
			$xml = '<targets species="'.$species.'" count="'.count($targets).'" >
';
			foreach($targets as $target)
			{
				$xml.='	<target>'.$target['target_name'].'</target>
';			
			}
			$xml.='</targets>';
			
die('xml of targets for '.$species.':<br/><textarea style="width:100%; height:90%;" >'.$xml.'</textarea>');			
			return $xml;			
		}
//----------------------------------------------------------------------		
		
	//otherwise, they're looking for clones that match certain targets	
		else if(isset($_GET['detailed']))
		{
			$targets = explode(',', $this->input->get_post('targets') );
//~ die('detailed was TRUE and targets was <pre>"'.print_r($targets, true).'"</pre>');			
			
			$xml = '<targets>'; //.......
			foreach($targets as $target)
			{
				$clones = $this->search_module->get_clones_for_target($target);
				//~ $product_count = count($this->search_module->products_for_target($target));
				$alternate_names = $this->thesaurus_module->get_target_alternates($target);
				$product_count=0;
				
				foreach($clones as $clone)
					$product_count+=$clone['count'];
		
				
				
				
				$xml .= '
	<target name="'.$target.'">
		<products count="'.$product_count.'" />
		<alternate_names>';
				foreach($alternate_names as $alt)
				{
					$xml.='
			<name>'.$alt['alternate_name'].'</name>';
				}
			$xml.='
		</alternate_names>
		<clones>'; //.......
				foreach($clones as $clone)
				{
					//~ $target_clone_count = count($this->search_module->reagents($target, $clone, 'api') );
					$xml .= '
			<clone name="'.$clone['name'].'">
				<products count="'.$clone['count'].'" />
			</clone>'; //.......

				}
				$xml .= '
		</clones>
	</target>';
			}
			$xml .= '
</targets>'; //.......
			//~ return $xml;
echo '<textarea>'.$xml.'</textarea>';
		}
	}

////////////////////////////////////////////////////////////////////////
/**
 *  Panel Builder fluorochromes() function
 */
	function fluorochromes()
	{
		$chromes = $this->search_module->fluorochromes(); //chromes_model->read_all();
		$xml = '<fluorochromes count="'.count($chromes).'">';
		foreach($chromes as $chrome)
		{
			
			
			
			
			$xml.='
	<fluorochrome name="'.$chrome['chrome_name'].'" emission="'.$chrome['emission'].'" excitation="'.$chrome['excitation'].'" type="'.$chrome['category'].'">


	
		<live_dead>'.$chrome['live_dead'].'</live_dead>
		<efficiency_20>'.$chrome['20Efficiency'].'</efficiency_20>
		<efficiency_60>'.$chrome['60Efficiency'].'</efficiency_60>
		<efficiency_80>'.$chrome['80Efficiency'].'</efficiency_80>
		<cas>'.$chrome['CAS'].'</cas>		
	</fluorochrome>';
		
		
		}
		$xml.='</fluorochromes>';
		
die('<textarea>'.$xml.'</textarea>');
	}
	

////////////////////////////////////////////////////////////////////////
/**
 * Panel Builder reagents() function
 * takes a target (and optionally a clone) and returns reagents that match it (them)
 * 
 */	
	function reagents()//?target=CD4&clone=[optional]
	{
		$target = $_GET['target'];
		if(isset($_GET['clone']))
		{
			$clone = $_GET['clone'];
		}
		else
			$clone = '';

		$reagents = $this->search_module->reagents($target, $clone, 'api');

		$xml='<reagents count="'.count($reagents).'">';
		
		foreach($reagents as $reagent)
		{
			$xml.= '
	<reagent id="'.$reagent['id'].'">
		<target name="'.$reagent['target'].'" clone="'.$reagent['clone'].'" />
		<fluorochrome name="'.$reagent['format'].'" />
		<isotype name="'.$reagent['isotype'].'" />
		<product catalog_number="'.$reagent['catalog_number'].'" vendor_id="'.$reagent['vendorid'].'" >
			<amount>'.$reagent['unit_size'].'</amount>
			<price>'.$reagent['price'].'</price>
		</product>
	</reagent>
';
		}		
		$xml.='</reagents>';
			
			
echo '<textarea>'.$xml.'</textarea>';
	}
	
	
	
}//end class
