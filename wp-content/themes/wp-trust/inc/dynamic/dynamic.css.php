<?php

/**
 * Auto create css from Meta Options.
 * 
 * @author Fox
 * @version 1.0.0
 */
class CMSSuperHeroes_DynamicCss
{

    function __construct()
    {
        add_action('wp_head', array($this, 'generate_css'));
    }

    /**
     * generate css inline.
     *
     * @since 1.0.0
     */
    public function generate_css()
    {
        global $smof_data, $wp_trust_base;
        $css = $this->css_render();
        if (! $smof_data['dev_mode']) {
            $css = $wp_trust_base->wp_trust_compress_css($css);
        }
        echo '<style type="text/css" data-type="cms_shortcodes-custom-css">'.$css.'</style>';
    }

    /**
     * header css
     *
     * @since 1.0.0
     * @return string
     */
    public function css_render()
    {
        global $smof_data, $wp_trust_base, $wp_trust_meta;
        ob_start();
         /* ==========================================================================
           Start Header
        ========================================================================== */
            /* Start Page Title */
            if (is_page() && !empty($wp_trust_meta->_cms_page_title_margin)) {
                echo "body #page-title {
                    margin: ".esc_attr($wp_trust_meta->_cms_page_title_margin).";
                }";
            }
            if (is_page() && !empty($wp_trust_meta->_cms_page_title_padding)) {
                echo "body #page-title {
                    padding: ".esc_attr($wp_trust_meta->_cms_page_title_padding).";
                }";
            }
            /* End Page Title */
        /* ==========================================================================
           End Header
        ========================================================================== */
        /* custom css. */ 
        if(!empty($smof_data['custom_css'])) { echo esc_attr($smof_data['custom_css']); }
        
        return ob_get_clean();
    }
}

new CMSSuperHeroes_DynamicCss();