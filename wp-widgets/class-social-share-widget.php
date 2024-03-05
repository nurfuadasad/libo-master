<?php
/**
 *  libo Social Share widget
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
    CSF::createWidget('libo_social_share_widget', array(
        'title' => esc_html__('Libo: Social Share', 'libo-master'),
        'classname' => 'libo-social-share-about',
        'description' => esc_html__('Display Social Share widget', 'libo-master'),
        'fields' => array(
            array(
                'id' => 'heading',
                'type' => 'text',
                'title' => esc_html__('Enter Your Header Title', 'libo-master'),
                'default' => esc_html__('Never Miss News', 'libo-master')
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
                        'default' => 'fab fa-facebook'
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
    if (!function_exists('libo_social_share_widget')) {
        function libo_social_share_widget($args, $instance)
        {

            echo $args['before_widget'];

            // var_dump( $args ); // Widget arguments
            // var_dump( $instance ); // Saved values from database

            $heading_title = $instance['heading'] ?? '';
            $socialIcon = is_array($instance['libo-social-icon-repeater']) && !empty($instance['libo-social-icon-repeater']) ? $instance['libo-social-icon-repeater'] : [];


            ?>
            <div class="social-share-widget">
                <h4 class="widget-title style-01"><?php echo esc_html($heading_title); ?></h4>
                <ul class="social-link style-03">
                    <?php
                    foreach ($socialIcon as $icon) {
                        printf('<li><a href="%2$s"><i class="%1$s"></i></a></li>', esc_html($icon['libo-social-icon']), esc_url($icon['libo-social-text']));
                    };
                    ?>
                </ul>
            </div>

            <?php

            echo $args['after_widget'];

        }
    }

}

?>