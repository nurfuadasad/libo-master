<?php

/**
 * All Elementor widget init
 * @package Libo
 * @since 1.0.0
 */

if (!defined('ABSPATH')) {
    exit(); // exit if access directly
}


if (!class_exists('Libo_Elementor_Widget_Init')) {

    class Libo_Elementor_Widget_Init
    {
        /*
        * $instance
        * @since 1.0.0
        * */
        private static $instance;

        /*
        * construct()
        * @since 1.0.0
        * */
        public function __construct()
        {
            add_action('elementor/elements/categories_registered', array($this, '_widget_categories'));
            //elementor widget registered
            add_action('elementor/widgets/widgets_registered', array($this, '_widget_registered'));
            // elementor editor css
            add_action('elementor/editor/after_enqueue_scripts', array($this, 'load_assets_for_elementor'));
            //add icon to elementor new icons fileds
            add_filter('elementor/icons_manager/native', array($this, 'add_custom_icon_to_elementor_icons'));
        }

        /*
       * getInstance()
       * @since 1.0.0
       * */
        public static function getInstance()
        {
            if (null == self::$instance) {
                self::$instance = new self();
            }
            return self::$instance;
        }

        /**
         * _widget_categories()
         * @since 1.0.0
         * */
        public function _widget_categories($elements_manager)
        {
            $elements_manager->add_category(
                'libo_widgets',
                [
                    'title' => esc_html__('Libo Widgets', 'libo-master'),
                    'icon' => 'fas fa-plug',
                ]
            );
        }

        /**
         * _widget_registered()
         * @since 1.0.0
         * */
        public function _widget_registered()
        {
            if (!class_exists('Elementor\Widget_Base')) {
                return;
            }
            $elementor_widgets = array(
                'accordion',
                'header-slider-one',
                'header-slider-three',
                'icon-box-list',
                'chat-box-list',
				'icon-box-one',
                'counterup-one',
                'counterup-two',
                'brand-slider',
                'about-single-item',
                'service-single-grid-item',
                'service-single-item-two',
                'service-single-item-two',
                'service-single-item-three',
                'service-single-item-four',
                'portfolio-item-three',
                'single-skill-item',
                'blog-slider-grid',
                'blog-slider-one',
                'blog-slider-two',
                'blog-slider-three',
                'testimonial-one',
                'business-single-item',
                'single-careers-item',
                'single-case-study-item',
                'single-case-study-item-two',
                'single-case-study-item-three',
                'single-case-study-list-item',
                'portfolio-grid-item',
                'portfolio-grid-item-two',
                'pgbar-single-item',
                'pgbar-single-item-two',
                'empty-div',
                'video-hover',
                'heading-title',
                'team-carousel-one',
                'team-carousel-two',
                'contact-info-list-one',
                'contact-info-list-two',
                'image-control-item',
                'image-control-item-two',
            );
            $elementor_widgets = apply_filters('libo_elementor_widget', $elementor_widgets);
            ksort($elementor_widgets);
            if (is_array($elementor_widgets) && !empty($elementor_widgets)) {
                foreach ($elementor_widgets as $widget) {
                    if (file_exists(LIBO_MASTER_ELEMENTOR . '/widgets/class-' . $widget . '-elementor-widget.php')) {
                        require_once LIBO_MASTER_ELEMENTOR . '/widgets/class-' . $widget . '-elementor-widget.php';
                    }
                }
            }
        }

        public function add_custom_icon_to_elementor_icons($icons)
        {
            $icons['flaticon'] = [
                'name' => 'flaticon',
                'label' => esc_html__('Flaticon', 'libo-master'),
                'url' => LIBO_MASTER_CSS . '/flaticon.css', // icon css file
                'enqueue' => [LIBO_MASTER_CSS . '/flaticon.css'], // icon css file
                'prefix' => 'flaticon-', //prefix ( like fas-fa  )
                'displayPrefix' => '', //prefix to display icon
                'labelIcon' => 'flaticon-handwash', //tab icon of elementor icons library
                'ver' => '1.0.0',
                'fetchJson' => LIBO_MASTER_JS . '/flaticon.js', //json file with icon list example {"icons: ['icon class']}
                'native' => true,
            ];

            return $icons;
        }

        /**
         * load custom assets for elementor
         * @since 1.0.0
         * */
        public function load_assets_for_elementor()
        {
            wp_enqueue_style('flaticon', LIBO_MASTER_CSS . '/flaticon.css');
            wp_enqueue_style('libo-master-elementor-style', LIBO_MASTER_ADMIN_ASSETS . '/css/elementor-editor.css');
        }
    }

    if (class_exists('Libo_Elementor_Widget_Init')) {
        Libo_Elementor_Widget_Init::getInstance();
    }
}//end if
