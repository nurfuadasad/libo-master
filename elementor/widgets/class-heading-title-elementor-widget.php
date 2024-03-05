<?php
/**
 * Elementor Widget
 * @package Libo
 * @since 1.0.0
 */

namespace Elementor;
class Libo_Heading_Title_One_Widget extends Widget_Base
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
        return 'libo-heading-title-one-widget';
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
        return esc_html__('Heading Title: 01', 'libo-master');
    }

    public function get_keywords()
    {
        return ['Heading', 'Title', 'H1', "Ir Tech", 'Libo'];
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
        return 'eicon-heading';
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
            'settings_heading',
            [
                'label' => esc_html__('General Settings', 'libo-master'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control('theme', [
            'label' => esc_html__('Theme', 'libo-master'),
            'description' => esc_html__('select theme', 'libo-master'),
            'type' => Controls_Manager::SELECT,
            'options' => [
                'black' => esc_html__('Black', 'libo-master'),
                'white' => esc_html__('White', 'libo-master'),
            ],
            'default' => 'black'
        ]);
        $this->add_control('sub_status',
            [
                'label' => esc_html__('Subtitle Show/Hide', 'libo-master'),
                'type' => Controls_Manager::SWITCHER,
                'description' => esc_html__('show/hide Subtitle', 'libo-master'),
                'default' => 'yes',
            ]);
        $this->add_control(
            'subtitle',
            [
                'label' => esc_html__('About Us', 'libo-master'),
                'type' => Controls_Manager::TEXTAREA,
                'description' => esc_html__('enter  title.', 'libo-master'),
                'default' => esc_html__('About Us', 'libo-master'),
            ]
        );
        $this->add_control(
            'title',
            [
                'label' => esc_html__('Title', 'libo-master'),
                'type' => Controls_Manager::TEXTAREA,
                'description' => esc_html__('enter  title.', 'libo-master'),
                'default' => esc_html__('Core level values and amazing team', 'libo-master')
            ]
        );

        $this->add_control(
            'alignment',
            [
                'label' => esc_html__('Alignment', 'libo-master'),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' => esc_html__('Left', 'libo-master'),
                        'icon' => 'fa fa-align-left',
                    ],
                    'center' => [
                        'title' => esc_html__('Center', 'libo-master'),
                        'icon' => 'fa fa-align-center',
                    ],
                    'right' => [
                        'title' => esc_html__('Right', 'libo-master'),
                        'icon' => 'fa fa-align-right',
                    ],
                ],
                'default' => 'center',
                'toggle' => true,
                'selectors' => [
                    "{{WRAPPER}} .section-title" => "text-align: {{VALUE}}"
                ]
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'styling_heading',
            [
                'label' => esc_html__('Styling Settings', 'libo-master'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'line_bottom_space',
            [
                'label' => esc_html__('Line Right Space', 'libo-master'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px', '%'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 100,
                        'step' => 1,
                    ],
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .section-title .title span' => 'margin-right: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'line_width',
            [
                'label' => esc_html__('Line width', 'libo-master'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px', '%'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 100,
                        'step' => 1,
                    ],
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .section-title .title span' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_control(
            'line_top_space',
            [
                'label' => esc_html__('Line Top Space', 'libo-master'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px', '%'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 100,
                        'step' => 1,
                    ],
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .section-title .title span' => 'top: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_control('title_color', [
            'label' => esc_html__('Title Color', 'libo-master'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .section-title .title" => "color: {{VALUE}}"
            ]
        ]);
        $this->add_control('title_styling_divider', [
            'type' => Controls_Manager::DIVIDER
        ]);
        $this->add_control('subtitle_color', [
            'label' => esc_html__('Sub Title Color', 'libo-master'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .section-title .subtitle" => "color: {{VALUE}}"
            ]
        ]);

        $this->add_control('forword_color', [
            'label' => esc_html__('Forword Icon Color', 'libo-master'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .section-title .subtitle .line" => "color: {{VALUE}}",
                "{{WRAPPER}} .section-title .subtitle .line-two" => "color: {{VALUE}}"
            ]
        ]);
        $this->end_controls_section();
        $this->start_controls_section(
            'styling_typogrpahy_heading',
            [
                'label' => esc_html__('Typography Settings', 'libo-master'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_group_control(Group_Control_Typography::get_type(), [
            'name' => 'title_typography',
            'label' => esc_html__('Title Typography', 'libo-master'),
            'selector' => "{{WRAPPER}} .section-title .title"
        ]);
        $this->add_group_control(Group_Control_Typography::get_type(), [
            'name' => 'subtitle_typography',
            'label' => esc_html__('Subtitle Typography', 'libo-master'),
            'selector' => "{{WRAPPER}} .section-title .subtitle"
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
        <div class="section-title <?php echo esc_attr($settings['theme']); ?>">
            <?php
            if (!empty($settings['sub_status'])) : ?>
                <p class="subtitle">
                    <span class="line">\\</span>
                    <?php echo esc_html__($settings['subtitle']) ?>
                    <span class="line-two">\\</span>
                </p>
            <?php endif; ?>
            <h3 class="title"><?php echo esc_html__($settings['title']) ?><span>.</span></h3>
        </div>
        <?php
    }
}

Plugin::instance()->widgets_manager->register_widget_type(new Libo_Heading_Title_One_Widget());