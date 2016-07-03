<?php
global $wp_trust_base;

/**
 * Home Options
 * 
 * @author Fox
 */


/**
 * Header Options
 * 
 * @author Fox
 */
$this->sections[] = array(
    'title' => esc_html__('Header', 'wp-trust'),
    'icon' => 'el-icon-credit-card',
    'fields' => array(
        array(
            'id' => 'header_layout',
            'title' => esc_html__('Layouts', 'wp-trust'),
            'subtitle' => esc_html__('Select a layout for header', 'wp-trust'),
            'default' => '2',
            'type' => 'image_select',
            'options' => array(
                '1' => get_template_directory_uri().'/inc/options/images/header/header1.png',
                '2' => get_template_directory_uri().'/inc/options/images/header/header2.png',
                '3' => get_template_directory_uri().'/inc/options/images/header/header3.png',
                '4' => get_template_directory_uri().'/inc/options/images/header/header4.png',
                '5' => get_template_directory_uri().'/inc/options/images/header/header5.png',
                '6' => get_template_directory_uri().'/inc/options/images/header/header6.png',
                '7' => get_template_directory_uri().'/inc/options/images/header/header7.png',
                '8' => get_template_directory_uri().'/inc/options/images/header/header8.png',
                '9' => get_template_directory_uri().'/inc/options/images/header/header9.png',
                '10' => get_template_directory_uri().'/inc/options/images/header/header10.png',
                '11' => get_template_directory_uri().'/inc/options/images/header/header11.png',
                '12' => get_template_directory_uri().'/inc/options/images/header/header12.png',
                '13' => get_template_directory_uri().'/inc/options/images/header/header13.png',
                '14' => get_template_directory_uri().'/inc/options/images/header/header14.png',
            )
        ),
        array(
            'subtitle' => esc_html__('Enable header sticky.', 'wp-trust'),
            'id' => 'menu_sticky',
            'type' => 'switch',
            'title' => esc_html__('Header Sticky', 'wp-trust'),
            'default' => false,
        ),
        array(
            'id' => 'show_search_icon',
            'type' => 'switch',
            'title' => esc_html__('Show Search Icon', 'wp-experts'),
            'default' => true,
        ),
        array(
            'id' => 'show_cart_icon',
            'type' => 'switch',
            'title' => esc_html__('Show Cart Icon', 'wp-experts'),
            'default' => true,
        ),
        array(
            'subtitle' => esc_html__('', 'wp-trust'),
            'id' => 'menu_no_dropdown',
            'type' => 'switch',
            'title' => esc_html__('Mobile Menu No Dropdown', 'wp-trust'),
            'default' => false,
        ),
    )
);

/* Logo */
$this->sections[] = array(
    'title' => esc_html__('Logo', 'wp-trust'),
    'icon' => 'el-icon-picture',
    'subsection' => true,
    'fields' => array(
        array(
            'title' => esc_html__('Logo', 'wp-trust'),
            'subtitle' => esc_html__('Select an image file for your logo.', 'wp-trust'),
            'id' => 'main_logo',
            'type' => 'media',
            'url' => true,
            'default' => array(
                'url'=>get_template_directory_uri().'/assets/images/logo.png'
            )
        ),
        array(
            'subtitle' => esc_html__('in pixels.', 'wp-trust'),
            'id' => 'main_logo_height',
            'title' => 'Logo Height',
            'type' => 'dimensions',
            'units' => array( 'px' ), 
            'width' => false,
            'output' => array('#cshero-header-inner #cshero-header #cshero-header-logo a img'),
            'default' => array(
                'height' => '',
            )
        ),
        array(
            'subtitle' => esc_html__('in pixels.', 'wp-trust'),
            'id' => 'sticky_logo_height',
            'title' => 'Sticky Logo Height',
            'type' => 'dimensions',
            'units' => array( 'px' ), 
            'width' => false,
            'output' => array('#cshero-header-inner #cshero-header.header-fixed #cshero-header-logo a img'),
            'default' => array(
                'height' => '',
            )
        ),
    )
);

