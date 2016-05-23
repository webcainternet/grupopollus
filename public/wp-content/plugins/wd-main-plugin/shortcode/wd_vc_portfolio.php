<?php 
function wd_vc_portfolio($atts) {
           
  extract( shortcode_atts( array(
    'itemperpage' => '10',
		'number'=>'4',
		'margin'=>'10',
    'category'=>'',
    'layout' =>'2',
    'columns' => '3',
    'css_animation' => 'no'
  ), $atts ) );



    $animation_classes =  "";
    $data_animated = "";
if(($css_animation != 'no')){
      $animation_classes =  " animated ";
      $data_animated = "data-animated=$css_animation";
}
  ob_start();
 if($layout=='2') {
 	 $style = 'carousel_portfolio'; 
 		}else {
 		$style = 'masque';
		/*$wd_large = wd_div_large($columns);
		$col='large-'.$wd_large.' columns ';*/
 		}
  ?>
  
  <ul class='<?php echo $style ?> small-block-grid-2 large-block-grid-<?php echo esc_attr($columns); ?>' data-numberitem="<?php echo esc_attr($number)  ?>" data-margin="<?php echo esc_attr($margin)  ?>" <?php echo esc_attr($data_animated); ?>>
  	<?php	$loop = new WP_Query( array( 'post_type' => 'portfolio', 'posts_per_page' => $itemperpage ,'cat' => $category) );
    while ( $loop->have_posts() ) : $loop->the_post(); ?>
    	<li class="wd-carousel-container <?php echo $animation_classes; ?>">
    		<?php the_post_thumbnail( '650x350' ) ?>
    		<div class="carousel-icon">
          <i class="fa fa-home"></i>
        </div>
        <div class="info">
          <div class="carousel-details">
    		<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
    		</div>
    		</div>
    	</li>
  	<?php endwhile;?>
  </ul>
  
  
  
  
  <?php return ob_get_clean();
  
}
add_shortcode( 'wd_vc_portfolio', 'wd_vc_portfolio' ); ?>