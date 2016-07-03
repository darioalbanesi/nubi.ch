<?php
extract(shortcode_atts(array(
    'icon_type' => 'fontawesome',
    'button_text'  => 'Button',
    'link_button'  => '#',
    'button_style'  => 'btn-default',
    'button_size'  => 'btn-default',
    'icon_align'  => 'left',
    'button_duplicated'  => '',
    'button_text_duplicated'  => '',
    'link_button_duplicated'  => '',
    'button_style_duplicated'  => '',
    'button_align'  => 'cta-right',
    'cta_text'  => '',
    'cta_text_color'  => '',
    'el_class'  => ''       
), $atts));
 
    $icon_name = "icon_" . $icon_type;
    $iconClass = isset($atts[$icon_name])?$atts[$icon_name]:'';
?>
<div class="cms-cta-wrapper clearfix <?php echo esc_attr($el_class); ?> <?php echo esc_attr($button_align); ?>">
    <div class="cms-cta-text col-xs-12 col-sm-12 col-md-6 col-lg-8 text-center-md" style="color: <?php echo esc_attr($cta_text_color); ?>;">
        <?php echo esc_attr($cta_text); ?>
    </div>
    <div class="cms-cta-button col-xs-12 col-sm-12 col-md-6 col-lg-4 text-center-md">
        <?php if($button_duplicated == 'yes') { ?>
            <a href="<?php echo esc_url($atts['link_button_duplicated']);?>" class="btn <?php echo esc_attr($button_style_duplicated); ?> <?php echo esc_attr($button_size); ?>">
                <?php switch ($icon_align) {
                    case 'right':
                        ?>
                            <?php echo esc_attr($button_text_duplicated); ?>
                            <?php if(!empty($iconClass)):?>
                            <i class="<?php echo esc_attr($iconClass);?>" style="padding-left: 6px;"></i>
                            <?php endif;?>
                        <?php
                        break;
                    case 'left':
                    default:
                        ?>
                            <?php if(!empty($iconClass)):?>
                                <i class="<?php echo esc_attr($iconClass);?>" style="padding-right: 6px;"></i>     
                            <?php endif;?>
                            <?php echo esc_attr($button_text_duplicated); ?>
                        <?php
                        break;
                }?>
            </a>
        <?php } ?>

        <a href="<?php echo esc_url($atts['link_button']);?>" class="btn <?php echo esc_attr($button_style); ?> <?php echo esc_attr($button_size); ?>">
            <?php switch ($icon_align) {
                case 'right':
                    ?>
                        <?php echo esc_attr($button_text); ?>
                        <?php if(!empty($iconClass)):?>
                        <i class="<?php echo esc_attr($iconClass);?>" style="padding-left: 6px;"></i>
                        <?php endif;?>
                    <?php
                    break;
                case 'left':
                default:
                    ?>
                        <?php if(!empty($iconClass)):?>
                            <i class="<?php echo esc_attr($iconClass);?>" style="padding-right: 6px;"></i>     
                        <?php endif;?>
                        <?php echo esc_attr($button_text); ?>
                    <?php
                    break;
            }?>
        </a>
    </div>
</div>