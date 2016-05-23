<?php
class boxlastpost extends WP_Widget {
    function boxlastpost() {
        parent::__construct(false, $name = 'Block post');
    }

    function form($instance) {
        $posts = get_posts(array('post_type' => 'post'));

        if (isset($instance['post_title'])) {
        $post_title = esc_attr($instance['post_title']);
        }else {
            $post_title = "";
        }


        ?>
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?>
                <select class="widefat" id="<?php echo $this->get_field_id('pot_title'); ?>" name="<?php echo $this->get_field_name('post_title'); ?>">
                    <?php foreach ( $posts as $key => $post ) { ?>
                        <option value="<?php echo $post->ID  ?>" selected="<?php if($post->ID == $post_title) {echo "selected";}else{echo "";} ?>"><?php echo $post->post_title ?></option>
                    <?php } ?>
                </select>

            </label>
        </p>

    <?php
    }


    function widget($args, $instance) {
        extract( $args );

        
        if (isset($instance['post_title'])) {
        $post_title = esc_attr($instance['post_title']);
        }else {
            $post_title = "";
        }

        ?><li class="aboutmelist <?php echo $widget_id; ?>">
        <div class="block-image box-post">
            <?php echo get_the_post_thumbnail( $post_title, 'wd_1900x620'); ?>
            <h2><a href="<?php echo get_the_permalink($post_title); ?>"><?php echo get_the_title($post_title) ?></a></h2>
        </div>
        </li>
    <?php
    }
}
add_action('widgets_init', create_function('', 'return register_widget("boxlastpost");'));