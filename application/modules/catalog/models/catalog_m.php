<?php
/**
 * Fluorish Models
 * 
 *
 * @package    	Fluorish
 * @category	Models
 * @author     	
 * @version    	0.1b
 */
class Catalog_m extends CI_Model
{

	
	
////////////////////////////////////////////////////////////////////////	
	function __construct()
	{
		parent::__construct();
		$this->load->database();

		$this->db->set_dbprefix('');
		
		
	}

//////////////////////////////////////////////////////////////////////////////////////////
/**
 * Creates a new vendors record
 *
 * @param $data - an array containing
 * 		'name' *required*,
 * 		'url',
 * 		'is_current' - 1 if a current partner, 0 otherwise
 * 		'if_contains - ???
 * 		'email' - *required*
 *			
 */
	function insert($data)
	{
		$current_timestamp = date("Y-m-d H:i:s");
//~ die('catalog_m/insert() $data:<br/><textarea>'.print_r($data, true).'</textarea>');		
		$this->db->set('catalog_number', $data['catalog_number']);
		$this->db->set('vendorid', $data['vendor_id']);
		$this->db->set('vendor_name', $data['vendor_name']);
		$this->db->set('target', $data['target']);
$this->db->set('target_canonical_id', $data['target_canonical_id']);
		//if(isset($data['format']))
			$this->db->set('format', $data['format']);
$this->db->set('format_canonical_id', $data['format_canonical_id']);
		if(isset($data['clone']))
			$this->db->set('clone', $data['clone']);
		if(isset($data['isotype']))
			$this->db->set('isotype', $data['isotype']);
		$this->db->set('unit_size', $data['unit_size']);
		$this->db->set('price', $data['price']);
		$this->db->set('product_url', $data['product_url']);	
		if(isset($data['source_species']))
			$this->db->set('source_species', $data['source_species']);
		if(isset($data['target_species']))
			$this->db->set('target_species', $data['target_species']);
//		$this->db->set('regulatory_statusid', $data['regulatory_statusid']);
//		$this->db->set('categoryid', $data['categoryid']);
		if(isset($data['applicationid']))
			$this->db->set('applicationid', $data['applicationid']);
		$this->db->set('category', $data['category']);
		$this->db->set('categoryid', $data['categoryid']);
		$this->db->set('date_created', $current_timestamp );
		$this->db->set('date_updated', $current_timestamp );
//		$this->db->set('edit_modified', $data['edit_modified']);
		if(isset($data['regulatory_status']))
			$this->db->set('regulatory_status', $data['regulatory_status']);
		else
			$this->db->set('regulatory_status', 'RUO');
		
		$this->db->insert('catalog');

		if($this->db->affected_rows() > 0)
		{
			//$product_id = $this->db->insert_id();
			return $this->db->insert_id(); 		//$product_id;
			//return true;
		}
		else 
			return false;
	}

	
////////////////////////////////////////////////////////////////////////	
	function update($data)
	{
		$current_timestamp = date("Y-m-d H:i:s");
		//~ $vendor_name = $this->vendors_model->get_vendor_name($data['vendor_id']);
		
		
//~ die('catalog_m/update() <br/>$data:<br/><textarea>'.print_r($data, true).'</textarea>');		
		$this->db->where('catalog_number', $data['catalog_number']);
		$this->db->set('vendorid', $data['vendor_id']);
		$this->db->set('vendor_name', $data['vendor_name'] );
		$this->db->set('target', $data['target']);
$this->db->set('target_canonical_id', $data['target_canonical_id']);
		$this->db->set('format', $data['format']);
$this->db->set('format_canonical_id', $data['format_canonical_id']);
		if(isset($data['clone']))
			$this->db->set('clone', $data['clone']);
		if(isset($data['isotype']))
			$this->db->set('isotype', $data['isotype']);
		$this->db->set('unit_size', $data['unit_size']);
		$this->db->set('price', $data['price']);
		if(isset($data['product_url']))
			$this->db->set('product_url', $data['product_url']);
		if(isset($data['source_species']))
			$this->db->set('source_species', $data['source_species']);
		$this->db->set('target_species', $data['target_species']);
//		$this->db->set('regulatory_statusid', $data['regulatory_statusid']);
//		$this->db->set('categoryid', $data['categoryid']);
		$this->db->set('applicationid', $data['applicationid']);
$this->db->set('category', $data['category']);
$this->db->set('categoryid', $data['categoryid']);
//		$this->db->set('date_updated');//, $data['date_updated']);
//		$this->db->set('edit_modified', $data['edit_modified']);
		$this->db->set('date_updated', $current_timestamp );
		if(isset($data['regulatory_status']))
			$this->db->set('regulatory_status', $data['regulatory_status']);
		else
			$this->db->set('regulatory_status', 'RUO');
		
		$this->db->update('catalog');

		if($this->db->affected_rows() > 0)
		{
			$product_id = $this->get_product_id_by_catalog_number($data['catalog_number']);
			return $product_id;
			//return true;
		}
		else 
			return false;
	}
	
////////////////////////////////////////////////////////////////////////	
	function exists($catalog_number, $vendor_id=NULL)
	{
		$this->db->where('catalog_number', $catalog_number);
		if($vendor_id !=NULL)
			$this->db->where('vendorid', $vendor_id);
		$query=$this->db->get('catalog');
		
		if($query->num_rows() > 0)
			return true;
		else 
			return false;
	}
////////////////////////////////////////////////////////////////////////	
	function search($data)
	{
		if(isset($data['target_species']) && $data['target_species'] !='')
			$this->db->where('LOWER(target_species)', strtolower($data['target_species']));
			
		if(isset($data['target']) && $data['target']!='')
			$this->db->where('LOWER(target)', strtolower($data['target']));//$this->thesaurus_module->get_target_canonical($data['target'], true)));
			
		if(isset($data['format']) && $data['format']!='')
			$this->db->where('LOWER(format)', strtolower($data['format']));//$this->thesaurus_module->get_chromes_canonical($data['format'], true)));
			
		if(isset($data['clone']) && $data['clone'] != '')
			$this->db->where('LOWER(clone)', strtolower($data['clone']));//$this->thesaurus_module->get_clones_canonical($data['clone'], true)));
		$result = $this->db->get('catalog')->result_array();

//~ die('query run: '. $this->db->last_query().'<hr/> result:<textarea style="width:90%; height:90%">'.print_r($result, true).'</textarea>');
		
		if(count($result) > 0)
			return $result;
		else 
			return false;
	}
	
////////////////////////////////////////////////////////////////////////	
	function reagent_by_target_clone($target, $clone='')
	{
		$this->db->where('target', $target);
		if(isset($clone) && $clone!='')
			$this->db->where('clone', $clone);
		$reagents = $this->db->get('catalog');
			
		return $reagents->result_array();
	}
	
	
////////////////////////////////////////////////////////////////////////

	function get_product_id_by_catalog_number($catalog_number)
	{
		$this->db->where('catalog_number', $catalog_number);
		$product = $this->db->get('catalog')->row_array();
		
		return $product['id'];
		
	}


	
////////////////////////////////////////////////////////////////////////
	function get_EXCLUDE_arr()
	{
		$raw_array = $this->db->get('excludes')->result_array();
		$returnable = array();
		foreach($raw_array as $raw)
			$returnable[]=$raw['term'];
		
		return $returnable;
	}


}//end class
