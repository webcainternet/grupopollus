<?php
/*/////////////////////////////   Global Variables  //////////////////////////////////////*/
$themename = "'Bodyguard'";
$themefolder = "'bodyguard'";

define ('THEME_NAME', $themename );
define ('theme_version' , 1 );

load_theme_textdomain( THEME_NAME, get_template_directory().'/languages' );


/**
 *----------------- include ------------------------------------------
 */

include_once( 'inc/tools.php' );
include_once( 'inc/plugins/plugins.php' );
include_once( 'inc/panel.php' );
include_once( 'inc/mega-menu.php' );
include_once( get_template_directory() . '/inc/import/wd-import.php' );


/* Add post formats */

if ( function_exists( 'add_theme_support' ) ) {
	add_theme_support( 'post-thumbnails' );
	add_theme_support('post-formats', array('gallery', 'link', 'quote', 'video', 'audio'));
	add_theme_support('automatic-feed-links');
	add_theme_support( 'woocommerce' );
	add_theme_support('custom-background');
	add_theme_support( 'title-tag' );
	add_theme_support( 'html5', array( 'search-form' ) );
}


/*-----------------add Body Classes------------------------------------------*/
function wd_body_classes( $classes ) {
	global $wp_query;
	if( is_object($wp_query) && is_object($wp_query->post) && isset($wp_query->post->ID)) {
		$wd_thePageID = $wp_query->post->ID;
	}else{
		$wd_thePageID = '';
	}
	$wd_page_show_title_area = get_post_meta($wd_thePageID, 'wd_page_show_title_area', true);

	//if($wd_page_show_title_area != ''){
		$classes[] = 'has-title-area';
	//}
	return $classes;
}
add_filter( 'body_class','wd_body_classes' );

