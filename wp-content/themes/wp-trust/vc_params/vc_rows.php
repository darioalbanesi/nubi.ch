<?php
/**
 * Add row params
 * 
 * @author Fox
 * @since 1.0.0
 */
vc_add_param('vc_row', array(
    'type' => 'dropdown',
    'heading' => esc_html__("Background Image Fixed", 'wp-trust'),
    'param_name' => 'background_image_fixed',
    'value' => array(
        'No' => '',
        'Yes' => 'yes'
    ),
    'group' => 'CMS Customs'
));
vc_add_param('vc_row', array(
    'type' => 'dropdown',
    'heading' => esc_html__("Background Overlay Color", 'wp-trust'),
    'param_name' => 'background_overlay_color',
    'value' => array(
        'No' => '',
        'Yes' => 'yes'
    ),
    'group' => 'CMS Customs'
));
vc_add_param("vc_row", array(
    "type" => "colorpicker",
    "class" => "",
    "heading" => esc_html__('Select Color', 'wp-trust'),
    "param_name" => "row_overlay_color",
    'group' => 'CMS Customs',
    "dependency" => array(
        "element" => "background_overlay_color",
        "value" => array(
            "yes"
        )
    ),
    "description" => ''
));
vc_add_param('vc_row', array(
    'type' => 'dropdown',
    'heading' => esc_html__("Column Same Height", 'wp-trust'),
    'param_name' => 'column_same_height',
    'value' => array(
        'No' => '',
        'Yes' => 'yes'
    ),
    'group' => 'CMS Customs'
));
vc_add_param('vc_row', array(
    'type' => 'dropdown',
    'heading' => esc_html__("Column No Padding", 'wp-trust'),
    'param_name' => 'column_no_padding',
    'value' => array(
        'No' => '',
        'Yes' => 'yes'
    ),
    'group' => 'CMS Customs'
));
vc_add_param('vc_row_inner', array(
    'type' => 'dropdown',
    'heading' => esc_html__("Column No Padding", 'wp-trust'),
    'param_name' => 'column_no_padding',
    'value' => array(
        'No' => '',
        'Yes' => 'yes'
    ),
    'group' => 'CMS Customs'
));
vc_add_param("vc_row", array(
    "type" => "dropdown",
    "class" => "",
    "heading" => esc_html__("Custom Responsive", 'wp-trust'),
    "admin_label" => true,
    "param_name" => "custom_responsive",
    "value" => array(
        "Default VC" => "column-default",
        "Small 1 Column" => "small-1-column",
        "Small 2 Column" => "small-2-column",
        "Small 3 Column" => "small-3-column"
    ),
    'group' => 'CMS Customs'
));
vc_add_param("vc_row_inner", array(
    "type" => "dropdown",
    "class" => "",
    "heading" => esc_html__("Custom Responsive", 'wp-trust'),
    "admin_label" => true,
    "param_name" => "custom_responsive",
    "value" => array(
        "Default VC" => "column-default",
        "Small 1 Column" => "small-1-column",
        "Small 2 Column" => "small-2-column",
        "Small 3 Column" => "small-3-column"
    ),
    'group' => 'CMS Customs'
));
vc_add_param("vc_row", array(
    'type' => 'attach_image',
    'heading' => esc_html__('Custom Row Background Image', 'wp-trust'),
    'param_name' => 'custom_row_image',
    'value' => '',
    'description' => esc_html__('Select image from media library.', 'wp-trust'),
    'group' => 'CMS Customs'
));
vc_add_param('vc_row', array(
    'type' => 'dropdown',
    'heading' => esc_html__("Custom Row Background Image - Position Right (Default Left)", 'wp-trust'),
    'param_name' => 'custom_row_image_right',
    'value' => array(
        'No' => '',
        'Yes' => 'yes'
    ),
    'group' => 'CMS Customs'
));
vc_add_param("vc_row", array(
    "type" => "textfield",
    "heading" => esc_html__("Offset", 'wp-trust'),
    "param_name" => "data_offset",
    "description" => esc_html__("Offset for Onepage", 'wp-trust'),
    'group' => 'CMS Customs'
));