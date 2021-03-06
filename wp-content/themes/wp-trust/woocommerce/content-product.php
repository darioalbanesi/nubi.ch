<?php
/**
 * The template for displaying product content within loops.
 *
 * Override this template by copying it to yourtheme/woocommerce/content-product.php
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     20.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
global $product, $woocommerce_loop;
// Store loop count we're currently on
if ( empty( $woocommerce_loop['loop'] ) )
	$woocommerce_loop['loop'] = 0;
// Store column count for displaying the grid
if ( empty( $woocommerce_loop['columns'] ) )
	$woocommerce_loop['columns'] = apply_filters( 'loop_shop_columns', 3 );
// Ensure visibility
if ( ! $product || ! $product->is_visible() )
	return;
// Increase loop count
$woocommerce_loop['loop']++;
// Extra post classes
$classes = array();

if ( 0 == ( $woocommerce_loop['loop'] - 1 ) % $woocommerce_loop['columns'] || 1 == $woocommerce_loop['columns'] )
	$classes[] = 'first';
if ( 0 == $woocommerce_loop['loop'] % $woocommerce_loop['columns'] )
	$classes[] = 'last';
?>
<li <?php post_class( $classes ); ?>>
	<div class="cshere-woo-item-wrap clearfix">
        <div class="cshero-woo-inner">
        	<div class="cshero-woo-image">
				<?php do_action( 'woocommerce_before_shop_loop_item' ); ?>
				<a href="<?php the_permalink(); ?>">
					<?php
						/**
						 * woocommerce_before_shop_loop_item_title hook
						 *
						 * @hooked woocommerce_show_product_loop_sale_flash - 10
						 * @hooked woocommerce_template_loop_product_thumbnail - 10
						 */
						do_action( 'woocommerce_before_shop_loop_item_title' );
					?>
				</a>
				<?php
					/**
					 * woocommerce_after_shop_loop_item hook
					 *
					 * @hooked woocommerce_template_loop_add_to_cart - 10
					 */
					do_action( 'woocommerce_after_shop_loop_item' ); 
				?>
			</div>
		</div>
		<div class="cshero-woo-meta">
			<?php
			    echo $product->get_categories(
			        ', ',
			        '<span class="posted_in">' . _n( '', '',
			        sizeof( get_the_terms( $post->ID, 'product_cat' ) ),
			        'woocommerce' ) . ' ',
			        '</span>'
			    );
			?>
			<div class="cshero-product-title">
				<h3>
					<span class="line"></span>
					<a href="<?php the_permalink(); ?>" alt="" ><?php the_title(); ?></a>
				</h3>
			</div>
			<div class="content">
				<?php echo apply_filters( 'woocommerce_short_description', $post->post_excerpt ) ?>
			</div>
			<?php
				/**
				 * woocommerce_after_shop_loop_item_title hook
				 *
				 * @hooked woocommerce_template_loop_rating - 5
				 * @hooked woocommerce_template_loop_price - 10
				 */

				do_action( 'woocommerce_after_shop_loop_item_title' );

				
			?>
			
		</div>
	</div>
</li>
