<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package CMSSuperHeroes
 * @subpackage CMS Theme
 * @since 1.0.0
 * @author Fox
 */

get_header();

global $smof_data, $post, $wp_trust_meta;

$side_bar = isset($wp_trust_meta->_cms_show_sidebar) ? $wp_trust_meta->_cms_show_sidebar : 0 ;

?>
<div id="page-default" class="<?php wp_trust_main_class(); ?> <?php if (isset($wp_trust_meta->_cms_show_sidebar_page_left) && $wp_trust_meta->_cms_show_sidebar_page_left) { echo 'sidebar-left-active'; } ?>">
	<div class="row">
		<div id="primary" class="<?php if($side_bar) { echo 'col-xs-12 col-sm-9 col-md-9 col-lg-9 sidebar-active'; }else  { echo 'col-xs-12 col-sm-12 col-md-12 col-lg-12 page-full-width'; } ?>">
			<div id="content" role="main">

				<?php while ( have_posts() ) : the_post(); ?>
					<?php get_template_part( 'single-templates/content', 'page' ); ?>
					<?php if($smof_data['page_comment']=='1'):?>
						<?php comments_template( '', true ); ?>
					<?php endif; ?>
				<?php endwhile; // end of the loop. ?>

			</div><!-- #content -->
		</div><!-- #primary -->
		<?php if($side_bar) { ?>
	        <div id="sidebar" class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
	            <?php get_sidebar(); ?>
	        </div>
	    <?php } ?>
	</div>
</div>
<?php get_footer(); ?>