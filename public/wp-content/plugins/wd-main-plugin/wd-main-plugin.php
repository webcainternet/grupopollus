<?php 

/**
 * Plugin Name: Webdevia main plugin
 * Plugin URI: http://www.themeforest.net/user/Mymoun
 * Description: Add features to Mymoun themes.
 * Version: 0.1
 * Author: Mymoun
 * Author URI: http://www.themeforest.net/user/Mymoun
 */




require_once(  plugin_dir_path( __FILE__ ).'post-types.php' );
require_once(  plugin_dir_path( __FILE__ ).'meta-box.php' );

require_once(  plugin_dir_path( __FILE__ ).'shortcode/latsone.php' );
require_once(  plugin_dir_path( __FILE__ ).'shortcode/wd_pricing_table.php' );
require_once(  plugin_dir_path( __FILE__ ).'shortcode/wd_client.php' );
require_once(  plugin_dir_path( __FILE__ ).'shortcode/wd_team.php' );
require_once(  plugin_dir_path( __FILE__ ).'shortcode/wd_vc_portfolio.php' );
require_once(  plugin_dir_path( __FILE__ ).'shortcode/wd_testimonial.php' );
require_once(  plugin_dir_path( __FILE__ ).'shortcode/wd_single_post.php' );
require_once(  plugin_dir_path( __FILE__ ).'shortcode/wd_countup.php' );
require_once(  plugin_dir_path( __FILE__ ).'shortcode/wd_chartpie.php' );
require_once(  plugin_dir_path( __FILE__ ).'shortcode/wd_icon_text.php' );
require_once(  plugin_dir_path( __FILE__ ).'shortcode/wd_featured_box.php' );
require_once(  plugin_dir_path( __FILE__ ).'shortcode/wd_flip_image.php' );
require_once(  plugin_dir_path( __FILE__ ).'shortcode/wd_recent_blog.php' );
require_once(  plugin_dir_path( __FILE__ ).'shortcode/wd_blog.php' );
require_once(  plugin_dir_path( __FILE__ ).'shortcode/parametre_shortcode.php' );
require_once(  plugin_dir_path( __FILE__ ).'shortcode/wd_google_map.php' );
require_once(  plugin_dir_path( __FILE__ ).'shortcode/progress_bars.php' );
require_once(  plugin_dir_path( __FILE__ ).'shortcode/wd_modal.php' );


require_once(  plugin_dir_path( __FILE__ ).'widgets/aboutme.php' );
require_once(  plugin_dir_path( __FILE__ ).'widgets/one-post.php' );
require_once(  plugin_dir_path( __FILE__ ).'widgets/widget.php' );
require_once(  plugin_dir_path( __FILE__ ).'widgets/adress.php' );