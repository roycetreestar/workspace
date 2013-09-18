<ul class="breadcrumb">
	<li><a href="<?php echo getURL(array('index')); ?>" class="glyphicons home"><i></i> <?php echo APP_NAME; ?></a></li>
	<li class="divider"></li>
	<li>Calendar</li>
</ul>
<div class="separator bottom"></div>

<div class="innerLR">
	<div class="widget widget-4">
		<div class="widget-head">
			<h3 class="heading">Calendar</h3>
		</div>
		<div class="widget-body">
			<p><?php echo APP_NAME; ?> provides a full-sized, drag &amp; drop calendar. It uses AJAX to fetch events on-the-fly for each month and is easily configured to use your own feed format, plus there's an extension provided for Google Calendar.</p>
		</div>
	</div>
</div>

<div class="well">
	<div id="calendar"></div>
	<div class="separator"></div>
	<div id="external-events">
		<h4 class="glyphicons calendar"><i></i> Draggable Events</h4>
		<hr class="separator" />
		<ul>
			<li class="glyphicons move"><i></i> My Event 1</li>
			<li class="glyphicons move"><i></i> My Event 2</li>
			<li class="glyphicons move"><i></i> My Event 3</li>
			<li class="glyphicons move"><i></i> My Event 4</li>
			<li class="glyphicons move"><i></i> My Event 5</li>
		</ul>
		<hr class="separator" />
		<label for="drop-remove" class="checkbox">
			<input type="checkbox" class="checkbox" id="drop-remove" /> 
			remove after drop
		</label>
	</div>
</div>