$this->sections[] = array(
    'title' => esc_html__('Favicon Icon', 'wp-trust'),
    'icon' => 'el-icon-star',
    'subsection' => true,
    'fields' => array(
        array(
            'title' => esc_html__('Icon', 'wp-trust'),
            'subtitle' => esc_html__('Select a favicon icon (.png, .jpg).', 'wp-trust'),
            'id' => 'favicon_icon',
            'type' => 'media',
            'url' => true,
            'default' => array(
                'url'=>get_template_directory_uri().'/assets/images/favicon.png'
            )
        ),
    )
);

/**
 * Page Title Options
 * 
 * @author Fox
 */
$this->sections[] = array(
    'title' => esc_html__('Page Title', 'wp-trust'),
    'icon' => 'el el-map-marker',
    'fields' => array(
        array(
            'id' => 'page_title_layout',
            'title' => esc_html__('Layouts', 'wp-trust'),
            'subtitle' => esc_html__('Select a layout for page title', 'wp-trust'),
            'default' => '1',
            'type' => 'image_select',
            'options' => array(
                '' => get_template_directory_uri().'/inc/options/images/pagetitle/p0.png',
                '1' => get_template_directory_uri().'/inc/options/images/pagetitle/p1.jpg',
                '2' => get_template_directory_uri().'/inc/options/images/pagetitle/p2.jpg',
                '3' => get_template_directory_uri().'/inc/options/images/pagetitle/p3.jpg',
                '4' => get_template_directory_uri().'/inc/options/images/pagetitle/p4.jpg',
                '5' => get_template_directory_uri().'/inc/options/images/pagetitle/p5.jpg',
                '6' => get_template_directory_uri().'/inc/options/images/pagetitle/p6.jpg',
                '7' => get_template_directory_uri().'/inc/options/images/pagetitle/p7.jpg',
                '8' => get_template_directory_uri().'/inc/options/images/pagetitle/p8.jpg',
            )
        ),
        array(
            'title' => esc_html__('Select Background Image', 'wp-trust'),
            'subtitle' => esc_html__('Select an image file for background page title.', 'wp-trust'),
            'id' => 'bg_image_page_title',
            'type' => 'media',
            'url' => true,
            'default' => array(
                'url'=>get_template_directory_uri().'/assets/images/bg-page-title.jpg'
            )
        ),
    )
);

/**
 * Body
 *
 * @author Fox
 */
$this->sections[] = array(
    'title' => esc_html__('Body', 'wp-trust'),
    'icon' => 'el-icon-website',
    'fields' => array(
        array(
            'subtitle' => esc_html__('Set layout boxed default(Wide).', 'wp-trust'),
            'id' => 'body_layout',
            'type' => 'switch',
            'title' => esc_html__('Boxed Layout', 'wp-trust'),
            'default' => false,
        ),
        array(
            'id'       => 'body_background',
            'type'     => 'background',
            'title'    => esc_html__( 'Background', 'wp-trust' ),
            'subtitle' => esc_html__( 'body background with image, color, etc.', 'wp-trust' ),
            'output'   => array('body'),
        ),
    )
);

/**
 * Page Loadding
 * 
 * 
 * @author Fox
 */
$this->sections[] = array(
    'title' => esc_html__('Page Loadding', 'wp-trust'),
    'icon' => 'el-icon-compass',
    'subsection' => true,
    'fields' => array(
        array(
            'subtitle' => esc_html__('Enable page loadding.', 'wp-trust'),
            'id' => 'enable_page_loadding',
            'type' => 'switch',
            'title' => esc_html__('Enable Page Loadding', 'wp-trust'),
            'default' => false,
        ),
    )
);


/**
 * Footer
 *
 * @author Fox
 */
