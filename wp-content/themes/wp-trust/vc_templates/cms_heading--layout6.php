<?php
extract(shortcode_atts(array(
    'hd_subtitle' => '',       
    'hd_title' => '',       
    'hd_description' => '',              
    'text_color' => '',       
), $atts));
?>
<div class="cms-heading-wrapper heading-layout6 text-center">
    <div class="cms-heading-inner">
        <div class="cms-heading-content">
            <?php if (!empty($hd_subtitle) && $hd_subtitle) { ?>
                <span class="subtitle" style="color:<?php echo esc_attr($text_color); ?>;"><?php echo esc_attr($hd_subtitle); ?></span>
            <?php }?> 
            <h3 class="title" style="color:<?php echo esc_attr($text_color); ?>;"><?php echo esc_attr($hd_title); ?></h3>
            <?php if (!empty($hd_description)) { ?>
                <div class="description" style="color:<?php echo esc_attr($text_color); ?>;"> <?php echo apply_filters('the_content',$atts['hd_description']);?></div>
            <?php } ?>
            <span class="line-title"></span>
        </div>
    </div>
</div>