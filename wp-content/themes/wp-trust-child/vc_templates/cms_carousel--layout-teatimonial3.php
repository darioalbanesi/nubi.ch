<div class="cms-carousel cms-testimonial-layout3 text-center <?php echo esc_attr($atts['template']);?>" id="<?php echo esc_attr($atts['html_id']);?>">
    <?php
    $posts = $atts['posts'];
    while($posts->have_posts()){
        $posts->the_post();
        $description_color = isset($atts['description_color']) ? $atts['description_color'] : '';
        $testimonial_meta = wp_trust_post_meta_data();
        ?>
        <div class="cms-carousel-item cms-testimonial-item">
            <div class="cms-testimonial-wrapper clearfix">
                <div class="cms-carousel-body cms-testimonial-body">
                     <div class="content" style="color: <?php echo esc_attr($description_color); ?>;">
                        &ldquo;<?php echo substr(get_the_excerpt(), 0, 120); ?>&rdquo;
                     </div>
                </div>
            </div>
            <div class="cms-testimonial-footer">
                <div class="cms-testimonial-title">
                    <span class="author">&mdash; <?php the_title();?></span>
                </div>
            </div>
        </div>
        <?php
    }
    ?>
</div>