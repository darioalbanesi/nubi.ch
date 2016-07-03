<div class="cms-carousel cms-testimonial-layout1 custom-layout2 <?php echo esc_attr($atts['template']);?>" id="<?php echo esc_attr($atts['html_id']);?>">
    <?php
    $posts = $atts['posts'];
    while($posts->have_posts()){
        $posts->the_post();
        $title_color = isset($atts['title_color']) ? $atts['title_color'] : '';
        $testimonial_meta = wp_trust_post_meta_data();
        ?>
        <div class="cms-carousel-item cms-testimonial-item">
            <div class="cms-testimonial-wrapper clearfix">
                <span class="icon-quote"><i class="fa fa-quote-left"></i></span>
                <div class="cms-carousel-body cms-testimonial-body">
                     <div class="content">
                        <?php the_content(); ?>
                     </div>
                </div>
            </div>
            <div class="cms-testimonial-footer">
                <div class="cms-testimonial-position">
                    <span class="author" style="color: <?php echo esc_attr($title_color); ?>;"><?php the_title();?></span>
                    <span class="position">
                        <?php echo esc_attr($testimonial_meta->_cms_testimonial_position); ?>
                    </span>
                </div>
            </div>
        </div>
        <?php
    }
    ?>
</div>