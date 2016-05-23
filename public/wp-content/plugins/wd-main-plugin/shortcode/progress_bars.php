<?php
if(!function_exists('wd_progress_bars')){
  function wd_progress_bars($atts) {
              
    extract( shortcode_atts( array(
    'title' => '',
		'progress_title1'=>'',
    'progress_meter1'=>'',
		'progress_title2'=>'',
    'progress_meter2'=>'',
		'progress_title3'=>'',
    'progress_meter3'=>'',
		'progress_title4'=>'',
    'progress_meter4'=>'',
    'css_animation' => 'no'


    
    ), $atts ) );
    
		$animation_classes =  "";
    $data_animated = "";
    
    if(($css_animation != 'no')){
      $animation_classes =  " animated ";
      $data_animated = "data-animated=$css_animation";
}

    ob_start(); ?>
						<div class="block-content <?php echo esc_attr($animation_classes); ?>" <?php echo esc_attr($data_animated); ?>>
							<h3 class="progress_title">
								<?php echo $progress_title1 ?> 
							</h3>
							<div class="progress  round">
								<span style="width: <?php echo $progress_meter1 ?>%" class="meter orange"></span>
							</div>
							<h3 class="progress_title">
								<?php echo $progress_title2 ?> 
							</h3>
							<div class="progress  round">
								<span style="width: <?php echo $progress_meter2 ?>%" class="meter green"></span>
							</div>
							<h3 class="progress_title">
								<?php echo $progress_title3 ?> 
							</h3>
							<div class="progress  round">
								<span style="width: <?php echo $progress_meter3 ?>%" class="meter blue"></span>
							</div>
							<h3 class="progress_title">
								<?php echo $progress_title4 ?> 
							</h3>
							<div class="progress  round">
								<span style="width: <?php echo $progress_meter4 ?>%" class="meter pink"></span>
							</div>
						</div>
    <?php return ob_get_clean();
  }
  add_shortcode( 'wd_progress_bars', 'wd_progress_bars' );
}  
?>