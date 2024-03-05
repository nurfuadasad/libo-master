<?php
/**
 * Elementor Widget
 * @package Libo
 * @since 1.0.0
 */

namespace Elementor;
class Libo_Single_Case_Study_Widget extends Widget_Base
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
        return 'libo-single-case-study-widget';
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
        return esc_html__('Case Study Item : 01', 'libo-master');
    }

    public function get_keywords()
    {
        return ['ir-tech', 'libo', 'image box'];
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
        return 'eicon-image';
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
            'default' => esc_html__('Miranda computer home finance solution', 'libo-master')
        ]);
        $repeater->add_control('description', [
            'label' => esc_html__('Description', 'libo-master'),
            'type' => Controls_Manager::TEXTAREA,
            'default' => esc_html__('Finance', 'libo-master')
        ]);
        $repeater->add_control(
            'image_box_background_image',
            [
                'label' => esc_html__('Background Image', 'libo-master'),
                'type' => Controls_Manager::MEDIA,
                'description' => esc_html__('select Image.', 'libo-master'),
            ]
        );
        $this->add_control('read-btn', [
            'label' => esc_html__('Read More', 'libo-master'),
            'type' => Controls_Manager::TEXT,
            'description' => esc_html__('enter read button text', 'libo-master'),
            'default' => esc_html__('Read More', 'libo-master')
        ]);
        $repeater->add_control(
            'link',
            [
                'label' => esc_html__('Link', 'libo-master'),
                'type' => Controls_Manager::URL,
                'description' => esc_html__('enter link', 'libo-master'),
            ]
        );
        $this->add_control(
            'case-study-list',
            [
                'label' => esc_html__('Case Study List', 'libo-master'),
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'image_box_background_image' => array(
                            'url' => Utils::get_placeholder_image_src()
                        ),
                        'description' => esc_html__('Finance', 'libo-master'),
                        'title' => esc_html__('Miranda computer home finance solution', 'libo-master')
                    ]
                ],
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
                'default' => '4'
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
                    'size' => 30,
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
                'description' => esc_html__('you can set yes/no to enable/disable', 'libo-master')
            ]
        );
        $this->add_control(
            'autoplay',
            [
                'label' => esc_html__('Autoplay', 'libo-master'),
                'type' => Controls_Manager::SWITCHER,
                'description' => esc_html__('you can set yes/no to enable/disable', 'libo-master'),

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
            'styling_section',
            [
                'label' => esc_html__('Styling Settings', 'libo-master'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control('title_color', [
            'label' => esc_html__('Title Color', 'libo-master'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .single-case-study-item .content-wrap .content .title" => "color: {{VALUE}}"
            ]
        ]);

        $this->add_control('cat_color', [
            'label' => esc_html__('Category Color', 'libo-master'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .single-case-study-item .content-wrap .content p" => "color: {{VALUE}}"
            ]
        ]);
        $this->add_control('hover_styling_settings', [
            'type' => Controls_Manager::DIVIDER
        ]);
        $this->add_control('read_color', [
            'label' => esc_html__('Read More Color', 'libo-master'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .single-case-study-item .content-wrap .btn-wrapper .read-btn" => "color: {{VALUE}}"
            ]
        ]);
        $this->add_control('hover_read_color', [
            'label' => esc_html__('Read More Hover Color', 'libo-master'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .single-case-study-item .content-wrap .btn-wrapper .read-btn:hover" => "color: {{VALUE}}"
            ]
        ]);
        $this->add_control('hover_background_color', [
            'label' => esc_html__('Hover Background Color', 'libo-master'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .single-case-study-item .content-wrap:before" => "background-color: {{VALUE}}"
            ]
        ]);
        $this->end_controls_section();
        /* icon hover controls tabs end */


        $this->start_controls_section(
            'typography_section',
            [
                'label' => esc_html__('Typography Settings', 'libo-master'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_group_control(Group_Control_Typography::get_type(), [
            'name' => 'hover_title_typography',
            'label' => esc_html__('Title Typography', 'libo-master'),
            'selector' => "{{WRAPPER}} .single-case-study-item .content-wrap .title"
        ]);
        $this->add_group_control(Group_Control_Typography::get_type(), [
            'name' => 'hover_description_typography',
            'label' => esc_html__('Category Typography', 'libo-master'),
            'selector' => "{{WRAPPER}} .single-case-study-item .content-wrap p"
        ]);
        $this->add_group_control(Group_Control_Typography::get_type(), [
            'name' => 'hover_read_typography',
            'label' => esc_html__('Read More Typography', 'libo-master'),
            'selector' => "{{WRAPPER}} .single-case-study-item .content-wrap .btn-wrapper .read-btn"
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
        $rand_numb = rand(333, 999999999);

        //slider settings
        $slider_settings = [
            "loop" => esc_attr($settings['loop']),
            "margin" => esc_attr($settings['margin']['size'] ?? 0),
            "items" => esc_attr($settings['items'] ?? 1),
            "autoplay" => esc_attr($settings['autoplay']),
            "autoplaytimeout" => esc_attr($settings['autoplaytimeout']['size'] ?? 0),
        ]

        ?>
        <div class="single-case-study-item-list">
            <div class="case-carousel"
                 id="case-one-carousel-<?php echo esc_attr($rand_numb); ?>"
                 data-settings='<?php echo json_encode($slider_settings) ?>'
            >
                <?php
                $all_image_box_item = $settings['case-study-list'];

                foreach ($all_image_box_item as $item):
                    $background_image_id = $item['image_box_background_image']['id'];
                    $background_image_url = !empty($background_image_id) ? wp_get_attachment_image_src($background_image_id, 'libo_full')[0] : '';

                    ?>
                    <div class="single-case-study-item bg-image"
                         style="background-image: url(<?php echo esc_url($background_image_url); ?>)">
                        <div class="content-wrap">
                            <div class="content">
                                <p><?php echo esc_html($item['description']); ?></p>
                                <h5 class="title">
                                    <a <?php print libo_master()->render_elementor_link_attributes($item['link'], ''); ?>><?php echo esc_html($item['title']) ?>
                                        <span>.</span></a></h5>
                            </div>
                            <div class="btn-wrapper">
                                <a class="read-btn"
                                   href="<?php echo libo_master()->render_elementor_link_attributes($item['link']) ?>"><?php echo esc_html($settings['read-btn']) ?></a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
        <?php
    }
}

Plugin::instance()->widgets_manager->register_widget_type(new Libo_Single_Case_Study_Widget());