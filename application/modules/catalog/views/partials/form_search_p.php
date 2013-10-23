<!-- search -->
<form id="search_form" action="<?=base_url().'catalog/search/results'?>" method="get">
	<div class="widget-id" id="form_search_p" style="display:hidden"></div>
  <div id="tabAll" class="tab-pane active">
    <div class="accordion accordion-2" id="accordion-1">
		
		<hr/>

		

		
		
		
		
		
		
		
		
      <div class="accordion-group">
        <div class="accordion-heading dashboard">
          <div class="row-fluid accordion-header">
            <div class="span8 group-title"> 
				<a class="accordion-toggle glyphicons search" data-toggle="collapse" data-parent="#accordion" href="#group-search">
					<i></i>
					<h3>Search</h3>
				</a> 
            </div>
            <div class="span6 group-title">
				<p>Select a Target Species and enter in search terms to at least one field below.<br />
					To ensure results, you must use the autocomplete options.</p>
            </div>
            
            
<!-- TARGET SPECIES DROPDOWN	-->
            <div class="span11 group-title">
				<div class="span3">
					<h5 class="glyphicons riflescope">
					<i></i>Target Species:</h5>
				</div>
				<div class="span5">
					<?=$species_dd?>
               </div>
            </div>
            <div class="span11 group-title">
<!-- END TARGET SPECIES DROPDOWN	--> 


              <!-- -->
              
              
<!-- SEARCH FIELDS	-->              
				<div class="filter-bar search2" style="background:none; border:none">
				<!--	<form>	-->
						<div>
							<div class="input-append">
								<input type="text" id="targets" name="target"  class="input" placeholder="Target (Specificity)" data-provide="typeahead" data-source='<?=$targets?>' >
								<span class="add-on glyphicons "><i></i></span> 
							</div>
						</div>
						<div>
							<div class="input-append">
								<input type="text" id="format" name="format" class="input" data-provide="typeahead" placeholder="Format" data-source='<?=$format?>'  >
								<span class="add-on glyphicons "><i></i></span> 
							</div>
						</div>
						<div>
							<div class="input-append">
								<input type="text" id="clones" name="clone" class="input" data-provide="typeahead" placeholder="Clone" data-source='<?=$clones?>' >
								<span class="add-on glyphicons "><i></i></span> 
							</div>
						</div>
						<div class="clearfix"></div>
			<!--		</form>		-->
				</div>
<!-- END SEARCH FIELDS	-->  
				
				
              <!-- --> 
				
				
				
		</div>
<!-- END SEARCH INPUTS	-->




				<div class="span11 group-title"> 
              <!-- -->
					<div class="filter-bar search2" style="background:none; border:none">
						<div class="span2">
							<button class="btn btn-block btn-primary">Get Results</button>
						</div>
						<div class="span2">
							<button class="btn btn-block btn-primary">Clear Form</button>
						</div>
						<div class="clearfix"></div>
					</div>
              <!-- --> 
				</div>
          </div>
        </div>
        
        
<!-- SHOW / HIDE VENDOR CHECKBOXES	-->        
        <div class="row-fluid accordion-toggle">
          <div class="span3"> <span class="pull-left"> <a class="accordion-toggle" id="toggle-1" data-toggle="collapse" data-parent="#group-search" href="#group-search"><i class="g1 icon-chevron-down"></i>Companies (Suppliers)</span></a> </div>
        </div>
<!-- END SHOW / HIDE VENDOR CHECKBOXES	-->
        
      
      
      
      
      
      
      
        
        
<!-- VENDOR CHECKBOXES -->        
        <div id="group-search" class="accordion-body collapse">
          <div class="accordion-inner"> 
            <!-- -->
            <div class="row-fluid">
				
				
<?php
//We want the vendor names to be evenly split between four columns in this section
//Each column is going to be a span3
	$v_count = count($vendors);
	$v_per_col = ceil($v_count/4);
	$count = 1;
	$total = 1;

	foreach($vendors as $vendor)
	{
        //if(start of column)
        if($count == 1)
		{	echo '      <div class="span3" >
                <div class="widget widget-4 uniformjs">
                  <div class="separator"></div>
              ';    
        }
                  
         //always         
        echo '<label class="checkbox">
                <div class="checker" id="uniform-undefined">
					<span class="checked">
						<input type="checkbox" checked="checked" value="'.trim($vendor['vendor_name']).'" class="checkbox" name="vendors[]">
                    </span>
                </div>
                '.$vendor['vendor_name'].'
            </label>
         ';
         //end always 
                  
                  
        if($count == $v_per_col || $v_count == $total)
        { 
			//if(end of column)
			echo '        </div>
				</div>
				';
			$count = 1;
			$total ++;
		}
		else
		{	$count++;
			$total++;
		}
    }          
   ?>          
              

              
 
		
 <!--	END VENDOR CHECKBOXES	-->           
            
  </div>
  <div class="row-fluid">          
 <!-- CHECK / UNCHECK	-->           
				<div class="span2">
					<button class="btn btn-block btn-primary">Check All</button>
				</div>
				<div class="span2">
					<button class="btn btn-block btn-primary">UnCheck All</button>
				</div>
<!-- END CHECK / UNCHECK	-->
</div>

            </div>
          </div>
          <!-- --> 
        </div>
      </div><!-- end .accordion-heading dashboard	-->

    </div><!-- end .accordion-group	-->
    
    
    
    
</form>
    
    
    
    
    
    <script>

	$('#search_form').submit( function(event)
	{
		event.preventDefault();				
	//	var values = $("#search_form").serialize();	
		var values = $("form").serialize();	
	//	var values = $(this).serialize();

		
		$('#search_results').html('');
/* 
alert("values: "+values);
*/
		$.ajax(
		{
			url: "<?=base_url()?>catalog/search/results?"+values,
			type: 'get',
		//	data: values,
			success:function(msg)
			{
				$('#search_results').html(msg);
			},
			error: function (msg) 
			{ 
				var the_error = msg.responseText;
				var start = the_error.indexOf("<div");
				var end = the_error.indexOf("</div>") + 7;
				var error_div = the_error.substring(start, end);

				$('#search_results').html(error_div).css('color', 'red');
			}
		});
/* */
	});

</script>
    	    
    

    
    
    
    
    
<!--  </div> end #accordion-1	-->
<!--</div> end #tabAll -->
<!-- // search -->
