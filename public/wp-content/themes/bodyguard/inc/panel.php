<?php



/*///////////////////////////////// Register Panel Scripts and Styles /////////////////////////////////////////*/
function wd_admin_register() {

  wp_register_script( 'wd-admin-main', get_template_directory_uri() . '/inc/js/script.js',
              array( 'jquery', 'jquery-ui-core', 'jquery-ui-widget', 'jquery-ui-mouse', 'jquery-ui-tabs',
              'jquery-ui-droppable', 'jquery-ui-sortable' ) , false , false );
  wp_register_style( 'themify-icons', get_template_directory_uri().'/inc/themify-icons.css', array(), '20120208', 'all' );
  wp_register_style( 'wd-style', get_template_directory_uri().'/inc/css/style.css', array(), '20120208', 'all' );

  $font_body_name = wd_get_option('wd_body_font_familly','Open Sans');
  $wd_font_weight_style = wd_get_option('wd_font-weight-style','400');
  $wd_main_text_font_subsets = wd_get_option('wd_main-text-font-subsets','latin');

  $font_header_name = wd_get_option('wd_head_font_familly','Open Sans');
  $wd_heading_font_weight_style = wd_get_option('wd_heading-font-weight-style','400');
  $wd_heading_text_font_subsets = wd_get_option('wd_heading-text-font-subsets','latin');

  $wd_navigation_font_familly = wd_get_option('wd_navigation_font_familly', 'Open Sans');
  $wd_navigation_font_weight_style = wd_get_option('wd_navigation-font-weight-style', '400');
  $wd_navigation_text_font_subsets = wd_get_option('wd_navigation-text-font-subsets', 'latin');
  $protocol = is_ssl() ? 'https' : 'http';


  wp_register_style( 'wd-google-fonts-body', $protocol.'://fonts.googleapis.com/css?family=' . $font_body_name . ':' . $wd_font_weight_style . '&subset=' . $wd_main_text_font_subsets , false, NULL, 'all' );
  wp_register_style( 'wd-google-fonts-heading', $protocol.'://fonts.googleapis.com/css?family=' . $font_header_name . ':' . $wd_heading_font_weight_style . '&subset=' . $wd_heading_text_font_subsets , false, NULL, 'all' );
  wp_register_style( 'wd-google-fonts-navigation', $protocol.'://fonts.googleapis.com/css?family=' . $wd_navigation_font_familly . ':' . $wd_navigation_font_weight_style . '&subset=' . $wd_navigation_text_font_subsets , false, NULL, 'all' );

  wp_register_style( 'wd-google-fonts', $protocol.'://fonts.googleapis.com/css?family=' . $font_body_name . ':' . $wd_font_weight_style . '&subset=' . $wd_main_text_font_subsets , false, NULL, 'all' );

  if ( isset( $_GET['page'] ) && $_GET['page'] == 'option panel' ) {


  }
  wp_enqueue_script( 'wd-admin-main' );
  wp_enqueue_style( 'themify-icons' );
  wp_enqueue_style( 'wd-style' );
  wp_enqueue_style( 'wd-google-fonts' );
  wp_enqueue_style( 'wd-google-fonts-body' );
  wp_enqueue_style( 'wd-google-fonts-heading' );
  wp_enqueue_style( 'wd-google-fonts-navigation' );

}
add_action( 'admin_enqueue_scripts', 'wd_admin_register' );



if(!function_exists('wd_load_color_picker')){
  add_action( 'load-widgets.php', 'wd_load_color_picker' );
  function wd_load_color_picker() {
      wp_enqueue_style( 'wp-color-picker' );
      wp_enqueue_script( 'wp-color-picker' );
  }
}




/*///////////////////////////////// Theme Options /////////////////////////////////////////*/
if(!function_exists('wd_panel_option')){
  add_action('admin_menu','wd_panel_option');
  function wd_panel_option(){

    add_theme_support( 'custom-header' );

    add_theme_page('Bodyguard Options', 'Bodyguard Options', 'edit_theme_options', 'bodyguard-theme-option' , 'wd_theme_option');
  }
}