$this->sections[] = array(
    'title' => esc_html__('Footer', 'wp-trust'),
    'icon' => 'el-icon-credit-card',
    'fields' => array(
        array(
            'id' => 'footer_layout',
            'title' => esc_html__('Layouts', 'wp-trust'),
            'subtitle' => esc_html__('Select a layout for footer', 'wp-trust'),
            'default' => '1',
            'type' => 'image_select',
            'options' => array(
                '1' => get_template_directory_uri().'/inc/options/images/footer/footer1.jpg',
                '2' => get_template_directory_uri().'/inc/options/images/footer/footer2.jpg',
                '3' => get_template_directory_uri().'/inc/options/images/footer/footer3.jpg',
                '4' => get_template_directory_uri().'/inc/options/images/footer/footer4.jpg',
                '5' => get_template_directory_uri().'/inc/options/images/footer/footer5.jpg',
                '6' => get_template_directory_uri().'/inc/options/images/footer/footer6.jpg',
                '7' => get_template_directory_uri().'/inc/options/images/footer/footer7.jpg',
                '8' => get_template_directory_uri().'/inc/options/images/footer/footer8.jpg',
                '9' => get_template_directory_uri().'/inc/options/images/footer/footer9.jpg',
            )
        ),
        array(
            'subtitle' => esc_html__('Enable button back to top.', 'wp-trust'),
            'id' => 'footer_botton_back_to_top',
            'type' => 'switch',
            'title' => esc_html__('Back To Top', 'wp-trust'),
            'default' => false,
        )
    )
);

/**
 * Styling
 * 
 * css color.
 * @author Fox
 */
$this->sections[] = array(
    'title' => esc_html__('Styling', 'wp-trust'),
    'icon' => 'el-icon-adjust',
    'fields' => array(
        array(
            'subtitle' => esc_html__('Set color primary color.', 'wp-trust'),
            'id' => 'primary_color',
            'type' => 'color',
            'title' => esc_html__('Primary Color', 'wp-trust'),
            'default' => '#d5aa6d'
        ),
        array(
            'subtitle' => esc_html__('Set color secondary color.', 'wp-trust'),
            'id' => 'secondary_color',
            'type' => 'color',
            'title' => esc_html__('Secondary Color', 'wp-trust'),
            'default' => '#333333'
        ),
        array(
            'subtitle' => esc_html__('Set color for tags <a></a>.', 'wp-trust'),
            'id' => 'link_color',
            'type' => 'color',
            'title' => esc_html__('Link Color', 'wp-trust'),
            'output'  => array('a'),
            'default' => '#333333'
        ),
        array(
            'subtitle' => esc_html__('Set color for tags <a></a>.', 'wp-trust'),
            'id' => 'link_color_hover',
            'type' => 'color',
            'title' => esc_html__('Link Color Hover', 'wp-trust'),
            'output'  => array('a:hover'),
            'default' => '#d5aa6d'
        )
    )
);

/**
 * Typography
 * 
 * @author Fox
 */
