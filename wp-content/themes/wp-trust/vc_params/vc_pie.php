<?php
/**
 * Add row params
 * 
 * @author Fox
 * @since 1.0.0
 */
vc_remove_param("vc_pie", "color");
vc_add_param("vc_pie", array(
    'type' => 'colorpicker',
    'heading' => esc_html__('Bar color', 'wp-trust'),
    'param_name' => 'color',
    'value' => '#3db3e7', // $pie_colors,
    'description' => esc_html__('Select pie chart color.', 'wp-trust'),
    'admin_label' => true,
    'param_holder_class' => 'vc-colored-dropdown'
));
vc_add_param("vc_pie", array(
    'type' => 'colorpicker',
    'heading' => esc_html__('Value color', 'wp-trust'),
    'param_name' => 'value_color',
    'value' => '#b2b2b2',
    'description' => esc_html__('Select pie chart color.', 'wp-trust'),
    'admin_label' => true
));
vc_add_param("vc_pie", array(
    'type' => 'colorpicker',
    'heading' => esc_html__('Title color', 'wp-trust'),
    'param_name' => 'title_color',
    'value' => '#323232',
    'description' => esc_html__('Select pie chart color.', 'wp-trust'),
    'admin_label' => true
));
vc_remove_param("vc_pie", "units");