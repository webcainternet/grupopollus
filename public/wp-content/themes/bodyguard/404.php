<!DOCTYPE html>
<!-- Sorry no IE7 support! -->
<!-- @see http://foundation.zurb.com/docs/index.html#basicHTMLMarkup -->

<!--[if IE 8]><html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="en">
	<!--<![endif]-->
<?php global $wp_query; ?>
	<head>
		<meta charset="utf-8" />
		<meta content="ie=edge, chrome=1" http-equiv="x-ua-compatible" />
		<meta http-equiv="ImageToolbar" content="false" />
		<meta name="viewport" content="width=device-width" />
		<link rel="shortcut icon" href="<?php echo wd_get_option('wd_favicon',''); ?>" />
	<?php wp_head(); ?>
	</head>
	<body>
		

  	<div class="corp">
		<div class="row">
			<section class="oops">
				<h2>Oops!!</h2>
			</section>
			<section>
				<p class="message">
					It looks like that page no longer exists. Would you like to go to <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><strong>Homepage</strong></a>  instead?
				</p>
			</section>
			<section class="large-6 columns">
				<form action="<?php echo esc_url( home_url( '/' ) ); ?>" id="serch" method="get">
					   <input type="text" class="text-input" id="s" name="s" value="Search" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Search';}">
					   <input  type="submit" class="submit-input" value="serch">
				    </form>
			</section>
		</div>	
	</div>
	<div class="oops-footer">
		<ul class="row social-icons accent inline-list">
					<?php if (wd_get_option('flickr','') != ""): ?>
						<li class="flickr">
							<a href="http://www.flickr.com/<?php echo wd_get_option('flickr',''); ?>"><i class="fa fa-flickr"></i></a>
						</li>
					<?php endif ?>
					<?php if (wd_get_option('facebook','') != ""): ?>
						<li class="facebook">
							<a href="https://www.facebook.com/<?php echo wd_get_option('facebook',''); ?>"><i class="fa fa-facebook"></i></a>
						</li>
					<?php endif ?>
					<?php if (wd_get_option('twitter','') != ""): ?>
						<li class="twitter">
							<a href="https://twitter.com/<?php echo wd_get_option('twitter',''); ?>"><i class="fa fa-twitter"></i></a>
						</li>
					<?php endif ?>
					<?php if (wd_get_option('vimeo','') != ""): ?>
						<li class="vimeo">
							<a href="https://vimeo.com/<?php echo wd_get_option('vimeo',''); ?>"><i class="fa fa-vimeo-square"></i></a>
						</li>
					<?php endif ?>
				</ul>
	</div>

	<?php wp_footer(); ?> 
</body>
</html>