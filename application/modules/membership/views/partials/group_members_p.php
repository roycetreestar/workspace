<div class="widget-timeline">
	<h5>Current Members</h5>
	<table class="table table-bordered table-condensed">
		<thead>
			<tr>
			<th class="center">Name</th>
			<th class="center">Email</th>
			<th class="center">Manager Privileges</th>
			<th class="center">Remove</th>
			</tr>
		</thead>
		<tbody>

			<?php
				foreach ($current_members as $user)
				{
					if($user['permission'] == 1)
					$checked = 'checked';
					else $checked = '';

					echo '
					<tr>
						<td class="center">'.$user['first_name'].' '.$user['last_name'].'</td>
						<td class="center">'.$user['email'].'</td>
						<td class="center"><input type="checkbox" '.$checked.' /></td>
						<td class="center"><a href=""class="btn btn-small">Remove</a></td>
					</tr>';
				}
			?>
			<tr>
			<td class="center">Royce Cano</td>
			<td class="center">roycedcano@yahoo.com</td>
			<td class="center"><input type="checkbox" checked="checked" /></td>
			<td class="center"><a href=""class="btn btn-small">Remove</a></td>
			</tr>
			<tr>
			<td class="center">Nick Ostrat</td>
			<td class="center">nick@yahoo.com</td>
			<td class="center"><input type="checkbox" checked="checked" /></td>
			<td class="center"><a href=""class="btn btn-small">Remove</a></td>
			</tr>
		</tbody>
	</table>
</div>
