<?php

namespace {=namespaceSlug=}\blocks;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

use {=namespaceSlug=}\blocks\acfBlocks\TestBlockProvider;

class CustomBlockFactory {
	/**
	 *
	 * @suppressWarnings(PHPMD)
	 */
	public static function get_block_object( string $block_name ): ?object {
		if ( empty( $block_name ) ) {
			return null;
		}

		switch ( $block_name ) {
			case 'test-block':
				return new TestBlockProvider();
		}

		return null;
	}
}