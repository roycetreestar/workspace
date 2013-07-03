<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div class="well" style="height:100%;">
	<h3>session_array_p</h3>
	<textarea style="height:800px; width:100%;"><?=print_r($this->session->userdata, true)?></textarea>
</div>