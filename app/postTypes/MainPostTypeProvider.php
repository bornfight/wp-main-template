<?php
namespace {=namespaceSlug=}\postTypes;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

use {=namespaceSlug=}\helpers\CustomPostTypeHelper;
use {=namespaceSlug=}\helpers\CustomPostTypeTaxonomyHelper;

class MainPostTypeProvider {
	public function register(): void {
		$this->register_post_types();
		$this->register_post_type_taxonomies();
	}

	/**
	 *
	 *
	 * @suppressWarnings(PHPMD)
	 */
	private function register_post_types(): void {
		$custom_post_types = CustomPostTypeHelper::get_custom_post_types();

		foreach ( $custom_post_types as $custom_post_type ) {
			$custom_post_type_object = CustomPostTypeFactory::get_post_type_object( $custom_post_type );

			register_post_type( $custom_post_type, $custom_post_type_object->get_args() );
		}
	}

	/**
	 *
	 *
	 * @suppressWarnings(PHPMD)
	 */
	private function register_post_type_taxonomies(): void {
		$custom_taxonomies = CustomPostTypeTaxonomyHelper::get_custom_post_taxonomies();

		foreach ( $custom_taxonomies as $custom_taxonomy ) {
			$custom_post_type_taxonomy_object = CustomPostTypeTaxonomyFactory::get_post_type_taxonomy_object( $custom_taxonomy );

			register_taxonomy( $custom_taxonomy, $custom_post_type_taxonomy_object->get_post_types(), $custom_post_type_taxonomy_object->get_args() );
		}
	}
}
