<?php
/**
 * CMS Theme functions and definitions
 *
 * Sets up the theme and provides some helper functions, which are used
 * in the theme as custom template tags. Others are attached to action and
 * filter hooks in WordPress to change core functionality.
 *
 * When using a child theme (see http://codex.wordpress.org/Theme_Development and
 * http://codex.wordpress.org/Child_Themes), you can override certain functions
 * (those wrapped in a function_exists() call) by defining them first in your child theme's
 * functions.php file. The child theme's functions.php file is included before the parent
 * theme's file, so the child theme functions would be used.
 *
 * Functions that are not pluggable (not wrapped in function_exists()) are instead attached
 * to a filter or action hook.
 *
 * For more information on hooks, actions, and filters, @link http://codex.wordpress.org/Plugin_API
 *
 * @package CMSSuperHeroes
 * @subpackage CMS Theme
 * @since 1.0.0
 */

/**
 * Add global values.
 */
global $smof_data, $wp_trust_meta, $wp_trust_base;

/* Run shortcodes in widget text */
add_filter('widget_text', 'do_shortcode');

/* Add base functions */
require_once( get_template_directory() . '/inc/base.class.php' );

if(class_exists("WP_Trust_Base")){
    $wp_trust_base = new WP_Trust_Base();
}

/* Add ReduxFramework. */
if(!class_exists('ReduxFramework')){
    require_once( get_template_directory() . '/inc/ReduxCore/framework.php' );
}

/* Add theme options. */
require_once( get_template_directory() . '/inc/options/functions.php' );

/**
 * Custom params & remove VC Elements.
 * 
 * @author FOX
 */
add_action('vc_after_init', 'wp_trust_vc_after_init');

function wp_trust_vc_after_init(){
    
    require_once ( get_template_directory() . '/vc_params/vc_rows.php' );
    require_once( get_template_directory() . '/vc_params/vc_column.php' );
    require_once( get_template_directory() . '/vc_params/vc_pie.php' );
    require_once( get_template_directory() . '/vc_params/vc_tta_section.php' );
    
    require_once( get_template_directory() . '/inc/fontlibs/glyphicons.php' );
    
    vc_remove_element( "vc_button" );
    vc_remove_element( "vc_button2" );
    vc_remove_element( "vc_cta_button" );
    vc_remove_element( "vc_cta_button2" );
    vc_remove_element( "vc_cta" );
}

/**
 * Add new elements for VC
 * 
 * @author FOX
 */
add_action('vc_before_init', 'wp_trust_vc_elements');

function wp_trust_vc_elements(){
    
    if(!class_exists('CmsShortCode'))
        return ;
    
    require_once( get_template_directory() . '/inc/elements/button/cms_button.php' );
    require_once( get_template_directory() . '/inc/elements/cta/cms_cta.php' );
    require_once( get_template_directory() . '/inc/elements/heading/cms_heading.php' );
    require_once( get_template_directory() . '/inc/elements/social/cms_social.php' );
    require_once( get_template_directory() . '/inc/elements/googlemap/cms_googlemap.php' );
    require_once( get_template_directory() . '/inc/elements/countdown/cms_countdown.php' );
}

/* Add SCSS */
if(!class_exists('scssc')){
    require_once( get_template_directory() . '/inc/libs/scss.inc.php' );
}

/**
 * Admin Loader.
 * require admin files.
 * 
 * @author Fox
 */
if(is_admin()){
    /* Add Meta Core Options */
    if(!class_exists('CsCoreControl')){
        
        /* add mete core */
        require_once( get_template_directory() . '/inc/metacore/core.options.php' );
        
        /* add meta options */
        require_once( get_template_directory() . '/inc/options/meta.options.php' );
    }
    /* tmp plugins. */
    require_once( get_template_directory() . '/inc/options/require.plugins.php' );
    /* add presets */
    require_once( get_template_directory() . '/inc/options/presets.php' );
}

/* Add Template functions */
require_once( get_template_directory() . '/inc/template.functions.php' );

/* Static css. */
require_once( get_template_directory() . '/inc/dynamic/static.css.php' );

/* Dynamic css*/
require_once( get_template_directory() . '/inc/dynamic/dynamic.css.php' );

