<div class="box">
    <div class="title">
      <h4 class=""><i></i><?=$group_type_str?>s You Have Joined</h4>
    </div>
    
    <div class="content noPad">
		  <div class="responsive">
				<div class="responsive">
<?php //die ('groups_joined_p.php $my_groups:<textarea>'.print_r($my_groups, true).'</textarea>');	?>				
				  <table class="table table-bordered">			
				<?php	foreach($my_groups as $my_group)
						{
							
							if($my_group['permission'] == 0)	//group permissions: 0=member, 1=manager
							{
								if($my_group['status'] == 0)
								{
									$message = "pending";
								}
								else if($my_group['status'] == 1)
								{
									$message = "leave";
								}
								
									echo '
									<tr>
										<td><span class="icon16 icomoon-icon-'.$group_type.'"></span>'.$my_group['group_name'].'</td>
										<td class="ch"><a href="#">'.$message.'</a></td>
									</tr>
									';
							}
					}	?>
					
				  </table>
				  
				</div>
		  </div>
    </div>
</div><!-- end .box	-->
