<?php

/*____________________________________________  Animations ______________________________________*/
global $vc_add_css_animation;
$vc_add_css_animation = array(
	'type' => 'dropdown',
	'heading' => esc_html__( 'CSS Animation', 'js_composer' ),
	'param_name' => 'css_animation',
	'admin_label' => true,
	'value' => array(
		  esc_html__( 'No', 'js_composer' ) => '',
		  esc_html__('Bounce In', 'js_composer' ) => 'bounceIn',
          esc_html__('Bounce In Down', 'js_composer' ) => 'bounceInDown',
          esc_html__('Bounce In Left', 'js_composer' ) => 'bounceInLeft',
          esc_html__('Bounce In Right', 'js_composer' ) => 'bounceInRight',
          esc_html__('Bounce In Up', 'js_composer' ) => 'bounceInUp',
          esc_html__('Fade In', 'js_composer' ) => 'fadeIn',
          esc_html__('Fade In Down', 'js_composer' ) => 'fadeInDown',
          esc_html__('Fade In Down Big', 'js_composer' ) => 'fadeInDownBig',
          esc_html__('Fade In Left', 'js_composer' ) => 'fadeInLeft',
          esc_html__('Fade In Left Big', 'js_composer' ) => 'fadeInLeftBig',
          esc_html__('Fade In Right', 'js_composer' ) => 'fadeInRight',
          esc_html__('Fade In Right Big', 'js_composer' ) => 'fadeInRightBig',
          esc_html__('Fade In Up', 'js_composer' ) => 'fadeInUp',
          esc_html__('Fade In Up Big', 'js_composer' ) => 'fadeInUpBig',
          esc_html__('Flip', 'js_composer' ) => 'flip',
          esc_html__('Flip In X', 'js_composer' ) => 'flipInX',
          esc_html__('Flip In Y', 'js_composer' ) => 'flipInY',
          esc_html__('Flip Out X', 'js_composer' ) => 'flipOutX',
          esc_html__('Flip Out Y', 'js_composer' ) => 'flipOutY',
          esc_html__('Light Speed In', 'js_composer' ) => 'lightSpeedIn',
          esc_html__('Light Speed Out', 'js_composer' ) => 'lightSpeedOut',
          esc_html__('Rotate In', 'js_composer' ) => 'rotateIn',
          esc_html__('Rotate In Down Left', 'js_composer' ) => 'rotateInDownLeft',
          esc_html__('Rotate In Down Right', 'js_composer' ) => 'rotateInDownRight',
          esc_html__('Rotate In Up Left', 'js_composer' ) => 'rotateInUpLeft',
          esc_html__('Rotate In Up Right', 'js_composer' ) => 'rotateInUpRight',
          esc_html__('Slide In Up', 'js_composer' ) => 'slideInUp',
          esc_html__('Slide In Down', 'js_composer' ) => 'slideInDown',
          esc_html__('Slide In Left', 'js_composer' ) => 'slideInLeft',
          esc_html__('Slide In Right', 'js_composer' ) => 'slideInRight',
          esc_html__('Zoom In ', 'js_composer' ) => 'zoomIn',
          esc_html__('Zoom In Down', 'js_composer' ) => 'zoomInDown',
          esc_html__('Zoom In Left', 'js_composer' ) => 'zoomInLeft',
          esc_html__('Zoom In Right', 'js_composer' ) => 'zoomInRight',
          esc_html__('Zoom In Up', 'js_composer' ) => 'zoomInUp',
          esc_html__('Roll In', 'js_composer' ) => 'rollIn',
	),
	'description' => esc_html__( 'Select type of animation for element to be animated when it "enters" the browsers viewport (Note: works only in modern browsers).', 'js_composer' )
);



