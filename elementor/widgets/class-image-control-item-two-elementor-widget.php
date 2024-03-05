<?php

/**
 * Elementor Widget
 * @package Libo
 * @since 1.0.0
 */


namespace Elementor;

class Image_Control_Item_Two extends Widget_Base

{


    /**
     * Get widget name.
     *
     * Retrieve Elementor widget name.
     *
     * @return string Widget name.
     * @since 1.0.0
     * @access public
     *

     */

    public function get_name()

    {

        return 'libo-image-control-item-two-widget';

    }


    /**
     * Get widget title.
     *
     * Retrieve Elementor widget title.
     *
     * @return string Widget title.
     * @since 1.0.0
     * @access public
     *

     */

    public function get_title()

    {

        return esc_html__('Image Control Item 02', 'libo-master');

    }


    public function get_keywords()

    {

        return ['Animation', 'Circle', 'Effect', "Ir Tech", 'Libo'];

    }


    /**
     * Get widget icon.
     *
     * Retrieve Elementor widget icon.
     *
     * @return string Widget icon.
     * @since 1.0.0
     * @access public
     *

     */

    public function get_icon()

    {

        return 'eicon-circle-o';

    }


    /**
     * Get widget categories.
     *
     * Retrieve the list of categories the Elementor widget belongs to.
     *
     * @return array Widget categories.
     * @since 1.0.0
     * @access public
     *

     */

    public function get_categories()

    {

        return ['libo_widgets'];

    }


    /**
     * Register Elementor widget controls.
     *
     * Adds different input fields to allow the user to change and customize the widget settings.
     *
     * @since 1.0.0
     * @access protected
     */

    protected function _register_controls()

    {


        $this->start_controls_section(

            'video_settings_section',

            [

                'label' => esc_html__('General Settings', 'libo-master'),

                'tab' => Controls_Manager::TAB_CONTENT,

            ]

        );
        $this->add_control(
            'image', [
                'label' => esc_html__('Shape One', 'libo-master'),
                'type' => Controls_Manager::MEDIA,
                'show_label' => false,
                'description' => esc_html__('upload background image', 'libo-master'),
                'default' => [
                    'src' => Utils::get_placeholder_image_src()
                ],
            ]
        );
        $this->add_control(
            'image_02', [
                'label' => esc_html__('Shape Two', 'libo-master'),
                'type' => Controls_Manager::MEDIA,
                'show_label' => false,
                'description' => esc_html__('upload background image', 'libo-master'),
                'default' => [
                    'src' => Utils::get_placeholder_image_src()
                ],
            ]
        );
        $this->add_control(
            'logo', [
                'label' => esc_html__('Logo', 'libo-master'),
                'type' => Controls_Manager::MEDIA,
                'show_label' => false,
                'description' => esc_html__('upload background image', 'libo-master'),
                'default' => [
                    'src' => Utils::get_placeholder_image_src()
                ],
            ]
        );
        $this->add_control(
            'title',
            [
                'label' => esc_html__('Title', 'libo-master'),
                'type' => Controls_Manager::TEXTAREA,
                'label_block' => true,
                'description' => esc_html__('enter title.', 'libo-master'),
                'default' => esc_html__('Libo', 'libo-master')
            ]
        );
        $this->add_control(
            'description', [
                'label' => esc_html__('Description', 'libo-master'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => esc_html__('Finance Website', 'libo-master'),
                'description' => esc_html__('enter description', 'libo-master'),
            ]
        );
        $this->add_control(
            'btn-title',
            [
                'label' => esc_html__('Button Text', 'libo-master'),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'description' => esc_html__('enter button text', 'libo-master'),
                'default' => esc_html__('Get Appointment ', 'libo-master')
            ]
        );

        $this->add_control(

            'link',

            [

                'label' => esc_html__('Link', 'libo-master'),

                'type' => Controls_Manager::URL,

                'description' => esc_html__('enter url.', 'libo-master'),

                'default' => [

                    'url' => ''

                ]

            ]

        );
        $this->end_controls_section();


    }


    /**
     * Render Elementor widget output on the frontend.
     *
     * Written in PHP and used to generate the final HTML.
     *
     * @since 1.0.0
     * @access protected
     */

    protected function render()

    {

        $settings = $this->get_settings_for_display();
        $image_id = $settings['image']['id'];
        $image_url = !empty($image_id) ? wp_get_attachment_image_src($image_id, 'full', false)[0] : '';

        $image_id_02 = $settings['image_02']['id'];
        $image_url_02 = !empty($image_id) ? wp_get_attachment_image_src($image_id_02, 'full', false)[0] : '';

        $logo = $settings['logo']['id'];
        $logo_url = !empty($logo) ? wp_get_attachment_image_src($logo, 'full', false)[0] : '';
        $logo_alt = !empty($logo) ? get_post_meta($logo, '_wp_attachment_image_alt', true) : '';

        ?>

        <div class="image-control-area-two">
            <div class="bg-img" style="background-image: url(<?php echo esc_url($image_url) ?>)"></div>
            <div class="bg-img style-01" style="background-image: url(<?php echo esc_url($image_url_02) ?>"></div>
            <div class="content">
                <div class="logo">
                    <img src="<?php echo esc_url($logo_url) ?>" alt="<?php echo esc_url($logo_alt) ?>">
                </div>
                <h3 class="title"><?php echo esc_html($settings['title']) ?></h3>
                <p><?php echo esc_html($settings['description']) ?></p>
                <div class="btn-wrapper">
                    <a <?php echo libo_master()->render_elementor_link_attributes($settings['link']) ?>
                            class="boxed-btn">
                        <?php echo esc_html($settings['btn-title']) ?>
                    </a>
                </div>
            </div>
        </div>

        <?php

    }

}


Plugin::instance()->widgets_manager->register_widget_type(new Image_Control_Item_Two());