/*
 * ----------header title----------
 */
 function wd_wp_title_for_home( $title, $sep ) {
	global $paged, $page;
	if ( is_feed() )
		return $title;
	

	// Add the site description for the home/front page.
	$site_description = get_bloginfo( 'name', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		$title = esc_html__( 'Home - ', 'bodyguard' ) ."$title $sep $site_description";
	
	return $title;
}
add_filter( 'wp_title', 'wd_wp_title_for_home', 10, 2 );

/**
 *-----------------add sidebar------------------------------------------
 */

function wd_widgets_init() {
	register_sidebar(array(
		'name' => esc_html__('Sidebar Right','bodyguard'),
		'id' => 'sidebar-1',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget' => '</section>', 
		'before_title' => '<h2 class="block-title">', 
		'after_title' => '</h2>', 
	));
	register_sidebar(array(
		'name' => esc_html__( 'Sidebar Left','bodyguard'),
		'id' => 'sidebar-2',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget' => '</section>', 
		'before_title' => '<h2 class="block-title">', 
		'after_title' => '</h2>', 
	));
				
	register_sidebar(array( 
		'name' => esc_html__('Footer 1','bodyguard'),
		'id' => 'footer-1',
		'before_widget' => '<li>',
		'after_widget' => '</li>',
		'before_title' => '<h2 class="block-title">', 
		'after_title' => '</h2>', 
	));
	$wd_footer_columns = wd_get_option('wd_footer_columns','three _columns');

	switch ($wd_footer_columns) {
		case "one_columns":
			break;
		case "tow_a_columns":
		case "tow_b_columns":
		case "tow_c_columns":
			register_sidebar(array(
				'name' => esc_html__('Footer 2','bodyguard'),
				'id' => 'footer-2',
				'before_widget' => '<li>',
				'after_widget' => '</li>',
				'before_title' => '<h2 class="block-title">',
				'after_title' => '</h2>',
			));
			break;
		case "three_columns":
			register_sidebar(array(
				'name' => esc_html__('Footer 2','bodyguard'),
				'id' => 'footer-2',
				'before_widget' => '<li>',
				'after_widget' => '</li>',
				'before_title' => '<h2 class="block-title">',
				'after_title' => '</h2>',
			));
			register_sidebar(array(
				'name' => esc_html__('Footer 3','bodyguard'),
				'id' => 'footer-3',
				'before_widget' => '<li>',
				'after_widget' => '</li>',
				'before_title' => '<h2 class="block-title">',
				'after_title' => '</h2>',
			));
			break;
	}

	register_sidebar(array(
		'name' => esc_html__( 'Woocommerce Sidebar','bodyguard' ),
		'id' => 'shop-widgets',
	  'description' => esc_html__( 'Appears on the shop page of your website.', 'bodyguard' ),
	  'before_widget' => '<div id="%1$s" class="widget %2$s shop-widgets">',
	  'after_widget' => '</div>',
	  'before_title' => '<h4 class="widget-title">',
	  'after_title' => '</h4>',
  ));
}

add_action( 'widgets_init', 'wd_widgets_init' );

// This theme uses wp_nav_menu() in two locations.  
register_nav_menus( array(  
  'primary' => esc_html__( 'Primary Navigation', 'bodyguard' ),
  'primary-right' => esc_html__( 'Right', 'bodyguard' ),
) );

function wd_register_wd_menu() {
register_nav_menu('footer',esc_html__( 'Footer', 'bodyguard'));
}
add_action( 'init', 'wd_register_wd_menu' ); 

/**
 *--------------- Image presets-----------
 */

 add_image_size( 'wd_recent-blog-h',       465, 243, true );
 add_image_size( 'wd_recent-blog-v',       390, 308, true );
 add_image_size( 'wd_blog-thumb',          880, 350, true );
 add_image_size( 'wd_270x198',             355, 220, true );
 add_image_size( 'wd_100x100',             100, 100, true );
 add_image_size( 'wd_team',                367, 281, true );
 add_image_size( 'wd_sidebar-thumb',       150, 120, true );
 add_image_size( 'wd_1900x620',            1900, 620, true );
 add_image_size( 'wd_200x91',            200, 91, true );

/**
 * --------------- Number of Products to dispaly per page (9) -----------
 */
add_filter( 'loop_shop_per_page', create_function( '$cols', 'return 9;' ), 20 );



/**
 * --------------- Register Fonts -----------
 *
 * @credit https://gist.github.com/kailoon/e2dc2a04a8bd5034682c
 */
function wd_fonts_url($font_body_name, $wd_font_weight_style, $wd_main_text_font_subsets) {
	$font_url = '';

	/*
	Translators: If there are characters in your language that are not supported
	by chosen font(s), translate this to 'off'. Do not translate into your own language.
	 */
	if ( 'off' !== _x( 'on', 'Google font: on or off', 'studio' ) ) {
		$font_url = add_query_arg( 'family', urlencode( $font_body_name . ':' . $wd_font_weight_style . '&subset=' . $wd_main_text_font_subsets ), "//fonts.googleapis.com/css" );
	}
	return $font_url;
}

/**
 * ---------------load scripts and styles--------------------------------
 */
function wd_load_js_css_file() {
	
	/*----------google -fonts ------------------*/
  $font_body_name = wd_get_option('wd_body_font_familly','Open Sans');
  $wd_font_weight_style = wd_get_option('wd_font-weight-style', '400');
  $wd_main_text_font_subsets = wd_get_option('wd_main-text-font-subsets', 'latin');

  $font_header_name = wd_get_option('wd_head_font_familly','Open Sans');
  $wd_heading_font_weight_style = wd_get_option('wd_heading-font-weight-style', '400');
  $wd_heading_text_font_subsets = wd_get_option('wd_heading-text-font-subsets', 'latin');

  $wd_navigation_font_familly = wd_get_option('wd_navigation_font_familly','Open Sans');
  $wd_navigation_font_weight_style = wd_get_option('wd_navigation-font-weight-style', '400');
  $wd_navigation_text_font_subsets = wd_get_option('wd_navigation-text-font-subsets', 'latin');
  

	// Enqueue body font
  if($font_body_name != "default"){
	  wp_enqueue_style( 'wd-fonts-body', wd_fonts_url($font_body_name, $wd_font_weight_style, $wd_main_text_font_subsets), array(), '1.0.0' );
  }else{
	  wp_enqueue_style('wd-fonts-body',wd_fonts_url('Open+Sans','400,300,700','latin,latin-ext'), array(), '1.0.0' );
  }
	// Enqueue headers font
  if($font_header_name != "default"){
	 wp_enqueue_style( 'wd-fonts-header', wd_fonts_url($font_header_name, $wd_heading_font_weight_style, $wd_main_text_font_subsets), array(), '1.0.0' );
  }
	// Enqueue navigation font
  if($wd_navigation_font_familly != "default"){
   wp_enqueue_style( 'wd-fonts-navigation', wd_fonts_url($wd_navigation_font_familly, $wd_navigation_font_weight_style, $wd_navigation_text_font_subsets), array(), '1.0.0' );
  }




		 
	wp_enqueue_style( 'wd_animation-custom',  get_template_directory_uri() . "/css/animate-custom.css" );
	wp_enqueue_style( 'wd_customstyle',       get_template_directory_uri() . "/css/app.css" );
	wp_enqueue_style( 'wd_component',         get_template_directory_uri() . "/css/vendor/component.css" );
	wp_enqueue_style('wd_custom-style',       get_template_directory_uri() . '/style.css');
	// wp_enqueue_style('custom-style-rtl',       get_template_directory_uri() . '/rtl.css');
	wp_enqueue_style('owlcarouselstyl',    get_template_directory_uri() . "/css/owl.carousel.css");
	if ( function_exists( 'WC' ) ) {
		wp_enqueue_style('wd_woocommerce',      get_template_directory_uri() . "/css/woocommerce.css");
	}
	wp_enqueue_style('mediaelementplayer', get_template_directory_uri() . "/css/mediaelementplayer.css");
	wp_enqueue_style('font-awesome',       get_template_directory_uri() . "/css/font-awesome.min.css");
  if ( is_singular() && comments_open() && wd_get_option( 'thread_comments','' ) ) {
		  wp_enqueue_script( 'comment-reply' );
  }

	  
	wp_enqueue_script('wd_plugins',            get_template_directory_uri() . '/js/plugins.js',array( 'jquery' ));
	wp_enqueue_script('wd_foundation_reveal',  get_template_directory_uri() .     '/js/foundation.reveal.js',array( 'jquery' ));
	wp_enqueue_script('wd_googleapismap', "https://maps.googleapis.com/maps/api/js?v=3.exp", array( 'jquery' ), 3, true );
	wp_enqueue_script('wd_plugins_owl',     get_template_directory_uri() . "/js/wd_owlcarousel.js", array( 'jquery' ) );

	wp_enqueue_script('wd_scripts_shortcodes', get_template_directory_uri() . '/js/shortcode/script-shortcodes.js',array( 'jquery' ));
	wp_enqueue_script('wd_scripts',            get_template_directory_uri() . '/js/scripts.js',array( 'jquery', 'hoverIntent' ));
	//wp_enqueue_script('wd_smoothscroll',            get_template_directory_uri() . '/js/smoothscroll.js');
	wp_enqueue_script('wd_ismobile',            get_template_directory_uri() . '/js/isMobile.min.js');



  global $wp_query;
  if(isset($wp_query->post->ID)) {
  	$wd_thePageID = $wp_query->post->ID;
  }else{
  	$wd_thePageID = '';
  }
	$style = get_post_meta($wd_thePageID, 'wd_page_title_area_style', true);			
	$wd_page_bg_img = get_post_meta($wd_thePageID, 'wd_page_title_area_bg_img', true);
	
 // $wd_page_bg_img = wp_get_attachment_image_src( $wd_page_bg_img, 'full' );	
	
	wp_enqueue_style('custom-line',         get_template_directory_uri() . '/style.css');
  //********* inline style ***************/
  $wd_custom_css = "";
  $wd_custom_css .= "";
  $wd_custom_css .= ".l-footer-columns { background-color: " . wd_get_option('footer_bg_color','') . "}";
  $wd_custom_css .= ".l-footer-columns, .l-footer-columns .block-title , .l-footer-columns ul li a { color: " . wd_get_option('footer_text_color','') . "}";
  $wd_custom_css .= ".l-footer { background-color: " . wd_get_option('copyright_bg_color','') . "; color: " . wd_get_option('copyright_text_color','') . ";}";
  
  $wd_title_bg_img = wd_get_option('wd_title_bg_image', true) == '' ? '' : wd_get_option('wd_title_bg_image', true);

	if($wd_title_bg_img != '1' && $wd_title_bg_img != 1) {
		$wd_custom_css .= "
	            .titlebar {
	              background-image: url('$wd_title_bg_img');
	              background-size: cover;
	            }";
	}
 
			
	$wd_footer_bg_img = wd_get_option('wd_footer_bg_image', true) == '' ? '' : wd_get_option('wd_footer_bg_image', true);
	if($wd_footer_bg_img != '1' && $wd_footer_bg_img != 1) {
		$wd_custom_css .= "
	            .l-footer-columns {
	              background-image: url('$wd_footer_bg_img');
	              background-size: cover;
	            }";
	}
			
	if( is_singular() && has_post_thumbnail() && !wd_is_blog( )){

		$wd_thumb = wp_get_attachment_image_src( get_post_thumbnail_id( $wd_thePageID ), 'full' );
		if($wd_thumb) {
			$wd_custom_css .= "
            .titlebar {
              background-image: url('$wd_thumb[0]');
              background-size: cover;
            }";
		}
	}elseif ( is_page() & ( $style != 'standard' ) ) {
			
			if ( $wd_page_bg_img != '' ) {
				$wd_custom_css .= "
            .titlebar {
              background-image: url(" . esc_attr( $wd_page_bg_img ) . ");
              background-repeat: no-repeat;
              background-size: cover;
            }";
	  }
	  $wd_page_bg_color = esc_attr( get_post_meta($wd_thePageID, 'wd_page_title_area_bg_color', true) );
	  if($wd_page_bg_color !=  '') {
		  $wd_custom_css .= "
            .titlebar {
              background-color: ". $wd_page_bg_color . ";
		        }";
	  }
	  $wd_page_title_fontsize = esc_attr( get_post_meta($wd_thePageID, 'wd_page_title_fontsize', true) );
	  
	  if ($wd_page_title_fontsize == 'small') {
	  	$wd_custom_css .= ".titlebar .title {font-size: 25px;}
	  	                .breadcrumbs { margin-top: 45px; }";
	  } 
	  elseif ($wd_page_title_fontsize == 'medium') {
	  	$wd_custom_css .= ".titlebar .title {font-size: 30px;}";
	  } 
	  elseif ($wd_page_title_fontsize == 'big') {
	  	
	  	$wd_custom_css .= ".titlebar .title {font-size: 40px;}
	  	                .breadcrumbs { margin-top: 78px; }";
	  }

    $wd_custom_css .= "
            .titlebar {
              text-align:".get_post_meta($wd_thePageID, 'wd_page_title_position', true).";
            }
            #page-title,.breadcrumbs a{
            	color:".get_post_meta($wd_thePageID, 'wd_page_title_color', true) .";
            }";					
		}
 						
 		if(wd_get_option('wd_box_wrapper','off')=='on') {
 			$wd_custom_css .= "
 							.bg_body_color {
 								background : ".wd_get_option('wrapper_bg_color','').";
 							}
 			";
 		}
		 if( is_rtl() ){
          $wd_custom_css .= "body, p, #lang_sel_list {
            font-family : 'Droid Arabic Kufi', serif;
          } ";
          
          $wd_custom_css .= "h1, h2, h3, h4, h5, h6 {
              font-family : 'Droid Arabic Naskh', serif;
            } ";
						}else{
 		if((wd_get_option('wd_body_font_familly','Open Sans')!='default') && (wd_get_option('wd_body_font_familly' ,'Open Sans')!= false)){
    $wd_custom_css .= "body ,body p {
    	font-family :'". wd_get_option('wd_body_font_familly', 'Open Sans')."';
    	font-weight :" . wd_get_option('wd_body_font_weight', '400').";
    }";
		}else {
			$wd_custom_css .= "body ,body p {
    	font-family: 'Open Sans', sans-serif;
    	font-weight :" . wd_get_option('wd_body_font_weight', '400').";
    }";
		}
		if((wd_get_option('wd_body-font-size','14')!='default') && (wd_get_option('wd_body-font-size','14')!= false) ){
			$wd_custom_css .= "body p {
    	font-size :". wd_get_option('wd_body-font-size','14')."px;
    }";
		}
		if((wd_get_option('wd_head_font_familly','14')!='default') && (wd_get_option('wd_head_font_familly','14')!= false) ){
    $wd_custom_css .= "h1, h2, h3, h4, h5, h6, .menu-list a {
    	font-family :'". wd_get_option('wd_head_font_familly','14')."';
    	font-weight :" . wd_get_option('wd_heading-font-weight-style','400').";
    }";
    }else {
    	$wd_custom_css .= "h1, h2, h3, h4, h5, h6, .menu-list a {
    	font-family: 'Open Sans', sans-serif;
    	font-weight :" . wd_get_option('wd_heading-font-weight-style','400').";
    }";
    }

		if( wd_get_option('wd_navigation_font_familly', 'Open Sans') != "default") {
			$wd_custom_css .= ".top-bar-section ul li > a {
				font-family : '" . wd_get_option( 'wd_navigation_font_familly', 'Open Sans' ) . "';
			}";
		}
		else {
			$wd_custom_css .= ".top-bar-section ul li > a {
				font-family: 'Open Sans', sans-serif;
			}";	
		}
		if( wd_get_option('wd_navigation-font-weight-style', '400') != "") {
			$wd_custom_css .= ".top-bar-section ul li > a {
				font-weight : " . wd_get_option( 'wd_navigation-font-weight-style' ,'400') . ";
			}";
		}

		if( wd_get_option('wd_navigation-transform' ,'normal') != "") {
			$wd_custom_css .= ".top-bar-section ul li > a {
				text-transform : " . wd_get_option( 'wd_navigation-transform' ,'normal' ) . ";
			}";
		}
		if((wd_get_option('wd_navigation-font-size', '14')!='default') && (wd_get_option('wd_navigation-font-size', '14')!= false) ){
			$wd_custom_css .= ".top-bar-section ul li > a {
    	font-size :". wd_get_option('wd_navigation-font-size', '14')."px;
    }";
		}
		if( wd_get_option('wd_heading-transform', 'normal') != "") {
			$wd_custom_css .= "h1, h2, h3, h4, h5, h6, .menu-list a {
				text-transform : " . wd_get_option( 'wd_heading-transform', 'normal') . ";
			}";
		}
		if( wd_get_option('wd_text-transform', 'normal') != "") {
			$wd_custom_css .= "body ,body p {
				text-transform : " . wd_get_option( 'wd_text-transform', 'normal') . ";
			}";
		}


						}
		$wd_custom_css .= "
									.primary-color_bg, .square-img > a:before,
									.boxes .box > a:before, .boxes .box .flipper a:before,
									.wd_onepost .title-block span, .one_post_box .box_image .titel_icon .box_icon,
									.one_post_box .more, .boxes .box-container > a:before,
									.boxes .box-container .flipper a:before, .layout-4 div.box-icon i.fa,
									.boxes.small.layout-5 .box-icon, .boxes.small.layout-5-inverse .box-icon, 
									.boxes.small.layout-6 .box-icon i.fa, .carousel_blog span.tag a,
									.wd-carousel-container .carousel-icon i, .search_box input[type='submit'],
									table thead, table tfoot, .block-block-17, .row.call-action, .blog-info,
									button.dark:hover, button.dark:focus, .button.dark:hover, .button.dark:focus,
									span.wpb_button:hover, span.wpb_button:focus,.sidebar #searchsubmit,
									.woocommerce .widget_price_filter .ui-slider .ui-slider-range,
									.woocommerce-page .widget_price_filter .ui-slider .ui-slider-range,
									.products .product .button,
									.woocommerce #content input.button.alt, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt,
									.woocommerce button.button.alt, .woocommerce input.button.alt, .woocommerce-page #content input.button.alt,
									.woocommerce-page #respond input#submit.alt, .woocommerce-page a.button.alt,
									.woocommerce-page button.button.alt, .woocommerce-page input.button.alt,
									.woocommerce #content input.button:hover, .woocommerce #respond input#submit:hover, 
									.woocommerce a.button:hover, .woocommerce button.button:hover, 
									.woocommerce input.button:hover, .woocommerce-page #content input.button:hover, 
									.woocommerce-page #respond input#submit:hover, .woocommerce-page a.button:hover,
									.woocommerce-page button.button:hover, .woocommerce-page input.button:hover,
									.woocommerce span.onsale, .woocommerce-page span.onsale,
									.woocommerce-page button.button, .widget_product_search #searchsubmit, .widget_product_search #searchsubmit:hover,
									.sidebar #searchsubmit, .l-footer-columns #searchsubmit,
									.featured-box-text .featured-box-button a,.readmore a,.boxes.small.layout-7 .box-icon i.fa,.featured-box-button a,.l-footer-columns .wpcf7-form .wpcf7-submit
									.featured-box-button .button.alert, .textwidget input.newslettersubmit,
									.wd-section-title h2::after
									  {
													background :		".wd_get_option('primary_color','#B9906F').";
											}";
    $wd_custom_css .= ".sidebar #s:active,
                       .sidebar #s:focus,
	                     .style-2 .creative.top-bar-section {
										      border-color :    ".wd_get_option('primary_color','#B9906F').";
										   }
										   .blog-info .arrow {
                          border-left-color:".wd_get_option('primary_color','#B9906F')." ;
											 }
											 .ui-accordion-header-active, .ui-tabs-active,
											 .box-icon,
											 .team-membre-social-icons ul {
											 	  border-top-color:".wd_get_option('primary_color','#B9906F')."
											 }";

		$wd_custom_css .= "
					.primary-color_color, a, a:focus, a.active, a:active, a:hover,
					 .box-container:hover .box-title, .blog-posts i,
					 .woocommerce .woocommerce-breadcrumb,
					 .woocommerce-page .woocommerce-breadcrumb,.textwidget i:hover,
					 .collapsed-title h2:nth-child(2),
					 .wd-services .featured-box-text h4,
					 .wd-presentation h4,
					 .wd-presentation .readmore,
					 .wd-section-title > .subtitle,
					 .careers .vacancyList li .job,
					 .creative-layout .top-bar-section ul.menu > li:hover:not(.has-form) > a
					 {
							color : 	".wd_get_option('primary_color','#B9906F')." ;
					 }
					 .boxes.small.layout-3 .box-icon i {
					 	 color: rgba(255,255,255,1);
					 }
			";

		$wd_custom_css .= "
		@media screen and (max-width: 900px){
			.creative-layout .top-bar-container, .creative-layout .top-bar
			{
			background:" . wd_get_option('navigation_bg_color_sticky','#F17A20') . ";
			}
		}";
    $logo_position = wd_get_option('wd_logo_position', 'logo_left');
    if ($logo_position == 'logo_top' || 'logo_top_center') {
    	if (wd_get_option('wd_menu_bg_in_grid','off') != "off") {
    		$wd_custom_css .= ".creative-layout .top-bar-container .creative.top-bar-section,.creative.top-bar-section {background-color:" . wd_get_option('navigation_bg_color','#F17A20') . ";}";
		    $wd_custom_css .= ".creative-layout .top-bar-container.fixed .creative.top-bar-section {background-color:" . wd_get_option('navigation_bg_color_sticky','#F17A20') . ";}";
    	}else {
    		$wd_custom_css .= ".creative-layout .top-bar-container,.creative.top-bar-section {background-color:" . wd_get_option('navigation_bg_color','#F17A20') . ";}";
		    $wd_custom_css .= ".creative-layout .top-bar-container.fixed {background-color:" . wd_get_option('navigation_bg_color_sticky','#F17A20') . ";}";
    	}
    }else {
    	if (wd_get_option('wd_menu_bg_in_grid','off') != "off") {
    		$wd_custom_css .= ".creative-layout .top-bar-container .top-bar.top_bar_logo_left {background-color:" . wd_get_option('navigation_bg_color','#F17A20') . ";}";
		    $wd_custom_css .= ".creative-layout .top-bar-container.fixed .top-bar.top_bar_logo_left {background-color:" . wd_get_option('navigation_bg_color_sticky','#F17A20') . ";}";
    	}else {
    		$wd_custom_css .= ".creative-layout .top-bar-container {background-color:" . wd_get_option('navigation_bg_color','#F17A20') . ";}";
		    $wd_custom_css .= ".creative-layout .top-bar-container.fixed {background-color:" . wd_get_option('navigation_bg_color_sticky','#F17A20') . ";}";
    	}
    }
    if ($logo_position == 'logo_center') {
    	
		 if (wd_get_option('wd_menu_bg_in_grid','off') != "off") {
    		$wd_custom_css .= ".creative-layout .top-bar-container.sticky .creative.top-bar-section {background-color:transparent;}";
		    $wd_custom_css .= ".creative-layout .top-bar-container.sticky .creative.top-bar-section {background-color:transparent;}";

		    $wd_custom_css .= ".creative-layout .top-bar-container.sticky .top-bar.top_bar_logo_center {background-color:" . wd_get_option('navigation_bg_color','#F17A20') . ";}";
			  $wd_custom_css .= ".creative-layout .top-bar-container.sticky.fixed .top-bar.top_bar_logo_center {background-color:" . wd_get_option('navigation_bg_color_sticky','#F17A20') . ";}";
    	}else {
    		$wd_custom_css .= ".creative-layout .top-bar-container.sticky {background-color:" . wd_get_option('navigation_bg_color','#F17A20') . ";}";
		    $wd_custom_css .= ".creative-layout .top-bar-container.sticky.fixed {background-color:" . wd_get_option('navigation_bg_color_sticky','#F17A20') . ";}";
    	} 
    }
		
    if ($logo_position == 'logo_right') {
    	
		 if (wd_get_option('wd_menu_bg_in_grid','off') != "off") {
    		$wd_custom_css .= ".creative-layout .top-bar-container.sticky .creative.top-bar-section {background-color:transparent;}";
		    $wd_custom_css .= ".creative-layout .top-bar-container.sticky .creative.top-bar-section {background-color:transparent;}";

		    $wd_custom_css .= ".creative-layout .top-bar-container.sticky .top-bar.top_bar_logo_right {background-color:" . wd_get_option('navigation_bg_color','#a04500') . ";}";
			  $wd_custom_css .= ".creative-layout .top-bar-container.sticky.fixed .top-bar.top_bar_logo_right {background-color:" . wd_get_option('navigation_bg_color_sticky','#a04500') . ";}";
    	}else {
    		$wd_custom_css .= ".creative-layout .top-bar-container.sticky {background-color:" . wd_get_option('navigation_bg_color','#a04500') . ";}";
		    $wd_custom_css .= ".creative-layout .top-bar-container.sticky.fixed {background-color:" . wd_get_option('navigation_bg_color_sticky','#a04500') . ";}";
    	} 
    }

    if ($logo_position == 'logo_left') {
    	
		 if (wd_get_option('wd_menu_bg_in_grid','off') != "off") {
    		$wd_custom_css .= ".creative-layout .top-bar-container.sticky .creative.top-bar-section {background-color:transparent;}";
		    $wd_custom_css .= ".creative-layout .top-bar-container.sticky .creative.top-bar-section {background-color:transparent;}";

		    $wd_custom_css .= ".creative-layout .top-bar-container.sticky .top-bar.top_bar_logo_left {background-color:" . wd_get_option('navigation_bg_color','#F17A20') . ";}";
			  $wd_custom_css .= ".creative-layout .top-bar-container.sticky.fixed .top-bar.top_bar_logo_left {background-color:" . wd_get_option('navigation_bg_color_sticky','#F17A20') . ";}";
    	}else {
    		$wd_custom_css .= ".creative-layout .top-bar-container.sticky {background-color:" . wd_get_option('navigation_bg_color','#F17A20') . ";}";
		    $wd_custom_css .= ".creative-layout .top-bar-container.sticky.fixed {background-color:" . wd_get_option('navigation_bg_color_sticky','#F17A20') . ";}";
    	} 
    }
    $wd_custom_css .= ".header-top, .social-icons li i {color:" . wd_get_option('top_bar_text_color','#F17A20') . ";}";
    $wd_custom_css .= ".social-icons li i {border-color:" . wd_get_option('top_bar_text_color','#F17A20') . ";}";
    $wd_custom_css .= ".creative-layout .top-bar-container {background-color:" . wd_get_option('top_bar_bg_color','#F17A20') . ";}";
    

    $wd_custom_css .= "@media only screen and (min-width: 900px){
	    .creative-layout .top-bar {
	      border-color :    ".wd_get_option('navigation_border_top_color','rgba(255,255,255,0)').";
	    }
    }";

    $wd_custom_css .= ".creative-layout .top-bar-section ul li > a {
      color :    ".wd_get_option('navigation_text_color','#FFF').";
    }";


		$wd_custom_css .= ".blog-posts h2 a, .breadcrumbs > *, .breadcrumbs, .comment-reply-link:hover, .tab-icon
		{
			color : ".wd_get_option('secondary_color','#F17A20')."
		}
		";
		$wd_custom_css .= ".pricing-table.featured
		{
			box-shadow : ".wd_get_option('secondary_color', '#F17A20')." 0px 0px 1px 0px
		}
		";
		$wd_custom_css .= "button, .button, button:hover, .comment-reply-link, button:focus, .button:hover, .button:focus, .products .product:hover .button, .woocommerce-product-search > input[type='submit']
		{
			background-color : ".wd_get_option('secondary_color' ,'#F17A20')."
		}
		.our-packages .pricing-table h4.title {text-transform:uppercase !important;}";						
		$wd_custom_css .= wd_get_option('wd_theme_custom_css', '');

				//*********/inline style***************/
				if (wd_get_option('wd_general_style','dark') == "white") {
					wp_enqueue_style('white-style',       get_template_directory_uri() . "/css/white.css");
					wp_add_inline_style( 'white-styl', $wd_custom_css );
				} else {
					wp_enqueue_style('dark-style',       get_template_directory_uri() . "/css/dark.css");
					wp_add_inline_style( 'dark-style', $wd_custom_css );
				}
}

