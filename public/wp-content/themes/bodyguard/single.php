<?php get_header() ?>

	<section class="titlebar single-post center">
		<div class="title-container row column">
				<h1 id="page-title" class="title"><?php the_title(); ?></h1>
				<?php wd_breadcrumb(); ?>
		</div>
	</section>

	<main class="row l-main">
		<div class="large-9 main columns">
			<?php if (have_posts()) : ?>
         <?php while (have_posts()) : the_post(); ?>
						<article>
							<div class="body field">
								<div class="thumbnail"><?php the_post_thumbnail('wd_blog-thumb'); ?></div>
								<?php the_content(); ?>
							</div>
							<div class="post-info">
	              <span class="post-date"><i class="fa-calendar fa"></i> <?php echo get_the_date(); ?></span>
	              <span class="post-author"><i class="fa-user fa"></i> <?php the_author() ?></span>

	              <?php if(has_tag()){ ?>
	                <span class="post-tags"><i class="fa-tag fa"></i> <?php the_tags() ?></span>
	              <?php } ?>

	              <?php if(has_category()){ ?>
	                <span class="post-categories"><i class="fa-folder fa"></i> Categories: <?php the_category() ?></span>
	              <?php } ?>
			          </div>
			          <?php if (comments_open()){
		              comments_template( '', true );
		            } ?>
						</article>
		     <?php endwhile;
			endif;?>
			<?php wp_link_pages( array( 'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'bodyguard' ), 'after' => '</div>' ) ); ?>
		</div>

		<?php get_sidebar(); ?>

	</main>

<?php get_footer(); ?>