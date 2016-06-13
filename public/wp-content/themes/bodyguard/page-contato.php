<?php get_header();

  if(!(is_front_page())) {
	  $wd_page_show_title_area = get_post_meta(get_the_ID(), 'wd_page_show_title_area', true);
	  
  	if($wd_page_show_title_area != 'no'){
		  get_template_part('titlebar');
		}
	}  ?>
  
  <style type="text/css">
  .titulo1a {
    background-color: #071c2c;
    color: #FFF;
    margin-right: 30px;
    padding: 15px 20px;
    margin-bottom: 15px;
  }
  .grupo1 {
    border-bottom: dotted 1px #071c2c;
    margin-bottom: 50px;
  }

  </style>
  <!-- content  -->
	<main class="l-main">
		<div class="main row">
		  <?php if (have_posts()) :
       while (have_posts()) : the_post(); ?>    
  			<article>
  				<div class="body field">
  					<?php // the_content(); ?>
            <div style="background-image: url('/wp-content/uploads/2016/06/bg-contato2.jpg'); height: 200px; width: 100%; margin-top: -30px; background-size: cover; background-repeat: no-repeat; margin-bottom: 30px;" /></div>


            <?php the_content(); ?>


  				</div>
  			</article>
      <?php endwhile;
      endif; ?>
      <?php if (comments_open()){
        //comments_template( '', true );
      } ?>
		</div>  
	</main>
	<!-- /content  -->
		
	<?php get_footer(); ?>