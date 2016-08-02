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

		<div class="entry-content">
			<h2 class="entry-title ft-lo">
		    	<a href="<?php the_permalink(); ?>">
		    		<?php
			    		if(is_sticky()){
			                echo "<i class='fa fa-thumb-tack'></i>";
			            }
			    	?>
		    		<?php the_title(); ?>
		    	</a>
		    </h2>
			<div class="entry-content-inner">
				<?php echo substr(get_the_excerpt(), 0,300); ?>...
			</div>
			<?php
	    		wp_link_pages( array(
	        		'before'      => '<div class="pagination loop-pagination"><span class="page-links-title">' . esc_html__( 'Pages:','wp-trust') . '</span>',
	        		'after'       => '</div>',
	        		'link_before' => '<span class="page-numbers">',
	        		'link_after'  => '</span>',
	    		) );
			?>
			<div class="entry-readmore">
				<?php wp_trust_archive_readmore(); ?>
			</div>
			</br>
			</br>
		</div>
	<!-- .entry-blog -->
</article>
<!-- #post -->
