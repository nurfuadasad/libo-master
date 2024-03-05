<?php
/**
 * Elementor Widget
 * @package Libo
 * @since 1.0.0
 */

namespace Elementor;
class Libo_Business_Single_Item_Widget extends Widget_Base
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
        return 'libo-business-single-item-three-widget';
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
        return esc_html__('Business Single Item', 'libo-master');
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
        return 'eicon-pojome';
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
        $this->add_control(
            'title',
            [
                'label' => esc_html__('Title', 'libo-master'),
                'type' => Controls_Manager::TEXTAREA,
                'label_block' => true,
                'description' => esc_html__('enter title.', 'libo-master'),
                'default' => esc_html__('Get a free trail option', 'libo-master')
            ]
        );
        $this->add_control(
            'description',
            [
                'label' => esc_html__('Description', 'libo-master'),
                'type' => Controls_Manager::TEXTAREA,
                'label_block' => true,
                'description' => esc_html__('enter description.', 'libo-master'),
                'default' => esc_html__("Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua nim ad minim veniam.", 'libo-master')
            ]
        );
        $this->add_control('btn_text', [
            'label' => esc_html__('Button Text', 'libo-master'),
            'type' => Controls_Manager::TEXT,
            'default' => esc_html__('Read More', 'libo-master'),
            'description' => esc_html__('enter button text', 'libo-master')
        ]);
        $this->add_control('btn_link', [
            'label' => esc_html__('Button Link', 'libo-master'),
            'type' => Controls_Manager::URL,
            'default' => array(
                'url' => '#'
            ),
            'description' => esc_html__('enter button link', 'libo-master')
        ]);

        $this->add_control(
            'icon',
            [
                'label' => esc_html__('Icon', 'libo-master'),
                'type' => Controls_Manager::ICONS,
                'description' => esc_html__('select Icon.', 'libo-master'),
                'default' => [
                    'value' => 'flaticon-statistics',
                    'library' => 'solid',
                ]
            ]
        );
        $this->add_control(
            'link',
            [
                'label' => esc_html__('Link', 'libo-master'),
                'type' => Controls_Manager::URL,
                'description' => esc_html__('enter link', 'libo-master'),
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'icon_styling_section',
            [
                'label' => esc_html__('Icon Styling', 'libo-master'),
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
                "{{WRAPPER}} .business-single-item .icon" => "color: {{VALUE}}"
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
                "{{WRAPPER}} .business-single-item:hover .icon" => "color: {{VALUE}}"
            ]
        ]);

        $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->end_controls_section();

        $this->start_controls_section(
            'content_styling_section',
            [
                'label' => esc_html__('Content Styling', 'libo-master'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->start_controls_tabs(
            'style_tabs'
        );

        $this->start_controls_tab(
            'style_normal_tab',
            [
                'label' => esc_html__('Normal', 'libo-master'),
            ]
        );
        $this->add_control('normal_background_color', [
            'label' => esc_html__('Background Color', 'libo-master'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .business-single-item" => "background-color: {{VALUE}};"
            ]
        ]);
        $this->add_control('normal_title_color', [
            'label' => esc_html__('Title Color', 'libo-master'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .business-single-item .content .title" => "color: {{VALUE}};"
            ]
        ]);
        $this->add_control('normal_description_color', [
            'label' => esc_html__('Description Color', 'libo-master'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .business-single-item .content p" => "color: {{VALUE}};"
            ]
        ]);;
        $this->add_control('button_color', [
            'label' => esc_html__('Button Color', 'libo-master'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .btn-wrapper .read-btn" => "color: {{VALUE}};"
            ]
        ]);

        $this->end_controls_tab();

        $this->start_controls_tab(
            'style_hover_tab',
            [
                'label' => esc_html__('Hover', 'libo-master'),
            ]
        );
        $this->add_control('hover_title_color', [
            'label' => esc_html__('Title Color', 'libo-master'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .business-single-item:hover .content .title" => "color: {{VALUE}};"
            ]
        ]);
        $this->add_control('hover_description_color', [
            'label' => esc_html__('Description Color', 'libo-master'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .business-single-item:hover .content p" => "color: {{VALUE}};"
            ]
        ]);
        $this->add_control('button_hover_color', [
            'label' => esc_html__('Button Hover Color', 'libo-master'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .btn-wrapper .read-btn:hover" => "color: {{VALUE}};"
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
            'name' => 'title_typography',
            'label' => esc_html__('Title Typography', 'libo-master'),
            'selector' => "{{WRAPPER}} .business-single-item .content .title"
        ]);
        $this->add_group_control(Group_Control_Typography::get_type(), [
            'name' => 'button_typography',
            'label' => esc_html__('Button Typography', 'libo-master'),
            'selector' => "{{WRAPPER}} .btn-wrapper .read-btn"
        ]);
        $this->add_group_control(Group_Control_Typography::get_type(), [
            'name' => 'description_typography',
            'label' => esc_html__('Description Typography', 'libo-master'),
            'selector' => "{{WRAPPER}} .business-single-item .content p"
        ]);

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
        ?>
        <div class="business-single-item">
            <div class="content">
                <div class="btn-wrapper">
                    <a href="<?php echo esc_url($settings['btn_link']['url']); ?>"
                       class="read-btn"><?php echo esc_html($settings['btn_text']); ?><i class="fas fa-plus"></i></a>
                </div>
                <a <?php echo $this->get_render_attribute_string('image_box_link'); ?>><h4
                            class="title"><?php echo esc_html($settings['title']) ?></h4>
                </a>
                <p><?php echo esc_html($settings['description']) ?></p>
            </div>
            <div class="icon">
                <?php
                Icons_Manager::render_icon($settings['icon'], ['aria-hidden' => 'true']);
                ?>
            </div>
        </div>
        <?php
    }
}

Plugin::instance()->widgets_manager->register_widget_type(new Libo_Business_Single_Item_Widget());