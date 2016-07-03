<?php
/**
 * The template for displaying the footer
 *
 * Contains footer content and the closing of the #main and #page div elements.
 *
 * @package CMSSuperHeroes
 * @subpackage CMS Theme
 * @since 1.0.0
 */
global $smof_data;
?>
        </div><!-- #main -->
            <footer>
                <div class="cshero-footer6">
                    <?php if ( is_active_sidebar( 'footer-feature-top' ) ) { ?>
                        <div id="cshero-footer-feature-top">
                            <div class="container">
                                <div class="row">
                                    <?php dynamic_sidebar('footer-feature-top'); ?>
                                </div>
                            </div>
                        </div>
                    <?php  } ?>
                    <div id="cshero-footer-bottom"> 
                        <div class="container">
                            <div class="line-gray"></div>
                            <div class="row">
                                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 text-left text-center-xs"><?php dynamic_sidebar('copyright1'); ?></div>
                                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 text-right text-center-xs"><?php dynamic_sidebar('copyright2'); ?></div>
                            </div>
                        </div>
                    </div>
                </DIV>
            </footer><!-- #site-footer -->
        </div><!-- #page -->
    <?php wp_footer(); ?>
