<?php 
/*-------------- portfolio custom posttyp -----------------------*/
 if( ! function_exists('webdevia_portfolio_posttype')): 
  function webdevia_portfolio_posttype() {
    register_post_type( 'portfolio',
      array(
        'labels' => array(
          'name' => __( 'Portfolio', 'webdevia' ),
          'singular_name' => __( 'portfolio', 'webdevia' ),
          'add_new' => __( 'Add New Portfolio Item', 'webdevia' ),
          'add_new_item' => __( 'Add New Portfolio Item', 'webdevia' ),
          'edit_item' => __( 'Edit portfolio', 'webdevia' ),
          'new_item' => __( 'Add New Portfolio Item', 'webdevia' ),
          'view_item' => __( 'View Portfolio Item', 'webdevia' ),
          'search_items' => __( 'Search Portfolio Item', 'webdevia' ),
          'not_found' => __( 'No Portfolio Item found', 'webdevia' ),
          'not_found_in_trash' => __( 'No Portfolio Item found in trash', 'webdevia' )
        ),
        'public' => true,
        'menu_icon' => 'dashicons-portfolio',
        'supports' => array( 'title', 'thumbnail', 'comments','editor'),
        'capability_type' => 'post',
        'rewrite' => array("slug" => "portfolio"), // Permalinks format
        'menu_position' => 5
      )
    );
    register_taxonomy( 'projet', 'portfolio', array( 'hierarchical' => true,
                               'label' => 'categories', 
                               'query_var' => true, 
                               'rewrite' => true ) );
  }
  add_action( 'init', 'webdevia_portfolio_posttype' );
endif;


//----------------------- Custom type Team Member -----------------
if( ! function_exists('webdevia_teammember_posttype')): 
  function webdevia_teammember_posttype() {
    register_post_type( 'team-member',
      array(
        'labels' => array(
          'name' => __( 'Team Members', 'webdevia' ),
          'singular_name' => __( 'team member', 'webdevia' ),
          'add_new' => __( 'Add New Team Member', 'webdevia' ),
          'add_new_item' => __( 'Add New Team Member', 'webdevia' ),
          'edit_item' => __( 'Edit Team Member', 'webdevia' ),
          'new_item' => __( 'Add New Team Member', 'webdevia' ),
          'view_item' => __( 'View Team Member', 'webdevia' ),
          'search_items' => __( 'Search Team Member', 'webdevia' ),
          'not_found' => __( 'No Team Member found', 'webdevia' ),
          'not_found_in_trash' => __( 'No Team Member found in trash', 'webdevia' )
        ),
        'public' => true,
        'menu_icon' => 'dashicons-businessman',
        'supports' => array( 'title'),
        'capability_type' => 'post',
        'rewrite' => array("slug" => "team-member"), // Permalinks format
        'menu_position' => 5
      )
    );
  }
  add_action( 'init', 'webdevia_teammember_posttype' );
endif;
//----------------------- Custom type Testimonials -----------------
if( ! function_exists('webdevia_testimonials_posttype')):
  function webdevia_testimonials_posttype() {
    register_post_type( 'testimonials',
      array(
        'labels' => array(
          'name' => __( 'Testimonials', 'webdevia' ),
          'singular_name' => __( 'testimonial', 'webdevia' ),
          'add_new' => __( 'Add New Testimonial', 'webdevia' ),
          'add_new_item' => __( 'Add New Testimonial', 'webdevia' ),
          'edit_item' => __( 'Edit Testimonial', 'webdevia' ),
          'new_item' => __( 'Add New Testimonial', 'webdevia' ),
          'view_item' => __( 'View Testimonial', 'webdevia' ),
          'search_items' => __( 'Search Testimonial', 'webdevia' ),
          'not_found' => __( 'No Testimonials found', 'webdevia' ),
          'not_found_in_trash' => __( 'No Testimonials found in trash', 'webdevia' )
        ),
        'public' => true,
        'menu_icon' 					=> 			'dashicons-format-quote',
        'supports' => array( 'title', 'excerpt'),
        'capability_type' => 'post',
        'rewrite' => array("slug" => "testimonials"), // Permalinks format
        'menu_position' => 5
      )
    );
  }
  add_action( 'init', 'webdevia_testimonials_posttype' );
endif;

/*
 * --------ACF------------------
 */
