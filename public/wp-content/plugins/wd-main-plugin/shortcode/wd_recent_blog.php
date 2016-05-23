<?php 
function wd_recent_blog($atts) {

	$style = $columns = $category = $itemperpage = '';
  extract( shortcode_atts( array(
    'itemperpage' => '3', 
    'style' => 'style2', 
    'category'  => '',
    'columns' => '3', 
    'css_animation' => 'no'
  ), $atts ) );

  ob_start();
			$animation_classes =  "";
      $data_animated = "";
  if(($css_animation != 'no')){
      $animation_classes =  " animated ";
      $data_animated = "data-animated=$css_animation";
}

if($style == 'style1'){

  ?>



	<div class="row">
		<div class="small-12 columns small-centered">
		<?php
		$tax_query = ($category != '') ? array('taxonomy' => 'category', 'field' => 'term_id', 'terms' => $category)   :   '';
		$loop = new WP_Query( array( 'post_type' => 'post', 'posts_per_page' => $itemperpage,
		                             'tax_query' => array(
			                             $tax_query
		                             )));
		while ( $loop->have_posts() ) {
			$loop->the_post();
		 ?>
			<article class="wd-small-blog <?php echo esc_attr($animation_classes); ?>" <?php echo esc_attr($data_animated); ?>>
				<a class="wd-thumbnail" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_post_thumbnail( '100x100' ) ?></a>
				<div class="blog-desc">
					<h4 class="blog-desc-header"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
					<p class="blog-desc-detail"><?php the_date(); ?></p>
				</div>
			</article>
		<?php } ?>

		</div>
	</div>


<?php }else{ ?>

	 <div class="<?php if($columns == 1) echo "large-offset-2 large-8"  ?> blog-page blog-shortcode">
    <ul class="post-list small-block-grid-1 large-block-grid-<?php echo $columns; ?>" 
    	data-itemperpage='<?php echo $itemperpage; ?>' data-category="<?php if(is_array($category)) echo implode(", ", $category); ?>">            
      <?php 
      $tax_query = ($category != '') ? array('taxonomy' => 'category', 'field' => 'term_id', 'terms' => $category)   :   '';
      
      $loop = new WP_Query( array( 'post_type' => 'post', 'posts_per_page' => $itemperpage,
                              'tax_query' => array(
                                $tax_query
                              )));
    
      while ( $loop->have_posts() ) : $loop->the_post();  ?>  
        <li class="post-item <?php echo esc_attr($animation_classes); ?>" data-page="1" data-id="<?php echo get_the_ID() ?>" <?php echo esc_attr($data_animated); ?>>        
          <article class="article">
          	<?php $post_format = get_post_format();
								switch ($post_format) {
									case  'gallery' : ?>
            			<ul class="post-gallery wd-gallery-images-holder owl-carousel clearfix">
													<?php
													$portfolio_image_gallery_val = get_post_meta( get_the_ID(), 'wd_portfolio-image-gallery', true );
                          
													if($portfolio_image_gallery_val != '' ) {
                            $portfolio_image_gallery_array = explode(',',$portfolio_image_gallery_val);
                          }
																	
													if(isset($portfolio_image_gallery_array) && count($portfolio_image_gallery_array)!=0){													
														foreach($portfolio_image_gallery_array as $gimg_id){													
															$gimage_wp = wp_get_attachment_image_src($gimg_id,'wd_270x198', true);
															echo '<li class="wd-gallery-image-holder"><img src="'.$gimage_wp[0].'" alt="'. get_the_title() .'" /></li>';
														}
													}
													?>
											</ul>
			      <?php 
			            break;
									case 'video' :
										 $_video_type = get_post_meta(get_the_ID(), "video_type", true);
										 
										 if($_video_type == "youtube") { ?>
											
											<video width="<?php echo $Width_video; ?>" height="<?php echo $Height_video ?>"  preload="none">
											    <source type="video/youtube" src="<?php echo get_post_meta(get_the_ID(), "wd_youtube_link", true);  ?>" />
											</video>
										
										
										<?php } else if ($_video_type == "vimeo"){ ?>
											
											<iframe src="http://player.vimeo.com/video/<?php echo get_post_meta(get_the_ID(), "wd_vimeo_id", true);  ?>?title=0&amp;byline=0&amp;portrait=0" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>
										
										<?php } else if ($_video_type == "self_hosted"){
											 $poster = get_post_meta(get_the_ID(), "wd_poster", true);
											 $poster = wp_get_attachment_image_src($poster , 'wd_270x198')
											 ?>
											
											
											 <video width="<?php echo $Width_video; ?>" height="<?php echo $Height_video ?>" poster="<?php echo $poster[0] ?>" controls='controls' preload='none'>
											    <source type='video/mp4' src="<?php echo get_post_meta(get_the_ID(), 'wd_video_mp4', true) ?> " />
                          <?php if( get_post_meta(get_the_ID(), 'wd_video_webm', true) != '' ){ ?>
											      <source type='video/webm' src="<?php echo get_post_meta(get_the_ID(), 'wd_video_webm', true) ?>" />
                          <?php }
                          if( get_post_meta(get_the_ID(), 'wd_video_ogv', true) != '' ){ ?>
                            <source type='video/ogg' src="<?php echo get_post_meta(get_the_ID(), 'wd_video_ogv', true) ?>" />
                          <?php } ?>
											</video>
											
									<?php } 
									break;	
									default:
		         ?>
		         <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_post_thumbnail( 'wd_270x198' ) ?></a>
		         <?php break; 
		         }?>
            <h2>
                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
            </h2>
            <div class="post-body">
            <div class="post-datas">
              <span class="post-author">Posted by <?php the_author() ?></span>
              <!-- <span class="postdate">
              <i class="fa fa-calendar-o"></i>
                <?php //echo get_the_date('M'); ?>
                <?php //echo get_the_date('d'); ?>
              </span>
              <span class="comments-counter">
                <?php //comments_number( " ", "<i class='fa fa-comment'></i> 1", "<i class='fa fa-comments'></i> %" ); ?>
              </span> -->
            </div>
            <div class="post-text">
              
              <?php if(get_option('wd_show_teaser' , 'on') == 'on') { ?>
                <div class="blog-body">
                  <?php echo wp_trim_words( get_the_content(), 20 ); ?>                  
                  <div class="post-info <?php if(is_rtl()) { echo  'text-left'; }else { echo 'text-right';}?>">
                    
                  </div>
                </div>
              <?php } ?>
              <div class="text-right">
                <a href="<?php the_permalink(); ?>">Read more</a>
              </div>
            </div>
            </div>
            </article>         
          </li>
      <?php endwhile; ?>        
    </ul>
  </div>

	<?php } ?>
  <?php return ob_get_clean();
  
}
add_shortcode( 'wd_blog', 'wd_recent_blog' ); ?>