<?php
if (!function_exists ('add_action')) {
    header('Status: 403 Forbidden');
    header('HTTP/1.1 403 Forbidden');
    exit();
}


/**
 * Register styles and scripts
 */

function wd_admin_scripts_init() {

    wp_register_script('bootstrap.min', get_template_directory_uri().'/js/bootstrap.min.js', array( 'jquery', 'jquery-ui-core', 'jquery-ui-widget', 'jquery-ui-mouse', 'jquery-ui-tabs', 'jquery-ui-droppable', 'jquery-ui-sortable' ) , false , false );

}
add_action('admin_init', 'wd_admin_scripts_init');


class Wd_Import {

    public $message = "";
    public $attachments = false;


    function init_wd_import() {
        if(isset($_REQUEST['import_option'])) {
            $import_option = $_REQUEST['import_option'];
            if($import_option == 'content'){
                $this->import_content('proya_content.xml');
            }elseif($import_option == 'custom_sidebars') {
                $this->import_custom_sidebars('custom_sidebars.txt');
            } elseif($import_option == 'widgets') {
                $this->import_widgets('widgets.txt');
            } elseif($import_option == 'options'){
                $this->import_options('options.txt');
            }elseif($import_option == 'menus'){
                $this->import_menus('menus.txt');
            }elseif($import_option == 'settingpages'){
                $this->import_settings_pages('settingpages.txt');
            }elseif($import_option == 'complete_content'){
                $this->import_content('proya_content.xml');
                $this->import_options('options.txt');
                $this->import_widgets('widgets.txt');
                $this->import_menus('menus.txt');
                $this->import_settings_pages('settingpages.txt');
                $this->message = esc_html__("Content imported successfully", "webdevia");
            }
        }
    }

    public function import_content($file){
        if (!class_exists('WP_Importer')) {
            ob_start();
            $class_wp_importer = ABSPATH . 'wp-admin/includes/class-wp-importer.php';
            require_once($class_wp_importer);
            require_once(get_template_directory() . '/inc/import/class.wordpress-importer.php');
            $wd_import = new WP_Import();
            set_time_limit(0);
            $path = get_template_directory() . '/inc/import/files/' . $file;

            $wd_import->fetch_attachments = $this->attachments;
            $returned_value = $wd_import->import($path);
            if(is_wp_error($returned_value)){
                $this->message = esc_html__("An Error Occurred During Import", "webdevia");
            }
            else {
                $this->message = esc_html__("Content imported successfully", "webdevia");
            }
            ob_get_clean();
        } else {
            $this->message = esc_html__("Error loading files", "webdevia");
        }
    }