add_action( 'wp_enqueue_scripts', 'wd_load_js_css_file' );


/**
 * ---------------menu--------------------------------
 */ $wd_cont = 1;
class wd_top_bar_walker extends Walker_Nav_Menu {
	static protected $menu_bg_test;
	function start_el(&$output, $item, $depth = 0, $args = Array(), $id = 0) {
	  
	  if(is_object($args)){
			global $wp_query;
			global $wd_cont;
		  $wd_class = '';
			//$icon=$item->classes[1];
			self::$menu_bg_test = $item->mega_menu_bg_image;
			$wd_icon = $item->mega_menu_icon ;
		if($item->mega_menu == 1) {
			$wd_class= 'wd_mega-menu';
		}
			$indent = ($depth) ? str_repeat("\t", $depth) : '';
			$class_names = $value = '';

			$classes = empty($item -> classes) ? array() : (array)$item -> classes;
			$classes[] = ($item -> current) ? 'active' : '';
			$classes[] = ($args -> has_children) ? 'color-1 has-dropdown not-click' : '';
			$args -> link_before = (in_array('section', $classes)) ? '<label>' : '';
			$args -> link_after = (in_array('section', $classes)) ? '</label>' : '';
			$output .= (in_array('section', $classes));
			$class_names = ($args -> has_children) ? 'has-dropdown not-click '.$wd_class : '';
			$parent = $item -> menu_item_parent;
			if ($parent == 0) {
			  $wd_cont++;
			}
	    
			$class_names .= ' color-' . $wd_cont;
			$class_names = strlen(trim($class_names)) > 0 ? ' class="' . esc_attr($class_names) . '"' : '';
			$output .= $indent . '
			<li id="menu-item-' . $item -> ID . '"' . $value . $class_names . '>';

			$attributes = !empty($item -> attr_title) ? ' title="' . esc_attr($item -> attr_title) . '"' : '';
			$attributes .= !empty($item -> target) ? ' target="' . esc_attr($item -> target) . '"' : '';
			$attributes .= !empty($item -> xfn) ? ' rel="' . esc_attr($item -> xfn) . '"' : '';
			$attributes .= !empty($item -> url) ? ' href="' . esc_attr($item -> url) . '"' : '';

			$attributes .= ' class="has-icon" ';

			$item_output = $args -> before;
			$item_output .= (!in_array('section', $classes)) ? '
			<a' . $attributes . '>' : '';
			if(($wd_icon != '') and ($wd_icon != '---- None ----'))  {
				
			$item_output .= '<i class="'.$wd_icon.' fa"></i> ';
			}
			/*$item_output .= '<i class="'.$icon.' fa"></i> ';*/
			$item_output .= $args -> link_before . apply_filters('the_title', $item -> title, $item -> ID);
			$item_output .= $args -> link_after;
			$item_output .= (!in_array('section', $classes)) ? '</a>' : '';
			$item_output .= $args -> after;

			$output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
		}
	}

