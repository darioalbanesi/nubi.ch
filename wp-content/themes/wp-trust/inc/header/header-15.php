<?php
/**
 * @name : Default
 * @package : CMSSuperHeroes
 * @author : Fox
 */
?>
<?php global $smof_data, $wp_trust_meta;
    if(is_page() && !empty($wp_trust_meta->_cms_get_revslide))
        echo do_shortcode('[rev_slider_vc alias="'.$wp_trust_meta->_cms_get_revslide.'"]');
?>
<div id="cshero-header-inner" class="header-2 custom-header-15 h-style">
    <div id="cshero-header-wrapper">
        <div id="cshero-header" class="cshero-main-header <?php if (!empty($wp_trust_meta->_cms_one_page)) {echo 'active-menu-onepage';} ?> <?php if (!$smof_data['menu_sticky']) {echo 'no-sticky';} ?>">
            <div class="container">
                <div class="row">
                    <div id="cshero-header-logo" class="col-xs-12 col-sm-5 col-md-5 col-lg-5">
                        <?php
                            if(is_page() && isset($wp_trust_meta->_cms_custom_logo) && $wp_trust_meta->_cms_custom_logo) {
                                if (is_page() && isset($wp_trust_meta->_cms_header_logo_page) && $wp_trust_meta->_cms_header_logo_page) {
                                    $smof_data['main_logo']['url'] = wp_get_attachment_url($wp_trust_meta->_cms_header_logo_page);
                                }
                            }
                        ?>
                        <a href="<?php echo esc_url(home_url('/')); ?>">
                            <img alt="" src="<?php echo esc_url($smof_data['main_logo']['url']); ?>">
                            <span><?php  esc_html_e('Kompetenz vom Entwurf bis zur Unterschrift','wp-trust'); ?></span>
                        </a>
                    </div>
                    <div id="cshero-header-navigation" class="col-xs-12 col-sm-7 col-md-7 col-lg-7">
                        <div class="navigation-main">
                            <div class="cshero-navigation-right hidden-xs hidden-sm">
                                <div class="nav-button-icon">
                                    <?php if ($smof_data['show_search_icon']) { ?>
                                        <i class="search fa fa-search"></i>
                                    <?php } ?>
                                    <?php if ($smof_data['show_cart_icon']) { ?>
                                        <i class="cart fa fa-shopping-cart"></i>
                                        <?php if(class_exists('Woocommerce')){ ?>
                                            <span class="couter_items"><?php echo sprintf (_n( '%d', '%d', WC()->cart->cart_contents_count, "wp-experts" ), WC()->cart->cart_contents_count ); ?></span>
                                        <?php } ?>
                                        <?php if ( class_exists( 'WC_Widget_Cart' ) ): ?>
                                            <div class="widget_shopping_cart">
                                                <div class="widget_shopping_cart_content">
                                                    <?php woocommerce_mini_cart(); ?>
                                                </div>
                                            </div>
                                        <?php endif; ?>
                                    <?php } ?>
                                    <?php if ( is_active_sidebar( 'hidden-sidebar' ) ) { ?>
                                        <i class="hidden-sidebar fa fa-bars"></i>
                                    <?php } ?>
                                </div>
                            </div>
                            <nav id="site-navigation" class="main-navigation">
                                <?php

                                $attr = array(
                                    'menu' =>wp_trust_menu_location(),
                                    'menu_class' => 'nav-menu menu-main-menu',
                                );

                                $menu_locations = get_nav_menu_locations();

                                if(!empty($menu_locations['primary'])){
                                    $attr['theme_location'] = 'primary';
                                }

                                /* enable mega menu. */
                                if(class_exists('HeroMenuWalker')){ $attr['walker'] = new HeroMenuWalker(); }

                                /* main nav. */
                                wp_nav_menu( $attr ); ?>
                            </nav>

                        </div>
                    </div>
                    <div id="cshero-menu-mobile" class="collapse navbar-collapse">
                        <div class="nav-button-icon">
                            <i class="search fa fa-search"></i>
                        </div>
                        <i class="cms-icon-menu pe-7s-menu"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
