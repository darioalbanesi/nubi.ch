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
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="entry-blog <?php echo has_post_thumbnail() ? ' has-feature-img' : ' no-feature-img' ; ?>">
		<div class="entry-header clearfix">
		    <div class="entry-feature entry-feature-image">
		    	<?php the_post_thumbnail( 'full' ); ?>
		    	<div class="blog-date"><?php wp_trust_archive_detail_top(); ?></div>
		    </div>
		</div>
		<!-- .entry-header -->
		
		<div class="entry-content">
		    <div class="entry-meta"><?php wp_trust_archive_detail_bottom(); ?></div>
		    <h2 class="entry-title ft-lo">
	    		<?php
		    		if(is_sticky()){
		                echo "<i class='fa fa-thumb-tack'></i>";
		            }
		    	?>
	    		<?php the_title(); ?>
		    </h2>
			<div class="entry-content-inner">
				<?php the_content(); ?>
			</div>
			<div class="social-shared text-right">
				<?php wp_trust_get_socials_share(); ?>
			</div>
		</div>

		<!-- .entry-content -->
		<?php wp_trust_post_nav(); ?>
		
		<div class="entry-footer">
			<h3 class="cms-title"><?php esc_html_e('Author', 'wp-trust'); ?></h3> 
			<div class="blog-admin-post clearfix">
				<div class="admin-avt">
						<?php echo get_avatar( get_the_author_meta( 'ID' ), 'full' ); ?>
					</div>
				<div class="admin-info">
					<div class="admin-des">
						<?php the_author_meta( 'description' ); ?>
					</div>
				</div>
			</div>
		</div>


	</div>
	<!-- .entry-blog -->
</article>
<!-- #post -->
