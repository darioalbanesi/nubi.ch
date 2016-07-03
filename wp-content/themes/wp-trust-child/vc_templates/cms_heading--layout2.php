<?php
extract(shortcode_atts(array(
    'hd_subtitle' => '',       
    'hd_title' => '',       
    'hd_description' => '',       
    'hd_view_text' => '',       
    'hd_view_link' => '',       
    'text_color' => '',       
    'custom_class' => '',       
), $atts));
?>
<div class="cms-heading-wrapper heading-layout2 text-center <?php echo esc_attr($custom_class); ?>">
    <div class="cms-heading-inner">
        <div class="cms-heading-content">
            <?php if (!empty($hd_subtitle) && $hd_subtitle) { ?>
                <span class="subtitle" style="color:<?php echo esc_attr($text_color); ?>;"><?php echo esc_attr($hd_subtitle); ?></span>
            <?php }?> 
            <h3 class="title" style="color:<?php echo esc_attr($text_color); ?>;"><?php echo esc_attr($hd_title); ?></h3>
            <span class="line-title"></span>
            <?php if (!empty($hd_description)) { ?>
                <div class="description" style="color:<?php echo esc_attr($text_color); ?>;"> <?php echo apply_filters('the_content',$atts['hd_description']);?></div>
            <?php } ?>
            <?php if(!empty($hd_view_text) && $hd_view_text) { ?>
                <div class="cms-heading-button ">
                    <a href="<?php echo esc_url($atts['hd_view_link']);?>" class="btn btn-md">
                        <?php echo esc_attr($hd_view_text); ?>
                    </a>
                </div>
            <?php } ?>
        </div>
    </div>
</div>