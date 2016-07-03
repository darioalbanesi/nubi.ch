<?php
    $navigation_align = isset($atts['navigation_align']) ? $atts['navigation_align'] : 'nav-default';
?>
<div class="cms-carousel cms-carousel-client cms-carousel-client-layout1 <?php echo esc_attr($navigation_align); ?> <?php echo esc_attr($atts['template']);?>" id="<?php echo esc_attr($atts['html_id']);?>">
    <?php
    $posts = $atts['posts'];
    $counter =0;
    $margin = isset($atts['margin']) ? $atts['margin'] : '';
    $rows = 2;
    $wp_query = new WP_Query();
    while($posts->have_posts()){
        $posts->the_post();
        $client_meta = wp_trust_post_meta_data();
        $counter ++;
        $item_position = ($counter % 2 == 0) ? "bottom-item" : "top-item";
        if($rows == 1){
            echo '<div class="cs-client-carousel-item-wrap">';
        } else {
            if($counter % $rows == 1){
                echo '<div class="cs-client-carousel-item-wrap">';
            }
        }
        ?>
        <div class="cms-carousel-item <?php echo esc_attr($item_position);?>" style="margin-bottom: <?php echo esc_attr($margin); ?>px;">
            <a href="<?php echo esc_url($client_meta->_cms_client_url); ?>" title="<?php the_title(); ?>">
                <?php 
                    if(has_post_thumbnail() && !post_password_required() && !is_attachment() &&  wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'full', false)):
                        $class = ' has-thumbnail';
                        $thumbnail = get_the_post_thumbnail(get_the_ID(),'medium');
                    else:
                        $class = ' no-image';
                        $thumbnail = '<img src="'.esc_url(get_template_directory_uri(). '/assets/images/no-image.jpg').'" alt="'.get_the_title().'" />';
                    endif;
                    echo '<span class="cms-carousel-media '.esc_attr($class).'"><span class="cms-carousel-shadow">'.$thumbnail.'</span></span>';
                ?>
            </a>
        </div>
    <?php
        if($rows == 1){
            echo '</div>';
        }else{
            if(($counter % $rows == 0)||($counter==$wp_query->post_count)){
                echo '</div>';
            }
        }
    }
    ?>
</div>