    public function import_widgets($file){

	    if(!file_exists(get_template_directory() . '/inc/import/' . $file)) {
		    die("File not found");
	    } else {
		    $myfile = fopen( get_template_directory() . '/inc/import/' . $file, "r" ) or die( "Unable to open file!" );
		    $data = fread( $myfile, filesize( get_template_directory() . '/inc/import/' . $file ) );
		    fclose( $myfile );
	    }

	    /*
	    $data = file_get_contents( "./demo-files/widgets.txt", FILE_USE_INCLUDE_PATH );
	    $data = json_decode( $data );

	    // Delete import file
	    unlink( $file );*/

	    $data = json_decode( $data );


	    global $wp_registered_sidebars;

	    // Have valid data?
	    // If no data or could not decode
	    if ( empty( $data ) || ! is_object( $data ) ) {
		    wp_die(
			    esc_html__( 'Import data could not be read. Please try a different file.', 'widget-importer-exporter' ),
			    '',
			    array( 'back_link' => true )
		    );
	    }

	    // Hook before import
	    do_action( 'wie_before_import' );
	    $data = apply_filters( 'wie_import_data', $data );

	    // Get all available widgets site supports
	    $available_widgets = $this->wd_available_widgets();

	    // Get all existing widget instances
	    $widget_instances = array();
	    foreach ( $available_widgets as $widget_data ) {
		    $widget_instances[$widget_data['id_base']] = get_option( 'widget_' . $widget_data['id_base'] );
	    }

	    // Begin results
	    $results = array();

	    // Loop import data's sidebars
	    foreach ( $data as $sidebar_id => $widgets ) {

		    // Skip inactive widgets
		    // (should not be in export file)
		    if ( 'wp_inactive_widgets' == $sidebar_id ) {
			    continue;
		    }

		    // Check if sidebar is available on this site
		    // Otherwise add widgets to inactive, and say so
		    if ( isset( $wp_registered_sidebars[$sidebar_id] ) ) {
			    $sidebar_available = true;
			    $use_sidebar_id = $sidebar_id;
			    $sidebar_message_type = 'success';
			    $sidebar_message = '';
		    } else {
			    $sidebar_available = false;
			    $use_sidebar_id = 'wp_inactive_widgets'; // add to inactive if sidebar does not exist in theme
			    $sidebar_message_type = 'error';
			    $sidebar_message = esc_html__( 'Sidebar does not exist in theme (using Inactive)', 'widget-importer-exporter' );
		    }

		    // Result for sidebar
		    $results[$sidebar_id]['name'] = ! empty( $wp_registered_sidebars[$sidebar_id]['name'] ) ? $wp_registered_sidebars[$sidebar_id]['name'] : $sidebar_id; // sidebar name if theme supports it; otherwise ID
		    $results[$sidebar_id]['message_type'] = $sidebar_message_type;
		    $results[$sidebar_id]['message'] = $sidebar_message;
		    $results[$sidebar_id]['widgets'] = array();

		    // Loop widgets
		    foreach ( $widgets as $widget_instance_id => $widget ) {

			    $fail = false;

			    // Get id_base (remove -# from end) and instance ID number
			    $id_base = preg_replace( '/-[0-9]+$/', '', $widget_instance_id );
			    $instance_id_number = str_replace( $id_base . '-', '', $widget_instance_id );

			    // Does site support this widget?
			    if ( ! $fail && ! isset( $available_widgets[$id_base] ) ) {
				    $fail = true;
				    $widget_message_type = 'error';
				    $widget_message = esc_html__( 'Site does not support widget', 'widget-importer-exporter' ); // explain why widget not imported
			    }

			    // Filter to modify settings object before conversion to array and import
			    // Leave this filter here for backwards compatibility with manipulating objects (before conversion to array below)
			    // Ideally the newer wie_widget_settings_array below will be used instead of this
			    $widget = apply_filters( 'wie_widget_settings', $widget ); // object

			    // Convert multidimensional objects to multidimensional arrays
			    // Some plugins like Jetpack Widget Visibility store settings as multidimensional arrays
			    // Without this, they are imported as objects and cause fatal error on Widgets page
			    // If this creates problems for plugins that do actually intend settings in objects then may need to consider other approach: https://wordpress.org/support/topic/problem-with-array-of-arrays
			    // It is probably much more likely that arrays are used than objects, however
			    $widget = json_decode( json_encode( $widget ), true );

			    // Filter to modify settings array
			    // This is preferred over the older wie_widget_settings filter above
			    // Do before identical check because changes may make it identical to end result (such as URL replacements)
			    $widget = apply_filters( 'wie_widget_settings_array', $widget );

			    // Does widget with identical settings already exist in same sidebar?
			    if ( ! $fail && isset( $widget_instances[$id_base] ) ) {

				    // Get existing widgets in this sidebar
				    $sidebars_widgets = get_option( 'sidebars_widgets' );
				    $sidebar_widgets = isset( $sidebars_widgets[$use_sidebar_id] ) ? $sidebars_widgets[$use_sidebar_id] : array(); // check Inactive if that's where will go

				    // Loop widgets with ID base
				    $single_widget_instances = ! empty( $widget_instances[$id_base] ) ? $widget_instances[$id_base] : array();
				    foreach ( $single_widget_instances as $check_id => $check_widget ) {

					    // Is widget in same sidebar and has identical settings?
					    if ( in_array( "$id_base-$check_id", $sidebar_widgets ) && (array) $widget == $check_widget ) {

						    $fail = true;
						    $widget_message_type = 'warning';
						    $widget_message = esc_html__( 'Widget already exists', 'widget-importer-exporter' ); // explain why widget not imported

						    break;

					    }

				    }

			    }

			    // No failure
			    if ( ! $fail ) {

				    // Add widget instance
				    $single_widget_instances = get_option( 'widget_' . $id_base ); // all instances for that widget ID base, get fresh every time
				    $single_widget_instances = ! empty( $single_widget_instances ) ? $single_widget_instances : array( '_multiwidget' => 1 ); // start fresh if have to
				    $single_widget_instances[] = $widget; // add it

				    // Get the key it was given
				    end( $single_widget_instances );
				    $new_instance_id_number = key( $single_widget_instances );

				    // If key is 0, make it 1
				    // When 0, an issue can occur where adding a widget causes data from other widget to load, and the widget doesn't stick (reload wipes it)
				    if ( '0' === strval( $new_instance_id_number ) ) {
					    $new_instance_id_number = 1;
					    $single_widget_instances[$new_instance_id_number] = $single_widget_instances[0];
					    unset( $single_widget_instances[0] );
				    }

				    // Move _multiwidget to end of array for uniformity
				    if ( isset( $single_widget_instances['_multiwidget'] ) ) {
					    $multiwidget = $single_widget_instances['_multiwidget'];
					    unset( $single_widget_instances['_multiwidget'] );
					    $single_widget_instances['_multiwidget'] = $multiwidget;
				    }

				    // Update option with new widget
				    update_option( 'widget_' . $id_base, $single_widget_instances );

				    // Assign widget instance to sidebar
				    $sidebars_widgets = get_option( 'sidebars_widgets' ); // which sidebars have which widgets, get fresh every time
				    $new_instance_id = $id_base . '-' . $new_instance_id_number; // use ID number from new widget instance
				    $sidebars_widgets[$use_sidebar_id][] = $new_instance_id; // add new instance to sidebar
				    update_option( 'sidebars_widgets', $sidebars_widgets ); // save the amended data

				    // Success message
				    if ( $sidebar_available ) {
					    $widget_message_type = 'success';
					    $widget_message = esc_html__( 'Imported', 'widget-importer-exporter' );
				    } else {
					    $widget_message_type = 'warning';
					    $widget_message = esc_html__( 'Imported to Inactive', 'widget-importer-exporter' );
				    }

			    }

			    // Result for widget instance
			    $results[$sidebar_id]['widgets'][$widget_instance_id]['name'] = isset( $available_widgets[$id_base]['name'] ) ? $available_widgets[$id_base]['name'] : $id_base; // widget name or ID if name not available (not supported by site)
			    $results[$sidebar_id]['widgets'][$widget_instance_id]['title'] = ! empty( $widget['title'] ) ? $widget['title'] : esc_html__( 'No Title', 'widget-importer-exporter' ); // show "No Title" if widget instance is untitled
			    $results[$sidebar_id]['widgets'][$widget_instance_id]['message_type'] = $widget_message_type;
			    $results[$sidebar_id]['widgets'][$widget_instance_id]['message'] = $widget_message;

		    }

	    }
    }