$this->sections[] = array(
    'title' => esc_html__('Typography', 'wp-trust'),
    'icon' => 'el-icon-text-width',
    'subsection' => false,
    'fields' => array(
        array(
            'id' => 'font_body',
            'type' => 'typography',
            'title' => esc_html__('Body Font', 'wp-trust'),
            'google' => true,
            'font-backup' => true,
            'all_styles' => true,
            'output' => array(
                'body'
            ),
            'units' => 'px',
            'default' => array(
                'color' => '#9b9b9b',
                'font-style' => 'normal',
                'font-weight' => '400',
                'font-family' => 'Open Sans',
                'google' => true,
                'font-size' => '13px',
                'line-height' => '22px',
                'text-align' => ''
            ),
            'subtitle' => esc_html__('Typography option with each property can be called individually.', 'wp-trust')
        ),
        array(
            'id' => 'font_h1',
            'type' => 'typography',
            'title' => esc_html__('H1', 'wp-trust'),
            'google' => true,
            'font-backup' => true,
            'all_styles' => true,
            'output'  => array('h1'),
            'units' => 'px',
            'default' => array(
                'color' => '#222222',
                'font-style' => 'normal',
                'font-weight' => '700',
                'font-family' => 'Raleway',
                'google' => true,
                'font-size' => '32px',
                'line-height' => '46px',
                'text-align' => ''
            ),
        ),
        array(
            'id' => 'font_h2',
            'type' => 'typography',
            'title' => esc_html__('H2', 'wp-trust'),
            'google' => true,
            'font-backup' => true,
            'all_styles' => true,
            'output'  => array('h2'),
            'units' => 'px',
            'default' => array(
                'color' => '#222222',
                'font-style' => 'normal',
                'font-weight' => '700',
                'font-family' => 'Raleway',
                'google' => true,
                'font-size' => '28px',
                'line-height' => '36px',
                'text-align' => ''
            ),
        ),
        array(
            'id' => 'font_h3',
            'type' => 'typography',
            'title' => esc_html__('H3', 'wp-trust'),
            'google' => true,
            'font-backup' => true,
            'all_styles' => true,
            'output'  => array('h3'),
            'units' => 'px',
            'default' => array(
                'color' => '#222222',
                'font-style' => 'normal',
                'font-weight' => '700',
                'font-family' => 'Raleway',
                'google' => true,
                'font-size' => '25px',
                'line-height' => '30px',
                'text-align' => ''
            ),
        ),
        array(
            'id' => 'font_h4',
            'type' => 'typography',
            'title' => esc_html__('H4', 'wp-trust'),
            'google' => true,
            'font-backup' => true,
            'all_styles' => true,
            'output'  => array('h4'),
            'units' => 'px',
            'default' => array(
                'color' => '#222222',
                'font-style' => 'normal',
                'font-weight' => '700',
                'font-family' => 'Raleway',
                'google' => true,
                'font-size' => '22px',
                'line-height' => '26px',
                'text-align' => ''
            ),
        ),
        array(
            'id' => 'font_h5',
            'type' => 'typography',
            'title' => esc_html__('H5', 'wp-trust'),
            'google' => true,
            'font-backup' => true,
            'all_styles' => true,
            'output'  => array('h5'),
            'units' => 'px',
            'default' => array(
                'color' => '#222222',
                'font-style' => 'normal',
                'font-weight' => '700',
                'font-family' => 'Raleway',
                'google' => true,
                'font-size' => '18px',
                'line-height' => '24px',
                'text-align' => ''
            ),
        ),
        array(
            'id' => 'font_h6',
            'type' => 'typography',
            'title' => esc_html__('H6', 'wp-trust'),
            'google' => true,
            'font-backup' => true,
            'all_styles' => true,
            'output'  => array('h6'),
            'units' => 'px',
            'default' => array(
                'color' => '#222222',
                'font-style' => 'normal',
                'font-weight' => '700',
                'font-family' => 'Raleway',
                'google' => true,
                'font-size' => '14px',
                'line-height' => '18px',
                'text-align' => ''
            ),
        )
    )
);

/* Extra Font */
$this->sections[] = array(
    'title' => esc_html__('Extra Fonts', 'wp-trust'),
    'icon' => 'el el-fontsize',
    'subsection' => true,
    'fields' => array(
        array(
            'id' => 'google-font-1',
            'type' => 'typography',
            'title' => esc_html__('Font 1', 'wp-trust'),
            'google' => true,
            'font-backup' => false,
            'font-style' => true,
            'color' => false,
            'text-align'=> false,
            'line-height'=>false,
            'font-size'=> false,
            'subsets'=> false,
            'default' => array(
                'font-weight' => '700',
                'font-family' => 'Dosis'
            )
        ),
        array(
            'id' => 'google-font-selector-1',
            'type' => 'textarea',
            'title' => esc_html__('Selector 1', 'wp-trust'),
            'subtitle' => esc_html__('add html tags ID or class (body,a,.class,#id)', 'wp-trust'),
            'validate' => 'no_html',
            'default' => '',
        ),
        array(
            'id' => 'google-font-2',
            'type' => 'typography',
            'title' => esc_html__('Font 2', 'wp-trust'),
            'google' => true,
            'font-backup' => false,
            'font-style' => false,
            'color' => false,
            'text-align'=> false,
            'line-height'=>false,
            'font-size'=> false,
            'subsets'=> false,
            'default' => array(
                'font-weight' => '700',
                'font-family' => 'Amatic SC'
            )
        ),
        array(
            'id' => 'google-font-selector-2',
            'type' => 'textarea',
            'title' => esc_html__('Selector 2', 'wp-trust'),
            'subtitle' => esc_html__('add html tags ID or class (body,a,.class,#id)', 'wp-trust'),
            'validate' => 'no_html',
            'default' => '',
        ),
        array(
            'id' => 'google-font-3',
            'type' => 'typography',
            'title' => esc_html__('Font 3', 'wp-trust'),
            'google' => true,
            'font-backup' => false,
            'font-style' => false,
            'color' => false,
            'text-align'=> false,
            'line-height'=>false,
            'font-size'=> false,
            'subsets'=> false,
            'default' => array(
                'font-weight' => '700',
                'font-family' => 'Amatic SC'
            )
        ),
        array(
            'id' => 'google-font-selector-3',
            'type' => 'textarea',
            'title' => esc_html__('Selector 3', 'wp-trust'),
            'subtitle' => esc_html__('add html tags ID or class (body,a,.class,#id)', 'wp-trust'),
            'validate' => 'no_html',
            'default' => '',
        ),
    )
);

