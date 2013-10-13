
<a href="mailto:<?php echo $email; ?>"><?php echo $email; ?></a>
<div>
	<table>
    <tr>
        <td><?= isset($resource_id) 	?	$resource_id 	: '' ?></td>
      </tr>
    <tr>
        <td><?= isset($resource_name)	?	$resource_name	: '' ?></td>
      </tr>
    <tr>
        <td><?= isset($address_line_1)	?	$address_line_1 : '' ?></td>
      </tr>
    <tr>
        <td><?= isset($address_line_2)	?  	$address_line_2 : '' ?></td>
      </tr>
    <tr>
        
        <td><?= isset($address_line_3)	?  	$address_line_3 : '' ?></td>
      </tr>
    <tr>
        <td><?= isset($city) 			?  	$city 			: '' ?></td>
      </tr>
    <tr>
        <td><?= isset($state) 			?  	$state 			: '' ?></td>
      </tr>
    <tr>
        <td><?= isset($zipcode) 		?  	$zipcode 		: '' ?></td>
      </tr>
    <tr>
        <td><?= isset($country) 		?  	$country 		: '' ?></td>
      </tr>
  </table>
</div>
