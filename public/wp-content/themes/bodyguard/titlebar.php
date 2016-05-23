<?php //if(!is_front_page()) { ?>

	<section class="titlebar ">
		<div class="row">
			<div class="large-8 columns">
				<?php
				if (wd_is_blog()){
					$page_for_posts = wd_get_option( 'page_for_posts' ,'' ); ?>
					<h1 id="page-title" class="title"><?php echo get_the_title($page_for_posts); ?></h1>
				  <?php
				}elseif(is_search()){ ?>
					<h2 id="page-title" class="title"><?php echo esc_html__('Search Result of', 'bodyguard') .': '. esc_html( get_search_query( false ) ) ?></h2>
					<?php
				}else {
					the_title( '<h2 id="page-title" class="title">', '</h2>' );
				} ?>
			</div>
			<div class="large-4 columns">
				<?php wd_breadcrumb(); ?>
			</div>
		</div>
	</section>

<?php // } ?>