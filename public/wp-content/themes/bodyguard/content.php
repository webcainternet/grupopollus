	<article <?php post_class(); ?>>
		<header>
			<ul class="post-infos clearfix">
				<li><?php echo get_the_date('d-m-y'); ?></li>
				<li>By: <?php the_author() ?></li>
				<?php if(has_tag()){ ?>
					<li><?php the_tags(); ?></li>
				<?php } ?>

				<li>
					Category: <?php  the_category(', '); ?>
				</li>
				<li class="comment-count"><?php comments_number( '0', '1', '% responses' ); echo esc_html__(' comment', 'bodyguard') ?></li>

			</ul>
			<h2>
				<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
			</h2>
		</header>

		<?php if ( has_post_thumbnail() ) { ?>
			<div class="post-thumbnail">
				<a href="<?php the_permalink(); ?>"><?php  the_post_thumbnail('wd_blog-thumb');  ?></a>
			</div>
		<?php } ?>

		<div class="blog-body">
			<p><?php echo wp_trim_words( get_the_content(), 70 ); ?></p>
			<div class="readmore <?php if(is_rtl()) { echo  'text-left'; }else { echo 'text-right';}?> right">
				<a href="<?php the_permalink(); ?>"> <?php echo esc_html__("Read more...", 'bodyguard'); ?> </a>
			</div>
			<div class="share-post">
	        <span class="left"><i class="fa fa-share-alt"></i></span>
	        <div class="twitter-share left" data-url=<?php the_permalink(); ?> data-text="<?php the_title(); ?>" data-title="<i class='fa fa-twitter'></i>"></div>
	        <div class="facebook-share left" data-url=<?php the_permalink(); ?> data-text="<?php the_title(); ?>" data-title="<i class='fa fa-facebook'></i>"></div>
	    </div>

		</div>
	</article>
