<?php
/**
 * Elementor Widget
 * @package Libo
 * @since 1.0.0
 */

namespace Elementor;
class Libo_Header_Area_Slider_Three_Widget extends Widget_Base
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
        return 'libo-header-slider-three-widget';
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
        return esc_html__('Header Slider: 03', 'libo-master');
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
        return 'eicon-archive-title';
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
                'label' => esc_html__('Section Contents', 'libo-master'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );
        $repeater = new \Elementor\Repeater();
        $repeater->add_control(
            'background_image', [
                'label' => esc_html__('Background Image', 'libo-master'),
                'type' => Controls_Manager::MEDIA,
                'show_label' => false,
                'description' => esc_html__('upload background image', 'libo-master'),
                'default' => [
                    'src' => Utils::get_placeholder_image_src()
                ],
            ]
        );
        $repeater->add_control(
            'title', [
                'label' => esc_html__('Title', 'libo-master'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => esc_html__('Prosfer with a good planning and assets.', 'libo-master'),
                'description' => esc_html__('enter title', 'libo-master')
            ]
        );
        $repeater->add_control(
            'description_status', [
                'label' => esc_html__('Description Show/Hide', 'libo-master'),
                'type' => Controls_Manager::SWITCHER,
                'default' => 'yes',
                'description' => esc_html__('show/hide description', 'libo-master')
            ]
        );
        $repeater->add_control(
            'description', [
                'label' => esc_html__('Description', 'libo-master'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => esc_html__('Finance', 'libo-master'),
                'description' => esc_html__('enter description', 'libo-master'),
                'condition' => ['description_status' => 'yes']
            ]
        );
        $repeater->add_control(
            'btn_status', [
                'label' => esc_html__('Button Show/Hide', 'neateller-master'),
                'type' => Controls_Manager::SWITCHER,
                'default' => 'yes',
                'description' => esc_html__('show/hide button', 'neateller-master')
            ]
        );
        $repeater->add_control(
            'btn_text', [
                'label' => esc_html__('Button Text', 'neateller-master'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Our Services ', 'neateller-master'),
                'description' => esc_html__('enter button text', 'neateller-master'),
                'condition' => ['btn_status' => 'yes']
            ]
        );
        $repeater->add_control(
            'btn_link', [
                'label' => esc_html__('Button URL', 'neateller-master'),
                'type' => Controls_Manager::URL,
                'default' => [
                    'url' => '#'
                ],
                'description' => esc_html__('enter button url', 'neateller-master'),
                'condition' => ['btn_status' => 'yes']
            ]
        );
        $repeater->add_control(
            'btn_status_2', [
                'label' => esc_html__('Button Show/Hide', 'neateller-master'),
                'type' => Controls_Manager::SWITCHER,
                'default' => 'yes',
                'description' => esc_html__('show/hide button', 'neateller-master')
            ]
        );
        $repeater->add_control(
            'btn_text_2', [
                'label' => esc_html__('Button Text', 'neateller-master'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Learn More', 'neateller-master'),
                'description' => esc_html__('enter button text', 'neateller-master'),
                'condition' => ['btn_status_2' => 'yes']
            ]
        );
        $repeater->add_control(
            'btn_link_2', [
                'label' => esc_html__('Button URL', 'neateller-master'),
                'type' => Controls_Manager::URL,
                'default' => [
                    'url' => '#'
                ],
                'description' => esc_html__('enter button url', 'neateller-master'),
                'condition' => ['btn_status_2' => 'yes']
            ]
        );
        $this->add_control('header_sliders', [
            'label' => esc_html__('Header Slider Items', 'libo-master'),
            'type' => Controls_Manager::REPEATER,
            'fields' => $repeater->get_controls(),
            'default' => [
                [
                    'background_image' => array(
                        'url' => Utils::get_placeholder_image_src()
                    ),
                    'description_status' => 'yes',
                    'description' => esc_html__('Finance', 'libo-master'),
                    'title' => esc_html__('Prosfer with a good planning assets.', 'libo-master'),
                ]
            ],

        ]);
        $this->add_control(
            'text_align',
            [
                'label' => esc_html__('Alignment', 'libo-master'),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' => __('Left', 'libo-master'),
                        'icon' => 'fa fa-align-left',
                    ],
                    'center' => [
                        'title' => __('Center', 'libo-master'),
                        'icon' => 'fa fa-align-center',
                    ],
                    'right' => [
                        'title' => __('Right', 'libo-master'),
                        'icon' => 'fa fa-align-right',
                    ],
                ],
                'default' => 'center',
                'toggle' => true,
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'slider_settings_section',
            [
                'label' => esc_html__('Slider Settings', 'libo-master'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'items',
            [
                'label' => esc_html__('Items', 'libo-master'),
                'type' => Controls_Manager::TEXT,
                'description' => esc_html__('you can set how many item show in slider', 'libo-master'),
                'default' => '1'
            ]
        );
        $this->add_control(
            'margin',
            [
                'label' => esc_html__('Margin', 'libo-master'),
                'description' => esc_html__('you can set margin for slider', 'libo-master'),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 100,
                        'step' => 5,
                    ]
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 0,
                ],
                'size_units' => ['px'],
                'condition' => array(
                    'autoplay' => 'yes'
                )
            ]
        );
        $this->add_control(
            'loop',
            [
                'label' => esc_html__('Loop', 'libo-master'),
                'type' => Controls_Manager::SWITCHER,
                'description' => esc_html__('you can set yes/no to enable/disable', 'libo-master'),
                'default' => 'yes'
            ]
        );
        $this->add_control(
            'nav',
            [
                'label' => esc_html__('Nav', 'libo-master'),
                'type' => Controls_Manager::SWITCHER,
                'description' => esc_html__('you can set yes/no to enable/disable', 'libo-master'),
                'default' => 'yes'
            ]
        );
        $this->add_control(
            'autoplay',
            [
                'label' => esc_html__('Autoplay', 'libo-master'),
                'type' => Controls_Manager::SWITCHER,
                'description' => esc_html__('you can set yes/no to enable/disable', 'libo-master'),
                'default' => 'yes'
            ]
        );
        $this->add_control(
            'autoplaytimeout',
            [
                'label' => esc_html__('Autoplay Timeout', 'libo-master'),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 10000,
                        'step' => 2,
                    ]
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 5000,
                ],
                'size_units' => ['px'],
                'condition' => array(
                    'autoplay' => 'yes'
                )
            ]

        );
        $this->end_controls_section();

        $this->start_controls_section(
            'css_styles',
            [
                'label' => esc_html__('Styling Settings', 'libo-master'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control('slider_title_color', [
            'label' => esc_html__('Slider Title Color', 'libo-master'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .header-area .title" => "color: {{VALUE}}"
            ]
        ]);
        $this->add_control('slider_subtitle_color', [
            'label' => esc_html__('Slider Category Color', 'libo-master'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .header-area .header-inner ul li" => "color: {{VALUE}}"
            ]
        ]);
        $this->add_responsive_control('padding', [
            'label' => esc_html__('Padding', 'libo-master'),
            'type' => Controls_Manager::DIMENSIONS,
            'size_units' => ['px', 'em'],
            'allowed_dimensions' => ['top', 'bottom'],
            'selectors' => [
                '{{WRAPPER}} .header-area' => 'padding-top: {{TOP}}{{UNIT}};padding-bottom: {{BOTTOM}}{{UNIT}};'
            ],
            'description' => esc_html__('set padding for header area ', 'libo-master')
        ]);
        $this->add_control('overlay_color', [
            'label' => esc_html__('Overlay Color', 'libo-master'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .header-area.header-bg-02::before' => 'background-color:{{VALUE}};'
            ],
        ]);

        $this->end_controls_section();

        /* button styling */
        $this->start_controls_section( 'header_button_section', [
            'label' => esc_html__( 'Button Settings', 'neateller-master' ),
            'tab'   => Controls_Manager::TAB_STYLE
        ] );

        $this->start_controls_tabs( 'button_styling' );
        $this->start_controls_tab( 'normal_style', [
            'label' => esc_html__( 'Button Normal', "neateller-master" )
        ] );
        $this->add_control( 'button_normal_color', [
            'label'     => esc_html__( 'Button Color', 'neateller-master' ),
            'type'      => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .header-area .btn-wrapper .boxed-btn.reverse-color" => "color: {{VALUE}}"
            ]
        ] );
        $this->add_control( 'divider_01', [
            'type' => Controls_Manager::DIVIDER
        ] );
        $this->add_group_control( Group_Control_Background::get_type(), [
            'name'     => 'button_background',
            'label'    => esc_html__( 'Button Background ', 'neateller-master' ),
            'selector' => "{{WRAPPER}} .header-area .btn-wrapper .boxed-btn.reverse-color"
        ] );
        $this->add_control( 'divider_02', [
            'type' => Controls_Manager::DIVIDER
        ] );
        $this->add_group_control( Group_Control_Border::get_type(), [
            'name'     => 'header_button_border',
            'label'    => esc_html__( 'Border', 'neateller-master' ),
            'selector' => "{{WRAPPER}} .header-area .btn-wrapper .boxed-btn.reverse-color"
        ] );
        $this->add_control(
            'button_border_radius',
            [
                'label' => esc_html__( 'Border Radius', 'neateller-master' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .header-area .btn-wrapper .boxed-btn.reverse-color' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_control( 'divider_060', [
            'type' => Controls_Manager::DIVIDER
        ] );
        $this->add_control( 'button_two_normal_color', [
            'label'     => esc_html__( 'Button Two Color', 'neateller-master' ),
            'type'      => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .header-area .btn-wrapper .boxed-btn.blank" => "color: {{VALUE}}"
            ]
        ] );
        $this->add_group_control( Group_Control_Background::get_type(), [
            'name'     => 'button_two_background',
            'label'    => esc_html__( 'Button Two Background ', 'neateller-master' ),
            'selector' => "{{WRAPPER}} .header-area .btn-wrapper .boxed-btn.blank"
        ] );
        $this->add_control( 'divider_022', [
            'type' => Controls_Manager::DIVIDER
        ] );
        $this->add_group_control( Group_Control_Border::get_type(), [
            'name'     => 'header_two_button_border',
            'label'    => esc_html__( 'Button Two Border', 'neateller-master' ),
            'selector' => "{{WRAPPER}} .header-area .btn-wrapper .boxed-btn.blank"
        ] );
        $this->add_control(
            'button_two_border_radius',
            [
                'label' => esc_html__( 'Border Radius', 'neateller-master' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .header-area .btn-wrapper .boxed-btn.blank' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_tab();

        $this->start_controls_tab( 'hover_style', [
            'label' => esc_html__( 'Button Hover', "neateller-master" )
        ] );
        $this->add_control( 'button_hover_normal_color', [
            'label'     => esc_html__( 'Button Color', 'neateller-master' ),
            'type'      => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .header-area .btn-wrapper .boxed-btn.reverse-color:hover" => "color: {{VALUE}}"
            ]
        ] );
        $this->add_control( 'divider_03', [
            'type' => Controls_Manager::DIVIDER
        ] );
        $this->add_group_control( Group_Control_Background::get_type(), [
            'name'     => 'button_hover_background',
            'label'    => esc_html__( 'Button Background ', 'neateller-master' ),
            'selector' => "{{WRAPPER}} .header-area .btn-wrapper .boxed-btn.reverse-color:hover"
        ] );
        $this->add_control( 'divider_044', [
            'type' => Controls_Manager::DIVIDER
        ] );
        $this->add_group_control( Group_Control_Border::get_type(), [
            'name'     => 'header_hover_button_border',
            'label'    => esc_html__( 'Button Two Border', 'neateller-master' ),
            'selector' => "{{WRAPPER}} .header-area .btn-wrapper .boxed-btn.reverse-color:hover"
        ] );

        $this->add_control( 'button_two_hover_normal_color', [
            'label'     => esc_html__( 'Button Two Color', 'neateller-master' ),
            'type'      => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .header-area .btn-wrapper .boxed-btn.blank:hover" => "color: {{VALUE}}"
            ]
        ] );
        $this->add_control( 'divider_033', [
            'type' => Controls_Manager::DIVIDER
        ] );
        $this->add_group_control( Group_Control_Background::get_type(), [
            'name'     => 'button_hover_two_background',
            'label'    => esc_html__( 'Button Two Background ', 'neateller-master' ),
            'selector' => "{{WRAPPER}} .header-area .btn-wrapper .boxed-btn.blank:hover"
        ] );
        $this->add_control( 'divider_04', [
            'type' => Controls_Manager::DIVIDER
        ] );
        $this->add_group_control( Group_Control_Border::get_type(), [
            'name'     => 'header_hover_two_button_border',
            'label'    => esc_html__( 'Button Two Border', 'neateller-master' ),
            'selector' => "{{WRAPPER}} .header-area .btn-wrapper .boxed-btn.blank:hover"
        ] );
        $this->end_controls_tab();
        $this->end_controls_tabs();
        $this->end_controls_section();
        /* button styling end */

        /* typography settings start */
        $this->start_controls_section('typography_settings', [
            'label' => esc_html__('Typography Settings', 'libo-master'),
            'tab' => Controls_Manager::TAB_STYLE
        ]);
        $this->add_group_control(Group_Control_Typography::get_type(), [
            'name' => 'title_typography',
            'label' => esc_html__('Title Typography', 'libo-master'),
            'selector' => "{{WRAPPER}} .header-area .title"
        ]);
        $this->add_group_control(Group_Control_Typography::get_type(), [
            'name' => 'subtitle_typography',
            'label' => esc_html__('Sub Title Typography', 'libo-master'),
            'selector' => "{{WRAPPER}} .header-area .header-inner p"
        ]);
        $this->add_group_control(Group_Control_Typography::get_type(), [
            'name' => 'info_button_typography',
            'label' => esc_html__('Info Text Typography', 'libo-master'),
            'selector' => "{{WRAPPER}} .header-area .header-buttom-content p"
        ]);
        $this->add_group_control(Group_Control_Typography::get_type(), [
            'name' => 'info_number_button_typography',
            'label' => esc_html__('Info number Typography', 'libo-master'),
            'selector' => "{{WRAPPER}} .header-area .header-buttom-content span"
        ]);
        $this->end_controls_section();
        /* typography settings end */

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
        $all_header_items = $settings['header_sliders'];
        $rand_numb = rand(333, 999999999);

        //slider settings
        $slider_settings = [
            "loop" => esc_attr($settings['loop']),
            "margin" => esc_attr($settings['margin']['size'] ?? 0),
            "items" => esc_attr($settings['items'] ?? 1),
            "autoplay" => esc_attr($settings['autoplay']),
            "autoplaytimeout" => esc_attr($settings['autoplaytimeout']['size'] ?? 0),
        ];
        ?>
        <div class="header-carousel-wrapper libo-rtl-slider">
            <div class="main-slider header-slider-one"
                 id="header-one-carousel-<?php echo esc_attr($rand_numb); ?>"
                 data-settings='<?php echo json_encode( $slider_settings)?>'
            >
                <?php
                foreach ($all_header_items as $item):
                    $img_url = wp_get_attachment_image_src($item['background_image']['id'], 'full');
                    $user_text_value = esc_html($item['description']);
                    $user_text_value = explode("\n", $user_text_value);
                    ?>
                    <div class="header-area style-03 header-bg-02"
                         style="background-image: url(<?php echo esc_url($img_url[0]) ?>)">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-lg-8">
                                    <div class="header-inner" style="text-align:<?php echo $settings['text_align']; ?>">
                                        <div>
                                            <?php if ($item['description_status'] == 'yes'): ?>
                                                <ul>
                                                    <?php
                                                    foreach ($user_text_value as $value) : ?>
                                                       <li><?php  echo $value;?></li>
                                                    <?php endforeach;?>
                                                </ul>
                                            <?php endif; ?>
                                        </div>
                                        <h2 class="title"><?php echo esc_html($item['title']) ?></h2>
                                        <div class="btn-wrapper">
                                            <?php if ($item['btn_status'] == 'yes'): ?>
                                                <a href="<?php echo esc_url($item['btn_link']['url']) ?>"
                                                   class="boxed-btn reverse-color"><?php echo esc_html($item['btn_text']) ?><i class="fas fa-plus"></i></a>
                                            <?php endif; ?>
                                            <?php if ($item['btn_status_2'] == 'yes'): ?>
                                                <a href="<?php echo esc_url($item['btn_link_2']['url']) ?>"
                                                   class="boxed-btn blank"><?php echo esc_html($item['btn_text_2']) ?><i class="fas fa-plus"></i></a>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
        <?php
    }
};

Plugin::instance()->widgets_manager->register_widget_type(new Libo_Header_Area_Slider_Three_Widget());