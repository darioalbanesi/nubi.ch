<?php
/**
 * Meta options
 *
 * @author Fox
 * @since 1.0.0
 */
class CMSMetaOptions
{
    public function __construct()
    {
        add_action('add_meta_boxes', array($this, 'add_meta_boxes'));
        add_action('admin_enqueue_scripts', array($this, 'admin_script_loader'));
    }
    /* add script */
    function admin_script_loader()
    {
        global $pagenow;
        if (is_admin() && ($pagenow == 'post-new.php' || $pagenow == 'post.php')) {
            wp_enqueue_style('metabox', get_template_directory_uri() . '/inc/options/css/metabox.css');

            wp_enqueue_script('easytabs', get_template_directory_uri() . '/inc/options/js/jquery.easytabs.min.js');
            wp_enqueue_script('metabox', get_template_directory_uri() . '/inc/options/js/metabox.js');
        }
    }
    /* add meta boxs */
    public function add_meta_boxes()
    {
        $this->add_meta_box('template_page_options', esc_html__('Setting', 'wp-trust'), 'page');
        $this->add_meta_box('post_options', esc_html__('Post Setting', 'wp-trust'), 'post');
        $this->add_meta_box('product_option', esc_html__('Product Option', 'wp-trust'), 'product', 'side','high');
        $this->add_meta_box('mitarbeiter_optionen', esc_html__('Mitarbeiter Optionen', 'wp-trust'), 'mitarbeiter', 'side','high');
        $this->add_meta_box('social_mitarbeiter_optionen', esc_html__('Social Option', 'wp-trust'), 'mitarbeiter', 'side','high');
        $this->add_meta_box('practice_option', esc_html__('Practice Areas Option', 'wp-trust'), 'practice', 'side','high');
        $this->add_meta_box('testimonial_option', esc_html__('Testimonials Options', 'wp-trust'), 'testimonials', 'side','high');
        $this->add_meta_box('client_options', esc_html__('Client Option', 'wp-trust'), 'client');
        $this->add_meta_box('pricing_options', esc_html__('Pricing Option', 'wp-trust'), 'pricing');
        $this->add_meta_box('cms_demos', esc_html__('Demo Url', 'wp-trust'), 'demos');

    }

    public function add_meta_box($id, $label, $post_type, $context = 'advanced', $priority = 'default')
    {
        add_meta_box('_cms_' . $id, $label, array($this, $id), $post_type, $context, $priority);
    }

