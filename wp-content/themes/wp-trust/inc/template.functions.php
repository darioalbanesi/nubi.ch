<?php
/**
 * Page title template
 * @since 1.0.0
 * @author Fox
 */
function wp_trust_page_title(){
    global $smof_data, $wp_trust_meta, $wp_trust_base;
    
    if(is_page() && isset($wp_trust_meta->_cms_page_title) && $wp_trust_meta->_cms_page_title){
        if(isset($wp_trust_meta->_cms_page_title_type)){
            $smof_data['page_title_layout'] = $wp_trust_meta->_cms_page_title_type;
        }
        if (isset($wp_trust_meta->_cms_bg_image_page_title) && $wp_trust_meta->_cms_bg_image_page_title) {
            $smof_data['bg_image_page_title']['url'] = wp_get_attachment_url($wp_trust_meta->_cms_bg_image_page_title);
        }
    }

    if (is_single() && isset($smof_data['bg_image_page_title_post']['url'])) {
        $smof_data['bg_image_page_title']['url'] = $smof_data['bg_image_page_title_post']['url'];
    }

    if (is_singular('attorneys') && isset($smof_data['bg_image_page_title_team']['url'])) {
        $smof_data['bg_image_page_title']['url'] = $smof_data['bg_image_page_title_team']['url'];
    }

    if (is_singular('practice') && isset($smof_data['bg_image_page_title_practice']['url'])) {
        $smof_data['bg_image_page_title']['url'] = $smof_data['bg_image_page_title_practice']['url'];
    }

    if (is_singular('product') && isset($smof_data['bg_image_page_title_product']['url'])) {
        $smof_data['bg_image_page_title']['url'] = $smof_data['bg_image_page_title_product']['url'];
    }
    if(class_exists('Woocommerce')){
        if (is_woocommerce() && isset($smof_data['bg_image_page_title_product']['url'])) {
            $smof_data['bg_image_page_title']['url'] = $smof_data['bg_image_page_title_product']['url'];
        }
    }

    if($smof_data['page_title_layout']){
        ?>
        <div id="page-title" class="page-title br-style<?php echo ''.$smof_data['page_title_layout']; ?>" style="background-image: url(<?php echo esc_url($smof_data['bg_image_page_title']['url']); ?>);">
            <div class="container">
            <div class="row">
            <?php switch ($smof_data['page_title_layout']){
                case '1':
                    ?>
                        <div id="page-title-text" class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center">
                            <span class="sub-title">
                                <?php
                                    wp_trust_page_sub_title();
                                ?>
                            </span>
                            <h1><?php $wp_trust_base->wp_trust_get_page_title(); ?></h1>
                        </div>
                        <div id="breadcrumb-text" class="line-white col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center"><?php $wp_trust_base->wp_trust_get_breadcrumb(); ?></div>
                    <?php
                    break;
                case '2':
                    ?>
                        <div id="page-title-text" class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center">
                            <span class="sub-title">
                                <?php
                                    wp_trust_page_sub_title();
                                ?>
                            </span>
                            <h1><?php $wp_trust_base->wp_trust_get_page_title(); ?></h1>
                        </div>
                        <div id="breadcrumb-text" class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center"><?php $wp_trust_base->wp_trust_get_breadcrumb(); ?></div>
                    <?php          
                    break;
                case '3':
                    ?>
                        <div id="page-title-text" class="col-xs-12 col-sm-12 col-md-6 col-lg-6 text-left text-center-md">
                            <span class="sub-title">
                                <?php
                                    wp_trust_page_sub_title();
                                ?>
                            </span>
                            <h1><?php $wp_trust_base->wp_trust_get_page_title(); ?></h1>
                        </div>
                        <div id="breadcrumb-text" class="<?php if (!empty($wp_trust_meta->_cms_page_title_sub) && $wp_trust_meta->_cms_page_title_sub) { echo 'sub-title-active'; } ?> col-xs-12 col-sm-12 col-md-6 col-lg-6 text-right text-center-md">
                            <?php $wp_trust_base->wp_trust_get_breadcrumb(); ?>
                        </div>
                    <?php
                    break;
                case '4':
                    ?>
                        <div id="page-title-text" class="col-xs-12 col-sm-12 col-md-6 col-lg-6 text-left text-center-md">
                            <span class="icon-box-style"><i class="fa fa-briefcase"></i></span>
                            <div class="page-title-content">
                                <span class="sub-title">
                                    <?php
                                        wp_trust_page_sub_title();
                                    ?>
                                </span>
                                <h1><?php $wp_trust_base->wp_trust_get_page_title(); ?></h1>
                            </div>
                        </div>
                        <div id="breadcrumb-text" class="<?php if (!empty($wp_trust_meta->_cms_page_title_sub) && $wp_trust_meta->_cms_page_title_sub) { echo 'sub-title-active'; } ?> col-xs-12 col-sm-12 col-md-6 col-lg-6 text-right text-center-md">
                            <?php $wp_trust_base->wp_trust_get_breadcrumb(); ?>
                        </div>
                    <?php
                    break;
                case '5':
                    ?>
                        <div id="breadcrumb-text" class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <?php $wp_trust_base->wp_trust_get_breadcrumb(); ?>
                        </div>
                        <div id="page-title-text" class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <div class="page-title-content">
                                <span class="sub-title">
                                    <?php
                                        wp_trust_page_sub_title();
                                    ?>
                                </span>
                                <h1><?php $wp_trust_base->wp_trust_get_page_title(); ?></h1>
                            </div>
                        </div>
                    <?php
                    break;
                case '6':
                    ?>
                        <div id="page-title-text" class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center">
                            <span class="icon-box-style"><i class="fa fa-briefcase"></i></span>
                            <div class="page-title-content">
                                <h1><?php $wp_trust_base->wp_trust_get_page_title(); ?></h1>
                            </div>
                        </div>
                        <div id="breadcrumb-text" class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center">
                            <?php $wp_trust_base->wp_trust_get_breadcrumb(); ?>
                        </div>
                    <?php
                    break;
                case '7':
                    ?>
                        <div id="page-title-text" class="col-xs-12 col-sm-12 col-md-6 col-lg-6 text-left text-center-md">
                            <div class="page-title-content">
                                <span class="sub-title">
                                    <?php
                                        wp_trust_page_sub_title();
                                    ?>
                                </span>
                                <h1><?php $wp_trust_base->wp_trust_get_page_title(); ?></h1>
                            </div>
                        </div>
                        <div id="breadcrumb-text" class="<?php if (!empty($wp_trust_meta->_cms_page_title_sub) && $wp_trust_meta->_cms_page_title_sub) { echo 'sub-title-active'; } ?> col-xs-12 col-sm-12 col-md-6 col-lg-6 text-right text-center-md">
                            <?php $wp_trust_base->wp_trust_get_breadcrumb(); ?>
                        </div>
                    <?php
                    break;
                case '8':
                    ?>
                        <div id="page-title-text" class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center">
                            <span class="sub-title">
                                <?php
                                    wp_trust_page_sub_title();
                                ?>
                            </span>
                            <h1><?php $wp_trust_base->wp_trust_get_page_title(); ?></h1>
                        </div>
                        <div id="breadcrumb-text" class="line-white col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center"><?php $wp_trust_base->wp_trust_get_breadcrumb(); ?></div>
                    <?php
                    break;
            } ?>
            </div>
            </div>
        </div><!-- #page-title -->
        <?php
    }
}
/**
 * Get sub page title.
 *
 * @author Fox
 */
