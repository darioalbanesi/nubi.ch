<div class="cms-carousel cms-testimonial-layout1 custom-layout4 <?php echo esc_attr($atts['template']);?>" id="<?php echo esc_attr($atts['html_id']);?>">
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
                    <div class="main-title">
                        <h3><?php echo esc_attr($testimonial_meta->_cms_testimonial_title); ?></h3>
                    </div>
                </div>
                <div class="cms-carousel-body cms-testimonial-body">
                     <div class="content"><?php the_content(); ?></div>
                </div>
                <div class="cms-testimonial-position">
                    <span class="author"><?php the_title();?></span>
                </div>
            </div>
        </div>
        <?php
    }
    ?>
</div>