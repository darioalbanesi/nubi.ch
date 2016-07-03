<?php
    $navigation_align = isset($atts['navigation_align']) ? $atts['navigation_align'] : 'nav-default';
?>
<div class="cms-carousel layout-practice practice-layout6 <?php echo esc_attr($navigation_align); ?> <?php echo esc_attr($atts['template']);?>" id="<?php echo esc_attr($atts['html_id']);?>">
    <?php
    $posts = $atts['posts'];
    while($posts->have_posts()){
        $posts->the_post();
        $practice_meta = wp_trust_post_meta_data();
        $show_hide_navigation = isset( $atts['show_hide_navigation'] ) ? $atts['show_hide_navigation'] : 'yes';
        $practice_introduction = isset( $practice_meta->_cms_practice_introduction) ? $practice_meta->_cms_practice_introduction : '';
        $practice_icon = isset( $practice_meta->_cms_practice_icon) ? $practice_meta->_cms_practice_icon : '';
        $size = 'full';
        ?>
        <div class="cms-carousel-item cms-practice-item">
            <div class="cms-grid-item-inner">
                <div class="cms-practice-image b-ra">
                    <?php 
                        if(has_post_thumbnail() && !post_password_required() && !is_attachment() &&  wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), $size, false)):
                            $class = ' has-thumbnail';
                            $thumbnail_url = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), $size, false);
                            $thumbnail = get_the_post_thumbnail(get_the_ID(),'wp_trust_370X245');
                        else:
                            $class = ' no-image';
                            $thumbnail_url[0] = get_template_directory_uri(). '/assets/images/no-image.jpg';
                            $thumbnail = '<img src="'.esc_url(get_template_directory_uri(). '/assets/images/no-image.jpg').'" alt="'.get_the_title().'" />';
                        endif;
                        echo '<div class="cms-grid-media '.esc_attr($class).'">'.$thumbnail.'</div>';
                    ?>
                    <div class="cms-practice-content-hover">
                        <h3 class="cms-practice-title">
                            <a href="<?php the_permalink() ?>" ><?php the_title();?> </a>
                        </h3>
                        <div class="cms-practice-content-inner">
                            <?php echo  substr(esc_attr($practice_introduction),0,60); ?>
                        </div>
                        <div class="cms-practice-readmore">
                            <a href="<?php the_permalink() ?>" ><?php esc_html_e('More', 'wp-trust'); ?><i class="fa fa-long-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
    }
    ?>
</div>