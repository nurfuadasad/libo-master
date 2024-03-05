<?php
/**
 * Elementor Widget
 * @package Libo
 * @since 1.0.0
 */

namespace Elementor;
class Libo_Single_Case_Study_Two_Widget extends Widget_Base
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
        return 'libo-single-case-two-study-widget';
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
        return esc_html__('Case Study Item : 02', 'libo-master');
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
        $this->add_control(
            'column',
            [
                'label' => esc_html__('Column', 'libo-master'),
                'type' => Controls_Manager::SELECT,
                'options' => array(
                    '3' => esc_html__('04 Column', 'libo-master'),
                    '4' => esc_html__('03 Column', 'libo-master'),
                    '2' => esc_html__('06 Column', 'libo-master')
                ),
                'description' => esc_html__('select grid column', 'libo-master'),
                'default' => '4'
            ]
        );
        $this->add_control('total', [
            'label' => esc_html__('Total Posts', 'libo-master'),
            'type' => Controls_Manager::TEXT,
            'default' => '-1',
            'description' => esc_html__('enter how many service you want in masonry , enter -1 for unlimited service.')
        ]);
        $this->add_control('category', [
            'label' => esc_html__('Category', 'libo-master'),
            'type' => Controls_Manager::SELECT2,
            'multiple' => true,
            'options' => Libo()->get_terms_names('service-cat', 'id'),
            'description' => esc_html__('select category as you want, leave it blank for all category', 'libo-master'),
        ]);
        $this->add_control('order', [
            'label' => esc_html__('Order', 'libo-master'),
            'type' => Controls_Manager::SELECT,
            'options' => array(
                'ASC' => esc_html__('Ascending', 'libo-master'),
                'DESC' => esc_html__('Descending', 'libo-master'),
            ),
            'default' => 'ASC',
            'description' => esc_html__('select order', 'libo-master')
        ]);
        $this->add_control('orderby', [
            'label' => esc_html__('OrderBy', 'libo-master'),
            'type' => Controls_Manager::SELECT,
            'options' => array(
                'ID' => esc_html__('ID', 'libo-master'),
                'title' => esc_html__('Title', 'libo-master'),
                'date' => esc_html__('Date', 'libo-master'),
                'rand' => esc_html__('Random', 'libo-master'),
                'comment_count' => esc_html__('Most Comments', 'libo-master'),
            ),
            'default' => 'ID',
            'description' => esc_html__('select order', 'libo-master')
        ]);
        $this->add_control('excerpt_length', [
            'label' => esc_html__('Excerpt Length', 'libo-master'),
            'type' => Controls_Manager::SELECT,
            'options' => array(
                25 => esc_html__('Short', 'libo-master'),
                55 => esc_html__('Regular', 'libo-master'),
                100 => esc_html__('Long', 'libo-master'),
            ),
            'default' => 25,
            'description' => esc_html__('select excerpt length', 'libo-master')
        ]);
        $this->add_control('readmore_text', [
            'label' => esc_html__('Read More Text', 'libo-master'),
            'type' => Controls_Manager::TEXT,
            'default' => esc_html__('Read More', 'libo-master')
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
                "{{WRAPPER}} .single-case-study-item-02 .content-wrap .content .title" => "color: {{VALUE}}"
            ]
        ]);

        $this->add_control('cat_color', [
            'label' => esc_html__('Category Color', 'libo-master'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .single-case-study-item-02 .content-wrap .content ul li" => "color: {{VALUE}}"
            ]
        ]);
        $this->add_control('hover_styling_settings', [
            'type' => Controls_Manager::DIVIDER
        ]);
        $this->add_control('read_color', [
            'label' => esc_html__('Read More Color', 'libo-master'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .single-case-study-item-02 .content-wrap .btn-wrapper .read-btn" => "color: {{VALUE}}"
            ]
        ]);
        $this->add_control('hover_read_color', [
            'label' => esc_html__('Read More Hover Color', 'libo-master'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .single-case-study-item-02 .content-wrap .btn-wrapper .read-btn:hover" => "color: {{VALUE}}"
            ]
        ]);
        $this->add_control('hover_background_color', [
            'label' => esc_html__('Hover Background Color', 'libo-master'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .single-case-study-item-02 .content-wrap:before" => "background-color: {{VALUE}}"
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
            'selector' => "{{WRAPPER}} .single-case-study-item-02 .content-wrap .title"
        ]);
        $this->add_group_control(Group_Control_Typography::get_type(), [
            'name' => 'hover_description_typography',
            'label' => esc_html__('Category Typography', 'libo-master'),
            'selector' => "{{WRAPPER}} .single-case-study-item-02 .content-wrap p"
        ]);
        $this->add_group_control(Group_Control_Typography::get_type(), [
            'name' => 'hover_read_typography',
            'label' => esc_html__('Read More Typography', 'libo-master'),
            'selector' => "{{WRAPPER}} .single-case-study-item-02 .content-wrap .btn-wrapper .read-btn"
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
        //query settings
        $total_posts = $settings['total'];
        $category = $settings['category'];
        $order = $settings['order'];
        $orderby = $settings['orderby'];
        $rand_numb = rand(333, 999999999);

        //slider settings
        $slider_settings = [
            "loop" => esc_attr($settings['loop']),
            "margin" => esc_attr($settings['margin']['size'] ?? 0),
            "items" => esc_attr($settings['items'] ?? 1),
            "autoplay" => esc_attr($settings['autoplay']),
            "autoplaytimeout" => esc_attr($settings['autoplaytimeout']['size'] ?? 0),
        ];

        //setup query
        $args = array(
            'post_type' => 'case-study',
            'posts_per_page' => $total_posts,
            'order' => $order,
            'orderby' => $orderby,
            'post_status' => 'publish'
        );

        if (!empty($category)) {
            $args['tax_query'] = array(
                array(
                    'taxonomy' => 'case-study-cat',
                    'field' => 'term_id',
                    'terms' => $category
                )
            );
        }

        $post_data = new \WP_Query($args);

        ?>
        <div class="single-case-study-item-list">
            <div class="case-carousel"
                 id="case-one-carousel-<?php echo esc_attr($rand_numb); ?>"
                 data-settings='<?php echo json_encode($slider_settings) ?>'
            >
                <?php
                while ($post_data->have_posts()):$post_data->the_post();
                    $img_id = get_post_thumbnail_id(get_the_ID()) ? get_post_thumbnail_id(get_the_ID()) : false;
                    $img_url_val = $img_id ? wp_get_attachment_image_src($img_id, 'libo_grid', false) : '';
                    $img_url = is_array($img_url_val) && !empty($img_url_val) ? $img_url_val[0] : '';

                    $post_categories = get_the_terms(get_the_ID(), 'case-study-cat');
                    ?>
                    <div class="single-case-study-item-02 bg-image"
                         style="background-image: url(<?php echo esc_url($img_url); ?>)">
                        <div class="content-wrap">
                            <div class="content">
                                <ul>
                                    <?php foreach ($post_categories as $cats) : ?>
                                        <li><a href="<?php echo get_term_link($cats->slug, 'case-study-cat') ?>"><?php echo esc_attr($cats->name) ?></a></li>
                                    <?php endforeach; ?>
                                </ul>
                                <h5 class="title">
                                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?>
                                        <span>.</span></a></h5>
                            </div>
                            <div class="btn-wrapper">
                                <a class="read-btn"
                                   href="<?php the_permalink(); ?>"><?php echo esc_html($settings['readmore_text']) ?></a>
                            </div>
                        </div>
                    </div>
                <?php endwhile;
                wp_reset_query();
                ?>
            </div>
        </div>
        <?php
    }
}

Plugin::instance()->widgets_manager->register_widget_type(new Libo_Single_Case_Study_Two_Widget());