<?php
/**
 * The Header template for our theme
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package CMSSuperHeroes
 * @subpackage CMS Theme
 * @since 1.0.0
 */
?>
		<?php wp_trust_footer(); ?>
		<div class="cshero-popup-search">
			<div class="cshero-search-inner container placeholder-dark">    
				<form method="get" id="searchform" class="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
					<div>
						<input type="text" value="<?php echo get_search_query(); ?>" name="s" id="s" />
						<input type="submit" id="searchsubmit" value="<?php esc_html_e( 'Search', 'wp-trust' ); ?>" />
					</div>
				</form>
			</div>                    
		</div>
		<div class="cshero-hidden-sidebar">
			<?php if ( is_active_sidebar( 'hidden-sidebar' ) ) { ?>
				<i class="sidebar-close ion-close-round"></i>
				<div class="sidebar-inner">
			        <?php dynamic_sidebar('hidden-sidebar'); ?>
				</div>
			<?php } ?>
		</div>
	</body>
</html>