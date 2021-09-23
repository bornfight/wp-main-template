<?php

use {=namespaceSlug=}\postTypes\MainPostTypeProvider;
use {=namespaceSlug=}\core\ThemeOptions;
use {=namespaceSlug=}\core\Menus;
use {=namespaceSlug=}\core\PartialFinder;
use {=namespaceSlug=}\core\RestApiCustomRoutes;
use {=namespaceSlug=}\core\RewriteRules;
use {=namespaceSlug=}\core\WordpressDefaults;
use {=namespaceSlug=}\core\ThemeUpdateChecker;
use {=namespaceSlug=}\core\AcfDefaults;
use {=namespaceSlug=}\core\RoleManagement;
use {=namespaceSlug=}\blocks\MainBlockProvider;
use {=namespaceSlug=}\providers\AdvancedImagesProvider;


define( 'INCLUDE_PATH', get_template_directory() . '/inc/' );
define( 'TEMPLATE_PATH', get_template_directory() . '/' );
define( 'INCLUDE_URL', get_template_directory_uri() );
define( 'FS_METHOD', 'direct' );

if ( ! file_exists( __DIR__ . '/vendor/autoload.php' ) ) {
	add_action( 'admin_notices', function () {
		?>
        <div class="notice notice-error">
            <h2>Missing <i>vendor/autoloader.php</i></h2>
            <p>
                <strong>
                    You are missing composer autoload. Please run <i>composer install</i> in root of your project.
                </strong>
            </p>
        </div>
		<?php
	} );

	return;
}
/**
 * If this command fails try to run "composer dump" in the theme root directory
 */
require_once __DIR__ . '/vendor/autoload.php';

if ( class_exists( '{=namespaceSlug=}\core\ThemeUpdateChecker' ) ) {
	//Initialize the update checker.
	$example_update_checker = new ThemeUpdateChecker(
		'{=folderName=}',                                            //Theme folder name, AKA "slug".
		'{=liveServerPath=}?identifier={=projectIdentifier=}&type=manifest' //URL of the metadata file.
	);

	add_action( 'load-themes.php', function () use ( $example_update_checker ) {
		$example_update_checker->check_for_updates();
	} );
}

$main_post_type_provider = new MainPostTypeProvider();
$main_post_type_provider->register();

$theme_options = new ThemeOptions();
$theme_options->register();

$rest_api_custom_routes = new RestApiCustomRoutes();
$rest_api_custom_routes->register();

$menus = new Menus();
$menus->register();

$wordpress_defaults = new WordpressDefaults();
$wordpress_defaults->init();

$role_management = new RoleManagement();
$role_management->init();

$rewrite_rules = new RewriteRules();
$rewrite_rules->register();

$acf_defaults = new AcfDefaults();
$acf_defaults->init();

// initializing main gutenberg block provider
$main_block_provider = new MainBlockProvider();
$main_block_provider->init();

// Must use AdvancedImagesPlugin v3.3.1+
$advanced_images_provider = new AdvancedImagesProvider();
$advanced_images_provider->register_image_sizes();

/**
 * Pretty dump
 *
 * @param $obj
 */
function dump( $obj ) {
	echo "<pre class='debug'>";
	var_dump( $obj );
	echo "</pre>";
}

/**
 * Base url convertion method.
 *
 * @param $url
 *
 * @return string
 */
function bu( $url ) {
	$clean = trim( $url );

	return INCLUDE_URL . "/static/" . $clean;
}

function au( $url ) {
	$clean = trim( $url );

	return get_template_directory() . "/static/" . $clean;
}

function get_partial( $partial, $data = null, $return = false, $folder = PartialFinder::PARTIAL_FOLDER ) {
	return PartialFinder::get_instance()->get_partial( $partial, $data, $return, $folder );
}

/**
 * Get icon method.
 *
 * @param $name
 *
 * @return string
 */
function get_icon( $name ) {
	return get_partial( 'icons/icon-' . $name, [], true, 'static' );
}

function bf_content( int $id = null ) {
	global $post;

	if ( empty( $id ) ) {
		$id = $post->ID;
	}

	return apply_filters( 'the_content', get_post_field( 'post_content', $id ) );
}
