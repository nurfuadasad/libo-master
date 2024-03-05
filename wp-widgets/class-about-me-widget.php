<?php
/**
 *  libo about me widget
 * @package Libo
 * @since 1.0.0
 */
if (!defined('ABSPATH')) {
    exit(); //exit if access directly
}
// Control core classes for avoid errors
if (class_exists('CSF')) {

    //
    // Create a About Widget
    //
    CSF::createWidget('libo_about_me_widget', array(
        'title' => esc_html__('Libo: About Me', 'libo-master'),
        'classname' => 'libo-widget-about',
        'description' => esc_html__('Display about me widget', 'libo-master'),
        'fields' => array(
            array(
                'id' => 'image',
                'type' => 'media',
                'title' => esc_html__('Upload Your Photo', 'libo-master'),
            ),
            array(
                'id' => 'heading',
                'type' => 'text',
                'title' => esc_html__('Enter Your Header Title', 'libo-master'),
                'default' => esc_html__('About Me', 'libo-master')
            ),
            array(
                'id' => 'title',
                'type' => 'text',
                'title' => esc_html__('Enter Your Name', 'libo-master'),
                'default' => esc_html__('Rosalina D. Willaimson', 'libo-master')
            ),
            array(
                'id' => 'description',
                'type' => 'textarea',
                'title' => esc_html__('Description', 'Libo-master'),
                'default' => esc_html__('Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore.', 'libo-master')
            ),

            array(
                'id' => 'libo-social-icon-repeater',
                'type' => 'repeater',
                'title' => esc_html__('Social Icon', 'libo-master'),
                'fields' => array(

                    array(
                        'id' => 'libo-social-icon',
                        'type' => 'icon',
                        'title' => esc_html__('Icon', 'libo-master'),
                        'default' => 'flaticon-call'
                    ),
                    array(
                        'id' => 'libo-social-text',
                        'type' => 'text',
                        'title' => esc_html__('Enter Your Ulr', 'libo-master'),
                        'default' => '#'
                    ),

                ),
            ),
        )
    ));

    //
    // Front-end display of widget example 1
    // Attention: This function named considering above widget base id.
    //
    if (!function_exists('libo_about_me_widget')) {
        function libo_about_me_widget($args, $instance)
        {

            echo $args['before_widget'];

            // var_dump( $args ); // Widget arguments
            // var_dump( $instance ); // Saved values from database

            $instance['image'];
            $logo = $instance['image'];
            $img_id = $logo['id'] ?? '';
            $img_print = $img_id ? wp_get_attachment_image_src($img_id)[0] : '';
            $alt_text = get_post_meta($img_id, '_wp_attachment_image_alt', true);
            $title = $instance['title'] ?? '';
            $heading_title = $instance['heading'] ?? '';
            $paragraph = $instance['description'] ?? '';
            $socialIcon = is_array($instance['libo-social-icon-repeater']) && !empty($instance['libo-social-icon-repeater']) ? $instance['libo-social-icon-repeater'] : [];


            ?>
            <div class="about_me_widget">
                <h4 class="widget-title style-01"><?php echo esc_html($heading_title); ?></h4>
                <div class="content">
                    <div class="thumb">
                        <?php
                        if (!empty($img_print)) {
                            printf('<img src="%1$s" alt="%2$s"/>', esc_url($img_print), esc_attr($alt_text));
                        }
                        ?>
                    </div>
                    <?php
                    printf('<h3 class="title">%1$s</h3>', esc_html($title));
                    printf('<p>%1$s</p>', esc_html($paragraph));
                    ?>
                    <ul class="social-link style-02">
                        <?php
                        foreach ($socialIcon as $icon) {
                            printf('<li><a href="%2$s"><i class="%1$s"></i></a></li>', esc_html($icon['libo-social-icon']), esc_url($icon['libo-social-text']));
                        };
                        ?>
                    </ul>
                </div>
            </div>

            <?php

            echo $args['after_widget'];

        }
    }

}

?>