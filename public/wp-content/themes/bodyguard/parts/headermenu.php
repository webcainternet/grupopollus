<?php
/**
 * Created by PhpStorm.
 * User: Mimoun
 * Date: 10/06/2015
 * Time: 23:33
 */


if(MENU_STYLE == "corporate") {
	$defaults = array(
		'theme_location' => 'primary',
		'container_class' => 'menu-menu-container',
		'menu_class'      => 'menu right',
		'menu_id'         => 'menu-menu',
		'walker'          => new wd_top_bar_walker
	);
	wp_nav_menu( $defaults );
	?>

<?php }elseif(MENU_STYLE == "modern") { ?>
	<a href="#" id="trigger-overlay" title=""><i class="fa fa-bars"></i></a>
	<div class="overlay overlay-scale">
		<button type="button" class="overlay-close">Close</button>
		<nav>
			<?php
			$defaults = array(
				'walker'          => new wd_top_bar_walker
			);
			wp_nav_menu( $defaults ); ?>
		</nav>
	</div>

<?php }elseif(MENU_STYLE == "creative") { ?>
	<?php
	$defaults = array(
		'theme_location' => 'primary',
		'menu_class'      => 'menu right',
		'walker'          => new wd_top_bar_walker
	);
	wp_nav_menu( $defaults ); ?>

<?php } elseif(MENU_STYLE == "nav-layout-metro") { // MENU_STYLE == "nav-layout-metro" ?>
	<?php  wp_nav_menu(array('container_class'=>'top-bar-section','container'=>'div',
	                         'menu_class' => 'main-nav','menu_id' => 'main-menu',
	                         'walker' => new wd_top_bar_walker  )); ?>
<?php }