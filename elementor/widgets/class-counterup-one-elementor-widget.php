<?php
/**
 * Elementor Widget
 * @package Libo
 * @since 1.0.0
 */

namespace Elementor;
class Libo_Counterup_One_Widget extends Widget_Base
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
        return 'libo-counterup-one-widget';
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
        return esc_html__('Counterup: 01', 'libo-master');
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
        return 'eicon-counter';
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
            'theme',
            [
                'label' => esc_html__('Theme', 'libo-master'),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'black' => esc_html__('Black', 'libo-master'),
                    'white' => esc_html__('White', 'libo-master'),
                ],
                'default' => 'black',
                'description' => esc_html__('select theme.', 'libo-master')
            ]
        );
        $this->add_control('title', [
            'label' => esc_html__('Title', 'libo-master'),
            'type' => Controls_Manager::TEXT,
            'default' => esc_html__('Case Solved', 'libo-master'),
            'description' => esc_html__('enter title', 'libo-master')
        ]);
        $this->add_control('number', [
            'label' => esc_html__('Number', 'libo-master'),
            'type' => Controls_Manager::TEXT,
            'default' => esc_html__('5,007', 'libo-master'),
            'description' => esc_html__('enter counterup number', 'libo-master')
        ]);
        $this->add_control('sign', [
            'label' => esc_html__('sign', 'libo-master'),
            'type' => Controls_Manager::TEXT,
            'default' => esc_html__('+', 'libo-master'),
            'description' => esc_html__('enter counterup sign', 'libo-master')
        ]);
        $this->add_control(
            'icon',
            [
                'label' => esc_html__('Icon', 'libo-master'),
                'type' => Controls_Manager::ICONS,
                'description' => esc_html__('select Icon.', 'libo-master'),
                'default' => [
                    'value' => 'flaticon-men-group-outline',
                    'library' => 'solid',
                ]
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
        $this->add_control('icon_color', [
            'label' => esc_html__('Icon Color', 'libo-master'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .single-counterup-01 .icon" => "color: {{VALUE}}"
            ]
        ]);
        $this->add_control('number_color', [
            'label' => esc_html__('Number Color', 'libo-master'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .single-counterup-01 .content .count-wrap .count-num" => "color: {{VALUE}}",
                "{{WRAPPER}} .single-counterup-01 .content .count-wrap " => "color: {{VALUE}}"
            ]
        ]);
        $this->add_control('title_color', [
            'label' => esc_html__('Title Color', 'libo-master'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .single-counterup-01 .content .title" => "color: {{VALUE}}"
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
                'name' => 'number_typography',
                'label' => esc_html__('Number Typography', 'libo-master'),
                'selector' => '{{WRAPPER}} .single-counterup-01 .count-wrap',
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'title_typography',
                'label' => esc_html__('Title Typography', 'libo-master'),
                'selector' => '{{WRAPPER}} .single-counterup-01 .title',
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

        $title = $settings['title'];
        $number = $settings['number'];
        $this->add_render_attribute('counterup_wrapper', 'class', 'single-counterup-01');
        $this->add_render_attribute('counterup_wrapper', 'class', $settings['theme']);

        ?>
        <div <?php echo $this->get_render_attribute_string('counterup_wrapper'); ?>>
            <div class="icon">
                <?php
                Icons_Manager::render_icon($settings['icon'], ['aria-hidden' => 'true']);
                ?>
            </div>
            <div class="content">
                <div class="count-wrap"><span
                            class="count-num"><?php echo esc_html($number); ?></span><span class="sing-plus"><?php echo esc_html($settings['sign']) ?></span>
                </div>
                <h4 class="title"><?php echo esc_html($title); ?></h4>
            </div>
        </div>
        <?php
    }
}

Plugin::instance()->widgets_manager->register_widget_type(new Libo_Counterup_One_Widget());