/**
 * Blog Option
 *
 * css color.
 * 
 * @author CMS
 */
$this->sections[] = array(
    'title' => esc_html__('Blog Option', 'wp-trust'),
    'icon' => 'el el-blogger',
    'fields' => array(
        array(
            'id' => 'blog_sidebar',
            'type' => 'switch',
            'title' => __('Show Sidebar Blog', 'wp-trust'),
            'subtitle' => __('<i>Show / Hide sidebar on page template - blog.</i>', 'wp-envogue'),
            'default' => true
        ),
        array(
            'id'       => 'blog_sidebar_position',
            'type'     => 'select',
            'title'    => __('Blog Category - Sidebar Position', 'wp-trust'), 
            'subtitle' => __('', 'wp-trust'),
            'desc'     => __('', 'wp-trust'),
            'options'  => array(
                'sidebar-right' => 'Sidebar Right',
                'sidebar-left' => 'Sidebar Left',
            ),
            'default'  => 'sidebar-right',
            'required' => array(
                0 => 'blog_sidebar',
                1 => '=',
                2 => 1
            )
        ),
        array(
            'id' => 'post_full_width',
            'type' => 'switch',
            'title' => esc_html__('Post Full Width', 'wp-trust'),
            'subtitle' => esc_html__('Show single post full width no sidebar.', 'wp-trust'),
            'default' => false
        ),
        array(
            'id' => 'post_sidebar_left',
            'type' => 'switch',
            'title' => esc_html__('Enable Post Sidebar Left', 'wp-trust'),
            'subtitle' => esc_html__('Default post blog sidebar Right.', 'wp-trust'),
            'default' => false
        ),
    )
);
/* Page Title - Single Post */
$this->sections[] = array(
    'title' => esc_html__('Page Title', 'wp-trust'),
    'icon' => 'el el-map-marker',
    'subsection' => true,
    'fields' => array(
        array(
            'title' => esc_html__('Select Background Image', 'wp-trust'),
            'subtitle' => esc_html__('Select an image file for background page title - apply post single', 'wp-trust'),
            'id' => 'bg_image_page_title_post',
            'type' => 'media',
            'url' => true,
            'default' => array(
                'url'=>get_template_directory_uri().'/assets/images/bg-page-title_post.jpg'
            )
        ),
    )
);

/**
 * Attorneys Option
 *
 * css color.
 * 
 * @author CMS
 */
$this->sections[] = array(
    'title' => esc_html__('Attorneys Option', 'wp-trust'),
    'icon' => 'el el-group',
    'fields' => array(
        
    )
);
/* Page Title - Attorneys Post */
$this->sections[] = array(
    'title' => esc_html__('Page Title', 'wp-trust'),
    'icon' => 'el el-map-marker',
    'subsection' => true,
    'fields' => array(
        array(
            'title' => esc_html__('Select Background Image', 'wp-trust'),
            'subtitle' => esc_html__('Select an image file for background page title - apply attorney single', 'wp-trust'),
            'id' => 'bg_image_page_title_team',
            'type' => 'media',
            'url' => true,
            'default' => array(
                'url'=>get_template_directory_uri().'/assets/images/bg-page-title_team.jpg'
            )
        ),
    )
);

