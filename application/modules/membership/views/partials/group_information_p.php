<div class="tab-pane active" id="core-details">
<!-- -->
<form id="group_info_<?=$id?>" action="" method="" >
	<div class="widget widget-2">
		<div class="widget-head">
			<h4 class="heading glyphicons edit"><i></i>Core Name</h4>
		</div>
		<div style="padding-bottom: 0;" class="widget-body">
			<div class="row-fluid">
				<div class="span12">
					<div class="widget-body">
						<input type="text" id="groupname" class="span12" placeholder="My Core Name" value="<?=$group_name?>"/>
					</div>
				</div>
			</div>
		</div>
	</div>
<!-- --> 



<!-- -->
	<div class="widget widget-2">
		<div class="widget-head">
			<h4 class="heading glyphicons edit"><i></i>Core Access</h4>
		</div>
		<div style="padding-bottom: 0;" class="widget-body">
			<div class="row-fluid">
				<div class="span12">
					<div class="widget-body">
						<div class="uniformjs">
							<label class="radio">
								<input type="radio" class="radio" name="radio" value="1" <?php if($access == 1) echo 'checked' ?>/>
								Public 
							</label>
							<br/>
							<label class="radio">
								<input type="radio" class="radio" name="radio" value="0" <?php if($access == 0) echo 'checked' ?> />
								Private 
							</label>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<!-- --> 




<!-- -->
	<div class="widget widget-2">
		<div class="widget-head">
			<h4 class="heading glyphicons edit"><i></i>Contact Information</h4>
		</div>
	<div style="padding-bottom: 0;" class="widget-body">
		<div class="row-fluid">
			<div class="span6">
				<div class="widget-body">
					<h4>Contact Information</h4>
					<label for="inputPhone">Email</label>
					<div class="input-prepend"> 
						<span class="add-on glyphicons envelope"><i></i></span>
						<input type="text" id="inputPhone" class="input-large"  value="<?=$email ?>" />
					</div>
					<label for="inputPhone">phone</label>
					<div class="input-prepend"> 
						<span class="add-on glyphicons phone"><i></i></span>
						<input type="text" id="inputPhone" class="input-large"  value="<?=$phone ?>" />
					</div>
					<label for="inputWebsite">Website</label>
					<div class="input-prepend"> 
						<span class="add-on glyphicons link"><i></i></span>
						<input type="text" id="inputWebsite" class="input-large"  />
					</div>
				</div>
			</div>
			<div class="span6">
				<div class="widget-body">
					<h4>Address</h4>
					<!--<label for="inputPhone">Address</label>-->
					<div class="input-prepend"> 
						<span class="add-on glyphicons phone"><i></i></span>
						<input type="text" id="inputPhone" class="input-large" placeholder="Tree Star, Inc" />
					</div>
					<!--<label for="inputEmail">E-mail</label>-->
					<div class="input-prepend"> 
						<span class="add-on glyphicons envelope"><i></i></span>
						<input type="text" id="inputEmail" class="input-large" placeholder="Ashland Research Building" />
					</div>
					<!--<label for="inputWebsite">Website</label>-->
					<div class="input-prepend"> 
						<span class="add-on glyphicons link"><i></i></span>
						<input type="text" id="inputWebsite" class="input-large" placeholder="2nd Floor Loft, Room 201" />
					</div>
					<!--<label for="inputWebsite">Website</label>-->
					<div class="input-prepend"> 
						<span class="add-on glyphicons link"><i></i></span>
						<input type="text" id="inputWebsite" class="input-large" placeholder="304 A Street" />
					</div>
					<!--<label for="inputWebsite">Website</label>-->
					<div class="input-prepend"> 
						<span class="add-on glyphicons link"><i></i></span>
						<input type="text" id="inputWebsite" class="input-large" placeholder="Ashland, OR 97504" />
					</div>
				</div>
			</div>
		</div>


	</div>
</div>
<!-- --> 





<!-- -->
	<div class="widget widget-2">
		<div class="widget-head">
		<h4 class="heading glyphicons edit"><i></i>Additional Information</h4>
	</div>
	<div style="padding-bottom: 0;" class="widget-body">
		<div class="row-fluid">
			<div class="span12">
				<div class="widget-body">
					<textarea class="span12" id="groupname" > <?=$additional_information?></textarea>
				</div>
			</div>
		</div>
		<div class="form-actions" style="margin: 0;">
			<button type="submit" class="btn btn-icon btn-primary glyphicons circle_ok"><i></i>Delete Core</button>
			<button type="button" class="btn btn-icon btn-default glyphicons circle_remove"><i></i>Cancel</button>
			<button type="button" class="btn btn-icon btn-default glyphicons circle_remove"><i></i>Save</button>
		</div>
	</div>
	
</form>
	
</div>
<!-- -->
