<?php
if(!function_exists('wd_featured_box')){
  function wd_featured_box($atts) {

    extract( shortcode_atts( array(
	    'background_color' => "#263457",
      'title' => 'Block title',
      'text'  => 'Some text should be hrre...',
      'icon' => '',
      'layout' => '1',
      'extra_classes' => '',
      'url' => '',
      'image_checkbox' => '',
      'image' => '',
      'css_animation' => 'no',
    ), $atts ) );
    

    $img_size="feature-box";
    $thumb_size="thumbnail";
    $post_thumbnail="";


    ob_start();

    $animation_classes =  "";
    $data_animated = "";
	  if(($css_animation != 'no')){
		  $animation_classes =  " animated ";
		  $data_animated = "data-animated=$css_animation";
	  }

	  ?>
		<div style="background-color: <?php echo esc_attr($background_color); ?>" class="<?php echo esc_attr($animation_classes); ?>" <?php echo esc_attr($data_animated); ?>>
		  <div class="featured-box-image">
			  <?php
				  $img_id = preg_replace( '/[^\d]/', '', $image );
			    print wp_get_attachment_image( $img_id, '650x350' );
			  ?>
		  </div>
		  <div class="featured-box-text"><h4><?php echo $title; ?></h4>
			  <div class="featured-box-desc"><p><?php echo $text; ?></p>
			  </div>
		  </div>
	  </div>
      
    <?php return ob_get_clean();
  }
  add_shortcode( 'wd_featured_box', 'wd_featured_box' );
}  
?>