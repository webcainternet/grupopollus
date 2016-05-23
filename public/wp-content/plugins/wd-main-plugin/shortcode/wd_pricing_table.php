<?php 
function wd_pricing_table($atts) {
           
  extract( shortcode_atts( array(
    'title'       => 'Standard',
    'price'       => '$99.99',
    'description' => 'An awesome description',
    'button_text' => 'Buy Now',
    'button_link' => '#',
    'featured'    => '',
    'content_text'     => '<ul><li>Option #1</li><li>Option #2</li><li>Option #3</li><li>Option #4</li></p>',
    'css_animation' => 'no'
  ), $atts ) );

    $animation_classes =  "";
    $data_animated = "";
  if(($css_animation != 'no')){
      $animation_classes =  " animated ";
      $data_animated = "data-animated=$css_animation";
}
  
  ob_start(); ?>
  
  <ul class="pricing-table <?php echo esc_attr($featured) . ' ' . esc_attr($animation_classes); ?>" <?php echo esc_attr($data_animated); ?>>
    <li class="title"><?php echo $title; ?></li>
    <li class="price"><?php echo $price; ?></li>
    <li class="description"><?php echo $description; ?></li>
    <li>
      <?php echo $content_text; ?>      
    </li>
    
    <li class="cta-button">
      <a href="<?php echo $button_link; ?>" class="button"><?php echo $button_text; ?></a>
    </li>
  </ul>
<?php return ob_get_clean();
}
add_shortcode( 'wd_pricing_table', 'wd_pricing_table' );