<?php
namespace {=namespaceSlug=}\postTypes;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

use {=namespaceSlug=}\helpers\CustomPostTypeTaxonomyHelper;
use {=namespaceSlug=}\postTypes\customPostTaxonomies\TestPostTypeTaxonomy;

class CustomPostTypeTaxonomyFactory {
	public static function get_post_type_taxonomy_object( string $taxonomy ): ?object {
		if ( empty( $taxonomy ) ) {
			return null;
		}

		switch ( $taxonomy ) {
			case CustomPostTypeTaxonomyHelper::TAXONOMY_TEST_CAT:
				return new TestPostTypeTaxonomy();
		}

		return null;
	}
}
