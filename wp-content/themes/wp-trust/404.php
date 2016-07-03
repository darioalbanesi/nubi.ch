<?php
/**
 * The template for displaying 404 pages (Not Found)
 * 
 * @package CMSSuperHeroes
 * @subpackage CMS Theme
 * @since 1.0.0
 */

get_header(); ?>

	<div id="primary" class="site-content container">
		<div class="row">
			<div id="content" role="main">
			
				<article id="post-0" class="post cms-error404 no-results not-found">
					<header class="entry-header">
						<h1><?php esc_html_e( '404', 'wp-trust' ); ?></h1>
					</header>

					<div class="entry-content">
						<p><?php esc_html_e('Trust is a business theme perfectly suited legal advisers and offices, lawyers, attorneys, counsels, advocates and other legal and law related services.', 'wp-trust') ?></p>
						<a class="btn btn-lg" href="<?php echo esc_url(home_url('/')); ?>"><?php esc_html_e('Go Back To Homepage','wp-trust'); ?></a>
					</div><!-- .entry-content -->
				</article><!-- #post-0 -->

			</div><!-- #content -->
		</div>
	</div><!-- #primary -->

<?php get_footer(); ?>