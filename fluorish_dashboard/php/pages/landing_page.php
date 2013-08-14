<div id="landing_1">
	<div class="banner">
		<div class="container-960">
			<div class="banner-wrapper banner-1">
				<?php if (DEMO): ?>
				<img src="<?php echo getURL(); ?>theme/images/landing_1_banner_1.jpg" alt="Banner" />
				<?php else: ?>
				<img src="http://dummyimage.com/960x321/000000/151515&amp;text=Banner" alt="Banner" />
				<?php endif; ?>
				<h3>Amazing, Clean &amp; Pixel Perfect</h3>
				<p>Grunge Portrait Of A Beautiful American Retro Female Cadet Dressed In Navy <a href="">Uniform</a> While Saluting In A Military Pin Up Girl Concept On Army Star Background</p>
				<a href="" class="btn btn-large btn-icon btn-primary glyphicons chevron-right"><i></i>Check it out</a>
			</div>
		</div>
	</div>
	<div class="container-960">
		<div class="row-fluid">
			<div class="span6">
				<h5 class="innerT">News</h5>
				<div class="glyphicons circle_info">
					<i></i>
					<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard</p>
				</div>
			</div>
			<div class="span6">
				<div class="social-large">
					<a href="" class="active glyphicons facebook"><i></i>facebook</a>
					<a href="" class="glyphicons google_plus"><i></i>google+</a>
					<a href="" class="glyphicons twitter"><i></i>twitter</a>
					<a href="" class="glyphicons forrst"><i></i>forrst</a>
					<a href="" class="glyphicons skype"><i></i>skype</a>
				</div>
			</div>
		</div>
	</div>
	<div class="separator-line margin-none"></div>
	<div class="mosaic-line mosaic-line-2">
		<div class="container-960 center">
			<h2 class="margin-none"><strong class="text-primary">Amazing</strong> Landing Page <span class="hidden-phone">Lovely headline here</span></h2>
		</div>
	</div>
	<div class="container-960 innerT">
		<div class="row-fluid innerTB">
			<div class="span6">
				<div class="separator bottom"></div>
				<div class="glyphicons glyphicon-large shield">
					<i></i>
					<h4>Fully Responsive Landing Page</h4>
					<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an <br/> <a href="">learn more</a></p>
				</div>
				<div class="separator bottom"></div>
				<div class="glyphicons glyphicon-large group">
					<i></i>
					<h4>User Friendly &amp; Retina Ready Design</h4>
					<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an <br/> <a href="">learn more</a></p>
				</div>
			</div>
			<div class="span6">
				<div class="banner-1 carousel slide" id="myCarousel">
					<div class="carousel-inner">
						<?php for ($i=1;$i<=5;$i++): ?>
						<!-- Item -->
						<div class="item<?php if ($i == 1): ?> active<?php endif; ?>">
							<div class="row-fluid">
								<div class="span5 relativeWrap">
									<div class="carousel-caption">
										<h4>Get this item now!</h4>
										<p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.<br/> </p>
									</div>
								</div>
								<div class="span7">
									<img src="<?php echo getURL(); ?>theme/images/gallery-2/<?php echo $i; ?>.jpg" alt="" />
								</div>
							</div>
						</div>
						<!-- // Item END -->
						<?php endfor; ?>
					</div>
					<ol class="carousel-indicators">
						<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
						<li data-target="#myCarousel" data-slide-to="1"></li>
						<li data-target="#myCarousel" data-slide-to="2"></li>
					</ol>
				</div>
			</div>
		</div>
	</div>
	<div class="separator-line margin-none"></div>
	<div class="mosaic-line mosaic-line-2">
		<div class="container-960 center">
			<h2 class="margin-none">Based On <strong class="text-primary">Bootstrap</strong> <span class="hidden-phone">Twitter's Awesome Framework</span></h2>
		</div>
	</div>
	<div class="container-960 innerTB">
		<div class="row-fluid row-merge">
			<div class="span4">
				<div class="separator bottom"></div>
				<div class="glyphicons glyphicon-xlarge glyphicon-top display">
					<i></i>
					<h4>Fully Responsive</h4>
					<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an <br/> <a href="">learn more</a></p>
				</div>
			</div>
			<div class="span4">
				<div class="separator bottom"></div>
				<div class="glyphicons glyphicon-xlarge glyphicon-top iphone glyphicon-primary">
					<i></i>
					<h4>Mobile Friendly</h4>
					<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an <br/> <a href="">learn more</a></p>
				</div>
			</div>
			<div class="span4">
				<div class="separator bottom"></div>
				<div class="glyphicons glyphicon-xlarge glyphicon-top cogwheel">
					<i></i>
					<h4>Fully Customizable</h4>
					<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an <br/> <a href="">learn more</a></p>
				</div>
			</div>
		</div>
	</div>
	<div class="separator-line margin-none"></div>
	<div class="mosaic-line">
		<div class="container-960 right">
			<div class="innerLR"><span class="innerR">Do you like this?</span> <a href="" class="btn btn-success">Learn more</a></div>
		</div>
	</div>
	<div class="container-960 innerTB">
		<div class="row-fluid innerT">
			<div class="span6">
				<div class="separator bottom"></div>
				<div class="glyphicons glyphicon-large shield">
					<i></i>
					<h4>Fully Responsive Landing Page</h4>
					<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an <br/> <a href="">learn more</a></p>
				</div>
			</div>
			<div class="span6">
				<div class="separator bottom"></div>
				<div class="glyphicons glyphicon-large group group-column">
					<i></i>
					<h4>User Friendly &amp; Retina Ready Design</h4>
					<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an <br/> <a href="">learn more</a></p>
				</div>
			</div>
		</div>
	</div>
	<div class="container-960 innerTB">
		<!-- Pricing table -->
		<table class="table table-bordered table-vertical-center table-pricing table-pricing-2">
		
			<!-- Table heading -->
			<thead>
				<tr>
					<th class="center">Free Plan</th>
					<th class="center">Bronze Plan</th>
					<th class="center">Silver Plan</th>
					<th class="center">Gold Plan</th>
				</tr>
			</thead>
			<!-- // Table heading END -->
			
			<!-- Table body -->
			<tbody>
			
				<!-- Table pricing row -->
				<tr class="pricing">
					<td class="center">
						<span class="price">&dollar;0.00</span>
						<span>per month</span>
					</td>
					<td class="center">
						<span class="price">&dollar;9.99</span>
						<span>per month</span>
					</td>
					<td class="center">
						<span class="price">&dollar;19.99</span>
						<span>per month</span>
					</td>
					<td class="center">
						<span class="price">&dollar;49.99</span>
						<span>per month</span>
					</td>
				</tr>
				<!-- // Table pricing row END -->
				
				<!-- Table row -->
				<tr>
					<td class="center">
						Setup &amp; Installation<br/>
						HTML Templates<br/>
						SMS Templates<br/>
						API Included<br/>
						Tracking system
						<div class="separator bottom"></div>
						<button class="btn btn-primary">Sign up</button>
					</td>
					<td class="center">
						Setup &amp; Installation<br/>
						HTML Templates<br/>
						SMS Templates<br/>
						API Included<br/>
						Tracking system
						<div class="separator bottom"></div>
						<button class="btn btn-primary">Sign up</button>
					</td>
					<td class="center">
						Setup &amp; Installation<br/>
						HTML Templates<br/>
						SMS Templates<br/>
						API Included<br/>
						Tracking system
						<div class="separator bottom"></div>
						<button class="btn btn-primary">Sign up</button>
					</td>
					<td class="center">
						Setup &amp; Installation<br/>
						HTML Templates<br/>
						SMS Templates<br/>
						API Included<br/>
						Tracking system
						<div class="separator bottom"></div>
						<button class="btn btn-primary">Sign up</button>
					</td>
				</tr>
				<!-- // Table row END -->
				
			</tbody>
			<!-- // Table body END -->
			
		</table>
		<!-- // Pricing table END -->
	</div>
	<div class="separator bottom"></div>
	<div class="separator-line margin-none"></div>
	<div class="mosaic-line mosaic-line-2">
		<div class="container-960 center">
			<h2 class="margin-none">Lorem Ipsum <strong class="text-primary">Dolor</strong> <span class="hidden-phone">Yet another headline</span></h2>
		</div>
	</div>
	<div class="container-960 innerTB">
		<div class="separator bottom"></div>
		<div class="row-fluid">
			<div class="span7">
				<h3 class="glyphicons google_maps"><i></i>Contact us</h3>
				<form class="row-fluid margin-none">
					<div class="span6">
						<input type="text" class="span12" name="name" placeholder="YOUR NAME">
					</div>
					<div class="span6"> 
						<input type="text" class="span12" name="phone" placeholder="PHONE">
					</div>
					<textarea name="message" class="span12" rows="5" placeholder="YOUR MESSAGE"></textarea>
					<div class="right">
						<button class="btn btn-primary btn-icon glyphicons envelope"><i></i> Send message</button>
					</div>
				</form>
			</div>
			<div class="span5">
				<div class="well margin-none">
					<address class="margin-none">
						<h2>John Doe</h2>
						<strong>Business manager</strong> at 
						<strong><a href="#">Business</a></strong><br> 
						<abbr title="Work email">e-mail:</abbr> <a href="mailto:#">john.doe@mybiz.com</a><br /> 
						<abbr title="Work Phone">phone:</abbr> (012) 345-678-901<br/>
						<abbr title="Work Fax">fax:</abbr> (012) 678-132-901
						<div class="separator line"></div>
						<p class="margin-none"><strong>You can also find us:</strong><br/>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean tristique rutrum libero, vel bibendum nunc consectetur sed.</p>
					</address>
				</div>
			</div>
		</div>
	</div>
	
</div>