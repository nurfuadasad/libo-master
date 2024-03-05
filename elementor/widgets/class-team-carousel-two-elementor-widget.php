<?php
/**
 * Elementor Widget
 * @package libo
 * @since 1.0.0
 */

namespace Elementor;
class libo_Team_Member_Two_Widget extends Widget_Base
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
        return 'libo-team-member-two-widget';
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
        return esc_html__('Team Slider: 02', 'libo-master');
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
        return 'eicon-person';
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
        $repeater = new \Elementor\Repeater();
        $repeater->add_control(
            'image', [
                'label' => esc_html__('Image', 'libo-master'),
                'type' => Controls_Manager::MEDIA,
                'show_label' => false,
                'description' => esc_html__('upload background image', 'libo-master'),
                'default' => [
                    'src' => Utils::get_placeholder_image_src()
                ],
            ]
        );
        $repeater->add_control(
            'name', [
                'label' => esc_html__('Name', 'libo-master'),
                'type' => Controls_Manager::TEXT,
                'description' => esc_html__('enter name', 'libo-master'),
                'default' => esc_html__('Mario Hedge', 'libo-master')
            ]
        );
        $repeater->add_control(
            'designation', [
                'label' => esc_html__('Designation', 'libo-master'),
                'type' => Controls_Manager::TEXT,
                'description' => esc_html__('enter designation', 'libo-master'),
                'default' => esc_html__('Board Of Directors', 'libo-master')
            ]
        );
        $repeater->add_control(
            'social_icon_01', [
                'label' => esc_html__('Social Icon One', 'libo-master'),
                'type' => Controls_Manager::ICONS,
                'description' => esc_html__('select icon', 'libo-master'),
                'default' => [
                    'value' => 'fas fa-facebook',
                    'library' => 'solid',
                ],
            ]
        );
        $repeater->add_control(
            'social_icon_01_link', [
                'label' => esc_html__('Social Icon One URL', 'libo-master'),
                'type' => Controls_Manager::URL,
                'description' => esc_html__('enter URL', 'libo-master'),
                'default' => [
                    'url' => '#'
                ],
            ]
        );
        $repeater->add_control(
            'social_icon_02', [
                'label' => esc_html__('Social Icon Two', 'libo-master'),
                'type' => Controls_Manager::ICONS,
                'description' => esc_html__('select icon', 'libo-master'),
                'default' => [
                    'value' => 'fas fa-facebook',
                    'library' => 'solid',
                ],
            ]
        );
        $repeater->add_control(
            'social_icon_02_link', [
                'label' => esc_html__('Social Icon Two URL', 'libo-master'),
                'type' => Controls_Manager::URL,
                'description' => esc_html__('enter URL', 'libo-master'),
                'default' => [
                    'url' => '#'
                ],
            ]
        );
        $repeater->add_control(
            'social_icon_03', [
                'label' => esc_html__('Social Icon Three', 'libo-master'),
                'type' => Controls_Manager::ICONS,
                'description' => esc_html__('select icon', 'libo-master'),
                'default' => [
                    'value' => 'fas fa-facebook',
                    'library' => 'solid',
                ],
            ]
        );
        $repeater->add_control(
            'social_icon_03_link', [
                'label' => esc_html__('Social Icon Three URL', 'libo-master'),
                'type' => Controls_Manager::URL,
                'description' => esc_html__('enter URL', 'libo-master'),
                'default' => [
                    'url' => '#'
                ],
            ]
        );
        $repeater->add_control(
            'social_icon_04', [
                'label' => esc_html__('Social Icon Four', 'libo-master'),
                'type' => Controls_Manager::ICONS,
                'description' => esc_html__('select icon', 'libo-master'),
                'default' => [
                    'value' => 'fas fa-facebook',
                    'library' => 'solid',
                ],
            ]
        );
        $repeater->add_control(
            'social_icon_04_link', [
                'label' => esc_html__('Social Icon Four URL', 'libo-master'),
                'type' => Controls_Manager::URL,
                'description' => esc_html__('enter URL', 'libo-master'),
                'default' => [
                    'url' => '#'
                ],
            ]
        );
        $this->add_control('team_member_items', [
            'label' => esc_html__('Team Member Items', 'libo-master'),
            'type' => Controls_Manager::REPEATER,
            'fields' => $repeater->get_controls(),
            'default' => [
                [
                    'image' => array(
                        'url' => Utils::get_placeholder_image_src()
                    ),
                    'name' => esc_html__('Mario Hedge', 'libo-master'),
                    'designation' => esc_html__('Board Of Directors', 'libo-master'),
                    'description' => esc_html__('Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incidi dunt ut labore et dolore. ', 'libo-master')

                ]
            ],

        ]);

        $this->end_controls_section();

        $this->start_controls_section(
            'team_member_styling_settings_section',
            [
                'label' => esc_html__('Styling Settings', 'libo-master'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'normal_background',
                'label' => esc_html__('Background', 'libo-master'),
                'types' => ['classic', 'gradient', 'video'],
                'selector' => '{{WRAPPER}} .team-single-item-02 .content',
            ]
        );
        $this->add_control('name_color', [
            'label' => esc_html__('Name Color', 'libo-master'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .team-single-item-02 .content .title" => "color: {{VALUE}}"
            ]
        ]);
        $this->add_control('designation_color', [
            'label' => esc_html__('Designation Color', 'libo-master'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .team-single-item-02 .content span" => "color: {{VALUE}}"
            ]
        ]);
        $this->add_control('team_social_icon_styling_divider', [
            'type' => Controls_Manager::DIVIDER
        ]);

        $this->start_controls_tabs(
            'team_social_icon_style_tabs'
        );

        $this->start_controls_tab(
            'team_social_icon_style_normal_tab',
            [
                'label' => esc_html__('Normal', 'libo-master'),
            ]
        );
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'social_bg_icon_normal_background',
                'label' => esc_html__('Background', 'libo-master'),
                'types' => ['classic', 'gradient', 'video'],
                'selector' => '{{WRAPPER}} .team-single-item-02 .social-link li',
            ]
        );
        $this->add_control('social_icon_color', [
            'label' => esc_html__('Icon Color', 'libo-master'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .team-single-item-02 .social-link li" => "color: {{VALUE}}"
            ]
        ]);
        $this->end_controls_tab();

        $this->start_controls_tab(
            'team_social_icon_style_hover_tab',
            [
                'label' => esc_html__('Hover', 'libo-master'),
            ]
        );
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'social_icon_hover_background',
                'label' => esc_html__('Background', 'libo-master'),
                'types' => ['classic', 'gradient', 'video'],
                'selector' => '{{WRAPPER}} .team-single-item-02 .social-link li:hover',
            ]
        );
        $this->add_control('social_hover_icon_color', [
            'label' => esc_html__('Icon Color', 'libo-master'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .team-single-item-02 .social-link li:hover" => "color: {{VALUE}}"
            ]
        ]);

        $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->add_control('team_typography_divider', [
            'type' => Controls_Manager::DIVIDER
        ]);
        $this->add_group_control(Group_Control_Typography::get_type(), [
            'name' => 'name_typography',
            'label' => esc_html__('Name Typography', 'libo-master'),
            'selector' => "{{WRAPPER}} .team-single-item-02 .title"
        ]);
        $this->add_group_control(Group_Control_Typography::get_type(), [
            'name' => 'designation_typography',
            'label' => esc_html__('Designation Typography', 'libo-master'),
            'selector' => "{{WRAPPER}} .team-single-item-02 span"
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
        $all_team_member_items = $settings['team_member_items'];
        ?>
        <ul class="team-member-carousel-wrapper team-single-item-list">
            <?php
            foreach ($all_team_member_items as $item):
                $image_id = $item['image']['id'];
                $image_url = !empty($image_id) ? wp_get_attachment_image_src($image_id, 'full', false)[0] : '';
                $image_alt = !empty($img_id) ? get_post_meta($img_id, '_wp_attachment_image_alt', true) : '';
                ?>
                <li class="tm-outer-wrap">
                    <div class="team-single-item-02">
                        <div class="thumb">
                            <img src="<?php echo esc_url($image_url) ?>" alt="<?php echo esc_url($image_alt) ?>">
                        </div>
                        <ul class="social-link style-01">
                            <?php
                            for ($i = 1; $i < 5; $i++) {
                                if (!empty($item['social_icon_0' . $i]) && !empty($item['social_icon_0' . $i . '_link'])) {
                                    ?>
                                    <li>
                                        <a <?php echo libo_master()->render_elementor_link_attributes($item['social_icon_0' . $i . '_link']) ?>>
                                            <?php Icons_Manager::render_icon($item['social_icon_0' . $i], ['aria-hidden' => 'true']); ?>
                                        </a>
                                    </li>
                                    <?php
                                }
                            }
                            ?>
                        </ul>
                        <div class="content-wrap">
                            <div class="content">
                                <h4 class="title"><?php echo esc_html($item['name']); ?></h4>
                                <span><?php echo esc_html($item['designation']); ?></span>
                            </div>
                        </div>
                    </div>
                </li>
            <?php endforeach; ?>
        </ul>
        <?php
    }
}

Plugin::instance()->widgets_manager->register_widget_type(new libo_Team_Member_Two_Widget());