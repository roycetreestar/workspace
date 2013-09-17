<div class="box">
    <div class="title">
      <h4 class=""><i></i><?=$group_type_str?>s You Manage</h4>
    </div>
    
    <div class="content noPad">
		  <div class="responsive">
				<div class="responsive">
					
				  <table class="table table-bordered">
				
				<?php	foreach($my_groups as $my_group)
						{
							if($my_group['permission'] == 1)	//group permissions: 0=member, 1=manager
							{
								echo '
								  <tr>
									<td><span class="icon16 icomoon-icon-'.$group_type.'"></span>'.$my_group['group_name'].'</td>
									<td class="ch"><a href="#">Preferences</a></td>
								  </tr>
								';
							}
					}	?>
					
				  </table>
				  
				</div>
		  </div>
    </div>
</div><!-- end .box	-->
