<?php

/**
 * Added functions which remove the default post type.
 *
 * @package  Fox_PKG
 */

/**
 * Function register a custom 'fox-pkg-blog-type' taxonomy.
 *
 * @return void
 */

// begin cpt_products custom post type
function create_cpt_products()
{
	register_post_type(
		'cpt_products',
		array(
			'labels' => array(
				'name' => __('Packaging', 'Post Type General Name', 'text_domain'),
				'singular_name'       => __('Package', 'Post Type Singular Name', 'text_domain'),
				'menu_name'           => __('Packaging', 'text_domain'),
				'name_admin_bar'      => __('Packaging', 'text_domain'),
				'parent_item_colon'   => __('Parent Item:', 'text_domain'),
				'all_items'           => __('All Packaging', 'text_domain'),
				'add_new_item'        => __('Add New Package', 'text_domain'),
				'add_new'             => __('Add New', 'text_domain'),
				'new_item'            => __('New Item', 'text_domain'),
				'edit_item'           => __('Edit Item', 'text_domain'),
				'update_item'         => __('Update Item', 'text_domain'),
				'view_item'           => __('View Item', 'text_domain'),
				'search_items'        => __('Search Item', 'text_domain'),
				'not_found'           => __('Not found', 'text_domain'),
				'not_found_in_trash'  => __('Not found in Trash', 'text_domain'),
			),
			'public' => true,
			'has_archive' => true,
			'menu_icon' => 'dashicons-products',
			'menu_position' => 5,
			'rewrite' => array('slug' => 'products'),
			'supports' => array('title', 'editor', 'thumbnail', 'trackbacks', 'revisions', 'post-formats', 'page-attributes',),
			'capability_type'       => 'page'
		)
	);
}

add_action('init', 'create_cpt_products');

// begin custom taxonomy for products
function create_cpt_products_txny()
{

	register_taxonomy(
		'cpt_industry_txny',
		'cpt_products',
		array(
			'label' => __('Industry Type'),
			'rewrite' => array(
				'slug' => 'industry',
				'hierarchical' => true
			),
			'hierarchical' => true
		)
	);
	register_taxonomy(
		'cpt_product_commmodity_txny',
		'cpt_products',
		array(
			'label' => __('Commodity'),
			'rewrite' => array(
				'slug' => 'product-commodity',
				'hierarchical' => true
			),
			'hierarchical' => true
		)
	);
}

add_action('init', 'create_cpt_products_txny');
// end custom taxonomy for products

// Register Custom Post Type
function custom_post_type()
{

	$labels = array(
		'name'                => _x('Equipment', 'Post Type General Name', 'text_domain'),
		'singular_name'       => _x('Machine', 'Post Type Singular Name', 'text_domain'),
		'menu_name'           => __('Equipment', 'text_domain'),
		'name_admin_bar'      => __('Equipment', 'text_domain'),
		'parent_item_colon'   => __('Parent Item:', 'text_domain'),
		'all_items'           => __('All Machines', 'text_domain'),
		'add_new_item'        => __('Add New Item', 'text_domain'),
		'add_new'             => __('Add New', 'text_domain'),
		'new_item'            => __('New Item', 'text_domain'),
		'edit_item'           => __('Edit Item', 'text_domain'),
		'update_item'         => __('Update Item', 'text_domain'),
		'view_item'           => __('View Item', 'text_domain'),
		'search_items'        => __('Search Item', 'text_domain'),
		'not_found'           => __('Not found', 'text_domain'),
		'not_found_in_trash'  => __('Not found in Trash', 'text_domain'),
	);
	$args = array(
		'label'               => __('equipment', 'text_domain'),
		'description'         => __('Post Type Description', 'text_domain'),
		'labels'              => $labels,
		'supports'            => array('title', 'editor', 'thumbnail', 'custom-fields', 'post-formats', 'page-attributes',),
		'taxonomies'          => array('cpt_equipment_txny', 'cpt_commmodity_txny'),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'menu_icon' 		  => 'dashicons-block-default',
		'show_in_menu'        => true,
		'menu_position'       => 6,
		'show_in_admin_bar'   => true,
		'show_in_nav_menus'   => true,
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'page',
	);
	register_post_type('equipment', $args);
}

// Hook into the 'init' action
add_action('init', 'custom_post_type', 0);

// begin custom taxonomy for equipment
function create_cpt_equipment_txny()
{

	register_taxonomy(
		'cpt_equipment_txny',
		'equipment',
		array(
			'label' => __('Equipment Type'),
			'rewrite' => array(
				'slug' => 'our-equipment',
				'hierarchical' => true
			),
			'hierarchical' => true
		)
	);
	register_taxonomy(
		'cpt_commmodity_txny',
		'equipment',
		array(
			'label' => __('Commodity'),
			'rewrite' => array(
				'slug' => 'equipment-commodity',
				'hierarchical' => true
			),
			'hierarchical' => true
		)
	);
}

add_action('init', 'create_cpt_equipment_txny');
// end custom taxonomy for equipment

// begin cpt_resources custom post type
function create_cpt_resources()
{
	register_post_type(
		'cpt_resources',
		array(
			'labels' => array(
				'name' => __('Resources', 'Post Type General Name', 'text_domain'),
				'singular_name'       => __('Resource', 'Post Type Singular Name', 'text_domain'),
				'menu_name'           => __('Resources', 'text_domain'),
				'name_admin_bar'      => __('Resources', 'text_domain'),
				'parent_item_colon'   => __('Parent Item:', 'text_domain'),
				'all_items'           => __('All Resources', 'text_domain'),
				'add_new_item'        => __('Add New Resource', 'text_domain'),
				'add_new'             => __('Add New', 'text_domain'),
				'new_item'            => __('New Item', 'text_domain'),
				'edit_item'           => __('Edit Item', 'text_domain'),
				'update_item'         => __('Update Item', 'text_domain'),
				'view_item'           => __('View Item', 'text_domain'),
				'search_items'        => __('Search Item', 'text_domain'),
				'not_found'           => __('Not found', 'text_domain'),
				'not_found_in_trash'  => __('Not found in Trash', 'text_domain'),
			),
			'public' => true,
			'has_archive' => true,
			'menu_icon' => 'dashicons-download',
			'menu_position' => 7,
			'rewrite' => array('slug' => 'resources'),
			'supports' => array('title', 'editor', 'thumbnail', 'trackbacks', 'revisions', 'post-formats', 'excerpt')
		)
	);
}

add_action('init', 'create_cpt_resources');
// end cpt_resources custom post type

// begin custom taxonomy for resources
function create_cpt_resources_txny()
{

	register_taxonomy(
		'cpt_resources_txny',
		'cpt_resources',
		array(
			'label' => __('Resource Type'),
			'rewrite' => array(
				'slug' => 'our-resources',
				'hierarchical' => true
			),
			'hierarchical' => true
		)
	);
}

add_action('init', 'create_cpt_resources_txny');
// end custom taxonomy for resources
