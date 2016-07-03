<?php
vc_map(array(
    "name" => 'CMS Call To Action',
    "base" => "cms_cta",
    "icon" => "cs_icon_for_vc",
    "category" => esc_html__('CmsSuperheroes Shortcodes', 'wp-trust'),
    "params" => array(
        array(
            "type" => "textarea",
            "heading" => __ ( 'Call to action text', 'wp-trust' ),
            "param_name" => "cta_text",
            "value" => '',
            "group" => esc_html__("Settings", 'wp-trust')
        ),
        array(
            "type" => "colorpicker",
            "heading" => esc_html__("Call to action text color",'wp-trust'),
            "param_name" => "cta_text_color",
            "value" => "",
            "group" => esc_html__("Settings", 'wp-trust')
        ),
        array(
            "type" => "textfield",
            "heading" => __ ( 'Text on the button', 'wp-trust' ),
            "param_name" => "button_text",
            "value" => 'button',
            "group" => esc_html__("Settings", 'wp-trust')
        ),
        array(
            "type" => "textfield",
            "class" => "",
            "heading" => esc_html__("Link button", 'wp-trust'),
            "param_name" => "link_button",
            "value" => '',
            "group" => esc_html__("Settings", 'wp-trust')
        ),
        /* Start Icon */
        array(
            'type' => 'dropdown',
            'heading' => esc_html__( 'Icon library', 'wp-trust' ),
            'value' => array(
                esc_html__( 'Font Awesome', 'wp-trust' ) => 'fontawesome',
                esc_html__( 'Open Iconic', 'wp-trust' ) => 'openiconic',
                esc_html__( 'Typicons', 'wp-trust' ) => 'typicons',
                esc_html__( 'Entypo', 'wp-trust' ) => 'entypo',
                esc_html__( 'Linecons', 'wp-trust' ) => 'linecons',
                esc_html__( 'Pixel', 'wp-trust' ) => 'pixelicons',
                esc_html__( 'P7 Stroke', 'wp-trust' ) => 'pe7stroke',
                esc_html__( 'RT Icon', 'wp-trust' ) => 'rticon',
            ),
            'param_name' => 'icon_type',
            'description' => esc_html__( 'Select icon library.', 'wp-trust' ),
            "group" => esc_html__("Settings", 'wp-trust'),
        ),
        array(
            'type' => 'iconpicker',
            'heading' => esc_html__( 'Icon Item', 'wp-trust' ),
            'param_name' => 'icon_fontawesome',
            'value' => '',
            'settings' => array(
                'emptyIcon' => true, // default true, display an "EMPTY" icon?
                'type' => 'fontawesome',
                'iconsPerPage' => 200, // default 100, how many icons per/page to display
            ),
            'dependency' => array(
                'element' => 'icon_type',
                'value' => 'fontawesome',
            ),
            'description' => esc_html__( 'Select icon from library.', 'wp-trust' ),
            "group" => esc_html__("Settings", 'wp-trust'),
        ),
        array(
            'type' => 'iconpicker',
            'heading' => esc_html__( 'Icon Item', 'wp-trust' ),
            'param_name' => 'icon_openiconic',
            'value' => '',
            'settings' => array(
                'emptyIcon' => true, // default true, display an "EMPTY" icon?
                'type' => 'openiconic',
                'iconsPerPage' => 200, // default 100, how many icons per/page to display
            ),
            'dependency' => array(
                'element' => 'icon_type',
                'value' => 'openiconic',
            ),
            'description' => esc_html__( 'Select icon from library.', 'wp-trust' ),
            "group" => esc_html__("Settings", 'wp-trust'),
        ),
        array(
            'type' => 'iconpicker',
            'heading' => esc_html__( 'Icon Item', 'wp-trust' ),
            'param_name' => 'icon_typicons',
            'value' => '',
            'settings' => array(
                'emptyIcon' => true, // default true, display an "EMPTY" icon?
                'type' => 'typicons',
                'iconsPerPage' => 200, // default 100, how many icons per/page to display
            ),
            'dependency' => array(
                'element' => 'icon_type',
                'value' => 'typicons',
            ),
            'description' => esc_html__( 'Select icon from library.', 'wp-trust' ),
            "group" => esc_html__("Settings", 'wp-trust'),
        ),
        array(
            'type' => 'iconpicker',
            'heading' => esc_html__( 'Icon Item', 'wp-trust' ),
            'param_name' => 'icon_entypo',
            'value' => '',
            'settings' => array(
                'emptyIcon' => true, // default true, display an "EMPTY" icon?
                'type' => 'entypo',
                'iconsPerPage' => 200, // default 100, how many icons per/page to display
            ),
            'dependency' => array(
                'element' => 'icon_type',
                'value' => 'entypo',
            ),
            'description' => esc_html__( 'Select icon from library.', 'wp-trust' ),
            "group" => esc_html__("Settings", 'wp-trust'),
        ),
        array(
            'type' => 'iconpicker',
            'heading' => esc_html__( 'Icon Item', 'wp-trust' ),
            'param_name' => 'icon_linecons',
            'value' => '',
            'settings' => array(
                'emptyIcon' => true, // default true, display an "EMPTY" icon?
                'type' => 'linecons',
                'iconsPerPage' => 200, // default 100, how many icons per/page to display
            ),
            'dependency' => array(
                'element' => 'icon_type',
                'value' => 'linecons',
            ),
            'description' => esc_html__( 'Select icon from library.', 'wp-trust' ),
            "group" => esc_html__("Settings", 'wp-trust'),
        ),
        array(
            'type' => 'iconpicker',
            'heading' => esc_html__( 'Icon Item', 'wp-trust' ),
            'param_name' => 'icon_pixelicons',
            'value' => '',
            'settings' => array(
                'emptyIcon' => true, // default true, display an "EMPTY" icon?
                'type' => 'pixelicons',
                'iconsPerPage' => 200, // default 100, how many icons per/page to display
            ),
            'dependency' => array(
                'element' => 'icon_type',
                'value' => 'pixelicons',
            ),
            'description' => esc_html__( 'Select icon from library.', 'wp-trust' ),
            "group" => esc_html__("Settings", 'wp-trust'),
        ),
        array(
            'type' => 'iconpicker',
            'heading' => esc_html__( 'Icon Item', 'wp-trust' ),
            'param_name' => 'icon_pe7stroke',
            'value' => '',
            'settings' => array(
                'emptyIcon' => true, // default true, display an "EMPTY" icon?
                'type' => 'pe7stroke',
                'iconsPerPage' => 200, // default 100, how many icons per/page to display
            ),
            'dependency' => array(
                'element' => 'icon_type',
                'value' => 'pe7stroke',
            ),
            'description' => esc_html__( 'Select icon from library.', 'wp-trust' ),
            "group" => esc_html__("Settings", 'wp-trust'),
        ),
        array(
            'type' => 'iconpicker',
            'heading' => esc_html__( 'Icon Item', 'wp-trust' ),
            'param_name' => 'icon_rticon',
            'value' => '',
            'settings' => array(
                'emptyIcon' => true, // default true, display an "EMPTY" icon?
                'type' => 'rticon',
                'iconsPerPage' => 200, // default 100, how many icons per/page to display
            ),
            'dependency' => array(
                'element' => 'icon_type',
                'value' => 'rticon',
            ),
            'description' => esc_html__( 'Select icon from library.', 'wp-trust' ),
            "group" => esc_html__("Settings", 'wp-trust'),
        ),
        /* End Icon */
        array(
            "type" => "dropdown",
            "class" => "",
            "heading" => esc_html__("Icon Align", 'wp-trust'),
            "admin_label" => true,
            "param_name" => "icon_align",
            "value" => array(
                "Left" => "left",
                "Right" => "right"
            ),
            "group" => esc_html__("Settings", 'wp-trust'),
        ),
        array(    
            'type' => 'dropdown',
            'heading' => esc_html__("Button Style", 'wp-trust'),
            'param_name' => 'button_style',
            'value' => array(
                'Theme Default' => 'btn-default',    
                'Button Primary Color' => 'btn-primary',
                'Button Secondary Color' => 'btn-secondary',             
                'Button Default Alt' => 'btn-default-alt',        
            ),
            "group" => esc_html__("Settings", 'wp-trust'),
        ),  
        array(    
            'type' => 'dropdown',
            'heading' => esc_html__("Button Size", 'wp-trust'),
            'param_name' => 'button_size',
            'value' => array(
                'Default' => 'size-default',        
                'Large' => 'btn-lg',        
                'Medium' => 'btn-md',        
                'Mini' => 'btn-xs',        
            ),
            "group" => esc_html__("Settings", 'wp-trust'),
        ),  
        array(    
            'type' => 'dropdown',
            'heading' => esc_html__("Button Duplicated", 'wp-trust'),
            'param_name' => 'button_duplicated',
            'value' => array(
                'No' => 'no',        
                'Yes' => 'yes',      
            ),
            "group" => esc_html__("Settings", 'wp-trust'),
        ),  
        array(    
            'type' => 'dropdown',
            'heading' => esc_html__("Button Align", 'wp-trust'),
            'param_name' => 'button_align',
            'value' => array(
                'Right' => 'cta-right',   
                'Left' => 'cta-left',        
                'Bottom' => 'cta-bottom',        
                   
            ),
            "group" => esc_html__("Settings", 'wp-trust'),
        ),  
        array(
            "type" => "textfield",
            "heading" => __ ( 'Text on the button', 'wp-trust' ),
            "param_name" => "button_text_duplicated",
            "value" => '',
            "group" => esc_html__("Button Duplicated", 'wp-trust'),
            'dependency' => array(
                "element"=>"button_duplicated",
                "value"=>array(
                    "yes"
                )
            ),
        ),
        array(
            "type" => "textfield",
            "class" => "",
            "heading" => esc_html__("Link button", 'wp-trust'),
            "param_name" => "link_button_duplicated",
            "value" => '',
            "group" => esc_html__("Button Duplicated", 'wp-trust'),
            'dependency' => array(
                "element"=>"button_duplicated",
                "value"=>array(
                    "yes"
                )
            ),
        ),
        array(    
            'type' => 'dropdown',
            'heading' => esc_html__("Button Style", 'wp-trust'),
            'param_name' => 'button_style_duplicated',
            'value' => array(
                'Theme Default' => 'btn-default',    
                'Button Primary Color' => 'btn-primary',
                'Button Secondary Color' => 'btn-secondary',             
                'Button Default Alt' => 'btn-default-alt',        
            ),
            "group" => esc_html__("Button Duplicated", 'wp-trust'),
            'dependency' => array(
                "element"=>"button_duplicated",
                "value"=>array(
                    "yes"
                )
            ),
        ),  
        array(
            "type" => "textfield",
            "heading" => __ ( "Extra class name", 'wp-trust' ),
            "param_name" => "el_class",
            "description" => __ ( "If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", 'wp-trust' ),
            "group" => esc_html__("Settings", 'wp-trust'),
        ), 
    )
));

class WPBakeryShortCode_cms_cta extends CmsShortCode
{

    protected function content($atts, $content = null)
    {
        return parent::content($atts, $content);
    }
}

?>