<?php 
function wd_flip_image($atts) {
  extract( shortcode_atts( array(
    'image' => '',
    'text' =>  '',
    'title'=> '',
    'css_animation' => 'no',
  ), $atts ) );
ob_start();

$img_size="";
$border_color="";
$style ="";
$thumb_size="";
$post_thumbnail="";
$animation_classes =  "";
$data_animated = "";
if(($css_animation != 'no')){
      $animation_classes =  " animated ";
      $data_animated = "data-animated=$css_animation";
}
?>
  
                        
<div class="<?php echo esc_attr($animation_classes); ?>"  <?php echo esc_attr($data_animated); ?>>
  
</div>
      <?php 
      $img_id = preg_replace( '/[^\d]/', '', $image );
      $img = wpb_getImageBySize( array( 'attach_id' => $img_id, 'full_size' => $img_size,'thumb_size' => 'thumbnail', 'class' => $style . $border_color ) );
       ?>
      <?php
      $img_path=$img['p_img_large'][0];
       ?>

    <div class="scene">
      <div class="flip">
        <div class="avant"><img src="<?php echo $img_path  ?>"/></div>
        <div class="arriere">
            <h5><?php echo $title ?>
            </h5>
            <p><?php echo $text ?></p>
        </div>
      </div>
    </div>


<?php return ob_get_clean();
}
add_shortcode( 'wd_flip_image', 'wd_flip_image' );
?>