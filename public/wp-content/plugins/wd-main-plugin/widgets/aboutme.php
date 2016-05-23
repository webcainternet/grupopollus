<?php 
function wd_admin_widget_register() {

 	wp_enqueue_script('upload_media_widget', get_template_directory_uri() .'/inc/js/upload-media.js', array('jquery'));
  wp_enqueue_media(); 

}
add_action( 'admin_enqueue_scripts', 'wd_admin_widget_register' );

 class boximage extends WP_Widget {
    function boximage() {
        parent::__construct(false, $name = 'Block Image');	
    }
	
function form($instance) {
  if (isset($instance['title'])) {
    $title = esc_attr($instance['title']);
  }else {
    $title = "";
  }

  if (isset($instance['image'])) {
    $image = esc_attr($instance['image']);
  }else {
    $image = "";
  }
  
  if (isset($instance['description'])) {
    $description = esc_attr($instance['description']);
  }else {
    $description = "";
  }
        
        
        
				
				
        ?>
            <p>
                <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?> 
                    <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
                </label>
            </p>
     				<p>
                <label for="<?php echo $this->get_field_id('image'); ?>"><?php _e('URL background image'); ?> 
                	
                    <input class="widefat uploadeimage" id="<?php echo $this->get_field_id('image'); ?>" name="<?php echo $this->get_field_name('image'); ?>" type="text" value="<?php echo $image; ?>" />
               		
                </label>
            </p>
     				<p>
                <label for="<?php echo $this->get_field_id('description'); ?>"><?php _e('Description'); ?> 
                	
                    <textarea class="widefat description" id="<?php echo $this->get_field_id('description'); ?>" name="<?php echo $this->get_field_name('description'); ?>"  ><?php echo $description; ?></textarea>
               		
                </label>
            </p>

        <?php 
    }	

function update($new_instance, $old_instance) {
	 $instance = $old_instance;
	 $instance['image'] = $new_instance['image'];  
   $instance['title'] = $new_instance['title'];  
   $instance['description'] = $new_instance['description'];  
	
	   
	  return $instance;
}
function widget($args, $instance) {		
  extract( $args );
	
	
  $title = apply_filters('widget_title', $instance['title']);
	$image = $instance['image'];
	$description = esc_attr($instance['description']);
	
	
	?>
  <li class="aboutmelist <?php echo $widget_id; ?>">
   <div class="block-image">

  	<img src="<?php echo wd_image_resize( $image, 100 ) ?>" alt="Image" />

  	<h2><?php echo $title ?></h2>
  	<p>
  		<?php echo $description ?>
  	</p>
  	</div>
  </li>
<?php
    }
} 
add_action('widgets_init', create_function('', 'return register_widget("boximage");'));