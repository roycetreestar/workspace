		<table>
			<tr><th>	resource data:</th></tr>
			<tr><td>	resource_id			</td><td>		<input type='text' name='resource_id' value="<?=$resource_id?>" readonly />	</td></tr>
			<!--<tr><td>	group_id				</td><td>		<input type='text' name='group_id' value ="<?=$group_id?>" readonly />		</td></tr>-->
			<tr><td>	resource_name			</td><td>		<input type='text' name='resource_name' value ="<?=$resource_name?>"/>		</td></tr>
			<tr><td>	resource_type			</td><td>		<input type='text' name='resource_type'  value ="panel" readonly/>			</td></tr>
			<tr><td>	metadata				</td><td>		<input type='text' name='metadata' value ="<?=$metadata?>"/>				</td></tr>
			<tr><th> panel specific data:		</td><td>																		</th></tr>
			<tr><td>	xml					</td><td>		<input type='text' name='xml' value ="<?=$xml?>"/>						</td></tr>
			<tr><td>	user_id				</td><td>		<input type='text' name='user_id' value="<?=$this->session->userdata['logged_in']['userid']?>" readonly />	</td></tr>
			<tr><td>	name					</td><td>		<input type='text' name='name' value ="<?=$name?>"/>						</td></tr>
			<tr><td>	description			</td><td>		<input type='text' name='description' value ="<?=$description?>"/>			</td></tr>
			<tr><td>	date					</td><td>		<input type='text' name='date' value ="<?=$date?>" readonly />				</td></tr>
			<tr><td>	investigator			</td><td>		<input type='text' name='investigator' value ="<?=$investigator?>"/>			</td></tr>
			<tr><td>	cytometer				</td><td>		<input type='text' name='cytometer' value ="<?=$cytometer?>"/>				</td></tr>
			<tr><td>	species				</td><td>		<input type='text' name='species' value ="<?=$species?>"/>					</td></tr>
			<tr><td>	sharingpref			</td><td>		<input type='text' name='sharingpref' value ="<?=$sharingpref?>"/>			</td></tr>
			<tr><td>	size					</td><td>		<input type='text' name='size' value ="<?=$size?>" readonly />				</td></tr>
			<tr><td>	hash					</td><td>		<input type='text' name='hash' value ="<?=$hash?>" readonly />				</td></tr>
			


		</table>