function wp_trust_page_sub_title() {
    global $wp_trust_meta, $post, $smof_data;

    if(!empty($wp_trust_meta->_cms_page_title_sub)){
        echo ''.esc_attr($wp_trust_meta->_cms_page_title_sub).'';
    } elseif (!empty($post->ID) && get_post_meta($post->ID, 'post_subtitle', true) && is_singular('post')){
        echo ''.esc_attr(get_post_meta($post->ID, 'post_subtitle', true)).'';
    } elseif (!empty(wp_trust_post_meta_data()->_cms_attorneys_sub_title) && is_singular('attorneys')) {
        echo ''.esc_attr(wp_trust_post_meta_data()->_cms_attorneys_sub_title).'';
    } elseif (!empty(wp_trust_post_meta_data()->_cms_practice_sub_title) && is_singular('practice')) {
        echo ''.esc_attr(wp_trust_post_meta_data()->_cms_practice_sub_title).'';
    } elseif (!empty($smof_data['shop_sub_title']) && is_singular('product')) {
        echo ''.esc_attr($smof_data['shop_sub_title']).'';
    } elseif (!empty(wp_trust_post_meta_data()->_cms_product_sub_title) && is_singular('product')) {
        echo ''.esc_attr(wp_trust_post_meta_data()->_cms_product_sub_title).'';
    }
}

