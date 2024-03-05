<?php

/**

 * Elementor Widget

 * @package Libo

 * @since 1.0.0

 */



namespace Elementor;

class Libo_Chat_Box_List_Widget extends Widget_Base

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

        return 'libo-chat-box-list-widget';

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

        return esc_html__('Chat Box List: 01', 'libo-master');

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

        return 'eicon-lightbox';

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

                'type' => Controls_Manager::TEXT,

                'description' => esc_html__('enter title.', 'libo-master'),

                'default' => esc_html__('Finance', 'libo-master')

            ]

        );
        $this->add_control(

            'link_1',

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

                    'value' => 'flaticon-receipt',

                    'library' => 'solid',

                ]

            ]

        );

        $this->add_control(

            'title_2',

            [

                'label' => esc_html__('Title', 'libo-master'),

                'type' => Controls_Manager::TEXT,

                'description' => esc_html__('enter title.', 'libo-master'),

                'default' => esc_html__('Consultancy', 'libo-master')

            ]

        );
        $this->add_control(

            'link_2',

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

            'icon_2',

            [

                'label' => esc_html__('Icon', 'libo-master'),

                'type' => Controls_Manager::ICONS,

                'description' => esc_html__('select Icon.', 'libo-master'),

                'default' => [

                    'value' => 'flaticon-businessman',

                    'library' => 'solid',

                ]

            ]

        );

        $this->add_control(

            'title_3',

            [

                'label' => esc_html__('Title', 'libo-master'),

                'type' => Controls_Manager::TEXT,

                'description' => esc_html__('enter title.', 'libo-master'),

                'default' => esc_html__('Tax', 'libo-master')

            ]

        );
        $this->add_control(

            'link_3',

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

            'icon_3',

            [

                'label' => esc_html__('Icon', 'libo-master'),

                'type' => Controls_Manager::ICONS,

                'description' => esc_html__('select Icon.', 'libo-master'),

                'default' => [

                    'value' => 'flaticon-tax',

                    'library' => 'solid',

                ]

            ]

        );

        $this->add_control(

            'title_4',

            [

                'label' => esc_html__('Title', 'libo-master'),

                'type' => Controls_Manager::TEXT,

                'description' => esc_html__('enter title.', 'libo-master'),

                'default' => esc_html__('Profit Share', 'libo-master')

            ]

        );
        $this->add_control(

            'link_4',

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

            'icon_4',

            [

                'label' => esc_html__('Icon', 'libo-master'),

                'type' => Controls_Manager::ICONS,

                'description' => esc_html__('select Icon.', 'libo-master'),

                'default' => [

                    'value' => 'flaticon-label',

                    'library' => 'solid',

                ]

            ]

        );

        $this->add_control(

            'title_5',

            [

                'label' => esc_html__('Title', 'libo-master'),

                'type' => Controls_Manager::TEXT,

                'description' => esc_html__('enter title.', 'libo-master'),

                'default' => esc_html__('Banking', 'libo-master')

            ]

        );
        $this->add_control(

            'link_5',

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

            'icon_5',

            [

                'label' => esc_html__('Icon', 'libo-master'),

                'type' => Controls_Manager::ICONS,

                'description' => esc_html__('select Icon.', 'libo-master'),

                'default' => [

                    'value' => 'flaticon-payment-method',

                    'library' => 'solid',

                ]

            ]

        );

        $this->add_control(

            'title_6',

            [

                'label' => esc_html__('Title', 'libo-master'),

                'type' => Controls_Manager::TEXT,

                'description' => esc_html__('enter title.', 'libo-master'),

                'default' => esc_html__('Growth', 'libo-master')

            ]

        );
        $this->add_control(

            'link_6',

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

            'icon_6',

            [

                'label' => esc_html__('Icon', 'libo-master'),

                'type' => Controls_Manager::ICONS,

                'description' => esc_html__('select Icon.', 'libo-master'),

                'default' => [

                    'value' => 'flaticon-presentation',

                    'library' => 'solid',

                ]

            ]

        );

        $this->add_control(

            'title_7',

            [

                'label' => esc_html__('Title', 'libo-master'),

                'type' => Controls_Manager::TEXT,

                'description' => esc_html__('enter title.', 'libo-master'),

                'default' => esc_html__('Policy', 'libo-master')

            ]

        );
        $this->add_control(

            'link_7',

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

            'icon_7',

            [

                'label' => esc_html__('Icon', 'libo-master'),

                'type' => Controls_Manager::ICONS,

                'description' => esc_html__('select Icon.', 'libo-master'),

                'default' => [

                    'value' => 'flaticon-suitcase',

                    'library' => 'solid',

                ]

            ]

        );

        $this->add_control(

            'title_8',

            [

                'label' => esc_html__('Title', 'libo-master'),

                'type' => Controls_Manager::TEXT,

                'description' => esc_html__('enter title.', 'libo-master'),

                'default' => esc_html__('Home Loan', 'libo-master')

            ]

        );

        $this->add_control(

            'link_8',

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

            'icon_8',

            [

                'label' => esc_html__('Icon', 'libo-master'),

                'type' => Controls_Manager::ICONS,

                'description' => esc_html__('select Icon.', 'libo-master'),

                'default' => [

                    'value' => 'flaticon-credit',

                    'library' => 'solid',

                ]

            ]

        );

        $this->add_control(

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

                "{{WRAPPER}} .profit-chart-box:before" => "background-color: {{VALUE}}"

            ]

        ]);

        $this->add_control('icon_color', [

            'label' => esc_html__('Icon Color', 'libo-master'),

            'type' => Controls_Manager::COLOR,

            'selectors' => [

                "{{WRAPPER}} .profit-chart-box .profit-icon .icon" => "color: {{VALUE}}"

            ]

        ]);

        $this->add_control('icon_bg_color', [

            'label' => esc_html__('Icon Background Color', 'libo-master'),

            'type' => Controls_Manager::COLOR,

            'selectors' => [

                "{{WRAPPER}} .profit-chart-box .profit-icon" => "background-color: {{VALUE}}"

            ]

        ]);

        $this->add_control('title_color', [

            'label' => esc_html__('Title Color', 'libo-master'),

            'type' => Controls_Manager::COLOR,

            'selectors' => [

                "{{WRAPPER}} .profit-chart-box .profit-icon .icon-text" => "color: {{VALUE}}"

            ]

        ]);

        $this->add_control('border_color', [

            'label' => esc_html__('Border Hover Color', 'libo-master'),

            'type' => Controls_Manager::COLOR,

            'selectors' => [

                "{{WRAPPER}} .profit-chart-box .profit-icon:hover" => "border-color: {{VALUE}}"

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

                'selector' => '{{WRAPPER}} .profit-chart-box .profit-icon .icon-text',

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



        $image_id = $settings['image']['id'];

        $image_url = !empty($image_id) ? wp_get_attachment_image_src($image_id, 'full', false)[0] : '';

        $image_alt = get_post_meta($image_id, '_wp_attachment_image_alt', true);



        ?>



        <div class="profit-chart-box">

            <a <?php echo libo_master()->render_elementor_link_attributes($settings['link']) ?> class="chart-logo">

                <img src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr($image_alt); ?>">

            </a>

            <a <?php echo libo_master()->render_elementor_link_attributes($settings['link_1']) ?> class="profit-icon style-1">

                <span class="icon">

                    <?php Icons_Manager::render_icon($settings['icon'], ['aria-hidden' => 'true']); ?>

                </span>

                <h4 class="icon-text"><?php echo esc_html__($settings['title']) ?></h4>

            </a>

            <a <?php echo libo_master()->render_elementor_link_attributes($settings['link_2']) ?> class="profit-icon style-2">

                 <span class="icon">

                    <?php Icons_Manager::render_icon($settings['icon_2'], ['aria-hidden' => 'true']); ?>

                </span>

                <h4 class="icon-text"><?php echo esc_html__($settings['title_2']) ?></h4>

            </a>

            <a <?php echo libo_master()->render_elementor_link_attributes($settings['link_3']) ?> class="profit-icon style-3">

                <span class="icon">

                    <?php Icons_Manager::render_icon($settings['icon_3'], ['aria-hidden' => 'true']); ?>

                </span>

                <h4 class="icon-text"><?php echo esc_html__($settings['title_3']) ?></h4>

            </a>

            <a <?php echo libo_master()->render_elementor_link_attributes($settings['link_4']) ?> class="profit-icon style-4">

               <span class="icon">

                    <?php Icons_Manager::render_icon($settings['icon_4'], ['aria-hidden' => 'true']); ?>

                </span>

                <h4 class="icon-text"><?php echo esc_html__($settings['title_4']) ?></h4>

            </a>

            <a <?php echo libo_master()->render_elementor_link_attributes($settings['link_5']) ?> class="profit-icon style-5">

                <span class="icon">

                    <?php Icons_Manager::render_icon($settings['icon_5'], ['aria-hidden' => 'true']); ?>

                </span>

                <h4 class="icon-text"><?php echo esc_html__($settings['title_5']) ?></h4>

            </a>

            <a <?php echo libo_master()->render_elementor_link_attributes($settings['link_6']) ?> class="profit-icon style-6">

               <span class="icon">

                    <?php Icons_Manager::render_icon($settings['icon_6'], ['aria-hidden' => 'true']); ?>

                </span>

                <h4 class="icon-text"><?php echo esc_html__($settings['title_6']) ?></h4>

            </a>

            <a <?php echo libo_master()->render_elementor_link_attributes($settings['link_7']) ?> class="profit-icon style-7">

                 <span class="icon">

                    <?php Icons_Manager::render_icon($settings['icon_7'], ['aria-hidden' => 'true']); ?>

                </span>

                <h4 class="icon-text"><?php echo esc_html__($settings['title_7']) ?></h4>

            </a>

            <a <?php echo libo_master()->render_elementor_link_attributes($settings['link_8']) ?> class="profit-icon style-8">

                 <span class="icon">

                    <?php Icons_Manager::render_icon($settings['icon_8'], ['aria-hidden' => 'true']); ?>

                </span>

                <h4 class="icon-text"><?php echo esc_html__($settings['title_8']) ?></h4>

            </a>

        </div>



        <?php

    }

}



Plugin::instance()->widgets_manager->register_widget_type(new Libo_Chat_Box_List_Widget());