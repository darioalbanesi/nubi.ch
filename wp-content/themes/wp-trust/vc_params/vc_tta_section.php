<?php
/**
 * Add row params
 * 
 * @author Trang Bui
 * @since 1.0.0
 */
vc_add_param("vc_tta_section", array(
    'type' => 'dropdown',
    'heading' => esc_html__('Icon library', 'wp-trust'),
    'value' => array(
        __('Font Awesome', 'wp-trust') => 'fontawesome',
        __('Open Iconic', 'wp-trust') => 'openiconic',
        __('Typicons', 'wp-trust') => 'typicons',
        __('Entypo', 'wp-trust') => 'entypo',
        __('Linecons', 'wp-trust') => 'linecons',
        __('RT Icon', 'wp-trust') => 'rticon'
    ),
    'admin_label' => true,
    'param_name' => 'i_type',
    'dependency' => array(
        'element' => 'add_icon',
        'value' => 'true'
    ),
    'description' => esc_html__('Select icon library.', 'wp-trust')
));
vc_add_param("vc_tta_section", array(
    'type' => 'iconpicker',
    'heading' => esc_html__('Icon Item', 'wp-trust'),
    'param_name' => 'i_icon_rticon',
    'value' => '',
    'settings' => array(
        'emptyIcon' => true, // default true, display an "EMPTY" icon?
        'type' => 'rticon',
        'iconsPerPage' => 200
    ) // default 100, how many icons per/page to display
,
    'dependency' => array(
        'element' => 'i_type',
        'value' => 'rticon'
    ),
    'integrated_shortcode' => 'vc_icon',
    'integrated_shortcode_field' => 'i_',
    'description' => esc_html__('Select icon from library.', 'wp-trust')
));
vc_add_param("vc_tta_section", array(
    'type' => 'iconpicker',
    'heading' => esc_html__('Icon Item', 'wp-trust'),
    'param_name' => 'i_icon_glyphicons',
    'value' => '',
    'settings' => array(
        'emptyIcon' => true, // default true, display an "EMPTY" icon?
        'type' => 'glyphicons',
        'iconsPerPage' => 200
    ) // default 100, how many icons per/page to display
,
    'dependency' => array(
        'element' => 'i_type',
        'value' => 'glyphicons'
    ),
    'integrated_shortcode' => 'vc_icon',
    'integrated_shortcode_field' => 'i_',
    'description' => esc_html__('Select icon from library.', 'wp-trust')
));
