<?php
/**
 * Single Product Price, including microdata for SEO
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     20.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $product, $post;

if ( ! $post->post_excerpt ) {
	return;
}
if ( get_option( 'woocommerce_enable_review_rating' ) === 'no' ) {
	return;
}
$rating_count = $product->get_rating_count();
$review_count = $product->get_review_count();
$average      = $product->get_average_rating();

?>
<div class="pr-price-rating clearfix">
	<div class="woo-price left" itemprop="offers" itemscope itemtype="http://schema.org/Offer">
		<p class="price"><?php echo ''.$product->get_price_html(); ?></p>
		<meta itemprop="price" content="<?php echo ''.$product->get_price(); ?>" />
		<meta itemprop="priceCurrency" content="<?php echo get_woocommerce_currency(); ?>" />
		<link itemprop="availability" href="http://schema.org/<?php echo ''.$product->is_in_stock() ? 'InStock' : 'OutOfStock'; ?>" />
	</div>

	<?php if ( $rating_count > 0 ) : ?>

		<div class="woocommerce-product-rating right" itemprop="aggregateRating" itemscope itemtype="http://schema.org/AggregateRating">
			<div class="star-rating" title="<?php printf( __( 'Rated %s out of 5', 'woocommerce' ), $average ); ?>">
				<span style="width:<?php echo ( ( $average / 5 ) * 100 ); ?>%">
					<strong itemprop="ratingValue" class="rating"><?php echo esc_html( $average ); ?></strong> <?php printf( __( 'out of %s5%s', 'woocommerce' ), '<span itemprop="bestRating">', '</span>' ); ?>
					<?php printf( _n( 'based on %s customer rating', 'based on %s customer ratings', $rating_count, 'woocommerce' ), '<span itemprop="ratingCount" class="rating">' . $rating_count . '</span>' ); ?>
				</span>
			</div>
			<?php if ( comments_open() ) : ?><a href="#reviews" class="woocommerce-review-link" rel="nofollow">(<?php printf( _n( '%s customer review', '%s customer reviews', $review_count, 'woocommerce' ), '<span itemprop="reviewCount" class="count">' . $review_count . '</span>' ); ?>)</a><?php endif ?>
		</div>

	<?php endif; ?>
</div>

<div class="content">
	<?php echo apply_filters( 'woocommerce_short_description', $post->post_excerpt ) ?>
</div>