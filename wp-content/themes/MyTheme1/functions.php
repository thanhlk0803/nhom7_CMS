<?php


// SET UP - DEFINE
define('THEME_URI',get_theme_file_uri( ));
define('THEME_PATH',get_theme_file_path( ));


// INCLUDES
include(get_theme_file_path().'/includes/enqueue.php');
include(get_theme_file_path('/includes/setup.php'));
include(get_theme_file_path('/includes/class-glw-custom-nav-walker.php'));
include(get_theme_file_path('/includes/register-sidebars.php'));
include(get_theme_file_path('/includes/custom-post-content.php'));
include(get_theme_file_path('/includes/pagination.php'));

// HOOK ACTION -FILTER
add_action('wp_enqueue_scripts','glw_enqueue');
add_action( 'init', 'glw_theme_setup' );
add_action( 'widgets_init', 'glw_sidebars_init' );



// SHORTCODE
?>
