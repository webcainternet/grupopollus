        <!--.footer-columns -->
  			<section class="l-footer-columns">
				  <h3 class="hide">Footer</h3>
  				<div class="row animation-parent" data-animation-delay="350">
  					<?php
					  $wd_footer_columns = wd_get_option('wd_footer_columns','three _columns');

					  switch ($wd_footer_columns) {
						  case "one_columns":
							  $column_one = 12;
							  break;
						  case "tow_a_columns":
							  $column_one = 4;
							  $column_tow = 8;
							  break;
						  case "tow_b_columns":
							  $column_one = 8;
							  $column_tow = 4;
							  break;
						  case "tow_c_columns":
							  $column_one = 6;
							  $column_tow = 6;
							  break;
						  default:
							  $column_one = 4;
							  $column_tow = 4;
							  $column_three = 4;
					  } ?>

  					<ul class="block large-<?php echo esc_attr($column_one) ?> medium-<?php echo esc_attr($column_one) ?> columns animated" data-animated="fadeInRight">
  						 <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('footer-1') ) : ?><?php endif; ?>
  					</ul>

					  <?php if($wd_footer_columns == 'tow_a_columns' || $wd_footer_columns = 'tow_b_columns' || $wd_footer_columns = 'tow_c_columns') {  ?>
	            <ul class="block large-<?php echo esc_attr($column_tow) ?> medium-<?php echo esc_attr($column_tow) ?> columns animated" data-animated="fadeInRight">
	               <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('footer-2') ) : ?><?php endif; ?>
	            </ul>
					  <?php }  ?>

  					<?php if( $wd_footer_columns == 'three_columns' ) {  ?>
	            <ul class="block large-<?php echo esc_attr($column_three) ?> medium-<?php echo esc_attr($column_three) ?> columns animated" data-animated="fadeInRight">
	               <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Footer-3') ) : ?><?php endif; ?>
	            </ul>
  					<?php }  ?>

  				</div>
  			</section>
  			<!--/.footer-columns-->
  
  			<!--.l-footer-->
  			<footer class="l-footer">
  				<div class="row">
  					<div class="footer large-12">
  						<div class="block">
  							<?php wp_nav_menu( array('theme_location' => 'footer','container_class' => 'wd_footer_menu clearfix', )) ?>						
  						</div>
  					</div>
  					<!-- <div class="large-4 columns">
  						<?php //if(do_action('icl_language_selector')){
  							  //do_action('icl_language_selector'); 
  						//}?>
  					</div> -->
  					<div class="copyright large-12 text-center">
  						<p>
  						<?php  print wd_get_option('wd_copyright','');   ?>
  						</p>
  					</div>
  				</div>
  			</footer>
  			<!--/.footer-->
  
  		  <!--/.page -->
  		</div>
  		
  	</div>
		<?php
			$menu_style = wd_get_option('wd_menu_style','');
			if($menu_style == "offcanvas") { ?>
				<a class="exit-off-canvas"></a>
				</div></div>
			<?php } ?>
		<!-- end offcanvas -->

    <?php
    if ( wd_get_option( 'wd_theme_custom_js', '' ) != '' ) {
      echo '<script type="text/javascript">' . esc_js(wd_get_option( 'wd_theme_custom_js','' )) . '</script>';
    } ?>

    <script>
      jQuery('.animated').css('opacity', 0);
    </script>

    <?php wp_footer(); ?>
	</body>
</html>