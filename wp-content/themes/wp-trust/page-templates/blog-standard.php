<?php
/**
 * Template Name: Blog Standard
 *
 * @package CMSSuperHeroes
 * @subpackage CMS Theme
 * @since 1.0.0
 * @author Fox
 */
get_header(); 
global $smof_data, $wp_query, $post, $wp_trust_meta, $paged;
if (isset($wp_trust_meta->_cms_blog_sidebar) && $wp_trust_meta->_cms_blog_sidebar) {
    $smof_data['blog_sidebar'] = $wp_trust_meta->_cms_blog_sidebar;
    if(isset($wp_trust_meta->_cms_blog_sidebar_position)){
        $smof_data['blog_sidebar_position'] = $wp_trust_meta->_cms_blog_sidebar_position;
    }
}
?>
<div id="page-blog-standard" class="<?php if ($smof_data['blog_sidebar_position'] == 'sidebar-left') { echo 'sidebar-left-active'; } ?>">
    <div class="container">
        <div class="row">
            <section id="primary" class="<?php if($smof_data['blog_sidebar'] == '1') { echo 'col-xs-12 col-sm-9 col-md-9 col-lg-9 sidebar-active'; }else  { echo 'col-xs-12 col-sm-12 col-md-12 col-lg-12 page-full-width'; } ?>">
                <div id="content" role="main">
                    
                    <?php query_posts('post_type=post&showposts='.get_option('posts_per_page').'&paged='.$paged); ?>
                    
                    <?php if ( have_posts() ) : ?>
                        <?php while ( have_posts() ) : the_post();
                            /* Include the post format-specific template for the content. If you want to
                             * this in a child theme then include a file called called content-___.php
                             * (where ___ is the post format) and that will be used instead.
                             */
                             get_template_part( 'single-templates/content/content', get_post_format() );
                        endwhile; // end of the loop.?>
                        
                        <?php wp_trust_paging_nav(); ?>
                        
                    <?php else : ?>
                    
                        <?php get_template_part( 'single-templates/content', 'none' ); ?>
                    <?php endif; ?>
                
                </div><!-- #content -->
            </section><!-- #primary -->
            <?php if($smof_data['blog_sidebar'] == '1') { ?>
                <div id="sidebar" class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                    <?php get_sidebar(); ?>
                </div>
            <?php } ?>
        </div>
    </div>
</div>
<?php get_footer(); ?>