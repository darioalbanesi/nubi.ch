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
$attorney_meta = wp_trust_post_meta_data();

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="sg-attorney clearfix">
		<div class="sg-attorney-header text-center col-xs-12 col-sm-3 col-md-3 col-lg-3">
			<div class="sg-attorney-image">
				<?php the_post_thumbnail( 'full' ); ?>
			</div>
			<h3 class="sg-attorney-title">
			    <?php the_title(); ?>
		    </h3>
		    <div class="sg-attorney-position">
	            <?php if (!empty($attorney_meta->_cms_attorneys_position)) { echo  esc_attr($attorney_meta->_cms_attorneys_position); } ?>
	        </div>
	        <?php if (isset($attorney_meta->_cms_attorneys_book_url) && $attorney_meta->_cms_attorneys_book_url) { ?>
	        	<a class="btn-book btn btn-primary btn-block" href="<?php if (!empty($attorney_meta->_cms_attorneys_book_url)) { echo  esc_url($attorney_meta->_cms_attorneys_book_url); } ?>">
	        		<?php
	        			if (isset($attorney_meta->_cms_attorneys_book_text) && $attorney_meta->_cms_attorneys_book_text) {
	        				echo esc_attr($attorney_meta->_cms_attorneys_book_text);
	        			} else {
	        				esc_html_e('Book AN Appointment','wp-trust');
	        			}
	        		?>
	        	</a>
	    	<?php } ?>
	    </div>

		<div class="sg-attorney-body <?php if ( is_active_sidebar( 'attorney-sidebar' ) ) { echo 'col-xs-12 col-sm-6 col-md-6 col-lg-6'; } else { echo 'col-xs-12 col-sm-9 col-md-9 col-lg-9';} ?>">
			<?php the_content(); ?>
		</div>

		<?php if ( is_active_sidebar( 'attorney-sidebar' ) ) { ?>
            <div class="sg-attorney-sidebar col-xs-12 col-sm-3 col-md-3 col-lg-3">
                <?php dynamic_sidebar('attorney-sidebar'); ?>
            </div>
        <?php } ?>
	</div>

</article>
<!-- #post -->
