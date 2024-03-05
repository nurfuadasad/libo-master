<?php
/**
 *  libo about me two widget
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
    CSF::createWidget('libo_about_me_two_widget', array(
        'title' => esc_html__('Libo: About Me 02', 'libo-master'),
        'classname' => 'libo-widget-about',
        'description' => esc_html__('Display about me widget', 'libo-master'),
        'fields' => array(
            array(
                'id' => 'image',
                'type' => 'media',
                'title' => esc_html__('Upload Your Photo', 'libo-master'),
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
                'default' => esc_html__('We work with clients to integrate the flow of the customer experi ence across channels (e.g., face-to-face, telephone), opening up new lead sources, supporting sales for smaller-value transactions,and creating new models for service. We continuously new practical.', 'libo-master')
            ),
            array(
                'id' => 'designation',
                'type' => 'textarea',
                'title' => esc_html__('Designation', 'Libo-master'),
                'default' => esc_html__('Founder, Cixix Co.', 'libo-master')
            ),
        )
    ));

    //
    // Front-end display of widget example 1
    // Attention: This function named considering above widget base id.
    //
    if (!function_exists('libo_about_me_two_widget')) {
        function libo_about_me_two_widget($args, $instance)
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
            $paragraph = $instance['description'] ?? '';
            $designation = $instance['designation'] ?? '';


            ?>
            <div class="about_me_two_widget">
                <p><?php echo esc_html($paragraph); ?></p>
                <div class="content-wrap">
                    <div class="thumb">
                        <?php
                        if (!empty($img_print)) {
                            printf('<img src="%1$s" alt="%2$s"/>', esc_url($img_print), esc_attr($alt_text));
                        }
                        ?>
                    </div>
                    <div class="content">
                        <?php
                        printf('<h3 class="title">%1$s</h3>', esc_html($title));
                        printf('<span class="designation">%1$s</span>', esc_html($designation));
                        ?>
                    </div>
                </div>
            </div>

            <?php

            echo $args['after_widget'];

        }
    }

}

?>