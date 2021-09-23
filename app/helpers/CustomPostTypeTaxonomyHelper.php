<?php

namespace {=namespaceSlug=}\helpers;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

use {=namespaceSlug=}\core\Constants;

class CustomPostTypeTaxonomyHelper {
	const TAXONOMY_TEST_CAT = 'test_cat';

	public static function get_custom_post_taxonomies(): array {
		return array( self::TAXONOMY_TEST_CAT );
	}

	public function get_default_labels( string $label, string $domain = Constants::DOMAIN_NAME_ADMIN ): array {
		return array(
			'name'              => sprintf( __( '%s', $domain ), $label ),
			'singular_name'     => sprintf( __( '%s', $domain ), $label ),
			'search_items'      => sprintf( __( 'Search %s', $domain ), $label ),
			'all_items'         => sprintf( __( 'All %s', $domain ), $label ),
			'parent_item'       => sprintf( __( 'Parent %s', $domain ), $label ),
			'parent_item_colon' => sprintf( __( 'Parent %s:', $domain ), $label ),
			'edit_item'         => sprintf( __( 'Edit %s', $domain ), $label ),
			'update_item'       => sprintf( __( 'Update %s', $domain ), $label ),
			'add_new_item'      => sprintf( __( 'Add new %s', $domain ), $label ),
			'new_item_name'     => sprintf( __( 'New %s', $domain ), $label ),
			'not_found'         => sprintf( __( 'No &quot;%s&quot; found', $domain ), $label ),
		);
	}

	public function get_default_args( array $labels = array() ): array {
		return array(
			'labels'             => $labels,
			'description'        => '',
			'public'             => true,
			'publicly_queryable' => true,
			'hierarchical'       => true,
			'show_ui'            => true,
			'show_in_menu'       => true,
			'show_in_nav_menus'  => true,
			'show_in_quick_edit' => false,
			'show_admin_column'  => true,
			'show_in_rest'       => true,
			'query_var'          => true,
			'rewrite'            => false,
		);
	}
}