		public function wd_available_widgets() {

			global $wp_registered_widget_controls;

			$widget_controls = $wp_registered_widget_controls;

			$available_widgets = array();

			foreach ( $widget_controls as $widget ) {

				if ( ! empty( $widget['id_base'] ) && ! isset( $available_widgets[$widget['id_base']] ) ) { // no dupes

					$available_widgets[$widget['id_base']]['id_base'] = $widget['id_base'];
					$available_widgets[$widget['id_base']]['name'] = $widget['name'];

				}

			}

			return apply_filters( 'wie_available_widgets', $available_widgets );

		}

    public function import_sidebars_widgets($file){
        $wd_sidebars = get_option("sidebars_widgets");
        unset($wd_sidebars['array_version']);
        $data = $this->file_options($file);
        if ( is_array($data['sidebars']) ) {
            $wd_sidebars = array_merge( (array) $wd_sidebars, (array) $data['sidebars'] );
            unset($wd_sidebars['wp_inactive_widgets']);
            $wd_sidebars = array_merge(array('wp_inactive_widgets' => array()), $wd_sidebars);
            $wd_sidebars['array_version'] = 2;
            wp_set_sidebars_widgets($wd_sidebars);
        }
    }

    public function import_custom_sidebars($file){
        $options = $this->file_options($file);
        update_option( 'wd_sidebars', $options);
        $this->message = esc_html__("Custom sidebars imported successfully", "webdevia");
    }

    public function import_options($file){
        $options = $this->file_options($file);
        update_option( 'wd_options_wd', $options);
        $this->message = esc_html__("Options imported successfully", "webdevia");
    }

