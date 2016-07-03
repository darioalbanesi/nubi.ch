<div class="cms-carousel cms-testimonial-layout1 custom-layout1 <?php echo esc_attr($atts['template']);?>" id="<?php echo esc_attr($atts['html_id']);?>">
    <?php
    $posts = $atts['posts'];
    while($posts->have_posts()){
        $posts->the_post();
        $testimonial_meta = wp_trust_post_meta_data();
        ?>
        <div class="cms-carousel-item cms-testimonial-item">
            <div class="cms-testimonial-wrapper clearfix">
                <span class="icon-quote"><i class="fa fa-quote-left"></i></span>
                <div class="cms-testimonial-header">
                    <?php 
                        if(has_post_thumbnail() && !post_password_required() && !is_attachment() &&  wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'full', false)):
                            $class = ' has-thumbnail';
                            $thumbnail = get_the_post_thumbnail(get_the_ID(),'medium');
                        else:
                            $class = ' no-image';
                            $thumbnail = '<img src="'.esc_url(get_template_directory_uri(). '/assets/images/no-image.jpg').'" alt="'.get_the_title().'" />';
                        endif;
                        echo '<div class="cms-carousel-media '.esc_attr($class).'">'.$thumbnail.'</div>';
                    ?>
                    <div class="main-title">
                        <h3><?php echo esc_attr($testimonial_meta->_cms_testimonial_title); ?></h3>
                    </div>
                </div>
                <div class="cms-carousel-body cms-testimonial-body">
                     <div class="content"><?php the_content(); ?></div>
                </div>
            </div>
            <div class="cms-testimonial-footer">
                <div class="cms-testimonial-position">
                    <span class="author"><?php the_title();?></span>
                    <span class="position"><?php echo esc_attr($testimonial_meta->_cms_testimonial_position); ?></span>
                </div>
            </div>
        </div>
        <?php
    }
    ?>
</div>