/* Add widgets */
require_once( get_template_directory() . '/inc/widgets/social.php' );
require_once( get_template_directory() . '/inc/widgets/widget-flickrphotos.php' );
require_once( get_template_directory() . '/inc/widgets/recent-posts.php' );
require_once( get_template_directory() . '/inc/widgets/recent-attorneys.php' );

// Set up the content width value based on the theme's design and stylesheet.
if ( ! isset( $content_width ) )
	$content_width = 625;

/* Add mega menu */
if(!class_exists('HeroMenuWalker')){
    require_once( get_template_directory() . '/inc/megamenu/mega-menu.php' );
}


/*
 * Limit Words
 */
if (!function_exists('wp_trust_limit_words')) {
	function wp_trust_limit_words($string, $word_limit) {
	    
		$words = explode(" ",$string);
        return implode(" ",array_splice($words,0,$word_limit));
	}
}

/**
 * Twenty Twelve setup.
 *
 * Sets up theme defaults and registers the various WordPress features that
 * Twenty Twelve supports.
 *
 * @uses load_theme_textdomain() For translation/localization support.
 * @uses add_editor_style() To add a Visual Editor stylesheet.
 * @uses add_theme_support() To add support for post thumbnails, automatic feed links,
 * 	custom background, and post formats.
 * @uses register_nav_menu() To add support for navigation menus.
 * @uses set_post_thumbnail_size() To set a custom post thumbnail size.
 *
 * @since Twenty Twelve 1.0
 */
function wp_trust_setup() {
	/*
	 * Makes Twenty Twelve available for translation.
	 *
	 * Translations can be added to the /languages/ directory.
	 * If you're building a theme based on Twenty Twelve, use a find and replace
	 * to change 'wp-trust' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'wp-trust', get_template_directory() . '/languages' );

	/*
	 * This theme styles the visual editor to resemble the theme style,
	 * specifically font, colors, icons, and column width.
	 */
	add_editor_style( array( 'assets/css/editor-style.css' ) );

	// Adds title tag
	add_theme_support( "title-tag" );

	// Add woocommerce
	add_theme_support('woocommerce');
	
	// Adds custom header
	add_theme_support( 'custom-header' );
	
	// Adds RSS feed links to <head> for posts and comments.
	add_theme_support( 'automatic-feed-links' );

	// This theme supports a variety of post formats.
	add_theme_support( 'post-formats', array( 'video' , 'gallery',) );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menu( 'primary', esc_html__( 'Primary Menu', 'wp-trust' ) );

	/*
	 * This theme supports custom background color and image,
	 * and here we also set up the default background color.
	 */
	add_theme_support( 'custom-background', array(
		'default-color' => 'e6e6e6',
	) );

	// This theme uses a custom image size for featured images, displayed on "standard" posts.
	add_theme_support( 'post-thumbnails' );
	add_image_size('wp_trust_370X245', 370, 245, true);
	add_image_size('wp_trust_images-sm', 470, 430, true);
	set_post_thumbnail_size( 624, 9999 ); // Unlimited height, soft crop
}
add_action( 'after_setup_theme', 'wp_trust_setup' );

/**
 * Get meta data.
 * @author Fox
 * @return mixed|NULL
 */
function wp_trust_meta_data(){
    global $post, $wp_trust_meta;
    
    if(!isset($post->ID)) return ;
    
    $wp_trust_meta = json_decode(get_post_meta($post->ID, '_cms_meta_data', true));
    
    if(empty($wp_trust_meta)) return ;
    
    foreach ($wp_trust_meta as $key => $meta){
        $wp_trust_meta->$key = rawurldecode($meta);
    }
}
add_action('wp', 'wp_trust_meta_data');

/**
 * Get post meta data.
 * @author Fox
 * @return mixed|NULL
 */
function wp_trust_post_meta_data(){
    global $post;
    
    if(!isset($post->ID)) return null;
    
    $post_meta = json_decode(get_post_meta($post->ID, '_cms_meta_data', true));
    
    if(empty($post_meta)) return null;
    
    foreach ($post_meta as $key => $meta){
        $post_meta->$key = rawurldecode($meta);
    }
    
    return $post_meta;
}

