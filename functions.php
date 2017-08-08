<?php

// feature image stuff
add_theme_support('post-thumbnails');

// CSS and JS
// function resources() {
//   wp_enqueue_style('animate',  get_template_directory_uri().'/src/scss/animate.css');
	wp_enqueue_style( 'wordpress', get_stylesheet_uri() );
  wp_enqueue_style('fontawesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css');
  wp_enqueue_style('fonts', '//fonts.googleapis.com/css?family=Lato:400,700|Merriweather|Raleway:400,900,300' );
	wp_enqueue_script( 'script-name', get_template_directory_uri() . '/dist/js/scripts.min.js', array('jquery'), '1.0.0', true );
}

add_action( 'wp_enqueue_scripts', 'resources' );

if( function_exists('acf_add_options_page') ) {
  acf_add_options_page('General Options');
}


// Navigation Menus
register_nav_menus(array(
  'primary_menu' => _('Primary Menu'),
));

// excerpt stuff
function custom_excerpt_length( $length ) {
  return 80;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

function new_excerpt_more( $more ) {
  return '...';
}
add_filter('excerpt_more', 'new_excerpt_more');


add_filter( 'wp_title', 'wpdocs_hack_wp_title_for_home' );

// Portfolio Post Type

add_action( 'init', 'portfolio' );

function portfolio() {

  register_post_type( 'portfolio', array(
    'labels' => array(
      'name' => 'portfolio',
      'singular_name' => 'Portfolio',
     ),
    'menu_icon'   => 'dashicons-format-image',
    'description' => 'portfolio',
    'taxonomies' => array('category'),
    'public' => true,
    'menu_position' => 7,
    'supports' => array( 'title', 'editor', 'thumbnail' ),
  ));
}

/**
 * Customize the title for the home page, if one is not set.
 *
 * @param string $title The original title.
 * @return string The title to use.
 */
function wpdocs_hack_wp_title_for_home( $title )
{
  if ( empty( $title ) && ( is_home() || is_front_page() ) ) {
    $title = __( 'Bumbli', 'textdomain' ) . ' | ' . get_bloginfo( 'description' );
  }
  return $title;
}

function custom_mtypes( $m ){
    $m['svg'] = 'image/svg+xml';
    $m['svgz'] = 'image/svg+xml';
    return $m;
}
add_filter( 'upload_mimes', 'custom_mtypes' );

// ajlsfd
// Remove WP Version From Styles add_filter( 'style_loader_src', 'sdt_remove_ver_css_js', 9999 ); // Remove WP Version From Scripts
add_filter( 'script_loader_src', 'sdt_remove_ver_css_js', 9999 ); // Function to remove version numbers
function sdt_remove_ver_css_js( $src ) { if ( strpos( $src, 'ver=' ) ) $src = remove_query_arg( 'ver', $src ); return $src; }

add_filter( 'template_include', 'var_template_include', 1000 );
function var_template_include( $t ){
    $GLOBALS['current_theme_template'] = basename($t);
    return $t;
}

function get_current_template( $echo = false ) {
    if( !isset( $GLOBALS['current_theme_template'] ) )
        return false;
    if( $echo )
        return $GLOBALS['current_theme_template'];
    else
        return $GLOBALS['current_theme_template'];
}

function filter_ptags_on_images($content){
 return preg_replace('/<p>\s*(<a .*>)?\s*(<img .* \/>)\s*(\/a>)?\s*<\/p>/iU', '\1\2\3', $content);
}
add_filter('the_content', 'filter_ptags_on_images');