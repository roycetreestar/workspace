<!-- robot speak -->
<title>
<?php if (!empty($title)) echo $title.' | '; ?>
Fluorish - Dashboard (v1.0)</title>
<?php echo chrome_frame(); ?><?php echo view_port(); ?><?php echo apple_mobile('black-translucent'); ?>

<!-- Meta -->
<meta charset="utf-8">
<?php echo $meta; ?>
<!-- // Meta -->

<!-- Icons and a tile -->
<?php echo windows_tile(array('name' => 'Fluorish', 'image' => base_url().'/assets/img/icons/tile.png', 'color' => '#4eb4e5')); ?>
<?php echo favicons(); ?>
<!-- // Icons and a tile -->

<!-- CSS -->
    <!-- CSS Global Styles -->
    <?php echo add_css(array('bootstrap.css')); ?>
    <!-- // CSS Global Styles -->
    <!-- CSS Page Specific Styles -->
    <?php echo $css; ?>
    <!-- // CSS Page Specific Styles -->
<!-- // End CSS -->

<!-- JQuery v1.8.2 -->
<?php echo jquery('1.8.2'); ?>
<?php echo shiv(); ?>
<?php echo add_js(array('modernizr.custom.76094.js')); ?>
<?php echo $js; ?>

<!-- Google Analytics -->
<script type="text/javascript">

	  var _gaq = _gaq || [];
	  _gaq.push(['_setAccount', '']);
	  _gaq.push(['_trackPageview']);
	
	  (function() {
	    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
	    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
	    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
	  })();
	
	</script>