<?php
if (!defined('BASEPATH'))   exit('No direct script access allowed');

//~ require_once('../membership/resources.php');
//~ require_once  APPPATH.'modules/membership/controllers/resources.php';

 //~ class Fred extends MY_Controller 
//~ class Fred extends Resources
class Fred extends Loggedin_Controller
{


	//~ private $data = array();

	
//////////////////////////////////////////////////////////////////////////////////////////
/**
 * 
 */
	function __construct()
	{
		parent::__construct();

		$this->load->library('form_validation');
	
		//~ $this->load->helper('form');
		$this->load->helper('url');
		//~ $this->load->helper('xml');
		
		
	
		if(isset($this->session->userdata['logged_in']))
			$this->get_session();
		else die('no session variable');
		
	}// end __construct()
	
////////////////////////////////////////////////////////////////////////
	function get_resource($function, $resource_id )
	{
		foreach($this->session->userdata['groups'] as $group)
		{
			foreach($group['resources'] as $key=>$value)
			{
				if($key == $resource_id)
				{
//~ die('$value["xml"]:<br/><textarea>'.print_r($value, true).'</textarea>');
					$this->xml_to_html($function, $value['xml'], $resource_id, $value['group_id']);
				}
			}
		}
		
		
		
		//~ die("session->userdata['groups']:<br/><textarea>".print_r($this->session->userdata['groups'], true)."</textarea>");
		
	}
////////////////////////////////////////////////////////////////////////

	function xml_to_html($function, $xml = null, $resource_id = null, $group_id = null )
	{
		if($xml !== null)
			$data['xml_obj'] = new SimpleXMLElement($xml);
		if($resource_id !==null)
			$data['resource_id'] = $resource_id;
		if($group_id !== null)
			$data['group_id'] = $group_id;
//~ die('resource_id:'.$data['resource_id'].'<br/>group_id: '.$data['group_id'].'<br/>xml:<br/><textarea>'.print_r($data['xml_obj'], true).'</textarea>');
		//~ if(isset($data))
		//~ {	
			switch($data['xml_obj']->attributes()->type)
			{
				case 'xml/cyt':
					//~ $this->load->view('debug_cytometer_p', $data);
					if($function === 'display')
						$this->load->view('display_cytometer_p', $data);
					else if ($function === 'form')
						$this->load->view('form_cytometer_p', $data);
					break;
				case 'xml/panel':
					echo 'it\'s a panel';
					if($function === 'display')
						$this->load->view('display_panel_p', $data);
					else if ($function === 'form')
						$this->load->view('form_panel_p', $data);
					break;
				case 'xml/addr':
					echo 'it\'s an address';
						if($function === 'display')
							$this->load->view('display_address_p', $data);
						else if ($function === 'form')
							$this->load->view('form_address_p', $data);
					break;
				case 'xml/file':
					echo 'it\'s a file';
					break;
				case 'xml/inv':
					echo 'it\'s an inventory';
					break;
				default:
					echo 'Can\'t determine resource_type from XML';
			}
		//~ }
		//~ else
		//~ {
			//~ $this->load->view('header_v');
			//~ if($function === 'form')
				//~ $this->load->view('form_cytometer_p');
		//~ }								

	}
	
////////////////////////////////////////////////////////////////////////
	
	function display_address()
	{
		$this->load->view('header_v');
		
		//~ $this->load->view('display_address_p');
		$this->load->view('form_address_p');
	}
////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////
////////////	DEBUG FUNCTIONS ONLY BELOW HERE		////////////////////
////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////
	
	function debug_cyt($function)
	{
		$this->load->view('header_v');
		$resource_id = 12;
		$group_id = 11;
		$xml = '<?xml version="1.0" encoding="UTF-8"?>
	<FlowCytometer type="xml/cyt" name="test cytometer">
		<GeneralInfo manufacturer="BD Biosciences" model="Accuri C6"  >
		</GeneralInfo>		
		<LightSource type="green"  wavelength="405">
			<Detector wavelength="178.5"  bandwidth="111"></Detector>
			<Detector wavelength="178.5"  bandwidth="111"></Detector>
		</LightSource>
		<LightSource type="blue"  wavelength="488">
			<Detector wavelength="450"  bandwidth="100"></Detector>
		</LightSource>
		<LightSource type="yellow"  wavelength="666">
			<Detector wavelength="620"  bandwidth="20"></Detector>
			<Detector wavelength="670"  bandwidth="20"></Detector>
			<Detector wavelength="820"  bandwidth="70"></Detector>
		</LightSource>
	</FlowCytometer>
';
		$this->xml_to_html($function, $xml, $resource_id, $group_id );
	}
	
////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////

