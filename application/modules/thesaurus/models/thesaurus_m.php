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
////////////////////////////////////////////////////////////////////////////////
////////////////////	GET CANONICAL NAMES	////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////
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

	function get_catalog_header_canonical($term)
	{
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
////////////////////////////////////////////////////////////////////////////////
////////////////////	GET ALTERNATE NAMES	////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////
	function get_all_alternates($term)
	{
		$chrome =  $this->get_chrome_alternates($term);
		if($chrome) return $chrome;
		$target = $this->get_target_alternates($term);
		if($target) return $target;
		$species = $this->get_species_alternates($term);
		if($species) return $species;
		$cat_head = $this->get_catalog_header_alternates($term);
		if($cat_head) return $cat_head;		
	//if none of these has a result, we don't know that term	
		return false;
	}
	function get_chrome_alternates($term)
	{
		$this->db->where('chrome_name', urldecode($term) );
		$this->db->or_where('alternate_name', urldecode($term) );
		$query = $this->db->get('chromes_alternate_name')->row_array();
		
		
		if ($query)//->num_rows() > 0)
		{
//~ die($query['chrome_name']);
			$canonical = $query['chrome_name'];
			
			$this->db->where('chrome_name', $canonical);
			$result = $this->db->get('chromes_alternate_name')->result_array();
			
			//~ $result = $query->result_array();
			return $result;
		}	
		else return false;
	}
////////////////////////////////////////////////////////////////////////////////
	function get_species_alternates($term)
	{
		//~ $this->db->where('species_name', urldecode($term));
		//~ $this->db->or_where('alternate_name', urldecode($term) );
		//~ $query = $this->db->get('species_alternate_name');
				//~ 
		//~ if ($query->num_rows() > 0)
		//~ {
			//~ $result = $query->result_array();
			//~ return $result;
		//~ }	
		//~ else return false;
		$this->db->where('species_name', urldecode($term) );
		$this->db->or_where('alternate_name', urldecode($term) );
		$query = $this->db->get('species_alternate_name')->row_array();
		
		
		if ($query)//->num_rows() > 0)
		{
//~ die($query['chrome_name']);
			$canonical = $query['species_name'];
			
			$this->db->where('species_name', $canonical);
			$result = $this->db->get('species_alternate_name')->result_array();
			
			//~ $result = $query->result_array();
			return $result;
		}	
		else return false;
	}
////////////////////////////////////////////////////////////////////////////////
	function get_target_alternates($term)
	{
		//~ // $this->db->select('alternate_name');
		//~ // $this->db->where('target_name', $term);
		//~ // return $this->db->get('targets_alternate_name')->result_array();	
		//~ $this->db->where('target_name', urldecode($term) );
		//~ $this->db->or_where('alternate_name', urldecode($term) );
		//~ $query = $this->db->get('targets_alternate_name');
		//~ 
		//~ if ($query->num_rows() > 0)
		//~ {
			//~ $result = $query->result_array();
			//~ return $result;
		//~ }	
		//~ else return false;	
		$this->db->where('target_name', urldecode($term) );
		$this->db->or_where('alternate_name', urldecode($term) );
		$query = $this->db->get('targets_alternate_name')->row_array();
		
		
		if ($query)//->num_rows() > 0)
		{
//~ die($query['chrome_name']);
			$canonical = $query['target_name'];
			
			$this->db->where('target_name', $canonical);
			$result = $this->db->get('targets_alternate_name')->result_array();
			
			//~ $result = $query->result_array();
			return $result;
		}	
		else return false;
	}
////////////////////////////////////////////////////////////////////////////////
	function get_application_alternates($term)
	{
		//~ $this->db->join('catalog_applications', 'catalog_applications.id = catalog_application_alternate_names.application_id');
		//~ $this->db->where('name', urldecode($term) );
		//~ $this->db->or_where('alternate_name', urldecode($term) );
		//~ $query = $this->db->get('catalog_application_alternate_names');
		
		$this->db->where('alternate_name', urldecode($term));
		$app_id = $this->db->get('catalog_application_alternate_names');
		if($app_id->num_rows() <1)
			return false;
		else
		{
			$app_id = $app_id->result_array();
			$app_id = $app_id[0]['application_id'];
		}
		$this->db->join('catalog_applications', 'catalog_applications.id = catalog_application_alternate_names.application_id');
		$this->db->where('application_id', $app_id);
		$query = $this->db->get('catalog_application_alternate_names');
		
//~ die('thesaurus_m/get_application_alternates() <br/>$term:'.$term.'<br/> $query:<br/><textarea>'.print_r($query->result_array(), true).'</textarea>');
		if ($query->num_rows() > 0)
		{
			$result = $query->result_array();
			return $result;
		}	
		else 
			return false;
	}
	
	function get_catalog_header_alternates($term)
	{
		$this->db->join('catalog_field_canonical', 'catalog_field_canonical.id = catalog_field_alternate_names.canonical_nameid');
		$this->db->where('canonical_name', urldecode($term) );
		$this->db->or_where('alternate_name', urldecode($term) );
		$query = $this->db->get('catalog_field_alternate_names');
		
		if ($query->num_rows() > 0)
		{
			$result = $query->result_array();
			return $result;
		}	
		else 
			return false;
	}
////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////
////////////////////	DO THINGS EXIST?	////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////
	function exists_application($term)
	{
		$this->db->where('alternate_name', $term);
		$query = $this->db->get('catalog_application_alternate_names');
		if($query->num_rows() > 0)
			return true;
		else
			return false;
	}
	function exists_category($term)
	{
		$this->db->where('alternate_name', $term);
		$query = $this->db->get('catalog_category_alternate_names');
		if($query->num_rows() > 0)
			return true;
		else
			return false;
	}
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
		{	
			//~ die('chrome exists');
			return true;
		}
		$this->db->where('alternate_name', $term);
		$query = $this->db->get('chromes_alternate_name');
		if($query->num_rows() >0)
		{	
			//~ die('chrome alternate name exists');
			return true;
		}
		
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
	

////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////
///////////////////		HELPERS			 ///////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////	
	function get_applicationid($application_name)
	{
		$this->db->where('alternate_name', $application_name);
		$query = $this->db->get('catalog_application_alternate_names');
		if($query->num_rows() > 0)
		{
			$result = $query->result_array();
//~ //die('result_array:<textarea>'.print_r($query->result_array(), true).'</textarea>');
			return $result[0]['application_id'];
		}
		else
			return false;
		
	}
////////////////////////////////////////////////////////////////////////////////
	function get_categoryid($category_name)
	{
		$this->db->where('alternate_name', $category_name);
		$query = $this->db->get('catalog_category_alternate_names');
		if($query->num_rows() > 0)
		{
			$result = $query->result_array();
//die('result_array:<textarea>'.print_r($query->result_array(), true).'</textarea>');
			return $result[0]['category_id'];
		}
		else
			return false;
		
	}
	
	
	
	 
////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////
///////////		INSERTS		////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////	
////////////////////////////////////////////////////////////////////////////////
	
	function insert_cat_head_alternate($data)
	{
//~ die('thesaurus_m/insert_cat_head_alternate() $data:<br/><textarea>'.print_r($data, true).'</textarea>');
		$this->db->set('canonical_nameid', $data['canonical_name']);
		$this->db->set('alternate_name', $data['alternate_name']);
		
		$this->db->insert('catalog_field_alternate_names');

		if($this->db->affected_rows() > 0)
			return true;
		else 
			return false;			
	}
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
			$data['is_exception'] = 0;
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
		$this->db->set('is_exception', $data['is_exception']);
		
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
			$data['is_exception'] = 0;
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
		$this->db->set('is_exception', $data['is_exception']);
		
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
			$data['is_exception'] = 0;
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
		$this->db->set('is_exception', $data['is_exception']);
		
		$this->db->insert('targets_alternate_name');

		if($this->db->affected_rows() > 0)
			return true;
		else 
			return false;
	}
	
	function insert_application($data)
	{ 
//~ die('thesaurus_m/insert_application()<br/><textarea>'.print_r($data, true).'</textarea>');
		$this->db->set('name', $data['name']);
		$this->db->insert('catalog_applications');
		
		if($this->db->affected_rows() >0)
		{
			$data['application_id'] = $this->db->insert_id();
			$data['alternate_name'] = $data['name'];
			$data['is_exception'] = 0;
			$alt_result = $this->insert_applications_alternate($data);
			if($alt_result)
				return true;
		}
		return false;
	}
	function insert_applications_alternate($data)
	{
		$this->db->set('application_id', $data['application_id']);
		$this->db->set('alternate_name', $data['alternate_name']);
		$this->db->set('is_exception', $data['is_exception']);
		
		$this->db->insert('catalog_application_alternate_names');
		
		if($this->db->affected_rows() >0)
			return true;
		else
			return false;
	}
	function insert_category($data)
	{ 
//~ die('thesaurus_m/insert_application()<br/><textarea>'.print_r($data, true).'</textarea>');
		$this->db->set('category', $data['category']);
		$this->db->insert('catalog_category');
		
		if($this->db->affected_rows() >0)
		{
			$data['category_id'] = $this->db->insert_id();
			$data['alternate_name'] = $data['name'];
			$data['is_exception'] = 0;
			$alt_result = $this->insert_category_alternate($data);
			if($alt_result)
				return true;
		}
		else
			return false;
	}
	function insert_category_alternate($data)
	{
		$this->db->set('category_id', $data['category_id']);
		$this->db->set('alternate_name', $data['alternate_name']);
		$this->db->set('is_exception', $data['is_exception']);
		
		$this->db->insert('catalog_category_alternate_names');
		
		if($this->db->affected_rows() >0)
			return true;
		else
			return false;
	}
	
	
	
////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////
///////////		GET_ALLs		////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////	
////////////////////////////////////////////////////////////////////////////////
	
	
	function get_all_cat_heads()
	{
		$this->db->order_by('canonical_name', 'asc');
		return $this->db->get('catalog_field_canonical')->result_array();
	}
	function get_all_applications()
	{
		return $this->db->get('catalog_applications')->result_array();
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
	
