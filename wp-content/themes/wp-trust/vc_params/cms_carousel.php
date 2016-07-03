<?php
	$params = array(
		array(
            "type" => "colorpicker",
            "heading" => esc_html__("Description Color",'wp-trust'),
            "param_name" => "description_color",
            "value" => "",
            "group" => esc_html__("Template", 'wp-trust'),
            "template" => array(
            	"cms_carousel--layout-teatimonial3.php",
            ),
        ),
		array(
            "type" => "colorpicker",
            "heading" => esc_html__("Title Color",'wp-trust'),
            "param_name" => "title_color",
            "value" => "",
            "group" => esc_html__("Template", 'wp-trust'),
            "template" => array(
            	"cms_carousel--layout-teatimonial2.php",
            ),
        ),
        array(
            "type" => "dropdown",
            "heading" => esc_html__("Navigation Horizontal Center", 'wp-trust'),
            "param_name" => "navigation_horizontal_center",
            "value" => array(
                "No" => "no",
                "Yes" => "yes"                
            ),
            "template" => array(
                "cms_carousel--layout-client3.php",
            ),
            "group" => esc_html__("Template", 'wp-trust'),
        ),
        array(
            "type" => "dropdown",
            "heading" => esc_html__("Navigation Align", 'wp-trust'),
            "param_name" => "navigation_align",
            "value" => array(
                "Default" => "nav-default",
                "Top Right" => "nav-top-right"                
            ),
            "template" => array(
                "cms_carousel--layout-practice6.php",
                "cms_carousel--layout-client1.php",
                "cms_carousel--layout-client2.php",
                "cms_carousel--layout-client3.php",
            ),
            "group" => esc_html__("Template", 'wp-trust'),
        ),
        
	);
	vc_remove_param('cms_carousel','cms_template');
	$cms_template_attribute = array(
		'type' => 'cms_template_img',
	    'param_name' => 'cms_template',
	    "shortcode" => "cms_carousel",
	    "heading" => esc_html__("Shortcode Template",'wp-trust'),
	    "admin_label" => true,
	    "group" => esc_html__("Template", 'wp-trust'),
		);
	vc_add_param('cms_carousel',$cms_template_attribute);
?>