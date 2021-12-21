<?php

function raw_theme(){
    wp_enqueue_script('customjs',  get_template_directory_uri() . '/js/index.js', array('jquery'), '1.0.0', false );
    wp_enqueue_style('customstyle', get_template_directory_uri() . '/css/style.css', array(), '1.0.1', 'all');

    wp_enqueue_style('slickcss', get_template_directory_uri() . '/slick/slick.css', array(), '1.8.0', 'all');
    wp_enqueue_style('slicktheme', get_template_directory_uri() . '/slick/slick-theme.css', array(), '1.8.0', 'all');
    wp_enqueue_script('slickjs',  get_template_directory_uri() . '/slick/slick.js', array('jquery'), '', true);
}
add_action('wp_enqueue_scripts', 'raw_theme');

function raw_theme_add_custom_image_sizes() {

     // Add "vertical" image
    add_image_size( 'vertical', 270, 500, true);
    add_image_size( 'vertical-larger', 890, 970, true);
    //horizontal
    add_image_size( 'horizontal', 450, 250, true);
    add_image_size( 'horizontal-b', 500, 225, true);
    //others
    add_image_size('image_desktop_full_no_crop', 3000 , 3500, false);
}
add_action('after_setup_theme', 'raw_theme_add_custom_image_sizes' );


use Carbon_Fields\Container;
use Carbon_Fields\Field;

add_action( 'carbon_fields_register_fields', 'portfolio_names' );
function portfolio_names() {
add_theme_support('portfolio');
Container::make('post_meta', 'Configurações gerais')
  ->set_context('side')
  ->set_priority('high')
  ->add_fields(array(
    Field::make('text', 'client', 'Client'),
    Field::make('text', 'agency', 'Agency'),
  ));
}

add_action( 'carbon_fields_register_fields', 'crb_attach_theme_options' );
function crb_attach_theme_options() {
    Container::make( 'theme_options', __( 'Theme Options', 'crb' ) )
        ->add_fields( array(
            Field::make( 'text', 'email', 'E-mail' ),
            Field::make( 'text', 'phone', 'Phone' ),
            Field::make( 'rich_text', 'address', 'Address' ),
            Field::make( 'text', 'link', 'Link de Shop' ),
            Field::make( 'text', 'instagram', 'Instagram' ),
            Field::make( 'text', 'facebook', 'Facebook' ),
            Field::make( 'text', 'vimeo', 'Vimeo' ),
            Field::make( 'text', 'youtube', 'Youtube' ),
        ) );
}


add_action( 'after_setup_theme', 'crb_load' );
function crb_load() {
	//define o caminho para o carbon-fields
	define(
		'Carbon_Fields\URL',
		get_template_directory_uri() . '/vendor/htmlburger/carbon-fields'
	);
  require_once('vendor/autoload.php');
  \Carbon_Fields\Carbon_Fields::boot();
}
add_action('after_setup_theme', 'register_carbon_fields');
function register_carbon_fields() {
	require_once('blocks/load.php');
}

///////////
///MENU////
///////////


/**
 * Main menu navigation
 */
register_nav_menus(array(
  'main-menu' => 'Menu principal',
));

add_action( 'wp_head', 'add_viewport_meta_tag' , '1' );

function add_viewport_meta_tag() {
    echo '<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">';
}

///////////
////post///
///////////
function my_theme_setup(){
    add_theme_support('post-thumbnails');
    add_image_size('cc__thumbnail_a4_horizontal_crop', 999, 700, array('center', 'center'));
}

add_action('after_setup_theme', 'my_theme_setup');

//////////
//excerpt//
///////////
add_post_type_support( 'page', 'excerpt' );


////////
//vcard///
///////////
function _thz_enable_vcard_upload( $mime_types ){
    $mime_types['vcf'] = 'text/vcard';
    $mime_types['vcard'] = 'text/vcard';
    return $mime_types;
}
add_filter('upload_mimes', '_thz_enable_vcard_upload' );





/**
* Removes or edits the 'Protected:' part from posts titles
*/
function the_title_trim($title) {

    $title = attribute_escape($title);

    $findthese = array(
        '#Protected:#',
        '#Private:#',
        '#Protegido:#'
    );

    $replacewith = array(
        '', // What to replace "Protected:" with
        '' // What to replace "Private:" with
    );

    $title = preg_replace($findthese, $replacewith, $title);
    return $title;
}
add_filter('the_title', 'the_title_trim');

// enable gutenberg for woocommerce
function activate_gutenberg_product( $can_edit, $post_type ) {
 if ( $post_type == 'product' ) {
        $can_edit = true;
    }
    return $can_edit;
}
add_filter( 'use_block_editor_for_post_type', 'activate_gutenberg_product', 10, 2 );

// enable taxonomy fields for woocommerce with gutenberg on
function enable_taxonomy_rest( $args ) {
    $args['show_in_rest'] = true;
    return $args;
}
add_filter( 'woocommerce_taxonomy_args_product_cat', 'enable_taxonomy_rest' );
add_filter( 'woocommerce_taxonomy_args_product_tag', 'enable_taxonomy_rest' );

