<?php


define('THEME_URL', get_template_directory_uri());
define('ASSETS_URL', THEME_URL .'/assets/');
define('CSS_URL', ASSETS_URL.'css/');
define('JS_URL', ASSETS_URL.'js/');
define('IMAGE_URL', ASSETS_URL.'images/');

function load_files_in_folder($folder_path){
	$folder_path .= substr($folder_path,-1) == '/' ? '' : '/';
	$folder_path .= '*.php';
	foreach(glob($folder_path) as $file_path){
		require_once $file_path;
	}
}
load_files_in_folder(get_template_directory().'/inc/hooks/');
load_files_in_folder(get_template_directory().'/inc/classes/');
load_files_in_folder(get_template_directory().'/inc/register/');



// This theme requires WordPress 5.3 or later.
if ( version_compare( $GLOBALS['wp_version'], '5.3', '<' ) ) {
	require get_template_directory() . '/inc/back-compat.php';
}

if ( ! function_exists( 'wptheme_setup' ) ) {
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 *
	 * @since Twenty Twenty-One 1.0
	 *
	 * @return void
	 */
	function wptheme_setup() {

		load_theme_textdomain( 'wptheme', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		add_theme_support( 'title-tag' );

		/**
		 * Add post-formats support.
		 */
		add_theme_support(
			'post-formats',
			array(
				'link',
				'aside',
				'gallery',
				'image',
				'quote',
				'status',
				'video',
				'audio',
				'chat',
			)
		);

		register_nav_menus(
			array(
				'primary' => esc_html__( 'Primary menu', 'wptheme' ),
				'footer'  => esc_html__( 'Secondary menu', 'wptheme' ),
			)
		);

		add_theme_support(
			'html5',
			array(
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
				'navigation-widgets',
			)
		);

		add_theme_support( 'post-thumbnails' );

		set_post_thumbnail_size( 470, 221, true);
		add_image_size('product', 370, 285, true);

		// Remove feed icon link from legacy RSS widget.
		add_filter( 'rss_widget_feed_link', '__return_false' );
	}
}
add_action( 'after_setup_theme', 'wptheme_setup' );

function wptheme_scripts() {

	wp_enqueue_style('main', ASSETS_URL .'build/main.css', array(), '0.0.3');

	wp_enqueue_script('jquery');

	wp_enqueue_script('slick', JS_URL .'slick.min.js', array(), '1.0', true );

	wp_enqueue_script('main', JS_URL .'main.js', array(), '1.0', true );

}
add_action( 'wp_enqueue_scripts', 'wptheme_scripts' );

// Remove or unregister unused WordPress Image Sizes
function wptheme_remove_custom_image_sizes() {
	remove_image_size('1536x1536');
	remove_image_size('2048x2048');
	remove_image_size('medium_large');
}
// Hook the function
add_filter('init', 'wptheme_remove_custom_image_sizes', 99, 2);

function get_acf_option($field_name){
	return get_field($field_name, 'option');
}

function get_acf_flexible_section($sections = [],$section_name = ''){
	if(empty($sections)){
		return $sections;
	}
	$section_data = [];
	foreach($sections as $section){
		if($section['acf_fc_layout'] == $section_name){
			$section_data = $section;
			unset($section_data['acf_fc_layout']);
			break;
		}
	}
	return $section_data;
}

function get_acf_flexible_content($flexible_content, $layout_name){

	if (empty($flexible_content)) {
		return [];
	}

	foreach($flexible_content as $index => $info){
		if($info['acf_fc_layout'] == $layout_name ){
			unset($info['acf_fc_layout']);
			return $info;
		}
	}
	return [];
}

function render_image($attrs = []) {
	$default_attrs = [
		'src' => null,
		'alt' => null
	];
	$attrs = array_merge($default_attrs, $attrs);
	if (empty($attrs['src'])) {
		return false;
	}

	$attrs_str = '';
	foreach ($attrs as $name => $val) {
		$attrs_str .= ' '.$name.'="'.$val.'"';
	}

	echo '<img'.$attrs_str.' >';
}


function get_page_id_by_template($template_path){
	$args = [
		'post_type' => 'page',
		'fields' => 'ids',
		'nopaging' => true,
		'meta_key' => '_wp_page_template',
		'meta_value' => $template_path
	];

	$post_id = get_posts( $args );
	return !empty($post_id) ? $post_id[0] : 0;
}