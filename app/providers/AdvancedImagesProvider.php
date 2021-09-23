<?php
namespace {=namespaceSlug=}\providers;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

class AdvancedImagesProvider {
	/**
	 *
	 * @suppressWarnings(PHPMD)
	 */
	public function register_image_sizes(): void {
		if ( function_exists( 'wpaimp_register_sizes' ) ) {
			wpaimp_register_sizes( $this->get_image_sizes() );
		}
	}

	public function get_image_by_custom_size( int $image_id, array $sizes ): string {
		if ( function_exists( 'get_wpaimp_image_by_custom_size' ) ) {
			return get_wpaimp_image_by_custom_size( $image_id, $sizes );
		}

		return $this->get_attachment_url( $image_id );
	}

	public function get_image_by_size_name( int $image_id, string $size_name ): string {
		if ( function_exists( 'get_wpaimp_image_by_size_name' ) ) {
			return get_wpaimp_image_by_size_name( $image_id, $size_name );
		}

		return $this->get_attachment_url( $image_id );
	}

	public function get_featured_image_data_by_size_name( int $post_id, string $size_name ): array {
		if ( function_exists( 'get_wpaimp_featured_image_by_size_name' ) ) {
			return get_wpaimp_featured_image_by_size_name( $post_id, $size_name );
		}

		$featured_image_id = get_post_thumbnail_id( $post_id );

		return array(
			'url' => $this->get_attachment_url( (int) $featured_image_id ),
			'alt' => get_post_meta( $featured_image_id, '_wp_attachment_image_alt', true ),
		);
	}

	public function get_attachment_url( int $attachment_id ): string {
		return wp_get_attachment_url( $attachment_id );
	}

	private function get_image_sizes() : array {
		return array(
			'image_200'  => array( 200, 0 ),
			'image_250'  => array( 250, 0 ),
			'image_480'  => array( 480, 0 ),
			'image_600'  => array( 600, 0 ),
			'image_700'  => array( 700, 0 ),
			'image_800'  => array( 800, 0 ),
			'image_900'  => array( 900, 0 ),
			'image_1200' => array( 1200, 0 ),
			'image_1440' => array( 1440, 0 ),
			'image_1920' => array( 1920, 0 ),
			'image_2880' => array( 2880, 0 ),
		);
	}
}
