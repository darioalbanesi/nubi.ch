<?php
	$params = array(
		array(
			'type' => 'cms_template_img',
		    'param_name' => 'cms_template',
		    "shortcode" => "cms_fancybox_single",
		    "heading" => esc_html__("Shortcode Template",'wp-trust'),
		    "admin_label" => true,
		    "group" => esc_html__("Template", 'wp-trust'),
		),
		array(
			"type" => "textfield",
			"heading" => esc_html__("Order box",'wp-trust'),
			"param_name" => "cms_fancybox_order_box",
			"value" => "",
			"group" => esc_html__("Template", 'wp-trust'),
			'dependency' => array(
            	"element"=>"cms_template",
            	"value"=>array(
					"cms_fancybox_single.php"
				)
            ),
		),
	);
?>