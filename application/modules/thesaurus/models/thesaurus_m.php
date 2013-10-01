<?php defined('BASEPATH') or exit('No direct script access allowed');
/**
 * species model
 *
 * @author 		
 * @website		http://www.fluorish.com
 * @package 	Fluorish
 * @subpackage 	Vendors
 * @copyright 	2013 Fluorish
 */
class Thesaurus_m extends CI_Model// MY_Model 
{


	public function __construct()
	{
		parent::__construct();

		$this->load->database();
	
		//this table doesn't have the prefix, so set the prefix to ''
		$this->db->set_dbprefix('');
		
	}
	
////////////////////////////////////////////////////////////////////////////////
	
	function get_all_canonical($term)
	{
		$chrome =  $this->get_chromes_canonical($term);
		$target = $this->get_targets_canonical($term);
		$species = $this->get_species_canonical($term);
		$cat_head = $this->get_catalog_header_canonical($term);
		
		if($chrome) return $chrome;
		if($target) return $target;
		if($species) return $species;
		if($cat_head) return $cat_head;
		
		return false;
	}
	
////////////////////////////////////////////////////////////////////////////////
	
	function get_chromes_canonical($term)
	{
				
		$this->db->where('chrome_name', urldecode($term) );
		$this->db->or_where('alternate_name', urldecode($term) );
		$query = $this->db->get('chromes_alternate_name');
		
		if ($query->num_rows() > 0)
		{
			$result = $query->result_array();
			return $result[0]['chrome_name'];
		}	
		else return false;
	}

////////////////////////////////////////////////////////////////////////////////
	
	function get_species_canonical($term)
	{
		$this->db->where('species_name', urldecode($term));
		$this->db->or_where('alternate_name', urldecode($term) );
		$query = $this->db->get('species_alternate_name');
				
		if ($query->num_rows() > 0)
		{
			$result = $query->result_array();
			return $result[0]['species_name'];
//			return $query->result();
		}	
		else return false;

	}
	
////////////////////////////////////////////////////////////////////////////////
	
	function get_targets_canonical($term)
	{
		$this->db->where('target_name', urldecode($term) );
		$this->db->or_where('alternate_name', urldecode($term) );
		$query = $this->db->get('targets_alternate_name');
		
		if ($query->num_rows() > 0)
		{
			$result = $query->result_array();
			return $result[0]['target_name'];
		}	
		else return false;

	}
	function get_targets_alternates($term)
	{
		//~ $target = $this->get_targets_canonical($term);
		
		$this->db->select('alternate_name');
		$this->db->where('target_name', $term);
		return $this->db->get('targets_alternate_name')->result_array();
		
	}
	function get_catalog_header_canonical($term)
	{
		
////////////////////////////////////////////////////////////////////////////////
//		die('got to thesaurus_m/get_catalog_header_canonical(). term:'.$term);
		$this->db->join('catalog_field_canonical', 'catalog_field_canonical.id = catalog_field_alternate_names.canonical_nameid');
		$this->db->where('canonical_name', urldecode($term) );
		$this->db->or_where('alternate_name', urldecode($term) );
		$query = $this->db->get('catalog_field_alternate_names');
		
		if ($query->num_rows() > 0)
		{
			$result = $query->result_array();

			return $result[0]['canonical_name'];
		}	
		else 
			return false;
		

	}
////////////////////////////////////////////////////////////////////////////////
	function exists_clone($term)
	{
		$this->db->where('clone_name', $term);
		$query = $this->db->get('clones');
		if($query->num_rows() > 0)
			return true;
		$this->db->where('alternate_name', $term);
		$query = $this->db->get('clone_alternate_name');
		if($query->num_rows() >0)
			return true;
		else 
			return false;
	}
	function exists_chrome($term)
	{
		$this->db->where('chrome_name', $term);
		$query = $this->db->get('chromes');
		if($query->num_rows() > 0)
			return true;
		
		$this->db->where('alternate_name', $term);
		$query = $this->db->get('chromes_alternate_name');
		if($query->num_rows() >0)
			return true;
		
		//~ $this->db->where('exception_name', $term);
		//~ $query = $this->db->get('chrome_exceptions');
		//~ if($query->num_rows() >0)
			//~ return true;
		else 
			return false;
	}
	function exists_species($term, $return=true)
	{
		$this->db->where('species_name', $term);
		$query = $this->db->get('species');
		if($query->num_rows() > 0)
			if($return)
				return true;
			else
			{	
				die( 'We know about '.$term );
			}
		$this->db->where('alternate_name', $term);
		$query = $this->db->get('species_alternate_name');
		if($query->num_rows() >0)
		{	if($return)
				return true;
			else
				echo 'We know about '.$term;
		}
		else 
		{	if($return)
				return false;
			else
				echo 'We do not know about '.$term;	
	
		}	
	}
	