    /* --------------------- POST ---------------------- */
    function post_options(){
        ?>
        <div class="post-full">
            <?php
                cms_options(array(
                    'id' => 'post_full_width',
                    'label' => esc_html__('Post Full Width','wp-trust'),
                    'type' => 'switch',
                    'options' => array('on'=>'1','off'=>'0'),
                ));
                cms_options(array(
                    'id' => 'post_sidebar_left',
                    'label' => esc_html__('Enable Post Sidebar Left','wp-trust'),
                    'type' => 'switch',
                    'options' => array('on'=>'1','off'=>'0'),
                ));
            ?>
        </div>
        <?php
    }
    /* --------------------- Gallery ---------------------- */
    function gallery_options(){
        ?>
        <div class="post-full">
            <?php
                cms_options(array(
                    'id' => 'single_gallery_details',
                    'label' => esc_html__('Item Details','wp-trust'),
                    'type' => 'textarea',
                ));
            ?>
        </div>
        <?php
    }
    /* --------------------- Testimonial ---------------------- */
    function testimonial_option(){
        ?>
        <div class="cms-testimonial">
            <?php
                cms_options(array(
                    'id' => 'testimonial_title',
                    'label' => esc_html__('Testimonial Title','wp-trust'),
                    'type' => 'text',
                ));
                cms_options(array(
                    'id' => 'testimonial_position',
                    'label' => esc_html__('Testimonial Postion','wp-trust'),
                    'type' => 'text',
                ));
            ?>
        </div>
        <?php
    }
    /* --------------------- Client ---------------------- */
    function client_options(){
        ?>
        <div class="clients">
            <?php
                cms_options(array(
                    'id' => 'client_url',
                    'label' => esc_html__('URL','wp-trust'),
                    'type' => 'text',
                ));
            ?>
        </div>
        <?php
    }
    /* --------------------- Pricing ---------------------- */
    function pricing_options(){
        ?>
        <div class="pricing">
            <?php
                cms_options(array(
                    'id' => 'pricing_sub_title',
                    'label' => esc_html__('Sub Title','wp-trust'),
                    'type' => 'text',
                    'placeholder' => 'Trust Silver Customer'
                ));
                cms_options(array(
                    'id' => 'pricing_des',
                    'label' => esc_html__('Description','wp-trust'),
                    'type' => 'text',
                    'placeholder' => ''
                ));
                cms_options(array(
                    'id' => 'pricing_currency',
                    'label' => esc_html__('Currency Unit','wp-trust'),
                    'type' => 'text',
                    'placeholder' => '$'
                ));
                cms_options(array(
                    'id' => 'pricing_price',
                    'label' => esc_html__('Price','wp-trust'),
                    'type' => 'text',
                    'placeholder' => '100'
                ));
                cms_options(array(
                    'id' => 'pricing_time',
                    'label' => esc_html__('Time','wp-trust'),
                    'type' => 'text',
                    'placeholder' => 'month'
                ));
                cms_options(array(
                    'id' => 'pricing_btn_text',
                    'label' => esc_html__('Button Text','wp-trust'),
                    'type' => 'text',
                    'placeholder' => 'Order This Plan'
                ));
                cms_options(array(
                    'id' => 'pricing_btn_link',
                    'label' => esc_html__('Button Url','wp-trust'),
                    'type' => 'text',
                    'placeholder' => '#'
                ));
            ?>
        </div>
        <?php
    }
    /* --------------------- PAGE ---------------------- */
    function template_page_options() {
        ?>
	    <div class="tab-container clearfix">
	        <ul class='etabs clearfix'>
               <li class="tab"><a href="#tabs-header"><?php esc_html_e('Header', 'wp-trust'); ?></a></li>
               <li class="tab"><a href="#tabs-page-title"><?php esc_html_e('Page Title', 'wp-trust'); ?></a></li>
               <li class="tab"><a href="#tabs-body"><?php esc_html_e('Body', 'wp-trust'); ?></a></li>
               <li class="tab"><a href="#tabs-sidebar"><?php esc_html_e('Sidebar', 'wp-trust'); ?></a></li>
	           <li class="tab"><a href="#tabs-footer"><?php esc_html_e('Footer', 'wp-trust'); ?></a></li>
               <li class="tab"><a href="#tabs-one-page"><?php esc_html_e('One Page', 'wp-trust'); ?></a></li>
               <li class="tab"><a href="#tabs-blog"><?php esc_html_e('Blog', 'wp-trust'); ?></a></li>

	        </ul>
	        <div class='panel-container'>
                <div id="tabs-header">
                    <?php
                        /* Header. */
                        cms_options(array(
                            'id' => 'header',
                            'label' => esc_html__('Custom Header','wp-trust'),
                            'type' => 'switch',
                            'options' => array('on'=>'1','off'=>''),
                            'follow' => array('1'=>array('#page_header_enable'))
                        ));
                    ?>
                    <div id="page_header_enable">
                        <?php
                            global $wp_trust_base;
                            cms_options(array(
                                'id' => 'header_layout',
                                'label' => esc_html__('Layout','wp-trust'),
                                'type' => 'imegesselect',
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
                                    '15' => get_template_directory_uri().'/inc/options/images/header/header15.png',
                                )
                            ));
                            cms_options(array(
                                'id' => 'get_revslide',
                                'label' => esc_html__('Revolution','wp-trust'),
                                'type' => 'select',
                                'options' => $wp_trust_base->wp_trust_build_shortcode_rev_slider(),
                            ));
                            cms_options(array(
                                'id' => 'custom_logo',
                                'label' => esc_html__('Custom Logo','wp-trust'),
                                'type' => 'switch',
                                'options' => array('on'=>'1','off'=>''),
                                'follow' => array('1'=>array('#custom_logo_page'))
                            ));
                            ?>
                            <div id="custom_logo_page">
                                <?php
                                    cms_options(array(
                                        'id' => 'header_logo_page',
                                        'label' => esc_html__('Logo','wp-trust'),
                                        'type' => 'image',
                                        'default' => ''
                                    ));
                                ?>
                            </div>
                            <?php
                            $menus = array();
                            $menus[''] = 'Default';
                            $obj_menus = wp_get_nav_menus();
                            foreach ($obj_menus as $obj_menu){
                                $menus[$obj_menu->term_id] = $obj_menu->name;
                            }
                            $navs = get_registered_nav_menus();
                            foreach ($navs as $key => $mav){
                                cms_options(array(
                                'id' => $key,
                                'label' => $mav,
                                'type' => 'select',
                                'options' => $menus
                                ));
                            }
                        ?>
                    </div>
                </div>
                <div id="tabs-page-title">
                <?php
                /* page title. */
                cms_options(array(
                    'id' => 'page_title',
                    'label' => esc_html__('Custom Page Title','wp-trust'),
                    'type' => 'switch',
                    'options' => array('on'=>'1','off'=>''),
                    'follow' => array('1'=>array('#page_title_enable'))
                ));
                ?>  <div id="page_title_enable"><?php
                    cms_options(array(
                        'id' => 'page_title_text',
                        'label' => esc_html__('Title','wp-trust'),
                        'type' => 'text',
                    ));
                    cms_options(array(
                        'id' => 'page_title_sub',
                        'label' => esc_html__('Sub Title','wp-trust'),
                        'type' => 'text',
                    ));
                    cms_options(array(
                        'id' => 'page_title_padding',
                        'label' => esc_html__('Page Title Padding','wp-trust'),
                        'type' => 'text',
                    ));
                    cms_options(array(
                        'id' => 'page_title_margin',
                        'label' => esc_html__('Page Title Margin','wp-trust'),
                        'type' => 'text',
                    ));
                    cms_options(array(
                        'id' => 'page_title_type',
                        'label' => esc_html__('Layout','wp-trust'),
                        'type' => 'imegesselect',
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
                    ));
                    cms_options(array(
                        'id' => 'bg_image_page_title',
                        'label' => esc_html__('Select Background Image','wp-trust'),
                        'type' => 'image',
                        'default' => ''
                    ));
                    ?>
                    </div>
                </div>
                <div id="tabs-body">
                    <?php
                        cms_options(array(
                            'id' => 'body_custom_class',
                            'label' => esc_html__('Custom Body Class','wp-trust'),
                            'type' => 'text',
                        ));
                    ?>
                    <?php
                ?>
                </div>
                <div id="tabs-sidebar">
                    <?php
                        cms_options(array(
                            'id' => 'show_sidebar',
                            'label' => esc_html__('Show Sidebar','wp-trust'),
                            'type' => 'switch',
                            'options' => array('on'=>'1','off'=>''),
                            'follow' => array('1'=>array('#show_sidebar_page_left')),
                            'desc' => 'Apply only Page.'
                        ));
                    ?>
                        <div id="show_sidebar_page_left">
                            <?php
                                cms_options(array(
                                    'id' => 'show_sidebar_page_left',
                                    'label' => esc_html__('Show Sidebar Left - Default Sidebar Right','wp-trust'),
                                    'type' => 'switch',
                                    'options' => array('on'=>'1','off'=>''),
                                    'desc' => 'Apply only Page.'
                                ));
                            ?>
                        </div>
                </div>
                <div id="tabs-footer">
                    <?php
                        /* Footer. */
                        cms_options(array(
                            'id' => 'footer',
                            'label' => esc_html__('Custom Footer','wp-trust'),
                            'type' => 'switch',
                            'options' => array('on'=>'1','off'=>''),
                            'follow' => array('1'=>array('#page_footer_enable'))
                        ));
                    ?>
                    <div id="page_footer_enable">
                        <?php
                            cms_options(array(
                                'id' => 'footer_layout',
                                'label' => esc_html__('Layout','wp-trust'),
                                'type' => 'imegesselect',
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
                            ));
                        ?>
                    </div>
                </div>
                <div id="tabs-one-page">
                    <?php
                    cms_options(array(
                        'id' => 'one_page',
                        'label' => esc_html__('Enable','wp-trust'),
                        'type' => 'switch',
                        'options' => array('on'=>'1','off'=>''),
                        'follow' => array('1'=>array('#one-page-enable'))
                    ));
                    ?>
                    <div id="one-page-enable">
                        <?php
                        cms_options(array(
                            'id' => 'one_page_speed',
                            'label' => esc_html__('Speed','wp-trust'),
                            'type' => 'text',
                            'placeholder' => '1000'
                        ));
                        cms_options(array(
                            'id' => 'one_page_easing',
                            'label' => esc_html__('Easing','wp-trust'),
                            'type' => 'select',
                            'options' => array(
                                '' => '',
                                'def' => 'def',
                                'easeInQuad' => 'easeInQuad',
                                'easeOutQuad' => 'easeOutQuad',
                                'easeInOutQuad' => 'easeInOutQuad',
                                'easeInCubic' => 'easeInCubic',
                                'easeOutCubic' => 'easeOutCubic',
                                'easeInOutCubic' => 'easeInOutCubic',
                                'easeInQuart' => 'easeInQuart',
                                'easeOutQuart' => 'easeOutQuart',
                                'easeInOutQuart' => 'easeInOutQuart',
                                'easeInQuint' => 'easeInQuint',
                                'easeOutQuint' => 'easeOutQuint',
                                'easeInOutQuint' => 'easeInOutQuint',
                                'easeInSine' => 'easeInSine',
                                'easeOutQuad' => 'easeOutQuad',
                                'easeOutSine' => 'easeOutSine',
                                'easeInOutSine' => 'easeInOutSine',
                                'easeInExpo' => 'easeInExpo',
                                'easeOutExpo' => 'easeOutExpo',
                                'easeInOutExpo' => 'easeInOutExpo',
                                'easeInCirc' => 'easeInCirc',
                                'easeOutCirc' => 'easeOutCirc',
                                'easeInOutCirc' => 'easeInOutCirc',
                                'easeInElastic' => 'easeInElastic',
                                'easeOutElastic' => 'easeOutElastic',
                                'easeInOutElastic' => 'easeInOutElastic',
                                'easeInBack' => 'easeInBack',
                                'easeOutBack' => 'easeOutBack',
                                'easeInOutBack' => 'easeInOutBack',
                                'easeInBounce' => 'easeInBounce',
                                'easeOutBounce' => 'easeOutBounce',
                                'easeInOutBounce' => 'easeInOutBounce'
                            )
                        ));
                        ?>
                    </div>
                </div>
                <div id="tabs-blog">
                    <?php
                        cms_options(array(
                            'id' => 'blog_sidebar',
                            'label' => esc_html__('Show Sidebar Blog','wp-trust'),
                            'type' => 'switch',
                            'options' => array('on'=>'1','off'=>''),
                            'follow' => array('1'=>array('#blog-sidebar-position'))
                        ));
                    ?>
                    <div id="blog-sidebar-position">
                        <?php
                            cms_options(array(
                                'id' => 'blog_sidebar_position',
                                'label' => __('Sidebar Position','wp-trust'),
                                'type' => 'select',
                                'options' => array(
                                    'sidebar-right' => 'Sidebar Right',
                                    'sidebar-left' => 'Sidebar Left',
                                )
                            ));
                        ?>
                    </div>
                </div>
            </div>
        </div>
        <?php
    }
    /* --------------------- Attorneys Option ---------------------- */
    function mitarbeiter_optionen(){
        ?>
        <div class="attorneys-option">
            <?php
                cms_options(array(
                    'id' => 'attorneys_sub_title',
                    'label' => esc_html__('Sub Title','wp-trust'),
                    'type' => 'text',
                    'placeholder' => 'Single Attorney'
                ));
                cms_options(array(
                    'id' => 'attorneys_position',
                    'label' => esc_html__('Position','wp-trust'),
                    'type' => 'text',
                    'placeholder' => 'CEO & Manager'
                ));
                cms_options(array(
                    'id' => 'attorneys_book_text',
                    'label' => esc_html__('Book AN Appointment Text','wp-trust'),
                    'type' => 'text',
                    'placeholder' => ''
                ));
                cms_options(array(
                    'id' => 'attorneys_book_url',
                    'label' => esc_html__('Book AN Appointment URL','wp-trust'),
                    'type' => 'text',
                    'placeholder' => '#'
                ));
                cms_options(array(
                    'id' => 'attorneys_introduction',
                    'label' => esc_html__('Introduction','wp-trust'),
                    'type' => 'text',
                ));
            ?>
        </div>
        <?php
    }
    /* --------------------- Attorneys Option ---------------------- */
    function product_option(){
        ?>
        <div class="product-option">
            <?php
                cms_options(array(
                    'id' => 'product_sub_title',
                    'label' => esc_html__('Sub Title','wp-trust'),
                    'type' => 'text',
                    'placeholder' => 'Law Books'
                ));
            ?>
        </div>
        <?php
    }
    /* --------------------- Attorneys Social ---------------------- */
    function social_mitarbeiter_optionen(){
        ?>
        <div class="attorneys-social">
            <?php
                cms_options(array(
                    'id' => 'icon1',
                    'label' => esc_html__('Icon 1','wp-trust'),
                    'type' => 'text',
                    'placeholder' => 'ex: fa fa-facebook',
                ));
                cms_options(array(
                    'id' => 'link1',
                    'label' => esc_html__('Link 1','wp-trust'),
                    'type' => 'text',
                ));
                cms_options(array(
                    'id' => 'icon2',
                    'label' => esc_html__('Icon 2','wp-trust'),
                    'type' => 'text',
                ));
                cms_options(array(
                    'id' => 'link2',
                    'label' => esc_html__('Link 2','wp-trust'),
                    'type' => 'text',
                ));
                cms_options(array(
                    'id' => 'icon3',
                    'label' => esc_html__('Icon 3','wp-trust'),
                    'type' => 'text',
                ));
                cms_options(array(
                    'id' => 'link3',
                    'label' => esc_html__('Link 3','wp-trust'),
                    'type' => 'text',
                ));
                cms_options(array(
                    'id' => 'icon4',
                    'label' => esc_html__('Icon 4','wp-trust'),
                    'type' => 'text',
                ));
                cms_options(array(
                    'id' => 'link4',
                    'label' => esc_html__('Link 4','wp-trust'),
                    'type' => 'text',
                ));
            ?>
        </div>
        <?php
    }
    /* --------------------- Practice Option ---------------------- */
    function practice_option(){
        ?>
        <div class="practice-option">
            <?php
                cms_options(array(
                    'id' => 'practice_icon',
                    'label' => esc_html__('Icon','wp-trust'),
                    'type' => 'text',
                    'placeholder' => 'fa fa-child'
                ));
                cms_options(array(
                    'id' => 'practice_sub_title',
                    'label' => esc_html__('Sub Title','wp-trust'),
                    'type' => 'text',
                ));
                cms_options(array(
                    'id' => 'practice_introduction',
                    'label' => esc_html__('Introduction','wp-trust'),
                    'type' => 'text',
                ));
            ?>
        </div>
        <?php
    }
    /* --------------------- Theme Demos ---------------------- */
    function cms_demos(){
        ?>
        <div class="demos-option">
            <?php
                cms_options(array(
                    'id' => 'demo_url',
                    'label' => esc_html__('Demo Url','wp_trust'),
                    'type' => 'text',
                    'placeholder' => ''
                ));
            ?>
        </div>
        <?php
    }
}

new CMSMetaOptions();