/**
 * Get Header Layout.
 * 
 * @author Fox
 */
function wp_trust_header(){
    global $smof_data, $wp_trust_meta;
    /* header for page */
    if(isset($wp_trust_meta->_cms_header) && $wp_trust_meta->_cms_header){
        if(isset($wp_trust_meta->_cms_header_layout)){
            $smof_data['header_layout'] = $wp_trust_meta->_cms_header_layout;
        }
    }
    /* load template. */
    get_template_part('inc/header/header', $smof_data['header_layout']);
}
/**
 * Loading.
 * 
 * @author Fox
 */
function wp_trust_get_page_loading() {
    global $smof_data;
    if($smof_data['enable_page_loadding'] == '1'){
        echo '<div id="cms-loadding"><div class="cms-loader"></div></div>';
    }
}
/**
 * Get Footer Layout.
 * 
 * @author Fox
 */
function wp_trust_footer(){
    global $smof_data, $wp_trust_meta;
    /* header for page */
    if(isset($wp_trust_meta->_cms_footer) && $wp_trust_meta->_cms_footer){
        if(isset($wp_trust_meta->_cms_footer_layout)){
            $smof_data['footer_layout'] = $wp_trust_meta->_cms_footer_layout;
        }
    }
    /* load template. */
    get_template_part('inc/footer/footer', $smof_data['footer_layout']);
}

/**
 * Get menu location ID.
 * 
 * @param string $option
 * @return NULL
 */
function wp_trust_menu_location($option = '_cms_primary'){
    global $wp_trust_meta;
    /* get menu id from page setting */
    return (isset($wp_trust_meta->$option) && $wp_trust_meta->$option) ? $wp_trust_meta->$option : null ;
}

/**
 * Add page class
 * 
 * @author Fox
 * @since 1.0.0
 */
function wp_trust_page_class(){
    global $smof_data;
    
    $page_class = '';
    /* check boxed layout */
    if($smof_data['body_layout']){
        $page_class = 'cs-boxed';
    } else {
        $page_class = 'cs-wide';
    }
    
    echo apply_filters('wp_trust_page_class', $page_class);
}

/**
 * Add main class
 * 
 * @author Fox
 * @since 1.0.0
 */
function wp_trust_main_class(){
    global $wp_trust_meta;
    
    $main_class = '';
    /* chect content full width */
    if(isset($wp_trust_meta->_cms_full_width) && $wp_trust_meta->_cms_full_width){
        /* full width */
        $main_class = "no-container";
    } else {
        /* boxed */
        $main_class = "container";
    }
    
    echo apply_filters('wp_trust_main_class', $main_class);
}

/**
 * Archive detail
 * 
 * @author Fox
 * @since 1.0.0
 */
function wp_trust_archive_detail_top(){
    ?>
    <ul>
        <li class="detail-date">
            <a href="<?php echo get_day_link(get_the_time('Y'),get_the_time('m'),get_the_time('d'));?>">
                <span><?php echo get_the_date("F"); ?></span>
                <span class="ft-lo"><?php echo get_the_date("d"); ?></span>
            </a>
        </li>
    </ul>
    <?php
}
function wp_trust_archive_detail_bottom(){
    ?>
    <ul>
        <li class="detail-author"><?php esc_html_e('Posted By: ', 'wp-trust'); ?> <?php the_author_posts_link(); ?></li>
        <?php if(has_category()): ?>
        <li class="detail-terms"><?php the_terms( get_the_ID(), 'category', ''.esc_html__('Posted In: ', 'wp-trust'), ' , ' ); ?></li>
        <?php endif; ?>
        <li class="detail-tags"><?php the_tags( 'Tags: ', ', ' ); ?></li>
        <li class="detail-date">
            <?php esc_html_e('Date: ', 'wp-trust'); ?>
            <a href="<?php echo get_day_link(get_the_time('Y'),get_the_time('m'),get_the_time('d'));?>">
                <span><?php echo get_the_date(); ?></span>
            </a>
        </li>
        <li class="post-details-right right">
            <ul>
                <li class="comment"><a href="<?php the_permalink(); ?>"><i class="fa fa-comments"></i> <?php echo comments_number('0','1','%'); ?></a></li>
                <li class="counter-view"><i class="fa fa-eye"></i>
                    <?php if(function_exists('wp_trust_post_views')) { 
                        echo wp_trust_post_views(get_the_ID()); 
                    }?>
                </li>
            </ul>
        </li>
    </ul>
    <?php
}

