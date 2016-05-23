<?php
/*
Template Name: left sidebar
*/
?>
<?php get_header();

if(get_post_meta(get_the_ID(), 'wd_page_show_title_area', true) == 'yes') {
	get_template_part('titlebar');
} ?>
<!-- content  -->
			<main class="row l-main">
				<?php get_sidebar('left'); ?>
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

			</main>
			<!-- /content  -->
			<?php get_footer(); ?>