/*if(function_exists("register_field_group"))
{
	register_field_group(array (
		'id' => 'acf_title-area-settings',
		'title' => 'Title Area Settings',
		'fields' => array (
			array (
				'key' => 'field_53bf1e82c7ad3',
				'label' => 'Show title area',
				'name' => 'wd_page_show_title_area',
				'type' => 'true_false',
				'message' => 'Show title area',
				'default_value' => 1,
			),
			array (
				'key' => 'field_53bf1f09c7ad5',
				'label' => 'Title area style',
				'name' => 'wd_page_title_area_style',
				'type' => 'radio',
				'conditional_logic' => array (
					'status' => 1,
					'rules' => array (
						array (
							'field' => 'field_53bf1e82c7ad3',
							'operator' => '==',
							'value' => '1',
						),
					),
					'allorany' => 'all',
				),
				'choices' => array (
					'standard' => 'Standard Style',
					'advanced' => 'Advanced Style',
				),
				'other_choice' => 0,
				'save_other_choice' => 0,
				'default_value' => 'standard',
				'layout' => 'vertical',
			),
			array (
				'key' => 'field_53bf2040f49c6',
				'label' => 'Title area background color',
				'name' => 'wd_page_title_area_bg_color',
				'type' => 'color_picker',
				'conditional_logic' => array (
					'status' => 1,
					'rules' => array (
						array (
							'field' => 'field_53bf1f09c7ad5',
							'operator' => '==',
							'value' => 'advanced',
						),
						array (
							'field' => 'field_53bf1e82c7ad3',
							'operator' => '==',
							'value' => '1',
						),
					),
					'allorany' => 'all',
				),
				'default_value' => '#ffffff',
			),
			array (
				'key' => 'field_53bf1feaf49c5',
				'label' => 'Title area background image',
				'name' => 'wd_page_title_area_bg_img',
				'type' => 'image',
				'conditional_logic' => array (
					'status' => 1,
					'rules' => array (
						array (
							'field' => 'field_53bf1e82c7ad3',
							'operator' => '==',
							'value' => '1',
						),
						array (
							'field' => 'field_53bf1f09c7ad5',
							'operator' => '==',
							'value' => 'advanced',
						),
					),
					'allorany' => 'all',
				),
				'save_format' => 'object',
				'preview_size' => 'thumbnail',
				'library' => 'all',
			),
			array (
				'key' => 'field_53bf1edbc7ad4',
				'label' => 'Show title',
				'name' => 'wd_page_show_title',
				'type' => 'true_false',
				'conditional_logic' => array (
					'status' => 1,
					'rules' => array (
						array (
							'field' => 'field_53bf1e82c7ad3',
							'operator' => '==',
							'value' => '1',
						),
					),
					'allorany' => 'all',
				),
				'message' => 'Show title',
				'default_value' => 1,
			),
			array (
				'key' => 'field_53bf2092f49c7',
				'label' => 'Title position',
				'name' => 'wd_page_title_position',
				'type' => 'radio',
				'conditional_logic' => array (
					'status' => 1,
					'rules' => array (
						array (
							'field' => 'field_53bf1edbc7ad4',
							'operator' => '==',
							'value' => '1',
						),
						array (
							'field' => 'field_53bf1e82c7ad3',
							'operator' => '==',
							'value' => '1',
						),
					),
					'allorany' => 'all',
				),
				'choices' => array (
					'left' => 'Left',
					'center' => 'Center',
					'right' => 'right',
				),
				'other_choice' => 0,
				'save_other_choice' => 0,
				'default_value' => 'left',
				'layout' => 'horizontal',
			),
			array (
				'key' => 'field_53bf20daf49c8',
				'label' => 'Title font size',
				'name' => 'wd_page_title_fontsize',
				'type' => 'radio',
				'conditional_logic' => array (
					'status' => 1,
					'rules' => array (
						array (
							'field' => 'field_53bf1edbc7ad4',
							'operator' => '==',
							'value' => '1',
						),
						array (
							'field' => 'field_53bf1e82c7ad3',
							'operator' => '==',
							'value' => '1',
						),
					),
					'allorany' => 'all',
				),
				'choices' => array (
					'small' => 'Small',
					'medium' => 'Medium',
					'big' => 'Big',
				),
				'other_choice' => 0,
				'save_other_choice' => 0,
				'default_value' => 'medium',
				'layout' => 'vertical',
			),
			array (
				'key' => 'field_53bf264526b5c',
				'label' => 'Title color',
				'name' => 'wd_page_title_color',
				'type' => 'color_picker',
				'conditional_logic' => array (
					'status' => 1,
					'rules' => array (
						array (
							'field' => 'field_53bf1edbc7ad4',
							'operator' => '==',
							'value' => '1',
						),
						array (
							'field' => 'field_53bf1e82c7ad3',
							'operator' => '==',
							'value' => '1',
						),
					),
					'allorany' => 'all',
				),
				'default_value' => '#000000',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'page',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'default',
			'hide_on_screen' => array (
				0 => 'featured_image',
			),
		),
		'menu_order' => -3,
	));
}*/
/*
 * -------testimonail---------
 */