    public function import_menus($file){
        global $wpdb;
        $wd_terms_table = $wpdb->prefix . "terms";
        $wd_terms_table = esc_sql( $wd_terms_table );
        $this->menus_data = $this->file_options($file);
        $menu_array = array();
        foreach ($this->menus_data as $registered_menu => $menu_slug) {
            $term_rows = $wpdb->get_results("SELECT * FROM $wd_terms_table where slug='{$menu_slug}'", ARRAY_A);
            if(isset($term_rows[0]['term_id'])) {
                $term_id_by_slug = $term_rows[0]['term_id'];
            } else {
                $term_id_by_slug = null;
            }
            $menu_array[$registered_menu] = $term_id_by_slug;
        }
        set_theme_mod('nav_menu_locations', array_map('absint', $menu_array ) );

    }
    public function import_settings_pages($file){
        $pages = $this->file_options($file);

        foreach($pages as $wd_page_option => $wd_page_id){
            update_option( $wd_page_option, $wd_page_id);
        }
    }
    public function file_options($file){
        $file_content = "";
        $file_for_import = get_template_directory() . '/inc/import/files/' . $file;
        if ( file_exists($file_for_import) ) {
            $file_content = $this->wd_file_contents($file_for_import);
        } else {
            $this->message = esc_html__("File doesn't exist", "webdevia");
        }
        if ($file_content) {
            $unserialized_content = unserialize(base64_decode($file_content));
            $json_array = json_decode($file_content);
            /*print_r($json_array);*/
            /*if ($unserialized_content) {
                return $unserialized_content;
                
            }*/
            print_r($json_array);
        return $json_array;
        }
        /*return false;*/
    }

    function wd_file_contents( $path ) {
        $wd_content = '';
        if ( function_exists('realpath') )
            $filepath = realpath($path);
        if ( !$filepath || !@is_file($filepath) )
            return '';

        if( ini_get('allow_url_fopen') ) {
            $wd_file_method = 'fopen';
        } else {
            $wd_file_method = 'file_get_contents';
        }
        if ( $wd_file_method == 'fopen' ) {
            $wd_handle = fopen( $filepath, 'rb' );

            if( $wd_handle !== false ) {
                while (!feof($wd_handle)) {
                    $wd_content .= fread($wd_handle, 8192);
                }
                fclose( $wd_handle );
            }
            return $wd_content;
        } else {
            return file_get_contents($filepath);
        }
    }
}
global $my_Wd_Import;
$my_Wd_Import = new Wd_Import();



if(!function_exists('wd_dataImport'))
{
    function wd_dataImport()
    {
        global $my_Wd_Import;

        if ($_POST['import_attachments'] == 1)
            $my_Wd_Import->attachments = true;
        else
            $my_Wd_Import->attachments = false;

        $folder = "files/";
        if (!empty($_POST['example']))
            $folder = $_POST['example']."/";

        $my_Wd_Import->import_content($folder.$_POST['xml']);

        die();
    }

    add_action('wp_ajax_wd_dataImport', 'wd_dataImport');
}

if(!function_exists('wd_widgetsImport'))
{
    function wd_widgetsImport()
    {
        global $my_Wd_Import;

        $folder = "/files/";
        if (!empty($_POST['example']))
            $folder .= $_POST['example']."/";

	     $my_Wd_Import->import_widgets($folder.'widgets.txt');

        die();
    }

    add_action('wp_ajax_wd_widgetsImport', 'wd_widgetsImport');
}

if(!function_exists('wd_optionsImport'))
{
    function wd_optionsImport()
    {
        global $my_Wd_Import;

        $folder = "/files/";
        if (!empty($_POST['example']))
            $folder .= $_POST['example']."/";

        $my_Wd_Import->import_options($folder.'options.txt');

        die();
    }

    add_action('wp_ajax_wd_optionsImport', 'wd_optionsImport');
}

if(!function_exists('wd_otherImport'))
{
    function wd_otherImport()
    {
        global $my_Wd_Import;

        $folder = "files/";
        if (!empty($_POST['example']))
            $folder .= $_POST['example']."/";

        // $my_Wd_Import->import_options($folder.'options.txt');
        // $my_Wd_Import->import_widgets($folder.'widgets.txt');
        $my_Wd_Import->import_menus($folder.'menus.txt');
        $my_Wd_Import->import_settings_pages($folder.'settingpages.txt');

        die();
    }

    add_action('wp_ajax_wd_otherImport', 'wd_otherImport');
}