/**
 * Archive readmore
 * 
 * @author Fox
 * @since 1.0.0
 */
function wp_trust_archive_readmore(){
    echo '<a class="btn btn-primary btn-lg" href="'.get_the_permalink().'" title="'.get_the_title().'" >'.esc_html__('Read More', 'wp-trust').'</a>';
}

/**
 * Media Audio.
 * 
 * @param string $before
 * @param string $after
 */
function wp_trust_archive_audio() {
    global $wp_trust_base;
    /* get shortcode audio. */
    $shortcode = $wp_trust_base->wp_trust_get_shortcode_from_content('audio', get_the_content());
    
    if($shortcode != ''){
        echo do_shortcode($shortcode);
        
        return true;
        
    } else {
        if(has_post_thumbnail()){
            the_post_thumbnail();
        }
        
        return false;
    }
    
}

/**
 * Media Video.
 *
 * @param string $before
 * @param string $after
 */
function wp_trust_archive_video() {
    
    global $wp_embed, $wp_trust_base;
    /* Get Local Video */
    $local_video = $wp_trust_base->wp_trust_get_shortcode_from_content('wpvideo', get_the_content());
    
    /* Get Youtobe or Vimeo */
    $remote_video = $wp_trust_base->wp_trust_get_shortcode_from_content('embed', get_the_content());
    
    if($local_video){
        /* view local. */
        echo do_shortcode($local_video);
        
        return true;
        
    } elseif ($remote_video) {
        /* view youtobe or vimeo. */
        echo ''.$wp_embed->run_shortcode($remote_video);
        
        return true;
        
    } elseif (has_post_thumbnail()) {
        /* view thumbnail. */
        the_post_thumbnail();
    } else {
        return false;
    }
    
}

/**
 * Gallerry Images
 * 
 * @author Fox
 * @since 1.0.0
 */
function wp_trust_archive_gallery(){
    global $wp_trust_base;
    /* get shortcode gallery. */
    $shortcode = $wp_trust_base->wp_trust_get_shortcode_from_content('gallery', get_the_content());
    
    if($shortcode != ''){
        preg_match('/\[gallery.*ids=.(.*).\]/', $shortcode, $ids);
        
        if(!empty($ids)){
        
            $array_id = explode(",", $ids[1]);
            ?>
            <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                <?php $i = 0; ?>
                <?php foreach ($array_id as $image_id): ?>
                    <?php
                    $attachment_image = wp_get_attachment_image_src($image_id, 'full', false);
                    if($attachment_image[0] != ''):?>
                        <div class="item <?php if( $i == 0 ){ echo 'active'; } ?>">
                            <img style="width:100%;" data-src="holder.js" src="<?php echo esc_url($attachment_image[0]);?>" alt="" />
                        </div>
                    <?php $i++; endif; ?>
                <?php endforeach; ?>
                </div>
                <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                    <span class="fa fa-angle-left"></span>
                </a>
                <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                    <span class="fa fa-angle-right"></span>
                </a>
            </div>
            <?php
            
            return true;
        
        } else {
            return false;
        }
    } else {
        if(has_post_thumbnail()){
            the_post_thumbnail();
        }
    }
}

/**
 * Quote Text.
 * 
 * @author Fox
 * @since 1.0.0
 */
function wp_trust_archive_quote() {
    /* get text. */
    preg_match('/\<blockquote\>(.*)\<\/blockquote\>/', get_the_content(), $blockquote);
    
    if(!empty($blockquote[0])){
        echo ''.$blockquote[0].'';
        return true;
    } else {
        if(has_post_thumbnail()){
            the_post_thumbnail();
        }
        return false;
    }
}

/**
 * List socials share for post.
 * 
 * @since 1.0.0
 */