/*
 * Convert HEX to GRBA
*/
if(!function_exists('wp_trust_hex_to_rgb')){
    function wp_trust_hex_to_rgb($hex,$opacity = 1) {
    	$hex = str_replace("#",null, $hex);
    	$color = array();
    	if(strlen($hex) == 3) {
    		$color['r'] = hexdec(substr($hex,0,1).substr($hex,0,1));
    		$color['g'] = hexdec(substr($hex,1,1).substr($hex,1,1));
    		$color['b'] = hexdec(substr($hex,2,1).substr($hex,2,1));
    		$color['a'] = $opacity;
    	}
    	else if(strlen($hex) == 6) {
    		$color['r'] = hexdec(substr($hex, 0, 2));
    		$color['g'] = hexdec(substr($hex, 2, 2));
    		$color['b'] = hexdec(substr($hex, 4, 2));
    		$color['a'] = $opacity;
    	}
    	$color = "rgba(".implode(', ', $color).")";
    	return $color;
    }
}

/**
 * Enqueue scripts and styles for front-end.
 * @author Fox
 * @since CMS SuperHeroes 1.0
 */
function wp_trust_scripts_styles() {
    
	global $smof_data, $wp_styles,$wp_trust_meta;
	
	/** theme options. */
	$script_options = array(
	    'menu_sticky'=> $smof_data['menu_sticky'],
	    'back_to_top'=> $smof_data['footer_botton_back_to_top']
	);

	/*------------------------------------- JavaScript ---------------------------------------*/
	
	
	/** --------------------------libs--------------------------------- */
	
	
	/* Adds JavaScript Bootstrap. */
	wp_enqueue_script('cmssuperheroes-bootstrap', get_template_directory_uri() . '/assets/js/bootstrap.min.js', array( 'jquery' ), '3.3.2');
	
	/* Add parallax plugin. */
	wp_enqueue_script('cmssuperheroes-parallax', get_template_directory_uri() . '/assets/js/jquery.parallax-1.1.3.js', array( 'jquery' ), '1.1.3', true);
	
	/* Add smoothscroll plugin */
	if($smof_data['smoothscroll']){
	   wp_enqueue_script('cmssuperheroes-smoothscroll', get_template_directory_uri() . '/assets/js/smoothscroll.min.js', array( 'jquery' ), '1.0.0', true);
	}

	/* Add One Page plugin. */
	if(is_page() && isset($wp_trust_meta->_cms_one_page) && $wp_trust_meta->_cms_one_page){
	    wp_enqueue_script('jquery.singlePageNav', get_template_directory_uri() . '/assets/js/jquery.singlePageNav.js', array( 'jquery' ), '1.0.0', true);
	     
	    if(!empty($wp_trust_meta->_cms_one_page_easing)){
	        wp_enqueue_script('jquery-effects-core');
	        $script_options['one_page_easing'] = !empty($wp_trust_meta->_cms_one_page_easing) ? $wp_trust_meta->_cms_one_page_easing : 'swing';
	    }
	     
	    $script_options['one_page'] = true;
	    $script_options['one_page_speed'] = !empty($wp_trust_meta->_cms_one_page_speed) ? $wp_trust_meta->_cms_one_page_speed : 1000;
	}
	
	
	/* Loads awesome stylesheet. */
	wp_enqueue_style('cmssuperheroes-font-awesome', get_template_directory_uri() . '/assets/css/font-awesome.min.css', array(), '4.3.0');

	/* Loads fonts stylesheet. */
	wp_enqueue_style('cmssuperheroes-fonts', get_template_directory_uri() . '/assets/css/fonts.css');

	/* Loads animations stylesheet. */
	wp_enqueue_style('cmssuperheroes-animations', get_template_directory_uri() . '/assets/css/animations.css');
	/* Loads Font Ionicons. */
	wp_enqueue_style('cmssuperheroes-font-ionicons', get_template_directory_uri() . '/assets/css/ionicons.min.css', array(), '2.0.1');

	/* Loads Pe Icon. */
	wp_enqueue_style('cmssuperheroes-pe-icon', get_template_directory_uri() . '/assets/css/pe-icon-7-stroke.css', array(), '1.0.1');
	
	/* Loads Pe Icon. */
	wp_enqueue_style('elegant-icon', get_template_directory_uri() . '/assets/css/elegant-icon.css', array(), '1.0.1');
	
	/** --------------------------custom------------------------------- */
	
	/* Add main.js */
	wp_register_script('cmssuperheroes-main', get_template_directory_uri() . '/assets/js/main.js', array( 'jquery' ), '1.0.0', true);
	wp_localize_script('cmssuperheroes-main', 'CMSOptions', $script_options);
	wp_enqueue_script('cmssuperheroes-main');
	/* Add menu.js */
    wp_enqueue_script('cmssuperheroes-menu', get_template_directory_uri() . '/assets/js/menu.js', array( 'jquery' ), '1.0.0', true);
    wp_register_script('progressCircle', get_template_directory_uri() . '/assets/js/process_cycle.js', array( 'jquery' ), '1.0.0', true);
    wp_register_script('vc_pie_custom', get_template_directory_uri() . '/assets/js/vc_pie_custom.js', array( 'jquery' ), '1.0.0', true);
	/* OLW Carousel */
	/* Magnific Popup */
    wp_enqueue_script('magnific-image', get_template_directory_uri() . '/assets/js/jquery.magnific-popup.min.js', array( 'jquery' ), '1.0.0', true);
    /* animation column */
    wp_enqueue_script('animation-column', get_template_directory_uri() . '/assets/js/animation-column.js', array( 'jquery' ), '1.0.0', true);
    /* Same Height */
    wp_enqueue_script('matchHeight', get_template_directory_uri() . '/assets/js/jquery.matchHeight-min.js', array( 'jquery' ), '1.0.0', true);
    wp_enqueue_script('sameheight', get_template_directory_uri() . '/assets/js/sameheight.js', array( 'jquery' ), '1.0.0', true);
    /* Style Scroll */
    wp_enqueue_script('scroll-bar', get_template_directory_uri() . '/assets/js/enscroll.js', array( 'jquery' ), '1.0.0', true);

	/*
	 * Adds JavaScript to pages with the comment form to support
	 * sites with threaded comments (when in use).
	 */
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );

    /*------------------------------------- Stylesheet ---------------------------------------*/
	
	/** --------------------------libs--------------------------------- */
	
	/* Loads Bootstrap stylesheet. */
	wp_enqueue_style('cmssuperheroes-bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.min.css', array(), '3.3.2');
	
	/* Loads Bootstrap stylesheet. */
	wp_enqueue_style('cmssuperheroes-font-awesome', get_template_directory_uri() . '/assets/css/font-awesome.min.css', array(), '4.3.0');
	
	/** --------------------------custom------------------------------- */
	/* Popup Images Gallery */
	wp_enqueue_style('magnific-popup', get_template_directory_uri() . '/assets/css/magnific-popup.css', array(), '1.0.1');
	
	/* Loads our main stylesheet. */
	wp_enqueue_style( 'cmssuperheroes-style', get_stylesheet_uri(), array( 'cmssuperheroes-bootstrap' ));

	/* Loads the Internet Explorer specific stylesheet. */
	wp_enqueue_style( 'wp_medico-ie', get_template_directory_uri() . '/assets/css/ie.css', array( 'cmssuperheroes-style' ), '20121010' );
	$wp_styles->add_data( 'wp_medico-ie', 'conditional', 'lt IE 9' );
	
    wp_enqueue_style('cmssuperheroes-static', get_template_directory_uri() . "/assets/css/static.css", array( 'cmssuperheroes-style' ), '1.0.0');

    //var_dump($static_css);
}
add_action( 'wp_enqueue_scripts', 'wp_trust_scripts_styles' );

