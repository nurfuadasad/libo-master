<?php
/**
 * Elementor Widget
 * @package libo
 * @since 1.0.0
 */

namespace Elementor;
class libo_Header_Area_One_Widget extends Widget_Base
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
        return 'libo-header-slider-one-widget';
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
        return esc_html__('Header Slider: 01', 'libo-master');
    }

    public function get_keywords()
    {
        return ['Slider', 'Banner', 'Showcase', "Ir Tech", 'libo'];
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
            'nav_status', [
                'label' => esc_html__('Navegation Show/Hide', 'libo-master'),
                'type' => Controls_Manager::SWITCHER,
                'default' => 'yes',
                'description' => esc_html__('show/hide Navegation', 'libo-master')
            ]
        );
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
            'link',
            [
                'label' => esc_html__('Link', 'libo-master'),
                'type' => Controls_Manager::URL,
                'description' => esc_html__('enter url.', 'libo-master'),
                'default' => [
                    'url' => '#'
                ]
            ]
        );
        $repeater->add_control(
            'icon',
            [
                'label' => esc_html__('Icon', 'libo-master'),
                'type' => Controls_Manager::ICONS,
                'description' => esc_html__('select Icon.', 'libo-master'),
                'default' => [
                    'value' => 'fas fa-play',
                    'library' => 'solid',
                ]
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
                'default' => esc_html__('We seamlessly merge two key components – economics & informatio', 'libo-master'),
                'description' => esc_html__('enter description', 'libo-master'),
                'condition' => ['description_status' => 'yes']
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
                    'description' => esc_html__('We seamlessly merge two key components – economics & informatio', 'libo-master'),
                    'title' => esc_html__('Prosfer with a good planning and assets.', 'libo-master'),
                ]
            ],

        ]);
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
        $this->add_control('description_color', [
            'label' => esc_html__('Description Title Color', 'libo-master'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .header-area .header-inner p" => "color: {{VALUE}}"
            ]
        ]);
        $this->add_control('icon_color', [
            'label' => esc_html__('Icon Color', 'libo-master'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .header-area .video-play-btn" => "color: {{VALUE}}"
            ]
        ]);
        $this->add_control('icon_bg_color', [
            'label' => esc_html__('Icon Background Color', 'libo-master'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .header-area .video-play-btn" => "background-color: {{VALUE}}"
            ]
        ]);

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'border',
                'label' => __( 'Border', 'libo-master' ),
                'selector' => '{{WRAPPER}} .video-play-btn:before',
            ]
        );
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
                '{{WRAPPER}} .header-area.header-bg::before' => 'background-color:{{VALUE}};'
            ],
        ]);

        $this->end_controls_section();


        /*  slider nav styling tabs start */
        $this->start_controls_section(
            'nav_settings_section',
            [
                'label' => esc_html__('Nav Settings', 'libo-master'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->start_controls_tabs(
            'nav_style_tabs'
        );

        $this->start_controls_tab(
            'nav_style_normal_tab',
            [
                'label' => __('Active Style', 'libo-master'),
            ]
        );

        $this->add_control('nav_color', [
            'type' => Controls_Manager::COLOR,
            'label' => esc_html__('Title Color', 'libo-master'),
            'selectors' => [
                "{{WRAPPER}} .header-carousel-wrapper .main-slider-nav .slide-item.slick-current .title" => "color: {{VALUE}}",
            ]
        ]);
        $this->add_control('nav_paragraph_color', [
            'type' => Controls_Manager::COLOR,
            'label' => esc_html__('Paragraph Color', 'libo-master'),
            'selectors' => [
                "{{WRAPPER}} .header-carousel-wrapper .main-slider-nav .slide-item.slick-current p" => "color: {{VALUE}}",
            ]
        ]);
        $this->add_control('nav_bg_color', [
            'type' => Controls_Manager::COLOR,
            'label' => esc_html__('Background Color', 'libo-master'),
            'selectors' => [
                "{{WRAPPER}} .header-carousel-wrapper .main-slider-nav .slide-item.slick-current" => "background-color: {{VALUE}}",
            ]
        ]);
        $this->add_control('nav_border_background', [
            'type' => Controls_Manager::COLOR,
            'label' => esc_html__('Border Top Color', 'libo-master'),
            'selectors' => [
                "{{WRAPPER}} .header-carousel-wrapper .main-slider-nav .slide-item.slick-current" => "border-color: {{VALUE}}",
            ]
        ]);

        $this->end_controls_tab();

        $this->start_controls_tab(
            'nav_style_hover_tab',
            [
                'label' => esc_html__('Normal', 'libo-master'),
            ]
        );

        $this->add_control('nav_hover_color', [
            'type' => Controls_Manager::COLOR,
            'label' => esc_html__('Title Color', 'libo-master'),
            'selectors' => [
                "{{WRAPPER}} .header-carousel-wrapper .main-slider-nav .slide-item .title" => "color: {{VALUE}}",
            ]
        ]);
        $this->add_control('nav_hover_paragraph_color', [
            'type' => Controls_Manager::COLOR,
            'label' => esc_html__('Paragraph Color', 'libo-master'),
            'selectors' => [
                "{{WRAPPER}} .header-carousel-wrapper .main-slider-nav .slide-item p" => "color: {{VALUE}}",
            ]
        ]);
        $this->add_control('nav_hover_bg_color', [
            'type' => Controls_Manager::COLOR,
            'label' => esc_html__('Background Color', 'libo-master'),
            'selectors' => [
                "{{WRAPPER}} .header-carousel-wrapper .main-slider-nav .slide-item" => "background-color: {{VALUE}}",
            ]
        ]);


        $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->end_controls_section();
        /*  slider nav styling tabs end */

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
            'name' => 'paragraph_typography',
            'label' => esc_html__('Paragraph Typography', 'libo-master'),
            'selector' => "{{WRAPPER}} .header-area p"
        ]);
        $this->add_group_control(Group_Control_Typography::get_type(), [
            'name' => 'nav_title_typography',
            'label' => esc_html__('Nav Title Typography', 'libo-master'),
            'selector' => "{{WRAPPER}} .header-carousel-wrapper .main-slider-nav .slide-item .title"
        ]);
        $this->add_group_control(Group_Control_Typography::get_type(), [
            'name' => 'nav_paragraph_typography',
            'label' => esc_html__('Nav Paragraph Typography', 'libo-master'),
            'selector' => "{{WRAPPER}} .header-carousel-wrapper .main-slider-nav .slide-item p"
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

        $slider_settings = [
            "loop" => esc_attr($settings['loop']),
            "margin" => esc_attr($settings['margin']['size'] ?? 0),
            "items" => esc_attr($settings['items'] ?? 1),
            "autoplay" => esc_attr($settings['autoplay']),
            "autoplaytimeout" => esc_attr($settings['autoplaytimeout']['size'] ?? 0),
        ]
        ?>
        <div class="header-carousel-wrapper libo-rtl-slider">
            <div class="main-slider header-slider-one"
                 id="header-one-carousel-<?php echo esc_attr($rand_numb); ?>"
                 data-settings='<?php echo json_encode($slider_settings) ?>'
            >
                <?php
                foreach ($all_header_items as $item):
                    $image_id = $item['background_image']['id'];
                    $image_url = !empty($image_id) ? wp_get_attachment_image_src($image_id, 'full', false)[0] : '';
                    ?>
                    <div class="header-area header-bg <?php echo $item['nav_status'] == 'yes' ? 'has-nav' : '' ?>" style="background-image: url(<?php echo esc_url($image_url) ?>)">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-7">
                                    <div class="header-inner">
                                        <div class="hover">
                                            <a <?php echo libo_master()->render_elementor_link_attributes($item['link'])?> class="video-play-btn mfp-iframe">
                                                <?php Icons_Manager::render_icon($item['icon'], ['aria-hidden' => 'true']); ?>
                                            </a>
                                        </div>
                                        <h2 class="title"><?php echo esc_html($item['title']) ?></h2>
                                        <?php if ($item['description_status'] == 'yes'): ?>
                                            <div class="description padding-padding-20">
                                                <p><?php echo esc_html($item['description']) ?></p>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
            <?php if ($item['nav_status'] == 'yes'): ?>
            <div class="main-slider-nav-wrap">
                <div class="main-slider-nav" id="header-navfor-carousel-<?php echo esc_attr($rand_numb); ?>"
                     data-settings='<?php echo json_encode($slider_settings) ?>'
                >
                    <?php
                    foreach ($all_header_items as $nav_item) : ?>
                        <div class="slide-item">
                            <h2 class="title"><?php echo esc_html($nav_item['title']) ?></h2>
                            <?php if ($nav_item['description_status'] == 'yes'): ?>
                                <div class="description padding-padding-20">
                                    <p><?php echo esc_html($nav_item['description']) ?></p>
                                </div>
                            <?php endif; ?>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
              <?php endif; ?>
        </div>
        <?php
    }
}

Plugin::instance()->widgets_manager->register_widget_type(new libo_Header_Area_One_Widget());