<?php function wd_comments($comment, $args, $depth) {
  $GLOBALS['comment'] = $comment; ?>
  <li <?php comment_class(); ?>>
    <article id="comment-<?php comment_ID(); ?>">
      <header class="comment-author clearfix">
        <?php echo get_avatar($comment,$size='64'); ?>
        <div class="author-meta">
          <?php printf(esc_html__('%s', 'bodyguard'), get_comment_author_link()) ?>
          <time datetime="<?php echo comment_date('c') ?>">
	          <a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ) ?>">
		          <?php printf(esc_html__('%1$s', 'bodyguard'), get_comment_date(),  get_comment_time()) ?>
	          </a>
          </time>
          <?php edit_comment_link(esc_html__('(Edit)', 'bodyguard'), '', '') ?>
        </div>
      </header>
      
      <?php if ($comment->comment_approved == '0') : ?>
            <div class="notice alert-box">
              <p class="bottom"><?php esc_html_e('Your comment is awaiting moderation.', 'bodyguard') ?></p>
            </div>
      <?php endif; ?>
      
      <section class="comment">
        <?php comment_text() ?>
        <?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
      </section>

    </article>
<?php } ?>

<?php
// Do not delete these lines
  if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
    die (esc_html__('Please do not load this page directly. Thanks!', 'bodyguard'));

  if ( post_password_required() ) { ?>
  <section id="comments">
    <div class="notice alert-box">
      <p class="bottom"><?php esc_html_e('This post is password protected. Enter the password to view comments.', 'bodyguard'); ?></p>
    </div>
  </section>
  <?php
    return;
  }
?>
<?php // You can start editing here. Customize the respond form below ?>
<?php if ( have_comments() ) : ?>
  <section id="comments">
    <h3><?php comments_number(esc_html__('There is no comments yet', 'bodyguard'), esc_html__('One comment', 'bodyguard'), esc_html__('% comments', 'bodyguard') ); ?></h3>
    <ol class="commentlist">
    <?php wp_list_comments('type=comment&callback=wd_comments'); ?>
    
    </ol>
    <footer>
      <nav id="comments-nav">
        <div class="comments-previous"><?php previous_comments_link( esc_html__( '&larr; Older comments', 'bodyguard' ) ); ?></div>
        <div class="comments-next"><?php next_comments_link( esc_html__( 'Newer comments &rarr;', 'bodyguard' ) ); ?></div>
      </nav>
    </footer>
  </section>
<?php else : // this is displayed if there are no comments so far ?>
  <?php if ( comments_open() ) : ?>
  <?php else : // comments are closed ?>
  <section id="comments">
    <div class="notice alert-box">
      <p class="bottom"><?php esc_html_e('Comments are closed.', 'bodyguard') ?></p>
    </div>
  </section>
  <?php endif; ?>
<?php endif; ?>
<?php if ( comments_open() ) : ?>
<section id="respond">


  <h3><?php comment_form_title( esc_html__('Write a comment', 'bodyguard'), esc_html__('Write a comment to %s', 'bodyguard') ); ?></h3>
  <p class="cancel-comment-reply"><?php cancel_comment_reply_link(); ?></p>
  <?php if ( wd_get_option('comment_registration','') && !is_user_logged_in() ) : ?>
	<div class="large-12 columns"><?php printf( esc_html__('You must be <a href="%s">logged in</a> to post a comment.', 'bodyguard'), wp_login_url( get_permalink() ) ); ?></div>
  <?php else : ?>
  <div class="row">
    <form action="<?php echo wd_get_option('siteurl',''); ?>/wp-comments-post.php" method="post" id="commentform">
      <?php if ( is_user_logged_in() ) : ?>
      <p><?php 
      $allowed_html_array = array(
          'a' => array(
              'href' => array(),
              'title' => array()
          ),
          'br' => array(),
          'em' => array(),
          'strong' => array(),
      );
      printf(wp_kses(__('Logged in as <a href="%s/wp-admin/profile.php">%s</a>.', 'bodyguard'),$allowed_html_array), wd_get_option('siteurl',''), $user_identity); ?> <a href="<?php echo wp_logout_url(get_permalink()); ?>" title="<?php esc_html__('Log out of this account', 'bodyguard'); ?>"><?php esc_html_e('Log out &raquo;', 'bodyguard'); ?></a></p>
      <?php else : ?>
        <div class="large-4 columns name-column">
          <p>
            <label for="author"><?php esc_html_e('Name', 'bodyguard'); if ($req)esc_html_e(' (required)', 'bodyguard'); ?></label>
            <input type="text" class="five" name="author" id="author" value="<?php echo esc_attr($comment_author); ?>" size="22" tabindex="1" <?php if ($req) echo "aria-required='true'"; ?>>
          </p>
        </div>
        <div class="large-4 columns">
          <p>
            <label for="email"><?php esc_html_e('Email (will not be published)', 'bodyguard'); if ($req)esc_html_e(' (required)', 'bodyguard'); ?></label>
            <input type="text" class="five" name="email" id="email" value="<?php echo esc_attr($comment_author_email); ?>" size="22" tabindex="2" <?php if ($req) echo "aria-required='true'"; ?>>
          </p>
        </div>
        <div class="large-4 columns website-column">
          <p>
            <label for="url"><?php esc_html_e('Website', 'bodyguard'); ?></label>
            <input type="text" class="five" name="url" id="url" value="<?php echo esc_attr($comment_author_url); ?>" size="22" tabindex="3">
          </p>
        </div>

      <?php endif; ?>
      <div class="large-12 columns">
        <p>
          <label for="comment"><?php esc_html_e('Your Message', 'bodyguard'); ?></label>
          <textarea name="comment" id="comment" tabindex="4"></textarea>
        </p>
      <p><input name="submit" class="small radius button" type="submit" id="submit" tabindex="5" value="<?php esc_attr_e('Submit Comment', 'bodyguard'); ?>"></p>
      </div>
      <?php comment_id_fields(); ?>
      <?php do_action('comment_form', $post->ID); ?>
    </form>
  </div>



  <?php endif; // If registration required and not logged in ?>
</section>
<?php endif; // if you delete this the sky will fall on your head ?>