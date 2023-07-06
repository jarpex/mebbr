<?php
/**
 * MEBBR functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package MEBBR
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
function mebbr_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on MEBBR, use a find and replace
		* to change 'mebbr' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'mebbr', get_template_directory() . '/languages' );

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
			'menu-1' => esc_html__( 'Primary', 'mebbr' ),
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
	// add_theme_support(
	// 	'custom-background',
	// 	apply_filters(
	// 		'mebbr_custom_background_args',
	// 		array(
	// 			'default-color' => 'ffffff',
	// 			'default-image' => '',
	// 		)
	// 	)
	// );

	// // Add theme support for selective refresh for widgets.
	// add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	// add_theme_support(
	// 	'custom-logo',
	// 	array(
	// 		'height'      => 250,
	// 		'width'       => 250,
	// 		'flex-width'  => true,
	// 		'flex-height' => true,
	// 	)
	// );
}
add_action( 'after_setup_theme', 'mebbr_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function mebbr_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'mebbr_content_width', 720 );
}
add_action( 'after_setup_theme', 'mebbr_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
// function mebbr_widgets_init() {
// 	register_sidebar(
// 		array(
// 			'name'          => esc_html__( 'Sidebar', 'mebbr' ),
// 			'id'            => 'sidebar-1',
// 			'description'   => esc_html__( 'Add widgets here.', 'mebbr' ),
// 			'before_widget' => '<section id="%1$s" class="widget %2$s">',
// 			'after_widget'  => '</section>',
// 			'before_title'  => '<h2 class="widget-title">',
// 			'after_title'   => '</h2>',
// 		)
// 	);
// }
// add_action( 'widgets_init', 'mebbr_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function mebbr_scripts() {
	wp_enqueue_style( 'mebbr-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'mebbr-style', 'rtl', 'replace' );

	wp_enqueue_script( 'mebbr-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}

if ( ! function_exists( 'gp_read_time' ) ) {
    function gp_read_time() {
		$text = get_the_content( '' );
		$words = str_word_count( strip_tags( $text ), 0, 'абвгдеёжзийклмнопрстуфхцчшщъыьэюяАБВГДЕЁЖЗИЙКЛМНОПРСТУФХЦЧШЩЪЫЬЭЮЯ' );
		if ( !empty( $words ) ) {
			$time_in_minutes = ceil( $words / 200 );
			return $time_in_minutes;
		}
		return false;
    }
}

add_action( 'wp_enqueue_scripts', 'mebbr_scripts' );
?>

<?php

// add the ajax fetch js
add_action( 'wp_footer', 'ajax_fetch' );
function ajax_fetch() {
?>
<script type="text/javascript">
	var timeoutFetch
	function suggestions(){
		let searchtext = document.getElementById('searchBox__input');
		if (searchtext.value.length > 0) {
			if(timeoutFetch) clearTimeout(timeoutFetch)

			timeoutFetch = setTimeout(()=>{
				
				fetch(`<?php echo admin_url('admin-ajax.php'); ?>?action=data_fetch2&keyword=${searchtext.value}`,
				{
					method: 'POST'
				})
				.then((response) => 
				{
					return response.text()
				})
				.then((data) => 
				{	
					if (searchtext.value.length > 0) {
						document.getElementById('datafetch').innerHTML = data
					} else {
						document.getElementById('datafetch').innerHTML = "Search results will appear here";
					}

				});
			}, 0)
		} else {
			document.getElementById('datafetch').innerHTML = "Search results will appear here";
		}
	}
</script>

<?php
}


// the ajax function
add_action('wp_ajax_data_fetch2' , 'data_fetch2');
add_action('wp_ajax_nopriv_data_fetch2','data_fetch2');
function data_fetch2(){

    $the_query = new WP_Query( 
		array( 
		  'posts_per_page' => 10, 
		  's' => esc_attr( $_GET['keyword'] ), 
		  'post_type' => 'post' 
		) 
	  );
	
	  if( $the_query->have_posts() ) :
		  while( $the_query->have_posts() ): $the_query->the_post(); ?>
  
			  <h2><a href="<?php echo esc_url( post_permalink() ); ?>"><?php the_title();?></a></h2>
  
		  <?php endwhile;
		  wp_reset_postdata();  
	  endif;
	//die()
    wp_die();
}

/**
 * Disable the emoji's
 */
