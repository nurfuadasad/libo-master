<?php
/**
 * Elementor Widget
 * @package libo
 * @since 1.0.0
 */

namespace Elementor;
class libo_Icon_Box_List_Widget extends Widget_Base
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
        return 'libo-icon-box-list-widget';
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
        return esc_html__('Icon List: 01', 'libo-master');
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
        return 'eicon-editor-list-ul';
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
            'title_status', [
                'label' => esc_html__('Title Show/Hide', 'libo-master'),
                'type' => Controls_Manager::SWITCHER,
                'default' => 'yes',
                'description' => esc_html__('show/hide title', 'libo-master')
            ]
        );
        $this->add_control(
            'title',
            [
                'label' => esc_html__('Title', 'libo-master'),
                'type' => Controls_Manager::TEXT,
                'description' => esc_html__('enter title.', 'libo-master'),
                'default' => esc_html__('Mission and vision', 'libo-master'),
                'condition' => ['title_status' => 'yes']
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
        $this->add_control(
            'icon',
            [
                'label' => esc_html__('Icon', 'libo-master'),
                'type' => Controls_Manager::ICONS,
                'description' => esc_html__('select Icon.', 'libo-master'),
                'default' => [
                    'value' => 'fas fa-check',
                    'library' => 'solid',
                ]
            ]
        );
        $this->add_control(
            'description',
            [
                'label' => esc_html__('Description', 'libo-master'),
                'type' => Controls_Manager::TEXTAREA,
                'description' => esc_html__('enter text.', 'libo-master'),
                'default' => esc_html__('Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam', 'libo-master'),
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
        $this->add_control('Background_color', [
            'label' => esc_html__('Background Color', 'libo-master'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .icon-box-list" => "background-color: {{VALUE}}"
            ]
        ]);
        $this->add_control(
            'icon_height',
            [
                'label' => esc_html__( 'Icon Height', 'libo-master' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => [ 'px', '%', 'em' ],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 1000,
                        'step' => 5,
                    ],
                    '%' => [
                        'min' => 0,
                        'max' => 10,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 25,
                ],
                'selectors' => [
                    '{{WRAPPER}} .icon-box-list .icon' => 'height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_control(
            'icon_width',
            [
                'label' => esc_html__( 'Icon Width', 'libo-master' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => [ 'px', '%', 'em' ],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 1000,
                        'step' => 5,
                    ],
                    '%' => [
                        'min' => 0,
                        'max' => 10,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 25,
                ],
                'selectors' => [
                    '{{WRAPPER}} .icon-box-list .icon' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_control('icon_color', [
            'label' => esc_html__('Icon Color', 'libo-master'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .icon-box-list .icon" => "color: {{VALUE}}"
            ]
        ]);
        $this->add_control('icon_bg_color', [
            'label' => esc_html__('Icon Background Color', 'libo-master'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .icon-box-list .icon" => "background-color: {{VALUE}}"
            ]
        ]);
        $this->add_control('title_color', [
            'label' => esc_html__('Title Color', 'libo-master'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .icon-box-list .content span" => "color: {{VALUE}}"
            ]
        ]);
        $this->add_control('number_color', [
            'label' => esc_html__('Description Color', 'libo-master'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .icon-box-list .content p" => "color: {{VALUE}}"
            ]
        ]);
        $this->end_controls_section();

        $this->start_controls_section(
            'typography_settings_section',
            [
                'label' => esc_html__('Typography Settings', 'libo-master'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'title_typography',
                'label' => esc_html__('Title Typography', 'libo-master'),
                'selector' => '{{WRAPPER}} .icon-box-list.style-01 .content span',
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'description_typography',
                'label' => esc_html__('Description Typography', 'libo-master'),
                'selector' => '{{WRAPPER}} .icon-box-list.style-01 .content p',
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
        $this->add_render_attribute('icon-box-list-wrapper', 'class', 'icon-box-list');
        $this->add_render_attribute('link_wrapper', 'class', 'icon-box-anchor');

        if (!empty($settings['link']['url'])) {
            $this->add_link_attributes('link_wrapper', $settings['link']);
        }
        ?>

        <div class="icon-box-list">
            <div class="icon">
                <?php
                Icons_Manager::render_icon($settings['icon'], ['aria-hidden' => 'true']);
                ?>
            </div>
            <div class="content">
                <a <?php echo $this->get_render_attribute_string('link_wrapper'); ?>>
                    <?php
                    if ($settings['title_status'] == 'yes'): ?>
                        <h4 class="title"><?php echo esc_html__($settings['title']) ?></h4>
                    <?php endif; ?>
                </a>
                <p><?php echo esc_html__($settings['description']) ?></p>
            </div>
        </div>

        <?php
    }
}

Plugin::instance()->widgets_manager->register_widget_type(new libo_Icon_Box_List_Widget());