<?php

namespace {=namespaceSlug=}\helpers;

use {=namespaceSlug=}\core\Constants;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

class BlockHelper {
	public function render_block( array $block, string $path = '' ): bool {
		$slug       = str_replace( 'acf/', '', $block['name'] );
		$block_path = 'blocks/' . $path;

		// if you are loading blocks in admin, then load images as preview
		if ( is_admin() ) {
			echo $this->get_block_thumbnail( $slug );

			return true;
		}

		// else just show block template
		get_partial( $block_path . $slug, array( 'block' => $block ) );

		return true;
	}

	/**
	 * create folder static/BLOCK_THUMBNAIL_PATH/
	 * add png images/screenshots of blocks
	 * naming conventions -> block_name.png
	 *
	 * @param string $block_name
	 *
	 * @return string
	 */
	public function get_block_thumbnail( string $block_name ): string {
		$path = bu( Constants::BLOCK_THUMBNAIL_PATH . '/' . $block_name . '.png' );

		return '<img src="' . $path . '" style="width:100%; height:auto;">';
	}

	public function get_default_block_settings(): array {
		return array(
			'name'            => 'test-block',
			'title'           => 'Test Name',
			'description'     => 'Test Description',
			'category'        => 'custom-blocks',
			'icon'            => null,
			'keywords'        => array( 'test', 'block' ),
			'post_types'      => array( 'post', 'page' ),
			'mode'            => 'auto',
			'render_callback' => array( $this, 'render_block' ),
		);
	}
}