function wp_trust_get_socials_share(){
    ?>
    <ul>
    <li><span><?php esc_html_e('Share This Article : ', 'wp-trust'); ?></span></li>
    <li><a title="Facebook" data-placement="top" data-rel="tooltip" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink();?>"><span class="share-box"><i class="fa fa-facebook"></i></span></a></li>
    <li><a title="Twitter" data-placement="top" data-rel="tooltip" target="_blank" href="https://twitter.com/home?status=<?php esc_html_e('Check out this article', 'wp-trust');?>:%20<?php the_title();?>%20-%20<?php the_permalink();?>"><span class="share-box"><i class="fa fa-twitter"></i></span></a></li>
    <li><a title="Google Plus" data-placement="top" data-rel="tooltip" target="_blank" href="https://plus.google.com/share?url=<?php the_permalink();?>"><span class="share-box"><i class="fa fa-google-plus"></i></span></a></li>
    <li class="social-pinterest"><a target="_blank" href="https://pinterest.com/pin/create/button/?url=<?php the_permalink();?>"><span class="share-box"><i class="fa fa-pinterest"></i></span></a></li>
    </ul>
    <?php
}

/* 
/**
 * Related Gallery
 * 
 * @since 1.0.0
 */
function wp_trust_related_gallery() {
    global $post;

    $posttags = get_the_terms($post->ID, 'galeries-category');

    if(empty($posttags)) return ;

    $tags = array();

    foreach ($posttags as $tag) {

        $tags[] = $tag->term_id;
    }

    $query = new WP_Query(array('posts_per_page'=> 10, 'post_type' => 'galeries', 'post_status'=> 'publish', 'tax_query'=>array(array('taxonomy'=>'galeries-category', 'field'=>'id', 'terms'=>$tags))));

    if($query->have_posts()){
        ?> <div class="layout-gallery gallery-full cms-related-gallery clearfix"> <?php
        while ($query->have_posts()): $query->the_post();
        ?>
        <article>
            <div class="cms-grid-item">
                <div class="cms-grid-item-inner cms-gallery-item">
                    <div class="cms-gallery-image">
                        <?php 
                            if(has_post_thumbnail() && !post_password_required() && !is_attachment() &&  wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'full', false)):
                                $class = ' has-thumbnail';
                                $thumbnail_url = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'full', false);
                                $thumbnail = get_the_post_thumbnail(get_the_ID(),'full');
                            else:
                                $class = ' no-image';
                                $thumbnail_url[0] = CMS_IMAGES.'no-image.jpg';
                                $thumbnail = '<img src="'.esc_url(CMS_IMAGES).'no-image.jpg" alt="'.get_the_title().'" />';
                            endif;
                            echo '<div class="cms-grid-media  has-thumbnail">'.$thumbnail.'</div>';
                        ?>
                        <div class="cms-gallery-image-links">
                            <a href="<?php echo esc_url($thumbnail_url[0]); ?>" class="cms-prettyphoto p-view"><i class="rt-icon-zoom-outline"></i></a>
                            <a class="p-link" title="<?php the_title(); ?>" href="<?php the_permalink() ?>" rel=""><i class="rt-icon-location-outline"></i></a>
                        </div>
                    </div>
                    <div class="cms-gallery-description-layout2">
                        <h3><a href="<?php the_permalink() ?>" ><?php the_title();?> </a></h3>
                    </div>
                </div>
            </div>
        </article>
        <?php
        endwhile;
        ?> </div> <?php
    }
    
    wp_reset_postdata();
}

/* Related Post */
function wp_trust_related_post() {
    global $post;

    $posttags = get_the_category($post->ID);
    
    if(empty($posttags)) return ;
    
    $tags = array();
    
    foreach ($posttags as $tag) {
        
        $tags[] = $tag->term_id;
    }
    
    $query = new WP_Query(array('posts_per_page'=> 3, 'post_type' => 'post', 'post_status'=> 'publish', 'category__in'=>$tags));
    
    if($query->have_posts()){
        ?> 
        <div class="cms-related-post clearfix"> 
            <h3 class="cms-title"><?php esc_html_e('Related Posts','wp-trust'); ?></h3>
           <div class="cms-related-post-inner row">
        <?php
        while ($query->have_posts()): $query->the_post();
        ?>
            <div class="item <?php echo has_post_thumbnail() ? ' has-feature-img' : ' no-feature-img' ; ?> col-xs-12 col-sm-6 col-md-4 col-lg-4">
                <div class="item-inner">
                    <?php the_post_thumbnail('wp_trust_images-sm'); ?>
                    <div class="blog-date"><?php wp_trust_archive_detail_top(); ?></div>
                    <h3 class="title"><a href="<?php echo get_the_permalink(); ?>"><?php the_title(); ?></a></h3>
                    <div class="tr-overlay"></div>
                </div>
            </div>
        <?php
        endwhile;
        ?> </div></div> <?php
    }
    
    wp_reset_postdata();
}