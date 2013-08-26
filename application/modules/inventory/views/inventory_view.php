<!--<script>
////autocomplete for add-a-reagent form elements
//	$(function()	
//	{
//		var vendor_list =		[<?= $vendor_list ?>];
//		var target_list =		[<?= $target_list ?>	];
//		var chrome_list =		[<?= $chrome_list ?>	];
//		var clone_list =		[<?= $clone_list ?>	];
//
//		var src_species_list =	[<?= $src_species_list ?>	];
//		
//
//		$(".company_name, form #company").autocomplete({ source: vendor_list	});
//		$(".target_name").autocomplete({ source: target_list	});
//		$(".chrome_name").autocomplete({ source: chrome_list	});
//		$(".clone_name").autocomplete({ source: clone_list	});
//
//		$(".src_species_name").autocomplete({ source: src_species_list	});
//	});
</script>-->


<script type="text/javascript" src="<?= base_url().'assets/js/inventory.js'?>" ></script>
<link rel="stylesheet" type="text/css" href="<?= base_url().'assets/css/inventory.css'?>" />

<div class="container-fluid" >
<h2>inventory/views/inventory_view.php</h2>
<!---->
	<div class="row">
		<h3>Filter your inventory:</h3>
		<?php // $template['partials']['filter_inventory_partial']; ?>
		<?=$this->load->view('partials/filter_inventory_p') ?>
	</div>





<!--		EXPERIMENTAL OFFSCREEN-STORAGE DIV	-->
<div id="offscreen-storage" class="row">
			<!-- SHOW FIELDS FORM -->
				<!--<div class="row" >-->
					<?php //$template['partials']['show_fields_partial']; ?>
					<?= $this->load->view('partials/show_fields_partial'); ?>
				<!--</div>-->

			<!-- ADD A REAGENT BY ITS CATALOG NUMBER -->
				<!--<div class="row">-->
					<?php // $template['partials']['add_by_cat_num_partial']; ?>
					<?= $this->load->view('partials/add_by_cat_num_partial'); ?>
				<!--</div>-->

			<!--	ADD A SINGLE ITEM	-->
				<!--<div class="row">-->
					<?php // $template['partials']['add_single_item']; ?>
					<?= $this->load->view('partials/add_single_item_p'); ?>
				<!--</div>-->

			<!-- ADD A REAGENT MANUALLY -->
				<!--<div class="row">-->
					<?php // $template['partials']['add_manually_partial']; ?>
					<?= $this->load->view('partials/add_manually_partial'); ?>
				<!--</div>-->
				
			<!-- IMPORT A SPREADSHEET FORM -->
				<!--<div class="row">-->
					<?php // $template['partials']['import_form_p']; ?>					
					<?php //$this->load->view('partials/import_form_p'); ?>
				<!--</div>-->

</div>
<!--		END EXPERIMENTAL OFFSCREEN-STORAGE DIV	-->








<!-- INVENTORY TABLES BY LAB -->
	<div class="row-fluid">
		<?php // $template['partials']['inventory_container_partial']; ?>				
		<?= $this->load->view('partials/inventory_container_partial'); ?>
	</div>








</div><!-- end .container -->



<!-- a bootstrap modal for all your inventory-based modal needs	-->

	<div class="modal hide fade " id='inventory_modal'>
		 <div class="modal-header">
			 <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
			 <h3>Modal header</h3>
		 </div>
		 <div class="modal-body" id='inventory_modal_body'>
			 
		 </div>
		 <div class="modal-footer">
			 <a class="btn" id='close_modal_btn' data-dismiss="modal" aria-hidden="true" >Cancel</a>
			 <a href="" id="modal_submit_btn" class="btn btn-primary">Save changes</a>
		 </div>
	</div>
