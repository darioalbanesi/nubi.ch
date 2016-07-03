<?php
vc_map(array(
    "name" => 'CMS Social',
    "base" => "cms_social",
    "icon" => "cs_icon_for_vc",
    "category" => esc_html__('CmsSuperheroes Shortcodes', 'wp-trust'),
    "params" => array(
        array(
                "type" => "textfield",
                "heading" => esc_html__( 'Icon 1', 'wp-trust' ),
                "param_name" => "icon1",
        ),
        array(
                "type" => "textfield",
                "heading" => esc_html__( 'Icon 1 link', 'wp-trust' ),
                "param_name" => "icon1_link",
        ),
        array(
                "type" => "textfield",
                "heading" => esc_html__( 'Icon 2', 'wp-trust' ),
                "param_name" => "icon2",
        ),
        array(
                "type" => "textfield",
                "heading" => esc_html__( 'Icon 2 link', 'wp-trust' ),
                "param_name" => "icon2_link",
        ),
        array(
                "type" => "textfield",
                "heading" => esc_html__( 'Icon 3', 'wp-trust' ),
                "param_name" => "icon3",
        ),
        array(
                "type" => "textfield",
                "heading" => esc_html__( 'Icon 3 link', 'wp-trust' ),
                "param_name" => "icon3_link",
        ),
        array(
                "type" => "textfield",
                "heading" => esc_html__( 'Icon 4', 'wp-trust' ),
                "param_name" => "icon4",
        ),
        array(
                "type" => "textfield",
                "heading" => esc_html__( 'Icon 4 link', 'wp-trust' ),
                "param_name" => "icon4_link",
        ),
        array(
                "type" => "textfield",
                "heading" => esc_html__( 'Icon 5', 'wp-trust' ),
                "param_name" => "icon5",
        ),
        array(
                "type" => "textfield",
                "heading" => esc_html__( 'Icon 5 link', 'wp-trust' ),
                "param_name" => "icon5_link",
        ),
        array(
                "type" => "textfield",
                "heading" => esc_html__( 'Icon 6', 'wp-trust' ),
                "param_name" => "icon6",
        ),
        array(
                "type" => "textfield",
                "heading" => esc_html__( 'Icon 6 link', 'wp-trust' ),
                "param_name" => "icon6_link",
        ),
        array(
                "type" => "textfield",
                "heading" => esc_html__( 'Icon 7', 'wp-trust' ),
                "param_name" => "icon7",
        ),
        array(
                "type" => "textfield",
                "heading" => esc_html__( 'Icon 7 link', 'wp-trust' ),
                "param_name" => "icon7_link",
        ),
        array(
                "type" => "textfield",
                "heading" => esc_html__( 'Icon 8', 'wp-trust' ),
                "param_name" => "icon8",
        ),
        array(
                "type" => "textfield",
                "heading" => esc_html__( 'Icon 8 link', 'wp-trust' ),
                "param_name" => "icon8_link",
        ),
        array(
                "type" => "textfield",
                "heading" => esc_html__( 'Icon 9', 'wp-trust' ),
                "param_name" => "icon9",
        ),
        array(
                "type" => "textfield",
                "heading" => esc_html__( 'Icon 9 link', 'wp-trust' ),
                "param_name" => "icon9_link",
        ),
        array(
                "type" => "textfield",
                "heading" => esc_html__( 'Icon 10', 'wp-trust' ),
                "param_name" => "icon10",
        ),
        array(
                "type" => "textfield",
                "heading" => esc_html__( 'Icon 10 link', 'wp-trust' ),
                "param_name" => "icon10_link",
        ),
        array(
                "type" => "textfield",
                "heading" => esc_html__( 'Icon 11', 'wp-trust' ),
                "param_name" => "icon11",
        ),
        array(
                "type" => "textfield",
                "heading" => esc_html__( 'Icon 11 link', 'wp-trust' ),
                "param_name" => "icon11_link",
        ),
        array(
                "type" => "textfield",
                "heading" => esc_html__( 'Icon 12', 'wp-trust' ),
                "param_name" => "icon12",
        ),
        array(
                "type" => "textfield",
                "heading" => esc_html__( 'Icon 12 link', 'wp-trust' ),
                "param_name" => "icon12_link",
        ),
        array(
                "type" => "textfield",
                "heading" => esc_html__( 'Icon 13', 'wp-trust' ),
                "param_name" => "icon13",
        ),
        array(
                "type" => "textfield",
                "heading" => esc_html__( 'Icon 13 link', 'wp-trust' ),
                "param_name" => "icon13_link",
        )
    )
));

class WPBakeryShortCode_cms_social extends CmsShortCode
{
    protected function content($atts, $content = null)
    {
        return parent::content($atts, $content);
    }
}
?>