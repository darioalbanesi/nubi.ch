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
                <div class="cshero-footer3">
                    <div id="cshero-footer-top"> 
                        <div class="container">
                            <div class="row">
                                <div class="cshero-footer-top1 col-xs-12 col-sm-6 col-md-3 col-lg-3"><?php dynamic_sidebar('footer-top-1'); ?></div>
                                <div class="cshero-footer-top2 col-xs-12 col-sm-6 col-md-3 col-lg-3"><?php dynamic_sidebar('footer-top-2'); ?></div>
                                <div class="cshero-footer-top3 col-xs-12 col-sm-6 col-md-3 col-lg-3"><?php dynamic_sidebar('footer-top-3'); ?></div>
                                <div class="cshero-footer-top4 col-xs-12 col-sm-6 col-md-3 col-lg-3"><?php dynamic_sidebar('footer-top-4'); ?></div>
                            </div>
                        </div>
                    </div>
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
