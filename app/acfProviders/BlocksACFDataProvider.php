<?php

namespace {=namespaceSlug=}\acfProviders;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

use bornfight\wpHelpers\ACFDataProvider;

/**
 * Set of default/common acf fields in gutenberg blocks
 */
class BlocksACFDataProvider {
	public static function get_settings( string $block_id ): array {
		return (array) ACFDataProvider::get_instance()->get_field( 'settings', $block_id, false );
	}

	public static function get_title( string $block_id ): string {
		return (string) ACFDataProvider::get_instance()->get_field( 'title', $block_id, false );
	}

	public static function get_eyebrow( string $block_id ): string {
		return (string) ACFDataProvider::get_instance()->get_field( 'eyebrow', $block_id, false );
	}

	public static function get_description( string $block_id ): string {
		return (string) ACFDataProvider::get_instance()->get_field( 'description', $block_id, false );
	}

	public static function get_images( string $block_id ): array {
		return (array) ACFDataProvider::get_instance()->get_field( 'images', $block_id, false );
	}

	public static function get_link( string $block_id ): array {
		return (array) ACFDataProvider::get_instance()->get_field( 'link', $block_id, false );
	}

	public static function get_slides( string $block_id ): array {
		return (array) ACFDataProvider::get_instance()->get_field( 'slides', $block_id, false );
	}

	public static function get_image( string $block_id ): array {
		return (array) ACFDataProvider::get_instance()->get_field( 'image', $block_id, false );
	}

	public static function get_items( string $block_id ): array {
		return (array) ACFDataProvider::get_instance()->get_field( 'items', $block_id, false );
	}

	public static function get_gallery( string $block_id ): array {
		return (array) ACFDataProvider::get_instance()->get_field( 'gallery', $block_id, false );
	}
}