vc_map( array(
    "name"            => esc_html__("Pricing Table", "js_composer"), // add a name
    "base"            => "wd_pricing_table", // bind with our shortcode
    "description"     => "You can add a prince table",
    "content_element" => true, // set this parameter when element will has a content
    "is_container"    => FALSE, // set this param when you need to add a content element in this element
    // Here starts the definition of array with parameters of our compnent
    "params" => array( 
        array(
            "type" => "textfield",
            "heading" => esc_html__("Title", "js_composer"),
            "param_name" => "title",
        ), 
        array(
            "type" => "textfield",
            "heading" => esc_html__("Price", "js_composer"),
            "param_name" => "price",
        ), 
        array(
            "type" => "textfield",
            "heading" => esc_html__("Description", "js_composer"),
            "param_name" => "description",
        ), 
        array(
            "type" => "textfield",
            "heading" => esc_html__("Button Text", "js_composer"),
            "param_name" => "button_text",
            "value" => "Buy Now",
        ), 
        array(
            "type" => "vc_link",
            "heading" => esc_html__("Button Link", "js_composer"),
            "param_name" => "button_link",
        ), 
        array(            
            "type" => "textarea",
            "class" => "",
            "heading" => "Plan Options",
            "param_name" => "content_text",
            "value" => "<ul><li>Option #1</li><li>Option #2</li><li>Option #3</li><li>Option #4</li></ul>",
            "description" => ""
        ), 
        array(
            "type" => "checkbox",
            "heading" => esc_html__("Set this table as featured", "js_composer"),
            "param_name" => "featured",
            "value" =>array( esc_html__( 'Yes, please', 'js_composer' ) => 'featured' ),
        ),
        $vc_add_css_animation
    )
) );
$icons = 'a:370:{i:0;s:14:"---- None ----";s:9:"fa-adjust";s:9:"fa-adjust";s:6:"fa-adn";s:6:"fa-adn";s:15:"fa-align-center";s:15:"fa-align-center";s:16:"fa-align-justify";s:16:"fa-align-justify";s:13:"fa-align-left";s:13:"fa-align-left";s:14:"fa-align-right";s:14:"fa-align-right";s:12:"fa-ambulance";s:12:"fa-ambulance";s:9:"fa-anchor";s:9:"fa-anchor";s:10:"fa-android";s:10:"fa-android";s:20:"fa-angle-double-down";s:20:"fa-angle-double-down";s:20:"fa-angle-double-left";s:20:"fa-angle-double-left";s:21:"fa-angle-double-right";s:21:"fa-angle-double-right";s:18:"fa-angle-double-up";s:18:"fa-angle-double-up";s:13:"fa-angle-down";s:13:"fa-angle-down";s:13:"fa-angle-left";s:13:"fa-angle-left";s:14:"fa-angle-right";s:14:"fa-angle-right";s:11:"fa-angle-up";s:11:"fa-angle-up";s:8:"fa-apple";s:8:"fa-apple";s:10:"fa-archive";s:10:"fa-archive";s:20:"fa-arrow-circle-down";s:20:"fa-arrow-circle-down";s:20:"fa-arrow-circle-left";s:20:"fa-arrow-circle-left";s:22:"fa-arrow-circle-o-down";s:22:"fa-arrow-circle-o-down";s:22:"fa-arrow-circle-o-left";s:22:"fa-arrow-circle-o-left";s:23:"fa-arrow-circle-o-right";s:23:"fa-arrow-circle-o-right";s:20:"fa-arrow-circle-o-up";s:20:"fa-arrow-circle-o-up";s:21:"fa-arrow-circle-right";s:21:"fa-arrow-circle-right";s:18:"fa-arrow-circle-up";s:18:"fa-arrow-circle-up";s:13:"fa-arrow-down";s:13:"fa-arrow-down";s:13:"fa-arrow-left";s:13:"fa-arrow-left";s:14:"fa-arrow-right";s:14:"fa-arrow-right";s:11:"fa-arrow-up";s:11:"fa-arrow-up";s:9:"fa-arrows";s:9:"fa-arrows";s:13:"fa-arrows-alt";s:13:"fa-arrows-alt";s:11:"fa-arrows-h";s:11:"fa-arrows-h";s:11:"fa-arrows-v";s:11:"fa-arrows-v";s:11:"fa-asterisk";s:11:"fa-asterisk";s:11:"fa-backward";s:11:"fa-backward";s:6:"fa-ban";s:6:"fa-ban";s:14:"fa-bar-chart-o";s:14:"fa-bar-chart-o";s:10:"fa-barcode";s:10:"fa-barcode";s:7:"fa-bars";s:7:"fa-bars";s:7:"fa-beer";s:7:"fa-beer";s:7:"fa-bell";s:7:"fa-bell";s:9:"fa-bell-o";s:9:"fa-bell-o";s:12:"fa-bitbucket";s:12:"fa-bitbucket";s:19:"fa-bitbucket-square";s:19:"fa-bitbucket-square";s:7:"fa-bold";s:7:"fa-bold";s:7:"fa-bolt";s:7:"fa-bolt";s:7:"fa-book";s:7:"fa-book";s:11:"fa-bookmark";s:11:"fa-bookmark";s:13:"fa-bookmark-o";s:13:"fa-bookmark-o";s:12:"fa-briefcase";s:12:"fa-briefcase";s:6:"fa-btc";s:6:"fa-btc";s:6:"fa-bug";s:6:"fa-bug";s:13:"fa-building-o";s:13:"fa-building-o";s:11:"fa-bullhorn";s:11:"fa-bullhorn";s:11:"fa-bullseye";s:11:"fa-bullseye";s:11:"fa-calendar";s:11:"fa-calendar";s:13:"fa-calendar-o";s:13:"fa-calendar-o";s:9:"fa-camera";s:9:"fa-camera";s:15:"fa-camera-retro";s:15:"fa-camera-retro";s:13:"fa-caret-down";s:13:"fa-caret-down";s:13:"fa-caret-left";s:13:"fa-caret-left";s:14:"fa-caret-right";s:14:"fa-caret-right";s:22:"fa-caret-square-o-down";s:22:"fa-caret-square-o-down";s:22:"fa-caret-square-o-left";s:22:"fa-caret-square-o-left";s:23:"fa-caret-square-o-right";s:23:"fa-caret-square-o-right";s:20:"fa-caret-square-o-up";s:20:"fa-caret-square-o-up";s:11:"fa-caret-up";s:11:"fa-caret-up";s:14:"fa-certificate";s:14:"fa-certificate";s:15:"fa-chain-broken";s:15:"fa-chain-broken";s:8:"fa-check";s:8:"fa-check";s:15:"fa-check-circle";s:15:"fa-check-circle";s:17:"fa-check-circle-o";s:17:"fa-check-circle-o";s:15:"fa-check-square";s:15:"fa-check-square";s:17:"fa-check-square-o";s:17:"fa-check-square-o";s:22:"fa-chevron-circle-down";s:22:"fa-chevron-circle-down";s:22:"fa-chevron-circle-left";s:22:"fa-chevron-circle-left";s:23:"fa-chevron-circle-right";s:23:"fa-chevron-circle-right";s:20:"fa-chevron-circle-up";s:20:"fa-chevron-circle-up";s:15:"fa-chevron-down";s:15:"fa-chevron-down";s:15:"fa-chevron-left";s:15:"fa-chevron-left";s:16:"fa-chevron-right";s:16:"fa-chevron-right";s:13:"fa-chevron-up";s:13:"fa-chevron-up";s:9:"fa-circle";s:9:"fa-circle";s:11:"fa-circle-o";s:11:"fa-circle-o";s:12:"fa-clipboard";s:12:"fa-clipboard";s:10:"fa-clock-o";s:10:"fa-clock-o";s:8:"fa-cloud";s:8:"fa-cloud";s:17:"fa-cloud-download";s:17:"fa-cloud-download";s:15:"fa-cloud-upload";s:15:"fa-cloud-upload";s:7:"fa-code";s:7:"fa-code";s:12:"fa-code-fork";s:12:"fa-code-fork";s:9:"fa-coffee";s:9:"fa-coffee";s:6:"fa-cog";s:6:"fa-cog";s:7:"fa-cogs";s:7:"fa-cogs";s:10:"fa-columns";s:10:"fa-columns";s:10:"fa-comment";s:10:"fa-comment";s:12:"fa-comment-o";s:12:"fa-comment-o";s:11:"fa-comments";s:11:"fa-comments";s:13:"fa-comments-o";s:13:"fa-comments-o";s:10:"fa-compass";s:10:"fa-compass";s:11:"fa-compress";s:11:"fa-compress";s:14:"fa-credit-card";s:14:"fa-credit-card";s:7:"fa-crop";s:7:"fa-crop";s:13:"fa-crosshairs";s:13:"fa-crosshairs";s:7:"fa-css3";s:7:"fa-css3";s:10:"fa-cutlery";s:10:"fa-cutlery";s:10:"fa-desktop";s:10:"fa-desktop";s:15:"fa-dot-circle-o";s:15:"fa-dot-circle-o";s:11:"fa-download";s:11:"fa-download";s:11:"fa-dribbble";s:11:"fa-dribbble";s:10:"fa-dropbox";s:10:"fa-dropbox";s:8:"fa-eject";s:8:"fa-eject";s:13:"fa-ellipsis-h";s:13:"fa-ellipsis-h";s:13:"fa-ellipsis-v";s:13:"fa-ellipsis-v";s:11:"fa-envelope";s:11:"fa-envelope";s:13:"fa-envelope-o";s:13:"fa-envelope-o";s:9:"fa-eraser";s:9:"fa-eraser";s:6:"fa-eur";s:6:"fa-eur";s:11:"fa-exchange";s:11:"fa-exchange";s:14:"fa-exclamation";s:14:"fa-exclamation";s:21:"fa-exclamation-circle";s:21:"fa-exclamation-circle";s:23:"fa-exclamation-triangle";s:23:"fa-exclamation-triangle";s:9:"fa-expand";s:9:"fa-expand";s:16:"fa-external-link";s:16:"fa-external-link";s:23:"fa-external-link-square";s:23:"fa-external-link-square";s:6:"fa-eye";s:6:"fa-eye";s:12:"fa-eye-slash";s:12:"fa-eye-slash";s:11:"fa-facebook";s:11:"fa-facebook";s:18:"fa-facebook-square";s:18:"fa-facebook-square";s:16:"fa-fast-backward";s:16:"fa-fast-backward";s:15:"fa-fast-forward";s:15:"fa-fast-forward";s:9:"fa-female";s:9:"fa-female";s:14:"fa-fighter-jet";s:14:"fa-fighter-jet";s:7:"fa-file";s:7:"fa-file";s:9:"fa-file-o";s:9:"fa-file-o";s:12:"fa-file-text";s:12:"fa-file-text";s:14:"fa-file-text-o";s:14:"fa-file-text-o";s:10:"fa-files-o";s:10:"fa-files-o";s:7:"fa-film";s:7:"fa-film";s:9:"fa-filter";s:9:"fa-filter";s:7:"fa-fire";s:7:"fa-fire";s:20:"fa-fire-extinguisher";s:20:"fa-fire-extinguisher";s:7:"fa-flag";s:7:"fa-flag";s:17:"fa-flag-checkered";s:17:"fa-flag-checkered";s:9:"fa-flag-o";s:9:"fa-flag-o";s:8:"fa-flask";s:8:"fa-flask";s:9:"fa-flickr";s:9:"fa-flickr";s:11:"fa-floppy-o";s:11:"fa-floppy-o";s:9:"fa-folder";s:9:"fa-folder";s:11:"fa-folder-o";s:11:"fa-folder-o";s:14:"fa-folder-open";s:14:"fa-folder-open";s:16:"fa-folder-open-o";s:16:"fa-folder-open-o";s:7:"fa-font";s:7:"fa-font";s:10:"fa-forward";s:10:"fa-forward";s:13:"fa-foursquare";s:13:"fa-foursquare";s:10:"fa-frown-o";s:10:"fa-frown-o";s:10:"fa-gamepad";s:10:"fa-gamepad";s:8:"fa-gavel";s:8:"fa-gavel";s:6:"fa-gbp";s:6:"fa-gbp";s:7:"fa-gift";s:7:"fa-gift";s:9:"fa-github";s:9:"fa-github";s:13:"fa-github-alt";s:13:"fa-github-alt";s:16:"fa-github-square";s:16:"fa-github-square";s:9:"fa-gittip";s:9:"fa-gittip";s:8:"fa-glass";s:8:"fa-glass";s:8:"fa-globe";s:8:"fa-globe";s:14:"fa-google-plus";s:14:"fa-google-plus";s:21:"fa-google-plus-square";s:21:"fa-google-plus-square";s:11:"fa-h-square";s:11:"fa-h-square";s:14:"fa-hand-o-down";s:14:"fa-hand-o-down";s:14:"fa-hand-o-left";s:14:"fa-hand-o-left";s:15:"fa-hand-o-right";s:15:"fa-hand-o-right";s:12:"fa-hand-o-up";s:12:"fa-hand-o-up";s:8:"fa-hdd-o";s:8:"fa-hdd-o";s:13:"fa-headphones";s:13:"fa-headphones";s:8:"fa-heart";s:8:"fa-heart";s:10:"fa-heart-o";s:10:"fa-heart-o";s:7:"fa-home";s:7:"fa-home";s:13:"fa-hospital-o";s:13:"fa-hospital-o";s:8:"fa-html5";s:8:"fa-html5";s:8:"fa-inbox";s:8:"fa-inbox";s:9:"fa-indent";s:9:"fa-indent";s:7:"fa-info";s:7:"fa-info";s:14:"fa-info-circle";s:14:"fa-info-circle";s:6:"fa-inr";s:6:"fa-inr";s:12:"fa-instagram";s:12:"fa-instagram";s:9:"fa-italic";s:9:"fa-italic";s:6:"fa-jpy";s:6:"fa-jpy";s:6:"fa-key";s:6:"fa-key";s:13:"fa-keyboard-o";s:13:"fa-keyboard-o";s:6:"fa-krw";s:6:"fa-krw";s:9:"fa-laptop";s:9:"fa-laptop";s:7:"fa-leaf";s:7:"fa-leaf";s:10:"fa-lemon-o";s:10:"fa-lemon-o";s:13:"fa-level-down";s:13:"fa-level-down";s:11:"fa-level-up";s:11:"fa-level-up";s:14:"fa-lightbulb-o";s:14:"fa-lightbulb-o";s:7:"fa-link";s:7:"fa-link";s:11:"fa-linkedin";s:11:"fa-linkedin";s:18:"fa-linkedin-square";s:18:"fa-linkedin-square";s:8:"fa-linux";s:8:"fa-linux";s:7:"fa-list";s:7:"fa-list";s:11:"fa-list-alt";s:11:"fa-list-alt";s:10:"fa-list-ol";s:10:"fa-list-ol";s:10:"fa-list-ul";s:10:"fa-list-ul";s:17:"fa-location-arrow";s:17:"fa-location-arrow";s:7:"fa-lock";s:7:"fa-lock";s:18:"fa-long-arrow-down";s:18:"fa-long-arrow-down";s:18:"fa-long-arrow-left";s:18:"fa-long-arrow-left";s:19:"fa-long-arrow-right";s:19:"fa-long-arrow-right";s:16:"fa-long-arrow-up";s:16:"fa-long-arrow-up";s:8:"fa-magic";s:8:"fa-magic";s:9:"fa-magnet";s:9:"fa-magnet";s:17:"fa-mail-reply-all";s:17:"fa-mail-reply-all";s:7:"fa-male";s:7:"fa-male";s:13:"fa-map-marker";s:13:"fa-map-marker";s:9:"fa-maxcdn";s:9:"fa-maxcdn";s:9:"fa-medkit";s:9:"fa-medkit";s:8:"fa-meh-o";s:8:"fa-meh-o";s:13:"fa-microphone";s:13:"fa-microphone";s:19:"fa-microphone-slash";s:19:"fa-microphone-slash";s:8:"fa-minus";s:8:"fa-minus";s:15:"fa-minus-circle";s:15:"fa-minus-circle";s:15:"fa-minus-square";s:15:"fa-minus-square";s:17:"fa-minus-square-o";s:17:"fa-minus-square-o";s:9:"fa-mobile";s:9:"fa-mobile";s:8:"fa-money";s:8:"fa-money";s:9:"fa-moon-o";s:9:"fa-moon-o";s:8:"fa-music";s:8:"fa-music";s:10:"fa-outdent";s:10:"fa-outdent";s:12:"fa-pagelines";s:12:"fa-pagelines";s:12:"fa-paperclip";s:12:"fa-paperclip";s:8:"fa-pause";s:8:"fa-pause";s:9:"fa-pencil";s:9:"fa-pencil";s:16:"fa-pencil-square";s:16:"fa-pencil-square";s:18:"fa-pencil-square-o";s:18:"fa-pencil-square-o";s:8:"fa-phone";s:8:"fa-phone";s:15:"fa-phone-square";s:15:"fa-phone-square";s:12:"fa-picture-o";s:12:"fa-picture-o";s:12:"fa-pinterest";s:12:"fa-pinterest";s:19:"fa-pinterest-square";s:19:"fa-pinterest-square";s:8:"fa-plane";s:8:"fa-plane";s:7:"fa-play";s:7:"fa-play";s:14:"fa-play-circle";s:14:"fa-play-circle";s:16:"fa-play-circle-o";s:16:"fa-play-circle-o";s:7:"fa-plus";s:7:"fa-plus";s:14:"fa-plus-circle";s:14:"fa-plus-circle";s:14:"fa-plus-square";s:14:"fa-plus-square";s:16:"fa-plus-square-o";s:16:"fa-plus-square-o";s:12:"fa-power-off";s:12:"fa-power-off";s:8:"fa-print";s:8:"fa-print";s:15:"fa-puzzle-piece";s:15:"fa-puzzle-piece";s:9:"fa-qrcode";s:9:"fa-qrcode";s:11:"fa-question";s:11:"fa-question";s:18:"fa-question-circle";s:18:"fa-question-circle";s:13:"fa-quote-left";s:13:"fa-quote-left";s:14:"fa-quote-right";s:14:"fa-quote-right";s:9:"fa-random";s:9:"fa-random";s:10:"fa-refresh";s:10:"fa-refresh";s:9:"fa-renren";s:9:"fa-renren";s:9:"fa-repeat";s:9:"fa-repeat";s:8:"fa-reply";s:8:"fa-reply";s:12:"fa-reply-all";s:12:"fa-reply-all";s:10:"fa-retweet";s:10:"fa-retweet";s:7:"fa-road";s:7:"fa-road";s:9:"fa-rocket";s:9:"fa-rocket";s:6:"fa-rss";s:6:"fa-rss";s:13:"fa-rss-square";s:13:"fa-rss-square";s:6:"fa-rub";s:6:"fa-rub";s:11:"fa-scissors";s:11:"fa-scissors";s:9:"fa-search";s:9:"fa-search";s:15:"fa-search-minus";s:15:"fa-search-minus";s:14:"fa-search-plus";s:14:"fa-search-plus";s:8:"fa-share";s:8:"fa-share";s:15:"fa-share-square";s:15:"fa-share-square";s:17:"fa-share-square-o";s:17:"fa-share-square-o";s:9:"fa-shield";s:9:"fa-shield";s:16:"fa-shopping-cart";s:16:"fa-shopping-cart";s:10:"fa-sign-in";s:10:"fa-sign-in";s:11:"fa-sign-out";s:11:"fa-sign-out";s:9:"fa-signal";s:9:"fa-signal";s:10:"fa-sitemap";s:10:"fa-sitemap";s:8:"fa-skype";s:8:"fa-skype";s:10:"fa-smile-o";s:10:"fa-smile-o";s:7:"fa-sort";s:7:"fa-sort";s:17:"fa-sort-alpha-asc";s:17:"fa-sort-alpha-asc";s:18:"fa-sort-alpha-desc";s:18:"fa-sort-alpha-desc";s:18:"fa-sort-amount-asc";s:18:"fa-sort-amount-asc";s:19:"fa-sort-amount-desc";s:19:"fa-sort-amount-desc";s:11:"fa-sort-asc";s:11:"fa-sort-asc";s:12:"fa-sort-desc";s:12:"fa-sort-desc";s:19:"fa-sort-numeric-asc";s:19:"fa-sort-numeric-asc";s:20:"fa-sort-numeric-desc";s:20:"fa-sort-numeric-desc";s:10:"fa-spinner";s:10:"fa-spinner";s:9:"fa-square";s:9:"fa-square";s:11:"fa-square-o";s:11:"fa-square-o";s:17:"fa-stack-exchange";s:17:"fa-stack-exchange";s:17:"fa-stack-overflow";s:17:"fa-stack-overflow";s:7:"fa-star";s:7:"fa-star";s:12:"fa-star-half";s:12:"fa-star-half";s:14:"fa-star-half-o";s:14:"fa-star-half-o";s:9:"fa-star-o";s:9:"fa-star-o";s:16:"fa-step-backward";s:16:"fa-step-backward";s:15:"fa-step-forward";s:15:"fa-step-forward";s:14:"fa-stethoscope";s:14:"fa-stethoscope";s:7:"fa-stop";s:7:"fa-stop";s:16:"fa-strikethrough";s:16:"fa-strikethrough";s:12:"fa-subscript";s:12:"fa-subscript";s:11:"fa-suitcase";s:11:"fa-suitcase";s:8:"fa-sun-o";s:8:"fa-sun-o";s:14:"fa-superscript";s:14:"fa-superscript";s:8:"fa-table";s:8:"fa-table";s:9:"fa-tablet";s:9:"fa-tablet";s:13:"fa-tachometer";s:13:"fa-tachometer";s:6:"fa-tag";s:6:"fa-tag";s:7:"fa-tags";s:7:"fa-tags";s:8:"fa-tasks";s:8:"fa-tasks";s:11:"fa-terminal";s:11:"fa-terminal";s:14:"fa-text-height";s:14:"fa-text-height";s:13:"fa-text-width";s:13:"fa-text-width";s:5:"fa-th";s:5:"fa-th";s:11:"fa-th-large";s:11:"fa-th-large";s:10:"fa-th-list";s:10:"fa-th-list";s:13:"fa-thumb-tack";s:13:"fa-thumb-tack";s:14:"fa-thumbs-down";s:14:"fa-thumbs-down";s:16:"fa-thumbs-o-down";s:16:"fa-thumbs-o-down";s:14:"fa-thumbs-o-up";s:14:"fa-thumbs-o-up";s:12:"fa-thumbs-up";s:12:"fa-thumbs-up";s:9:"fa-ticket";s:9:"fa-ticket";s:8:"fa-times";s:8:"fa-times";s:15:"fa-times-circle";s:15:"fa-times-circle";s:17:"fa-times-circle-o";s:17:"fa-times-circle-o";s:7:"fa-tint";s:7:"fa-tint";s:10:"fa-trash-o";s:10:"fa-trash-o";s:9:"fa-trello";s:9:"fa-trello";s:9:"fa-trophy";s:9:"fa-trophy";s:8:"fa-truck";s:8:"fa-truck";s:6:"fa-try";s:6:"fa-try";s:9:"fa-tumblr";s:9:"fa-tumblr";s:16:"fa-tumblr-square";s:16:"fa-tumblr-square";s:10:"fa-twitter";s:10:"fa-twitter";s:17:"fa-twitter-square";s:17:"fa-twitter-square";s:11:"fa-umbrella";s:11:"fa-umbrella";s:12:"fa-underline";s:12:"fa-underline";s:7:"fa-undo";s:7:"fa-undo";s:9:"fa-unlock";s:9:"fa-unlock";s:13:"fa-unlock-alt";s:13:"fa-unlock-alt";s:9:"fa-upload";s:9:"fa-upload";s:6:"fa-usd";s:6:"fa-usd";s:7:"fa-user";s:7:"fa-user";s:10:"fa-user-md";s:10:"fa-user-md";s:8:"fa-users";s:8:"fa-users";s:15:"fa-video-camera";s:15:"fa-video-camera";s:15:"fa-vimeo-square";s:15:"fa-vimeo-square";s:5:"fa-vk";s:5:"fa-vk";s:14:"fa-volume-down";s:14:"fa-volume-down";s:13:"fa-volume-off";s:13:"fa-volume-off";s:12:"fa-volume-up";s:12:"fa-volume-up";s:8:"fa-weibo";s:8:"fa-weibo";s:13:"fa-wheelchair";s:13:"fa-wheelchair";s:10:"fa-windows";s:10:"fa-windows";s:9:"fa-wrench";s:9:"fa-wrench";s:7:"fa-xing";s:7:"fa-xing";s:14:"fa-xing-square";s:14:"fa-xing-square";s:10:"fa-youtube";s:10:"fa-youtube";s:15:"fa-youtube-play";s:15:"fa-youtube-play";s:17:"fa-youtube-square";s:17:"fa-youtube-square";}';
  $icons = unserialize( $icons );
