<?php
require_once get_template_directory() . '/includes/scripts.php';
require_once get_template_directory() . '/includes/additional.php';
require_once get_template_directory() . '/includes/disable_comments.php';

// ACF
if ( function_exists( 'acf_add_options_sub_page' ) ) {
	acf_add_options_sub_page( 'Theme settings' );
}

// Menus
add_action( 'init', 'register_theme_menus' );
function register_theme_menus()
{
	register_nav_menus( [
		'main-nav' => __( 'Main menu' ),
		'footer-nav' => __( 'Footer menu' ),
	] );
}

function get_menu_items_by_registered_slug( $menu_slug )
{
	$menu_items = [];
	
	if ( ( $locations = get_nav_menu_locations() ) && isset( $locations[ $menu_slug ] ) ) {
		$menu = get_term( $locations[ $menu_slug ] );
		$menu_items = wp_get_nav_menu_items( $menu -> term_id );
	}
	
	// Filtering
	
	$filtered_menu_items = [];
	
	$parent_menu_items = [];
	
	foreach ( $menu_items as $menu_item ) {
		if ( $menu_item -> menu_item_parent == '0' ) {
			$filtered_menu_items[] = $menu_item;
		} else {
			$parent_menu_item = $parent_menu_items[ $menu_item -> menu_item_parent ];
			if ( !isset( $parent_menu_item -> children ) ) {
				$parent_menu_item -> children = [];
			}
			$parent_menu_item -> children[] = $menu_item;
		}
		$parent_menu_items[ $menu_item -> ID ] = $menu_item;
	}
	
	return $filtered_menu_items;
}