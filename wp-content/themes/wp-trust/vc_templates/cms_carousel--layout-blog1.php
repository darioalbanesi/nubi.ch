<div class="cms-carousel cms-carousel-blog-layout1 <?php echo esc_attr($atts['template']);?>" id="<?php echo esc_attr($atts['html_id']);?>">
    <?php
    $posts = $atts['posts'];
    while($posts->have_posts()){
        $posts->the_post();
        $size = 'full';
        ?>
        <div class="cms-carousel-item <?php echo esc_attr($atts['item_class']);?>">
                <?php 
                    if(has_post_thumbnail() && !post_password_required() && !is_attachment() &&  wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), $size, false)):
                        $class = ' has-feature-img';
                        $thumbnail_url = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), $size, false);
                        $thumbnail = get_the_post_thumbnail(get_the_ID(),'full');
                    else:
                        $class = ' no-feature-img';
                        $thumbnail_url[0] = get_template_directory_uri(). '/assets/images/no-image.jpg';
                        $thumbnail = '<img src="'.get_template_directory_uri(). '/assets/images/no-image.jpg" alt="'.get_the_title().'" />';
                    endif;
                ?>
                <div class="entry-blog <?php echo esc_attr($class); ?>">
                    <div class="entry-header">
                        <div class="entry-feature">
                            <?php echo '<div class="cms-grid-media '.esc_attr($class).'">'.$thumbnail.'</div>'; ?>
                            <div class="blog-date"><?php wp_trust_archive_detail_top(); ?></div>
                        </div>
                    </div>
                    <div class="entry-content">
                        <div class="entry-meta"><?php wp_trust_archive_detail_bottom(); ?></div>
                        <h3 class="entry-title ft-lo">
                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                        </h3>
                        <div class="entry-content-inner-grid">
                            <?php echo substr(get_the_excerpt(), 0,150); ?>...
                        </div>
                    </div>
                </div>
            </div>
        <?php
    }
    ?>
</div>