vc_add_param("vc_tab",
		array(
			'type' => 'dropdown',
			'heading' =>  'Icon',
			'param_name' => "wd_icon",
			"value" =>$icons
			)
		);
vc_add_param("vc_tab",
        array(
            "type" => "checkbox",
            "heading" => esc_html__("Display image instead of icon", "js_composer"),
            "param_name" => "wd_image_checkbox",
            'value' => array( esc_html__( 'Yes, please', 'js_composer' ) => 'yes' ),
        )
        );
vc_add_param("vc_tab",
        array(
            "type" => "attach_image", // it will bind a img choice in WP
            "heading" => esc_html__("Image", "js_composer"),
            "param_name" => "wd_image",
        )
        );
vc_add_param("vc_tab",
        array(
            "type" => "attach_image", // it will bind a img choice in WP
            "heading" => esc_html__("Background Image", "js_composer"),
            "param_name" => "wd_bg_image",
        )
        );
vc_add_param("vc_tab",
        array(
            "type" => "dropdown", // it will bind a img choice in WP
            "heading" => esc_html__("Background position H", "js_composer"),
            "param_name" => "wd_bg_position_h",
            "value" => array(
              "Left" => "left",
              "Right" => "right",
              "Center" => "center"
            ),
        )
        );
vc_add_param("vc_tab",
        array(
            "type" => "dropdown", // it will bind a img choice in WP
            "heading" => esc_html__("Background position V", "js_composer"),
            "param_name" => "wd_bg_position_v",
            "value" => array(
              "Top" => "top",
              "Bottom" => "bottom",
              "Center" => "center"
            ),
        )
        );
