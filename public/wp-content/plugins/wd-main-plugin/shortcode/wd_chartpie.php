<?php
if(!function_exists('wd_chart_pie')){
  function wd_chart_pie($atts) {
              
    extract( shortcode_atts( array(
      'title' => 'Title',
      'value' => '259',
      'style' => '1',
      'css_animation' => 'no'
    ), $atts ) );
    
    $animation_classes =  "";
    $data_animated = "";
    if(($css_animation != 'no')){
      $animation_classes =  " animated ";
      $data_animated = "data-animated=$css_animation";
}

    ob_start(); ?>
    
<div class="easyPieChart <?php echo esc_attr($animation_classes); ?>" <?php echo esc_attr($data_animated); ?>>
  <div class="circular-item-style-<?php echo $style ?>">
      <div data-color="#24b0ca" data-percent="<?php echo $value ?>" class="circular-pie-style-<?php echo $style ?> easyPieChart" style="width: 210px; height: 210px; line-height: 210px;">
          <span class="percent"></span>
          <canvas height="210" width="210"></canvas>
      </div>
      <div class="circ_counter_desc">
          <p class="lead"><?php echo $title ?></p>
      </div>
  </div>
</div>
    <?php return ob_get_clean();
  }
  add_shortcode( 'wd_chart_pie', 'wd_chart_pie' );
}  
?>