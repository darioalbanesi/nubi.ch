<?php
/**
 * The default template for displaying content
 *
 * Used for both single and index/archive/search.
 *
 * @package CMSSuperHeroes
 * @subpackage CMS Theme
 * @since 1.0.0
 */
global $smof_data, $post, $wp_trust_meta;
$practice_meta = wp_trust_post_meta_data();

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="sg-practice clearfix">
		<?php if ( is_active_sidebar( 'practice-sidebar' ) ) { ?>
            <div class="sg-practice-sidebar col-xs-12 col-sm-3 col-md-3 col-lg-3">
                <?php dynamic_sidebar('practice-sidebar'); ?>
            </div>
        <?php } ?>		
		<div class="sg-practice-body <?php if ( is_active_sidebar( 'practice-sidebar' ) ) { echo 'col-xs-12 col-sm-9 col-md-9 col-lg-9'; } else { echo 'col-xs-12 col-sm-12 col-md-12 col-lg-12';} ?>">
			<div class="sg-practice-image">
				<?php the_post_thumbnail( 'full' ); ?>
			</div>
			<?php the_content(); ?>
		</div>
	</div>

</article>
<!-- #post -->
