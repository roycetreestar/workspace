			<div id="page_menu">
				<h4>howto pages</h4>
				<a href="<?=base_url()?>backstage/howto/addresses">addresses</a><br/>
				<a href="<?=base_url()?>backstage/howto/cytometers">cytometers</a><br/>
				<a href="<?=base_url()?>backstage/howto/groups">groups</a><br/>
				<a href="<?=base_url()?>backstage/howto/inventory">inventory</a><br/>
				<a href="<?=base_url()?>backstage/howto/panels">panels</a><br/>
				<a href="<?=base_url()?>backstage/howto/users">users</a><br/>
				<a href="<?=base_url()?>backstage/howto/thesaurus">thesaurus</a><br/>
				<br/>
				
				<a href="<?=base_url()?>backstage/howto/catalog">catalog</a><br/>
			</div>

			
	<hr/>
	
	
			
<div class="accordion" id="left_menu"> 
			
			
<!-- ADDRESSES	-->
	<div class="accordion-group">
		<div class="accordion-heading " >
			<a class="accordion-toggle " data-toggle="collapse"  data-parent="#left_menu" href="#address_menu" >Address </a>
		</div>
		<div class=" accordion-body collapse " id="address_menu"><!-- start content -->
			<div class="accordion-inner" >
				<h4>address data</h4>
					<li><a href="<?=base_url()?>backstage/howto/addresses#xml">get address xml</a></li>
					<li><a href="<?=base_url()?>backstage/howto/addresses#array">get address array</a></li>
				<br/>
				<h4>partials about address:</h4>
					<li><a href="<?=base_url()?>backstage/howto/addresses#display">display an address</a></li>
					<li><a href="<?=base_url()?>backstage/howto/addresses#edit">edit an address</a><br/>
			</div>
		</div><!-- end content -->
	</div><!-- end accordion-group	-->		
				
<!--	CYTOMETERS	-->
	<div class="accordion-group">
		<div class="accordion-heading " >
			<a class="accordion-toggle " data-toggle="collapse" data-parent="#left_menu" href="#cytometer_menu">Cytometers </a>
		</div>
		<div class=" accordion-body collapse " id="cytometer_menu"><!-- start content -->
			<div class="accordion-inner" >
				<h4>cytometer data</h4>
					<li><a href="<?=base_url()?>backstage/howto/cytometers#xml">get cytometer xml</a></li>
					<li><a href="<?=base_url()?>backstage/howto/cytometers#array">get cytometer array</a></li>
				<h4>cytometer partials:</h4>
					<li><a href="<?=base_url()?>backstage/howto/cytometers#display">display a cytometer</a></li>
					<li><a href="<?=base_url()?>backstage/howto/cytometers#edit">edit a cytometer</a><br/>
			
			</div>
		</div>				
	</div><!-- end accordion-group	-->	
	
	
	
	
	
<!--	GROUPS	-->
	<div class="accordion-group">
		<div class="accordion-heading " >
			<a class="accordion-toggle " data-toggle="collapse" data-parent="#left_menu" href="#group_menu">Groups </a>
		</div>
		<div class=" accordion-body collapse " id="group_menu"><!-- start content -->
			<div class="accordion-inner" >
				<h4>data about groups</h4>
				<li><a href="<?=base_url()?>backstage/howto/groups#xml">get group xml</a></li>
					<li><a href="<?=base_url()?>backstage/howto/groups#array">get group array</a></li>
				<h4>partials about groups:</h4>
					<li><a href="<?=base_url()?>backstage/howto/groups#grp_avail">available groups</a></li>
					<li><a href="<?=base_url()?>backstage/howto/groups#edit">edit a group</a><br/></li>
					<li><a href="<?=base_url()?>backstage/howto/groups#display">display a group</a></li>
					<li><a href="<?=base_url()?>backstage/howto/groups#register">join a group</a></li>
					<li><a href="<?=base_url()?>backstage/howto/groups#managed">groups managed</a></li>
					<li><a href="<?=base_url()?>backstage/howto/groups#joined">groups joined</a></li>
					<li><a href="<?=base_url()?>backstage/howto/groups#pending">pending members</a></li>
					<li><a href="<?=base_url()?>backstage/howto/groups#current">current members</a></li>
					
					
			</div>
		</div>
	</div><!-- end accordion-group	-->	
		
		
		
		
		
		
		
		
