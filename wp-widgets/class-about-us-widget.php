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
    CSF::createWidget('libo_about_widget', array(
        'title' => esc_html__('Libo: About Us','libo-master'),
        'classname' => 'libo-widget-about',
        'description' => esc_html__('Display about us widget','libo-master'),
        'fields' => array(
            array(
                'id' => 'logo-area',
                'type' => 'media',
                'title' => esc_html__('Upload Your Photo', 'libo-master'),
            ),
            array(
                'id' => 'description',
                'type' => 'textarea',
                'title' => esc_html__('Description', 'Libo-master'),
                'default' => esc_html__('Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore.', 'libo-master')
            ),

            array(
                'id' => 'libo-footer-social-icon-repeater',
                'type' => 'repeater',
                'title' => esc_html__('Social Icon', 'libo-master'),
                'fields' => array(

                    array(
                        'id' => 'libo-footer-social-icon',
                        'type' => 'icon',
                        'title' => esc_html__('Icon', 'libo-master'),
                        'default' => 'flaticon-call'
                    ),
                    array(
                        'id' => 'libo-footer-social-text',
                        'type' => 'text',
                        'title' => esc_html__('Enter Your Phone', 'libo-master'),
                        'default' => esc_html__('+3 123 456 789','libo-master')
                    ),

                ),
            ),
        )
    ));

    //
    // Front-end display of widget example 1
    // Attention: This function named considering above widget base id.
    //
    if (!function_exists('libo_about_widget')) {
        function libo_about_widget($args, $instance)
        {

            echo $args['before_widget'];

            // var_dump( $args ); // Widget arguments
            // var_dump( $instance ); // Saved values from database

            $instance['logo-area'];
            $logo = $instance['logo-area'];
            $img_id = $logo['id'] ?? '';
            $img_print = $img_id ? wp_get_attachment_image_src($img_id)[0] : '';
            $alt_text = get_post_meta($img_id, '_wp_attachment_image_alt', true);
            $paragraph = $instance['description'] ?? '';
            $socialIcon = is_array($instance['libo-footer-social-icon-repeater']) && !empty($instance['libo-footer-social-icon-repeater']) ? $instance['libo-footer-social-icon-repeater'] : [];


            ?>
            <div class="footer-widget widget">
                <div class="about_us_widget style-01">
                    <a href="<?php echo get_home_url(); ?>" class="footer-logo"><?php
                        if (!empty($img_print)) {
                            printf('<img src="%1$s" alt="%2$s"/>', esc_url($img_print), esc_attr($alt_text));
                        }
                        ?></a>
                    <p> <?php echo $paragraph; ?></p>
                    <ul class="contact_info_list">
                        <?php
                        foreach ($socialIcon as $icon) {
                            echo '<li class="single-info-item">
                            <div class="icon">
                                <i class="' . $icon['libo-footer-social-icon'] . '"></i>
                            </div>
                            <div class="details">' . $icon['libo-footer-social-text'] . '
                            </div>
                        </li>';
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