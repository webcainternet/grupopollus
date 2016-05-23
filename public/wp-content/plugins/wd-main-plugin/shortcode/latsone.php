<?php
if(!function_exists('last_Code')){
  function last_Code($atts) {
    
    $atts = shortcode_atts(
              array(
               
                'title' => 'Block title',
                'text'  => 'Some text should be hrre...',
                'thumbnail' => ''
              ), 
              $atts);
              
    extract( shortcode_atts( array(
      'title' => 'Block title',
      'text'  => 'Some text should be hrre...',
      'thumbnail' => '',
      'css_animation' => 'no'
    ), $atts ) );
    
    $category = (is_array(unserialize($category))) ? array_values(unserialize($category)) : '';

    $animation_classes =  "";
    $data_animated = "";

    if(($css_animation != 'no')){
      $animation_classes =  " animated ";
      $data_animated = "data-animated=$css_animation";
    }

    ob_start(); ?>
    
    
    <?php if($style=='style1'){$class='small';}else{$class='text-center';} ?>
      <div class="boxes <?php echo esc_attr($class) . ' ' . esc_attr($animation_classes); ?>" <?php echo esc_attr($data_animated); ?>>
        <div class="box-container">
              <div class="box-icon">
               <i class="fa <?php echo $icon; ?>"></i>
             </div>
             <h3 class="box-title"><?php echo $title; ?></h3>
             <p class="box-body"> <?php echo $text; ?></p>
         </div>
      </div>
      
      
    <?php return ob_get_clean();
  }
  add_shortcode( 'wd_last', 'last_Code' );
}  
?>