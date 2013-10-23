
<div class="separator bottom"></div>
<div class="heading-buttons">
  <div class="row-fluid">
    <div class="span7" id="dashboard-group-select">
      <h4 class="heading">Inventory Manager</h4>
      <span> Viewing:</span> 
      <!-- --> 
      <a data-original-title="Select Group"  data-pk="1" data-type="select2" id="select-group" href="#" class="editable editable-click" style="background-color: transparent;" data-placement="bottom">Ostrat Lab, UCSF Flow Core</a> 
      <!-- -->
      <div class="row-fluid">
        <div class="span8" style="margin-left:10px">
          <p><strong>Fluorish Labs</strong> displays all the reagents for every in the lab. These reagents are also available in the Fluorish Panel Builder when constructing panels *<br />
          <em>* Requires Log In</em></p>
        </div>
      </div>
      <!-- -->
      <div class="row-fluid">
       <div class="span8" style="margin-left:10px">
          <form class="form-inline">
            <label class="checkbox"><A href="#"><strong>Inventory Type:</strong></A></label>
            <select>
              <option>Antibodies for Flow Cytometry</option>
              <option>Streptavidin Tags</option>
              <option>Fluorescent Dyes and Proteins</option>
            </select>
          </form>
        </div>
      </div>
    </div>
    <div class="span4 right"> <a href="" class="btn btn-default btn-icon glyphicons lab"><i></i> Inventory Settings</a> </div>
  </div>
</div>
<div class="separator bottom"></div>
<!-- END Global Account Section -->

<div class="filter-bar filter-bar-2">
  <form>
    <div class="lbl glyphicons cogwheel"><i></i>Filter</div>
    <div>
      <select name="from" style="width: 200px;">
        <option>Target (Specificity)</option>
        <option>CD3</option>
        <option>CD5</option>
      </select>
    </div>
    <div>
      <select name="from" style="width: 80px;">
        <option>Equals</option>
        <option>Contains</option>
        <option>&#8249;</option>
        <option>&#8250;</option>
      </select>
    </div>
    <div>
      <label></label>
      <div class="input-append">
        <input type="text" name="from" class="input-mini" style="width: 30px;" value="" />
        <span class="add-on glyphicons"></span> </div>
    </div>
    <div> </div>
    <div>
      <label></label>
      <a href="" class="btn btn-default">Refine Reagent List</a> </div>
    <div>
      <label></label>
      <a href="" class="btn btn-default">Show All</a> </div>
    <div class="clearfix"></div>
  </form>
</div>
<div class="widget widget-2" style="margin: 0;">
  <div class="widget-head">
    <h4 class="heading glyphicons list"><i></i>Ostrat Lab</h4>
  </div>
  <div class="buttons pull-right"> <a href="" class="btn btn-primary btn-icon glyphicons circle_plus"><i></i> Add Reagent</a> </div>
  <div class="widget-body">
    <div class="separator bottom form-inline small">Total Reagents: 26</div>
    <table class="table table-bordered table-condensed table-striped table-vertical-center checkboxs js-table-sortable table-thead-simple table-thead-border-none ui-sortable" style="font-size:8pt;">
      <thead>
        <tr>
          <th class="center">Target</th>
          <th class="center">Format</th>
          <th class="center">Clone</th>
          <th class="center">Target_Species</th>
          <th class="center">Company</th>
          <th class="center">Cat#</th>
          <th class="center">Amount</th>
          <th class="center">Category</th>
          <th class="center">Description</th>
          <th class="center">Location</th>
          <th class="center">Date</th>
          <th class="center" style="width: 60px;">Action</th>
          <th class="center">Add</th>
        </tr>
      </thead>
      <tbody>
        <?php $target = array('Ly-6G', 'eFIF2a', 'CD184', 'CD185'); ?>
        <?php $format = array('PE', 'eFluor 450', 'BIOTIN'); ?>
        <?php $clone = array('RP-1', 'RF8B2', 'EBA1'); ?>
        <?php $targets = array('Rat', 'Human', 'Monkey'); ?>
        <?php $company = array('BD', 'eBio', 'N/A'); ?>
        <?php $cat = array('4520', '6955', '2652'); ?>
        <?php $category = array('Ab', 'N/A', 'SA'); ?>
        <?php $location = array('1A', '2A', '4B'); ?>
        <?php for($i=1;$i<=5;$i++): ?>
        <tr class="selectable<?php if ($i == 2 || $i == 3): ?> selected<?php endif; ?>">
          <td class="center"><?php echo $target[mt_rand(0,2)]; ?></td>
          <td class="center"><?php echo $format[mt_rand(0,2)]; ?></td>
          <td class="center"><?php echo $clone[mt_rand(0,2)]; ?></td>
          <td class="center"><?php echo $targets[mt_rand(0,2)]; ?></td>
          <td class="center"><?php echo $company[mt_rand(0,2)]; ?></td>
          <td class="center"><?php echo $cat[mt_rand(0,2)]; ?></td>
          <td class="center form-inline small"><input type="text" style="width: 30px;" value="<?php echo mt_rand(1,10); ?>" /></td>
          <td class="center"><?php echo $category[mt_rand(0,2)]; ?></td>
          <td class="center"><a href="#">Read</a></td>
          <td class="center"><?php echo $location[mt_rand(0,2)]; ?></td>
          <td class="center">4/4/13-4/30/13</td>
          <td class="center"><a href="#" class="btn-action glyphicons pencil btn-success"><i></i></a> <a href="#" class="btn-action glyphicons remove_2 btn-danger"><i></i></a></td>
          <td class="center"><a href="#" class="btn-action glyphicons remove_2 circle_plus"><i></i></a></td>
        </tr>
        <?php endfor; ?>
      </tbody>
    </table>
    <div class="separator top form-inline small">
      <div class="pull-left checkboxs_actions hide">
        <label class="strong">:</label>
        <select class="selectpicker" data-style="btn-default btn-small">
          <option>Action</option>
          <option>Action</option>
          <option>Action</option>
        </select>
      </div>
      <div class="pagination pagination-small pull-right" style="margin: 0;">
        <ul>
          <li class="disabled"><a href="#">&laquo;</a></li>
          <li class="active"><a href="#">1</a></li>
          <li><a href="#">2</a></li>
          <li><a href="#">3</a></li>
          <li><a href="#">&raquo;</a></li>
        </ul>
      </div>
      <div class="clearfix"></div>
    </div>
  </div>
