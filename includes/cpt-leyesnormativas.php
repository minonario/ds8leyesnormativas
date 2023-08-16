<?php
/**
 * Post Types
 *
 * Registers post types and taxonomies
 *
 * @class       DS8_CPT
 * @version     1.0
 * @package     DS8/Classes/Leyesnormativa
 * @category    Class
 * @author      Jose Luis Morales
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * DS8_CPT Class
 */
class DS8_CPT_LEYES {

	/**
	 * Hook in methods.
	 */
	public static function init() {
		add_action( 'init', array( __CLASS__, 'register_post_types' ), 5 );
                add_action( 'init', array( __CLASS__, 'register_taxonomies' ), 5 );
	}

	/**
	 * Register core post types.
	 */
	public static function register_post_types() {

		if ( post_type_exists('leynormativa') ) {
			return;
		}

		$permalinks = get_option( 'ds8leyesnormativas_permalinks' );
		$leyesnormativas_permalink = empty( $permalinks['leyesnormativas_base'] ) ? _x( 'leynormativa', 'slug', 'ds8leyesnormativas' ) : $permalinks['leyesnormativas_base'];

		register_post_type( 'leynormativa',
			apply_filters( 'ds8leyesnormativas_register_post_type_leyesnormativas',
				array(
                                    'labels'  => array(
                                                    'name'               => __( 'Leyes Normativas', 'ds8leyesnormativas' ),
                                                    'singular_name'      => __( 'Ley Normativa', 'ds8leyesnormativas' ),
                                                    'menu_name'          => _x( 'Leyes Normativas', 'Admin menu name', 'ds8leyesnormativas' ),
                                                    'add_new'            => __( 'Add new', 'ds8leyesnormativas' ),
                                                    'add_new_item'       => __( 'Add new Ley normativa', 'ds8leyesnormativas' ),
                                                    'edit'               => __( 'Edit', 'ds8leyesnormativas' ),
                                                    'edit_item'          => __( 'Edit Ley normativa', 'ds8leyesnormativas' ),
                                                    'new_item'           => __( 'New Ley normativa', 'ds8leyesnormativas' ),
                                                    'view'               => __( 'View', 'ds8leyesnormativas' ),
                                                    'view_item'          => __( 'View Ley normativa', 'ds8leyesnormativas' ),
                                                    'search_items'       => __( 'Search Leyes normativas', 'ds8leyesnormativas' ),
                                                    'not_found'          => __( 'Not found Leyes normativas', 'ds8leyesnormativas' ),
                                                    'not_found_in_trash' => __( 'Not found Leyes normativas in trash', 'ds8leyesnormativas' ),
                                                    'parent'             => __( 'Parent Leyes normativas', 'ds8leyesnormativas' )
						),
                                    'description'         => __( 'This is where you can add new Leyes normativas.', 'ds8leyesnormativas' ),
                                    'public'              => true,
                                    'register_meta_box_cb' => array('DS8Leyesnormativas','add_pdfcustom_meta_boxes'),
                                    'show_ui'             => true,
                                    'show_in_menu'        => true,
                                    'show_in_nav_menus'   => true,
                                    'capability_type'     => 'leynormativa',
                                    'map_meta_cap'        => true,
                                    'publicly_queryable'  => true,
                                    'exclude_from_search' => false,
                                    'hierarchical'        => false,
                                    'menu_icon'           => 'dashicons-feedback',
                                    //'taxonomies'          => array('category'),
                                    'rewrite'             => $leyesnormativas_permalink ? array( 'slug' => untrailingslashit( $leyesnormativas_permalink ), 'with_front' => false, 'feeds' => false ) : false,
                                    'query_var'           => true,
                                    'supports'            => array( 'title', 'editor', 'excerpt', 'thumbnail', 'custom-fields', 'page-attributes', 'author' ),
                                    'has_archive'         => true,
                                    'show_in_nav_menus'   => true,
                                    'show_in_menu'        => true
				)
			)
		);
	}
        
        public static function register_taxonomies() {
            
		if ( taxonomy_exists( 'leynormativa_cat' ) ) {
			return;
		}
                
                $permalinks = get_option( 'ds8leyesnormativas_permalinks' );
                
		register_taxonomy( 'leynormativa_cat',
                                 'leynormativa',
			apply_filters( 'ds8_taxonomy_args_leynormativa_cat', array(
				'hierarchical'          => true,
                                //'update_count_callback' => '_sc_term_recount',
                                //'has_archive'           => true,
				'label'                 => __( 'Leyes Normativa Categories', 'ds8leyesnormativas' ),
                                'show_admin_column' => true,
				'labels' => array(
						'name'              => __( 'Leyes normativas Categories', 'ds8leyesnormativas' ),
						'singular_name'     => __( 'Leye normativa Category', 'ds8leyesnormativas' ),
                                                'menu_name'         => _x( 'Categories', 'Admin menu name', 'ds8leyesnormativas' ),
						'search_items'      => __( 'Search Leyes normativas Category', 'ds8leyesnormativas' ),
						'all_items'         => __( 'All Categories', 'ds8leyesnormativas' ),
						'parent_item'       => __( 'Parent Leyes normativas Category', 'ds8leyesnormativas' ),
						'parent_item_colon' => __( 'Parent Leyes normativas Category:', 'ds8leyesnormativas' ),
						'edit_item'         => __( 'Edit Category', 'ds8leyesnormativas' ),
						'update_item'       => __( 'Update Category', 'ds8leyesnormativas' ),
						'add_new_item'      => __( 'Add new Leyes normativas Category', 'ds8leyesnormativas' ),
						'new_item_name'     => __( 'New Leyes normativas Category', 'ds8leyesnormativas' )
					),
				'show_ui'               => true,
				'query_var'             => true,
                                /*,
				'capabilities'          => array(
					'manage_terms' => 'manage_product_terms',
					'edit_terms'   => 'edit_product_terms',
					'delete_terms' => 'delete_product_terms',
					'assign_terms' => 'assign_product_terms',
				),*/
				'rewrite'               => array(
					'slug'         => empty( $permalinks['category_base'] ) ? _x( 'leyesnormativas-category', 'slug', 'ds8leyesnormativas' ) : $permalinks['category_base'],
					'with_front'   => false,
					'hierarchical' => true,
				),
			) )
		);
	}

}

DS8_CPT_LEYES::init();
