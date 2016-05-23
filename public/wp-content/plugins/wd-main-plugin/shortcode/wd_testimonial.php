<?php 
function wd_testimonial($atts) {
           
  extract( shortcode_atts( array(
  
    'itemperpage' => 10,
    'show'=>1,
    'css_animation' => 'no'
    
  ), $atts ) );


    $animation_classes =  "";
    $data_animated = "";
  if(($css_animation != 'no')){
      $animation_classes =  " animated ";
      $data_animated = "data-animated=$css_animation";
}

  ob_start(); ?>
  
 <div class='twelve large-12 columns space testimonials-box medium <?php echo esc_attr($animation_classes); ?>' data-show ="<?php echo esc_attr($show)  ?>" <?php echo esc_attr($data_animated); ?>>
  <div>
    <span class='box-title anim'><?php  get_option('box2') ?></span>
    <ul class='testimonials'><?php
      $loop = new WP_Query( array( 'post_type' => 'testimonials', 'posts_per_page' => $itemperpage ) );
      while ( $loop->have_posts() ) : $loop->the_post(); ?>
      
      <li>
        <blockquote>
         <?php 
                  $post_thumbnail_id = get_post_meta(get_the_ID(), 'testimonail_image', true);
									if($post_thumbnail_id != ''){
                  ?>
                  <img src="<?php echo $post_thumbnail_id; ?>" alt="user">
                  <?php
                  }else{
                  	?><img src="<?php echo get_template_directory_uri() ?>/images/empty.jpg" alt="user"><?php
                  }?>
          <span class="quote">&#34; </span><?php the_excerpt(); ?>
          <cite><?php the_title(); ?></cite>
        </blockquote>
      </li>
       <?php endwhile; ?>
    </ul>
  </div>
</div>
  
<?php return ob_get_clean();
}
add_shortcode( 'wd_testimonial', 'wd_testimonial' );
?>