vc_add_param("vc_tab",
        array(
            "type" => "dropdown", // it will bind a img choice in WP
            "heading" => esc_html__("Background Repeat", "js_composer"),
            "param_name" => "wd_bg_repeat",
            "value" => array(
              "repeat-x" => "repeat-x",
              "repeat-y" => "repeat-y",
              "repeat" => "repeat-x",
              "no-repeat" => "no-repeat"
            ),
        )
        );


/*============================= Row =====================================*/

vc_add_param("vc_row",
	array(
		'type' => 'colorpicker',
		'heading' => esc_html__( 'Text Color', 'wpb' ),
		'param_name' => 'font_color',
		'description' => esc_html__( 'Select font color', 'wpb' ),
	)
);
vc_add_param("vc_row", array(
  "type" => "checkbox",
  "class" => "",
  "heading" => "Parallax",
  "param_name" => "parallax",
  "value" => array("Use background as parallax ?" => "yes" )
));
vc_add_param("vc_row", array(
	"type" => "textfield",
	"class" => "",
	"heading" => "Parallax Speed",
	"param_name" => "speed",
	'dependency' => array(
		'element' => 'parallax',
		'not_empty' => true,
	),
));
vc_add_param("vc_row", array(
  "type" => "checkbox",
  "class" => "",
  "heading" => "Equal Height Columns",
  "param_name" => "equalizer",
  "value" => array("Create equal height content on your row ?" => "yes" )
));