/////////// 
/**
 * Change number of products that are displayed per page (shop page)
 */
add_filter( 'loop_shop_per_page', 'new_loop_shop_per_page', 20 );

function new_loop_shop_per_page( $cols ) {
  // $cols contains the current number of products per page based on the value stored on Options –> Reading
  // Return the number of products you wanna show per page.
  $cols = 3;
  return $cols;
}






/**
 * Remove product data tabs
 */
add_filter( 'woocommerce_product_tabs', 'woo_remove_product_tabs', 98 );

function woo_remove_product_tabs( $tabs ) {

    unset( $tabs['description'] );          // Remove the description tab
    unset( $tabs['reviews'] );          // Remove the reviews tab
    unset( $tabs['additional_information'] );   // Remove the additional information tab

    return $tabs;
}

add_filter ('yith_wcan_use_wp_the_query_object', '__return_true');

////////////////
////taxonomia///
////////////////

/* -- Post Type - portfolio -- */
function custom_post_type_portfolio() {
    $labels = [
        "name" => __( "Portfolio"),
        "singular_name" => __( "Portfolio"),
    ];

    $args = [
        "label" => __( "Portfolio"),
        "labels" => $labels,
        "description" => "",
        "public" => true,
        "publicly_queryable" => true,
        "show_ui" => true,
        "delete_with_user" => false,
        "show_in_rest" => true,
        "rest_base" => "",
        "rest_controller_class" => "WP_REST_Posts_Controller",
        "has_archive" => true,
        "show_in_menu" => true,
        "show_in_nav_menus" => true,
        "delete_with_user" => false,
        "exclude_from_search" => false,
        "capability_type" => "post",
        "map_meta_cap" => true,
        "hierarchical" => false,
        "rewrite" => [ "slug" => "portfolio", "with_front" => false, 'hierarchical' => true ],
        "query_var" => true,
        "menu_position" => 3,
        "menu_icon" => "dashicons-book-alt",
        "supports" => [ "title", "editor", "thumbnail", "excerpt", "trackbacks", "custom-fields", "comments", "revisions", "author", "page-attributes", "post-formats" ],
    ];

    register_post_type( "portfolio", $args );
}

add_action( 'init', 'custom_post_type_portfolio' );

/* ------------------------------ Taxonomias - Genero -----------------------------*/
function custom_taxonomy_portfoliocategories() {

    /**
     * Taxonomy: portfolio.
     */

    $labels = [
        "name" => __( "Portfolio Categories"),
        "singular_name" => __( "portfoliocategories"),
    ];

    $args = [
        "label" => __( "portfolio categories"),
        "labels" => $labels,
        "public" => true,
        "publicly_queryable" => true,
        "hierarchical" => true,
        "show_ui" => true,
        "show_in_menu" => true,
        "show_in_nav_menus" => true,
        "query_var" => true,
        "rewrite" => [ "slug" => "portfoliocategories", "with_front" => true, 'hierarchical' => true ],
        "show_admin_column" => true,
        "show_in_rest" => true,
        "rest_base" => "portfoliocategories",
        "rest_controller_class" => "WP_REST_Terms_Controller",
        "show_in_quick_edit" => true,
    ];

    register_taxonomy( "portfoliocategories", [ "portfolio" ], $args );
}
add_action( 'init', 'custom_taxonomy_portfoliocategories' );

add_filter('pre_get_posts', 'query_post_type');
function query_post_type($query) {
  if( is_category() ) {
    $post_type = get_query_var('post_type');
    if($post_type)
        $post_type = $post_type;
    else
        $post_type = array('nav_menu_item', 'post', 'portfolio'); // don't forget nav_menu_item to allow menus to work!
    $query->set('portfolio',$post_type);
    return $query;
    }
}

// function custom_front_page($wp_query){
//     if($wp_query->get('page_id')==get_option('page_on_front')){
//         $wp_query->set('post_type','portfolio');
//         $wp_query->set('page_id',''); // empty
//         // fix conditional functions
//         $wp_query->is_page = false;
//         $wp_query->is_archive = true;
//         $wp_query->is_post_type_archive = true;
//     }
// }
// add_action('pre_get_posts','custom_front_page');

// function my_home_category( $query ) {
//     if ( $query->is_home() && $query->is_main_query() ) {
//         $query->set( 'cat', '193' );
//     }
// }
// add_action( 'pre_get_posts', 'my_home_category' );
// function wpse1862_pre_get_posts( $query ) {
//     // Only modify the main query
//     // on the blog posts index page
//     if ( is_home() && $query->is_main_query() ) {
//         $query->set( 'portfolio', 'classics' );
//     }
// }
// add_action( 'pre_get_posts', 'wpse1862_pre_get_posts' );

// function my_home_category( $query ) {
//     if ( $query->is_home() && $query->is_main_query() ) {
//         $query->set( 'cat', '193' );
//     }
// }
// add_action( 'pre_get_posts', 'my_home_category' );