/**
 * Load admin ajax url.
 */
function wp_trust_ajax_url_admin_head() {
    echo '<script type="text/javascript"> var ajaxurl = "'.admin_url('admin-ajax.php').'"; </script>';
}
add_action( 'admin_head', 'wp_trust_ajax_url_admin_head');

/**
 * Register sidebars.
 *
 * Registers our main widget area and the front page widget areas.
 *
 * @since Fox
 */
function wp_trust_widgets_init() {
	register_sidebar( array(
		'name' => esc_html__( 'Main Sidebar', 'wp-trust' ),
		'id' => 'sidebar-1',
		'description' => esc_html__( 'Appears on posts and pages except the optional Front Page template, which has its own widgets', 'wp-trust' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	register_sidebar( array(
		'name' => esc_html__( 'Attorney Sidebar', 'wp-trust' ),
		'id' => 'attorney-sidebar',
		'description' => esc_html__( '', 'wp-trust' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	register_sidebar( array(
		'name' => esc_html__( 'Practice Areas Sidebar', 'wp-trust' ),
		'id' => 'practice-sidebar',
		'description' => esc_html__( '', 'wp-trust' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	register_sidebar( array(
		'name' => esc_html__( 'Header Default - Left', 'wp-trust' ),
		'id' => 'header-default-left',
		'description' => esc_html__( '', 'wp-trust' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	register_sidebar( array(
		'name' => esc_html__( 'Header Default - Right ', 'wp-trust' ),
		'id' => 'header-default-right',
		'description' => esc_html__( '', 'wp-trust' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	
	register_sidebar( array(
		'name' => esc_html__( 'Hidden Sidebar', 'wp-trust' ),
		'id' => 'hidden-sidebar',
		'description' => esc_html__( '', 'wp-trust' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	register_sidebar( array(
    	'name' => esc_html__( 'Footer Feature Top', 'wp-trust' ),
    	'id' => 'footer-feature-top',
    	'description' => esc_html__( '', 'wp-trust' ),
    	'before_widget' => '<aside id="%1$s" class="widget %2$s">',
    	'after_widget' => '</aside>',
    	'before_title' => '<h3 class="widget-title">',
    	'after_title' => '</h3>',
	) );

	register_sidebar( array(
    	'name' => esc_html__( 'Footer Top - Column 1', 'wp-trust' ),
    	'id' => 'footer-top-1',
    	'description' => esc_html__( '', 'wp-trust' ),
    	'before_widget' => '<aside id="%1$s" class="widget %2$s">',
    	'after_widget' => '</aside>',
    	'before_title' => '<h3 class="widget-title">',
    	'after_title' => '</h3>',
	) );

	register_sidebar( array(
    	'name' => esc_html__( 'Footer Top - Column 2', 'wp-trust' ),
    	'id' => 'footer-top-2',
    	'description' => esc_html__( '', 'wp-trust' ),
    	'before_widget' => '<aside id="%1$s" class="widget %2$s">',
    	'after_widget' => '</aside>',
    	'before_title' => '<h3 class="widget-title">',
    	'after_title' => '</h3>',
	) );

	register_sidebar( array(
    	'name' => esc_html__( 'Footer Top - Column 3', 'wp-trust' ),
    	'id' => 'footer-top-3',
    	'description' => esc_html__( '', 'wp-trust' ),
    	'before_widget' => '<aside id="%1$s" class="widget %2$s">',
    	'after_widget' => '</aside>',
    	'before_title' => '<h3 class="widget-title">',
    	'after_title' => '</h3>',
	) );

	register_sidebar( array(
    	'name' => esc_html__( 'Footer Top - Column 4', 'wp-trust' ),
    	'id' => 'footer-top-4',
    	'description' => esc_html__( '', 'wp-trust' ),
    	'before_widget' => '<aside id="%1$s" class="widget %2$s">',
    	'after_widget' => '</aside>',
    	'before_title' => '<h3 class="widget-title">',
    	'after_title' => '</h3>',
	) );

	register_sidebar( array(
    	'name' => esc_html__( 'Footer Top - 1 Column', 'wp-trust' ),
    	'id' => 'footer-top-1col',
    	'description' => esc_html__( '', 'wp-trust' ),
    	'before_widget' => '<aside id="%1$s" class="widget %2$s">',
    	'after_widget' => '</aside>',
    	'before_title' => '<h3 class="widget-title">',
    	'after_title' => '</h3>',
	) );

	register_sidebar( array(
    	'name' => esc_html__( 'Copyright 1', 'wp-trust' ),
    	'id' => 'copyright1',
    	'before_widget' => '<aside id="%1$s" class="widget %2$s">',
    	'after_widget' => '</aside>',
    	'before_title' => '<h3 class="widget-title">',
    	'after_title' => '</h3>',
	) );
	register_sidebar( array(
    	'name' => esc_html__( 'Copyright 2', 'wp-trust' ),
    	'id' => 'copyright2',
    	'before_widget' => '<aside id="%1$s" class="widget %2$s">',
    	'after_widget' => '</aside>',
    	'before_title' => '<h3 class="widget-title">',
    	'after_title' => '</h3>',
	) );
	register_sidebar(array(
        'name' => 'Woocommerce Sidebar',
        'id' => 'woocommerce-widget-area',
        'before_widget' => '<div id="%1$s" class="slidingbar-widget-col %2$s">',
    	'after_widget' => '<div style="clear:both;"></div></div>',
    	'before_title' => '<h3 class="wg-title"><span>',
    	'after_title' => '</span></h3>',
    ));
}
add_action( 'widgets_init', 'wp_trust_widgets_init' );

/**
 * Filter the page menu arguments.
 *
 * Makes our wp_nav_menu() fallback -- wp_page_menu() -- show a home link.
 *
 * @since 1.0.0
 */
function wp_trust_page_menu_args( $args ) {
    if ( ! isset( $args['show_home'] ) )
        $args['show_home'] = true;
    return $args;
}
add_filter( 'wp_page_menu_args', 'wp_trust_page_menu_args' );

/**
 * Add field subtitle to post.
 * 
 * @since 1.0.0
 */
function wp_trust_add_subtitle_field(){
    global $post, $cms_meta;
    
    /* get current_screen. */
    $screen = get_current_screen();
    
    /* show field in post. */
    if(in_array($screen->id, array('post'))){
        
        /* get value. */
        $value = get_post_meta($post->ID, 'post_subtitle', true);
        
        /* html. */
        echo '<div class="subtitle"><input type="text" name="post_subtitle" value="'.esc_attr($value).'" id="subtitle" placeholder = "'.esc_html__('Subtitle', 'wp-trust').'" style="width: 100%;margin-top: 4px;"></div>';
    }
}

add_action( 'edit_form_after_title', 'wp_trust_add_subtitle_field' );

/**
 * Save custom theme meta. 
 * 
 * @since 1.0.0
 */
function wp_trust_save_meta_boxes($post_id) {
    
    if(defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }
    /* update field subtitle */
    if(isset($_POST['post_subtitle'])){
        update_post_meta($post_id, 'post_subtitle', $_POST['post_subtitle']);
    }
}

add_action('save_post', 'wp_trust_save_meta_boxes');

/**
 * Display navigation to next/previous set of posts when applicable.
 *
 * @since 1.0.0
 */
function wp_trust_paging_nav() {
    // Don't print empty markup if there's only one page.
	if ( $GLOBALS['wp_query']->max_num_pages < 2 ) {
		return;
	}

	$paged        = get_query_var( 'paged' ) ? intval( get_query_var( 'paged' ) ) : 1;
	$pagenum_link = html_entity_decode( get_pagenum_link() );
	$query_args   = array();
	$url_parts    = explode( '?', $pagenum_link );

	if ( isset( $url_parts[1] ) ) {
		wp_parse_str( $url_parts[1], $query_args );
	}

	$pagenum_link = remove_query_arg( array_keys( $query_args ), $pagenum_link );
	$pagenum_link = trailingslashit( $pagenum_link ) . '%_%';

	$format  = $GLOBALS['wp_rewrite']->using_index_permalinks() && ! strpos( $pagenum_link, 'index.php' ) ? 'index.php/' : '';
	$format .= $GLOBALS['wp_rewrite']->using_permalinks() ? user_trailingslashit( 'page/%#%', 'paged' ) : '?paged=%#%';

	// Set up paginated links.
	$links = paginate_links( array(
			'base'     => $pagenum_link,
			'format'   => $format,
			'total'    => $GLOBALS['wp_query']->max_num_pages,
			'current'  => $paged,
			'mid_size' => 1,
			'add_args' => array_map( 'urlencode', $query_args ),
			'prev_text' => '<i class="fa fa-long-arrow-left"></i>',
			'next_text' => '<i class="fa fa-long-arrow-right"></i>'
	) );

	if ( $links ) :

	?>
	<nav class="navigation paging-navigation clearfix" role="navigation">
			<div class="pagination loop-pagination ft-lo">
				<?php echo ''.$links; ?>
			</div><!-- .pagination -->
	</nav><!-- .navigation -->
	<?php
	endif;
}

/**
* Display navigation to next/previous post when applicable.
*
* @since 1.0.0
*/
function wp_trust_post_nav() {
    global $post;
    // Don't print empty markup if there's nowhere to navigate.
    $previous = ( is_attachment() ) ? get_post( $post->post_parent ) : get_adjacent_post( false, '', true );
    $next     = get_adjacent_post( false, '', false );

    if ( ! $next && ! $previous )
        return;
    ?>
    <?php
    $next_post = get_next_post();
    $previous_post = get_previous_post();
    if( !empty($next_post) )
    {
    ?>
	<nav class="navigation post-navigation" role="navigation">
		<div class="nav-links row clearfix">
			<div class="nav-link-prev col-sm-6 col-xs-12 text-left">
				<?php if ( is_a( $previous_post , 'WP_Post' ) && get_the_title( $previous_post->ID ) != '') { ?>
					<a href="<?php echo esc_url(get_permalink( $previous_post->ID )); ?>">
						<i class="fa fa-long-arrow-left br-2px"></i>
						<div class="nav-inner">
				  			<span class="ft-lora"><?php echo esc_html_e('Previous Post', 'wp-trust') ?></span>
					  		<h3><?php echo get_the_title( $previous_post->ID ); ?></h3>
					  	</div>
				  	</a>
				<?php } ?>
			</div>
			<div class="nav-link-next col-sm-6 col-xs-12 text-right">
				<?php if ( is_a( $next_post , 'WP_Post' ) && get_the_title( $next_post->ID ) != '') { ?>
					<a href="<?php echo esc_url(get_permalink( $next_post->ID )); ?>">
						<i class="fa fa-long-arrow-right br-2px"></i>
						<div class="nav-inner">
				  			<span class="ft-lora"><?php echo esc_html_e('Next Post', 'wp-trust') ?></span>
					  		<h3><?php echo get_the_title( $next_post->ID ); ?></h3>
					  	</div>
				  	</a>
				<?php } ?>
			</div>
		</div><!-- .nav-links -->
	</nav><!-- .navigation -->
	<?php
    }
}
/* End Post nav */

add_filter('cms-shorcode-list', 'wp_trust_shortcodes_list');
function wp_trust_shortcodes_list(){
	$wp_trust_shortcodes_list = array(
		'cms_carousel',
		'cms_grid',
		'cms_fancybox_single',
		'cms_counter_single',
		'cms_progressbar',
		);

	return $wp_trust_shortcodes_list;
}
/* Add Custom Comment */
function wp_trust_comment($comment, $args, $depth) {
	$GLOBALS['comment'] = $comment;
	extract($args, EXTR_SKIP);

	if ( 'div' == $args['style'] ) {
		$tag = 'div';
		$add_below = 'comment';
	} else {
		$tag = 'li';
		$add_below = 'div-comment';
	}
?>
<<?php echo esc_attr($tag) ?> <?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ) ?> id="comment-<?php comment_ID() ?>">
<?php if ( 'div' != $args['style'] ) : ?>
<div id="div-comment-<?php comment_ID() ?>" class="comment-body clearfix">
<?php endif; ?>
<div class="comment-author-image vcard">
	<?php echo get_avatar( $comment, 109 ); ?>
</div>
<?php if ( $comment->comment_approved == '0' ) : ?>
	<em class="comment-awaiting-moderation"><?php esc_html_e( 'Your comment is awaiting moderation.' , 'wp-trust'); ?></em>
<?php endif; ?>
<div class="comment-main">
	<div class="comment-meta commentmetadata">
		<span class="comment-author"><?php echo get_comment_author_link(); ?></span>
		<span class="comment-date">
			<?php echo get_the_date();?>
			<span class="time"> - <?php echo the_time(); ?></span>
		
		</span>
	</div>
	<div class="comment-content">
		<?php comment_text(); ?>
		<div class="reply">
		<?php comment_reply_link( array_merge( $args, array( 'add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
		</div>
	</div>
</div>
<?php if ( 'div' != $args['style'] ) : ?>
</div>
<?php endif; ?>
<?php
}
/* End Custom Comment */

if(class_exists('Woocommerce')){
	require_once( get_template_directory() . '/woocommerce/wc-function-hooks.php' );
}

/* Replace Stylesheet */
function wp_trust_validate_stylesheet($src) {
	if(strstr($src,'font-awesome-css')|| strstr($src,'cms-icon-rticon-css') || strstr($src,'mediaelement-css') || strstr($src,'wp-mediaelement-css') ){
		return str_replace('rel', 'property="stylesheet" rel', $src);
	}
	else{
		return $src;
	}
}
add_filter('style_loader_tag', 'wp_trust_validate_stylesheet');

/**
 * Display navigation to next/previous comments when applicable.
 *
 * @since 1.0.0
 */
function wp_trust_comment_nav() {
	// Are there comments to navigate through?
	if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) :
	?>
	<nav class="navigation comment-navigation" role="navigation">
		<h2 class="screen-reader-text"><?php esc_html_e( 'Comment navigation', 'wp-trust' ); ?></h2>
		<div class="nav-links">
			<?php
				if ( $prev_link = get_previous_comments_link( esc_html__( 'Older Comments', 'wp-trust' ) ) ) :
					printf( '<div class="nav-previous">%s</div>', $prev_link );
				endif;

				if ( $next_link = get_next_comments_link( esc_html__( 'Newer Comments', 'wp-trust' ) ) ) :
					printf( '<div class="nav-next">%s</div>', $next_link );
				endif;
			?>
		</div><!-- .nav-links -->
	</nav><!-- .comment-navigation -->
	<?php
	endif;
}

/* Post view */
function wp_trust_post_views($post_ID) {
 
    //Set the name of the Posts Custom Field.
    $count_key = 'post_views_count'; 
     
    //Returns values of the custom field with the specified key from the specified post.
    $count = get_post_meta($post_ID, $count_key, true);
    
    $count = $count ? (int)$count : 0 ;
        
    if(is_single()){
    	
    	$count++;
    	
    	update_post_meta($post_ID, $count_key, $count);
    	
    }
    
    return $count;
}

/**
 * Set home page.
 *
 * get home title and update options.
 *
 * @return Home page title.
 * @author FOX
 */
function wp_trust_set_home_page(){

	$home_page = 'Home';

	$page = get_page_by_title($home_page);

	if(!isset($page->ID))
		return ;
		 
		update_option('show_on_front', 'page');
		update_option('page_on_front', $page->ID);
}

add_action('cms_import_finish', 'wp_trust_set_home_page');

/**
 * Set menu locations.
 *
 * get locations and menu name and update options.
 *
 * @return string[]
 * @author FOX
 */
function wp_trust_set_menu_location(){

	$setting = array(
			'Main Menu' => 'primary'
	);

	$navs = wp_get_nav_menus();

	$new_setting = array();

	foreach ($navs as $nav){

		if(!isset($setting[$nav->name]))
			continue;

			$id = $nav->term_id;
			$location = $setting[$nav->name];

			$new_setting[$location] = $id;
	}

	set_theme_mod('nav_menu_locations', $new_setting);
}

add_action('cms_import_finish', 'wp_trust_set_menu_location');

/**
 * Demo Data
 */
add_filter('ef3-theme-options-opt-name', 'wp_trust_set_demo_opt_name');

function wp_trust_set_demo_opt_name(){
	return 'smof_data';
}

add_filter('ef3-replace-content', 'wp_trust_replace_content', 10 , 2);

function wp_trust_replace_content($replaces, $attachment){
	return array(
		'/image="(.+?)"/' => 'image="'.$attachment.'"',
		'/portfolio_masonry_category="(.+?)"/' => '',
		'/tax_query:/' => 'remove_query:',
		'/categories:/' => 'remove_query:',
		'/src="(.+?)"/' => 'src="'.ef3_import_export()->acess_url.'ef3-placeholder-image.jpg"'
	);
}

add_filter('ef3-replace-theme-options', 'wp_trust_replace_theme_options');

function wp_trust_replace_theme_options(){
	return array(
		'dev_mode' => 0,
	);
}

/*
add_filter('ef3-enable-create-demo', 'wp_trust_enable_create_demo');

function wp_trust_enable_create_demo(){
	return true;
}
*/

/**
 * End Demo Data
 */