	function exists_target($term)
	{
		$this->db->where('target_name', $term);
		$query = $this->db->get('targets');
		if($query->num_rows() > 0)
			return true;
		$this->db->where('alternate_name', $term);
		$query = $this->db->get('targets_alternate_name');
		if($query->num_rows() >0)
			return true;
		//~ $this->db->where('exception_name', $term);
		//~ $query = $this->db->get('target_exceptions');
		//~ if($query->num_rows() >0)
			//~ return true;
		else 
			return false;	
	}
	
	
	function get_applicationid($application_name)
	{
		$this->db->where('alternate_name', $application_name);
		$query = $this->db->get('catalog_application_alternate_names');
		if($query->num_rows() > 0)
		{
			$result = $query->result_array();
//die('result_array:<textarea>'.print_r($query->result_array(), true).'</textarea>');
			return $result[0]['applicationid'];
		}
		else
			return false;
		
	}
		function get_categoryid($category_name)
	{
		$this->db->where('category_alternate_name', $category_name);
		$query = $this->db->get('catalog_category_alternate_names');
		if($query->num_rows() > 0)
		{
			$result = $query->result_array();
//die('result_array:<textarea>'.print_r($query->result_array(), true).'</textarea>');
			return $result[0]['categoryid'];
		}
		else
			return false;
		
	}
	
	
	
	
////////////////////////////////////////////////////////////////////////////////
///////////	INSERTS	///////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////	
	
	function insert_chrome($data)
	{
		
		$this->db->set('chrome_name', $data['chrome_name']);
		$this->db->set('excitation', $data['excitation']);
		$this->db->set('emission', $data['emission']);
		$this->db->set('category', $data['category']);
		$this->db->set('live_dead', $data['live_dead']);
		$this->db->set('20efficiency', $data['20efficiency']);
		$this->db->set('60efficiency', $data['60efficiency']);
		$this->db->set('80efficiency', $data['80efficiency']);
		if(isset($data['cas']))
			$this->db->set('cas', $data['cas']);
		
		$this->db->insert('chromes');

		if($this->db->affected_rows() > 0)
		{
			$data['alternate_name'] = $data['chrome_name'];
			$alt_result = $this->insert_chrome_alternate($data);
			return true;
		}
		else 
			return false;
	}
	
	function insert_chrome_alternate($data)
	{
		$this->db->set('chrome_name', $data['chrome_name']);
		$this->db->set('alternate_name', $data['alternate_name']);
		
		$this->db->insert('chromes_alternate_name');

		if($this->db->affected_rows() > 0)
			return true;
		else 
			return false;		
	}
	
	function insert_species($data)
	{
		$this->db->set('species_name', $data['species_name']);
				$this->db->insert('species');

		if($this->db->affected_rows() > 0)
		{
			$data['alternate_name'] = $data['species_name'];
			$alt_result = $this->insert_species_alternate($data);
			//~ if($alt_result)
				return true;
			//~ else return false;
		
		}
		else 
			return false;	
	}
	
	function insert_species_alternate($data)
	{
		$this->db->set('species_name', $data['species_name']);
		$this->db->set('alternate_name', $data['alternate_name']);
		
		$this->db->insert('species_alternate_name');

		if($this->db->affected_rows() > 0)
			return true;
		else 
			return false;		
	}
	
	function insert_target($data)
	{
		$this->db->set('target_name', $data['target_name']);
				$this->db->insert('targets');

		if($this->db->affected_rows() > 0)
		{
			$data['alternate_name'] = $data['target_name'];
			$alt_result = $this->insert_target_alternate($data);
			//~ if($alt_result)
				return true;
			//~ else return false;
		}
		else 
			return false;		
	}
	
	function insert_target_alternate($data)
	{
		$this->db->set('target_name', $data['target_name']);
		$this->db->set('alternate_name', $data['alternate_name']);
		
		$this->db->insert('targets_alternate_name');

		if($this->db->affected_rows() > 0)
			return true;
		else 
			return false;
	}
	
	
	function get_all_chromes()
	{
	return $this->db->get('chromes')->result_array();
	}
	function get_all_species()
	{
		return $this->db->get('species')->result_array();
	}
	function get_all_targets()
	{
		return $this->db->get('targets')->result_array();
	}
}//end class
	
