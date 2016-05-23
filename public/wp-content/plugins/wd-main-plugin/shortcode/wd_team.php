<?php 

if(!function_exists('wd_team_scode')){
  function wd_team_scode($atts) {
  	extract( shortcode_atts( array(
    'columns'     => 4,
    'itemperpage' => '10',
    'layout'      => 1,   // 1: masonry  2: grid  3: large
    'header' => 16,
    'css_animation' => 'no'
  ), $atts ) );

    $animation_classes =  "";
    $data_animated = "";
    if(($css_animation != 'no')){
      $animation_classes =  " animated ";
      $data_animated = "data-animated=$css_animation";
}
	
    ob_start(); ?>  
    
   
    
     <ul class="team-list small-block-grid-1 large-block-grid-<?php echo esc_attr($columns); ?> medium-block-grid-<?php echo esc_attr($columns); ?> text-center">
      <?php $loop = new WP_Query( array( 'post_type' => 'team-member', 'posts_per_page' => $itemperpage, ) );
          while ( $loop->have_posts() ) : $loop->the_post();  ?> 
            <li class="<?php echo esc_attr($animation_classes); ?>" <?php echo esc_attr($data_animated); ?>>
              <div class="team-member-item">
              <div class="team-member-picture">
                <?php 
                  $image_url = get_post_meta(get_the_ID(), 'pciture', true);
                  
                  $image_id = wd_get_image_id($image_url);

                  print wp_get_attachment_image( $image_id, 'wd_team' );
                  ?>
               </div>
               <div class="team-member-name-job-title">
                <h3 class="team-member-name"><?php the_title(); ?></h3>
                <?php if(get_post_meta(get_the_ID(), 'job_title', true) != '') { ?>
                	<h4><?php echo get_post_meta(get_the_ID(), 'job_title', true); ?></h4>
                <?php } ?>
               </div>
               <?php if (get_post_meta(get_the_ID(), 'description', true) != ""): ?>
                <div class="team-member-desc">
                  <p><?php echo get_post_meta(get_the_ID(), 'description', true); ?></p>
                </div>
               <?php endif ?>
              <div class="team-membre-social-icons">
                <ul>
                <?php if (get_post_meta(get_the_ID(), 'wd_twitter', true) != ""): ?>
                  <li><a href="<?php echo get_post_meta(get_the_ID(), 'wd_twitter', true); ?>"><i class="fa fa-twitter"></i></a></li>
                <?php endif ?>
                <?php if (get_post_meta(get_the_ID(), 'wd_facebook', true) != ""): ?>
                  <li><a href="<?php echo get_post_meta(get_the_ID(), 'wd_facebook', true); ?>"><i class="fa fa-facebook"></i></a></li>
                <?php endif ?>
                <?php if (get_post_meta(get_the_ID(), 'wd_linkedin', true) != ""): ?>
                  <li><a href="<?php echo get_post_meta(get_the_ID(), 'wd_linkedin', true); ?>"><i class="fa fa-linkedin"></i></a></li>
                <?php endif ?>
                </ul>
              </div>
              </div>
            </li>
      <?php endwhile; ?>
    </ul>
    
   <?php  
      return ob_get_clean();
      }
  add_shortcode( 'wd_team', 'wd_team_scode' );
}
    
    