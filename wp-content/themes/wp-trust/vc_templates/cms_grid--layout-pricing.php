<?php 
    global $post;
?>
<div class="cms-grid-wraper cms-pricing-layout1 <?php echo esc_attr($atts['template']);?>" id="<?php echo esc_attr($atts['html_id']);?>">
    <div class="row <?php echo esc_attr($atts['grid_class']);?>">
        <?php
        $posts = $atts['posts'];
        $size = ($atts['layout']=='basic')?'thumbnail':'medium';
        while($posts->have_posts()){
            $posts->the_post();
            $groups = array();
            $groups[] = '"all"';
            $pricing_meta = wp_trust_post_meta_data();
            ?>
            <div class="<?php echo esc_attr($atts['item_class']);?>" data-groups='[<?php echo implode(',', $groups);?>]'>
                <div class="cms-grid-item cms-pricing-item">
                    <div class="cms-grid-header">
                        <h3 class="cms-grid-title cms-pricing-title ft-r"><?php the_title();?></h3>
                        <span class="sub-title"><?php if(!empty($pricing_meta->_cms_pricing_sub_title)) { echo esc_attr($pricing_meta->_cms_pricing_sub_title); } ?></span>
                        <div class="cms-pricing-price ft-lo">
                            <span class="unit"><?php if(!empty($pricing_meta->_cms_pricing_currency)) { echo esc_attr($pricing_meta->_cms_pricing_currency); } ?></span>
                            <span class="price"><?php if(!empty($pricing_meta->_cms_pricing_price)) { echo esc_attr($pricing_meta->_cms_pricing_price); } ?></span>
                            <span class="time"><?php if(!empty($pricing_meta->_cms_pricing_time)) { echo esc_attr($pricing_meta->_cms_pricing_time); } ?></span>
                        </div>
                    </div>
                    <div class="cms-grid-body cms-pricing-body">
                        <span class="description ft-lo"><?php if(!empty($pricing_meta->_cms_pricing_des)) { echo esc_attr($pricing_meta->_cms_pricing_des); } ?></span>
                        <div class="cms-pricing-content">
                            <?php the_content(); ?>
                        </div>
                        <div class="cms-pricing-readmore"><a href="<?php if(!empty($pricing_meta->_cms_pricing_btn_link)) { echo esc_url($pricing_meta->_cms_pricing_btn_link); } ?>" class="btn btn-primary btn-block"><?php if(!empty($pricing_meta->_cms_pricing_btn_text)) { echo esc_attr($pricing_meta->_cms_pricing_btn_text); } ?></a></div>
                    </div>
                </div>
            </div>
            <?php
        }
        ?>
    </div>
</div>