<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "site-content" div.
 *
 *
 * NOTICE: Don't forget to add wp_head(); to the <head> element.
 *
 * @package WordPress
 * @subpackage angelo
 */

use {=namespaceSlug=}\bundles\{=classNamespaceSlug=}Assets;
use {=namespaceSlug=}\bundles\{=classNamespaceSlug=}ProductionAssets;

if (defined('LOCAL') && LOCAL === true) {
	{=classNamespaceSlug=}Assets::register();
} else {
	{=classNamespaceSlug=}ProductionAssets::register();
}
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
    <title>
		<?= wp_title('') ?>
    </title>
	<?php
	/**
	 * https://realfavicongenerator.net/
	 * 260x260 favicon.png required
	 */
	?>
    <link rel="apple-touch-icon" sizes="57x57" href="<?= bu("ui/favicon/apple-icon-57x57.png") ?>">
    <link rel="apple-touch-icon" sizes="60x60" href="<?= bu("ui/favicon/apple-icon-60x60.png") ?>">
    <link rel="apple-touch-icon" sizes="72x72" href="<?= bu("ui/favicon/apple-icon-72x72.png") ?>">
    <link rel="apple-touch-icon" sizes="76x76" href="<?= bu("ui/favicon/apple-icon-76x76.png") ?>">
    <link rel="apple-touch-icon" sizes="114x114" href="<?= bu("ui/favicon/apple-icon-114x114.png") ?>">
    <link rel="apple-touch-icon" sizes="120x120" href="<?= bu("ui/favicon/apple-icon-120x120.png") ?>">
    <link rel="apple-touch-icon" sizes="144x144" href="<?= bu("ui/favicon/apple-icon-144x144.png") ?>">
    <link rel="apple-touch-icon" sizes="152x152" href="<?= bu("ui/favicon/apple-icon-152x152.png") ?>">
    <link rel="apple-touch-icon" sizes="180x180" href="<?= bu("ui/favicon/apple-icon-180x180.png") ?>">
    <link rel="icon" type="image/png" sizes="192x192" href="<?= bu("ui/favicon/android-icon-192x192.png") ?>">
    <link rel="icon" type="image/png" sizes="32x32" href="<?= bu("ui/favicon/favicon-32x32.png") ?>">
    <link rel="icon" type="image/png" sizes="96x96" href="<?= bu("ui/favicon/favicon-96x96.png") ?>">
    <link rel="icon" type="image/png" sizes="16x16" href="<?= bu("ui/favicon/favicon-16x16.png") ?>">
    <link rel="manifest" href="<?= bu("ui/favicon/manifest.json") ?>">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="<?= bu("ui/favicon/ms-icon-144x144.png") ?>">
    <meta name="theme-color" content="#ffffff">

    <link rel="shortcut icon" href="<?php echo bu('static/ui/favicon.ico'); ?>" type="image/x-icon">
	<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>