	function end_el(&$output, $item, $depth = 0, $args = Array()) {
		$output .= '
</li>' . "\n";
	}

	function start_lvl(&$output, $depth = 0, $args = Array()) {
		$indent = str_repeat("\t", $depth);
		$output .= "\n" . $indent . '
		<ul class="sub-menu dropdown " style = "background : transparent url('.self::$menu_bg_test.') no-repeat scroll right bottom;">
			' . "\n";
	}

	function end_lvl(&$output, $depth = 0, $args = Array()) {
		$indent = str_repeat("\t", $depth);
		$output .= $indent . '
</ul>' . "\n";
	}

	function display_element($element, &$children_elements, $max_depth, $depth = 0, $args, &$output) {
		$id_field = $this -> db_fields['id'];
		if (is_object($args[0])) {
			$args[0] -> has_children = !empty($children_elements[$element -> $id_field]);
		}
		return parent::display_element($element, $children_elements, $max_depth, $depth, $args, $output);
	}

}

/**
 * Sets up the content width value based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) )
  $content_width = 625;

/*---------wooocomerce---------*/
//Reposition WooCommerce breadcrumb 
function wd_woocommerce_remove_breadcrumb(){
remove_action( 
    'woocommerce_before_main_content', 'wd_woocommerce_breadcrumb', 20);
}
add_action(
    'woocommerce_before_main_content', 'woocommerce_remove_breadcrumb'
);

