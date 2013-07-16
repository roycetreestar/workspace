<div class='well'>
<?php

foreach($panels as $panel)
{
	echo '<a href="panels/display_panel/'.$panel['resource_id'].'">'.$panel['panel_name'].'</a><br/>';
}





?>
</div>