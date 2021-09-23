<?php
namespace {=namespaceSlug=}\postTypes;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

use {=namespaceSlug=}\helpers\CustomPostTypeHelper;
use {=namespaceSlug=}\postTypes\customPostTypes\TestPostType;

class CustomPostTypeFactory {
	public static function get_post_type_object( string $post_type ): ?object {
		if ( empty( $post_type ) ) {
			return null;
		}

		switch ( $post_type ) {
			case CustomPostTypeHelper::POST_TYPE_TEST:
				return new TestPostType();
		}

		return null;
	}
}
