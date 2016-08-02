<?php
/**
 * The template for displaying Search Results pages
 *
 * @package CMSSuperHeroes
 * @subpackage CMS Theme
 * @since 1.0.0
 */

get_header(); ?>
<div id="page-search-results">
<div class="container">
    <div class="row">
        <section id="primary" class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div id="content" role="main">

            <?php if ( have_posts() ) : ?>

                <?php /* Start the Loop */ ?>
                <?php while ( have_posts() ) : the_post(); ?>
                    <?php
                    if(get_post_type() != 'page'){
                        get_template_part( 'single-templates/content/content', get_post_format() );
                    } else {
                        get_template_part( 'single-templates/content/search', 'page' );
                    }
                    ?>
                <?php endwhile; ?>

                <?php wp_trust_paging_nav(); ?>

            <?php else : ?>

                <article id="post-0" class="post no-results not-found">
                    <header class="entry-header">
                        <h1 class="entry-title"><?php esc_html_e( 'Nichts gefunden', 'wp-trust' ); ?></h1>
                    </header>

                    <div class="entry-content">
                        <p><?php esc_html_e( 'Sorry, leider konnten wir zu Ihrer Suche nichts finden. Versuchen Sie einen anderen Suchbegriff.', 'wp-trust' ); ?></p>
                        <?php get_search_form(); ?>
                        </br>
                        </br>
                        </br>
                    </div><!-- .entry-content -->
                </article><!-- #post-0 -->

            <?php endif; ?>

            </div><!-- #content -->
        </section><!-- #primary -->
    </div>
</div>
</div>
<?php get_footer(); ?>
