<?php
/**
 * Created by PhpStorm.
 * User: Mimoun
 * Date: 10/06/2015
 * Time: 23:16
 */

if(wd_get_option('wd_show_top_social_bare','on') == 'on' && wd_get_option('wd_logo_position','logo_top')!='logo_top' ){ ?>
	<div class="header-top hide-for-small">
		<div class="row">
			<div class="large-6 columns header_top_left">
				<ul class="social-icons accent inline-list">
					<?php if (wd_get_option('flickr','') != ""): ?>
						<li class="flickr">
							<a href="http://www.flickr.com/<?php echo wd_get_option('flickr',''); ?>"><i class="fa fa-flickr"></i></a>
						</li>
					<?php endif ?>
					<?php if (wd_get_option('facebook','') != ""): ?>
						<li class="facebook">
							<a href="https://www.facebook.com/<?php echo wd_get_option('facebook',''); ?>"><i class="fa fa-facebook"></i></a>
						</li>
					<?php endif ?>
					<?php if (wd_get_option('twitter','') != ""): ?>
						<li class="twitter">
							<a href="https://twitter.com/<?php echo wd_get_option('twitter',''); ?>"><i class="fa fa-twitter"></i></a>
						</li>
					<?php endif ?>
					<?php if (wd_get_option('vimeo','') != ""): ?>
						<li class="vimeo">
							<a href="https://vimeo.com/<?php echo wd_get_option('vimeo',''); ?>"><i class="fa fa-vimeo-square"></i></a>
						</li>
					<?php endif ?>
				</ul>
			</div>

			<div class="large-6 columns header_top_right text-right">
				<div class="contact-info">
					<?php if (wd_get_option('adress','') != ""){ ?>
						<span><span class="wd-adress"></span><?php echo wd_get_option('adress',''); ?> </span>
					<?php }
						if (wd_get_option('phone','') != ""){ ?>
						<span><span class="wd-phone"></span>Phone: <?php echo wd_get_option('phone',''); ?></span>
					<?php } ?>
				</div>
			</div>
		</div>
	</div>
<?php }