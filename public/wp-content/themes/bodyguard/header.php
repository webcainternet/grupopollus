<!doctype html>
	<!--[if IE 9]><html class="lt-ie10" lang="en" > <![endif]-->
	<html class="no-js"  <?php language_attributes(); ?> >
	<head>
		<meta content="text/html;charset=UTF-8" http-equiv="content-type">
		<meta charset="utf-8">
		<meta content="width=device-width, initial-scale=1, maximum-scale=1" name="viewport">
		<?php if ( ! function_exists( 'has_site_icon' ) ) { ?>
		<?php if(wd_get_option('wd_favicon','')!= '') { ?>
			<link rel="shortcut icon" href="<?php echo wd_get_option('wd_favicon',''); ?>" />
		<?php } ?>
		<?php } ?>
		<?php wp_head() ?>

		<style type="text/css">
		.vc_custom_1445352412237 {
			padding-top: 20px !important;
		}
		</style>
	</head>
	<?php if(wd_get_option('wd_box_wrapper','of')=='on') {$box='wd_wrapper';$body_bg='bg_body_color';}else{$box='';$body_bg='';} ?>
	
	<body <?php  body_class($body_bg); ?> >

		<?php
			if ( is_user_logged_in() ) {
				//get_template_part( 'parts/styleswicher' );
			}

      if (wd_get_option('wd_menu_style','creative') == "") {
        define("MENU_STYLE", "corporate", true );
      }else{
        define("MENU_STYLE", wd_get_option('wd_menu_style','creative'), true );
      }

			if(MENU_STYLE == "offcanvas") { ?>
			<div class="off-canvas-wrap" data-offcanvas>
			  <div class="inner-wrap">
			    <a class="left-off-canvas-toggle" href="#"><i class="fa fa-bars"></i></a>
			    <aside class="left-off-canvas-menu">
			      <?php	$defaults = array( 'walker' => new top_bar_walker	);

            wp_nav_menu( $defaults );
            ?>
			    </aside>
			<?php } ?>

			<?php if(wd_get_option('wd_box_wrapper','of')=='on') { ?>
 				<img src="<?php echo wd_get_option('wd_home_page','of') ?>" class="bg_image_body" alt="">
 			<?php } ?>

		<div id="spaces-main" class="pt-perspective <?php echo esc_attr( $box ) ?>
					<?php if(wd_get_option('wd_menu_overlay','off') == 'on') echo "menu-overlay "; ?>">
					
  		<div class="page-section home-page" id="page-content">
			<!--.l-header region -->
			<header class="l-header style-2 <?php echo wd_get_option('wd_menu_style','creative'); ?>-layout">

				<?php get_template_part( 'parts/header-top' ); ?>

				<div class="top-bar-container
					<?php if(wd_get_option('wd_menu_in_grid','') != 'off') echo "contain-to-grid "; ?>
					<?php if(wd_get_option('wd_menu_sticky', 'off')  == 'on') echo "sticky"; ?> ">

					<?php
						$menu_logo_position = 'top_bar_'.wd_get_option('wd_logo_position', 'logo_top');
					?>

					<nav class="top-bar <?php echo esc_attr( $menu_logo_position ) ?>" data-topbar>
						<?php if ( $menu_logo_position == 'top_bar_logo_center' ) {

							get_template_part( 'parts/headermenu', 'logocenter' ); ?>
							<div>
								<?php get_template_part('parts/title-area' ); ?>
							</div>

						<?php } else {

							get_template_part( 'parts/title-area' ); ?>
		          <div class="<?php echo wd_get_option('wd_menu_style','creative'); ?> top-bar-section">
		          <div class="row">
			          <?php
			          get_template_part( 'parts/card-icon' );
			          get_template_part( 'parts/search-icon' );
			          get_template_part( 'parts/headermenu' );
			          ?>
			        </div>
		          </div>

		        <?php } ?>
	        </nav>
	      </div>
			</header>