<!-- INVENTORY	-->
	<div class="accordion-group">
		<div class="accordion-heading " >
			<a class="accordion-toggle " data-toggle="collapse" data-parent="#left_menu" href="#inventory_menu">Inventory </a>
		</div>
		<div class=" accordion-body collapse " id="inventory_menu"><!-- start content -->
			<div class="accordion-inner" >
				<h4>Inventory data</h4>
					<li><a href="#xml">get inventory xml</a></li>
					<li><a href="#array">get inventory array</a></li>
				<h4>partials about inventory:</h4>
				<li><a href="#display">display an inventory</a></li>
					<li><a href="#edit">edit an inventory</a></li>
					<li><a href="#filter">filter_inventory_p</a></li>
					<li><a href="#fields">show_fields_p</a></li>
					<li><a href="#cat_num">add_by_cat_num_p</a></li>
					<li><a href="#add_manual">add_manually_p</a></li>

			</div>
		</div>
	</div><!-- end accordion-group	-->	
		
		
		
<!-- PANELS	-->
	<div class="accordion-group">
		<div class="accordion-heading " >
			<a class="accordion-toggle " data-toggle="collapse" data-parent="#left_menu" href="#panel_menu">Panels </a>
		</div>
		<div class=" accordion-body collapse " id="panel_menu"><!-- start content -->
			<div class="accordion-inner" >
				<h4>data about panels</h4>
					<li><a href="#xml">get panel xml</a></li>
					<li><a href="#array">get panel array</a></li>
				<br/>
				<h4>partials about panels:</h4>
					<li><a href="#display">display a panel</a></li>
					<li><a href="#edit">edit a panel</a></li>
			</div>
		</div>
	</div><!-- end accordion-group	-->	


<!-- USERS	-->
	<div class="accordion-group">
		<div class="accordion-heading " >
			<a class="accordion-toggle " data-toggle="collapse" data-parent="#left_menu" href="#user_menu">Users </a>
		</div>
		<div class=" accordion-body collapse " id="user_menu"><!-- start content -->
			<div class="accordion-inner" >
				<h4>data about users</h4>
					<li><a href="#xml">get user xml</a></li>
					<li><a href="#array">get user array</a></li>
				<br/>
				<h4>partials about users:</h4>
					<li><a href="#session">The session array</a></li>
					<li><a href="#display">display a user</a></li>
					<li><a href="#edit">edit a user</a></li>
					<li><a href="#register">register a user</a></li>
					<li><a href="#login">The login form</a></li>
			</div>
		</div>
	</div><!-- end accordion-group	-->	
		
		
		
		
		
		
		
		
		
		
		
<!-- THESAURUS	-->
	<div class="accordion-group">
		<div class="accordion-heading " >
			<a class="accordion-toggle " data-toggle="collapse" data-parent="#left_menu" href="#thesaurus_menu">Thesaurus </a>
		</div>
		<div class=" accordion-body collapse " id="thesaurus_menu"><!-- start content -->
			<div class="accordion-inner" >
					<h4>thesaurus data:</h4>
					<li><a href="#xml">get thesaurus xml</a></li>
					<li><a href="#array">get thesaurus array</a></li>

					<h4>thesaurus partials:</h4>
					<li><a href="#full">The full thesaurus page</a></li>
					<li><a href="#add_chrome">add a fluorochrome</a></li>
					<li><a href="#add_chrome_alt">add a fluorochrome alternate name </a></li>
					<li><a href="#add_species">add a species</a></li>
					<li><a href="#add_species_alt">add a species alternate name</a></li>
					<li><a href="#add_target">add a target</a></li>
					<li><a href="#add_target_alt">add a target alternate name</a></li>
			
			</div>
		</div>
	</div><!-- end accordion-group	-->	






	


		
</div><!-- end .accordion-group -->



<style>
	.accordion
	{
		border:solid;
	}
.accordion-inner
{
	background-color:gray;
	text-align:center;
	padding:2px;
}
#page_menu
{
	padding:20px;
	border:solid;
}
#leftmenu
{
	padding: 0px;
}
li
{
	border:solid gray 1px;
	background-color:white;
	list-style: none;
}
h4
{
	border:solid gray 1px;
	background-color:black;
	color:white;
	list-style: none;
	padding: 10px 20px;
}

</style>
