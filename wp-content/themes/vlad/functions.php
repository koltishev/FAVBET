<?php
/**
 * vlad functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package vlad
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function vlad_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on vlad, use a find and replace
		* to change 'vlad' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'vlad', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
	add_theme_support( 'title-tag' );

	/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'menu-1' => esc_html__( 'Primary', 'vlad' ),
		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'vlad_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action( 'after_setup_theme', 'vlad_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function vlad_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'vlad_content_width', 640 );
}
add_action( 'after_setup_theme', 'vlad_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function vlad_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'vlad' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'vlad' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'vlad_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function vlad_scripts() {
	wp_enqueue_style( 'vlad-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'vlad-style', 'rtl', 'replace' );

	wp_enqueue_script( 'vlad-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	wp_enqueue_script( 'vlad-filter', get_template_directory_uri() . '/js/filter.js', array(), _S_VERSION, true );

	wp_localize_script( 'vlad-filter', 'myajax',
		array(
			'url' => admin_url('admin-ajax.php')
		)
	);
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'vlad_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}


// Register Custom Post Type
// Register Custom Post Type
function create_vacancies_cpt() {

    $labels = array(
        'name'                  => _x( 'Vacancies', 'Post Type General Name', 'text_domain' ),
        'singular_name'         => _x( 'Vacancy', 'Post Type Singular Name', 'text_domain' ),
        'menu_name'             => __( 'Vacancies', 'text_domain' ),
        'name_admin_bar'        => __( 'Vacancy', 'text_domain' ),
        'archives'              => __( 'Vacancy Archives', 'text_domain' ),
        'attributes'            => __( 'Vacancy Attributes', 'text_domain' ),
        'parent_item_colon'     => __( 'Parent Vacancy:', 'text_domain' ),
        'all_items'             => __( 'All Vacancies', 'text_domain' ),
        'add_new_item'          => __( 'Add New Vacancy', 'text_domain' ),
        'add_new'               => __( 'Add New', 'text_domain' ),
        'new_item'              => __( 'New Vacancy', 'text_domain' ),
        'edit_item'             => __( 'Edit Vacancy', 'text_domain' ),
        'update_item'           => __( 'Update Vacancy', 'text_domain' ),
        'view_item'             => __( 'View Vacancy', 'text_domain' ),
        'view_items'            => __( 'View Vacancies', 'text_domain' ),
        'search_items'          => __( 'Search Vacancies', 'text_domain' ),
        'not_found'             => __( 'Not found', 'text_domain' ),
        'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
        'featured_image'        => __( 'Featured Image', 'text_domain' ),
        'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
        'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
        'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
        'insert_into_item'      => __( 'Insert into vacancy', 'text_domain' ),
        'uploaded_to_this_item' => __( 'Uploaded to this vacancy', 'text_domain' ),
        'items_list'            => __( 'Vacancies list', 'text_domain' ),
        'items_list_navigation' => __( 'Vacancies list navigation', 'text_domain' ),
        'filter_items_list'     => __( 'Filter vacancies list', 'text_domain' ),
    );
    $args = array(
        'label'                 => __( 'Vacancy', 'text_domain' ),
        'description'           => __( 'A job vacancy at our company', 'text_domain' ),
        'labels'                => $labels,
        'supports'              => array( 'title', 'editor', 'excerpt', 'thumbnail', 'revisions', 'custom-fields' ),
        'taxonomies'            => array( 'department' ),
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 5,
        'menu_icon'             => 'dashicons-businessman',
        'show_in_admin_bar'     => true,
        'show_in_nav_menus' => false,
        'can_export' => true,
        'has_archive' => true,
        'exclude_from_search' => false,
        'publicly_queryable' => true,
        'capability_type' => 'post',
    );
    register_post_type( 'vacancies', $args );

}
add_action( 'init', 'create_vacancies_cpt', 0);



$labels = array(
    'name'                       => _x( 'Departments', 'Taxonomy General Name', 'text_domain' ),
    'singular_name'              => _x( 'Department', 'Taxonomy Singular Name', 'text_domain' ),
    'menu_name'                  => __( 'Departments', 'text_domain' ),
    'all_items'                  => __( 'All Departments', 'text_domain' ),
    'parent_item'                => __( 'Parent Department', 'text_domain' ),
    'parent_item_colon'          => __( 'Parent Department:', 'text_domain' ),
    'new_item_name'              => __( 'New Department Name', 'text_domain' ),
    'add_new_item'               => __( 'Add New Department', 'text_domain' ),
    'edit_item'                  => __( 'Edit Department', 'text_domain' ),
    'update_item'                => __( 'Update Department', 'text_domain' ),
    'view_item'                  => __( 'View Department', 'text_domain' ),
    'separate_items_with_commas' => __( 'Separate departments with commas', 'text_domain' ),
    'add_or_remove_items'        => __( 'Add or remove departments', 'text_domain' ),
    'choose_from_most_used'      => __( 'Choose from the most used', 'text_domain' ),
    'popular_items'              => __( 'Popular Departments', 'text_domain' ),
    'search_items'               => __( 'Search Departments', 'text_domain' ),
    'not_found'                  => __( 'Not Found', 'text_domain' ),
    'no_terms'                   => __( 'No departments', 'text_domain' ),
    'items_list'                 => __( 'Departments list', 'text_domain' ),
    'items_list_navigation'      => __( 'Departments list navigation', 'text_domain' ),
);
$args = array(
    'labels'                     => $labels,
    'hierarchical'               => true,
    'public'                     => true,
    'show_ui'                    => true,
    'show_admin_column'          => true,
    'show_in_nav_menus'          => true,
    'show_tagcloud'              => false,
);
register_taxonomy( 'department', array( 'vacancies' ), $args );


function get_filtered_posts()
{
	$args = array(
		'post_type' => 'vacancies',
		'posts_per_page' => -1,
		'tax_query' => array(),
		'meta_query' => array(),
		'post_status' => 'publish',
	);
	if (!empty($_POST['category_name'])) {
		$args['tax_query'][] = array(
			'taxonomy' => 'department',
			'field' => 'slug',
			'terms' => $_POST['category_name'],
		);
	}
	if (!empty($_POST['salary_range'])) {
		$salary_range = sanitize_text_field($_POST['salary_range']);
		$salary_min = intval(explode('-', $salary_range)[0]);
		$salary_max = intval(explode('-', $salary_range)[1]);
		$args['meta_query'][] = array(
			'key' => 'salary',
			'value' => array($salary_min, $salary_max),
			'type' => 'numeric',
			'compare' => 'BETWEEN',
		);
	}

	$posts = get_posts($args);

	$data = array();

	foreach ($posts as $post) {
		$post_title = get_the_title($post->ID);
		$post_link = get_permalink($post->ID);
		$post_date = get_the_date('', $post->ID);
		$post_content = apply_filters('the_content', $post->post_content);
		$salary = get_post_meta($post->ID, 'salary', true);
		$location = get_post_meta($post->ID, 'location', true);
		$phone = get_post_meta($post->ID, 'phone', true);
		$department = get_the_terms($post->ID, 'department');
		$data[] = array(
			'title' => $post_title,
			'link' => $post_link,
			'date' => $post_date,
			'location' => $location,
			'content' => $post_content,
			'department' => $department,
			'phone' => $phone,
			'salary' => $salary,
		);
	}

	wp_send_json($data);
	wp_die();
}

add_action('wp_ajax_get_filtered_posts', 'get_filtered_posts');
add_action('wp_ajax_nopriv_get_filtered_posts', 'get_filtered_posts');
