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


class Search extends Loggedin_Controller// Secure_Controller
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
		
	}
	
////////////////////////////////////////////////////////////////////////
	function userCytometers()
	{
		
	}
	
////////////////////////////////////////////////////////////////////////
	
	function targets()
	{
//~ $params = $_GET; //$this->input->get_post();
//~ die('$params: <pre>'.print_r($params, true).'</pre>' );

	//if species is set, they're looking for all targets that match that species
		if(isset($_GET['species']))
		{
			$this->load->model('target_species_model');
			
			$params['species'] = $this->input->get_post('species', true);
			$species = $this->thesaurus->get_species_canonical($params['species'], true );
			$targets = $this->target_species_model->read_by_species($species);
			
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
		
		
	//otherwise, they're looking for clones that match certain targets	
		else if(isset($_GET['detailed']))
		{
			$targets = explode(',', $this->input->get_post('targets') );
die('detailed was TRUE and targets was <pre>"'.print_r($targets, true).'"</pre>');			
			
			$xml = '<targets>
'; //.......
			foreach($targets as $target)
			{
				$clones = $this->get_clones_for_target($target);
				
				
				$xml .= '	<target name="'.$target.'">
'; //.......
				
				
				$xml .= '	</target>';
			}
			$xml .= '</targets>
'; //.......
			return $xml;
		}
		

		
		
		echo 'I guess it worked';
	}
	
	
	
	
	
	
	
////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////
	function targets_for_species($species)
	{
		$this->load->model('target_species_model');
		
		$targets = $this->target_species_model->read_by_species($species);
		
//~ die('targets for '.$species.': <br/>
		//~ <textarea style="width:90%; height:80%;">'.print_r($targets, true).'</textarea><br/>
		//~ count of results: '.count($targets).'<br/>
	//~ ');
		//~ $returnable = array();
		//~ $alts = array();
		//~ foreach($targets as $target)
		//~ {
			//~ $alts = 
		//~ }
		
		return $target_alts;
	}
	
	
	function get_search_form($data)
	{
		return $this->load->view('partials/search_p', $data, true);
	}
	
	
	
	
	function get_all_targets($starts_with='')
	{
		//~ $this->load->model('targets_model');
		return $this->targets_model->get_all($starts_with);
	}
	function get_all_target_names($starts_with='')
	{
		$targets = $this->get_all_targets($starts_with);
		$returnable = array();
		foreach ($targets as $target)
		{
			$returnable[] = $target['target_name'];
		}
		return $returnable;
	}
	
	function get_all_species($starts_with = '')
	{
		//~ $this->load->model('species_model');
		return $this->species_model->get_all($starts_with);
	}
	
	function get_all_chromes($starts_with='')
	{
	//~ $this->load->model('chromes_model');
		return $this->chromes_model->get_all($starts_with);
	}
	function get_all_chrome_names($starts_with='')
	{
		$chromes = $this->get_all_chromes($starts_with);
		$returnable=array();
		foreach($chromes as $chrome)
		{
			$returnable[]= $chrome['chrome_name'];
		}
		return $returnable;
	}
	function get_all_clones($starts_with='')
	{
		//~ $this->load->model('clones_model');
		return $this->clones_model->get_all($starts_with);
	}
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

}//end class
