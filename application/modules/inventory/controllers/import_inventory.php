<?php
/**
 * The main controller of the Inventory module
 * 
 */

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

// class Home extends MY_Controller {
class Import_inventory extends Secure_Controller 
{
//	private $data;
	private $labid;
	private	$extension;
	private	$worksheetTitle ;
	private	$highestRow   ;
	private	$highestColumn; // e.g 'F' or 'AM'
	private	$highestColumnIndex;
	private	$nrColumns;
	
	private $column_headers = array();
	private $validated_fields = array();					//correlates the column number (0, 1, 2, ...) with the canonical name of the column
	private $errors = array();
	
	private	$uploads_folder = "uploads/inventory/";
	private	$allowedExts = array("xlsx",  "xls");
	
//////////////////////////////////////////////////////////////////////////////////////////
	function __construct()
	{
		parent::__construct();

		$this->data['errors'] = array();
		
		$this->load->model('catalog_field_names_m');
		$this->load->model('inventory_m');
		$this->load->library('PHPExcel');
		
		$this->data['userid'] = $this->data['fl_user']['id'];
		$this->labid = $this->input->post('labid');
		$this->extension = end(explode(".", $_FILES["file"]["name"]));
	}

////////////////////////////////////////////////////////////////////////////////

	function index()
	{
	//check the uploaded file for upload errors
		$this->do_upload();
	//check the fieldnames against canonical names
		if(count($this->data['errors']) === 0 )
		{	$this->validate_fieldnames();
		
	//		echo 'ERROR COUNT:'.count($this->data['errors']).'<br/>' ;
	//		print_r($this->data['errors']);

		//if error-free, do the insert with rollback
			if(count($this->data['errors']) < 1)
			{
	//			echo $this->html_table();
				$this->do_insert();
			}
		}
	//if there are errors, alert the user
		else 
		{	
//			echo '<h1>errors encountered. Not Inserting:</h1>'.print_r($this->data['errors'], true);
			foreach($this->data['errors'] as $error)
			{
				echo $error.'<br/>';
			}
		}

	}

////////////////////////////////////////////////////////////////////////////////
	/**
	 *	Creates a phpExcelObject object from the spreadsheet
	 *	and stores it in $this->data['objPHPExcel'].
	 *	Also peels out worksheet title, highestRow, highestColumn, highestColumnIndex, and number of columns
	 *	and stores them in class variables
	 * 
	 * @param string $filename
	 * @return type objReader object
	 */
	function read_xls($filename)
	{
		
		$inputFileType = PHPExcel_IOFactory::identify($filename);
//echo '<br/>inputFiletype:'.$inputFileType.'<br/>';
		$objReader = PHPExcel_IOFactory::createReader($inputFileType);
		$objReader -> setReadDataOnly(true);				//true if you don't need to write
		$this->data['objPHPExcel'] = $objReader->load($filename);
		
		
		$worksheet = $this->data['objPHPExcel']->getActiveSheet();
			$this->worksheetTitle     = $worksheet->getTitle();
			$this->highestRow         = $worksheet->getHighestRow(); // e.g. 10
			$this->highestColumn      = $worksheet->getHighestColumn(); // e.g 'F'
			$this->highestColumnIndex = PHPExcel_Cell::columnIndexFromString($this->highestColumn);
			$this->nrColumns = ord($this->highestColumn) - 64;
		
		return $this->data['objPHPExcel'];
	}

////////////////////////////////////////////////////////////////////////////////

/**
 * Checks the uploaded file for filetype (by extension), for upload errors, and for filename (against other files in the folder)
 * If all of these checks pass, it calls the appropriate read_foo function(read_xls(), read_csv(), etc)
 * 
 * 
 * 
 */
	function do_upload()
	{
	// first, make sure it's an allowed filetype	
		if (!in_array($this->extension, $this->allowedExts))
		{
			$this->data['errors']['file_extension_error'] = "Invalid file type";
		}
		
		else
		{
		//next, make sure the upload worked properly	
			if ($_FILES["file"]["error"] > 0)
			{
				$this->data['errors']['upload_error'] = "Return Code: " . $_FILES["file"]["error"] . "<br>";
			}
			else
			{
			// avoid filename confusion 	
				if (file_exists($this->uploads_folder . $_FILES["file"]["name"]))
				{
					$this->data['errors']['file_name_error'] =  $_FILES["file"]["name"] . "A file by this name already exists. ";
				}
				else
				{		
				// if no upload errors, pass the filename to read_xls() for processing by the phpExcel library
					$filename = $_FILES['file']['tmp_name'];
					$this->read_xls($filename);					
				}//end if(has new name) - else
			}//end if(upload errors)
		}//end if(allowed file type)

	}
	
	
	
////////////////////////////////////////////////////////////////////////////////
/**
 * list of canonical field names
 * list of spreadsheet column names
 * 
 * foreach spreadsheet name, check each canonical name for a match
 *	if found, insert into validated_columns array
 *		canonical => spreadsheet
 * 
 */	
	function validate_fieldnames()
	{
		$errors = array();
//		$canonicals = $this->catalog_field_names_m->canonical_names();
		$this->column_headers = $this->get_xls_headernames();

//echo '<textarea style="background-color:blue">'.	print_r($canonicals, true) .'</textarea>';
			
	$col=0;
		foreach($this->column_headers as $column)
		{
			$result = $this->catalog_field_names_m->get_canonical($column);
			if(isset($result[0]))
			{	
echo '<br/>spreadsheet: '.$column.' | db: '.$result[0]['canonical_name'].'<br/>';
				$this->validated_fields[$col] = $result[0]['canonical_name'];
			}
			else
				$errors[$column] = 'unknown column: '.$column.'<br/>';
			$col++;
		}
		
if(count($errors) > 0)
{	
	$this->data['errors'] = array_merge($this->data['errors'], $errors);
//echo '<hr/><span style="color:violet">number:'.count($this->data['errors']).'<br/>$this->data[\'errors\']:'.print_r($this->data['errors'], true).'</span><hr/>';
}
//else 
//	echo'<hr/>$this->validated_fields:'.print_r($this->validated_fields, true).'<hr/>';


//$this->data['objPHPExcel ']
//	   $this->data['objPHPExcel ']->getActiveSheet()->fromArray(array_keys($d), null, 'A1');
	}
	
////////////////////////////////////////////////////////////////////////////////
/**
 * 
 * @return type
 */	
	function get_xls_headernames()
	{

		$worksheet = $this->data['objPHPExcel']->getActiveSheet();
		$colarray = array();

		$row = 1;
		for ($col = 0; $col < $this->highestColumnIndex; $col++) 
		{
			$colarray[$col] = $worksheet->getCellByColumnAndRow($col, $row)->getValue();
		}
//echo '<hr/><h1>xls column names:</h1><textarea style="background-color:red">'.print_r( $colarray , true) .'</textarea>';

		return $colarray;
	}
	

	
	
	
////////////////////////////////////////////////////////////////////////////////
/**
 * Loops through the spreadsheet, inserting each row into the inventory table.
 *  Inserts happen within a transaction block, so if any of the inserts fails, it will revert them all
 * 
 */
	function do_insert()
	{
		$this->db->trans_start();
		
		$worksheet = $this->data['objPHPExcel']->getActiveSheet();
		$data['userid'] = $this->data['fl_user']['id'];
		$data['labid'] = $this->labid;
		
		 for ($row = 2; $row <= $this->highestRow; ++ $row) 
		{
			for ($col = 0; $col < $this->highestColumnIndex;  $col++ ) 
			{
				$cell = $worksheet->getCellByColumnAndRow($col, $row);
				$val = $cell->getValue();
			//put into $data array as [database_column_name]=>'spreadsheet_column_value'
				 $data[ $this->validated_fields[$col] ] = $val;
			}
//debug:
//echo 'inserting:<textarea>'.print_r($data, true).'</textarea>';		
//end debug
			$this->inventory_m->create($data);
		}
						
		//rollback if errors, commit if no errors	
		$this->db->trans_complete(); 
	
	//alert to failure or success
		if($this->db->trans_status() === FALSE)// Check if transaction result successful
		{
			echo "<BR>------- TRANS FAILED -------</BR>";
			$this->errors['uploadErrors'] = 'UPLOAD ERROR: '.$this->db->_error_message().'<br/>';
		}
		else
		{
			echo "<BR>------- TRANS SUCCESS -------</BR>";
		}
	}//end do_insert()

////////////////////////////////////////////////////////////////////////////////
	
	
/**
 * 
 * @return string
 */	
	function html_table()
	{		
		foreach ($this->data['objPHPExcel']->getWorksheetIterator() as $worksheet) 
		{
			$table= '<hr/><h1>importing into labid '.$this->labid.'</h1> <table class="table table-hover table-bordered" ><tr>';
			for ($row = 1; $row <= $this->highestRow; ++ $row) 
			{
				if($row==1)
					$table.= '<tr class="success"><td>'.$row.'</td>';
				else
					$table.= '<tr><td>'.$row.'</td>';
				for ($col = 0; $col < $this->highestColumnIndex; ++ $col) 
				{
					$cell = $worksheet->getCellByColumnAndRow($col, $row);
					$val = $cell->getValue();

					$table.= '<td>' . $val . '</td>';
				}
				$table.= '</tr>';
			}
			$table.= '</table>';
			return $table;
//			echo $table;
		}//end foreach		
	}
	
	
}//end class