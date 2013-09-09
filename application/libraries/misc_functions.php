<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Misc_functions
{






	function wavelength_color($wavelength)
	{
		if($wavelength < 450)
			$color = 'violet';
		else if($wavelength >= 450 && $wavelength < 495)
			$color = 'blue';
		else if($wavelength >= 495 && $wavelength < 570)
			$color = 'green';
		else if($wavelength >= 570 && $wavelength < 590)
			$color = 'yellow';
		else if($wavelength >= 590 && $wavelength < 620)
			$color = 'orange';
		else if($wavelength >= 620 )
			$color = 'red';
		//~ else $color = 'gray';
		return $color;
	}




}//end class
