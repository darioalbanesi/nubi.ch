<?php
vc_map(array(
    "name" => 'CMS Heading',
    "base" => "cms_heading",
    "icon" => "cs_icon_for_vc",
    "category" => esc_html__('CmsSuperheroes Shortcodes', 'wp-trust'),
    "params" => array(
        array(
            "type" => "textfield",
            "heading" => __ ( 'Subtitle', 'wp-trust' ),
            "param_name" => "hd_subtitle",
            "value" => '',
            "group" => esc_html__("Heading Settings", 'wp-trust')
        ),

        array(
            "type" => "textfield",
            "heading" => __ ( 'Title', 'wp-trust' ),
            "param_name" => "hd_title",
            "value" => '',
            "group" => esc_html__("Heading Settings", 'wp-trust')
        ),

        array(
            "type" => "textarea",
            "heading" => __ ( 'Description', 'wp-trust' ),
            "param_name" => "hd_description",
            "value" => '',
            "group" => esc_html__("Heading Settings", 'wp-trust')
        ),

        array(
            "type" => "textfield",
            "heading" => __ ( 'View All Text', 'wp-trust' ),
            "param_name" => "hd_view_text",
            "value" => '',
            "group" => esc_html__("Heading Settings", 'wp-trust'),
            'dependency' => array(
                "element"=>"cms_template",
                "value"=>array(
                    "cms_heading.php",
                    "cms_heading--layout2.php"
                )
            ),
        ),

        array(
            "type" => "textfield",
            "heading" => __ ( 'View All Link', 'wp-trust' ),
            "param_name" => "hd_view_link",
            "value" => '',
            "group" => esc_html__("Heading Settings", 'wp-trust'),
            'dependency' => array(
                "element"=>"cms_template",
                "value"=>array(
                    "cms_heading.php",
                    "cms_heading--layout2.php"
                )
            ),
        ),
         
        array(
            'type' => 'cms_template_img',
            'param_name' => 'cms_template',
            "shortcode" => "cms_heading",
            "heading" => esc_html__("Shortcode Template",'wp-trust'),
            "admin_label" => true,
            "group" => esc_html__("Template", 'wp-trust'),
        ),
        array(
            "type" => "colorpicker",
            "heading" => esc_html__("Text Color",'wp-trust'),
            "param_name" => "text_color",
            "value" => "",
            "group" => esc_html__("Template", 'wp-trust')
        ),
        array(
            "type" => "textfield",
            "heading" => __ ( 'Add Custom Class', 'wp-trust' ),
            "param_name" => "custom_class",
            "value" => '',
            "group" => esc_html__("Heading Settings", 'wp-trust'),
        ),
    )
));

class WPBakeryShortCode_cms_heading extends CmsShortCode
{

    protected function content($atts, $content = null)
    {
        return parent::content($atts, $content);
    }
}

?>