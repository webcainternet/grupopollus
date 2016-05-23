<article <?php post_class(); ?>>
    <div class="quote-format">
        <blockquote>
            <span class="leftq quotes">&ldquo;</span> <?php the_excerpt()  ?> <span class="rightq quotes">&bdquo; </span>
            <h2>-<?php the_title() ?></h2>
            <div class="share-post">
						    <span class="left"><i class="fa fa-share-alt"></i></span>
						    <div class="twitter-share left" data-url=<?php the_permalink(); ?> data-text="<?php the_title(); ?>" data-title="<i class='fa fa-twitter'></i>"></div>
				        <div class="facebook-share left" data-url=<?php the_permalink(); ?> data-text="<?php the_title(); ?>" data-title="<i class='fa fa-facebook'></i>"></div>
						</div>
        </blockquote>
    </div>
</article>