	function debug_panel($function)
	{//<?xml version="1.0" encoding="UTF-8"? >
		$this->load->view('header_v');
		$resource_id = 14;
		$group_id = 11;
		$xml = '<?xml version="1.0" encoding="UTF-8"?>
<Panel xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns="http://www.treestar.com/schemas/FlowJo/PanelWizard" type="xml/panel" >
	 <Dyes  />
	 <Channels  >
		  <Channel target="CD11c" fluor="APC" vendor="(CUSTOM)BD" catalog="340544" amount="" price="" clone="" alternates=""  />
		  <Channel target="MHC II" fluor="PerCP-Cy5.5" vendor="(CUSTOM)BD" catalog="" amount="" price="" clone="" alternates=""  />
		  <Channel target="CD123" fluor="Pacific Blue" vendor="(CUSTOM)BD Biosciences" catalog="" amount="" price="" clone="" alternates=""  />
		  <Channel target="CD14" fluor="Alexa Fluor 700" vendor="BD Biosciences" catalog="557923" amount="0.1 mg" price="-" clone="M5E2" alternates="LPS Receptor"  />
		  <Channel target="CD86" fluor="PE" vendor="eBioscience" catalog="12-0869-73" amount="100 tests" price="$279" clone="IT2.2" alternates="B7-2:Ly-58:B70"  />
		  <Channel target="CD40" fluor="FITC" vendor="eBioscience" catalog="11-0409-42" amount="100 tests" price="$179" clone="5C3" alternates="TNFRSF5:BP50"  />
		  <Channel target="CD19" fluor="Biotin *PE-Texas Red" vendor="(CUSTOM)BD Biosciences" catalog="555411" amount="" price="" clone="" alternates=""  />
	 </Channels >
	 <Experiment name="Identification of B cells through negative gating" date="March 23, 2011" investigator="Darren Blimkie" lab="Kollman" description="Polychromatic flow cytometric analysis takes advantage &#xA;   of the increasing number of available fluorophores to positively identify and simultaneously assess multiple parameters in the same cell (1). Additional parameters &#xA;   may be analyzed through negative identification (i.e., through exclusion of particular stains or antibodies employed). In this report, we tested whether such negative-gating strategy would identify human B lymphocytes in innate immune phenotyping studies. &#xA;   To this end, B cells were identified as the negatively-stained subpopulation from the CD123 vs. CD11c plot of the&#xA;   CD14neg-low, MHC IIhigh human peripheral blood mononuclear cells. To test the specificity&#xA;   of this negative gating approach, we confirmed that negatively gated B cells indeed expressed CD19, the bona fide marker for human B cells. However, a small number of&#xA;   unidentified cells were contained in the negatively-gated B cells. Furthermore, a small percentage cells expressing markers used to identify monocytes and myeloid dendritic&#xA;   cells (mDC) coexpressed CD19. This identifies such negative B-cell gating approach as&#xA;   potentially problematic. When applied to the analysis of Toll-like receptors (TLR) stimulation experiments, we were however able to interpret the results, as B-cells respond&#xA;   to TLR stimulation in a qualitative different pattern as compared to monocytes and DC. This report is presented in a manner that is fully compliant with the Minimum&#xA;   Information about a Flow Cytometry Experiment (MIFlowCyt) standard, which was recently adopted by the International Society for Advancement of Cytometry (ISAC)&#xA;   (2) and incorporated in the publishing policies of Cytometry and other journals. We demonstrate how a MIFlowCyt-compliant report can be prepared with minimal effort, and yet provide the reader with a much clearer picture of the portrayed FCM experiment&#xA;   and data." cytoName="" add1Label="" add2Label="Orginal Date" add3Label="" add1="" add2="October 10th, 2008" add3=""  />
	
	<FlowCytometer  >
		<GeneralInfo manufacturer="BD Biosciences" model="FACSAria"  />
		<LightSource wavelength="407" type="Violet Laser"  >
			<Detector used="1" chrome="Pacific Blue" secondary="" target="CD123" wavelength="450" bandwidth="40"  />
			<Detector used="0" chrome="" secondary="" target="" wavelength="478" bandwidth="16"  />
			<Detector used="0" chrome="" secondary="" target="" wavelength="530" bandwidth="30"  />
		</LightSource >
		<LightSource wavelength="488" type="Blue Laser"  >
			<Detector used="1" chrome="FITC" secondary="" target="CD40" wavelength="530" bandwidth="30"  />
			<Detector used="1" chrome="PE" secondary="" target="CD86" wavelength="576" bandwidth="26"  />
			<Detector used="1" chrome="Biotin *PE-Texas Red" secondary="" target="CD19" wavelength="610" bandwidth="20"  />
			<Detector used="0" chrome="" secondary="" target="" wavelength="670" bandwidth="14"  />
			<Detector used="1" chrome="PerCP-Cy5.5" secondary="" target="MHC II" wavelength="700" bandwidth="30"  />
			<Detector used="0" chrome="" secondary="" target="" wavelength="780" bandwidth="60"  />
		</LightSource >
		<LightSource wavelength="633" type="Red Laser"  >
			<Detector used="1" chrome="APC" secondary="" target="CD11c" wavelength="660" bandwidth="20"  />
			<Detector used="1" chrome="Alexa Fluor 700" secondary="" target="CD14" wavelength="717" bandwidth="34"  />
			<Detector used="0" chrome="" secondary="" target="" wavelength="780" bandwidth="60"  />
		</LightSource >
	</FlowCytometer >
	<Fluorochromes  >
		<Fluorochrome value="eFluor 605NC(605)"  />
		<Fluorochrome value="Qdot 605(605)"  />
		<Fluorochrome value="Qdot 800(800)"  />
		<Fluorochrome value="eFluor 450(450)"  />
		<Fluorochrome value="V450(448)"  />
		<Fluorochrome value="Pacific Blue(455)"  />
		<Fluorochrome value="AmCyan(489)"  />
		<Fluorochrome value="PerCP-Cy5.5(695)"  />
		<Fluorochrome value="PerCP-eFluor 710(710)"  />
		<Fluorochrome value="PerCP(675)"  />
		<Fluorochrome value="DyLight 488(518)"  />
		<Fluorochrome value="Alexa Fluor 488(519)"  />
		<Fluorochrome value="FITC(520)"  />
		<Fluorochrome value="PE(578)"  />
		<Fluorochrome value="PE-Texas Red(613)"  />
		<Fluorochrome value="TriColor(613)"  />
		<Fluorochrome value="PE-Cy5(670)"  />
		<Fluorochrome value="PE-Dyomics 647(672)"  />
		<Fluorochrome value="PE-Cy5.5(695)"  />
		<Fluorochrome value="PE-Alexa Fluor 700(720)"  />
		<Fluorochrome value="PE-Cy7(760)"  />
		<Fluorochrome value="eFluor 660(658)"  />
		<Fluorochrome value="Cy5(670)"  />
		<Fluorochrome value="APC(660)"  />
		<Fluorochrome value="Alexa Fluor 647(665)"  />
		<Fluorochrome value="Dyomics 647(665)"  />
		<Fluorochrome value="APC-H7(765)"  />
		<Fluorochrome value="APC-Cy7(767)"  />
		<Fluorochrome value="APC-Alexa Fluor 750(775)"  />
		<Fluorochrome value="APC-eFluor 780(780)"  />
		<Fluorochrome value="DyLight 649(670)"  />
		<Fluorochrome value="Alexa Fluor 700(723)"  />
	</Fluorochromes >
	<Targets  >
		<Target value="CD14" clone=""  />
		<Target value="CD11c" clone=""  />
		<Target value="CD123" clone=""  />
		<Target value="CD19" clone=""  />
		<Target value="CD86" clone=""  />
		<Target value="CD40" clone=""  />
		<Target value="CD3" clone=""  />
	</Targets >
	<Species value="Human"  />
</Panel >


';
//~ die('count of $xml: '.strlen($xml));
		$this->xml_to_html($function, $xml, $resource_id, $group_id );
	}
	
////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////
	function debug_address($function)
	{
		$this->load->view('header_v');
	
		$resource_id = 13;
		$group_id = 11;
		$xml = '<?xml version="1.0" encoding="UTF-8"?>
		<Address type="xml/addr" name="test address">
			<Line1>This is Line1</Line1>
			<Line2>This is Line2</Line2>
			<Line3>This is Line3</Line3>
			<City>This is City</City>
			<State>This is State</State>
			<Zipcode>This is Zipcode</Zipcode>
			<Country>This is Country</Country>

		</Address>
';
		$this->xml_to_html($function, $xml, $resource_id, $group_id );
	}
	
}//end class