</div>
<br/>
<div class="widget widget-2" style="margin: 0;">
  <div class="widget-head">
    <h4 class="heading glyphicons list"><i></i>UCSF Lab</h4>
  </div>
  <div class="buttons pull-right"> <a href="" class="btn btn-primary btn-icon glyphicons circle_plus"><i></i> Add Reagent</a> </div>
  <div class="widget-body">
    <div class="separator bottom form-inline small">Total Reagents: 26</div>
    <table class="table table-bordered table-condensed table-striped table-vertical-center checkboxs js-table-sortable table-thead-simple table-thead-border-none ui-sortable" style="font-size:8pt;">
      <thead>
        <tr>
          <th class="center">Target</th>
          <th class="center">Format</th>
          <th class="center">Clone</th>
          <th class="center">Target_Species</th>
          <th class="center">Company</th>
          <th class="center">Cat#</th>
          <th class="center">Amount</th>
          <th class="center">Category</th>
          <th class="center">Description</th>
          <th class="center">Location</th>
          <th class="center">Date</th>
          <th class="center" style="width: 60px;">Action</th>
          <th class="center">Add</th>
        </tr>
      </thead>
      <tbody>
        <?php $target = array('Ly-6G', 'eFIF2a', 'CD184', 'CD185'); ?>
        <?php $format = array('PE', 'eFluor 450', 'BIOTIN'); ?>
        <?php $clone = array('RP-1', 'RF8B2', 'EBA1'); ?>
        <?php $targets = array('Rat', 'Human', 'Monkey'); ?>
        <?php $company = array('BD', 'eBio', 'N/A'); ?>
        <?php $cat = array('4520', '6955', '2652'); ?>
        <?php $category = array('Ab', 'N/A', 'SA'); ?>
        <?php $location = array('1A', '2A', '4B'); ?>
        <?php for($i=1;$i<=5;$i++): ?>
        <tr class="selectable<?php if ($i == 2 || $i == 3): ?> selected<?php endif; ?>">
          <td class="center"><?php echo $target[mt_rand(0,2)]; ?></td>
          <td class="center"><?php echo $format[mt_rand(0,2)]; ?></td>
          <td class="center"><?php echo $clone[mt_rand(0,2)]; ?></td>
          <td class="center"><?php echo $targets[mt_rand(0,2)]; ?></td>
          <td class="center"><?php echo $company[mt_rand(0,2)]; ?></td>
          <td class="center"><?php echo $cat[mt_rand(0,2)]; ?></td>
          <td class="center form-inline small"><input type="text" style="width: 30px;" value="<?php echo mt_rand(1,10); ?>" /></td>
          <td class="center"><?php echo $category[mt_rand(0,2)]; ?></td>
          <td class="center"><a href="#">Read</a></td>
          <td class="center"><?php echo $location[mt_rand(0,2)]; ?></td>
          <td class="center">4/4/13-4/30/13</td>
          <td class="center"><a href="#" class="btn-action glyphicons pencil btn-success"><i></i></a> <a href="#" class="btn-action glyphicons remove_2 btn-danger"><i></i></a></td>
          <td class="center"><a href="#" class="btn-action glyphicons remove_2 circle_plus"><i></i></a></td>
        </tr>
        <?php endfor; ?>
      </tbody>
    </table>
    <div class="separator top form-inline small">
      <div class="pull-left checkboxs_actions hide">
        <label class="strong">:</label>
        <select class="selectpicker" data-style="btn-default btn-small">
          <option>Action</option>
          <option>Action</option>
          <option>Action</option>
        </select>
      </div>
      <div class="pagination pagination-small pull-right" style="margin: 0;">
        <ul>
          <li class="disabled"><a href="#">&laquo;</a></li>
          <li class="active"><a href="#">1</a></li>
          <li><a href="#">2</a></li>
          <li><a href="#">3</a></li>
          <li><a href="#">&raquo;</a></li>
        </ul>
      </div>
      <div class="clearfix"></div>
    </div>
  </div>
</div>