vc_add_param("vc_row", array(
	"type" => "textfield",
	"class" => "",
	"heading" => "Animation Delay (ms)",
	"param_name" => "animation_delay",
	"description"     => "Animation delay to add to this row children.",
	/*'dependency' => array(
		'element' => 'parallax',
		'not_empty' => true,
	),*/
));

/*============================= Columns  =====================================*/
vc_add_param("vc_column", array(
	"type" => "checkbox",
	"class" => "",
	"heading" => "Equal Height Columns",
	"param_name" => "equalizer_column",
	"value" => array("Create equal height content on your column ?" => "yes" )
));
vc_add_param("vc_column_inner", array(
	"type" => "checkbox",
	"class" => "",
	"heading" => "Equal Height Columns",
	"param_name" => "equalizer_column_inner",
	"value" => array("Create equal height content on your column ?" => "yes" )
));

vc_map( array(
    "name"            => esc_html__("wd_last_post", "js_composer"), // add a name
    "base"            => "wd_last_post", // bind with our shortcode
    "description"     => "You can add a prince table",
    "content_element" => true, // set this parameter when element will has a content
    "is_container"    => FALSE, // set this param when you need to add a content element in this element
    // Here starts the definition of array with parameters of our compnent
    "params" => array( 
        array(
            "type" => "textfield",
            "heading" => esc_html__("Title", "js_composer"),
            "param_name" => "title",
        ), 
        array(
            "type" => "textarea",
            "heading" => esc_html__("Title", "js_composer"),
            "param_name" => "title",
        ),
        
        
    )
) );

