<div style="opacity: 0;" class="cms-carousel layout-attorney attorney-layout1 cms-carousel-attorney-layout1 <?php echo esc_attr($atts['template']);?>" id="<?php echo esc_attr($atts['html_id']);?>">
    <?php
    $posts = $atts['posts'];
    $size = 'full';
    while($posts->have_posts()){
        $posts->the_post();
        $attorney_meta = wp_trust_post_meta_data();
        $show_hide_navigation = isset( $atts['show_hide_navigation'] ) ? $atts['show_hide_navigation'] : 'yes';
        $attorneys_introduction = isset( $attorney_meta->_cms_attorneys_introduction) ? $attorney_meta->_cms_attorneys_introduction : '';
        ?>
        <div class="cms-carousel-item cms-attorney-item">
            <div class="cms-attorney-image">
                <?php 
                    if(has_post_thumbnail() && !post_password_required() && !is_attachment() &&  wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), $size, false)):
                        $class = ' has-thumbnail';
                        $thumbnail_url = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), $size, false);
                        $thumbnail = get_the_post_thumbnail(get_the_ID(),'full');
                    else:
                        $class = ' no-image';
                        $thumbnail_url[0] = get_template_directory_uri(). '/assets/images/no-image.jpg';
                        $thumbnail = '<img src="'.esc_url(get_template_directory_uri(). '/assets/images/no-image.jpg').'" alt="'.get_the_title().'" />';
                    endif;
                    echo '<div class="cms-grid-media '.esc_attr($class).'">'.$thumbnail.'</div>';
                ?>
                <div class="content-hover text-center">
                    <div class="content-hover-inner">
                        <div class="content">
                            <?php echo  esc_attr($attorneys_introduction); ?>
                        </div>
                        <div class="cms-attorney-social">
                            <?php
                                for($i=1;$i<5;$i++){
                                    $icon = $attorney_meta->{"_cms_icon".$i};
                                    $link = $attorney_meta->{"_cms_link".$i};
                                    if(!empty($icon) && !empty($link)): ?>
                                        <a class="<?php echo esc_attr($icon);?>" href="<?php echo esc_url($link);?>"></a> 
                                    <?php endif;
                                }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="cms-attorney-meta text-center">
                <h3><a href="<?php the_permalink() ?>" ><?php the_title();?> </a></h3>
                <div class="cms-attorney-position">
                    <?php echo  esc_attr($attorney_meta->_cms_attorneys_position); ?>
                </div>
            </div>
        </div>
        <?php
    }
    ?>
</div>