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
    CSF::createWidget('libo_service_doc_widget', array(
        'title' => esc_html__('Libo: Service Document', 'libo-master'),
        'classname' => 'libo-service-doct',
        'description' => esc_html__('Display Service Document widget', 'libo-master'),
        'fields' => array(
            array(
                'id' => 'libo-service-doc-repeater',
                'type' => 'repeater',
                'title' => esc_html__('Document Icon', 'libo-master'),
                'fields' => array(
                    array(
                        'id' => 'libo-doc-icon',
                        'type' => 'icon',
                        'title' => esc_html__('Icon', 'libo-master'),
                        'default' => 'far fa-file-pdf'
                    ),
                    array(
                        'id' => 'libo-doc-text',
                        'type' => 'text',
                        'title' => esc_html__('Enter Your Text', 'libo-master'),
                        'default' => 'Full Documents'
                    ),
                    array(
                        'id' => 'libo-doc-url',
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
    if (!function_exists('libo_service_doc_widget')) {
        function libo_service_doc_widget($args, $instance)
        {

            echo $args['before_widget'];

            // var_dump( $args ); // Widget arguments
            // var_dump( $instance ); // Saved values from database

            $socialIcon = is_array($instance['libo-service-doc-repeater']) && !empty($instance['libo-service-doc-repeater']) ? $instance['libo-service-doc-repeater'] : [];


            ?>
            <div class="service-doc-widget">
                <ul class="doc-link">
                    <?php
                    foreach ($socialIcon as $icon) {
                        printf('<li><a href="%2$s"><i class="%1$s"></i>%3$s</a></li>', esc_html($icon['libo-doc-icon']), esc_url($icon['libo-doc-url']),esc_html($icon['libo-doc-text']));
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