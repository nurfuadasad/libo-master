<?php
/**
 * all demo import
 * @package  Libo
 * @since 1.0.0
 * @link https://github.com/proteusthemes/one-click-demo-import
 */

if ( !defined('ABSPATH') ){
	exit(); // exit if access directly
}

if (!class_exists('Libo_Theme_Demo_Import_Class')) {

	class Libo_Theme_Demo_Import_Class
	{
		/*
		* $instance
		* @since 1.0.0
		* */
		protected static $instance;

		public function __construct()
		{
			//import demo files
			add_filter( 'pt-ocdi/import_files', array($this,'import_files') );
			//import theme options data
			add_action('pt-ocdi/after_content_import_execution', array($this,'after_content_import_execution'), 3, 99 );
			//import import data setup default menu and home page and blog page
			add_action('pt-ocdi/after_import',array($this,'after_import_setup'));
			//disable prota theme branding
			add_filter( 'pt-ocdi/disable_pt_branding', '__return_true' );
		}

		/**
		 * getInstance()
		 * */
		public static function getInstance()
		{
			if (null == self::$instance) {
				self::$instance = new self();
			}
			return self::$instance;
		}

		/**
		 * Import Demo Files Data
		 * @since 1.0.
		 * */
		public function import_files() {
			return array(
				array(
					'import_file_name'           => 'Libo',
					'local_import_file'            => trailingslashit( LIBO_MASTER_ROOT_PATH ) . 'demo-data-import/demo-data/content.xml',
					'local_import_customizer_file'     => trailingslashit( LIBO_MASTER_ROOT_PATH ) . 'demo-data-import/demo-data/customize.dat',
					'local_import_widget_file'     => trailingslashit( LIBO_MASTER_ROOT_PATH ) . 'demo-data-import/demo-data/widgets.wie',
					'local_import_json'           => array(
						array(
							'file_path'     => trailingslashit( LIBO_MASTER_ROOT_PATH ) . 'demo-data-import/demo-data/theme-settings.json',
							'option_name'   => 'libo_theme_options',
						),
					),
					'import_notice' => esc_html__( 'Please Give Some Time To Import Theme Demo Data, It May Take 5-10 Minutes, It Will Download All Theme Data From Server So Be Cool!.', 'libo-master' ),
					'preview_url'   => 'https://irtech.biz/wp/libo',
				),
			);
		}

		/**
		 * Import Theme Options Data
		 * @since 1.0.0
		 * */
		function after_content_import_execution( $selected_import_files, $import_files, $selected_index ) {

			$downloader = new \OCDI\Downloader();

			if( ! empty( $import_files[$selected_index]['import_json'] ) ) {

				foreach( $import_files[$selected_index]['import_json'] as $index => $import ) {
					$file_path = $downloader->download_file( $import['file_url'], 'demo-import-file-'. $index .'-'. date( 'Y-m-d__H-i-s' ) .'.json' );
					$file_raw  = \OCDI\Helpers::data_from_file( $file_path );
					update_option( $import['option_name'], json_decode( $file_raw, true ) );
				}

			} else if( ! empty( $import_files[$selected_index]['local_import_json'] ) ) {

				foreach( $import_files[$selected_index]['local_import_json'] as $index => $import ) {
					$file_path = $import['file_path'];
					$file_raw  = \OCDI\Helpers::data_from_file( $file_path );
					update_option( $import['option_name'], json_decode( $file_raw, true ) );
				}

			}

		}
		/**
		 * after_import_setup
		 * @package Libo
		 * @since 1.0.0
		 * */
		function after_import_setup(){

			//assign menus to their locations
			$main_menu = get_term_by('name', 'Primary menu','nav_menu');

			set_theme_mod('nav_menu_locations',array(
					'main-menu' => $main_menu->term_id
				)
			);

			//assign front page and posts page ( blog page )
			$front_page_id = get_page_by_title('Homepage 01');
			$blog_page_id = get_page_by_title('News Standard');

			update_option('show_on_front','page');
			update_option('page_on_front',$front_page_id->ID);
			update_option('page_for_posts',$blog_page_id->ID);
		}

	}//end class
	if (class_exists('Libo_Theme_Demo_Import_Class')){
		Libo_Theme_Demo_Import_Class::getInstance();
	}
}