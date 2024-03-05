<?php

/**
 * All Custom Post Type
 * Author Libo
 * @since 1.0.1
 * */

if ( ! defined( 'ABSPATH' ) ) {
	exit(); //exit if access directly
}

if ( ! class_exists( 'Libo_Custom_Post_Type' ) ) {
	class Libo_Custom_Post_Type {

		//$instance variable
		private static $instance;

		public function __construct() {
			//register post type
			add_action( 'init', array( $this, 'register_custom_post_type' ) );
		}

		/**
		 * get Instance
		 * @since  2.0.0
		 * */
		public static function getInstance() {
			if ( null == self::$instance ) {
				self::$instance = new self();
			}

			return self::$instance;
		}

		/**
		 * Register Custom Post Type
		 * @since  2.0.0
		 * */
		public function register_custom_post_type() {
			if (!defined('ELEMENTOR_VERSION')){
				return;
			}
			$all_post_type = array(
				[
					'post_type' => 'service',
					'args'      => array(
						'label'              => esc_html__( 'Service', 'libo-master' ),
						'description'        => esc_html__( 'Service', 'libo-master' ),
						'labels'             => array(
							'name'               => esc_html_x( 'Service', 'Post Type General Name', 'libo-master' ),
							'singular_name'      => esc_html_x( 'Service', 'Post Type Singular Name', 'libo-master' ),
							'menu_name'          => esc_html__( 'Service', 'libo-master' ),
							'all_items'          => esc_html__( 'Services', 'libo-master' ),
							'view_item'          => esc_html__( 'View Service', 'libo-master' ),
							'add_new_item'       => esc_html__( 'Add New Service', 'libo-master' ),
							'add_new'            => esc_html__( 'Add New Service', 'libo-master' ),
							'edit_item'          => esc_html__( 'Edit Service', 'libo-master' ),
							'update_item'        => esc_html__( 'Update Service', 'libo-master' ),
							'search_items'       => esc_html__( 'Search Service', 'libo-master' ),
							'not_found'          => esc_html__( 'Not Found', 'libo-master' ),
							'not_found_in_trash' => esc_html__( 'Not found in Trash', 'libo-master' ),
							'featured_image' => esc_html__( 'Service Image', 'libo-master' ),
							'remove_featured_image' => esc_html__( 'Remove Service Image', 'libo-master' ),
							'set_featured_image' => esc_html__( 'Set Service Image', 'libo-master' ),
						),
						'supports'           => array( 'title','thumbnail','excerpt','editor','comments' ),
						'hierarchical'       => false,
						'public'             => true,
						"publicly_queryable" => true,
						'show_ui'            => true,
						'show_in_menu'       => 'libo_theme_options',
						"rewrite" => array( 'slug' => 'all-services', 'with_front' => true),
						'can_export'         => true,
						'capability_type'    => 'post',
                        "show_in_rest"       => true,
						'query_var'          => true
					)
				],
                [
                    'post_type' => 'case-study',
                    'args'      => array(
                        'label'              => esc_html__( 'Case Study', 'libo-master' ),
                        'description'        => esc_html__( 'Case Study', 'libo-master' ),
                        'labels'             => array(
                            'name'               => esc_html_x( 'Case Study', 'Post Type General Name', 'libo-master' ),
                            'singular_name'      => esc_html_x( 'Case Study', 'Post Type Singular Name', 'libo-master' ),
                            'menu_name'          => esc_html__( 'Case Study', 'libo-master' ),
                            'all_items'          => esc_html__( 'Case Studys', 'libo-master' ),
                            'view_item'          => esc_html__( 'View Case Study', 'libo-master' ),
                            'add_new_item'       => esc_html__( 'Add New Case Study', 'libo-master' ),
                            'add_new'            => esc_html__( 'Add New Case Study', 'libo-master' ),
                            'edit_item'          => esc_html__( 'Edit Case Study', 'libo-master' ),
                            'update_item'        => esc_html__( 'Update Case Study', 'libo-master' ),
                            'search_items'       => esc_html__( 'Search Case Study', 'libo-master' ),
                            'not_found'          => esc_html__( 'Not Found', 'libo-master' ),
                            'not_found_in_trash' => esc_html__( 'Not found in Trash', 'libo-master' ),
                            'featured_image' => esc_html__( 'Case Study Image', 'libo-master' ),
                            'remove_featured_image' => esc_html__( 'Remove Case Study Image', 'libo-master' ),
                            'set_featured_image' => esc_html__( 'Set Case Study Image', 'libo-master' ),
                        ),
                        'supports'           => array( 'title','thumbnail','excerpt','editor','comments' ),
                        'hierarchical'       => false,
                        'public'             => true,
                        "publicly_queryable" => true,
                        'show_ui'            => true,
                        'show_in_menu'       => 'libo_theme_options',
                        "rewrite" => array( 'slug' => 'all-case-study', 'with_front' => true),
                        'can_export'         => true,
                        'capability_type'    => 'post',
                        "show_in_rest"       => true,
                        'query_var'          => true
                    )
                ],
                [
                    'post_type' => 'portfolio',
                    'args'      => array(
                        'label'              => esc_html__( 'Portfolio', 'libo-master' ),
                        'description'        => esc_html__( 'Portfolio', 'libo-master' ),
                        'labels'             => array(
                            'name'               => esc_html_x( 'Portfolio', 'Post Type General Name', 'libo-master' ),
                            'singular_name'      => esc_html_x( 'Portfolio', 'Post Type Singular Name', 'libo-master' ),
                            'menu_name'          => esc_html__( 'Portfolio', 'libo-master' ),
                            'all_items'          => esc_html__( 'Portfolios', 'libo-master' ),
                            'view_item'          => esc_html__( 'View Portfolio', 'libo-master' ),
                            'add_new_item'       => esc_html__( 'Add New Portfolio', 'libo-master' ),
                            'add_new'            => esc_html__( 'Add New Portfolio', 'libo-master' ),
                            'edit_item'          => esc_html__( 'Edit Portfolio', 'libo-master' ),
                            'update_item'        => esc_html__( 'Update Portfolio', 'libo-master' ),
                            'search_items'       => esc_html__( 'Search Portfolio', 'libo-master' ),
                            'not_found'          => esc_html__( 'Not Found', 'libo-master' ),
                            'not_found_in_trash' => esc_html__( 'Not found in Trash', 'libo-master' ),
                            'featured_image' => esc_html__( 'Portfolio Image', 'libo-master' ),
                            'remove_featured_image' => esc_html__( 'Remove Portfolio Image', 'libo-master' ),
                            'set_featured_image' => esc_html__( 'Set Portfolio Image', 'libo-master' ),
                        ),
                        'supports'           => array( 'title','thumbnail','excerpt','editor','comments' ),
                        'hierarchical'       => false,
                        'public'             => true,
                        "publicly_queryable" => true,
                        'show_ui'            => true,
                        'show_in_menu'       => 'libo_theme_options',
                        "rewrite" => array( 'slug' => 'all-portfolio', 'with_front' => true),
                        'can_export'         => true,
                        'capability_type'    => 'post',
                        "show_in_rest"       => true,
                        'query_var'          => true
                    )
                ]
			);

			if ( ! empty( $all_post_type ) && is_array( $all_post_type ) ) {

				foreach ( $all_post_type as $post_type ) {
					call_user_func_array( 'register_post_type', $post_type );
				}
			}

			//add custom taxonomy

			/**
			 * Custom Taxonomy Register
			 */

			$all_custom_taxonmy = array(
				array(
					'taxonomy' => 'service-cat',
					'object_type' => 'service',
					'args' => array(
						"labels" => array(
							"name" => esc_html__( "Service Category", 'libo-master' ),
							"singular_name" => esc_html__( "Service Category", 'libo-master' ),
							"menu_name" => esc_html__( "Service Category", 'libo-master' ),
							"all_items" => esc_html__( "All Service Category", 'libo-master' ),
							"add_new_item" => esc_html__( "Add New Service Category", 'libo-master' )
						),
						"public" => true,
						"hierarchical" => true,
						"show_ui" => true,
						"show_in_menu" => true,
						"show_in_nav_menus" => true,
						"query_var" => true,
						"rewrite" => array( 'slug' => 'service-cat', 'with_front' => true),
						"show_admin_column" => true,
						"show_in_rest" => true,
						"show_in_quick_edit" => true,
					)
				),
                array(
                    'taxonomy' => 'case-study-cat',
                    'object_type' => 'case-study',
                    'args' => array(
                        "labels" => array(
                            "name" => esc_html__( "Case Study Category", 'libo-master' ),
                            "singular_name" => esc_html__( "Case Study Category", 'libo-master' ),
                            "menu_name" => esc_html__( "Case Study Category", 'libo-master' ),
                            "all_items" => esc_html__( "All Case Study Category", 'libo-master' ),
                            "add_new_item" => esc_html__( "Add New Case Study Category", 'libo-master' )
                        ),
                        "public" => true,
                        "hierarchical" => true,
                        "show_ui" => true,
                        "show_in_menu" => true,
                        "show_in_nav_menus" => true,
                        "query_var" => true,
                        "rewrite" => array( 'slug' => 'case-study-cat', 'with_front' => true),
                        "show_admin_column" => true,
                        "show_in_rest" => true,
                        "show_in_quick_edit" => true,
                    )
                ),
                array(
                    'taxonomy' => 'portfolio-cat',
                    'object_type' => 'portfolio',
                    'args' => array(
                        "labels" => array(
                            "name" => esc_html__( "Portfolio Category", 'libo-master' ),
                            "singular_name" => esc_html__( "Portfolio Category", 'libo-master' ),
                            "menu_name" => esc_html__( "Portfolio Category", 'libo-master' ),
                            "all_items" => esc_html__( "All Portfolio Category", 'libo-master' ),
                            "add_new_item" => esc_html__( "Add New Portfolio Category", 'libo-master' )
                        ),
                        "public" => true,
                        "hierarchical" => true,
                        "show_ui" => true,
                        "show_in_menu" => true,
                        "show_in_nav_menus" => true,
                        "query_var" => true,
                        "rewrite" => array( 'slug' => 'portfolio-cat', 'with_front' => true),
                        "show_admin_column" => true,
                        "show_in_rest" => true,
                        "show_in_quick_edit" => true,
                    )
                )
			);

			if (is_array($all_custom_taxonmy) && !empty($all_custom_taxonmy)){
				foreach ($all_custom_taxonmy as $taxonomy){
					call_user_func_array('register_taxonomy',$taxonomy);
				}
			}

			flush_rewrite_rules();
		}

	}//end class

	if ( class_exists( 'Libo_Custom_Post_Type' ) ) {
		Libo_Custom_Post_Type::getInstance();
	}
}