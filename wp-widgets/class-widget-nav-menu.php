<?php
/**
 *  libo about us widget
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
    CSF::createWidget('libo_widget_nav_menu', array(
        'title' => esc_html__('Libo: Nav Menu','libo-master'),
        'classname' => 'libo-widget-nav',
        'description' => esc_html__('Display about us widget','libo-master'),
        'fields' => array(
            array(
                'id' => 'title',
                'type' => 'text',
                'title' => esc_html__('Enter Your Header Title', 'libo-master'),
                'default' => esc_html__('About Us', 'libo-master')
            ),

            array(
                'id' => 'libo-footer-menu-repeater',
                'type' => 'repeater',
                'title' => esc_html__('Social Icon', 'libo-master'),
                'fields' => array(

                    array(
                        'id'      => 'libo-footer-social-url',
                        'type'    => 'text',
                        'title' => esc_html__('Enter Your Ulr', 'libo-master'),
                        'default' => '#'
                    ),
                    array(
                        'id' => 'libo-footer-social-text',
                        'type' => 'text',
                        'title' => esc_html__('Your Nav Menu','libo-master'),
                        'default' => esc_html__('Home','libo-master')
                    ),

                ),
            ),
        )
    ));

    //
    // Front-end display of widget example 1
    // Attention: This function named considering above widget base id.
    //
    if (!function_exists('libo_widget_nav_menu')) {
        function libo_widget_nav_menu($args, $instance)
        {

            echo $args['before_widget'];

            // var_dump( $args ); // Widget arguments
            // var_dump( $instance ); // Saved values from database
            $title = $instance['title'];

            $navMenu = $instance['libo-footer-menu-repeater'];

            ?>
            <div class="footer-widget widget widget_nav_menu">
                <h4 class="widget-title"><?php echo $title; ?></h4>
                <ul>
                    <?php
                    foreach ($navMenu as $icon ) {
                        echo '<li><a href="'.$icon['libo-footer-social-url'].'">' . $icon['libo-footer-social-text'] . '</a></li>';
                    };
                    ?>
                    <li><a href="#">Home</a></li>
                </ul>
            </div>
            <?php

            echo $args['after_widget'];

        }
    }

}

?>