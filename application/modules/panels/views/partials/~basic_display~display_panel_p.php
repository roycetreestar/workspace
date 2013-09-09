	<div class="well">
		<table>
			<tr><th>	resource data:</th></tr>
			<tr><td>	resource_id				</td><td>		<?=$id?>	</td></tr>
			<!--<tr><td>	group_id			</td><td>		<?php //$group_id?>		</td></tr>-->
			<tr><td>	resource_name			</td><td>		<?=$resource_name?>		</td></tr>
			<tr><td>	resource_type			</td><td>		"panel" readonly/>			</td></tr>
			<tr><td>	metadata				</td><td>		<?php //$metadata?>			</td></tr>
			<tr><th> 	panel specific data:	</td><td>																					</th></tr>
			<tr><td>	xml						</td><td>		<textarea type='text' name='xml' readonly ><?=$xml?></textarea>						</td></tr>
			<tr><td>	user_id					</td><td>		<?=$this->session->userdata['logged_in']['userid']?>	</td></tr>
			<tr><td>	name					</td><td>		<?=$resource_name?>				</td></tr>
			<tr><td>	description				</td><td>		<?=$description?>			</td></tr>
			<tr><td>	date					</td><td>		<?=$date?>				</td></tr>
			<tr><td>	investigator			</td><td>		<?=$investigator?>	</td></tr>
			<tr><td>	cytometer				</td><td>		<?=$cytometer?>				</td></tr>
			<tr><td>	species					</td><td>		<?=$species?>					</td></tr>
			<tr><td>	sharingpref				</td><td>		<?=$sharingpref?>			</td></tr>
			<tr><td>	size					</td><td>		<?=$size?>			</td></tr>
			<tr><td>	hash					</td><td>		<?=$hash?>				</td></tr>
			


		</table>
	</div>



<!--
	<div class="well">
		<table>
			<tr><th>	resource data:</th></tr>
			<tr><td>	resource_id			</td><td>		<input type='text' name='resource_id' value="<?=$id?>" readonly />	</td></tr>
			<!--<tr><td>	group_id				</td><td>		<input type='text' name='group_id' value ="<?php //$group_id?>" readonly />		</td></tr>-->
<!--			<tr><td>	resource_name			</td><td>		<input type='text' name='resource_name' value ="<?=$resource_name?>"/>		</td></tr>
			<tr><td>	resource_type			</td><td>		<input type='text' name='resource_type'  value ="panel" readonly/>			</td></tr>
			<tr><td>	metadata				</td><td>		<input type='text' name='metadata' value ="<?php //$metadata?>"/>			</td></tr>
			<tr><th> panel specific data:		</td><td>																					</th></tr>
			<tr><td>	xml						</td><td>		<textarea type='text' name='xml' ><?=$xml?></textarea>						</td></tr>
			<tr><td>	user_id					</td><td>		<input type='text' name='user_id' value="<?=$this->session->userdata['logged_in']['userid']?>" readonly />	</td></tr>
			<tr><td>	name					</td><td>		<input type='text' name='name' value ="<?=$resource_name?>"/>				</td></tr>
			<tr><td>	description				</td><td>		<input type='text' name='description' value ="<?=$description?>"/>			</td></tr>
			<tr><td>	date					</td><td>		<input type='text' name='date' value ="<?=$date?>" readonly />				</td></tr>
			<tr><td>	investigator			</td><td>		<input type='text' name='investigator' value ="<?=$investigator?>"/>		</td></tr>
			<tr><td>	cytometer				</td><td>		<input type='text' name='cytometer' value ="<?=$cytometer?>"/>				</td></tr>
			<tr><td>	species					</td><td>		<input type='text' name='species' value ="<?=$species?>"/>					</td></tr>
			<tr><td>	sharingpref				</td><td>		<input type='text' name='sharingpref' value ="<?=$sharingpref?>"/>			</td></tr>
			<tr><td>	size					</td><td>		<input type='text' name='size' value ="<?=$size?>" readonly />				</td></tr>
			<tr><td>	hash					</td><td>		<input type='text' name='hash' value ="<?=$hash?>" readonly />				</td></tr>
			


		</table>
	</div>
	-->
