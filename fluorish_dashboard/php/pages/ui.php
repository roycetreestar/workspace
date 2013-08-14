<ul class="breadcrumb">
	<li><a href="<?php echo getURL(array('index')); ?>" class="glyphicons home"><i></i> <?php echo APP_NAME; ?></a></li>
	<li class="divider"></li>
	<li><?php echo $translate->_('ui_elements'); ?></li>
</ul>
<div class="separator bottom"></div>

<div class="innerLR">
	<div class="widget widget-4">
		<div class="widget-head">
			<h3 class="heading"><?php echo $translate->_('ui_elements_long'); ?></h3>
		</div>
		<div class="widget-body">
			<p>There are various user interface elements contained in <?php echo APP_NAME; ?>, like navigation elements, different kind of buttons, with &amp; without icons, different sizes, accordions &amp; collapsibles, tabs &amp; pills, stacked &amp; regular, progress bars, sliders &amp; many more.</p>
		</div>
	
		<div class="widget-head">
			<h3 class="heading">Buttons</h3>
		</div>
		<div class="widget-body">
			<p><?php echo APP_NAME; ?> comes with over 400 Premium Glyphicons as a font, that can be easely customized by color, size and even CSS3 attributes like <code>text-shadow</code>. The Glyphicons can be used not only as standalone, but in addition to other elements, like buttons.</p>
		</div>

		<table class="table table-striped table-responsive swipe-horizontal table-vertical-center table-thead-simple">
			<thead>
				<tr>
					<th class="center">Regular Buttons</th>
					<th class="center">Buttons + Icons</th>
					<th class="center">Split Buttons</th>
					<th class="center">Disabled Buttons</th>
					<th class="center">Smaller Buttons</th>
					<!-- <th class="center">Big Buttons</th> -->
				</tr>
			</thead>
			<tbody>
				<tr>
					<td class="center"><button class="btn btn-block btn-default">Default</button></td>
					<td class="center"><button class="btn btn-block btn-default btn-icon glyphicons home"><i></i>Default</button></td>
					<td class="center">
						<div class="btn-group btn-block">
							<div class="leadcontainer">
								<button class="btn dropdown-lead btn-default">Default</button>
							</div>
							<a class="btn btn-default dropdown-toggle" data-toggle="dropdown" href="#"><span class="caret"></span> </a>
							<ul class="dropdown-menu pull-right">
								<li><a href="#">Action</a></li>
								<li><a href="#">Another action</a></li>
								<li><a href="#">Something else here</a></li>
								<li class="divider"></li>
								<li><a href="#">Separated link</a></li>
							</ul>
						</div>
					</td>
					<td class="center"><button class="btn btn-block btn-default" disabled="">Default</button></td>
					<td class="center"><button class="btn btn-block btn-default btn-small">Default</button></td>
					<!-- <td class="center"><button class="btn btn-default btn-large btn-icon glyphicons home"><i></i>Default</button></td> -->
				</tr>
				<tr>
					<td class="center"><button class="btn btn-block btn-primary">Primary</button></td>
					<td class="center"><button class="btn btn-block btn-primary btn-icon glyphicons user"><i></i>Primary</button></td>
					<td class="center">
						<div class="btn-group btn-block">
							<div class="leadcontainer">
								<button class="btn dropdown-lead btn-primary">Primary</button>
							</div>
							<a class="btn btn-primary dropdown-toggle" data-toggle="dropdown" href="#"><span class="caret"></span> </a>
							<ul class="dropdown-menu pull-right">
								<li><a href="#">Action</a></li>
								<li><a href="#">Another action</a></li>
								<li><a href="#">Something else here</a></li>
								<li class="divider"></li>
								<li><a href="#">Separated link</a></li>
							</ul>
						</div>
					</td>
					<td class="center"><button class="btn btn-block btn-primary" disabled="">Primary</button></td>
					<td class="center"><button class="btn btn-block btn-primary btn-small">Primary</button></td>
					<!-- <td class="center"><button class="btn btn-primary btn-large btn-icon glyphicons user"><i></i>Primary</button></td> -->
				</tr>
				<tr>
					<td class="center"><button class="btn btn-block btn-success">Success</button></td>
					<td class="center"><button class="btn btn-block btn-success btn-icon glyphicons ok"><i></i>Success</button></td>
					<td class="center">
						<div class="btn-group btn-block">
							<div class="leadcontainer">
								<button class="btn dropdown-lead btn-success">Success</button>
							</div>
							<a class="btn btn-success dropdown-toggle" data-toggle="dropdown" href="#"><span class="caret"></span> </a>
							<ul class="dropdown-menu pull-right">
								<li><a href="#">Action</a></li>
								<li><a href="#">Another action</a></li>
								<li><a href="#">Something else here</a></li>
								<li class="divider"></li>
								<li><a href="#">Separated link</a></li>
							</ul>
						</div>
					</td>
					<td class="center"><button class="btn btn-block btn-success" disabled="">Success</button></td>
					<td class="center"><button class="btn btn-block btn-success btn-small">Success</button></td>
					<!-- <td class="center"><button class="btn btn-success btn-large btn-icon glyphicons ok"><i></i>Success</button></td> -->
				</tr>
				<tr>
					<td class="center"><button class="btn btn-block btn-warning">Warning</button></td>
					<td class="center"><button class="btn btn-block btn-warning btn-icon glyphicons circle_exclamation_mark"><i></i>Warning</button></td>
					<td class="center">
						<div class="btn-group btn-block">
							<div class="leadcontainer">
								<button class="btn dropdown-lead btn-warning">Warning</button>
							</div>
							<a class="btn btn-warning dropdown-toggle" data-toggle="dropdown" href="#"><span class="caret"></span> </a>
							<ul class="dropdown-menu pull-right">
								<li><a href="#">Action</a></li>
								<li><a href="#">Another action</a></li>
								<li><a href="#">Something else here</a></li>
								<li class="divider"></li>
								<li><a href="#">Separated link</a></li>
							</ul>
						</div>
					</td>
					<td class="center"><button class="btn btn-block btn-warning" disabled="">Warning</button></td>
					<td class="center"><button class="btn btn-block btn-warning btn-small">Warning</button></td>
					<!-- <td class="center"><button class="btn btn-warning btn-large btn-icon glyphicons circle_exclamation_mark"><i></i>Warning</button></td> -->
				</tr>
				<tr>
					<td class="center"><button class="btn btn-block btn-info">Info btn</button></td>
					<td class="center"><button class="btn btn-block btn-info btn-icon glyphicons circle_info"><i></i>Info btn</button></td>
					<td class="center">
						<div class="btn-group btn-block">
							<div class="leadcontainer">
								<button class="btn dropdown-lead btn-info">Info btn</button>
							</div>
							<a class="btn btn-info dropdown-toggle" data-toggle="dropdown" href="#"><span class="caret"></span> </a>
							<ul class="dropdown-menu pull-right">
								<li><a href="#">Action</a></li>
								<li><a href="#">Another action</a></li>
								<li><a href="#">Something else here</a></li>
								<li class="divider"></li>
								<li><a href="#">Separated link</a></li>
							</ul>
						</div>
					</td>
					<td class="center"><button class="btn btn-block btn-info" disabled="">Info btn</button></td>
					<td class="center"><button class="btn btn-block btn-info btn-small">Info btn</button></td>
					<!-- <td class="center"><button class="btn btn-info btn-large btn-icon glyphicons circle_info"><i></i>Info btn</button></td> -->
				</tr>
				<tr>
					<td class="center"><button class="btn btn-block btn-inverse">Inverse</button></td>
					<td class="center"><button class="btn btn-block btn-inverse btn-icon glyphicons flash"><i></i>Inverse</button></td>
					<td class="center">
						<div class="btn-group btn-block">
							<div class="leadcontainer">
								<button class="btn dropdown-lead btn-inverse">Inverse</button>
							</div>
							<a class="btn btn-inverse dropdown-toggle" data-toggle="dropdown" href="#"><span class="caret"></span> </a>
							<ul class="dropdown-menu pull-right">
								<li><a href="#">Action</a></li>
								<li><a href="#">Another action</a></li>
								<li><a href="#">Something else here</a></li>
								<li class="divider"></li>
								<li><a href="#">Separated link</a></li>
							</ul>
						</div>
					</td>
					<td class="center"><button class="btn btn-block btn-inverse" disabled="">Inverse</button></td>
					<td class="center"><button class="btn btn-block btn-inverse btn-small">Inverse</button></td>
					<!-- <td class="center"><button class="btn btn-inverse btn-large btn-icon glyphicons flash"><i></i>Inverse</button></td> -->
				</tr>
			</tbody>
		</table><br/>

		<div class="widget-head">
			<h3 class="heading">Sliders</h3>
		</div>
		<div class="widget-body" style="padding: 20px 0;">

			<h4 class="heading-arrow">Simple Slider</h4>
			<div class="innerLR">
				<div class="slider-single slider-primary"></div>
			</div>	
			
			<div class="separator"></div>
			
			<h4 class="heading-arrow">Range Slider</h4>
			<div class="innerLR">
				<div class="range-slider row-fluid">
					<div class="span3"><input type="text" class="amount span12" /></div>
					<div class="span9" style="padding: 5px 0 0;"><div class="slider slider-primary"></div></div>
				</div>
			</div>
			
			<div class="separator"></div>
			
			<h4 class="heading-arrow">Range Fixed Minimum Slider</h4>
			<div class="innerLR">
				<div class="slider-range-min row-fluid">
					<div class="span3">
						<label class="span8">Maximum price:</label> 
						<input type="text" class="amount span4" />
					</div>
					<div class="span9" style="padding: 5px 0 0;">
						<div class="slider slider-primary"></div>
					</div>
				</div>
			</div>
			
			<div class="separator"></div>
			
			<h4 class="heading-arrow">Range Fixed Maximum Slider</h4>
			<div class="innerLR">
				<div class="slider-range-max row-fluid">
					<div class="span3">
					    <label class="span8">Maximum price:</label>
					    <input type="text" class="amount span4" />
					</div>
					<div class="span9" style="padding: 5px 0 0;"><div class="slider slider-primary"></div></div>
				</div>
			</div>
				
			<div class="separator"></div>
			
			<h4 class="heading-arrow">Snap to Increments Slider</h4>
			<div class="innerLR">
				<div class="increments-slider row-fluid">
					<div class="span3">
						 <label class="span8">$50 increments:</label>
					    <input type="text" class="span4 amount" />
				    </div>
				    <div class="span9" style="padding: 5px 0 0;">
						<div class="slider slider-primary"></div>
					</div>
				</div>
			</div>
			
			<div class="separator"></div>
			
			<h4 class="heading-arrow">Vertical Sliders</h4>
			<div class="innerLR">
				<div class="sliders-vertical">
				    <span class="slider-primary">77</span>
				    <span class="slider-warning">55</span>
				    <span class="slider-success">33</span>
				    <span class="slider-inverse">40</span>
				    <span class="slider-info">45</span>
				    <div class="clearfix"></div>
				</div>
			</div>
		</div>

		<table class="table table-bordered">
			<thead>
				<tr>
					<th>Alerts</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>
						<div class="alert">
							<button type="button" class="close" data-dismiss="alert">&times;</button>
							<strong>Warning!</strong> Best check yo self, you're not looking
							too good.
						</div>
						<div class="alert alert-error">
							<button type="button" class="close" data-dismiss="alert">&times;</button>
							<strong>Oh snap!</strong> Change a few things up and try submitting
							again.
						</div>
					
						<div class="alert alert-success">
							<button type="button" class="close" data-dismiss="alert">&times;</button>
							<strong>Well done!</strong> You successfully read this important
							alert message.
						</div>
					
						<div class="alert alert-info">
							<button type="button" class="close" data-dismiss="alert">&times;</button>
							<strong>Heads up!</strong> This alert needs your attention, but
							it's not super important.
						</div>
					
						<div class="alert alert-block alert-error fade in">
							<button type="button" class="close" data-dismiss="alert">&times;</button>
							<h4 class="alert-titleing">Oh snap! You got an error!</h4>
							<p>Change this and that and try again. Duis mollis, est non commodo
								luctus, nisi erat porttitor ligula, eget lacinia odio sem nec
								elit. Cras mattis consectetur purus sit amet fermentum.</p>
							<p>
								<a class="btn btn-danger btn-icon glyphicons circle_arrow_right" href="#"><i></i>Take this action</a> 
								<a class="btn btn-success btn-icon glyphicons leaf" href="#"><i></i>Or do this</a>
							</p>
						</div>
					</td>
				</tr>
			</tbody>
		</table>
		<br/>
		
		<table class="table table-bordered table-fill">
			<thead>
				<tr>
					<th class="shortRight">Progress Bars</th>
					<th></th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td class="shortRight">Default</td>
					<td>
						<div class="progress progress-striped">
							<div class="bar" style="width: 20%;"></div>
						</div>
					</td>
				</tr>
				<tr>
					<td class="shortRight">Info</td>
					<td>
						<div class="progress progress-striped  progress-info">
							<div class="bar" style="width: 40%;"></div>
						</div>
					</td>
				</tr>
				<tr>
					<td class="shortRight">Success</td>
					<td>
						<div class="progress progress-striped  progress-success">
							<div class="bar" style="width: 60%;"></div>
						</div>
					</td>
				</tr>
				<tr>
					<td class="shortRight">Warning</td>
					<td>
						<div class="progress progress-striped progress-warning">
							<div class="bar" style="width: 80%;"></div>
						</div>
					</td>
				</tr>
				<tr>
					<td class="shortRight">Danger</td>
					<td>
						<div class="progress progress-striped progress-danger">
							<div class="bar" style="width: 20%;"></div>
						</div>
					</td>
				</tr>
			</tbody>
		</table>
		<br/>
		
		<div class="row-fluid">
			<div class="span6">
				<div class="relativeWrap">
					<div class="widget widget-gray widget-gray-white margin-bottom-none">
						<div class="widget-head">
							<h4 class="heading">Pagination</h4>
						</div>
						<div class="widget-body">
							<div class="pagination pagination-large" style="margin-top: 0; margin-bottom: 12px;">
								<ul>
									<li class="disabled"><a href="#">&laquo;</a></li>
									<li class="active"><a href="#">1</a></li>
									<li><a href="#">2</a></li>
									<li><a href="#">3</a></li>
									<li><a href="#">&raquo;</a></li>
								</ul>
							</div>
							<div class="pagination" style="margin-top: 0; margin-bottom: 12px;">
								<ul>
									<li class="disabled"><a href="#">&laquo;</a></li>
									<li class="active"><a href="#">1</a></li>
									<li><a href="#">2</a></li>
									<li><a href="#">3</a></li>
									<li><a href="#">4</a></li>
									<li><a href="#">5</a></li>
									<li><a href="#">&raquo;</a></li>
								</ul>
							</div>
							<div class="pagination pagination-small" style="margin-top: 0; margin-bottom: 12px;">
								<ul>
									<li class="disabled"><a href="#">&laquo;</a></li>
									<li class="active"><a href="#">1</a></li>
									<li><a href="#">2</a></li>
									<li><a href="#">3</a></li>
									<li><a href="#">4</a></li>
									<li><a href="#">5</a></li>
									<li><a href="#">&raquo;</a></li>
								</ul>
							</div>
							<div class="pagination pagination-mini" style="margin: 0;">
								<ul>
									<li class="disabled"><a href="#">&laquo;</a></li>
									<li class="active"><a href="#">1</a></li>
									<li><a href="#">2</a></li>
									<li><a href="#">3</a></li>
									<li><a href="#">4</a></li>
									<li><a href="#">5</a></li>
									<li><a href="#">&raquo;</a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>	
			</div>
			<div class="span6">
				
				<div class="widget widget-gray widget-gray-white">
					<div class="widget-head">
						<h4 class="heading">Aligned right</h4>
					</div>
					<div class="widget-body">
						<div class="pagination pagination-right pagination-small" style="margin: 0;">
							<ul>
								<li class="disabled"><a href="#">&laquo;</a></li>
								<li class="active"><a href="#">1</a></li>
								<li><a href="#">2</a></li>
								<li><a href="#">&raquo;</a></li>
							</ul>
						</div>
					</div>
				</div>
				
				<div class="widget widget-gray widget-gray-white">
					<div class="widget-head">
						<h4 class="heading">Aligned center</h4>
					</div>
					<div class="widget-body">
						<div class="pagination pagination-centered pagination-small" style="margin: 0;">
							<ul>
								<li class="disabled"><a href="#">&laquo;</a></li>
								<li class="active"><a href="#">1</a></li>
								<li><a href="#">2</a></li>
								<li><a href="#">&raquo;</a></li>
							</ul>
						</div>
					</div>
				</div>
				
				<div class="widget widget-gray widget-gray-white margin-bottom-none">
					<div class="widget-head">
						<h4 class="heading">Pager</h4>
					</div>
					<div class="widget-body">
						<ul class="pager" style="margin: 0;">
							<li class="previous disabled"><a href="#">&larr; Older</a></li>
							<li class="next"><a href="#">Newer &rarr;</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	
	</div>

</div>