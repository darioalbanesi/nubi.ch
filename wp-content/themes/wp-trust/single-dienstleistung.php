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
?>
<?php while ( have_posts() ) : the_post(); ?>
    <?php $temp_post = $post; ?>
    <div class="container">
        <div class="row">
            <div class="single-practice-wrap clearfix">
                <div class="single-practice-inner clearfix">
                    <div id="primary">
                        <div id="content" role="main">
                            <?php get_template_part( 'single-templates/single-practice/content', get_post_format() ); ?>
                            
                            <?php comments_template( '', true ); ?>

                        </div><!-- #content -->
                    </div><!-- #primary -->
                </div>
            </div>
        </div>
    </div>
<?php endwhile; // end of the loop. ?>
<?php get_footer(); ?>