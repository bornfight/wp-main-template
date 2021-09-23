<?php

namespace {=namespaceSlug=}\blocks;

use {=namespaceSlug=}\core\Constants;
use {=namespaceSlug=}\helpers\BlockHelper;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

class MainBlockProvider {
	public function init(): void {
		add_action( 'init', array( $this, 'init_blocks' ) );

		add_action( 'allowed_block_types_all', array( $this, 'filter_allowed_blocked_types' ) );

		// adding new or filtering existings blocks categories (show in gutenberg editor while adding new block)
		add_filter( 'block_categories_all', array( $this, 'filter_block_categories' ), 10, 2 );
	}

	public function init_blocks(): void {
		// check function exists
		if ( function_exists( 'acf_register_block_type' ) ) {
			$this->register_blocks();
		}
	}

	public function filter_allowed_blocked_types( bool $allowed_blocks ): array {
		$default_blocks = array(
			'core/heading',
			'core/paragraph',
			'core/list',
			'core/image',
			'core/shortcode',
		);

		$custom_blocks = $this->get_custom_blocks();


		return array_merge( $default_blocks, $custom_blocks );

	}

	private function get_custom_blocks(): array {
		return array(
			'acf/test-block',
		);
	}

	/**
	 *
	 * @suppressWarnings(PHPMD)
	 */
	private function register_blocks(): void {
		$custom_blocks = $this->get_custom_blocks();

		$block_helper = new BlockHelper();
		foreach ( $custom_blocks as $custom_block ) {
			$block_name = str_replace( 'acf/', '', $custom_block );

			$custom_block = CustomBlockFactory::get_block_object( $block_name );

			if ( is_object( $custom_block ) ) {
				$settings = $custom_block->get_settings( $block_helper->get_default_block_settings() );

				acf_register_block_type( $settings );
			}

		}
	}

	public function filter_block_categories( $block_categories, $editor_text ): array {
		if ( ! empty( $editor_text->post ) ) {
			array_push( $block_categories, array(
				'slug'  => 'custom-blocks',
				'title' => __( 'Custom Blocks', Constants::DOMAIN_NAME_ADMIN ),
				'icon'  => null,
			) );
		}

		return $block_categories;
	}
}