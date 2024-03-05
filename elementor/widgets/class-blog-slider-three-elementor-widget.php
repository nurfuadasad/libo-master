<?php
/**
 * Elementor Widget
 * @package Appside
 * @since 1.0.0
 */

namespace Elementor;
class Libo_Blog_Post_Slider_Three_Widget extends Widget_Base
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
        return 'libo-blog-three-widget';
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
        return esc_html__('Blog: Slider 03', 'libo-master');
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
        return 'eicon-slider-album';
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
            'read_settings_section',
            [
                'label' => esc_html__('Read More Settings', 'libo-master'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control('read-btn', [
            'label' => esc_html__('Read More', 'libo-master'),
            'type' => Controls_Manager::TEXT,
            'description' => esc_html__('enter read button text', 'libo-master'),
            'default' => esc_html__('Read More', 'libo-master')
        ]);
        $this->end_controls_section();

        $this->start_controls_section(
            'settings_section',
            [
                'label' => esc_html__('General Settings', 'libo-master'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control('total', [
            'label' => esc_html__('Total Posts', 'libo-master'),
            'type' => Controls_Manager::TEXT,
            'default' => '-1',
            'description' => esc_html__('enter how many post you want in masonry , enter -1 for unlimited post.')
        ]);
        $this->add_control('category', [
            'label' => esc_html__('Category', 'libo-master'),
            'type' => Controls_Manager::SELECT2,
            'multiple' => true,
            'options' => libo_master()->get_terms_names('category', 'id'),
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
                'default' => '3'
            ]
        );
        $this->add_control(
            'loop',
            [
                'label' => esc_html__('Loop', 'libo-master'),
                'type' => Controls_Manager::SWITCHER,
                'description' => esc_html__('you can set yes/no to enable/disable', 'libo-master'),
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
            'nav_slider_position',
            [
                'label' => esc_html__( 'Slider Nav Position', 'libo-master' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => [ 'px', '%' ],
                'range' => [
                    'px' => [
                        'min' => -200,
                        'max' => 500,
                        'step' => 5,
                    ],
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => -120,
                ],
                'selectors' => [
                    '{{WRAPPER}} .blog-slider-controls .slider-nav' => 'bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_control(
            'nav',
            [
                'label' => esc_html__('Nav', 'libo-master'),
                'type' => Controls_Manager::SWITCHER,
                'description' => esc_html__('you can set yes/no to enable/disable', 'libo-master'),
            ]
        );
        $this->add_control(
            'nav_right_arrow',
            [
                'label' => esc_html__('Nav Right Icon', 'libo-master'),
                'type' => Controls_Manager::ICONS,
                'description' => esc_html__('you can set yes/no to enable/disable', 'libo-master'),
                'default' => [
                    'value' => 'fas fa-angle-right',
                    'library' => 'solid',
                ],
            ]
        );
        $this->add_control(
            'nav_left_arrow',
            [
                'label' => esc_html__('Nav Left Icon', 'libo-master'),
                'type' => Controls_Manager::ICONS,
                'description' => esc_html__('you can set yes/no to enable/disable', 'libo-master'),
                'default' => [
                    'value' => 'fas fa-angle-left',
                    'library' => 'solid',
                ],
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
            'title_styling_settings_section',
            [
                'label' => esc_html__('Title Styling Settings', 'libo-master'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->start_controls_tabs(
            'title_style_tabs'
        );

        $this->start_controls_tab(
            'title_style_normal_tab',
            [
                'label' => esc_html__('Normal', 'libo-master'),
            ]
        );
        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'border',
                'label' => esc_html__( 'Border', 'libo-master' ),
                'selector' => '{{WRAPPER}} .single-blog-grid-03',
            ]
        );
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'background',
                'label' => esc_html__( 'Background', 'libo-master' ),
                'types' => [ 'classic', 'gradient', 'video' ],
                'selector' => '{{WRAPPER}} .single-blog-grid-03 .hover-content.bg-style-01',
            ]
        );
        $this->add_control('normal_date_title_color', [
            'label' => esc_html__('Date Title Color', 'libo-master'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .single-blog-grid-03 .news-date .title" => "color: {{VALUE}}",
                "{{WRAPPER}} .single-blog-grid-03 .news-date span" => "color: {{VALUE}}"
            ]
        ]);
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'date_background',
                'label' => esc_html__( 'Date Background', 'libo-master' ),
                'types' => [ 'classic', 'gradient', 'video' ],
                'selector' => '{{WRAPPER}} .single-blog-grid-03 .news-date',
            ]
        );
        $this->add_control('normal_post_title_color', [
            'label' => esc_html__('Title Color', 'libo-master'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .single-blog-grid-03 .content .title" => "color: {{VALUE}}",
                "{{WRAPPER}} .single-blog-grid-03 .hover-content .title" => "color: {{VALUE}}"
            ]
        ]);
        $this->add_control('normal_post_paragraph_color', [
            'label' => esc_html__('Category Color', 'libo-master'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .single-blog-grid-03 .content ul li a" => "color: {{VALUE}}",
                "{{WRAPPER}} .single-blog-grid-03 .content ul li:before" => "color: {{VALUE}}",
                "{{WRAPPER}} .single-blog-grid-03 .content ul li:after" => "color: {{VALUE}}"
            ]
        ]);
        $this->add_control('normal_post_readmore_color', [
            'label' => esc_html__('Read More Color', 'libo-master'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .single-blog-grid-03 .content .read-btn" => "color: {{VALUE}}",
                "{{WRAPPER}} .single-blog-grid-03 .hover-content .read-btn" => "color: {{VALUE}}"
            ]
        ]);
        $this->end_controls_tab();

        $this->start_controls_tab(
            'title_style_hover_tab',
            [
                'label' => esc_html__('Hover', 'libo-master'),
            ]
        );

        $this->add_control('hover_post_title_color', [
            'label' => esc_html__('Title Color', 'libo-master'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .single-blog-grid-03 .hover-content .title:hover" => "color: {{VALUE}}"
            ]
        ]);
        $this->add_control('hover_post_paragraph_color', [
            'label' => esc_html__('Category Color', 'libo-master'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .single-blog-grid-03 .hover-content ul li a:hover" => "color: {{VALUE}}"
            ]
        ]);
        $this->add_control('hover_post_readmore_color', [
            'label' => esc_html__('Read More Color', 'libo-master'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .single-blog-grid-03 .hover-content .read-btn:hover" => "color: {{VALUE}}"
            ]
        ]);
        $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->end_controls_section();

        $this->start_controls_section(
            'slider_navigation_styling_settings_section',
            [
                'label' => esc_html__('Slider Nav Styling Settings', 'libo-master'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->start_controls_tabs(
            'slider_nav_style_tabs'
        );

        $this->start_controls_tab(
            'slider_navigation_style_normal_tab',
            [
                'label' => esc_html__('Normal', 'libo-master'),
            ]
        );
        $this->add_control('normal_nav_color', [
            'label' => esc_html__('Color', 'libo-master'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .blog-slider-controls .slider-nav div" => "color: {{VALUE}}"
            ]
        ]);
        $this->add_group_control(Group_Control_Background::get_type(), [
            'label' => esc_html__('Background', 'libo-master'),
            'name' => 'nav_background',
            'selector' => "{{WRAPPER}} .blog-slider-controls .slider-nav div"
        ]);

        $this->end_controls_tab();

        $this->start_controls_tab(
            'slider_navigation_style_hover_tab',
            [
                'label' => esc_html__('Hover', 'libo-master'),
            ]
        );
        $this->add_control('hover_nav_color', [
            'label' => esc_html__('Color', 'libo-master'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .blog-slider-controls .slider-nav div:hover" => "color: {{VALUE}}"
            ]
        ]);
        $this->add_group_control(Group_Control_Background::get_type(), [
            'label' => esc_html__('Background', 'libo-master'),
            'name' => 'nav_hover_background',
            'selector' => "{{WRAPPER}} .blog-slider-controls .slider-nav div:hover"
        ]);

        $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->end_controls_section();


        $this->start_controls_section(
            'typography_settings_section',
            [
                'label' => esc_html__('Typography Settings', 'libo-master'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_group_control(Group_Control_Typography::get_type(), [
            'label' => esc_html__('Post Meta Typography', 'libo-master'),
            'name' => 'post_meta_typography',
            'description' => esc_html__('select post meta typography', 'libo-master'),
            'selector' => "{{WRAPPER}} .single-blog-grid-03 .content .title"
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
        $rand_numb = rand(333, 999999999);
        //query settings
        $total_posts = $settings['total'];
        $category = $settings['category'];
        $order = $settings['order'];
        $orderby = $settings['orderby'];
        //slider settings
        $slider_settings = [
            "loop" => esc_attr($settings['loop']),
            "margin" => esc_attr($settings['margin']['size'] ?? 0),
            "items" => esc_attr($settings['items'] ?? 1),
            "autoplay" => esc_attr($settings['autoplay']),
            "autoplaytimeout" => esc_attr($settings['autoplaytimeout']['size'] ?? 0),
            "nav" => esc_attr($settings['nav']),
            "navleft" => Libo_master()->render_elementor_icons($settings['nav_left_arrow']),
            "navright" => Libo_master()->render_elementor_icons($settings['nav_right_arrow'])
        ];
        //setup query
        $args = array(
            'post_type' => 'post',
            'posts_per_page' => $total_posts,
            'order' => $order,
            'orderby' => $orderby,
            'post_status' => 'publish',
            'ignore_sticky_posts' => 1,
        );

        if (!empty($category)) {
            $args['tax_query'] = array(
                array(
                    'taxonomy' => 'category',
                    'field' => 'term_id',
                    'terms' => $category
                )
            );
        }
        $post_data = new \WP_Query($args);
        ?>
        <div class="blog-grid-carousel-wrapper libo-rtl-slider">
            <div class="blog-grid-carousel" id="blog-grid-one-carousel-<?php echo esc_attr($rand_numb); ?>"
                 data-settings='<?php echo json_encode($slider_settings) ?>'
            >
                <?php
                while ($post_data->have_posts()):$post_data->the_post();
                    $img_id = get_post_thumbnail_id(get_the_ID()) ? get_post_thumbnail_id(get_the_ID()) : false;
                    $img_url_val = $img_id ? wp_get_attachment_image_src($img_id, 'libo_grid', false) : '';
                    $img_url = is_array($img_url_val) && !empty($img_url_val) ? $img_url_val[0] : '';
                    $img_alt = get_post_meta($img_id, '_wp_attachment_image_alt', true);
                    $comments_count = get_comments_number(get_the_ID());
                    $comment_text = ($comments_count > 1) ? 'Comments (' . $comments_count . ')' : 'Comment (' . $comments_count . ')';
                    $libo = Libo();
                    ?>
                    <div class="blog-outer-wrap">
                        <div class="single-blog-grid-03">
                            <div class="hover-content <?php echo !empty($img_url) ? 'bg-image' : 'bg-style-01' ?>"
                                 style="background-image: url(<?php echo esc_url($img_url) ?>)">
                                <div class="content-wrap">
                                    <?php the_category(); ?>
                                    <h4 class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                                    <a class="read-btn"
                                       href="<?php the_permalink(); ?>"><?php echo esc_html($settings['read-btn']) ?></a>
                                </div>
                            </div>
                            <div class="thumb">
                                <?php
                                if (!empty($img_url)):?>
                                    <img src="<?php echo esc_url($img_url); ?>" alt="<?php echo esc_attr($img_alt); ?>">
                                <?php endif; ?>
                                <div class="news-date <?php echo empty($img_url) ? 'd-none' : '' ?>">
                                    <h5 class="title"><?php echo get_the_date('d') ?></h5>
                                    <span><?php echo get_the_date('M') ?></span>
                                </div>
                            </div>
                            <div class="content">
                                <?php the_category(); ?>
                                <h4 class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                                <a class="read-btn"
                                   href="<?php the_permalink(); ?>"><?php echo esc_html($settings['read-btn']) ?></a>
                            </div>
                        </div>
                    </div>
                <?php
                endwhile;
                wp_reset_query();
                ?>
            </div>
            <?php if (!empty($settings['nav'])) : ?>
                <div class="blog-slider-controls">
                    <div class="slider-nav"></div>
                </div>
            <?php endif; ?>
        </div>
        <?php
    }
}

Plugin::instance()->widgets_manager->register_widget_type(new Libo_Blog_Post_Slider_Three_Widget());