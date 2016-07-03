<?php 
    /* get categories */
        $taxo = 'attorneys-categories';
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
<div class="layout-attorney attorney-layout2 filtrer-center cms-grid-wraper <?php echo esc_attr($atts['template']);?>" id="<?php echo esc_attr($atts['html_id']);?>">
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
    <div class="clearfix row <?php echo esc_attr($atts['grid_class']);?>">
        <?php
        $posts = $atts['posts'];
        $size = 'full';
        while($posts->have_posts()){
            $posts->the_post();
            $groups = array();
            $groups[] = '"all"';
            $attorney_meta = wp_trust_post_meta_data();
            $show_hide_navigation = isset( $atts['show_hide_navigation'] ) ? $atts['show_hide_navigation'] : 'yes';
            $attorneys_introduction = isset( $attorney_meta->_cms_attorneys_introduction) ? $attorney_meta->_cms_attorneys_introduction : '';
            foreach(cmsGetCategoriesByPostID(get_the_ID(),$taxo) as $category){
                $groups[] = '"category-'.$category->slug.'"';
            }
            ?>
            <div class="cms-grid-item cms-attorney-item <?php echo esc_attr($atts['item_class']);?>" data-groups='[<?php echo implode(',', $groups);?>]'>
                <div class="cms-grid-item-inner">
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
                        <div class="tr-overlay"></div>
                        <div class="content-hover text-center">
                            <div class="content-hover-inner">
                                <div class="cms-attorney-meta text-center">
                                    <h3><a href="<?php the_permalink() ?>" ><?php the_title();?> </a></h3>
                                    <div class="cms-attorney-position">
                                        <?php echo  esc_attr($attorney_meta->_cms_attorneys_position); ?>
                                    </div>
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
                        <div class="cms-attorney-meta bottom text-center">
                            <h3><a href="<?php the_permalink() ?>" ><?php the_title();?> </a></h3>
                            <div class="cms-attorney-position">
                                <?php echo  esc_attr($attorney_meta->_cms_attorneys_position); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php
        }
        ?>
    </div>
    <?php if($show_hide_navigation == 'yes') {
        wp_trust_paging_nav();
    } ?>
</div>