if(!function_exists('wd_theme_option')){
  function wd_theme_option() {

    wp_enqueue_media();

    global $wd_tiles;

    wp_enqueue_script('wp-color-picker');
    wp_enqueue_style( 'wp-color-picker' );


    wp_enqueue_script('colorpick',    get_template_directory_uri() . "/js/bootstrap-colorpicker.min.js", array( 'jquery' ) );
    wp_enqueue_style ('colorpick',    get_template_directory_uri() . "/css/bootstrap-colorpicker.min.css");
    ?>
    <script type="text/javascript">
    jQuery(document).ready(function($) {
        $('.wd-color-picker').colorpicker(
          {format: 'rgba'}
        );



        $('.iris-square-value').on('mousedown', function(e) {
          //alert('clicked');
        }).on('mouseup', function(e) {
          $(this).parent().parent().parent().parent().parent().parent().css('background', $(this).parent().parent().parent().parent().parent().find('.wd-color-picker').val() );
        })

       $('.option-item.tile .iris-square-value').each(function( index ) {
        $(this).parent().parent().parent().parent().parent().parent().css('background', $(this).parent().parent().parent().parent().parent().find('.wd-color-picker').val() );
       });

      //---------------logo script-----------
      jQuery('#wd_upload_btn').click(function(){
      wp.media.editor.send.attachment = function(props, attachment){
        jQuery('#wd_logo_filed').val(attachment.url);
      }
      wp.media.editor.open(this);

      return false;
      });
      //---------------title bg image script-----------
      jQuery('#wd_title_bg_btn').click(function(){
      wp.media.editor.send.attachment = function(props, attachment){
        jQuery('#wd_title_bg_filed').val(attachment.url);
      }
      wp.media.editor.open(this);

      return false;
      });
      //---------------footer bg image script-----------
      jQuery('#wd_footer_bg_btn').click(function(){
      wp.media.editor.send.attachment = function(props, attachment){
        jQuery('#wd_footer_bg_filed').val(attachment.url);
      }
      wp.media.editor.open(this);

      return false;
      });
      //---------------404 page-----------
      jQuery('#wd_bg_404_page').click(function(){
      wp.media.editor.send.attachment = function(props, attachment){
        jQuery('#wd_404_page_filed').val(attachment.url);
      }
      wp.media.editor.open(this);

      return false;
      });
      //---------------bg home page-----------
      jQuery('#wd_bg_home_page').click(function(){
      wp.media.editor.send.attachment = function(props, attachment){
        jQuery('#wd_home_page_filed').val(attachment.url);
      }
      wp.media.editor.open(this);

      return false;
      });



      //------favicon script-----
      jQuery('#wd_upload_favicon').click(function(){
        wp.media.editor.send.attachment = function(props, attachment){
          jQuery('#wd_favicon_filed').val(attachment.url);
        }
        wp.media.editor.open(this);
        return false;
      });

      //------ Menu Background image -----
      jQuery('#wd_upload_btn_bg').click(function(){
        var that = this;
        wp.media.editor.send.attachment = function(props, attachment){
          jQuery('#wd_menu_bg_img_filed').val(attachment.url);
          //JQuery(that).parent().append('<img src="'+ attachment.url +'" />')
        }
        wp.media.editor.open(this);
        return false;
      });



      jQuery('.img-container .remove-img').click(function(){
        jQuery(this).parent().parent().find('input[type="text"]').val('none');
        jQuery(this).parent().remove();
      });
    //-------------------------------------


        $('.option-item.big.tile select').change(function () {
         var optionSelected = $(this).find("option:selected");
         var valueSelected  = optionSelected.val();

         if( valueSelected == 'big-custom_text'){
          $(this).parent().find('textarea').show();
         }else{
          $(this).parent().find('textarea').hide();
         }
        });


        /**--------logo --------*/
    $('.chekbox_logo').change(function () {
    if ($(this).attr("checked"))
    {

        $('.path_logo').fadeIn();
        return;
    }
   $('.path_logo').fadeOut();
});

/**--------social icon --------*/
    $('.checkbox_social').change(function () {
    if ($(this).attr("checked"))
    {

        $('.social_link').fadeIn();
        return;
    }
   $('.social_link').fadeOut();
});
    });
    </script>
    <?php


    if(!empty($_POST)){
      // wd_initialize_options();






      if(isset($_POST['wd_show_logo']))
        wd_save_option('wd_show_logo', esc_attr($_POST['wd_show_logo']));

      else
        wd_save_option('wd_show_logo', '');

      if(isset($_POST['wd_show_top_social_bare']))
        wd_save_option('wd_show_top_social_bare', esc_attr($_POST['wd_show_top_social_bare']));
      else
        wd_save_option('wd_show_top_social_bare', '');

      if(isset($_POST['wd_box_wrapper']))
        wd_save_option('wd_box_wrapper', esc_attr($_POST['wd_box_wrapper']));
      else
        wd_save_option('wd_box_wrapper', "of");

      if(isset($_POST['wd_show_title']))
        wd_save_option('wd_show_title', esc_attr($_POST['wd_show_title']));
      else
        wd_save_option('wd_show_title', "of");

      if(isset($_POST['wd_menu_in_grid'])) {
        wd_save_option('wd_menu_in_grid', esc_attr($_POST['wd_menu_in_grid'] ));
      } else {
        wd_save_option('wd_menu_in_grid', "off");
      }
      if(isset($_POST['wd_menu_bg_in_grid'])) {
        wd_save_option('wd_menu_bg_in_grid', esc_attr($_POST['wd_menu_bg_in_grid'] ));
      } else {
        wd_save_option('wd_menu_bg_in_grid', "off");
      }


      if(isset($_POST['wd_menu_sticky'])) {
        wd_save_option('wd_menu_sticky', esc_attr($_POST['wd_menu_sticky'] ));
      } else {
        wd_save_option('wd_menu_sticky', "off");
      }
      if(isset($_POST['wd_menu_overlay'])) {
        wd_save_option('wd_menu_overlay', esc_attr($_POST['wd_menu_overlay'] ));
      } else {
        wd_save_option('wd_menu_overlay', "off");
      }
      if(isset($_POST['wd_mini_card_icon'])) {
        wd_save_option('wd_mini_card_icon', esc_attr($_POST['wd_mini_card_icon'] ));
      } else {
        wd_save_option('wd_mini_card_icon', "off");
      }
      if(isset($_POST['wd_search_icon'])) {
        wd_save_option('wd_search_icon', esc_attr($_POST['wd_search_icon'] ));
      } else {
        wd_save_option('wd_search_icon', "off");
      }



      if( isset($_POST['settings']['_wd_logo']) && $_POST['settings']['_wd_logo'] != "" )
        wd_save_option('wd_logo', esc_attr($_POST['settings']['_wd_logo']));

      if( isset($_POST['settings']['_wd_title_bg_image']) && $_POST['settings']['_wd_title_bg_image'] != "" )
        wd_save_option('wd_title_bg_image', esc_attr($_POST['settings']['_wd_title_bg_image']));

    if( isset($_POST['settings']['_wd_footer_bg_image']) && $_POST['settings']['_wd_footer_bg_image'] != "" )
      wd_save_option('wd_footer_bg_image', esc_attr($_POST['settings']['_wd_footer_bg_image']));

      if( isset($_POST['settings']['_wd_bg_404_page']) && $_POST['settings']['_wd_bg_404_page'] != "" )
        wd_save_option('wd_404_page', esc_attr($_POST['settings']['_wd_bg_404_page']));

      if( isset($_POST['settings']['_wd_bg_home_page']) && $_POST['settings']['_wd_bg_home_page'] != "" )
        wd_save_option('wd_home_page', esc_attr($_POST['settings']['_wd_bg_home_page']));




    if ( ! function_exists( 'has_site_icon' ) ) {
      wd_save_option('wd_favicon', esc_attr($_POST['settings']['_wd_favicon']));
    }

      wd_save_option('wd_theme_custom_css', esc_attr($_POST['wd_theme_custom_css']));

      wd_save_option('wrapper_bg_color', esc_attr($_POST['wrapper_bg_color']));

      wd_save_option('primary_color', esc_attr($_POST['primary_color']));
      wd_save_option('secondary_color', esc_attr($_POST['secondary_color']));
      wd_save_option('wd_logo_position', esc_attr($_POST['wd_logo_position']));


      wd_save_option('navigation_bg_color', esc_attr($_POST['navigation_bg_color']));
      wd_save_option('navigation_bg_color_sticky', esc_attr($_POST['navigation_bg_color_sticky']));

      wd_save_option('navigation_border_top_color', esc_attr($_POST['navigation_border_top_color']));
      wd_save_option('navigation_text_color', esc_attr($_POST['navigation_text_color']));



      wd_save_option('top_bar_bg_color', esc_attr($_POST['top_bar_bg_color']));
      wd_save_option('top_bar_text_color', esc_attr($_POST['top_bar_text_color']));



      wd_save_option('footer_bg_color', esc_attr($_POST['footer_bg_color']));
      wd_save_option('footer_text_color', esc_attr($_POST['footer_text_color']));
      wd_save_option('wd_footer_columns', esc_attr($_POST['wd_footer_columns']));

      wd_save_option('wd_copyright', esc_attr($_POST['wd_copyright']));

      wd_save_option('copyright_text_color', esc_attr($_POST['copyright_text_color']));
      wd_save_option('copyright_bg_color', esc_attr($_POST['copyright_bg_color']));


      wd_save_option('twitter', esc_attr($_POST['twitter']));
      wd_save_option('facebook', esc_attr($_POST['facebook']));
      wd_save_option('flickr', esc_attr($_POST['flickr']));
      wd_save_option('vimeo', esc_attr($_POST['vimeo']));

      wd_save_option('phone', esc_attr($_POST['phone']));
      wd_save_option('adress', esc_attr($_POST['adress']));



      wd_save_option('wd_body_font_familly', esc_attr($_POST['wd_body_font_familly']));
      wd_save_option('wd_font-weight-style', esc_attr($_POST['wd_font-weight-style']));
      wd_save_option('wd_main-text-font-subsets', esc_attr($_POST['wd_main-text-font-subsets']));
      wd_save_option('wd_text-transform', esc_attr($_POST['wd_text-transform']));
      wd_save_option('wd_body-font-size', esc_attr($_POST['wd_body-font-size']));


      wd_save_option('wd_head_font_familly', esc_attr($_POST['wd_head_font_familly']));
      wd_save_option('wd_heading-font-weight-style', esc_attr($_POST['wd_heading-font-weight-style']));
      wd_save_option('wd_heading-text-font-subsets', esc_attr($_POST['wd_heading-text-font-subsets']));
      wd_save_option('wd_heading-transform', esc_attr($_POST['wd_heading-transform']));

      wd_save_option('wd_navigation_font_familly', esc_attr($_POST['wd_navigation_font_familly']));
      wd_save_option('wd_navigation-font-weight-style', esc_attr($_POST['wd_navigation-font-weight-style']));
      wd_save_option('wd_navigation-text-font-subsets', esc_attr($_POST['wd_navigation-text-font-subsets']));
      wd_save_option('wd_navigation-transform', esc_attr($_POST['wd_navigation-transform']));
      wd_save_option('wd_navigation-font-size', esc_attr($_POST['wd_navigation-font-size']));

      wd_save_option('wd_menu_style', esc_attr($_POST['wd_menu_style']));

      wd_save_option('wd_general_style', esc_attr($_POST['wd_general_style']));

      wd_save_option('wd_theme_custom_js', esc_attr($_POST['wd_theme_custom_js']));
    } ?>



  <?php if(!empty($_POST)): ?>
    <div id="message" class="updated fade">
      <p> Configuration updated!! </p>
    </div>
  <?php endif;  ?>


  <div class="panel-logo">
          <h2>Webdevia theme options</h2>
      </div>
<div class="wd-cpanel">
  <form id="wd-Panel"  method="POST" action="">
    <div id="tabs" class="ui-tabs-vertical ui-helper-clearfix">
        <ul>
          <li><a href="#tabs-0"><?php echo esc_html__('General Settings', 'bodyguard'); ?></a></li>
          <li><a href="#tabs-1"><?php echo esc_html__('Social Icons', 'bodyguard'); ?></a></li>
          <li><a href="#tabs-header"><?php echo esc_html__('Header Settings', 'bodyguard'); ?></a></li>
          <li><a href="#tabs-menu"><?php echo esc_html__('Menu Settings', 'bodyguard'); ?></a></li>
          <li><a href="#tabs-colors"><?php echo esc_html__('Colors Settings', 'bodyguard'); ?></a></li>
          <li><a href="#tabs-2"><?php echo esc_html__('Fonts Settings', 'bodyguard'); ?></a></li>
          <li><a href="#tabs-3"><?php echo esc_html__('Page 404 Settings', 'bodyguard'); ?></a></li>
          <li><a href="#tabs-4"><?php echo esc_html__('Custom Css & js', 'bodyguard'); ?></a></li>
          <li><a href="#tabs-5"><?php echo esc_html__('Footer settings', 'bodyguard'); ?></a></li>
          <li><a href="#tabs-6"><?php echo esc_html__('Import Demos', 'bodyguard'); ?></a></li>
        </ul>
        <div id="tabs-0">
          <table class="form-table">
            <tbody>
              <tr>
                <td><strong><?php echo esc_html__('Show the site in Boxed Layout:', 'bodyguard'); ?></strong></td>
                <td><input type="checkbox" <?php if(wd_get_option('wd_box_wrapper' , 'of') != 'of') print 'checked'; ?>  name="wd_box_wrapper" value="on" id="wd_box_wrapper" class="cmn-toggle cmn-toggle-round"/>
                <label for="wd_box_wrapper"></label></td>
              </tr>
              <tr>
                <td><strong><?php echo esc_html__('General style:', 'bodyguard'); ?></strong></td>
                <td>
                <?php $wd_general_style = wd_get_option('wd_general_style' , 'dark');
                ?>
                  <select name="wd_general_style">
                    <option value="dark" <?php if($wd_general_style == "dark") echo "selected"; ?>>Dark</option>
                    <option value="white" <?php if($wd_general_style == "white") echo "selected"; ?>>White</option>
                  </select>
                </td>
              </tr>
              <tr>
                <td><strong><?php echo esc_html__('Menu style:', 'bodyguard'); ?></strong></td>
                <td>
                <?php $wd_menu_style = wd_get_option('wd_menu_style' , 'creative');
                ?>
                  <select name="wd_menu_style">
                    <!-- <option value="nav-layout-metro" <?php //if($wd_menu_style == "nav-layout-metro") echo "selected"; ?>>Metro</option> -->
                    <option value="corporate" <?php if($wd_menu_style == "corporate") echo "selected"; ?>>Corporate</option>
                    <option value="creative" <?php if($wd_menu_style == "creative") echo "selected"; ?>>Creative</option>
                    <!-- <option value="modern" <?php //if($wd_menu_style == "modern") echo "selected"; ?>>Modern</option> -->
                    <!-- <option value="offcanvas" <?php //if($wd_menu_style == "offcanvas") echo "selected"; ?>>Offcanvas</option> -->
                    <!-- <option value="left_menu" <?php //if($wd_menu_style == "left_menu") echo "selected"; ?>>Left Menu</option> -->
                  </select>
                </td>
              </tr>
              <tr>
                <td><strong><?php echo esc_html__('Background image:', 'bodyguard'); ?></strong></td>
                <td><input type="text" name="settings[_wd_bg_home_page]" id="wd_home_page_filed" value="<?php echo wd_get_option('wd_home_page','') ?>"/>
                  <input class="button" name="bg_home_page" id="wd_bg_home_page" value="Upload" /></td>
                  <td>
              <input type="button" value="Delete" class="button" onclick="wd_home_page_filed.value=''" />
            </td>
              </tr>


              <tr>
                  <td><strong><?php echo esc_html__('Default Title Bar background image', 'bodyguard'); ?></strong></td>
                  <td>
                  <input type="text" name="settings[_wd_title_bg_image]" id="wd_title_bg_filed" />
                  <input class="button" name="_unique_title_bg_button" id="wd_title_bg_btn" value="Upload" /></br>
                  </td>
                    <td>
                    <?php $wd_title_bg_image = wd_get_option('wd_title_bg_image','');
                        if(!empty($wd_title_bg_image)): ?>
                          <img src="<?php print $wd_title_bg_image; ?>" style="max-height: 70px;" />
                        <?php endif; ?>
                    </td>
              </tr>






              <tr>
                <td>
                  <strong><?php echo esc_html__('Menu Overlay', 'bodyguard'); ?></strong>
                </td>
                <td>
                  <input type="checkbox" <?php if(wd_get_option('wd_menu_overlay','off') != 'off') print 'checked'; ?>  name="wd_menu_overlay" value="on" id="wd_menu_overlay" class="cmn-toggle cmn-toggle-round"/>
                  <label for="wd_menu_overlay"></label>
                </td>
              </tr>


            </tbody>
          </table>
        </div>
        <div id="tabs-1">
            <table class="form-table">
              <tbody>
                <tr>
                  <td><strong><?php echo esc_html__('Show Top bare', 'bodyguard'); ?></strong></td>
                  <td>
                  <input type="checkbox" <?php if(wd_get_option('wd_show_top_social_bare','on') == 'on') print 'checked'; ?>  name="wd_show_top_social_bare" value="on" id="wd_show_top_social_bare" class="checkbox_social cmn-toggle cmn-toggle-round"/>
                  <label for="wd_show_top_social_bare"></label></td>
                </tr>
                <tr class="social_link" <?php if(wd_get_option('wd_show_top_social_bare','off') != "on") : ?> style ="display: none" <?php endif ?>>
                  <td>
                    <strong>Twitter</strong></td>
                  <td>http://twitter.com/<input type="text" name="twitter" placeholder="Your twitter profile link" value="<?php echo wd_get_option('twitter', ''); ?>"></td>
                </tr>

                <tr class="social_link" <?php if(wd_get_option('wd_show_top_social_bare','off') != "on") : ?> style ="display: none" <?php endif ?>>
                  <td>
                    <strong>Facebook</strong></td>
                  <td>http://facebook.com/<input type="text" name="facebook" placeholder="Your Facebook page link" value="<?php echo wd_get_option('facebook', ''); ?>"></td>
                </tr>
                <tr class="social_link" <?php if(wd_get_option('wd_show_top_social_bare', 'off') != "on") : ?> style ="display: none" <?php endif ?>>
                  <td>
                    <strong>Flickr</strong></td>
                  <td>http://flicker.com/<input type="text" name="flickr" placeholder="Your Flickr page link" value="<?php echo wd_get_option('flickr', ''); ?>"></td>
                </tr>
                <tr class="social_link" <?php if(wd_get_option('wd_show_top_social_bare','off') != "on") : ?> style ="display: none" <?php endif ?>>
                  <td>
                    <strong>vimeo</strong></td>
                  <td>http://vimeo.com/<input type="text" name="vimeo" placeholder="Your vimeo link" value="<?php echo wd_get_option('vimeo',''); ?>"></td>
                </tr>
                <tr class="social_link" <?php if(wd_get_option('wd_show_top_social_bare','off') != "on") : ?> style ="display: none" <?php endif ?>>
                  <td>
                    <strong>Phone</strong></td>
                  <td><input type="text" name="phone" placeholder="Your Phone number" value="<?php echo wd_get_option('phone',''); ?>"></td>
                </tr>
                <tr class="social_link" <?php if(wd_get_option('wd_show_top_social_bare','off') != "on") : ?> style ="display: none" <?php endif ?>>
                  <td>
                    <strong>Adress</strong></td>
                  <td><input type="text" name="adress" placeholder="Your Adress" value="<?php echo wd_get_option('adress',''); ?>"></td>
                </tr>

              </tbody>
            </table>
        </div>
        <div id="tabs-colors">
          <table class="form-table">
            <tbody>
              <tr>
                <td><strong><?php echo esc_html__('Primary Color:', 'bodyguard'); ?></strong></td>
                <td class='wd-color-picker'><?php $primary_color = wd_get_option('primary_color','#F17A20'); ?>
                <input name="primary_color" type="text" value="<?php print $primary_color; ?>" data-default-color="#C0392B">
                <span class="input-group-addon"><i></i></span>
                </td>
              </tr>
              <tr>
                <td><strong><?php echo esc_html__('Secondary color:', 'bodyguard'); ?></strong></td>
                <td class='wd-color-picker'><?php $secondary_color = wd_get_option('secondary_color','#C0392B'); ?>
                <input name="secondary_color" type="text" value="<?php print $secondary_color; ?>"  data-default-color="#C0392B">
                <span class="input-group-addon"><i></i></span>
                </td>
              </tr>
              <tr>
                <td><strong><?php echo esc_html__('Background Color:', 'bodyguard'); ?></strong></td>
                <td class='wd-color-picker'><?php $wrapper_bg_color = wd_get_option('wrapper_bg_color', '#C0392B'); ?>
                <input name="wrapper_bg_color" type="text" value="<?php print $wrapper_bg_color; ?>"  data-default-color="#C0392B">
                <span class="input-group-addon"><i></i></span>
                </td>
              </tr>
              <tr>
                <td>
                  <strong><?php echo esc_html__('copyright background color', 'bodyguard'); ?></strong>
                </td>
                <td class="wd-color-picker"><?php $copyright_bg_color = wd_get_option('copyright_bg_color','#1D1B1B'); ?>
                <input name="copyright_bg_color" type="text" value="<?php print $copyright_bg_color; ?>"  data-default-color="#1D1B1B">
                <span class="input-group-addon"><i></i></span>
                </td>
              </tr>
               <tr>
                <td>
                  <strong><?php echo esc_html__('copyright text color', 'bodyguard'); ?></strong>
                </td>
                <td class="wd-color-picker"><?php $copyright_text_color = wd_get_option('copyright_text_color','#fff'); ?>
                <input name="copyright_text_color" type="text" value="<?php print $copyright_text_color; ?>"  data-default-color="#fff">
                <span class="input-group-addon"><i></i></span>
                </td>
              </tr>
              <tr>
                <td>
                  <strong><?php echo esc_html__('Footer background color', 'bodyguard'); ?></strong>
                </td>
                <td class='wd-color-picker'><?php $footer_bg_color = wd_get_option('footer_bg_color', '#C0392B'); ?>
                <input name="footer_bg_color" type="text" value="<?php print $footer_bg_color; ?>"  data-default-color="#C0392B">
                <span class="input-group-addon"><i></i></span>
                </td>
              </tr>
              <tr>
                <td>
                  <strong><?php echo esc_html__('Footer text color', 'bodyguard'); ?></strong>
                </td>
                <td class='wd-color-picker'><?php $footer_text_color = wd_get_option('footer_text_color', '#C0392B'); ?>
                <input name="footer_text_color" type="text" value="<?php print $footer_text_color; ?>"  data-default-color="#C0392B">
                <span class="input-group-addon"><i></i></span>
                </td>
              </tr>
              <tr>
                <td>
                  <strong><?php echo esc_html__('Navigation background color', 'bodyguard'); ?></strong>
                </td>
                <td class='wd-color-picker'><?php $navigation_bg_color = wd_get_option('navigation_bg_color', '#C0392B'); ?>
                <input name="navigation_bg_color" type="text" value="<?php print $navigation_bg_color; ?>"  data-default-color="#C0392B">
                <span class="input-group-addon"><i></i></span>
                </td>
              </tr>
              <tr>
                <td>
                  <strong><?php echo esc_html__('Navigation (sticky) background color', 'bodyguard'); ?></strong>
                </td>
                <td class='wd-color-picker'><?php $navigation_bg_color_sticky = wd_get_option('navigation_bg_color_sticky','off'); ?>
                <input name="navigation_bg_color_sticky" type="text" value="<?php print $navigation_bg_color_sticky; ?>"  data-default-color="#C0392B">
                <span class="input-group-addon"><i></i></span>
                </td>
              </tr>

              <tr>
                <td>
                  <strong><?php echo esc_html__('Navigation border-top color', 'bodyguard'); ?></strong>
                </td>
                <td class='wd-color-picker'><?php $navigation_border_top_color = wd_get_option('navigation_border_top_color', '#C0392B'); ?>
                <input name="navigation_border_top_color" type="text" value="<?php print $navigation_border_top_color; ?>"  data-default-color="#C0392B">
                <span class="input-group-addon"><i></i></span>
                </td>
              </tr>
              <tr>
                <td>
                  <strong><?php echo esc_html__('Navigation Text Color', 'bodyguard'); ?></strong>
                </td>
                <td  class='wd-color-picker'><?php $navigation_text_color = wd_get_option('navigation_text_color', '#C0392B'); ?>
                <input name="navigation_text_color" type="text" value="<?php print $navigation_text_color; ?>"  data-default-color="#C0392B">
                <span class="input-group-addon"><i></i></span>
                </td>
              </tr>
              <tr>
                <td>
                  <strong><?php echo esc_html__('Top bar Text Color', 'bodyguard'); ?></strong>
                </td>
                <td class='wd-color-picker'><?php $top_bar_text_color = wd_get_option('top_bar_text_color', '#C0392B'); ?>
                <input name="top_bar_text_color" type="text" value="<?php print $top_bar_text_color; ?>"  data-default-color="#C0392B">
                <span class="input-group-addon"><i></i></span>
                </td>
              </tr>
              <tr>
                <td>
                  <strong><?php echo esc_html__('Top bar Background Color', 'bodyguard'); ?></strong>
                </td>
                <td class='wd-color-picker'><?php $top_bar_bg_color = wd_get_option('top_bar_bg_color', '#C0392B'); ?>
                <input name="top_bar_bg_color" type="text" value="<?php print $top_bar_bg_color; ?>"  data-default-color="#C0392B">
                <span class="input-group-addon"><i></i></span>
                </td>
              </tr>

            </tbody>
          </table>
        </div>
        <div id="tabs-2">
         <table class="form-table">
          <tbody>
            <tr>
              <td>
                <strong><?php echo esc_html__('Main text font', 'bodyguard'); ?></strong>
              </td>
              <td>
                <?php $wd_body_font_familly = wd_get_option('wd_body_font_familly' ,'Open Sans');
                $fontArray = array('Abel','Abril Fatface','Aclonica','Actor','Adamina','Aguafina Script','Aladin','Aldrich','Alice','Alike Angular','Alike','Allan','Allerta Stencil','Allerta','Amaranth','Amatic SC','Andada','Andika','Annie Use Your Telescope','Anonymous Pro','Antic','Anton','Arapey','Architects Daughter','Arimo','Artifika','Arvo','Asset','Astloch','Atomic Age','Aubrey','Bangers','Bentham','Bevan','Bigshot One','Bitter','Black Ops One','Bowlby One SC','Bowlby One','Brawler','Bubblegum Sans','Buda','Butcherman Caps','Cabin Condensed','Cabin Sketch','Cabin','Cagliostro','Calligraffitti','Candal','Cantarell','Cardo','Carme','Carter One','Caudex','Cedarville Cursive','Changa One','Cherry Cream Soda','Chewy','Chicle','Chivo','Coda Caption','Coda','Comfortaa','Coming Soon','Contrail One','Convergence','Cookie','Copse','Corben','Cousine','Coustard','Covered By Your Grace','Crafty Girls','Creepster Caps','Crimson Text','Crushed','Cuprum','Damion','Dancing Script','Dawning of a New Day','Days One','Delius Swash Caps','Delius Unicase','Delius','Devonshire','Didact Gothic','Dorsa','Dr Sugiyama','Droid Sans Mono','Droid Sans','Droid Serif','EB Garamond','Eater Caps','Expletus Sans','Fanwood Text','Federant','Federo','Fjord One','Fondamento','Fontdiner Swanky','Forum','Francois One','Gentium Basic','Gentium Book Basic','Geo','Geostar Fill','Geostar','Give You Glory','Gloria Hallelujah','Goblin One','Gochi Hand','Goudy Bookletter 1911','Gravitas One','Gruppo','Hammersmith One','Herr Von Muellerhoff','Holtwood One SC','Homemade Apple','IM Fell DW Pica SC','IM Fell DW Pica','IM Fell Double Pica SC','IM Fell Double Pica','IM Fell English SC','IM Fell English','IM Fell French Canon SC','IM Fell French Canon','IM Fell Great Primer SC','IM Fell Great Primer','Iceland','Inconsolata','Indie Flower','Irish Grover','Istok Web','Jockey One','Josefin Sans','Josefin Slab','Judson','Julee','Jura','Just Another Hand','Just Me Again Down Here','Kameron','Kelly Slab','Kenia','Knewave','Kranky','Kreon','Kristi','La Belle Aurore','Lancelot','Lato','League Script','Leckerli One','Lekton','Lemon','Limelight','Linden Hill','Lobster Two','Lobster','Lora','Love Ya Like A Sister','Loved by the King','Luckiest Guy','Maiden Orange','Mako','Marck Script','Marvel','Mate SC','Mate','Maven Pro','Meddon','MedievalSharp','Megrim','Merienda One','Merriweather','Metrophobic','Michroma','Miltonian Tattoo','Miltonian','Miss Fajardose','Miss Saint Delafield','Modern Antiqua','Molengo','Monofett','Monoton','Monsieur La Doulaise','Montez','Mountains of Christmas','Mr Bedford','Mr Dafoe','Mr De Haviland','Mrs Sheppards','Muli','Neucha','Neuton','News Cycle','Niconne','Nixie One','Nobile','Nosifer Caps','Nothing You Could Do','Nova Cut','Nova Flat','Nova Mono','Nova Oval','Nova Round','Nova Script','Nova Slim','Nova Square','Numans','Nunito','Old Standard TT','Open Sans Condensed','Open Sans','Orbitron','Oswald','Over the Rainbow','Ovo','PT Sans Caption','PT Sans Narrow','PT Sans','PT Serif Caption','PT Serif','Pacifico','Passero One','Patrick Hand','Paytone One','Permanent Marker','Petrona','Philosopher','Piedra','Pinyon Script','Play','Playfair Display','Podkova','Poller One','Poly','Pompiere','Prata','Prociono','Puritan','Quattrocento Sans','Quattrocento','Questrial','Quicksand','Radley','Raleway','Rammetto One','Rancho','Rationale','Redressed','Reenie Beanie','Ribeye Marrow','Ribeye','Righteous','Rochester','Rock Salt','Rokkitt','Rosario','Ruslan Display','Salsa','Sancreek','Sansita One','Satisfy','Schoolbell','Shadows Into Light','Shanti','Short Stack','Sigmar One','Signika Negative','Signika','Six Caps','Slackey','Smokum','Smythe','Sniglet','Snippet','Sorts Mill Goudy','Special Elite','Spinnaker','Spirax','Stardos Stencil','Sue Ellen Francisco','Sunshiney','Supermercado One','Swanky and Moo Moo','Syncopate','Tangerine','Tenor Sans','Terminal Dosis','The Girl Next Door','Tienne','Tinos','Tulpen One','Ubuntu Condensed','Ubuntu Mono','Ubuntu','Ultra','UnifrakturCook','UnifrakturMaguntia','Unkempt','Unlock','Unna','VT323','Varela Round','Varela','Vast Shadow','Vibur','Vidaloka','Volkhov','Vollkorn','Voltaire','Waiting for the Sunrise','Wallpoet','Walter Turncoat','Wire One','Yanone Kaffeesatz','Yellowtail','Yeseva One','Zeyada','Montserrat');
                ?>
                <table>
                  <tbody>
                    <tr>
                      <td>
                        <label for="wd_body_font_familly">Font family :</label>
                      </td>
                      <td>
                        <select name="wd_body_font_familly" id="wd_body_font_familly" class="font_familly">
                          <option value="default">Default</option>
                          <?php foreach ( $fontArray as $pititablo){
                            $font_name=$pititablo;
                            ?>
                          <option value="<?php echo esc_attr($pititablo) ?>" <?php if(wd_get_option('wd_body_font_familly' ,'Open Sans')== $font_name) echo "selected='selected'" ?> ><?php echo esc_attr($pititablo) ?></option>
                         <?php } ?>
                        </select>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <label for="wd_font-weight-style">Font weight and style :</label>
                      </td>
                      <td>
                        <select name="wd_font-weight-style" id="wd_font-weight-style" class="font_weight">
                          <option value="400" <?php if (wd_get_option('wd_font-weight-style' ,'400') == 400) {
                            echo 'selected';
                          } ?>>Normal 400</option>
                          <option value="300" <?php if (wd_get_option('wd_font-weight-style' ,'300') == 300) {
                            echo 'selected';
                          } ?>>Light 300</option>
                          <option value="600" <?php if (wd_get_option('wd_font-weight-style' ,'600') == 600) {
                            echo 'selected';
                          } ?>>Semi-bold 600</option>
                          <option value="700" <?php if (wd_get_option('wd_font-weight-style','700') == 700) {
                            echo 'selected';
                          } ?>>Bold 700</option>
                          <option value="800" <?php if (wd_get_option('wd_font-weight-style','800') == 800) {
                            echo 'selected';
                          } ?>>Extra-Bold 800</option>
                        </select>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <label for="wd_text-transform">Text Transform :</label>
                      </td>
                      <td>
                        <select name="wd_text-transform" id="wd_text-transform" class="text_transform">
                          <option value="none" <?php if (wd_get_option('wd_text-transform', 'none') == 'none') {
                            echo 'selected';
                          } ?>>Normal</option>
                          <option value="uppercase" <?php if (wd_get_option('wd_text-transform', 'none') == 'uppercase') {
                            echo 'selected';
                          } ?>>UPPERCASE</option>
                          <option value="lowercase" <?php if (wd_get_option('wd_text-transform', 'none') == 'lowercase') {
                            echo 'selected';
                          } ?>>lowercase</option>
                        </select>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <label for="wd_body-font-size">Font size :</label>
                      </td>
                      <td>
                      <?php $wd_body_font_size = wd_get_option('wd_body-font-size', '14');
                        $fontsizeArray = array('12','14','13','15','16','17','18','19','20','22','24','26','28','30','32','34','36','38','40');
                      ?>
                        <select name="wd_body-font-size" id="wd_body-font-size" class="text_size">
                          <option value="default">Default</option>
                          <?php foreach ( $fontsizeArray as $font_size_item){
                            $font_size = $font_size_item;
                            ?>
                            <option value="<?php echo esc_attr($font_size_item) ?>" <?php if(wd_get_option('wd_body-font-size','14')== $font_size) echo "selected='selected'" ?> ><?php echo esc_attr($font_size_item) ?></option>
                         <?php } ?>
                        </select>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <label for="wd_main-text-font-subsets">Font subsets :</label>
                      </td>
                      <td>
                        <select id="wd_main-text-font-subsets" name="wd_main-text-font-subsets" class="font_subsets">
                          <option value="latin"<?php if (wd_get_option('wd_navigation-text-font-subsets', 'latin') == 'latin'){
                        echo "selected";
                        } ?>>Latin</option>
                      <option value="cyrillic-ext"<?php if (wd_get_option('wd_navigation-text-font-subsets', 'latin') == 'cyrillic-ext'){
                        echo "selected";
                        } ?>>Cyrillic Extended</option>
                      <option value="greek-ext"<?php if (wd_get_option('wd_navigation-text-font-subsets', 'latin') == 'greek-ext'){
                        echo "selected";
                        } ?>>Greek Extended</option>
                      <option value="greek"<?php if (wd_get_option('wd_navigation-text-font-subsets', 'latin') == 'greek'){
                        echo "selected";
                        } ?>>Greek</option>
                      <option value="vietnamese"<?php if (wd_get_option('wd_navigation-text-font-subsets', 'latin') == 'vietnamese'){
                        echo "selected";
                        } ?>>Vietnamese</option>
                      <option value="latin-ext"<?php if (wd_get_option('wd_navigation-text-font-subsets', 'latin') == 'latin-ext'){
                        echo "selected";
                        } ?>>Latin Extended</option>
                      <option value="cyrillic"<?php if (wd_get_option('wd_navigation-text-font-subsets', 'latin') == 'cyrillic'){
                        echo "selected";
                        } ?>>Cyrillic</option>
                        </select>
                        <br>
                        <p class="body_font_result" style="font-family: '<?php echo wd_get_option('wd_body_font_familly' ,'Open Sans'); ?>'; font-weight: <?php wd_get_option('wd_font-weight-style','400'); ?>;">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                        consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                        cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                        proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </td>
            </tr>
            <tr>
            <td>
              <strong><?php echo esc_html__('Head font family', 'bodyguard'); ?></strong>
            </td>
            <td>
            <table>
              <tbody>
                <tr>
                  <td>
                    <label for="wd_head_font_familly">Font family :</label>
                  </td>
                  <td>
                    <select name="wd_head_font_familly" id="wd_head_font_familly" class="font_familly">
                      <option value="default">Default</option>
                      <?php
                      $wd_head_font_familly = wd_get_option('wd_head_font_familly' ,'Open Sans');
                       foreach ( $fontArray as $pititablo){
                        $font_name=$pititablo;?>

                      <option value="<?php echo esc_attr($font_name) ?>" <?php if(wd_get_option('wd_head_font_familly' ,'Open Sans')== $font_name) echo "selected='selected'" ?> ><?php echo esc_attr($font_name) ?></option>
                     <?php } ?>
                    </select>
                  </td>
                </tr>
                <tr>
                  <td>
                    <label for="wd_heading-font-weight-style">Font weight and style :</label>
                  </td>
                  <td>
                    <select name="wd_heading-font-weight-style" id="wd_heading-font-weight-style" class="font_weight">
                      <option value="400" <?php if (wd_get_option('wd_heading-font-weight-style','400') == 400) {
                            echo 'selected';
                          } ?>>Normal 400</option>
                          <option value="300" <?php if (wd_get_option('wd_heading-font-weight-style','400') == 300) {
                            echo 'selected';
                          } ?>>Light 300</option>
                          <option value="600" <?php if (wd_get_option('wd_heading-font-weight-style','400') == 600) {
                            echo 'selected';
                          } ?>>Semi-bold 600</option>
                          <option value="700" <?php if (wd_get_option('wd_heading-font-weight-style','400') == 700) {
                            echo 'selected';
                          } ?>>Bold 700</option>
                          <option value="800" <?php if (wd_get_option('wd_heading-font-weight-style','400') == 800) {
                            echo 'selected';
                          } ?>>Extra-Bold 800</option>
                    </select>
                  </td>
                </tr>
                <tr>
                  <td>
                    <label for="wd_heading-transform">Text Transform :</label>
                  </td>
                  <td>
                    <select name="wd_heading-transform" id="wd_heading-transform" class="text_transform">
                      <option value="none" <?php if (wd_get_option('wd_text-transform', 'none') == 'none') {
                        echo 'selected';
                      } ?>>Normal</option>
                      <option value="uppercase" <?php if (wd_get_option('wd_text-transform', 'none') == 'uppercase') {
                        echo 'selected';
                      } ?>>UPPERCASE</option>
                      <option value="lowercase" <?php if (wd_get_option('wd_text-transform', 'none') == 'lowercase') {
                        echo 'selected';
                      } ?>>lowercase</option>
                    </select>
                  </td>
                </tr>
                <tr>
                  <td>
                    <label for="wd_heading-text-font-subsets">Font subsets :</label>
                  </td>
                  <td>
                    <select id="wd_heading-text-font-subsets" name="wd_heading-text-font-subsets" class="font_subsets">
                      <option value="latin"<?php if (wd_get_option('wd_navigation-text-font-subsets', 'latin') == 'latin'){
                        echo "selected";
                        } ?>>Latin</option>
                      <option value="cyrillic-ext"<?php if (wd_get_option('wd_navigation-text-font-subsets', 'latin') == 'cyrillic-ext'){
                        echo "selected";
                        } ?>>Cyrillic Extended</option>
                      <option value="greek-ext"<?php if (wd_get_option('wd_navigation-text-font-subsets', 'latin') == 'greek-ext'){
                        echo "selected";
                        } ?>>Greek Extended</option>
                      <option value="greek"<?php if (wd_get_option('wd_navigation-text-font-subsets', 'latin') == 'greek'){
                        echo "selected";
                        } ?>>Greek</option>
                      <option value="vietnamese"<?php if (wd_get_option('wd_navigation-text-font-subsets', 'latin') == 'vietnamese'){
                        echo "selected";
                        } ?>>Vietnamese</option>
                      <option value="latin-ext"<?php if (wd_get_option('wd_navigation-text-font-subsets', 'latin') == 'latin-ext'){
                        echo "selected";
                        } ?>>Latin Extended</option>
                      <option value="cyrillic"<?php if (wd_get_option('wd_navigation-text-font-subsets', 'latin') == 'cyrillic'){
                        echo "selected";
                        } ?>>Cyrillic</option>
                    </select>
                    <h2 class="heading_font_result" style="font-family: '<?php echo wd_get_option('wd_head_font_familly' ,'Open Sans'); ?>'; font-weight: <?php wd_get_option('wd_heading-font-weight-style','400'); ?>;">Lorem ipsum dolor sit amet, consectetur adipisicing elit</h2>
                  </td>
                </tr>
              </tbody>
            </table>
            </td>
          </tr>
          <tr>
            <td>
              <strong><?php echo esc_html__('Navigation font family', 'bodyguard'); ?></strong>
            </td>
            <td>
            <table>
              <tbody>
                <tr>
                  <td>
                    <label for="wd_navigation_font_familly">Font family :</label>
                  </td>
                  <td>
                    <select name="wd_navigation_font_familly" id="wd_navigation_font_familly" class="font_familly">
                    <option value="default">Default</option>
                      <?php
                      $wd_navigation_font_familly = wd_get_option('wd_navigation_font_familly' ,'Open Sans');
                       foreach ( $fontArray as $pititablo){
                        $font_name=$pititablo;?>

                      <option value="<?php echo esc_attr($font_name) ?>" <?php if(wd_get_option('wd_navigation_font_familly' ,'Open Sans')== $font_name) echo "selected='selected'" ?> ><?php echo esc_attr($font_name) ?></option>
                     <?php } ?>
                    </select>
                  </td>
                </tr>
                <tr>
                  <td>
                    <label for="wd_navigation-font-weight-style">Font weight and style :</label>
                  </td>
                  <td>
                    <select name="wd_navigation-font-weight-style" id="wd_navigation-font-weight-style" class="font_weight">
                      <option value="400" <?php if (wd_get_option('wd_navigation-font-weight-style','400') == 400) {
                            echo 'selected';
                          } ?>>Normal 400</option>
                          <option value="300" <?php if (wd_get_option('wd_navigation-font-weight-style','400') == 300) {
                            echo 'selected';
                          } ?>>Light 300</option>
                          <option value="600" <?php if (wd_get_option('wd_navigation-font-weight-style','400') == 600) {
                            echo 'selected';
                          } ?>>Semi-bold 600</option>
                          <option value="700" <?php if (wd_get_option('wd_navigation-font-weight-style','400') == 700) {
                            echo 'selected';
                          } ?>>Bold 700</option>
                          <option value="800" <?php if (wd_get_option('wd_navigation-font-weight-style','400') == 800) {
                            echo 'selected';
                          } ?>>Extra-Bold 800</option>
                    </select>
                  </td>
                </tr>
                <tr>
                  <td>
                    <label for="wd_navigation-transform">Text Transform :</label>
                  </td>
                  <td>
                    <select name="wd_navigation-transform" id="wd_navigation-transform" class="text_transform">
                      <option value="none" <?php if (wd_get_option('wd_text-transform', 'none') == 'none') {
                        echo 'selected';
                      } ?>>Normal</option>
                      <option value="uppercase" <?php if (wd_get_option('wd_text-transform', 'none') == 'uppercase') {
                        echo 'selected';
                      } ?>>UPPERCASE</option>
                      <option value="lowercase" <?php if (wd_get_option('wd_text-transform', 'none') == 'lowercase') {
                        echo 'selected';
                      } ?>>lowercase</option>
                    </select>
                  </td>
                </tr>
                <tr>
                  <td>
                    <label for="wd_navigation-font-size">Font size :</label>
                  </td>
                  <td>
                  <?php $wd_body_font_size = wd_get_option('wd_navigation-font-size','14');
                  ?>
                    <select name="wd_navigation-font-size" id="wd_navigation-font-size" class="text_size">
                      <option value="default">Default</option>
                      <?php foreach ( $fontsizeArray as $font_size_item){
                        $font_size = $font_size_item;
                        ?>
                        <option value="<?php echo esc_attr($font_size_item) ?>" <?php if(wd_get_option('wd_navigation-font-size','14')== $font_size) echo "selected='selected'" ?> ><?php echo esc_attr($font_size_item) ?></option>
                     <?php } ?>
                    </select>
                  </td>
                </tr>
                <tr>
                  <td>
                    <label for="wd_navigation-text-font-subsets">Font subsets :</label>
                  </td>
                  <td>
                    <select id="wd_navigation-text-font-subsets" name="wd_navigation-text-font-subsets" class="font_subsets">
                      <option value="latin"<?php if (wd_get_option('wd_navigation-text-font-subsets', 'latin') == 'latin'){
                        echo "selected";
                        } ?>>Latin</option>
                      <option value="cyrillic-ext"<?php if (wd_get_option('wd_navigation-text-font-subsets', 'latin') == 'cyrillic-ext'){
                        echo "selected";
                        } ?>>Cyrillic Extended</option>
                      <option value="greek-ext"<?php if (wd_get_option('wd_navigation-text-font-subsets', 'latin') == 'greek-ext'){
                        echo "selected";
                        } ?>>Greek Extended</option>
                      <option value="greek"<?php if (wd_get_option('wd_navigation-text-font-subsets', 'latin') == 'greek'){
                        echo "selected";
                        } ?>>Greek</option>
                      <option value="vietnamese"<?php if (wd_get_option('wd_navigation-text-font-subsets', 'latin') == 'vietnamese'){
                        echo "selected";
                        } ?>>Vietnamese</option>
                      <option value="latin-ext"<?php if (wd_get_option('wd_navigation-text-font-subsets', 'latin') == 'latin-ext'){
                        echo "selected";
                        } ?>>Latin Extended</option>
                      <option value="cyrillic"<?php if (wd_get_option('wd_navigation-text-font-subsets', 'latin') == 'cyrillic'){
                        echo "selected";
                        } ?>>Cyrillic</option>
                    </select>
                    <ul class="navigation-list" style="font-family: '<?php echo wd_get_option('wd_navigation_font_familly' ,'Open Sans'); ?>'; font-weight: <?php wd_get_option('wd_navigation-font-weight-style','400'); ?>;">
                      <li>Home</li>
                      <li>About</li>
                      <li>Services</li>
                    </ul>
                  </td>
                </tr>
              </tbody>
            </table>
            </td>
          </tr>

          </tbody>
          </table>
        </div>
        <div id="tabs-header">
            <table class="form-table">
              <tbody>
                <tr>
                  <td>
                    <strong><?php echo esc_html__('Show Website Title', 'bodyguard'); ?></strong>
                  </td>
                  <td>
                    <input type="checkbox" <?php if(wd_get_option('wd_show_title','of') != 'of') print 'checked'; ?>  name="wd_show_title" value="on" id="wd_show_title" class="cmn-toggle cmn-toggle-round"/>
                    <label for="wd_show_title"></label>
                  </td>
                </tr>
                <tr>
                      <td>
                        <strong><?php echo esc_html__('Show Search Icon', 'bodyguard'); ?></strong>
                      </td>
                      <td>
                        <input type="checkbox" <?php if(wd_get_option('wd_search_icon', 'on') != 'off') print 'checked'; ?>  name="wd_search_icon" value="on" id="wd_search_icon" class="cmn-toggle cmn-toggle-round"/>
                        <label for="wd_search_icon"></label>
                      </td>
                    </tr>
                    <tr>
                    <td>
                      <strong><?php echo esc_html__('Show mini Card Icon', 'bodyguard'); ?></strong>
                    </td>
                    <td>
                      <input type="checkbox" <?php if(wd_get_option('wd_mini_card_icon', 'off') != 'off') print 'checked'; ?>  name="wd_mini_card_icon" value="on" id="wd_mini_card_icon" class="cmn-toggle cmn-toggle-round"/>
                      <label for="wd_mini_card_icon"></label>
                    </td>
                  </tr>
                    <tr>
                        <td><strong><?php echo esc_html__('Show The Logo', 'bodyguard'); ?></strong></td>
                        <td>
                        <input type="checkbox" <?php if(wd_get_option('wd_show_logo','on') == 'on') print 'checked'; ?>  name="wd_show_logo" value="on" id="wd_show_logo" class="chekbox_logo cmn-toggle cmn-toggle-round"/>
                        <label for="wd_show_logo"></label></td>
                   </tr>
                   <tr  class="path_logo" <?php if(wd_get_option('wd_show_logo','on') != "on") : ?> style ="display: none" <?php endif ?>>
                        <td><strong><?php echo esc_html__('Logo link', 'bodyguard'); ?></strong></td>
                        <td>
                        <input type="text" name="settings[_wd_logo]" id="wd_logo_filed" />
                        <input class="button" name="_unique_name_button" id="wd_upload_btn" value="Upload" /></br>
                        </td>
                      <td> <?php
                      $default_logo = get_template_directory_uri().'/images/logo-2.png';
                      $wd_logo = wd_get_option('wd_logo',$default_logo);
                      if(!empty($wd_logo)): ?> <img src="<?php print $wd_logo; ?>" style="max-height: 70px;" /> <?php endif;  ?></td>
                   </tr>
                    <tr>
                        <td><strong><?php echo esc_html__('Logo & menu Position', 'bodyguard'); ?></strong></td>
                        <td class="logo_position">
                            <?php $logo_position = wd_get_option('wd_logo_position', 'logo_top') ?>
                            <input type="radio" id="wd_position1" name="wd_logo_position" value="logo_left" <?php if($logo_position == 'logo_left') { echo 'checked'; }  ?> />
                            <label for="wd_position1" class="wd_position1 <?php if($logo_position == 'logo_left') { echo 'label_selected'; }  ?>"></label>

                            <input type="radio" id="wd_position2" name="wd_logo_position" value="logo_right" <?php if($logo_position == 'logo_right') { echo 'checked'; }  ?> />
                            <label for="wd_position2" class="wd_position2 <?php if($logo_position == 'logo_right') { echo 'label_selected'; }  ?>"></label>

                            <input type="radio" id="wd_position3" name="wd_logo_position" value="logo_top_center" <?php if($logo_position == 'logo_top_center') { echo 'checked'; }  ?> />
                            <label for="wd_position3" class="wd_position3 <?php if($logo_position == 'logo_top_center') { echo 'label_selected'; }  ?>"></label>

                            <input type="radio" id="wd_position4" name="wd_logo_position" value="logo_top" <?php if($logo_position == 'logo_top') { echo 'checked'; }  ?> />
                            <label for="wd_position4" class="wd_position4 <?php if($logo_position == 'logo_top') { echo 'label_selected'; }  ?>"></label>
                        </td>
                    </tr>
                    <?php if ( ! function_exists( 'has_site_icon' ) ) { ?>
                    <tr>
                      <td><strong><?php echo esc_html__('Favicon link', 'bodyguard'); ?></strong></td>
                      <td>
                        <input type="text" name="settings[_wd_favicon]" id="wd_favicon_filed" />
                        <input class="button" name="_unique_name_favicon" id="wd_upload_favicon" value="Upload" />
                      </td>
                      <td> <?php
                      $wd_favicon = wd_get_option('wd_favicon','');
                      if(!empty($wd_favicon)): ?> <img src="<?php print $wd_favicon; ?>" style="max-height: 30px;" /> <?php endif;  ?></td>
                    </tr>
                    <?php } ?>
              </tbody>
            </table>
        </div>
        <div id="tabs-menu">
            <table class="form-table">
              <tbody>
                <tr>
                <td>
                  <strong><?php echo esc_html__('Show The Menu in the grid', 'bodyguard'); ?></strong>
                </td>
                <td>
                  <input type="checkbox" <?php if(wd_get_option('wd_menu_in_grid','on') != 'off') print 'checked'; ?>  name="wd_menu_in_grid" value="on" id="wd_menu_in_grid" class="cmn-toggle cmn-toggle-round"/>
                  <label for="wd_menu_in_grid"></label>
                </td>
              </tr>
              <tr>
                <td>
                  <strong><?php echo esc_html__('Use background menu as Boxed Layout', 'bodyguard'); ?></strong>
                </td>
                <td>
                  <input type="checkbox" <?php if(wd_get_option('wd_menu_bg_in_grid','off') != 'off') print 'checked'; ?>  name="wd_menu_bg_in_grid" value="on" id="wd_menu_bg_in_grid" class="cmn-toggle cmn-toggle-round"/>
                  <label for="wd_menu_bg_in_grid"></label>
                </td>
              </tr>
              <tr>
                <td>
                  <strong><?php echo esc_html__('Stick the Menu to Top', 'bodyguard'); ?></strong>
                </td>
                <td>
                  <input type="checkbox" <?php if(wd_get_option('wd_menu_sticky','on') != 'off') print 'checked'; ?>  name="wd_menu_sticky" value="on" id="wd_menu_sticky" class="cmn-toggle cmn-toggle-round"/>
                  <label for="wd_menu_sticky"></label>
                </td>
              </tr>
              </tbody>
            </table>
        </div>
        <div id="tabs-3">
            <table class="form-table">
            <tbody>
              <tr>
                <td>
                <strong><?php echo esc_html__('Background image', 'bodyguard'); ?></strong></h3>
                </td>
                <td>
                  <input type="text" name="settings[_wd_bg_404_page]" id="wd_404_page_filed" value="<?php echo wd_get_option('wd_404_page','') ?>"/>
                  <input class="button" name="bg_404_page" id="wd_bg_404_page" value="Upload" /></br>
                </td>
              </tr>
            </tbody>
            </table>
        </div>
        <div id="tabs-4">
        <table class="form-table">
          <tbody>
              <tr>
                <td>
                  <strong><?php echo esc_html__('Custom css', 'bodyguard'); ?></strong>
                </td>
                <td>
                  <textarea rows="10" cols="70" name="wd_theme_custom_css" placeholder="Put your style here"><?php echo wd_get_option('wd_theme_custom_css',''); ?></textarea>
                </td>
              </tr>
               <tr>
                <td>
                  <strong><?php echo esc_html__('Custom JavaScript','bodyguard')?></strong>
                </td>

                <td>
                  <textarea rows="10" cols="70" name="wd_theme_custom_js" placeholder="Put your JavaScript here"><?php echo wd_get_option('wd_theme_custom_js',''); ?></textarea>
                </td>
              </tr>
          </tbody>
        </table>
        </div>

        <div id="tabs-5">
          <table class="form-table">
            <tbody>
              <tr>
                <td><strong><?php echo esc_html__('Footer columns', 'bodyguard'); ?></strong></td>
                <td class="wd_footer_columns">
                   <?php $logo_position = wd_get_option('wd_footer_columns','three _columns') ?>
                    <input type="radio" id="wd_footer1" name="wd_footer_columns" value="one_columns" <?php if($logo_position == 'one_columns') { echo 'checked'; }  ?> />
                    <label for="wd_footer1" class="wd_footer1 <?php if($logo_position == 'one_columns') { echo 'label_selected '; }  ?>"></label>

                    <input type="radio" id="wd_footer2" name="wd_footer_columns" value="tow_a_columns" <?php if($logo_position == 'tow_a_columns') { echo 'checked'; }  ?> />
                    <label for="wd_footer2" class="wd_footer2 <?php if($logo_position == 'tow_a_columns') { echo 'label_selected '; }  ?>"></label>

                    <input type="radio" id="wd_footer3" name="wd_footer_columns" value="tow_b_columns" <?php if($logo_position == 'tow_b_columns') { echo 'checked'; }  ?> />
                    <label for="wd_footer3" class="wd_footer3 <?php if($logo_position == 'tow_b_columns') { echo 'label_selected '; }  ?>"></label>

                    <input type="radio" id="wd_footer4" name="wd_footer_columns" value="tow_c_columns" <?php if($logo_position == 'tow_c_columns') { echo 'checked'; }  ?> />
                    <label for="wd_footer4" class="wd_footer4 <?php if($logo_position == 'tow_c_columns') { echo 'label_selected '; }  ?>"></label>

                    <input type="radio" id="wd_footer5" name="wd_footer_columns" value="three_columns" <?php
                        if($logo_position != 'one_columns' || $logo_position != 'tow_a_columns' || $logo_position != 'tow_b_columns' || $logo_position != 'tow_c_columns') { echo 'checked'; }  ?> />
                    <label for="wd_footer5" class="wd_footer5 <?php  if($logo_position != 'one_columns' || $logo_position != 'tow_a_columns' || $logo_position != 'tow_b_columns' || $logo_position != 'tow_c_columns') { echo 'label_selected'; }  ?>"></label>
                </td>
              </tr>
              </tr>
               <tr>
                  <td><strong><?php echo esc_html__('Footer background image', 'bodyguard'); ?></strong></td>
                  <td>
                  <input type="text" name="settings[_wd_footer_bg_image]" id="wd_footer_bg_filed" />
                  <input class="button" name="_unique_footer_bg_button" id="wd_footer_bg_btn" value="Upload" /></br>
                  <input type="button" value="Delete" class="button" onclick="wd_footer_bg_filed.value=' '" />
                  </td>
                    <td>
                    <?php $wd_footer_bg_image = wd_get_option('wd_footer_bg_image', '');

                        if(!empty($wd_footer_bg_image) and ($wd_footer_bg_image != ' ')): ?> <img src="<?php print $wd_footer_bg_image; ?>" style="max-height: 70px;" /> <?php endif;  ?></td>
              </tr>
              <tr>
                <td>
                  <strong><?php echo esc_html__('Footer Copyright text', 'bodyguard'); ?></strong>
                 </td>
                 <td>
                  <?php
                  $copyright = wd_get_option('wd_copyright','');
                  $copyright = (!empty($copyright)) ?  wd_get_option('wd_copyright','') : '&copy; 2015 Bodyguard All rights reserved.'; ?>
                  <input type="text" class="wd_txt_big" name="wd_copyright" placeholder="Footer Copyright text" value="<?php echo esc_attr($copyright); ?>"></td>
              </tr>
            </tbody>
          </table>
        </div>

      <div id="tabs-6">
        <div id="wd-metaboxes-general" class="wrap wd-page wd-page-info">
             <table class="form-table">
              <tbody>
                <tr>
                  <td>
                    <p>Choose demo content you want to import</p>
                    <em class="wd-field-description">Demo Site</em>
                  </td>
                  <td class="import-demo-screenshot">
                  <input type="radio" value="dark_demo" name="demo_screenshot" id="dark_demo">
                  <label class="dark_demo label_selected" for="dark_demo"></label>

                  <input type="radio" value="white_demo" name="demo_screenshot" id="white_demo">
                  <label class="white_demo " for="white_demo"></label>
                  </td>
                </tr>
                <tr>
                  <td>
                    <em class="wd-field-description">Import Type</em>
                  </td>
                  <td>
                    <select name="import_option" id="import_option" class="form-control wd-form-element">
                      <option value="">Please Select</option>
                      <option value="complete_content">All</option>
                      <option value="content">Content</option>
                      <option value="widgets">Widgets</option>
                      <option value="options">Options</option>
                    </select>
                  </td>
                </tr>
                <tr>
                  <td>
                    <p>Do you want to import media files?</p>
                  </td>
                  <td>
                    <input type="checkbox" value="1" class="wd-form-element" name="import_attachments" id="import_attachments" />
                  </td>
                </tr>
                <tr>
                  <td>
                    <input type="submit" class="button button-primary" value="Import" name="import" id="import_demo_data" />
                  </td>
                  <td>
                  </td>
                </tr>
                <tr>
                  <td>
                    <span><?php esc_html_e('The import process may take some time. Please be patient.', 'wd') ?> </span><br />
                  </td>
                  <td colspan="2">
                    <div class="import_load">
                      <div class="wd-progress-bar-wrapper html5-progress-bar">
                          <div class="progress-bar-wrapper">
                              <progress id="progressbar" value="0" max="100"></progress>
                          </div>
                          <div class="progress-value">0%</div>
                          <div class="progress-bar-message">
                          </div>
                      </div>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td colspan="2" style="text-align: center;">
                    <div class="alert alert-warning">
                      <strong><?php esc_html_e('Important notes:', 'wd') ?></strong>
                      <ul>
                          <li><?php esc_html_e('Please note that import process will take time needed to download all attachments from demo web site.', 'wd'); ?></li>
                          <li> <?php esc_html_e('If you plan to use shop, please install <b>WooCommerce</b> before you run import.', 'wd')?></li>
                      </ul>
                    </div>
                  </td>
                </tr>
                </tbody>
              </table>
        </div>
        <script type="text/javascript">
            jQuery(document).ready(function() {
                jQuery(document).on('click', '#import_demo_data', function(e) {
                    e.preventDefault();

                    if (jQuery( "#import_option" ).val() == "") {
                      alert('Please select Import Type.');
                      return false;
                    }
                    if (confirm('Are you sure, you want to import Demo Data now?')) {
                        jQuery('.import_load').css('display','block');
                        var progressbar = jQuery('#progressbar')
                        var import_opt = jQuery( "#import_option" ).val();
                        if (jQuery(".import-demo-screenshot label.dark_demo").hasClass("label_selected")) {
                          var import_expl = "demo-1";
                        };

                        if (jQuery(".import-demo-screenshot label.white_demo").hasClass("label_selected")) {
                          var import_expl = "demo-2";
                        };

                        // var import_expl = jQuery( "#import_example" ).val();
                        var p = 0;
                        if(import_opt == 'content'){
                            for(var i = 1; i <= 10; i++){
                                var str;
                                if (i < 10) str = 'demo-file-0'+i+'.xml';
                                else str = 'demo-file-'+i+'.xml';
                                jQuery.ajax({
                                    type: 'POST',
                                    url: ajaxurl,
                                    data: {
                                        action: 'wd_dataImport',
                                        xml: str,
                                        example: import_expl,
                                        import_attachments: (jQuery("#import_attachments").is(':checked') ? 1 : 0)
                                    },
                                    success: function(data, textStatus, XMLHttpRequest){
                                        console.log('Success!!' + data );
                                        p += 10;
                                        jQuery('.progress-value').html((p) + '%');
                                        progressbar.val(p);
                                        if (p == 90) {
                                            str = 'demo-file-10.xml';
                                            jQuery.ajax({
                                                type: 'POST',
                                                url: ajaxurl,
                                                data: {
                                                    action: 'wd_dataImport',
                                                    xml: str,
                                                    example: import_expl,
                                                    import_attachments: (jQuery("#import_attachments").is(':checked') ? 1 : 0)
                                                },
                                                success: function(data, textStatus, XMLHttpRequest){
                                                    p+= 10;
                                                    jQuery('.progress-value').html((p) + '%');
                                                    progressbar.val(p);
                                                    jQuery('.progress-bar-message').html('<div class="alert alert-success"><strong>Import is completed</strong></div>');
                                                },
                                                error: function(MLHttpRequest, textStatus, errorThrown){
                                                }
                                            });
                                        }
                                    },
                                    error: function(MLHttpRequest, textStatus, errorThrown){
                                        console.log('Error!!');
                                    }
                                });
                            }
                        } else if(import_opt == 'widgets') {
                            jQuery.ajax({
                                type: 'POST',
                                url: ajaxurl,
                                data: {
                                    action: 'wd_widgetsImport',
                                    example: import_expl
                                },
                                success: function(data, textStatus, XMLHttpRequest){
                                    console.log('widgets imported');
                                    jQuery('.progress-value').html((100) + '%');
                                    progressbar.val(100);
                                },
                                error: function(MLHttpRequest, textStatus, errorThrown){
                                }
                            });
                            jQuery('.progress-bar-message').html('<div class="alert alert-success"><strong>Import is completed</strong></div>');
                        } else if(import_opt == 'options'){
                            jQuery.ajax({
                                type: 'POST',
                                url: ajaxurl,
                                data: {
                                    action: 'wd_import_options'
                                    // example: import_expl
                                },
                                success: function(data, textStatus, XMLHttpRequest){
                                    console.log('options imported');
                                    jQuery('.progress-value').html((100) + '%');
                                    progressbar.val(100);
                                },
                                error: function(MLHttpRequest, textStatus, errorThrown){
                                }
                            });
                            jQuery('.progress-bar-message').html('<div class="alert alert-success"><strong>Import is completed</strong></div>');
                        }else if(import_opt == 'complete_content'){
                            for(var i=1;i<10;i++){
                                var str;
                                if (i < 10) str = 'demo-file-0'+i+'.xml';
                                else str = 'demo-file-'+i+'.xml';
                                jQuery.ajax({
                                    type: 'POST',
                                    url: ajaxurl,
                                    data: {
                                        action: 'wd_dataImport',
                                        xml: str,
                                        example: import_expl,
                                        import_attachments: (jQuery("#import_attachments").is(':checked') ? 1 : 0)
                                    },
                                    success: function(data, textStatus, XMLHttpRequest){
                                        p+= 10;
                                        jQuery('.progress-value').html((p) + '%');
                                        progressbar.val(p);
                                        if (p == 90) {
                                            str = 'demo-file-10.xml';
                                            jQuery.ajax({
                                                type: 'POST',
                                                url: ajaxurl,
                                                data: {
                                                    action: 'wd_dataImport',
                                                    xml: str,
                                                    example: import_expl,
                                                    import_attachments: (jQuery("#import_attachments").is(':checked') ? 1 : 0)
                                                },
                                                success: function(data, textStatus, XMLHttpRequest){
                                                    jQuery.ajax({
                                                        type: 'POST',
                                                        url: ajaxurl,
                                                        data: {
                                                            action: 'wd_import_options',
                                                            example: import_expl
                                                        },
                                                        success: function(data, textStatus, XMLHttpRequest){
                                                            console.log('options imported');
                                                            jQuery.ajax({
                                                                type: 'POST',
                                                                url: ajaxurl,
                                                                data: {
                                                                    action: 'wd_widgetsImport',
                                                                    example: import_expl
                                                                },
                                                                success: function(data, textStatus, XMLHttpRequest){
                                                                     jQuery.ajax({
                                                                     type: 'POST',
                                                                     url: ajaxurl,
                                                                     data: {
                                                                     action: 'wd_otherImport',
                                                                     example: import_expl
                                                                     },
                                                                     success: function(data, textStatus, XMLHttpRequest){
                                                                         jQuery('.progress-value').html((100) + '%');
                                                                         progressbar.val(100);
                                                                         jQuery('.progress-bar-message').html('<div class="alert alert-success">Import is completed.</div>');
                                                                     },
                                                                     error: function(MLHttpRequest, textStatus, errorThrown){
                                                                     }
                                                                     });

                                                                    /*jQuery('.progress-value').html((100) + '%');
                                                                    progressbar.val(100);
                                                                    jQuery('.progress-bar-message').html('<div class="alert alert-success">Import is completed.</div>');*/
                                                                },
                                                                error: function(MLHttpRequest, textStatus, errorThrown){
                                                                }
                                                            });
                                                        },
                                                        error: function(MLHttpRequest, textStatus, errorThrown){
                                                        }
                                                    });
                                                },
                                                error: function(MLHttpRequest, textStatus, errorThrown){
                                                }
                                            });
                                        }
                                    },
                                    error: function(MLHttpRequest, textStatus, errorThrown){
                                    }
                                });
                            }




                        }
                    }
                    return false;
                });
            });
        </script>

        </div>
      </div>
      </div>
      <div class="eight columns wp-core-ui wd-validate"> <p><button  type="submit" name="search" value="Update Options" class="button" /><span class="ti-save"></span>Update Options</button></p></div>
    </form>
  </div>


  <div style="clear: both;">
    <br/><br/><br/><br/><br/><br/>
  </div>


  <div class="wb-item">
    <div class="icon-themes">

    </div>
  </div>
  <?php
  }
}