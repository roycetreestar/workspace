<div>
		<h5>Pending Members</h5>
		<div class="widget-timeline">
			<ul class="list-timeline">

				<?php foreach($pending_members as $user)
				{
					echo '
					<li> <span class="date">'/*$user['join_date']*/.'</span> <span class="glyphicons activity-icon user_add"><i></i></span><span class="glyphicons activity-icon user_remove"><i></i></span> <span class="ellipsis"><a href="">'.$user['first_name'].' '.$user['last_name'].'</a> requested access.</span>
					<div class="clearfix"></div>
					</li>';

				}
				?>
			</ul>
		</div>




</div>
