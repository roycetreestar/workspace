<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div class="well" >
	<h3>session_array_p</h3>
	<textarea style="height:650px; width:100%;"><?=print_r($this->session->userdata, true)?></textarea>
</div>