/* our client
---------------------------------------------------------- */
vc_map( array(
    "name" => esc_html__("Carousel Client", "js_composer"),
    "base" => "wd_client", 
    "icon" => get_template_directory_uri()."/images/icon/meknes.png",
    "content_element" => true, 
    "is_container" => FALSE,
    "params" => array(         
		array(
			'type' => 'attach_images',
			'heading' => esc_html__( 'Images', 'js_composer' ),
			'param_name' => 'images',
			
		),array(
            "type" => "dropdown", // it will bind a textfield in WP
            "heading" => esc_html__("Columns", "js_composer"),
            "param_name" => "columns",
             "value" => array('1','2','3','4','5','6','7'),
        ),
        $vc_add_css_animation
    )
) );
/* recent blog
---------------------------------------------------------- */
vc_map( array(
    "name" => esc_html__("Recent blog", "js_composer"),
    "base" => "wd_blog", 
    "icon" => get_template_directory_uri()."/images/icon/meknes.png",
    "content_element" => true, 
    "is_container" => FALSE,
     "params" => array( 
     array(
            "type" => "dropdown", // it will bind a textfield in WP
            "heading" => esc_html__("Style", "js_composer"),
            "param_name" => "style",
             "value" => array('Default'=>'style2','Small'=>'style1'),
        ),        
		array(
            "type" => "textfield", // it will bind a textfield in WP
            "heading" => esc_html__("Items to display", "js_composer"),
            "param_name" => "itemperpage",
        ),
    array(
            "type" => "dropdown", // it will bind a textfield in WP
            "heading" => esc_html__("Columns", "js_composer"),
            "param_name" => "columns",
             "value" => array('1','2','3','4','5','6','7'),
        ),
    $vc_add_css_animation
    
        
        )
) );
//-----------------portfolio------------------*/

vc_map( array(
    "name" => esc_html__("Portfolio", "js_composer"),
    "base" => "wd_vc_portfolio", 
    "icon" => get_template_directory_uri()."/images/icon/meknes.png",
    "content_element" => true, 
    "is_container" => FALSE,
    "params" => array(         
		array(
            "type" => "textfield", // it will bind a textfield in WP
            "heading" => esc_html__("Items to display", "js_composer"),
            "param_name" => "itemperpage",
        ),
        array(
            "type" => "textfield", // it will bind a textfield in WP
            "heading" => esc_html__("Show", "js_composer"),
            "param_name" => "number",
        ),
				array(
            "type" => "textfield", // it will bind a textfield in WP
            "heading" => esc_html__("Margin", "js_composer"),
            "param_name" => "margin",
        ),
				array(
            "type" => "dropdown", // it will bind a textfield in WP
            "heading" => esc_html__("Layout", "js_composer"),
            "param_name" => "layout",
             "value" => array('grid'=>'1','carousel'=>'2'),
        ),
        $vc_add_css_animation
    
    )
) );




 
/*---------features----------------
	 vc_map( array(
    "name" => esc_html__("features", "js_composer"), // add a name
    "base" => "features", // bind with our shortcode
    "content_element" => true, // set this parameter when element will has a content
    "is_container" => true, // set this param when you need to add a content element in this element
    // Here starts the definition of array with parameters of our compnent
    "params" => array(
        array(
            "type" => "textfield", // it will bind a textfield in WP
            "heading" => esc_html__("Title", "js_composer"),
            "param_name" => "title",
        ),
 
        array(
            "type" => "textarea", // it will bind a textfield in WP
            "heading" => esc_html__("Text", "js_composer"),
            "param_name" => "text",
        ),
 
        array(
            "type" => "dropdown", // it will bind a textfield in WP
            "heading" => esc_html__("icon", "js_composer"),
            "param_name" => "icon",
            "value" => $icons,
        ),
        array(
            "type" => "dropdown", // it will bind a textfield in WP
            "heading" => esc_html__("style", "js_composer"),
            "param_name" => "style",
            "value" => array('style1','style2'),
        )
    )
) );*/
/*--------------progress bars -------------------------*/
vc_map( array(
    "name" => esc_html__("Progress bars", "js_composer"),
    "base" => "wd_progress_bars", 
    "content_element" => true, 
    "is_container" => true,
    "params" => array( 
        array(
            "type" => "textfield", // it will bind a textfield in WP
            "heading" => esc_html__("Progress bar title", "js_composer"),
            "param_name" => "progress_title1",
        ),
        array(
            "type" => "textfield", // it will bind a textfield in WP
            "heading" => esc_html__("Progress bar longer", "js_composer"),
            "param_name" => "progress_meter1",
        ),
        
        array(
            "type" => "textfield", // it will bind a textfield in WP
            "heading" => esc_html__("Progress bar title", "js_composer"),
            "param_name" => "progress_title2",
        ),
        array(
            "type" => "textfield", // it will bind a textfield in WP
            "heading" => esc_html__("Progress bar longer", "js_composer"),
            "param_name" => "progress_meter2",
        ),
        
        array(
            "type" => "textfield", // it will bind a textfield in WP
            "heading" => esc_html__("Progress bar title", "js_composer"),
            "param_name" => "progress_title3",
        ),
        array(
            "type" => "textfield", // it will bind a textfield in WP
            "heading" => esc_html__("Progress bar longer", "js_composer"),
            "param_name" => "progress_meter3",
        ),
        
        array(
            "type" => "textfield", // it will bind a textfield in WP
            "heading" => esc_html__("Progress bar title", "js_composer"),
            "param_name" => "progress_title4",
        ),
        array(
            "type" => "textfield", // it will bind a textfield in WP
            "heading" => esc_html__("Progress bar longer", "js_composer"),
            "param_name" => "progress_meter4",
        ),
        $vc_add_css_animation
        
    )
) );
/*********---------team--------------------------*/
  vc_map( array(
    "name" => esc_html__("Team", "js_composer"), // add a name
    "base" => "wd_team", // bind with our shortcode
    "icon" => get_template_directory_uri()."/images/icon/meknes.png",
    "content_element" => true, // set this parameter when element will has a content
    "is_container" => FALSE, // set this param when you need to add a content element in this element
    // Here starts the definition of array with parameters of our compnent
    "params" => array( 
        array(
            "type" => "dropdown", // it will bind a textfield in WP
            "heading" => esc_html__("Columns", "js_composer"),
            "param_name" => "columns",
             "value" => array('1','2','3','4','5','6','7'),
        ),
        array(
            "type" => "textfield", // it will bind a textfield in WP
            "heading" => esc_html__("Items Per Page", "js_composer"),
            "param_name" => "itemperpage",
        ),
        $vc_add_css_animation
    )
) );
/*********---------testimonial--------------------------*/
  vc_map( array(
    "name" => esc_html__("Testimonail", "js_composer"), // add a name
    "base" => "wd_testimonial", // bind with our shortcode
    "icon" => get_template_directory_uri()."/images/icon/meknes.png",
    "content_element" => true, // set this parameter when element will has a content
    "is_container" => FALSE, // set this param when you need to add a content element in this element
    // Here starts the definition of array with parameters of our compnent
    "params" => array( 
       
        array(
            "type" => "textfield", // it will bind a textfield in WP
            "heading" => esc_html__("Items Per Page", "js_composer"),
            "param_name" => "itemperpage",
        ),
        array(
            "type" => "dropdown", // it will bind a textfield in WP
            "heading" => esc_html__("Show", "js_composer"),
            "param_name" => "show",
             "value" => array('1','2'),
        ),
        $vc_add_css_animation
    )
) );

