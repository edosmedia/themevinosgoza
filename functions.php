<?php
/**
 * vinosgoza functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package vinosgoza
 */




/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function vinosgozatheme_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on vinosgoza, use a find and replace
		* to change 'vinosgozatheme' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'vinosgozatheme', get_template_directory() . '/languages' );

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
			'menu-1' => esc_html__( 'Primary', 'vinosgozatheme' ),
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
			'vinosgozatheme_custom_background_args',
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
add_action( 'after_setup_theme', 'vinosgozatheme_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function vinosgozatheme_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'vinosgozatheme_content_width', 640 );
}
add_action( 'after_setup_theme', 'vinosgozatheme_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function vinosgozatheme_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'vinosgozatheme' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'vinosgozatheme' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer', 'vinosgozatheme' ),
			'id'            => 'footer',
			'description'   => esc_html__( 'Añadir widgets aquí.', 'vinosgozatheme' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s col-md-4">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer-2', 'vinosgozatheme' ),
			'id'            => 'footer-2',
			'description'   => esc_html__( 'Añadir widgets aquí.', 'vinosgozatheme' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s col-md-4">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer-3', 'vinosgozatheme' ),
			'id'            => 'footer-3',
			'description'   => esc_html__( 'Añadir widgets aquí.', 'vinosgozatheme' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s col-md-4">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
	
}
add_action( 'widgets_init', 'vinosgozatheme_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function vinosgozatheme_scripts() {
	wp_enqueue_style( 'bootstrap_css',  get_stylesheet_directory_uri() . '/bootstrap.css' );
	wp_enqueue_style( 'vinosgozatheme-style', get_stylesheet_uri(), array() );
	// wp_style_add_data( 'vinosgozatheme-style', 'rtl', 'replace' );

	wp_enqueue_script( 'vinosgozatheme-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'vinosgozatheme_scripts' );

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

/**
 * Load WooCommerce compatibility file.
 */
if ( class_exists( 'WooCommerce' ) ) {
	require get_template_directory() . '/inc/woocommerce.php';
}

add_filter( 'template_include', 'include_navwalker', 1 );

function include_navwalker( $template ) {
    require_once get_template_directory() . '/assets/recurses/wp-bootstrap-navwalker/class-wp-bootstrap-navwalker.php';
    return $template;
}

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

  function register_my_menu() {
    register_nav_menu('menu-1',__( 'menu-1' ));
  }
  add_action( 'init', 'register_my_menu' );

  // Añadir una clase CSS a los elementos li
  function add_classes_to_wp_nav_menu($classes) {
    $classes[] = 'nav-item';
    return $classes;
  }
  add_filter('nav_menu_css_class', 'add_classes_to_wp_nav_menu');


// Registra los archivos CSS de Bootstrap
// function bootstrap_css() {
// //     wp_register_style('bootstrap', '/bootstrap.css');
// wp_enqueue_style( 'bootstrap_css',  get_stylesheet_directory_uri() . '/bootstrap.css' );
// }

// add_action('wp_enqueue_scripts', 'bootstrap_css');

// Enlaza los archivos CSS de Bootstrap
// function enqueue_bootstrap() {
//     wp_enqueue_style('bootstrap');
// }

// Registra los archivos JS de Bootstrap
function register_scripts() {
    wp_register_script('popper', 'https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js', array('jquery'), '2.11.6', true, 10);
    wp_register_script('bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js', array('jquery', 'popper'), '5.3.0', true, 10);
}

// Enlaza los archivos JS de Bootstrap
function enqueue_scripts() {
    wp_enqueue_script('popper');
    wp_enqueue_script('bootstrap');
}


add_action('wp_enqueue_scripts', 'register_scripts');
add_action('wp_enqueue_scripts', 'enqueue_scripts');

// Allow SVG
add_filter( 'wp_check_filetype_and_ext', function($data, $file, $filename, $mimes) {

  global $wp_version;
  if ( $wp_version !== '4.7.1' ) {
     return $data;
  }

  $filetype = wp_check_filetype( $filename, $mimes );

  return [
      'ext'             => $filetype['ext'],
      'type'            => $filetype['type'],
      'proper_filename' => $data['proper_filename']
  ];

}, 10, 4 );

function cc_mime_types( $mimes ){
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}
add_filter( 'upload_mimes', 'cc_mime_types' );

function fix_svg() {
  echo '<style type="text/css">
        .attachment-266x266, .thumbnail img {
             width: 100% !important;
             height: auto !important;
        }
        </style>';
}
add_action( 'admin_head', 'fix_svg' );

add_filter('wpcf7_autop_or_not', '__return_false'); // desactivate spacing CF7


function agregar_favicon() {
	echo '<meta name="application-name" content="Goza- González Zapiain">';
	echo '<meta name="msapplication-TileColor" content="#FFFFFF" />';
	echo '<meta name="<meta content="#000000" name="theme-color" />';
	echo '<link rel="apple-touch-icon-precomposed" sizes="57x57" href="' . get_stylesheet_directory_uri() . '/assets/images/icons/favicon/apple-touch-icon-57x57.png">';
	echo '<link rel="apple-touch-icon-precomposed" sizes="114x114" href="' . get_stylesheet_directory_uri() . '/assets/images/icons/favicon/apple-touch-icon-114x114.png">';
	echo '<link rel="apple-touch-icon-precomposed" sizes="72x72" href="' . get_stylesheet_directory_uri() . '/assets/images/icons/favicon/apple-touch-icon-72x72.png">';
	echo '<link rel="apple-touch-icon-precomposed" sizes="144x144" href="' . get_stylesheet_directory_uri() . '/assets/images/icons/favicon/apple-touch-icon-144x144.png">';
	echo '<link rel="apple-touch-icon-precomposed" sizes="60x60" href="' . get_stylesheet_directory_uri() . '/assets/images/icons/favicon/apple-touch-icon-60x60.png">';
	echo '<link rel="apple-touch-icon-precomposed" sizes="120x120" href="' . get_stylesheet_directory_uri() . '/assets/images/icons/favicon/apple-touch-icon-120x120.png">';
	echo '<link rel="apple-touch-icon-precomposed" sizes="76x76" href="' . get_stylesheet_directory_uri() . '/assets/images/icons/favicon/apple-touch-icon-76x76.png">';
	echo '<link rel="apple-touch-icon-precomposed" sizes="152x152" href="' . get_stylesheet_directory_uri() . '/assets/images/icons/favicon/apple-touch-icon-152x152.png">';
	echo '<link rel="icon" type="image/png" sizes="196x196" href="' . get_stylesheet_directory_uri() . '/assets/images/icons/favicon/favicon-196x196.png">';
	echo '<link rel="icon" type="image/png" sizes="96x96" href="' . get_stylesheet_directory_uri() . '/assets/images/icons/favicon/favicon-96x96.png">';
	echo '<link rel="icon" type="image/png" sizes="32x32" href="' . get_stylesheet_directory_uri() . '/assets/images/icons/favicon/favicon-32x32.png">';
	echo '<link rel="icon" type="image/png" sizes="16x16" href="' . get_stylesheet_directory_uri() . '/assets/images/icons/favicon/favicon-16x16.png">';
	echo '<link rel="icon" type="image/png" sizes="128x128" href="' . get_stylesheet_directory_uri() . '/assets/images/icons/favicon/favicon-128.png">';
	echo '<meta name="msapplication-TileImage" content="' . get_stylesheet_directory_uri() . '/assets/images/icons/favicon/mstile-144x144.png" />';
	echo '<meta name="msapplication-square70x70logo" content="' . get_stylesheet_directory_uri() . '/assets/images/icons/favicon/mstile-70x70.png" />';
	echo '<meta name="msapplication-square150x150logo" content="' . get_stylesheet_directory_uri() . '/assets/images/icons/favicon/mstile-150x150.png" />';
	echo '<meta name="msapplication-wide310x150logo" content="' . get_stylesheet_directory_uri() . '/assets/images/icons/favicon/mstile-310x150.png" />';
	echo '<meta name="msapplication-wide310x150logo" content="' . get_stylesheet_directory_uri() . './assets/images/icons/favicon/mstile-310x310.png" />';	
}

add_action( 'wp_head', 'agregar_favicon', 10 );