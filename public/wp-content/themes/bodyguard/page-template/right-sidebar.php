<?php
/*
Template Name: right sidebar
*/
?>
<?php get_header();

if(get_post_meta(get_the_ID(), 'wd_page_show_title_area', true) == 'yes') {
	
	get_template_part('titlebar');
} ?>
<!-- content  -->
			<main class="row l-main">
				<div class="large-9 main columns">
					<a id="main-content"></a>
						<div class="view-content">
			<!-- loop ... -->				
					<?php if (have_posts()) : ?>
               <?php while (have_posts()) : the_post(); ?>    
     
					<article>
						<div class="body field">
							<?php the_content(); ?>
						</div>
					</article>
     <?php endwhile; 
endif;
     ?>
<?php wp_reset_query();  ?> 
							
<!-- /loop.. ********-->
						</div>
						<?php if (comments_open()){
        comments_template( '', true );
      } ?>
				</div>
<?php get_sidebar('right'); ?>
			</main>
			<!-- /content  -->
			<?php get_footer(); ?>