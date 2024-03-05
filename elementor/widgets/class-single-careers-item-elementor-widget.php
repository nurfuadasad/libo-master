<?php
/**
 * Elementor Widget
 * @package Libo
 * @since 1.0.0
 */

namespace Elementor;
class Libo_Single_Careers_Item_List_Widget extends Widget_Base
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
        return 'libo-single-careers-item-widget';
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
        return esc_html__('Careers Item', 'libo-master');
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
        return 'eicon-single-product';
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
            'default' => esc_html__('Engineer: Observability Applications', 'libo-master')
        ]);
        $repeater->add_control('icon', [
            'label' => esc_html__('Icon', 'libo-master'),
            'type' => Controls_Manager::ICONS,
            'default' => [
                'value' => 'flaticon-receipt',
                'library' => 'solid',
            ],
        ]);
        $repeater->add_control(
            'image', [
                'label' => esc_html__('Image', 'libo-master'),
                'type' => Controls_Manager::MEDIA,
                'show_label' => false,
            ]
        );
        $repeater->add_control('status', [
            'label' => esc_html__('Status', 'libo-master'),
            'type' => Controls_Manager::TEXTAREA,
            'default' => esc_html__('Status: Full Time', 'libo-master')
        ]);
        $repeater->add_control('location', [
            'label' => esc_html__('Location', 'libo-master'),
            'type' => Controls_Manager::TEXTAREA,
            'default' => esc_html__('Location: Holololo, UK', 'libo-master')
        ]);
        $repeater->add_control(
            'link',
            [
                'label' => esc_html__('Link', 'libo-master'),
                'type' => Controls_Manager::URL,
                'description' => esc_html__('enter link', 'libo-master'),
            ]
        );
        $repeater->add_control('read-btn', [
            'label' => esc_html__('Read Button', 'libo-master'),
            'type' => Controls_Manager::TEXTAREA,
            'default' => esc_html__('Apply Now', 'libo-master')
        ]);
        $this->add_control(
            'careers-list',
            [
                'label' => esc_html__('Case Study List', 'libo-master'),
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    'title' => esc_html__('Engineer: Observability Applications', 'libo-master'),
                    'status' => esc_html__('Status: Full Time', 'libo-master'),
                    'location' => esc_html__('Location: Holololo, UK', 'libo-master'),
                    'read-btn' => esc_html__('Apply Now', 'libo-master')
                ]
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
                "{{WRAPPER}} .single-careers-item .table-striped tbody tr td .title" => "color: {{VALUE}}"
            ]
        ]);

        $this->add_control('description_background_color', [
            'label' => esc_html__('Description Color', 'libo-master'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .single-careers-item .table-striped tbody tr td" => "color: {{VALUE}}"
            ]
        ]);
        $this->add_control('icon_background_color', [
            'label' => esc_html__('Icon Background Color', 'libo-master'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .single-careers-item .table-striped tbody tr td .icon" => "background-color: {{VALUE}}"
            ]
        ]);
        $this->add_control('icon_color', [
            'label' => esc_html__('Icon Color', 'libo-master'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .single-careers-item .table-striped tbody tr td .icon" => "color: {{VALUE}}"
            ]
        ]);
        $this->add_control('button_bg_color', [
            'label' => esc_html__('Button Background Color', 'libo-master'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .btn-wrapper .boxed-btn" => "background-color: {{VALUE}}"
            ]
        ]);
        $this->add_control('button_title_color', [
            'label' => esc_html__('Button Color', 'libo-master'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .btn-wrapper .boxed-btn" => "color: {{VALUE}}"
            ]
        ]);
        $this->add_control('hover_bg_color', [
            'label' => esc_html__('Button Background Hover Color', 'libo-master'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .btn-wrapper .boxed-btn:hover" => "background-color: {{VALUE}}"
            ]
        ]);
        $this->add_control('hover_title_color', [
            'label' => esc_html__('Button Hover Color', 'libo-master'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .btn-wrapper .boxed-btn:hover" => "color: {{VALUE}}"
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
            'selector' => "{{WRAPPER}} .single-careers-item .table-striped tbody tr td .title"
        ]);
        $this->add_group_control(Group_Control_Typography::get_type(), [
            'name' => 'hover_description_typography',
            'label' => esc_html__('Description Typography', 'libo-master'),
            'selector' => "{{WRAPPER}} .single-careers-item .table-striped tbody tr td"
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
        $careers_list = $settings['careers-list'];

        ?>
        <div class="single-careers-item table-responsive">
            <table class="table table-striped">
                <tbody>
                <?php foreach ($careers_list as $item) : ?>
                    <tr>
                        <td>
                            <div class="icon">
                                <?php echo libo_master()->render_elementor_icons($item['icon']) ?>
                            </div>
                        </td>
                        <td>
                            <h3 class="title"><a <?php print libo_master()->render_elementor_link_attributes($item['link'], ''); ?>><?php echo esc_html($item['title']); ?></a></h3>
                        </td>
                        <td><?php echo esc_html($item['status']); ?></td>
                        <td> <?php echo esc_html($item['location']); ?></td>
                        <td>
                            <div class="btn-wrapper">
                                <a <?php print libo_master()->render_elementor_link_attributes($item['link'], ''); ?> class="boxed-btn">
                                    <?php echo esc_html($item['read-btn']); ?>
                                </a>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <?php
    }
}

Plugin::instance()->widgets_manager->register_widget_type(new Libo_Single_Careers_Item_List_Widget());