/* if(function_exists("register_field_group"))
{
	register_field_group(array (
		'id' => 'acf_testimonial',
		'title' => 'testimonial',
		'fields' => array (
			array (
				'key' => 'field_54e6107b6d158',
				'label' => 'Image',
				'name' => 'testimonail_image',
				'type' => 'image',
				'save_format' => 'object',
				'preview_size' => 'thumbnail',
				'library' => 'all',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'testimonials',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'no_box',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));
}*/
 
 //------------------------------Team------------------------
 /*if(function_exists("register_field_group"))
{
  register_field_group(array (
    'id' => 'acf_information',
    'title' => 'Information',
    'fields' => array (
      array (
        'key' => 'field_5319df9acce0e',
        'label' => 'Job Title',
        'name' => 'job_title',
        'type' => 'text',
        'default_value' => '',
        'placeholder' => '',
        'prepend' => '',
        'append' => '',
        'formatting' => 'none',
        'maxlength' => '',
      ),
      array (
        'key' => 'field_5319e2214b6ff',
        'label' => 'Picture',
        'name' => 'pciture',
        'type' => 'image',
        'save_format' => 'object',
        'preview_size' => 'thumbnail',
        'library' => 'all',
      ),
      array (
        'key' => 'field_5319e260fe394',
        'label' => 'Description',
        'name' => 'description',
        'type' => 'textarea',
        'default_value' => '',
        'placeholder' => '',
        'maxlength' => '',
        'formatting' => 'br',
      ),
      array (
        'key' => 'field_54524de108c08',
        'label' => 'Twitter',
        'name' => 'wd_twitter',
        'type' => 'text',
        'default_value' => 'https://',
        'placeholder' => '',
        'prepend' => '',
        'append' => '',
        'formatting' => 'html',
        'maxlength' => '',
      ),
      array (
        'key' => 'field_54524d8c08c06',
        'label' => 'Facebook',
        'name' => 'wd_facebook',
        'type' => 'text',
        'default_value' => 'https://',
        'placeholder' => '',
        'prepend' => '',
        'append' => '',
        'formatting' => 'html',
        'maxlength' => '',
      ),
      array (
        'key' => 'field_54524ddf08c07',
        'label' => 'LinkedIn',
        'name' => 'wd_linkedin',
        'type' => 'text',
        'default_value' => 'https://',
        'placeholder' => '',
        'prepend' => '',
        'append' => '',
        'formatting' => 'html',
        'maxlength' => '',
      ),
    ),
    'location' => array (
      array (
        array (
          'param' => 'post_type',
          'operator' => '==',
          'value' => 'team-member',
          'order_no' => 0,
          'group_no' => 0,
        ),
      ),
    ),
    'options' => array (
      'position' => 'acf_after_title',
      'layout' => 'default',
      'hide_on_screen' => array (
      ),
    ),
    'menu_order' => 0,
  ));
}*/

 //----------------------------------video Upload--------------------
 /*if(function_exists("register_field_group"))
{
	register_field_group(array (
		'id' => 'acf_video-upload',
		'title' => 'video upload',
		'fields' => array (
			array (
				'key' => 'field_5481f21922d20',
				'label' => 'Video type',
				'name' => 'video_type',
				'type' => 'select',
				'choices' => array (
					'' => '',
					'youtube' => 'Youtube',
					'vimeo' => 'Vimeo',
					'self_hosted' => 'Self Hosted',
				),
				'default_value' => ':',
				'allow_null' => 0,
				'multiple' => 0,
			),
			array (
				'key' => 'field_5481f2d722d21',
				'label' => 'youtube link',
				'name' => 'wd_youtube_link',
				'type' => 'text',
				'conditional_logic' => array (
					'status' => 1,
					'rules' => array (
						array (
							'field' => 'field_5481f21922d20',
							'operator' => '==',
							'value' => 'youtube',
						),
					),
					'allorany' => 'all',
				),
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_5481f3b922d22',
				'label' => 'vimeo',
				'name' => 'wd_vimeo_id',
				'type' => 'number',
				'conditional_logic' => array (
					'status' => 1,
					'rules' => array (
						array (
							'field' => 'field_5481f21922d20',
							'operator' => '==',
							'value' => 'vimeo',
						),
					),
					'allorany' => 'all',
				),
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'min' => '',
				'max' => '',
				'step' => '',
			),
			array (
				'key' => 'field_5481f40722d23',
				'label' => 'Video webm',
				'name' => 'wd_video_webm',
				'type' => 'text',
				'conditional_logic' => array (
					'status' => 1,
					'rules' => array (
						array (
							'field' => 'field_5481f21922d20',
							'operator' => '==',
							'value' => 'self_hosted',
						),
					),
					'allorany' => 'all',
				),
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_5481f45f22d24',
				'label' => 'Video mp4',
				'name' => 'wd_video_mp4',
				'type' => 'text',
				'conditional_logic' => array (
					'status' => 1,
					'rules' => array (
						array (
							'field' => 'field_5481f21922d20',
							'operator' => '==',
							'value' => 'self_hosted',
						),
					),
					'allorany' => 'all',
				),
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_5481f49022d25',
				'label' => 'Video ogv',
				'name' => 'wd_video_ogv',
				'type' => 'text',
				'conditional_logic' => array (
					'status' => 1,
					'rules' => array (
						array (
							'field' => 'field_5481f21922d20',
							'operator' => '==',
							'value' => 'self_hosted',
						),
					),
					'allorany' => 'all',
				),
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'post',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'default',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));
}*/