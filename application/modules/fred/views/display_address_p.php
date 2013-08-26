<?php
	if(isset($xml_obj))
	{
		$addr_name = $xml_obj->attributes()->name;
		$line1 = $xml_obj->Line1;
		$line2 = $xml_obj->Line2;
		$line3 = $xml_obj->Line3;
		$city = $xml_obj->City;
		$state = $xml_obj->State;
		$zip = $xml_obj->Zipcode;
		$country = $xml_obj->Country;
	}
	else
	{
		$addr_name = $line1 = $line2 = $line3 = $city = $state = $zip = $country = '';
	}
?><div class='well'>
	<h3>display_address_p</h3>
	<table>
		<tr><td>resource_name:</td><td><?=$addr_name?></td></tr>
		<tr><td>resource_id: </td><td> <?=$resource_id ?></td></tr>
		<tr><td>address_line_1: </td><td> <?=$line1 ?></td></tr>
		<tr><td>address_line_2: </td><td> <?=$line2 ?></td></tr>
		<tr><td>address_line_3: </td><td> <?=$line3 ?></td></tr>
		<tr><td>city: </td><td> <?=$city ?></td></tr>
		<tr><td>state: </td><td> <?=$state ?></td></tr>
		<tr><td>zipcode: </td><td> <?=$zip ?></td></tr>
		<tr><td>country: </td><td> <?=$country ?></td></tr>
	</table>
	
</div>
