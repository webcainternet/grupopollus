<?php
/**
 * Created by PhpStorm.
 * User: Mimoun
 * Date: 10/06/2015
 * Time: 23:20
 */

?>
<ul class="title-area">
	<?php $default_logo = get_template_directory_uri() . '/images/logo-2.png'; ?>
	<li class="name <?php if(wd_get_option('wd_logo_position','logo_top')=='logo_top') { echo 'medium-3 large-3 columns' ;} ?>">
		<?php if ( wd_get_option( 'wd_show_logo', 'on' ) == 'on' && wd_get_option( 'wd_logo', $default_logo ) != '' ){
			$image = wd_get_option( 'wd_logo', $default_logo ); ?>
			<h1><a href="<?php echo esc_url(home_url('/')); ?>" rel="home" title="<?php echo bloginfo( 'name' ) ?>" class="active"><img
						src="<?php echo esc_url($image); ?>" alt="logo"/></a></h1>
		<?php }

		 if ( wd_get_option( 'wd_show_title','' ) == 'on' && wd_get_option( 'wd_show_title','' ) != '' ){ ?>
			<h2><?php echo bloginfo( 'name' ) ?></h2>
		<?php } ?>
	</li>
<?php if(wd_get_option('wd_logo_position','logo_top')=='logo_top' && wd_get_option('wd_show_top_social_bare','on')=='on'){ ?>
	<li class="medium-7 large-9 columns social_logo_top">
					
					<ul class="social-icons accent inline-list" style="margin-top: 0px; ">
						<?php /*

						<?php if (wd_get_option('flickr','') != ""): ?>
							<li class="flickr">
								<a href="http://www.flickr.com/<?php echo wd_get_option('flickr',''); ?>"><i class="fa fa-flickr"></i></a>
							</li>
						<?php endif ?>
						<?php if (wd_get_option('facebook', '') != ""): ?>
							<li class="facebook">
								<a href="https://www.facebook.com/<?php echo wd_get_option('facebook', ''); ?>"><i class="fa fa-facebook"></i></a>
							</li>
						<?php endif ?>
						<?php if (wd_get_option('twitter' ,'') != ""): ?>
							<li class="twitter">
								<a href="https://twitter.com/<?php echo wd_get_option('twitter' ,''); ?>"><i class="fa fa-twitter"></i></a>
							</li>
						<?php endif ?>
						<?php if (wd_get_option('vimeo', '') != ""): ?>
							<li class="vimeo">
								<a href="https://vimeo.com/<?php echo wd_get_option('vimeo', ''); ?>"><i class="fa fa-vimeo-square"></i></a>
							</li>
						<?php endif ?>

						*/ ?>
						<span style="text-transform: uppercase; font-size: 12px; margin-left: 15px;">Faça um orçamento</span>
						<span style="text-transform: uppercase; font-size: 12px; margin-left: 15px;"><i class="fa fa-phone" aria-hidden="true"></i> (11) 5591-2400 / (11) 3467-1390</span>
					</ul>
					<div>
						<span style="text-transform: uppercase; font-size: 12px; margin-left: 15px;">Quem Somos</span>
						<span style="text-transform: uppercase; font-size: 12px; margin-left: 15px;">Trabalhe conosco</span>
					</div>
					
	</li>
<?php
	} if ( MENU_STYLE != "offcanvas" && MENU_STYLE != "modern" ) { ?>
		<li class="medium-2 toggle-topbar menu-icon">
			<a href="#"><span>Menu</span></a>
		</li>
	<?php } ?>
</ul>