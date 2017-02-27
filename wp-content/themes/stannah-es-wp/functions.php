<?php
/*
*   Author(s): James Morris
*
*   STANNAH US FUNCTIONS FILE
*/

	//Add localisation
	/* NOTE: Locale per nextwork site. Users should choose perfered lang for their prefs */
	add_action('after_setup_theme', 'add_langs');
	function add_langs(){
	    load_theme_textdomain('stannah-whitelabel', get_template_directory() . '/languages');
	}

	// Register Sidebar
	function utils_sidebar() {

		$args = array(
			'id'            => 'utils-sidebar',
			'name'          => __( 'Utilities bar', 'stannah-whitelabel' ),
			'description'   => __( 'Appears on all pages and posts above the header', 'stannah-whitelabel' ),
			'before_title'  => '',
			'after_title'   => '',
			'before_widget' => '<div id="%1$s" class="widget utils-bar %2$s">',
			'after_widget'  => '</div>',
		);
		register_sidebar( $args );

	}

	// Hook into the 'widgets_init' action
	add_action( 'widgets_init', 'utils_sidebar' );

    /* Give menus an active selector */
    function mark_active_menu_item( $subject, $indicator ) {
      $menu = explode( "current-menu-item", $subject );
      return $menu[0] . preg_replace( '/href/', 'class="' . $indicator . '" href', $menu[1], 1 );
    }



    // Register Custom Taxonomy
    function product_taxonomy() {

        $labels = array(
            'name'                       => _x( 'Product type', 'Taxonomy General Name', 'stannah-whitelabel' ),
            'singular_name'              => _x( 'Product type', 'Taxonomy Singular Name', 'stannah-whitelabel' ),
            'menu_name'                  => __( 'Product types', 'stannah-whitelabel' ),
            'all_items'                  => __( 'All Items', 'stannah-whitelabel' ),
            'parent_item'                => __( 'Parent Item', 'stannah-whitelabel' ),
            'parent_item_colon'          => __( 'Parent Item:', 'stannah-whitelabel' ),
            'new_item_name'              => __( 'New Item Name', 'stannah-whitelabel' ),
            'add_new_item'               => __( 'Add New Item', 'stannah-whitelabel' ),
            'edit_item'                  => __( 'Edit Item', 'stannah-whitelabel' ),
            'update_item'                => __( 'Update Item', 'stannah-whitelabel' ),
            'view_item'                  => __( 'View Item', 'stannah-whitelabel' ),
            'separate_items_with_commas' => __( 'Separate items with commas', 'stannah-whitelabel' ),
            'add_or_remove_items'        => __( 'Add or remove items', 'stannah-whitelabel' ),
            'choose_from_most_used'      => __( 'Choose from the most used', 'stannah-whitelabel' ),
            'popular_items'              => __( 'Popular Items', 'stannah-whitelabel' ),
            'search_items'               => __( 'Search Items', 'stannah-whitelabel' ),
            'not_found'                  => __( 'Not Found', 'stannah-whitelabel' ),
        );
        $args = array(
            'labels'                     => $labels,
            'hierarchical'               => true,
            'public'                     => true,
            'show_ui'                    => true,
            'show_admin_column'          => true,
            'show_in_nav_menus'          => false,
            'show_tagcloud'              => false,
        );
        register_taxonomy( 'product_type', array( 'product' ), $args );

    }
    add_action( 'init', 'product_taxonomy' );

	// change the #3 to the user id
	$user = new WP_User( 11 );
	$user->add_cap( 'manage_options');

	//Create Product post type
	add_action( 'init', 'create_product_post' );
	function create_product_post() {
        register_post_type( 'product',
	    	array(
	      		'labels' => array(
	        	'name' => __( 'Products', 'stannah-whitelabel' ),
	        	'singular_name' => __( 'Product', 'stannah-whitelabel' )
	      	),
                'public' => true,
                'has_archive' => true,
                'rewrite' => array(
                    'slug'                       => 'producto',
                    'with_front'                 => true,
                    'hierarchical'               => true,
                )
            )
        );
    }

	//Create options page via Advanced custom fields plugin
	if( function_exists('acf_add_options_page') ) {

		acf_add_options_page('Site settings');
		acf_add_options_page('Content blocks');

	}

	//Set the cookie on the page
 //    function set_cookie_dealer($name, $value) {
 //    	//unset($_COOKIE[$name]);
 //    	setcookie($name, $value, time() + (10 * 365 * 24 * 60 * 60), "/");
 //    }
	// add_action( 'init', 'set_cookie_dealer' );

	// Add support for feature images
	add_theme_support( 'post-thumbnails' );

	// Add support for the header's navigation
	function register_main_menu() {
		register_nav_menu('main-menu',__( 'Main Menu', 'stannah-whitelabel' ));
	}
	add_action( 'init', 'register_main_menu' );

	// Add support for the footer's navigation
	function register_footer_menu() {
		register_nav_menu('footer-menu',__( 'Footer Menu', 'stannah-whitelabel' ));
	}
	add_action( 'init', 'register_footer_menu' );

	// Build basic email from post array
	function build_email_message($post_array) {
		//Some contants in our email
		$message = "<h2>". $post_array['submitted'] . $post_array['brochure-submitted'] ."</h2>";
		$message .= __('Sent:','stannah-whitelabel') . " " . date("Y-m-d H:i:s") . "<br /><br />";
		$message .= "<style> table { border: 1px solid #eee; border-collapse: collapse; } table td { padding: 5px; border: 1px solid #eee } </style>";
		$message .= "<table>";
		foreach ($_POST as $key => $value) {
			//Build the message
			if ($key != "submitted" || $key != "brochure-submitted") {
				$message .= "<tr><td>". mb_strtoupper($key) . ":</td><td>" . strip_tags($value) . "</td></tr>";
			}

		}
		$message .= "</table>";
		send_email_message($message, $_SERVER['SERVER_NAME'].': ' . $post_array['submitted']);
	}

	// Send the email message
    function send_email_message($body, $subject) {
    	// Headers example from https://css-tricks.com/sending-nice-html-email-with-php/
		$headers .= "MIME-Version: 1.0\r\n";
		$headers .= "Content-Type: text/html; charset=UTF-8\r\n";
    	if(check_url_for_string('.local') != false ) {
    		//For debuggin
    		$email_contact = 'james.morris@bunnyfoot.com';
    		$email_warrenty = 'james.morris@bunnyfoot.com';
    	} else {
    		$email_contact = 'stannah@stannah-stairlifts.com';
    		$email_warrenty = 'stannahincwarranty@gmail.com';
    	}
        $website = __('Website:', 'stannah-whitelabel');
    	if ( $subject == "Warranty Registration" ) {
    		//Warranty form emails to:
    		wp_mail( $email_warrenty, $website . " " . $subject , $body, $headers );
    	} else {
    		//Any other emails:
    		wp_mail( $email_contact, $website . " " . $subject , $body, $headers );
    	}
    }

    //Search for a string in the URL returns strstrs() return values
    function check_url_for_string($search_string) {
    	return strstr($_SERVER['SERVER_NAME'], $search_string);
    }

    // Reduce the excerpt length
	function custom_excerpt_length( $length ) {
		return 18;
	}
	add_filter( 'excerpt_length', 'custom_excerpt_length', 10 );

	// Change the excerpt ending text
	function new_excerpt_more( $more ) {
		return '...';
	}
	add_filter('excerpt_more', 'new_excerpt_more');

	//Work out pagination results range
	function pagination_range($is_page_one, $posts_per_page, $num_of_results_on_page, $paged_number) {
		$range;
		if (isset($is_page_one)) {
			$range = "1 - " . $num_of_results_on_page;
			return $range;
		} else {
			$posts_before_now = $posts_per_page * ($paged_number - 1);
			echo $paged_number;
			echo "<br />" . $posts_before_now . "<br />";
			$range = ($posts_before_now + 1) . " - " . ($posts_before_now + $num_of_results_on_page);
		    return $range;
		}
	}

	//Add support for dealer images
    add_image_size( "dealer-image", 470, 285 );

    //ACF coded fields and configuration
    include 'includes/acf-field-conf.php';
