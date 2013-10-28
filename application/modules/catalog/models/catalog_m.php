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
	
		$this->db->set('catalog_number', $data['catalog_number']);
		$this->db->set('vendorid', $data['vendor_id']);
		$this->db->set('vendor_name', $data['vendor_name'] );
		$this->db->set('target', $data['target']);
		$this->db->set('target_canonical_id', $data['target_canonical_id']);
		$this->db->set('format', $data['format']);
		$this->db->set('format_canonical_id', $data['format_canonical_id']);
		if(isset($data['clone']))
		{
			$this->db->set('clone', $data['clone']);
			$this->db->set('cloneid', $data['cloneid']);
		}
		if(isset($data['isotype']))
			$this->db->set('isotype', $data['isotype']);
		$this->db->set('unit_size', $data['unit_size']);
		$this->db->set('price', $data['price']);
		if(isset($data['product_url']))
			$this->db->set('product_url', $data['product_url']);
		if(isset($data['source_species']))
			$this->db->set('source_species', $data['source_species']);
		$this->db->set('target_species', $data['target_species']);
		$this->db->set('applicationid', $data['applicationid']);
		$this->db->set('categoryid', $data['categoryid']);
		$this->db->set('date_updated', $current_timestamp );
		$this->db->set('regulatory_status', $data['regulatory_status']);
		$this->db->set('regulatory_statusid', $data['regulatory_statusid']);
		$this->db->set('item_name', $data['item_name']);
		
		
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
/** during automatic imports, only do an update if the price for that
 * catalog number has changed
 * 
 * returns true if price is different (ie. should we update? price is different, so yes)
 * returns false if price is the same (ie. NO, don't update)
 */	
	function pre_update_price_check($data)
	{
		$result = $this->db->where('catalog_number', $data['catalog_number'])
			->get('catalog')
			->row_array();
		
		if($data['price'] != $result['price'])
			return true;
		else 
			return false;
			
	}

////////////////////////////////////////////////////////////////////////
	function update($data)
	{
		$current_timestamp = date("Y-m-d H:i:s");
		
		$this->db->where('catalog_number', $data['catalog_number']);
		$this->db->set('vendorid', $data['vendor_id']);
		$this->db->set('vendor_name', $data['vendor_name'] );
		$this->db->set('target', $data['target']);
		$this->db->set('target_canonical_id', $data['target_canonical_id']);
		$this->db->set('format', $data['format']);
		$this->db->set('format_canonical_id', $data['format_canonical_id']);
		if(isset($data['clone']))
		{
			$this->db->set('clone', $data['clone']);
			$this->db->set('cloneid', $data['cloneid']);
		}
		if(isset($data['isotype']))
			$this->db->set('isotype', $data['isotype']);
		$this->db->set('unit_size', $data['unit_size']);
		$this->db->set('price', $data['price']);
		if(isset($data['product_url']))
			$this->db->set('product_url', $data['product_url']);
		if(isset($data['source_species']))
			$this->db->set('source_species', $data['source_species']);
		$this->db->set('target_species', $data['target_species']);
		$this->db->set('applicationid', $data['applicationid']);
		$this->db->set('categoryid', $data['categoryid']);
		$this->db->set('date_updated', $current_timestamp );
		$this->db->set('regulatory_status', $data['regulatory_status']);
		$this->db->set('regulatory_statusid', $data['regulatory_statusid']);
		$this->db->set('item_name', $data['item_name']);
			
			
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
	function exists_product_application($application_id, $catalog_number) 
	{
		$this->db->where('catalog_number', $catalog_number)
			->where('application_id', $application_id);
		$query = $this->db->get('products_applications');
		
		if($query->num_rows() > 0)
			return true;
		else 
			return false;
	}
////////////////////////////////////////////////////////////////////////
	function insert_product_application($application_id, $catalog_number)
	{
		$this->db->set('catalog_number', $catalog_number)
			->set('application_id', $application_id);
		$query = $this->db->insert('products_applications');
			
		if( $this->db->affected_rows() == 1 )
			return true;
		else return false;
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
	function get_regulatory_status_id_by_name($regulatory_status)
	{
		$this->db->where('regulatory_status_name', $regulatory_status);
		$result = $this->db->get('regulatory_status')->row_array();
		if($result)
			return $result['regulatory_status_id'];
		else return false;
	}
////////////////////////////////////////////////////////////////////////
	function get_clone_id_by_name($clone)
	{
		$this->db->where('clone_name', $clone);
		$result = $this->db->get('clones')->row_array();
		if($result)
			return $result['id'];
		else return false;
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



////////////////////////////////////////////////////////////////////////
function start_log($data)
{
	$this->db
		//->set('user_id', $data['user_id'])
		->set('status', $data['status'])
		//->set('filename', $data['filename'])
		->insert('catalog_import_log');
		
	return $this->db->insert_id();

}

////////////////////////////////////////////////////////////////////////////////
/** log what's happening with the catalog importer
 * 
 */
	function log_import($data)
	{
		$this->db
			->where('id', $data['logid'])
			->set('vendor_id', $data['vendor_id'])
			->set('filename', $data['filename'])
			->set('num_rows', $data['num_rows'])
			->set('num_updates', $data['num_updates'])
			->set('num_inserts', $data['num_inserts'])
			->set('num_excludes', $data['num_excludes'])
			->set('num_ignored', $data['num_ignored'])
			->set('upload_errors', serialize($data['upload_errors']))
			->set('parse_errors', serialize($data['parse_errors']))
			->set('unknown_fields', serialize($data['unknown_fields']))
			->set('bad_application', serialize($data['bad_application']))
			->set('bad_category', serialize($data['bad_category']))
			->set('missing_fields', serialize($data['missing_fields']))
			->set('missing_targets', serialize($data['missing_targets']))
			->set('missing_chromes', serialize($data['missing_chromes']))
			->set('missing_clones', serialize($data['missing_clones']))
			->set('missing_species', serialize($data['missing_species']))
			->set('status', $data['status']);
			if(isset($data['user_id']))
				$this->db->set('user_id', $data['user_id']);
		//$result = $this->db->insert('catalog_import_log');
		$result = $this->db->update('catalog_import_log');
			
			return $result;

	}
////////////////////////////////////////////////////////////////////////////////
	function quick_update($data)
	{		
		$peak_mem_old = $this->get_log_peak_mem($data['logid']);
		$peak_mem_now = memory_get_peak_usage();
//die("peak_mem: ".$peak_mem);		
		$this->db->where('id', $data['logid'])
			->set('num_updates', $data['update_num'])
			->set('num_inserts', $data['insert_num'])
			->set('num_excludes', $data['exclude_num'])
			->set('num_ignored', $data['num_ignored'])
			->set('status', $data['status'])
			->set('num_rows', $data['num_rows'])
			->set('current_memory', memory_get_usage());
		if($peak_mem_old < $peak_mem_now)
			$this->db->set('memory_peak', $peak_mem_now );//$peak_mem);
			
			
		$this->db->update('catalog_import_log');
	}
////////////////////////////////////////////////////////////////////////////////
function get_log_status($logid)
{
	$this->db->where('id', $logid);
	$result = $this->db->get('catalog_import_log')->row_array();
	if($result)
		return $result;
	else
		return false;
}
function get_log_peak_mem($logid)
{
	$result = $this->db
		//->select('memory_peak')
		->where('id', $logid)
		->get('catalog_import_log')->row_array();
		
	if(isset($result['memory_peak']))
		return $result['memory_peak'];
	else return 0;
}
////////////////////////////////////////////////////////////////////////////////
}//end class
