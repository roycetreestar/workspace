<div class="span12">
	<form method="post" action="inventory/">
		
		<select name="dbfield" id="dbfield">
			<option value="" > Choose a field </option>
<?php 
			foreach ($show_fields as $key=>$value)
			{
				echo '<option value="'.$key.'" >'.ucfirst(str_replace('_', ' ', $key)).'</option>';
			}
?>
		</select>
		
		
		
		<select name="comparison" id="comparison">
			<option id="equals" value='where'>Equals</option>
			<option id="contains" value='like'>Contains</option>
			<option id="lessthan" value='lessthan'>Is &lt; </option>
			<option id="greaterthan" value='greaterthan'>Is &gt; </option>
		</select>
		
		
		
		<input type="text" name="comp_value" />
		
		<input type="submit"  class="btn" id="refineList" value='Refine Reagent List' />
		<a  class="btn" id="showAll">Show All</a>
		
	</form>
</div>


<script>
	
/* Only show 'is <' and 'is >' in #comparison when amount, date_modified,
 * or date_added is chosen in #dbfield
 */ 
	$('#dbfield').change( function()
	{
		if($(this).val()==='amount' || $(this).val()==='date_modified' || $(this).val()==='date_added')
		{
			$('#lessthan').show();
			$('#greaterthan').show();
		}
		else
		{
			$('#lessthan').hide();
			$('#greaterthan').hide();	
		}
//		alert('#dbfield changed to '+ $(this).val());
	});
</script>