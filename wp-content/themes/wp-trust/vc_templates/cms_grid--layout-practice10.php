<?php
    /* get categories */
        $taxo = 'dienstleistung-kategorien';
        $_category = array();
        if(!isset($args['cat']) || $args['cat']==''){
            $terms = get_terms($taxo);
            foreach ($terms as $cat){
                $_category[] = $cat->term_id;
            }
        } else {
            $_category  = explode(',', $args['cat']);
        }
        $atts['categories'] = $_category;
        $pretty_rel_random = ' rel="prettyPhoto[rel-' . get_the_ID() . '-' . rand() . ']"'; //rel-'.rand();
?>
<div class="layout-practice practice-layout3 practice-layout10 practice-layout10 filtrer-center cms-grid-wraper <?php echo esc_attr($atts['template']);?>" id="<?php echo esc_attr($atts['html_id']);?>">
    <?php if($atts['filter']=="true" and $atts['layout']=='masonry'):?>
        <div class="cms-grid-filter">
            <ul>
                <li><a class="active" href="#" data-group="all"><?php esc_html_e('All', 'wp-trust'); ?></a></li>
                <?php foreach($atts['categories'] as $category):?>
                    <?php $term = get_term( $category, $taxo );?>
                    <li><a href="#" data-group="<?php echo esc_attr('category-'.$term->slug);?>">
                            <?php echo esc_html($term->name);?>
                        </a>
                    </li>
                <?php endforeach;?>
            </ul>
        </div>
    <?php endif;?>
    <div class="clearfix <?php echo esc_attr($atts['grid_class']);?>">
        <?php
        $posts = $atts['posts'];
        $size = 'wp_trust_370X245';
        while($posts->have_posts()){
            $posts->the_post();
            $groups = array();
            $groups[] = '"all"';
            $practice_meta = wp_trust_post_meta_data();
            $show_hide_navigation = isset( $atts['show_hide_navigation'] ) ? $atts['show_hide_navigation'] : 'yes';
            $practice_introduction = isset( $practice_meta->_cms_practice_introduction) ? $practice_meta->_cms_practice_introduction : '';
            $practice_icon = isset( $practice_meta->_cms_practice_icon) ? $practice_meta->_cms_practice_icon : '';
            $practice_sub_title = isset( $practice_meta->_cms_practice_sub_title) ? $practice_meta->_cms_practice_sub_title : '';
            foreach(cmsGetCategoriesByPostID(get_the_ID(),$taxo) as $category){
                $groups[] = '"category-'.$category->slug.'"';
            }
            ?>
            <div class="cms-grid-item cms-practice-item <?php echo esc_attr($atts['item_class']);?>" data-groups='[<?php echo implode(',', $groups);?>]'>
                <div class="cms-grid-item-inner">
                    <div class="cms-practice-content content-hidden text-center">
                        <div class="cms-practice-icon">
                            <i class="<?php echo  esc_attr($practice_icon); ?>"></i>
                        </div>
                        <span class="cmsline-gray"></span>
                        <h3 class="cms-practice-title">
                            <a href="<?php the_permalink() ?>"><?php the_title();?></a>
                        </h3>
                    </div>
                    <?php
                        if(has_post_thumbnail() && !post_password_required() && !is_attachment() &&  wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), $size, false)):
                            $thumbnail = wp_get_attachment_url( get_post_thumbnail_id(get_the_ID()), 'full');
                        else:
                            $thumbnail = esc_url(get_template_directory_uri(). '/assets/images/no-image.jpg');
                        endif;
                    ?>
                    <div class="cms-practice-content  content-hover text-center" style="background-image: url(<?php echo esc_url($thumbnail); ?>);">
                        <div class="cms-practice-conten-inner">
                            <div class="cms-practice-icon">
                                <i class="<?php echo  esc_attr($practice_icon); ?>"></i>
                            </div>
                            <h3 class="cms-practice-title">
                                <a href="<?php the_permalink() ?>"><?php the_title();?></a>
                            </h3>
                            <span class="cmsline-gray"></span>
                            <div class="cms-practice-content-inner">
                                <?php echo  substr(esc_attr($practice_introduction),0,120); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php
        }
        ?>
    </div>
</div>