/**
 * Practice Areas Option
 *
 * css color.
 * 
 * @author CMS
 */
$this->sections[] = array(
    'title' => esc_html__('Practice Areas Option', 'wp-trust'),
    'icon' => 'el el-group',
    'fields' => array(
        
    )
);
/* Page Title - Single Post */
$this->sections[] = array(
    'title' => esc_html__('Page Title', 'wp-trust'),
    'icon' => 'el el-map-marker',
    'subsection' => true,
    'fields' => array(
        array(
            'title' => esc_html__('Select Background Image', 'wp-trust'),
            'subtitle' => esc_html__('Select an image file for background page title - apply practice areas single', 'wp-trust'),
            'id' => 'bg_image_page_title_practice',
            'type' => 'media',
            'url' => true,
            'default' => array(
                'url'=>get_template_directory_uri().'/assets/images/bg-page-title_practice.jpg'
            )
        ),
    )
);

/**
 * Shop Option
 *
 * css color.
 * 
 * @author CMS
 */
$this->sections[] = array(
    'title' => esc_html__('Shop Option', 'wp-trust'),
    'icon' => 'el el-shopping-cart',
    'fields' => array(

    )
);
/* Page Title - Shop Post */
$this->sections[] = array(
    'title' => esc_html__('Page Title', 'wp-trust'),
    'icon' => 'el el-map-marker',
    'subsection' => true,
    'fields' => array(
        array(
            'subtitle' => '',
            'id' => 'shop_sub_title',
            'type' => 'text',
            'title' => 'Sub Title',
            'default' => ''
        ),
        array(
            'title' => esc_html__('Select Background Image', 'wp-trust'),
            'subtitle' => esc_html__('Select an image file for background page title - apply product single', 'wp-trust'),
            'id' => 'bg_image_page_title_product',
            'type' => 'media',
            'url' => true,
            'default' => array(
                'url'=>get_template_directory_uri().'/assets/images/bg-page-title_product.jpg'
            )
        ),
    )
);

/**
 * Page Option
 *
 * css color.
 * 
 * @author CMS
 */
$this->sections[] = array(
    'title' => esc_html__('Page Option', 'wp-trust'),
    'icon' => 'el-icon-edit',
    'fields' => array(
        array(
            'id' => 'page_comment',
            'type' => 'switch',
            'title' => esc_html__('Show Comment', 'wp-trust'),
            'subtitle' => esc_html__('Show / Hide comment on page.', 'wp-trust'),
            'default' => true
        )
    )
);

/**
 * Custom CSS
 * 
 * extra css for customer.
 * @author Fox
 */
$this->sections[] = array(
    'title' => esc_html__('Custom CSS', 'wp-trust'),
    'icon' => 'el-icon-bulb',
    'fields' => array(
        array(
            'id' => 'custom_css',
            'type' => 'ace_editor',
            'title' => esc_html__('CSS Code', 'wp-trust'),
            'subtitle' => esc_html__('create your css code here.', 'wp-trust'),
            'mode' => 'css',
            'theme' => 'monokai',
        )
    )
);
/**
 * Animations
 *
 * Animations options for theme. libs css, js.
 * @author Fox
 */
$this->sections[] = array(
    'title' => esc_html__('Animations', 'wp-trust'),
    'icon' => 'el-icon-magic',
    'fields' => array(
        array(
            'subtitle' => esc_html__('Enable animation mouse scroll...', 'wp-trust'),
            'id' => 'smoothscroll',
            'type' => 'switch',
            'title' => esc_html__('Smooth Scroll', 'wp-trust'),
            'default' => false
        )
    )
);
/**
 * Optimal Core
 * 
 * Optimal options for theme. optimal speed
 * @author Fox
 */
$this->sections[] = array(
    'title' => esc_html__('Optimal Core', 'wp-trust'),
    'icon' => 'el-icon-idea',
    'fields' => array(
        array(
            'subtitle' => esc_html__('no minimize , generate css over time...', 'wp-trust'),
            'id' => 'dev_mode',
            'type' => 'switch',
            'title' => esc_html__('Dev Mode (not recommended)', 'wp-trust'),
            'default' => false
        )
    )
);