function wd_woocommerce_custom_breadcrumb(){
    woocommerce_breadcrumb();
}

add_action( 'woo_custom_breadcrumb', 'wd_woocommerce_custom_breadcrumb' );







// Ensure cart contents update when products are added to the cart via AJAX (place the following in functions.php)
add_filter( 'woocommerce_add_to_cart_fragments', 'wd_woocommerce_header_add_to_cart_fragment' );

function wd_woocommerce_header_add_to_cart_fragment( $fragments ) {
	ob_start();
	?>
	<a class="cart-contents" href="<?php echo WC()->cart->get_cart_url(); ?>" title="<?php load_theme_textdomain( 'View your shopping cart' ); ?>"><?php echo sprintf (_n( '%d item', '%d items', WC()->cart->cart_contents_count,'bodyguard' ), WC()->cart->cart_contents_count ); ?> - <?php echo WC()->cart->get_cart_total(); ?></a>
	<?php
	
	$fragments['a.cart-contents'] = ob_get_clean();
	
	return $fragments;
}
/*remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);
add_action('woocommerce_before_main_content', create_function('', 'echo "<div id=\"content-body\">";'), 10);
add_action('woocommerce_after_main_content', create_function('', 'echo "</div>";'), 10);*/

/*--------------------meta box multi image uploade-------------------*/
// add meta box
function wd_multiple_image () {
	add_meta_box('wd_meta_box_multiple_image', 'Multiple Image', 'wd_upload_image','post');
}
add_action( 'add_meta_boxes', 'wd_multiple_image' );
function wd_upload_image() {
	global $post;?>
	
		<div class="add_portfolio_images">
		<h3>Portfolio Images (multiple upload)</h3>
		<div class="add_portfolio_images_inner">
		
		<button class="wd-gallery-upload button button-primary button-large">Browse</button>
			<ul class="wd-gallery-images-holder clearfix">
					<?php
					$portfolio_image_gallery_val = get_post_meta( $post->ID, 'wd_portfolio-image-gallery', true );
					if($portfolio_image_gallery_val!='' ) $portfolio_image_gallery_array=explode(',',$portfolio_image_gallery_val);
									
					if(isset($portfolio_image_gallery_array) && count($portfolio_image_gallery_array)!=0):
					
						foreach($portfolio_image_gallery_array as $gimg_id):
					
							$gimage_wp = wp_get_attachment_image_src($gimg_id,'thumbnail', true);
							echo '<li class="wd-gallery-image-holder"><img src="'.$gimage_wp[0].'"/></li>';
						
						endforeach;
						
					endif;
					?>
			</ul>
		<input type="hidden" value="<?php echo esc_attr( $portfolio_image_gallery_val ); ?>" id="wd_portfolio-image-gallery" name="wd_portfolio-image-gallery">
		</div>
		</div>
	<?php
}
//save meta box
if(isset($_POST['wd_portfolio-image-gallery'])){
	function wd_save_meta_box_image($post_id) {
		update_post_meta($post_id, 'wd_portfolio-image-gallery', $_POST['wd_portfolio-image-gallery']);
	}
add_action('save_post', 'wd_save_meta_box_image' );
}
//ajax 
if (!function_exists('wd_gallery_upload_get_images')){
function wd_gallery_upload_get_images(){
	$ids=$_POST['ids'];
	$ids=explode(",",$ids);
	foreach($ids as $id):
		$image = wp_get_attachment_image_src($id,'thumbnail', true);
		echo '<li class="wd-gallery-image-holder"><img src="'.$image[0].'"/></li>';
	endforeach;
	exit;  
}
}
add_action( 'wp_ajax_wd_gallery_upload_get_images', 'wd_gallery_upload_get_images');