function disable_emojis() {
	remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
	remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
	remove_action( 'wp_print_styles', 'print_emoji_styles' );
	remove_action( 'admin_print_styles', 'print_emoji_styles' );	
	remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
	remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );	
	remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
	
	// Remove from TinyMCE
	// add_filter( 'tiny_mce_plugins', 'disable_emojis_tinymce' );
}
add_action( 'init', 'disable_emojis' );


// Custom logo
function logo_size_change(){
	remove_theme_support( 'custom-logo' );
	add_theme_support( 'custom-logo', array(
	    'height'      => 128,
	    'width'       => 128,
	    'flex-height' => true,
	    'flex-width'  => true,
	) );
}
add_action( 'after_setup_theme', 'logo_size_change', 11 );

// Custom colors
function theme_customize_register( $wp_customize ) {
	$wp_customize->add_setting( 'accent_color_light', array(
		'default'   => '',
		'transport' => 'refresh',
		'sanitize_callback' => 'sanitize_hex_color',
	  ) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'accent_color_light', array(
		'section' => 'colors',
		'label'   => esc_html__( 'Accent color light', 'theme' ),
	) ) );

	$wp_customize->add_setting( 'accent_color_light_hover', array(
		'default'   => '',
		'transport' => 'refresh',
		'sanitize_callback' => 'sanitize_hex_color',
	  ) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'accent_color_light_hover', array(
		'section' => 'colors',
		'label'   => esc_html__( 'Accent color light hover', 'theme' ),
	) ) );

	$wp_customize->add_setting( 'input_color_light', array(
		'default'   => '',
		'transport' => 'refresh',
		'sanitize_callback' => 'sanitize_hex_color',
	  ) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'input_color_light', array(
		'section' => 'colors',
		'label'   => esc_html__( 'Input color light', 'theme' ),
	) ) );
 }
 
 add_action( 'customize_register', 'theme_customize_register' );


 function theme_get_customizer_css() {
    ob_start();
    
    $accent_color_light = get_theme_mod( 'accent_color_light', '' );
    if ( ! empty( $accent_color_light ) ) {
      ?>

		body {
			--accent: <?php echo $accent_color_light; ?>;
		}

		@media (prefers-color-scheme: light) {
            body {
			--accent: <?php echo $accent_color_light; ?>;
		}

      <?php
    }

	$accent_color_light_hover = get_theme_mod( 'accent_color_light_hover', '' );
    if ( ! empty( $accent_color_light_hover ) ) {
      ?>

		body {
			--accent-hover: <?php echo $accent_color_light_hover; ?>;
		}

		
		@media (prefers-color-scheme: light) {
            body {
			--accent-hover: <?php echo $accent_color_light_hover; ?>;
		}

      <?php
    }

	$input_color_light = get_theme_mod( 'input_color_light', '' );
    if ( ! empty( $input_color_light ) ) {
      ?>

		body {
			--input: <?php echo $input_color_light; ?>;
		}

		@media (prefers-color-scheme: light) {
            body {
			--input: <?php echo $input_color_light; ?>;
		}

      <?php
    }

    $css = ob_get_clean();
    return $css;
  }

// Modify our styles registration like so:

function theme_enqueue_styles() {
  wp_enqueue_style( 'theme-styles', get_stylesheet_uri() ); // This is where you enqueue your theme's main stylesheet
  $custom_css = theme_get_customizer_css();
  wp_add_inline_style( 'theme-styles', $custom_css );
}

add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );

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

show_admin_bar(false);

remove_action( 'wp_enqueue_scripts', 'wp_enqueue_global_styles' );
remove_action( 'wp_body_open', 'wp_global_styles_render_svg_filters' );

remove_filter( 'the_title', 'wptexturize' );
remove_filter( 'the_content', 'wptexturize' );
remove_filter( 'the_excerpt', 'wptexturize' );