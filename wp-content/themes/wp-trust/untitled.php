/**
 * Custom params & remove VC Elements.
 * 
 * @author FOX
 */
add_action('vc_after_init', 'wp_medico_vc_after_init');

function wp_medico_vc_after_init(){
    
    require_once( get_template_directory() . '/vc_params/vc_rows.php' );
    require_once( get_template_directory() . '/vc_params/vc_column.php' );
    require_once( get_template_directory() . '/vc_params/vc_tta_section.php' );
    require_once( get_template_directory() . '/vc_params/vc_custom_heading.php' );
    require_once( get_template_directory() . '/vc_params/cms_custom_pagram_vc.php' );
    
    vc_remove_element( "vc_button" );
    vc_remove_element( "vc_button2" );
    vc_remove_element( "vc_cta_button" );
    vc_remove_element( "vc_cta_button2" );
    vc_remove_element( "vc_cta" );
}

/**
 * Add new elements for VC
 * 
 * @author FOX
 */
add_action('vc_before_init', 'wp_medico_vc_elements');

function wp_medico_vc_elements(){
    
    if(!class_exists('CmsShortCode'))
        return ;
    
    require_once( $element . '/button/cms_button.php' );
    require_once( $element . '/separator/cms_separator.php' );
    require_once( $element . '/social/cms_social.php' );
    require_once( $element . '/googlemap/cms_googlemap.php' );
    require_once( $element . '/process/cms_process.php' );
    require_once( $element . '/list/cms_list.php' );
    require_once( $element . '/portfolio/cms_portfolio.php' );
    require_once( $element . '/dropcap/cms_dropcap.php' );
    require_once( $element . '/textblock/cms_textblock.php' );
    require_once( $element . '/countdown/cms_countdown.php' );
}