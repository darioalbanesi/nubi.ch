<?php

/**
 * Auto create .css file from Theme Options
 * @author Fox
 * @version 1.0.0
 */
/*
 * Convert HEX to GRBA
 */
if(!function_exists('wp_trust_hex_to_rgb')){
    function wp_trust_hex_to_rgb($hex,$opacity = 1) {
        $hex = str_replace("#",null, $hex);
        $color = array();
        if(strlen($hex) == 3) {
            $color['r'] = hexdec(substr($hex,0,1).substr($hex,0,1));
            $color['g'] = hexdec(substr($hex,1,1).substr($hex,1,1));
            $color['b'] = hexdec(substr($hex,2,1).substr($hex,2,1));
            $color['a'] = $opacity;
        }
        else if(strlen($hex) == 6) {
            $color['r'] = hexdec(substr($hex, 0, 2));
            $color['g'] = hexdec(substr($hex, 2, 2));
            $color['b'] = hexdec(substr($hex, 4, 2));
            $color['a'] = $opacity;
        }
        $color = "rgba(".implode(', ', $color).")";
        return $color;
    }
}

class CMSSuperHeroes_StaticCss
{

    public $scss;
    
    function __construct()
    {
        global $smof_data , $wp_filesystem;
        
        /* scss */
        $this->scss = new scssc();
        
        /* set paths scss */
        $this->scss->setImportPaths(get_template_directory() . '/assets/scss/');
             
        /* generate css over time */
        if (isset($smof_data['dev_mode']) && $smof_data['dev_mode']) {
            $this->generate_file();
        } else {
            /* save option generate css */
            add_action("redux/options/smof_data/saved", array(
                $this,
                'generate_file'
            ));
        }
    }

    /**
     * generate css file.
     *
     * @since 1.0.0
     */
    public function generate_file()
    {
        global $smof_data, $wp_filesystem;
        
        if (! empty($smof_data) && $wp_filesystem) {
            
            $options_scss = get_template_directory() . '/assets/scss/options.scss';
        	
        	/* delete files options.scss */
        	$wp_filesystem->delete($options_scss);
        	
            /* write options to scss file */
            $wp_filesystem->put_contents($options_scss, $this->css_render(), FS_CHMOD_FILE); // Save it
            
            /* minimize CSS styles */
            if (!$smof_data['dev_mode']) {
                $this->scss->setFormatter('scss_formatter_compressed');
            }
            
            /* compile scss to css */
            $css = $this->scss_render();
            
            $file = get_template_directory() . '/assets/css/static.css';
            
            /* delete files static.css */
            $wp_filesystem->delete($file);
            
            /* write static.css file */
            $wp_filesystem->put_contents($file, $css, FS_CHMOD_FILE); // Save it
        }
    }
    
    /**
     * scss compile
     * 
     * @since 1.0.0
     * @return string
     */
    public function scss_render(){
        global $smof_data, $wp_trust_base;
        /* Compile scss to css */
        return $this->scss->compile('@import "master.scss"');
    }
    
    /**
     * main css
     *
     * @since 1.0.0
     * @return string
     */
    public function css_render()
    {
        global $smof_data, $wp_trust_base;
        
        ob_start();
        
        /* Google Fonts. */
        $wp_trust_base->wp_trust_set_google_font($smof_data['google-font-1'], $smof_data['google-font-selector-1']);
        $wp_trust_base->wp_trust_set_google_font($smof_data['google-font-2'], $smof_data['google-font-selector-2']);
        $wp_trust_base->wp_trust_set_google_font($smof_data['google-font-3'], $smof_data['google-font-selector-3']);
        
        if(!empty($smof_data['primary_color'])) {
        	
        	echo '$primary_color:'.esc_attr($smof_data['primary_color']).';';
        	
        	echo ".practice-layout6 .cms-grid-item-inner .cms-practice-content-hover {
                background-color:".wp_trust_hex_to_rgb($smof_data['primary_color'],0.95).";
            }";
            echo ".practice-layout10 .cms-practice-content.content-hover::before {
                background-color:".wp_trust_hex_to_rgb($smof_data['primary_color'],0.85).";
            }";
            echo ".practice-layout11 .cms-grid-item-inner .cms-practice-content-hover, .practice-layout11 .cms-grid-item-inner .cms-practice-content::before {
                background-color:".wp_trust_hex_to_rgb($smof_data['primary_color'],0.90).";
            }";
            echo ".cms-testimonial-layout1.custom-layout4 .cms-testimonial-wrapper {
                background-color:".wp_trust_hex_to_rgb($smof_data['primary_color'],0.70).";
            }";
            
        }
        if(!empty($smof_data['secondary_color'])) {
        	
        	echo '$secondary_color:'.esc_attr($smof_data['secondary_color']).';';

        }
        if(!empty($smof_data['link_color'])) {
        	echo '$link_color:'.esc_attr($smof_data['link_color']).';';
        }
        if(!empty($smof_data['link_color_hover'])) {
        	echo '$link_color_hover:'.esc_attr($smof_data['link_color_hover']).';';
        }

        return ob_get_clean();
    }
}

new CMSSuperHeroes_StaticCss();