if (!function_exists('wd_import_options')) {
	function wd_import_options()
	{

		$wd_options_string = 'a:58:{s:12:"wd_show_logo";s:2:"on";s:23:"wd_show_top_social_bare";s:2:"on";s:14:"wd_box_wrapper";s:2:"of";s:13:"wd_show_title";s:2:"of";s:15:"wd_menu_in_grid";s:2:"on";s:18:"wd_menu_bg_in_grid";s:3:"off";s:14:"wd_menu_sticky";s:2:"on";s:15:"wd_menu_overlay";s:3:"off";s:17:"wd_mini_card_icon";s:2:"on";s:14:"wd_search_icon";s:2:"on";s:7:"wd_logo";s:0:"";s:17:"wd_title_bg_image";s:0:"";s:18:"wd_footer_bg_image";s:0:"";s:12:"wd_home_page";s:0:"";s:11:"wd_404_page";s:0:"";s:10:"wd_favicon";s:0:"";s:19:"wd_theme_custom_css";s:318:".creative.top-bar-section {
background: #fff;
}
.creative-layout .top-bar-container {
padding: 0;
}
.title-area {
margin:0 auto;
  max-width: 83.5714em;

}
.contain-to-grid .top-bar {
   max-width: 100%;
}
.top_bar_logo_top ul.title-area {
margin: 0 auto;
}
.careers .vacancyList li {
padding:0;
}
";s:16:"wrapper_bg_color";s:13:"rgba(0,0,0,1)";s:13:"primary_color";s:19:"rgba(185,144,111,1)";s:15:"secondary_color";s:0:"";s:16:"wd_logo_position";s:8:"logo_top";s:19:"navigation_bg_color";s:16:"rgba(0,0,0,0.81)";s:26:"navigation_bg_color_sticky";s:13:"rgba(0,0,0,1)";s:27:"navigation_border_top_color";s:0:"";s:21:"navigation_text_color";s:16:"rgba(33,33,33,1)";s:16:"top_bar_bg_color";s:16:"rgba(30,42,52,1)";s:18:"top_bar_text_color";s:19:"rgba(255,255,255,1)";s:15:"footer_bg_color";s:16:"rgba(30,42,52,1)";s:17:"footer_text_color";s:0:"";s:17:"wd_footer_columns";s:13:"three_columns";s:12:"wd_copyright";s:38:"© 2015 Bodyguard All rights reserved.";s:20:"copyright_text_color";s:19:"rgba(255,255,255,1)";s:18:"copyright_bg_color";s:16:"rgba(30,42,52,1)";s:7:"twitter";s:8:"webdevia";s:8:"facebook";s:8:"webdevia";s:6:"flickr";s:8:"webdevia";s:5:"vimeo";s:8:"webdevia";s:5:"phone";s:16:"+124 548 698 254";s:6:"adress";s:23:"12 wall street New York";s:20:"wd_body_font_familly";s:7:"Raleway";s:20:"wd_font-weight-style";s:3:"400";s:25:"wd_main-text-font-subsets";s:5:"latin";s:17:"wd_text-transform";s:4:"none";s:17:"wd_body-font-size";s:2:"17";s:20:"wd_head_font_familly";s:7:"Raleway";s:19:"wd_body_font_weight";s:0:"";s:28:"wd_heading-font-weight-style";s:3:"700";s:28:"wd_heading-text-font-subsets";s:5:"latin";s:20:"wd_heading-transform";s:4:"none";s:26:"wd_navigation_font_familly";s:7:"default";s:31:"wd_navigation-font-weight-style";s:3:"400";s:31:"wd_navigation-text-font-subsets";s:5:"latin";s:23:"wd_navigation-transform";s:4:"none";s:23:"wd_navigation-font-size";s:7:"default";s:13:"wd_menu_style";s:8:"creative";s:14:"page_for_posts";s:0:"";s:16:"wd_general_style";s:4:"dark";s:18:"wd_theme_custom_js";s:0:"";}';
		$options_array = array();
		$options_array = unserialize($wd_options_string);
		update_option("wd_options_array",$options_array);
	}
	add_action('wp_ajax_wd_import_options', 'wd_import_options');
}