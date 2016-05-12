<?php
/**
 * Betelnut child functions and definitions
 *
 */

add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );
function theme_enqueue_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );

}

function pistache_jetpack_setup() {

	/**
		* Add theme support for Portfolio.
	*/
	add_theme_support( 'jetpack-portfolio' );

}
add_action( 'after_setup_theme', 'pistache_jetpack_setup' );


add_filter( 'jetpack_development_mode', '__return_true' );


/* Register Portfolio
 ********************
*/


add_action( 'init', 'pistache_register_post_types' );


function pistache_register_post_types() {

		// Add portfolio custom post type
		
		if ( post_type_exists( 'jetpack-portfolio' ) ) {
		
		   // do nothing
		
		} else {
		
				
				register_post_type( 'jetpack-portfolio', array(
							'description' => __( 'Portfolio Items', 'jetpack' ),
							'labels' => array(
								'name'                  => esc_html__( 'Projects',                   'jetpack' ),
								'singular_name'         => esc_html__( 'Project',                    'jetpack' ),
								'menu_name'             => esc_html__( 'Portfolio',                  'jetpack' ),
								'all_items'             => esc_html__( 'All Projects',               'jetpack' ),
								'add_new'               => esc_html__( 'Add New',                    'jetpack' ),
								'add_new_item'          => esc_html__( 'Add New Project',            'jetpack' ),
								'edit_item'             => esc_html__( 'Edit Project',               'jetpack' ),
								'new_item'              => esc_html__( 'New Project',                'jetpack' ),
								'view_item'             => esc_html__( 'View Project',               'jetpack' ),
								'search_items'          => esc_html__( 'Search Projects',            'jetpack' ),
								'not_found'             => esc_html__( 'No Projects found',          'jetpack' ),
								'not_found_in_trash'    => esc_html__( 'No Projects found in Trash', 'jetpack' ),
								'filter_items_list'     => esc_html__( 'Filter projects list',       'jetpack' ),
								'items_list_navigation' => esc_html__( 'Project list navigation',    'jetpack' ),
								'items_list'            => esc_html__( 'Projects list',              'jetpack' ),
							),
							'supports' => array(
								'title',
								'editor',
								'thumbnail',
								'author',
								'comments',
								'publicize',
								'wpcom-markdown',
							),
							'rewrite' => array(
								'slug'       => 'portfolio',
								'with_front' => false,
								'feeds'      => true,
								'pages'      => true,
							),
							'public'          => true,
							'show_ui'         => true,
							'menu_position'   => 20,                    // below Pages
							'menu_icon'       => 'dashicons-portfolio', // 3.8+ dashicon option
							'capability_type' => 'page',
							'map_meta_cap'    => true,
							'taxonomies'      => array( 'jetpack-portfolio-type', 'jetpack-portfolio-tag' ),
							'has_archive'     => true,
							'query_var'       => 'portfolio',
							'show_in_rest'    => true,
						) );
				
						register_taxonomy( 'jetpack-portfolio-type', 'jetpack-portfolio', array(
							'hierarchical'      => true,
							'labels'            => array(
								'name'                  => esc_html__( 'Project Types',                 'jetpack' ),
								'singular_name'         => esc_html__( 'Project Type',                  'jetpack' ),
								'menu_name'             => esc_html__( 'Project Types',                 'jetpack' ),
								'all_items'             => esc_html__( 'All Project Types',             'jetpack' ),
								'edit_item'             => esc_html__( 'Edit Project Type',             'jetpack' ),
								'view_item'             => esc_html__( 'View Project Type',             'jetpack' ),
								'update_item'           => esc_html__( 'Update Project Type',           'jetpack' ),
								'add_new_item'          => esc_html__( 'Add New Project Type',          'jetpack' ),
								'new_item_name'         => esc_html__( 'New Project Type Name',         'jetpack' ),
								'parent_item'           => esc_html__( 'Parent Project Type',           'jetpack' ),
								'parent_item_colon'     => esc_html__( 'Parent Project Type:',          'jetpack' ),
								'search_items'          => esc_html__( 'Search Project Types',          'jetpack' ),
								'items_list_navigation' => esc_html__( 'Project type list navigation',  'jetpack' ),
								'items_list'            => esc_html__( 'Project type list',             'jetpack' ),
							),
							'public'            => true,
							'show_ui'           => true,
							'show_in_nav_menus' => true,
							'show_admin_column' => true,
							'query_var'         => true,
							'rewrite'           => array( 'slug' => 'project-type' ),
						) );
				
						register_taxonomy( 'jetpack-portfolio-tag', 'jetpack-portfolio', array(
							'hierarchical'      => false,
							'labels'            => array(
								'name'                       => esc_html__( 'Project Tags',                   'jetpack' ),
								'singular_name'              => esc_html__( 'Project Tag',                    'jetpack' ),
								'menu_name'                  => esc_html__( 'Project Tags',                   'jetpack' ),
								'all_items'                  => esc_html__( 'All Project Tags',               'jetpack' ),
								'edit_item'                  => esc_html__( 'Edit Project Tag',               'jetpack' ),
								'view_item'                  => esc_html__( 'View Project Tag',               'jetpack' ),
								'update_item'                => esc_html__( 'Update Project Tag',             'jetpack' ),
								'add_new_item'               => esc_html__( 'Add New Project Tag',            'jetpack' ),
								'new_item_name'              => esc_html__( 'New Project Tag Name',           'jetpack' ),
								'search_items'               => esc_html__( 'Search Project Tags',            'jetpack' ),
								'popular_items'              => esc_html__( 'Popular Project Tags',           'jetpack' ),
								'separate_items_with_commas' => esc_html__( 'Separate tags with commas',      'jetpack' ),
								'add_or_remove_items'        => esc_html__( 'Add or remove tags',             'jetpack' ),
								'choose_from_most_used'      => esc_html__( 'Choose from the most used tags', 'jetpack' ),
								'not_found'                  => esc_html__( 'No tags found.',                 'jetpack' ),
								'items_list_navigation'      => esc_html__( 'Project tag list navigation',    'jetpack' ),
								'items_list'                 => esc_html__( 'Project tag list',               'jetpack' ),
							),
							'public'            => true,
							'show_ui'           => true,
							'show_in_nav_menus' => true,
							'show_admin_column' => true,
							'query_var'         => true,
							'rewrite'           => array( 'slug' => 'project-tag' ),
						) );
						
						
				
			
		} // end else
		
		
		
		// end registering post type

}

// test if Portfolio is active?