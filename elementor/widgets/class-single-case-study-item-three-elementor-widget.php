<?php
/**
 * Elementor Widget
 * @package Libo
 * @since 1.0.0
 */

namespace Elementor;
class Libo_Single_Case_Study_Three_Widget extends Widget_Base
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
        return 'libo-single-case-three-study-widget';
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
        return esc_html__('Case Study Item : 03', 'libo-master');
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
        $this->add_control(
            'pagination',
            [
                'label' => esc_html__('Pagination', 'libo-master'),
                'type' => Controls_Manager::SWITCHER,
                'description' => esc_html__('you can set yes to show pagination.', 'libo-master'),
                'default' => 'yes'
            ]
        );
        $this->add_control(
            'pagination_alignment',
            [
                'label' => esc_html__('Pagination Alignment', 'libo-master'),
                'type' => Controls_Manager::SELECT,
                'options' => array(
                    'left' => esc_html__('Left Align', 'libo-master'),
                    'center' => esc_html__('Center Align', 'libo-master'),
                    'right' => esc_html__('Right Align', 'libo-master'),
                ),
                'description' => esc_html__('you can set pagination alignment.', 'libo-master'),
                'default' => 'left',
                'condition' => array('pagination' => 'yes')
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
                "{{WRAPPER}} .single-case-study-item-03 .content .title" => "color: {{VALUE}}"
            ]
        ]);

        $this->add_control('cat_color', [
            'label' => esc_html__('Description Color', 'libo-master'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .single-case-study-item-03 .content p" => "color: {{VALUE}}"
            ]
        ]);
        $this->add_control('hover_styling_settings', [
            'type' => Controls_Manager::DIVIDER
        ]);
        $this->add_control('read_color', [
            'label' => esc_html__('Read More Color', 'libo-master'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .single-case-study-item-03 .content .btn-wrapper .read-btn" => "color: {{VALUE}}"
            ]
        ]);
        $this->add_control('read_bg_color', [
            'label' => esc_html__('Read More Background Color', 'libo-master'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .single-case-study-item-03 .content .btn-wrapper .read-btn" => "background-color: {{VALUE}}"
            ]
        ]);
        $this->add_control('hover_read_color', [
            'label' => esc_html__('Read More Hover Color', 'libo-master'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .single-case-study-item-03 .content .btn-wrapper .read-btn:hover" => "color: {{VALUE}}"
            ]
        ]);
        $this->add_control('hover_read_bg_color', [
            'label' => esc_html__('Read More Hover Background Color', 'libo-master'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .single-case-study-item-03 .content .btn-wrapper .read-btn:hover" => "background-color: {{VALUE}}"
            ]
        ]);
        $this->add_control('hover_background_color', [
            'label' => esc_html__('Hover Background Color', 'libo-master'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .single-case-study-item-03 .content-wrap:before" => "background-color: {{VALUE}}"
            ]
        ]);
        $this->end_controls_section();
        /* icon hover controls tabs end */
        /*  pagination styling tabs start */
        $this->start_controls_section(
            'pagination_settings_section',
            [
                'label' => esc_html__('Pagination Settings', 'libo-master'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->start_controls_tabs(
            'pagination_style_tabs'
        );

        $this->start_controls_tab(
            'pagination_style_normal_tab',
            [
                'label' => __('Normal', 'libo-master'),
            ]
        );

        $this->add_control('pagination_color', [
            'type' => Controls_Manager::COLOR,
            'label' => esc_html__('Color', 'libo-master'),
            'selectors' => [
                "{{WRAPPER}} .blog-pagination ul li a" => "color: {{VALUE}}",
                "{{WRAPPER}} .blog-pagination ul li span" => "color: {{VALUE}}",
            ]
        ]);
        $this->add_control('pagination_border_color', [
            'type' => Controls_Manager::COLOR,
            'label' => esc_html__('Border Color', 'libo-master'),
            'selectors' => [
                "{{WRAPPER}} .blog-pagination ul li a" => "border-color: {{VALUE}}",
                "{{WRAPPER}} .blog-pagination ul li span" => "border-color: {{VALUE}}",
            ]
        ]);
        $this->add_control('pagination_hr', [
            'type' => Controls_Manager::DIVIDER
        ]);
        $this->add_group_control(Group_Control_Background::get_type(), [
            'name' => 'pagination_background',
            'label' => esc_html__('Background', 'libo-master'),
            'selector' => "{{WRAPPER}} .blog-pagination ul li a, {{WRAPPER}} .blog-pagination ul li span"
        ]);

        $this->end_controls_tab();

        $this->start_controls_tab(
            'pagination_style_hover_tab',
            [
                'label' => __('Hover', 'libo-master'),
            ]
        );
        $this->add_control('pagination_hover_color', [
            'type' => Controls_Manager::COLOR,
            'label' => esc_html__('Color', 'libo-master'),
            'selectors' => [
                "{{WRAPPER}} .blog-pagination ul li a:hover" => "color: {{VALUE}}",
                "{{WRAPPER}} .blog-pagination ul li span.current" => "color: {{VALUE}}",
            ]
        ]);
        $this->add_control('pagination_hover_border_color', [
            'type' => Controls_Manager::COLOR,
            'label' => esc_html__('Border Color', 'appside-master'),
            'selectors' => [
                "{{WRAPPER}} .blog-pagination ul li a:hover" => "border-color: {{VALUE}}",
                "{{WRAPPER}} .blog-pagination ul li span.current" => "border-color: {{VALUE}}",
            ]
        ]);
        $this->add_control('pagination_hover_hr', [
            'type' => Controls_Manager::DIVIDER
        ]);
        $this->add_group_control(Group_Control_Background::get_type(), [
            'name' => 'pagination_hover_background',
            'label' => esc_html__('Background', 'libo-master'),
            'selector' => "{{WRAPPER}} .blog-pagination ul li a:hover, {{WRAPPER}} .blog-pagination ul li span.current"
        ]);


        $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->end_controls_section();
        /*  pagination styling tabs end */

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
            'selector' => "{{WRAPPER}} .single-case-study-item-03 .content .title"
        ]);
        $this->add_group_control(Group_Control_Typography::get_type(), [
            'name' => 'hover_description_typography',
            'label' => esc_html__('Category Typography', 'libo-master'),
            'selector' => "{{WRAPPER}} .single-case-study-item-03 .content p"
        ]);
        $this->add_group_control(Group_Control_Typography::get_type(), [
            'name' => 'hover_read_typography',
            'label' => esc_html__('Read More Typography', 'libo-master'),
            'selector' => "{{WRAPPER}} .single-case-study-item-03 .content .btn-wrapper .read-btn"
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
        $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
//        //other settings
        $pagination = $settings['pagination'] ? false : true;
        $pagination_alignment = $settings['pagination_alignment'];

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
        <ul class="single-case-study-item-list style-01">
            <?php
            while ($post_data->have_posts()):$post_data->the_post();
                $img_id = get_post_thumbnail_id(get_the_ID()) ? get_post_thumbnail_id(get_the_ID()) : false;
                $img_url_val = $img_id ? wp_get_attachment_image_src($img_id, 'libo_grid', false) : '';
                $img_url = is_array($img_url_val) && !empty($img_url_val) ? $img_url_val[0] : '';
                $img_alt = !empty($img_id) ? get_post_meta($img_id, '_wp_attachment_image_alt', true) : '';

                ?>
                <li class="cs-outer-wrap">
                    <div class="single-case-study-item-03 margin-bottom-30">
                        <div class="thumb">
                            <img src="<?php echo esc_url($img_url); ?>" alt="<?php echo esc_url($img_alt); ?>">
                            <div class="content-wrap">
                                <div class="btn-wrapper">
                                    <a class="boxed-btn"
                                       href="<?php the_permalink(); ?>"><?php echo esc_html($settings['readmore_text']) ?>
                                        <i class="fas fa-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="content">
                            <h5 class="title">
                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
                            <?php libo_excerpt($settings['excerpt_length']) ?>
                        </div>
                    </div>
                </li>
            <?php endwhile;
            wp_reset_query();
            ?>
        </ul>
        <div class="row">
            <div class="col-lg-12">
                <div class="blog-pagination text-<?php echo esc_attr($pagination_alignment) ?> margin-top-20">
                    <?php
                    if (!$pagination) {
                        Libo()->post_pagination($post_data);
                    }
                    ?>
                </div>
            </div>
        </div>
        <?php
    }
}

Plugin::instance()->widgets_manager->register_widget_type(new Libo_Single_Case_Study_Three_Widget());