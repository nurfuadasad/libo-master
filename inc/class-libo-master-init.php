<?php

/**
 * @package Libo
 * @author Ir-Tech
 */
if (!defined("ABSPATH")) {
	exit(); //exit if access directly
}

if (!class_exists('Libo_Master_Init')) {

	class Libo_Master_Init
	{
		/*
        * $instance
        * @since 1.0.0
        * */
		protected static $instance;

		public function __construct()
		{
			//Load plugin assets
			add_action('wp_enqueue_scripts', array($this, 'plugin_assets'));
			//Load plugin admin assets
			add_action('admin_enqueue_scripts', array($this, 'admin_assets'));
			//load plugin text domain
			add_action('init', array($this, 'load_textdomain'));
			//add custom icon to codester framework
			add_filter('csf_field_icon_add_icons', array($this, 'csf_custom_icon'));
			//load plugin dependency files()
            add_action('plugin_loaded', array($this, 'load_plugin_dependency_files'));
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
		 * Load Plugin Text domain
		 * @since 1.0.0
		 * */
		public function load_textdomain()
		{
			load_plugin_textdomain('libo-master', false, LIBO_MASTER_ROOT_PATH . '/languages');
		}

		/**
		 * load plugin dependency files()
		 * @since 1.0.0
		 * */
		public function load_plugin_dependency_files()
		{
			$includes_files = array(
				array(
					'file-name' => 'codestar-framework',
					'folder-name' => LIBO_MASTER_LIB . '/codestar-framework'
				),
                array(
                    'file-name' => 'class-admin-request',
                    'folder-name' => LIBO_MASTER_ADMIN
                ),
				array(
					'file-name' => 'class-menu-page',
					'folder-name' => LIBO_MASTER_ADMIN
				),
				array(
					'file-name' => 'class-custom-post-type',
					'folder-name' => LIBO_MASTER_ADMIN
				),
				array(
					'file-name' => 'class-post-column-customize',
					'folder-name' => LIBO_MASTER_ADMIN
				),
				array(
					'file-name' => 'class-libo-master-excerpt',
					'folder-name' => LIBO_MASTER_INC
				),
				array(
					'file-name' => 'csf-taxonomy',
					'folder-name' => LIBO_MASTER_INC
				),
				array(
					'file-name' => 'class-libo-master-shortcodes',
					'folder-name' => LIBO_MASTER_INC
				),
				array(
					'file-name' => 'class-elementor-widget-init',
					'folder-name' => LIBO_MASTER_ELEMENTOR
				),
                array(
                    'file-name' => 'class-social-share-widget',
                    'folder-name' => LIBO_MASTER_WP_WIDGETS
                ),
                array(
                    'file-name' => 'class-about-me-widget',
                    'folder-name' => LIBO_MASTER_WP_WIDGETS
                ),
                array(
                    'file-name' => 'class-about-me-two-widget',
                    'folder-name' => LIBO_MASTER_WP_WIDGETS
                ),
                array(
                    'file-name' => 'class-about-us-widget',
                    'folder-name' => LIBO_MASTER_WP_WIDGETS
                ),
                array(
                    'file-name' => 'class-about-us-two-widget',
                    'folder-name' => LIBO_MASTER_WP_WIDGETS
                ),
                array(
                    'file-name' => 'class-widget-nav-menu',
                    'folder-name' => LIBO_MASTER_WP_WIDGETS
                ),
				array(
					'file-name' => 'class-recent-post-widget',
					'folder-name' => LIBO_MASTER_WP_WIDGETS
				),
				array(
					'file-name' => 'class-contact-info-widget',
					'folder-name' => LIBO_MASTER_WP_WIDGETS
				),
                array(
                    'file-name' => 'class-service-category-widget',
                    'folder-name' => LIBO_MASTER_WP_WIDGETS
                ),
                array(
                    'file-name' => 'class-service-doc-widget',
                    'folder-name' => LIBO_MASTER_WP_WIDGETS
                ),
                array(
                    'file-name' => 'class-post-category-widget',
                    'folder-name' => LIBO_MASTER_WP_WIDGETS
                ),
				array(
					'file-name' => 'class-demo-data-import',
					'folder-name' => LIBO_MASTER_DEMO_IMPORT
				),
			);

            if (defined('ELEMENTOR_VERSION')) {
                $includes_files[] = array(
                    'file-name' => 'libo-elementor-icon-manager',
                    'folder-name' => LIBO_MASTER_INC
                );
            }
			if (is_array($includes_files) && !empty($includes_files)) {
				foreach ($includes_files as $file) {
					if (file_exists($file['folder-name'] . '/' . $file['file-name'] . '.php')) {
						require_once $file['folder-name'] . '/' . $file['file-name'] . '.php';
					}
				}
			}
		}

		/**
		 * admin assets
		 * @since 1.0.0
		 * */
		public function plugin_assets()
		{
			self::load_plugin_css_files();
			self::load_plugin_js_files();
		}

		/**
		 * load plugin css files()
		 * @since 1.0.0
		 * */
		public function load_plugin_css_files()
		{
			$plugin_version = LIBO_MASTER_VERSION;
			$all_css_files = array(
				array(
					'handle' => 'flaticon',
					'src' => LIBO_MASTER_CSS . '/flaticon.css',
					'deps' => array(),
					'ver' => $plugin_version,
					'media' => 'all'
				),
				array(
					'handle' => 'owl-carousel',
					'src' => LIBO_MASTER_CSS . '/owl.carousel.min.css',
					'deps' => array(),
					'ver' => $plugin_version,
					'media' => 'all'
				),
                array(
                    'handle' => 'slick',
                    'src' => LIBO_MASTER_CSS . '/slick.css',
                    'deps' => array(),
                    'ver' => $plugin_version,
                    'media' => 'all'
                ),
				array(
					'handle' => 'fontawesome',
					'src' => LIBO_MASTER_CSS . '/font-awesome.min.css',
					'deps' => array(),
					'ver' => '5.12.0',
					'media' => 'all'
				),
				array(
					'handle' => 'libo-master-main-style',
					'src' => LIBO_MASTER_CSS . '/main-style.css',
					'deps' => array(),
					'ver' => $plugin_version,
					'media' => 'all'
				)
			);
			
			if (!libo_master()->is_libo_active()) {
				$all_css_files[] = array(
					'handle' => 'animate',
					'src' => LIBO_MASTER_CSS . '/animate.css',
					'deps' => array(),
					'ver' => $plugin_version,
					'media' => 'all'
				);
				$all_css_files[] = array(
					'handle' => 'bootstrap',
					'src' => LIBO_MASTER_CSS . '/bootstrap.min.css',
					'deps' => array(),
					'ver' => $plugin_version,
					'media' => 'all'
				);
				$all_css_files[] = array(
					'handle' => 'magnific-popup',
					'src' => LIBO_MASTER_CSS . '/magnific-popup.css',
					'deps' => array(),
					'ver' => $plugin_version,
					'media' => 'all'
				);
				$all_css_files[] = array(
					'handle' => 'libo-main-style',
					'src' => LIBO_MASTER_CSS . '/theme-style.css',
					'deps' => array(),
					'ver' => $plugin_version,
					'media' => 'all'
				);
				$all_css_files[] = array(
					'handle' => 'libo-responsive',
					'src' => LIBO_MASTER_CSS . '/theme-responsive.css',
					'deps' => array(),
					'ver' => $plugin_version,
					'media' => 'all'
				);
			}

			$all_css_files = apply_filters('libo_master_css', $all_css_files);

			if (is_array($all_css_files) && !empty($all_css_files)) {
				foreach ($all_css_files as $css) {
					call_user_func_array('wp_enqueue_style', $css);
				}
			}
		}

		/**
		 * load plugin js
		 * @since 1.0.0
		 * */
		public function load_plugin_js_files()
		{
			$plugin_version = LIBO_MASTER_VERSION;
			$all_js_files = array(
				array(
					'handle' => 'waypoints',
					'src' => LIBO_MASTER_JS . '/waypoints.min.js',
					'deps' => array('jquery'),
					'ver' => $plugin_version,
					'in_footer' => true
				),
				array(
					'handle' => 'counterup',
					'src' => LIBO_MASTER_JS . '/jquery.counterup.min.js',
					'deps' => array('jquery'),
					'ver' => $plugin_version,
					'in_footer' => true
				),
                array(
                    'handle' => 'rProgressbar',
                    'src' => LIBO_MASTER_JS . '/jQuery.rProgressbar.min.js',
                    'deps' => array('jquery'),
                    'ver' => $plugin_version,
                    'in_footer' => true
                ),
				array(
					'handle' => 'owl-carousel',
					'src' => LIBO_MASTER_JS . '/owl.carousel.min.js',
					'deps' => array('jquery'),
					'ver' => $plugin_version,
					'in_footer' => true
				),
                array(
                    'handle' => 'slick',
                    'src' => LIBO_MASTER_JS . '/slick.min.js',
                    'deps' => array('jquery'),
                    'ver' => $plugin_version,
                    'in_footer' => true
                ),
				array(
					'handle' => 'libo-master-main-script',
					'src' => LIBO_MASTER_JS . '/main.js',
					'deps' => array('jquery'),
					'ver' => $plugin_version,
					'in_footer' => true
				),
			);

			if (!libo_master()->is_libo_active()) {
				$all_js_files[] = array(
					'handle' => 'popper',
					'src' => LIBO_MASTER_JS . '/popper.min.js',
					'deps' => array('jquery'),
					'ver' => $plugin_version,
					'in_footer' => true
				);
				$all_js_files[] = array(
					'handle' => 'bootstrap',
					'src' => LIBO_MASTER_JS . '/bootstrap.min.js',
					'deps' => array('jquery'),
					'ver' => $plugin_version,
					'in_footer' => true
				);
				$all_js_files[] = array(
					'handle' => 'magnific-popup',
					'src' => LIBO_MASTER_JS . '/jquery.magnific-popup.js',
					'deps' => array('jquery'),
					'ver' => $plugin_version,
					'in_footer' => true
				);
			}

			$all_js_files = apply_filters('libo_master_frontend_script_enqueue', $all_js_files);
			if (is_array($all_js_files) && !empty($all_js_files)) {
				foreach ($all_js_files as $js) {
					call_user_func_array('wp_enqueue_script', $js);
				}
			}
		}

		/**
		 * admin assets
		 * @since 1.0.0
		 * */
		public function admin_assets()
		{
			self::load_admin_css_files();
			self::load_admin_js_files();
		}

		/**
		 * load plugin admin css files()
		 * @since 1.0.0
		 * */
		public function load_admin_css_files()
		{
			$plugin_version = LIBO_MASTER_VERSION;
			$all_css_files = array(
				array(
					'handle' => 'libo-master-admin-style',
					'src' => LIBO_MASTER_ADMIN_ASSETS . '/css/admin.css',
					'deps' => array(),
					'ver' => $plugin_version,
					'media' => 'all'
				),
				array(
					'handle' => 'flaticon',
					'src' => LIBO_MASTER_CSS . '/flaticon.css',
					'deps' => array(),
					'ver' => $plugin_version,
					'media' => 'all'
				),
			);

			$all_css_files = apply_filters('libo_admin_css', $all_css_files);
			if (is_array($all_css_files) && !empty($all_css_files)) {
				foreach ($all_css_files as $css) {
					call_user_func_array('wp_enqueue_style', $css);
				}
			}
		}

		/**
		 * load plugin admin js
		 * @since 1.0.0
		 * */
		public function load_admin_js_files()
		{
			$plugin_version = LIBO_MASTER_VERSION;
			$all_js_files = array(
				array(
					'handle' => 'libo-master-widget',
					'src' => LIBO_MASTER_ADMIN_ASSETS . '/js/widget.js',
					'deps' => array('jquery'),
					'ver' => $plugin_version,
					'in_footer' => true
				),
			);

			$all_js_files = apply_filters('libo_admin_js', $all_js_files);
			if (is_array($all_js_files) && !empty($all_js_files)) {
				foreach ($all_js_files as $js) {
					call_user_func_array('wp_enqueue_script', $js);
				}
			}
		}

		/**
		 * Add Custom Icon To Codester Framework
		 * @since 1.0.0
		 *
		 * */
		public function csf_custom_icon($icons)
		{
			//adding new icon
			$icons[]  = array(
				'title' => esc_html__('Flaticon', 'libo-master'),
				'icons' => array(
					'flaticon-stats',
					'flaticon-receipt',
					'flaticon-payment-method',
					'flaticon-businessman',
					'flaticon-label',
					'flaticon-statistics',
					'flaticon-tax',
					'flaticon-presentation',
					'flaticon-suitcase',
					'flaticon-credit',
					'flaticon-market',
					'flaticon-investment',
					'flaticon-men-group-outline',
					'flaticon-trophy',
					'flaticon-coffee',
					'flaticon-remote',
					'flaticon-growth',
					'flaticon-graphic',
					'flaticon-box',
					'flaticon-box-1',
					'flaticon-global',
					'flaticon-innovation',
					'flaticon-safe',
					'flaticon-tax-1',
					'flaticon-meeting',
					'flaticon-target',
					'flaticon-lcd'
				)
			);

			$icons = array_reverse($icons);

			return $icons;
		}
	} //end class
	if (class_exists('Libo_Master_Init')) {
		Libo_Master_Init::getInstance();
	}
}