// retrieves the attachment ID from the file URL
function wd_get_image_id($image_url) {
    global $wpdb;
    $image_url   = esc_sql( $image_url );
    $attachment = $wpdb->get_col($wpdb->prepare("SELECT ID FROM $wpdb->posts WHERE guid='%s';", $image_url ));
    if (isset($attachment[0])) {
    	return $attachment[0];
    }
}





// initialize options
if (!function_exists('wd_initialize_options')) {
	function wd_initialize_options() {


		if( !get_option( "wd_options_array" ) ) {
			$options_array = get_option("wd_options_array");
			$options_array = array(
					"wd_show_logo" => "",
					"wd_show_top_social_bare" => "",
					"wd_box_wrapper" => "",
					"wd_show_title" => "",
					"wd_menu_in_grid" => "",
					"wd_menu_bg_in_grid" => "",
					"wd_menu_sticky" => "",
					"wd_menu_overlay" => "",
					"wd_mini_card_icon" => "",
					"wd_search_icon" => "",
					"wd_logo" => "",
					"wd_title_bg_image" => "",
					"wd_footer_bg_image" => "",
					"wd_home_page" => "",
					"wd_404_page" => "",
					"wd_favicon" => "",
					"wd_theme_custom_css" => "",
					"wrapper_bg_color" => "",
					"primary_color" => "",
					"secondary_color" => "",
					"wd_logo_position" => "",
					"navigation_bg_color" => "",
					"navigation_bg_color_sticky" => "",
					"navigation_border_top_color" => "",
					"navigation_text_color" => "",
					"top_bar_bg_color" => "",
					"top_bar_text_color" => "",
					"footer_bg_color" => "",
					"footer_text_color" => "",
					"wd_footer_columns" => "",
					"wd_copyright" => "",
					"copyright_text_color" => "",
					"copyright_bg_color" => "",
					"twitter" => "",
					"facebook" => "",
					"flickr" => "",
					"vimeo" => "",
					"phone" => "",
					"adress" => "",
					"wd_body_font_familly" => "",
					"wd_font-weight-style" => "",
					"wd_main-text-font-subsets" => "",
					"wd_text-transform" => "",
					"wd_body-font-size" => "",
					"wd_head_font_familly" => "",
					"wd_body_font_weight" => "",
					"wd_heading-font-weight-style" => "",
					"wd_heading-text-font-subsets" => "",
					"wd_heading-transform" => "",
					"wd_navigation_font_familly" => "",
					"wd_navigation-font-weight-style" => "",
					"wd_navigation-text-font-subsets" => "",
					"wd_navigation-transform" => "",
					"wd_navigation-font-size" => "",
					"wd_menu_style" => "",
					"page_for_posts" => "",
					"wd_general_style" => "",
					"wd_theme_custom_js" => ""
					);
			update_option("wd_options_array",$options_array);
		}
	}
}


// get options value
if (!function_exists('wd_get_option')) {
	function wd_get_option($wd_option_key , $default = null) {
		wd_initialize_options();
		$options_array = get_option("wd_options_array");
		$wd_meta_value = "";
		if ( array_key_exists( $wd_option_key, $options_array ) ) {
			if ( isset( $options_array[ $wd_option_key ] ) && ! empty( $options_array[ $wd_option_key ] ) ) {
				$wd_meta_value = esc_attr( $options_array[ $wd_option_key ] );
			}

			if ( $wd_meta_value == "" && isset($default) ) {
				$wd_meta_value = $default;
			}
		}
		
		return $wd_meta_value;
	}
}

// get options value
if (!function_exists('wd_save_option')) {
	function wd_save_option($wd_option_key, $wd_option_value) {
		$options_array = get_option("wd_options_array");
		$options_array[$wd_option_key] = $wd_option_value;
		update_option("wd_options_array",$options_array);
	}
}


// redirect to theme settings page after activation
global $pagenow;
 if ( is_admin() && isset( $_GET['activated'] ) && $pagenow == 'themes.php' )
 {
      wp_redirect( admin_url( 'admin.php?page=bodyguard-theme-option#tabs-6' ) );
      exit;
 }



?>