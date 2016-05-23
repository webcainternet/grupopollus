<?php
class contactInfo extends WP_Widget {
    function contactInfo() {
        parent::__construct(false, $name = 'contact-info');	
    }
	
function form($instance) {
    if (isset($instance['title'])) {
        $title = esc_attr($instance['title']);
    }else {
        $title = "";
    }

    if (isset($instance['phoneNumber'])) {
        $phoneNumber = esc_attr($instance['phoneNumber']);
    }else {
        $phoneNumber = "";
    }

    if (isset($instance['fax'])) {
        $fax = esc_attr($instance['fax']);
    }else {
        $fax = "";
    }

    if (isset($instance['email'])) {
        $email = esc_attr($instance['email']);
    }else {
        $email = "";
    }

    if (isset($instance['adress'])) {
        $adress = esc_attr($instance['adress']);
    }else {
        $adress = "";
    }
    
        ?>
            <p>
                <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?> 
                    <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
                </label>
            </p>
     		<p>
                <label for="<?php echo $this->get_field_id('phoneNumber'); ?>"><?php _e('Phone Number:'); ?> 
                    <input class="widefat" id="<?php echo $this->get_field_id('phoneNumber'); ?>" name="<?php echo $this->get_field_name('phoneNumber'); ?>" type="text" value="<?php echo $phoneNumber; ?>" />
                </label>
            </p>
            <p>
                <label for="<?php echo $this->get_field_id('fax'); ?>"><?php _e('fax Number:'); ?> 
                    <input class="widefat" id="<?php echo $this->get_field_id('fax'); ?>" name="<?php echo $this->get_field_name('fax'); ?>" type="text" value="<?php echo $fax; ?>" />
                </label>
            </p>
            <p>
                <label for="<?php echo $this->get_field_id('email'); ?>"><?php _e('E-mail:'); ?> 
                    <input class="widefat" id="<?php echo $this->get_field_id('email'); ?>" name="<?php echo $this->get_field_name('email'); ?>" type="text" value="<?php echo $email; ?>" />
                </label>
            </p>
            <p>
                <label for="<?php echo $this->get_field_id('adress'); ?>"><?php _e('Adress:'); ?> 
                    <input class="widefat" id="<?php echo $this->get_field_id('adress'); ?>" name="<?php echo $this->get_field_name('adress'); ?>" type="text" value="<?php echo $adress; ?>" />
                </label>
            </p>
        <?php 
    }	


function widget($args, $instance) {		
        extract( $args );
        /*$title = apply_filters('widget_title', $instance['title']);*/
		if (isset($instance['title'])) {
        $title = esc_attr($instance['title']);
    }else {
        $title = "";
    }

    if (isset($instance['phoneNumber'])) {
        $phoneNumber = esc_attr($instance['phoneNumber']);
    }else {
        $phoneNumber = "";
    }

    if (isset($instance['fax'])) {
        $fax = esc_attr($instance['fax']);
    }else {
        $fax = "";
    }

    if (isset($instance['email'])) {
        $email = esc_attr($instance['email']);
    }else {
        $email = "";
    }

    if (isset($instance['adress'])) {
        $adress = esc_attr($instance['adress']);
    }else {
        $adress = "";
    }

     echo $before_widget;
				if ( $title ) {
              echo $before_title . $title . $after_title;
				} ?>
        <div class="block-block contact-details block-block-19 block-even clearfix">
          <ul class="contact-details-list">
              <li>
                  <span><span>Phone:</span> <?php echo $phoneNumber ?></span>
              </li>
              <li>
                  <span><span>Fax:</span> <?php echo $fax ?></span>
              </li>
              <li>
                  <span><span>Email:</span> <a href="mailto:email@website.com"><?php echo $email ?></a></span>
              </li>
              <li>
                  <span><span>Adress:</span> <?php echo $adress ?></span>
              </li>
          </ul>
        </div>
     <?php echo $after_widget;
    }
}

add_action('widgets_init', create_function('', 'return register_widget("contactInfo");'));