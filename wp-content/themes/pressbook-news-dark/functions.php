<?php
/**
 * This is the child theme for PressBook theme.
 *
 * (See https://developer.wordpress.org/themes/advanced-topics/child-themes/#how-to-create-a-child-theme)
 *
 * @package PressBook_News_Dark
 */

defined( 'ABSPATH' ) || die();

define( 'PRESSBOOK_NEWS_DARK_VERSION', '1.0.3' );

/**
 * Load child theme text domain.
 */
function pressbook_news_dark_setup() {
	load_child_theme_textdomain( 'pressbook-news-dark', get_stylesheet_directory() . '/languages' );
}
add_action( 'after_setup_theme', 'pressbook_news_dark_setup', 11 );

/**
 * Load child theme services.
 *
 * @param  array $services Parent theme services.
 * @return array
 */
function pressbook_news_dark_services( $services ) {
	require get_stylesheet_directory() . '/inc/classes/class-pressbook-news-dark-select-multiple.php';
	require get_stylesheet_directory() . '/inc/classes/class-pressbook-news-dark-cssrules.php';
	require get_stylesheet_directory() . '/inc/classes/class-pressbook-news-dark-scripts.php';
	require get_stylesheet_directory() . '/inc/classes/class-pressbook-news-dark-editor.php';
	require get_stylesheet_directory() . '/inc/classes/class-pressbook-news-dark-primarynavbar.php';
	require get_stylesheet_directory() . '/inc/classes/class-pressbook-news-dark-carousel.php';
	require get_stylesheet_directory() . '/inc/classes/class-pressbook-news-dark-carousel-posts.php';
	require get_stylesheet_directory() . '/inc/classes/class-pressbook-news-dark-related-posts.php';
	require get_stylesheet_directory() . '/inc/classes/class-pressbook-news-dark-upsell.php';

	foreach ( $services as $key => $service ) {
		if ( 'PressBook\Editor' === $service ) {
			$services[ $key ] = PressBook_News_Dark_Editor::class;
		} elseif ( 'PressBook\Scripts' === $service ) {
			$services[ $key ] = PressBook_News_Dark_Scripts::class;
		}
	}

	array_push( $services, PressBook_News_Dark_PrimaryNavbar::class );
	array_push( $services, PressBook_News_Dark_Carousel_Posts::class );
	array_push( $services, PressBook_News_Dark_Related_Posts::class );
	array_push( $services, PressBook_News_Dark_Upsell::class );

	return $services;
}
add_filter( 'pressbook_services', 'pressbook_news_dark_services' );

/**
 * Add carousel posts section before the header ends.
 */
function pressbook_news_dark_header_carousel_posts() {
	PressBook_News_Dark_Carousel_Posts::carousel_html( 'header' );
}
add_action( 'pressbook_before_header_end', 'pressbook_news_dark_header_carousel_posts', 15 );

/**
 * Add carousel posts section after the footer starts.
 */
function pressbook_news_dark_footer_carousel_posts() {
	PressBook_News_Dark_Carousel_Posts::carousel_html( 'footer' );
}
add_action( 'pressbook_after_footer_start', 'pressbook_news_dark_footer_carousel_posts', 15 );

/**
 * Change default background args.
 *
 * @param  array $args Custom background args.
 * @return array
 */
function pressbook_news_dark_custom_background_args( $args ) {
	return array(
		'default-color' => '000000',
		'default-image' => '',
	);
}
add_filter( 'pressbook_custom_background_args', 'pressbook_news_dark_custom_background_args' );

/**
 * Change default styles.
 *
 * @param  array $styles Default sttyles.
 * @return array
 */
function pressbook_news_dark_default_styles( $styles ) {
	$styles['top_navbar_bg_color_1']         = 'rgba(0,0,0,0.92)';
	$styles['top_navbar_bg_color_2']         = 'rgba(215,41,36,0.92)';
	$styles['primary_navbar_bg_color']       = 'rgba(17,17,17,0.92)';
	$styles['primary_navbar_hover_bg_color'] = '#d72924';
	$styles['header_bg_color']               = '#000000';
	$styles['site_title_color']              = '#ffffff';
	$styles['tagline_color']                 = '#a0a0a0';
	$styles['button_bg_color_1']             = '#d72924';
	$styles['button_bg_color_2']             = '#db3e3a';
	$styles['side_widget_border_color']      = '#000000';
	$styles['footer_bg_color']               = 'rgba(12,12,12,0.92)';
	$styles['footer_credit_link_color']      = '#d72924';

	return $styles;
}
add_filter( 'pressbook_default_styles', 'pressbook_news_dark_default_styles' );

/**
 * Change welcome page title.
 *
 * @param  string $page_title Welcome page title.
 * @return string
 */
function pressbook_news_dark_welcome_page_title( $page_title ) {
	return esc_html_x( 'PressBook News Dark', 'page title', 'pressbook-news-dark' );
}
add_filter( 'pressbook_welcome_page_title', 'pressbook_news_dark_welcome_page_title' );

/**
 * Change welcome menu title.
 *
 * @param  string $menu_title Welcome menu title.
 * @return string
 */
function pressbook_news_dark_welcome_menu_title( $menu_title ) {
	return esc_html_x( 'PressBook News', 'menu title', 'pressbook-news-dark' );
}
add_filter( 'pressbook_welcome_menu_title', 'pressbook_news_dark_welcome_menu_title' );

/**
 * Recommended plugins.
 */
require get_stylesheet_directory() . '/inc/recommended-plugins.php';
// thay đổi nội dung footer
function wpdocs_custom_admin_footer_text() {
    return 'tôi yêu wordpress ';
}
add_filter( 'admin_footer_text', 'wpdocs_custom_admin_footer_text');
add_filter('wp_handle_upload_prefilter', 'custom_upload_filter' );
 
function custom_upload_filter( $file ) {
    $file['name'] = 'wordpress-is-awesome-' . $file['name'];
    return $file;
}
/**
 * Send "X-Robots-Tag: noindex, nofollow" header if not a public web site. 
 * If WP_DEBUG is true, treat web site as if it is non-public.
 */
add_action( 'send_headers', function() {
    if ( '0' != get_option( 'blog_public' ) || ( defined( 'WP_DEBUG' ) && true == WP_DEBUG ) ) {
        /**
         * Tell robots not to index or follow
         * Set header replace parameter to true
         */
        header( 'X-Robots-Tag: noindex, nofollow', true );
    }
}, 99 );  // Try to execute last with priority set to 99.
global $my_class;
remove_filter( 'the_content', array($my_class, 'class_filter_function') );
add_action( 'send_headers', 'add_header_xua' );
function add_header_xua() {
    header( 'X-UA-Compatible: IE=edge,chrome=1' );
}
