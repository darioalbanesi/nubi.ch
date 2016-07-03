<?php
/**
 * The Template for displaying all single posts
 *
 * @package CMSSuperHeroes
 * @subpackage CMS Theme
 * @since 1.0.0
 */
get_header(); ?>

<?php
global $smof_data, $post, $wp_trust_meta;
if(isset($wp_trust_meta->_cms_post_full_width) && $wp_trust_meta->_cms_post_full_width != '') {
    $smof_data['post_full_width'] = $wp_trust_meta->_cms_post_full_width;
}
if(isset($wp_trust_meta->_cms_post_sidebar_left) && $wp_trust_meta->_cms_post_sidebar_left != '') {
    $smof_data['post_sidebar_left'] = $wp_trust_meta->_cms_post_sidebar_left;
}
?>
<?php while ( have_posts() ) : the_post(); ?>
    <?php $temp_post = $post; ?>
    <div class="<?php wp_trust_main_class(); ?> pt-single-post <?php if($smof_data['post_full_width'] == 0) { echo 'post-sidebar'; } ?>">
        <div class="row">
            <div class="single-post-wrap clearfix">
                <div class="single-post-inner <?php if($smof_data['post_sidebar_left']) { echo ' sidebar-left-active'; } ?> clearfix">
                    <div id="primary" class="<?php echo esc_attr($smof_data['post_full_width'] ? 'col-xs-12 col-sm-12 col-md-12 col-lg-12 full-width' : 'col-xs-12 col-sm-9 col-md-9 col-lg-9 sidebar-active') ; ?>">
                        <div id="content" role="main">
                            <?php get_template_part( 'single-templates/single/content', get_post_format() ); ?>
                            <?php wp_trust_related_post(); ?>
                            <?php comments_template( '', true ); ?>

                        </div><!-- #content -->
                    </div><!-- #primary -->
                    <?php if(!$smof_data['post_full_width']) : ?>
                        <div id="sidebar" class="col-xs-12 col-sm-3 col-md-3 col-lg-3 <?php if($smof_data['post_full_width'] == 1) { echo 'hidden-sidebar'; } ?>">
                            <?php get_sidebar(); ?>
                        </div><!-- #sidebar -->
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
<?php endwhile; // end of the loop. ?>
<?php get_footer(); ?>