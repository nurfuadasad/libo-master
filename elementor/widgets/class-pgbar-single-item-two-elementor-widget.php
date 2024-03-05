<?php
/**
 * Elementor Widget
 * @package Libo
 * @since 1.0.0
 */

namespace Elementor;
class Libo_Pgbar_Single_Item_Two_Widget extends Widget_Base
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
        return 'libo-pgbar-single-item-two-widget';
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
        return esc_html__('Progressbar: 02', 'libo-master');
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
        return 'eicon-barcode';
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
                'default' => esc_html__('Digital content create', 'libo-master')
            ]
        );
        $this->add_control(
            'number',
            [
                'label' => esc_html__('Progress Number', 'libo-master'),
                'type' => Controls_Manager::NUMBER,
                'label_block' => true,
                'description' => esc_html__('enter progress percent.', 'libo-master'),
                'default' => 80
            ]
        );
        $this->add_control('number_color', [
            'label' => esc_html__('Progress Color', 'libo-master'),
            'type' => Controls_Manager::COLOR,
            'default' => '#fe4816'
        ]);

        $this->end_controls_section();


        $this->start_controls_section(
            'content_styling_section',
            [
                'label' => esc_html__('Content Styling', 'libo-master'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control('normal_title_color', [
            'label' => esc_html__('Title Color', 'libo-master'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .progress-item .single-progressbar-02 .subtitle" => "color: {{VALUE}};"
            ]
        ]);
        $this->add_control('percent_title_color', [
            'label' => esc_html__('Percent Number Color', 'libo-master'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .progress-item .single-progressbar-02 .progressbar .percentCount" => "color: {{VALUE}};"
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

        $this->add_group_control(Group_Control_Typography::get_type(), [
            'name' => 'sub_title_typography',
            'label' => esc_html__('Title Typography', 'libo-master'),
            'selector' => "{{WRAPPER}} .progress-item .single-progressbar-02 .subtitle"
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
        <div class="progress-item">
            <div class="single-progressbar-02">
                <h4 class="subtitle"><?php echo esc_html($settings['title']) ?></h4>
                <div class="neaterller-progress-init" data-percent="<?php echo esc_attr($settings['number']);?>" data-fillbgcolor="<?php echo esc_attr($settings['number_color'])?>"><?php echo esc_html($settings['number']) ?></div>
            </div>
        </div>
        <?php
    }
}

Plugin::instance()->widgets_manager->register_widget_type(new Libo_Pgbar_Single_Item_Two_Widget());