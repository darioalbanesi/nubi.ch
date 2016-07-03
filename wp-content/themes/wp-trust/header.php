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
global $smof_data, $wp_trust_meta;
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="initial-scale=1, width=device-width" />
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<?php if ( ! function_exists( 'has_site_icon' ) || ! has_site_icon() ): ?>
<link rel="icon" type="image/png" href="<?php echo esc_url($smof_data['favicon_icon']['url']); ?>"/>
<?php endif; ?>
<?php wp_head(); ?>
</head>
<?php $body_custom_class = (isset($wp_trust_meta->_cms_body_custom_class)) ? $wp_trust_meta->_cms_body_custom_class : ''; ?>
<?php if ($smof_data['menu_no_dropdown']) { $body_custom_class = 'mobile-menu-no-dropdown';} ?>

<body id="cms-trust" <?php body_class($body_custom_class); ?>>
<?php wp_trust_get_page_loading(); ?>
<div id="page-wrapper" class="<?php wp_trust_page_class(); ?>">
	<header id="masthead" class="site-header">
		<?php wp_trust_header(); ?>
	</header><!-- #masthead -->
    <?php wp_trust_page_title(); ?>
	<div id="main">
		