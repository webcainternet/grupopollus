<?php
if(!function_exists('wd_count_up')){
  function wd_count_up($atts) {
              
    extract( shortcode_atts( array(
      'countto'  => '123',
      'icon' => 'fa-home',
      'time' => '1000',
      'style' => 'style1',
      'image_checkbox' => '',
      'image' => '',
      'css_animation' => 'no'
    ), $atts ) );
    
    $animation_classes =  "";
    $data_animated = "";
    
    if(($css_animation != 'no')){
      $animation_classes =  " animated ";
      $data_animated = "data-animated=$css_animation";
}

    $img_size="";
    $thumb_size="";
    $post_thumbnail="";

    ob_start(); ?>
    
<div class="<?php echo $style . ' ' . esc_attr($animation_classes); ?> countto clearfix" <?php echo esc_attr($data_animated); ?>>
    <div class="icon">
    <?php if ($image_checkbox =='yes'){ ?>
      <?php 
      $img_id = preg_replace( '/[^\d]/', '', $image );
      $img = wpb_getImageBySize( array( 'attach_id' => $img_id, 'full_size' => $img_size,'thumb_size' => 'thumbnail') );
       ?>
      <?php
      $img_path=$img['p_img_large'][0];
       ?>
       <img src="<?php echo $img_path  ?>" alt="count up icon"  title="count up icon" />
    <?php }else { ?>
        <i class="fa <?php echo $icon ?>"></i>
    <?php } ?>
    </div>
    <div class="counter" data-file="<?php echo $time ?>"><?php echo $countto ?></div>
    </div>

    <?php return ob_get_clean();
  }
  add_shortcode( 'wd_count_up', 'wd_count_up' );
}  
?>