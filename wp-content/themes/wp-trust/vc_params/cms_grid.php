<?php
	$params = array(
		array(
            "type" => "dropdown",
            "heading" => esc_html__("Show/Hide Navigation", 'wp-trust'),
            "param_name" => "show_hide_navigation",
            "value" => array(
                "Yes" => "yes",
                "No" => "no"                
            ),
            "template" => array(
            	"cms_grid--layout-blog1.php",
            	"cms_grid--layout-attorneys1.php",
            	"cms_grid--layout-attorneys2.php",
            ),
            "group" => esc_html__("Template", 'wp-trust'),
        ),
	);
	vc_remove_param('cms_grid','cms_template');
	$cms_template_attribute = array(
		'type' => 'cms_template_img',
	    'param_name' => 'cms_template',
	    "shortcode" => "cms_grid",
	    "heading" => esc_html__("Shortcode Template",'wp-trust'),
	    "admin_label" => true,
	    "group" => esc_html__("Template", 'wp-trust'),
		);
	vc_add_param('cms_grid',$cms_template_attribute);
?>