/*--------------------one post---------------*/

$posts = get_posts(array('post_type' => 'portfolio'));
$posts_array = array();

foreach ( $posts as $key => $post ) {
	$posts_array[$post->post_title] = $post->ID;
}

vc_map( array(
    "name" => esc_html__("one post", "js_composer"),
    "base" => "wd_one_post", 
    "icon" => get_template_directory_uri()."/images/icon/meknes.png",
    "content_element" => true, 
    "is_container" => FALSE,
    "params" => array(         
		array(
            "type" => "textfield", // it will bind a textfield in WP
            "heading" => esc_html__("Title", "js_composer"),
            "param_name" => "title",
        ),
        array(
            "type" => "textarea", // it will bind a textfield in WP
            "heading" => esc_html__("Description", "js_composer"),
            "param_name" => "discription",
        ),
        array(
            "type" => "textfield", // it will bind a textfield in WP
            "heading" => esc_html__("Link to page", "js_composer"),
            "param_name" => "link",
        ),
        array(
            "type" => "dropdown", // it will bind a textfield in WP
            "heading" => esc_html__("Project", "js_composer"),
            "param_name" => "post_id", 
            "value" => $posts_array,
      			
			  ),
        $vc_add_css_animation
    )
) );

// *******************************************************************
// COUNTUP
// -------------------------------------------------------------------
vc_map( array(
    "name" => esc_html__("Count UP", "js_composer"),
    "base" => "wd_count_up", 
    "icon" => get_template_directory_uri()."/images/icon/meknes.png",
    "content_element" => true, 
    "is_container" => FALSE,
    "params" => array( 
        array(
            "type" => "textfield", // it will bind a textfield in WP
            "heading" => esc_html__("countto", "js_composer"),
            "param_name" => "countto",
        ),
        array(
            "type" => "textfield", // it will bind a textfield in WP
            "heading" => esc_html__("time", "js_composer"),
            "param_name" => "time",
        ),
        array(
            "type" => "checkbox",
            "heading" => esc_html__("Display image instead of icon", "js_composer"),
            "param_name" => "image_checkbox",
            'value' => array( esc_html__( 'Yes, please', 'js_composer' ) => 'yes' ),
        ),
        array(
            "type" => "attach_image", // it will bind a img choice in WP
            "heading" => esc_html__("Image", "js_composer"),
            "param_name" => "image",
        ),
        array(
          'type' => 'dropdown',
          'heading' => esc_html__( 'Icon', 'js_composer' ),
          'param_name' => 'icon',
          'value' => $icons,
          'description' => esc_html__( 'Select the icon to use.', 'js_composer' ),
          'admin_label' => true
        ),
        array(
          'type' => 'dropdown',
          'heading' => esc_html__( 'style', 'js_composer' ),
          'param_name' => 'style',
          'value' => array('style1' => 'Style 1',
                           'style2' => 'Style 2',
                           'style3' => 'Style 3',
                         ),
          'description' => esc_html__( 'Select the icon to use.', 'js_composer' ),
          'admin_label' => true
        ),
        $vc_add_css_animation
    )
) );
// PIE CHART
// -------------------------------------------------------------------
vc_map( array(
    "name" => esc_html__("Pie Chart", "js_composer"),
    "base" => "wd_chart_pie", 
    "icon" => get_template_directory_uri()."/images/icon/meknes.png",
    "content_element" => true, 
    "is_container" => FALSE,
    "params" => array( 
        array(
              "type" => "textfield", // it will bind a textfield in WP
              "heading" => esc_html__("title", "js_composer"),
              "param_name" => "title",
          ),
        array(
            "type" => "textfield", // it will bind a textfield in WP
            "heading" => esc_html__("value", "js_composer"),
            "param_name" => "value",
        ),
        array(
          'type' => 'dropdown',
          'heading' => esc_html__( 'style', 'js_composer' ),
          'param_name' => 'style',
          'value' => array('style1' => 1,
                           'style2' => 2,
                           'style3' => 3,
                         ),
          'description' => esc_html__( 'Select the icon to use.', 'js_composer' ),
          'admin_label' => true
        ),
        $vc_add_css_animation
    )
) );

