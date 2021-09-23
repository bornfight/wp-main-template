<?php

namespace {=namespaceSlug=}\bundles;

use bornfight\wpHelpers\AssetBundle;

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

class {=classNamespaceSlug=}Assets extends AssetBundle
{
//    public $asyncCss = true;

	public $js;

	public $css;

	public function __construct() {
	$this->js = [
		'{=namespaceSlug=}Vendor' => [
			'path'     => 'dist/vendor.js',
			'version'  => 1.0,
			'localize' => [
				'object' => 'frontend_rest_object',
				'data'   => [
					'rest_url' => get_home_url() . '/wp-json/api/v1'
				]
			]
		],
		'{=namespaceSlug=}Bundle' => [
			'path'    => 'dist/bundle.js',
			'version' => 1.0
		],
	];

	$this->css = [
		'{=namespaceSlug=}MainCSS' => [
			'path'      => 'dist/style.css',
			'in_footer' => false,
			'version'   => 1.0
		],
	];
}

}
