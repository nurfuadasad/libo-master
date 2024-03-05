<?php
/**
 * Elementor Widget
 * @package Appside
 * @since 1.0.0
 */

namespace Elementor;
class Libo_About_Single_One_Widget extends Widget_Base
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
        return 'libo-about-single-one-widget';
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
        return esc_html__('About: Item 01', 'libo-master');
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
        return 'eicon-post-slider';
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
            'settings_section',
            [
                'label' => esc_html__('General Settings', 'libo-master'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $repeater = new Repeater();

        $repeater->add_control('title', [
            'label' => esc_html__('Title', 'libo-master'),
            'type' => Controls_Manager::TEXTAREA,
            'default' => esc_html__('Learn About Us', 'libo-master')
        ]);
        $repeater->add_control('description', [
            'label' => esc_html__('Description', 'libo-master'),
            'type' => Controls_Manager::TEXTAREA,
            'default' => esc_html__('Move with a great team, its better', 'libo-master')
        ]);
        $repeater->add_control(
            'image_box_background_image',
            [
                'label' => esc_html__('Background Image', 'libo-master'),
                'type' => Controls_Manager::MEDIA,
                'description' => esc_html__('select Image.', 'libo-master'),
            ]
        );
        $repeater->add_control(
            'icon',
            [
                'label'       => esc_html__( 'Icon', 'libo-master' ),
                'type'        => Controls_Manager::ICONS,
                'description' => esc_html__( 'select Icon.', 'libo-master' ),
                'default' => [
                    'value' => 'flaticon-receipt',
                    'library' => 'solid',
                ],
            ]
        );
        $repeater->add_control(
            'link',
            [
                'label' => esc_html__('Link', 'libo-master'),
                'type' => Controls_Manager::URL,
                'description' => esc_html__('enter link', 'libo-master'),
            ]
        );
        $this->add_control(
            'about-study-list',
            [
                'label' => esc_html__('Case Study List', 'libo-master'),
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'image_box_background_image' => array(
                            'url' => Utils::get_placeholder_image_src()
                        ),
                        'description' => esc_html__('Move with a great team, its better', 'libo-master'),
                        'title' => esc_html__('Learn About Us', 'libo-master')
                    ]
                ],
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'styling_settings_section',
            [
                'label' => esc_html__('Styling Settings', 'libo-master'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->start_controls_tabs(
            'title_style_tabs'
        );

        $this->start_controls_tab(
            'title_style_normal_tab',
            [
                'label' => esc_html__('Normal', 'libo-master'),
            ]
        );
        $this->add_control('icon_color', [
            'label' => esc_html__('Icon Color', 'libo-master'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .service-single-item .icon" => "color: {{VALUE}}"
            ]
        ]);
        $this->add_control('content_bg_color', [
            'label' => esc_html__('Background Color', 'libo-master'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .service-single-item .content-wrap" => "background-color: {{VALUE}}"
            ]
        ]);
        $this->add_control('title_color', [
            'label' => esc_html__('Title Color', 'libo-master'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .service-single-item .content .title" => "color: {{VALUE}}"
            ]
        ]);
        $this->add_control('paragraph_typography', [
            'label' => esc_html__('Paragraph Color', 'libo-master'),
            'description' => esc_html__('select Paragraph Color', 'libo-master'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .service-single-item .content p" => "color: {{VALUE}}"
            ]
        ]);

        $this->end_controls_tab();

        $this->start_controls_tab(
            'title_style_hover_tab',
            [
                'label' => esc_html__('Hover', 'libo-master'),
            ]
        );

        $this->add_control('icon_hover_color', [
            'label' => esc_html__('Icon Hover Color', 'libo-master'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .service-single-item:hover .icon" => "color: {{VALUE}}"
            ]
        ]);
        $this->add_control('content_hover_bg_color', [
            'label' => esc_html__('Background Color', 'libo-master'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .service-single-item .content-wrap:hover" => "background-color: {{VALUE}}"
            ]
        ]);
        $this->add_control('title_hover_color', [
            'label' => esc_html__('Title Hover Color', 'libo-master'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .service-single-item:hover .content .title" => "color: {{VALUE}}"
            ]
        ]);
        $this->add_control('paragraph_hover_typography', [
            'label' => esc_html__('Paragraph Hover Color', 'libo-master'),
            'description' => esc_html__('select Paragraph Color', 'libo-master'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .service-single-item:hover .content p" => "color: {{VALUE}}"
            ]
        ]);

        $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->end_controls_section();


        $this->start_controls_section(
            'typography_settings_section',
            [
                'label' => esc_html__('Typography Settings', 'libo-master'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_group_control(Group_Control_Typography::get_type(), [
            'label' => esc_html__('Title Typography', 'libo-master'),
            'name' => 'title_typography',
            'description' => esc_html__('select title typography', 'libo-master'),
            'selector' => "{{WRAPPER}} .service-single-item .content .title"
        ]);
        $this->add_group_control(Group_Control_Typography::get_type(), [
            'label' => esc_html__('Paragraph Typography', 'libo-master'),
            'name' => 'paragraph_typography',
            'description' => esc_html__('select Paragraph typography', 'libo-master'),
            'selector' => "{{WRAPPER}} .service-single-item .content p"
        ]);
        $this->end_controls_section();

    }

    /**
     * Render Elementor widget output on the frontend.
     * Written in PHP and used to generate the final HTML.
     *
     * @since 1.0.0
     * @access protected
     */
    protected function render()
    {
        $settings = $this->get_settings_for_display();

        ?>
        <div class="about-single-one-wrapper">
            <?php
            $aboutItems = $settings['about-study-list'];
            foreach ($aboutItems as $item) :
                $background_image_id = $item['image_box_background_image']['id'];
                $background_image_url = !empty($background_image_id) ? wp_get_attachment_image_src($background_image_id, 'libo_full')[0] : '';
            	$image_alt = !empty($image_id) ? get_post_meta($image_id,'_wp_attachment_image_alt',true) : '';
                ?>
                <div class="service-single-item margin-bottom-30">
                    <div class="thumb">
                        <img src="<?php echo esc_url($background_image_url) ?>" alt="<?php echo esc_attr($image_alt) ?>">
                    </div>
                    <div class="content-wrap">
                        <div class="icon">
                            <?php
                            Icons_Manager::render_icon($item['icon'], ['aria-hidden' => 'true'])
                            ?>
                        </div>
                        <div class="content">
                            <h5 class="title">
                                <a <?php print libo_master()->render_elementor_link_attributes($item['link'], ''); ?>><?php echo esc_html($item['title']) ?></a>
                            </h5>
                            <p><?php echo esc_html($item['description']); ?></p>
                        </div>
                    </div>
                </div>
            <?php
            endforeach;
            ?>
        </div>
        <?php
    }
}

Plugin::instance()->widgets_manager->register_widget_type(new Libo_About_Single_One_Widget());