/* Feature Box
---------------------------------------------------------- */
vc_map( array(
    "name" => esc_html__("Featured Box", "js_composer"),
    "base" => "wd_featured_box",
    "icon" => get_template_directory_uri()."/images/icon/meknes.png",
    "content_element" => true, 
    "is_container" => FALSE,
    "params" => array(
		    array(
			    'type' => 'colorpicker',
			    'heading' => esc_html__( 'Backround Color', 'wpb' ),
			    'param_name' => 'background_color',
			    'description' => esc_html__( 'Select font color', 'wpb' ),
		    ),
        array(
            "type" => "textfield", // it will bind a textfield in WP
            "heading" => esc_html__("Title", "js_composer"),
            "param_name" => "title",
        ),
        array(
            "type" => "textarea", // it will bind a textfield in WP
            "heading" => esc_html__("Text", "js_composer"),
            "param_name" => "text",
        ),
        array(
            "type" => "checkbox",
            "heading" => esc_html__("Display image instead of icon", "js_composer"),
            "param_name" => "image_checkbox",
            'value' => array( esc_html__( 'Yes, please', 'js_composer' ) => 'yes' ),
        ),
        array(
            "type" => "attach_image", // it will bind a img choice in WP
            "heading" => esc_html__("Image", "js_composer"),
            "param_name" => "image",
        ),
        array(
          'type' => 'dropdown',
          'heading' => esc_html__( 'Icon', 'js_composer' ),
          'param_name' => 'icon',
          'value' => $icons,
          'description' => esc_html__( 'Select the icon to use.', 'js_composer' ),
          'admin_label' => true
        ),
        array(
          'type' => 'dropdown',
          'heading' => esc_html__( 'Layout', 'js_composer' ),
          'param_name' => 'layout',
          'value' => array('Layout 1' => 1,
                           'Layout 2' => 2,
                           'Layout 3' => 3,
                           'Layout 4' => 4,
                           'Layout 5' => 5,
                           'Layout 5 inverse' => '5-inverse',
                           'Layout 6' => 6,
                           'Layout 7' => 7,
                           'Layout 8' => 8,
                         ),
          'description' => esc_html__( 'Select the icon to use.', 'js_composer' ),
          'admin_label' => true
        ),
        array(
            "type" => "textfield", // it will bind a textfield in WP
            "heading" => esc_html__("URL to :", "js_composer"),
            "param_name" => "url",
        ),
        array(
            "type" => "textfield", // it will bind a textfield in WP
            "heading" => esc_html__("Extra Classes", "js_composer"),
            "param_name" => "extra_classes",
        ),
	      $vc_add_css_animation
    )
) );

/* Graph
---------------------------------------------------------- */
vc_map( array(
    "name" => esc_html__("Text Block with Icon", "js_composer"),
    "base" => "wd_icon_text",
    "icon" => get_template_directory_uri()."/images/icon/meknes.png",
    "content_element" => true,
    "is_container" => FALSE,
    "params" => array(
        array(
            "type" => "textfield", // it will bind a textfield in WP
            "heading" => esc_html__("Title", "js_composer"),
            "param_name" => "title",
        ),
        array(
            "type" => "textarea", // it will bind a textfield in WP
            "heading" => esc_html__("Text", "js_composer"),
            "param_name" => "text",
        ),
        array(
            "type" => "checkbox",
            "heading" => esc_html__("Display image instead of icon", "js_composer"),
            "param_name" => "image_checkbox",
            'value' => array( esc_html__( 'Yes, please', 'js_composer' ) => 'yes' ),
        ),
        array(
            "type" => "attach_image", // it will bind a img choice in WP
            "heading" => esc_html__("Image", "js_composer"),
            "param_name" => "image",
        ),
        array(
          'type' => 'dropdown',
          'heading' => esc_html__( 'Icon', 'js_composer' ),
          'param_name' => 'icon',
          'value' => $icons,
          'description' => esc_html__( 'Select the icon to use.', 'js_composer' ),
          'admin_label' => true
        ),
        array(
          'type' => 'dropdown',
          'heading' => esc_html__( 'Layout', 'js_composer' ),
          'param_name' => 'layout',
          'value' => array('Layout 1' => 1,
                           'Layout 2' => 2,
                           'Layout 3' => 3,
                           'Layout 4' => 4,
                           'Layout 5' => 5,
                           'Layout 5 inverse' => '5-inverse',
                           'Layout 6' => 6,
                           'Layout 7' => 7,
                           'Layout 8' => 8,
                         ),
          'description' => esc_html__( 'Select the icon to use.', 'js_composer' ),
          'admin_label' => true
        ),
        array(
            "type" => "textfield", // it will bind a textfield in WP
            "heading" => esc_html__("URL to :", "js_composer"),
            "param_name" => "url",
        ),
        array(
            "type" => "textfield", // it will bind a textfield in WP
            "heading" => esc_html__("Extra Classes", "js_composer"),
            "param_name" => "extra_classes",
        ),
	      $vc_add_css_animation
    )
) );
// Flip image
 vc_map( array(
    "name" => esc_html__("Flip image", "js_composer"), // add a name
    "base" => "wd_flip_image", // bind with our shortcode
    "icon" => get_template_directory_uri()."/images/icon/meknes.png",
    "content_element" => true, // set this parameter when element will has a content
    "is_container" => FALSE, // set this param when you need to add a content element in this element
    // Here starts the definition of array with parameters of our compnent
    "params" => array(
        array(
            "type" => "attach_image", // it will bind a img choice in WP
            "heading" => esc_html__("Image", "js_composer"),
            "param_name" => "image",
        ),
 
        array(
            "type" => "textfield", // it will bind a textfield in WP
            "heading" => esc_html__("Title", "js_composer"),
            "param_name" => "title",
        ),
        array(
            "type" => "textarea", // it will bind a textarea in WP
            "heading" => esc_html__("Text", "js_composer"),
            "param_name" => "text",
        ),
        $vc_add_css_animation
    )
) );


 vc_map( array(
    "name" => esc_html__("Wd Modal", "js_composer"), // add a name
    "base" => "wd_modal", // bind with our shortcode
    "icon" => get_template_directory_uri()."/images/icon/meknes.png",
    "content_element" => true, // set this parameter when element will has a content
    "is_container" => FALSE, // set this param when you need to add a content element in this element
    // Here starts the definition of array with parameters of our compnent
    "params" => array(
 
        array(
            "type" => "textarea_html", // it will bind a textfield in WP
            "heading" => esc_html__("Title", "js_composer"),
            "param_name" => "title",
        ),
        array(
            "type" => "textarea", // it will bind a textarea in WP
            "heading" => esc_html__("Text", "js_composer"),
            "param_name" => "text",
        )
    )
) );











 
// This function provides a functionality of adding content elements into element
class WPBakeryShortCode_SC_Slide extends WPBakeryShortCodesContainer {}