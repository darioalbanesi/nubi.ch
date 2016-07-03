<div class="cms-carousel cms-demos text-center <?php echo esc_attr($atts['template']);?>" id="<?php echo esc_attr($atts['html_id']);?>">
    <?php
    $posts = $atts['posts'];
    while($posts->have_posts()){
        $posts->the_post();
        $demo_meta = wp_trust_post_meta_data();
        ?>
        <div class="cms-carousel-item">
            <div class="cms-carousel-image">
                <a href="<?php if(!empty($demo_meta->_cms_demo_url)) { echo esc_url($demo_meta->_cms_demo_url); } ?>">
                    <?php 
                        if(has_post_thumbnail() && !post_password_required() && !is_attachment() &&  wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'full', false)):
                            $class = ' has-thumbnail';
                            $thumbnail = get_the_post_thumbnail(get_the_ID(),'full');
                        else:
                            $class = ' no-image';
                            $thumbnail = '<img src="'.get_template_directory_uri(). '/assets/images/no-image.jpg" alt="'.get_the_title().'" />';
                        endif;
                        echo ''.$thumbnail.'';
                    ?>
                    <span class="ion-forward"></span>
                </a>
            </div>
            <div class="cms-carousel-title">
                <a href="<?php if(!empty($demo_meta->_cms_demo_url)) { echo esc_url($demo_meta->_cms_demo_url); } ?>"><?php the_title();?></a>
            </div>
        </div>
        <?php
    }
    ?>
</div>